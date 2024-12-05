<?php

namespace WPEngine\Tests\Unit\Config;

use PHPUnit\Framework\TestCase;
use WPEngine\Config\ConfigurationManager;

class ConfigurationManagerTest extends TestCase
{
    private string $testConfigPath;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testConfigPath = sys_get_temp_dir() . '/wpengine_test_config';
    }

    protected function tearDown(): void
    {
        if (file_exists($this->testConfigPath)) {
            unlink($this->testConfigPath);
        }
        parent::tearDown();
    }

    public function testLoadFromEnvironmentVariables()
    {
        putenv('WPENGINE_USERNAME=test-user');
        putenv('WPENGINE_PASSWORD=test-pass');

        $manager = new ConfigurationManager();
        $config = $manager->getConfig();

        $this->assertEquals('test-user', $config->getCredentials()['username']);
        $this->assertEquals('test-pass', $config->getCredentials()['password']);
        $this->assertEquals('https://api.wpengineapi.com/v1', $config->getBaseURL());

        // Cleanup
        putenv('WPENGINE_USERNAME');
        putenv('WPENGINE_PASSWORD');
    }

    public function testLoadFromFileWithMultipleProfiles()
    {
        $configContent = <<<EOT
[Default]
WPENGINE_USERNAME=default-user
WPENGINE_PASSWORD=default-pass

[Staging]
WPENGINE_USERNAME=staging-user
WPENGINE_PASSWORD=staging-pass
WPENGINE_API_URL=https://staging-api.wpengineapi.com/v1
EOT;

        file_put_contents($this->testConfigPath, $configContent);

        $manager = new ConfigurationManager($this->testConfigPath);
        
        // Test Default profile
        $defaultConfig = $manager->getConfig();
        $this->assertEquals('default-user', $defaultConfig->getCredentials()['username']);
        $this->assertEquals('default-pass', $defaultConfig->getCredentials()['password']);
        $this->assertEquals('https://api.wpengineapi.com/v1', $defaultConfig->getBaseURL());

        // Test Staging profile
        $stagingConfig = $manager->getConfig('Staging');
        $this->assertEquals('staging-user', $stagingConfig->getCredentials()['username']);
        $this->assertEquals('staging-pass', $stagingConfig->getCredentials()['password']);
        $this->assertEquals('https://staging-api.wpengineapi.com/v1', $stagingConfig->getBaseURL());
    }

    public function testThrowsErrorForNonExistentProfile()
    {
        $manager = new ConfigurationManager();
        
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Configuration profile 'NonExistent' not found");
        
        $manager->getConfig('NonExistent');
    }

    public function testListAllProfiles()
    {
        $configContent = <<<EOT
[Default]
WPENGINE_USERNAME=default-user
WPENGINE_PASSWORD=default-pass

[Staging]
WPENGINE_USERNAME=staging-user
WPENGINE_PASSWORD=staging-pass

[Production]
WPENGINE_USERNAME=prod-user
WPENGINE_PASSWORD=prod-pass
EOT;

        file_put_contents($this->testConfigPath, $configContent);

        $manager = new ConfigurationManager($this->testConfigPath);
        $profiles = $manager->getAllProfiles();

        $this->assertContains('Default', $profiles);
        $this->assertContains('Staging', $profiles);
        $this->assertContains('Production', $profiles);
        $this->assertCount(3, $profiles);
    }

    public function testThrowsErrorForNonExistentConfigFile()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Configuration file not found:');
        
        new ConfigurationManager('/non/existent/path');
    }
}
