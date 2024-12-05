<?php

namespace WPEngine\Tests\Unit\Config;

use PHPUnit\Framework\TestCase;
use WPEngine\Config\Configuration;

class ConfigurationTest extends TestCase
{
    public function testConstructorWithDefaultBaseURL()
    {
        $config = new Configuration([
            'credentials' => [
                'username' => 'test-user',
                'password' => 'test-pass'
            ]
        ]);

        $this->assertEquals('test-user', $config->getCredentials()['username']);
        $this->assertEquals('test-pass', $config->getCredentials()['password']);
        $this->assertEquals('https://api.wpengineapi.com/v1', $config->getBaseURL());
    }

    public function testConstructorWithCustomBaseURL()
    {
        $config = new Configuration([
            'credentials' => [
                'username' => 'test-user',
                'password' => 'test-pass'
            ],
            'baseURL' => 'https://custom-api.wpengineapi.com/v1'
        ]);

        $this->assertEquals('test-user', $config->getCredentials()['username']);
        $this->assertEquals('test-pass', $config->getCredentials()['password']);
        $this->assertEquals('https://custom-api.wpengineapi.com/v1', $config->getBaseURL());
    }

    public function testToArray()
    {
        $configArray = [
            'credentials' => [
                'username' => 'test-user',
                'password' => 'test-pass'
            ],
            'baseURL' => 'https://custom-api.wpengineapi.com/v1'
        ];

        $config = new Configuration($configArray);
        $this->assertEquals($configArray, $config->toArray());
    }
}
