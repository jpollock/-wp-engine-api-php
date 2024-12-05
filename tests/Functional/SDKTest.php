<?php

namespace WPEngine\Tests\Functional;

use PHPUnit\Framework\TestCase;
use WPEngine\WPEngineSDK;
use WPEngineGenerated\ApiException;

class SDKTest extends TestCase
{
    private static string $testConfigPath;
    private WPEngineSDK $sdk;

    public static function setUpBeforeClass(): void
    {
        self::$testConfigPath = __DIR__ . '/../../.env';
    }

    protected function setUp(): void
    {
        $this->sdk = new WPEngineSDK(null, self::$testConfigPath, 'Test');
    }

    public function testSDKInitialization()
    {
        $this->assertInstanceOf(WPEngineSDK::class, $this->sdk);
        
        $config = $this->sdk->getConfig();
        $this->assertIsArray($config);
        $this->assertArrayHasKey('credentials', $config);
        $this->assertArrayHasKey('username', $config['credentials']);
        $this->assertArrayHasKey('password', $config['credentials']);
        $this->assertArrayHasKey('baseURL', $config);
    }

    public function testAPIStatusCheck()
    {
        try {
            $response = $this->sdk->status->status();
            $this->assertTrue($response->getSuccess());
        } catch (ApiException $e) {
            if ($e->getCode() === 401) {
                $this->markTestSkipped('Skipping status test - invalid credentials');
            }
            throw $e;
        }
    }

    public function testCurrentUser()
    {
        try {
            $response = $this->sdk->users->getCurrentUser();
            $this->assertNotEmpty($response->getId());
            $this->assertNotEmpty($response->getEmail());
        } catch (ApiException $e) {
            if ($e->getCode() === 401) {
                $this->markTestSkipped('Skipping user test - invalid credentials');
            }
            throw $e;
        }
    }

    public function testListAccounts()
    {
        try {
            $response = $this->sdk->accounts->listAccounts();
            $this->assertNotNull($response->getResults());
            $this->assertIsArray($response->getResults());
        } catch (ApiException $e) {
            if ($e->getCode() === 401) {
                $this->markTestSkipped('Skipping accounts test - invalid credentials');
            }
            throw $e;
        }
    }

    public function testErrorHandlingInvalidCredentials()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);

        $invalidSdk = new WPEngineSDK([
            'username' => 'invalid',
            'password' => 'invalid'
        ]);
        
        $invalidSdk->accounts->listAccounts();
    }

    public function testErrorHandlingInvalidAccountId()
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);

        try {
            $this->sdk->accounts->getAccount('invalid-id');
        } catch (ApiException $e) {
            if ($e->getCode() === 401) {
                $this->markTestSkipped('Skipping invalid account test - invalid credentials');
            }
            throw $e;
        }
    }

    public function testPaginationParameters()
    {
        try {
            $response = $this->sdk->sites->listSites(null, 5, 0);
            $this->assertNotNull($response->getResults());
            if (!empty($response->getResults())) {
                $this->assertLessThanOrEqual(5, count($response->getResults()));
            }
        } catch (ApiException $e) {
            if ($e->getCode() === 401) {
                $this->markTestSkipped('Skipping pagination test - invalid credentials');
            }
            throw $e;
        }
    }

    public function testConfigurationProfileSelection()
    {
        // Test with default profile
        $defaultSdk = new WPEngineSDK(null, self::$testConfigPath, 'Test');
        $this->assertInstanceOf(WPEngineSDK::class, $defaultSdk);

        // Test with non-existent profile
        $this->expectException(\RuntimeException::class);
        new WPEngineSDK(null, self::$testConfigPath, 'NonExistentProfile');
    }

    public function testRateLimiting()
    {
        $startTime = microtime(true);

        // Make multiple requests in quick succession
        for ($i = 0; $i < 3; $i++) {
            try {
                $this->sdk->status->status();
            } catch (ApiException $e) {
                if ($e->getCode() === 401) {
                    $this->markTestSkipped('Skipping rate limit test - invalid credentials');
                }
                throw $e;
            }
        }

        $endTime = microtime(true);
        $duration = $endTime - $startTime;

        // Should take at least 0.4 seconds due to rate limiting (5 requests per second)
        $this->assertGreaterThan(0.4, $duration);
    }

    public function testBaseURLConfiguration()
    {
        $config = $this->sdk->getConfig();
        $this->assertEquals('https://api.wpengineapi.com/v1', $config['baseURL']);
    }
}
