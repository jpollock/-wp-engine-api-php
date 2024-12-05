<?php

namespace WPEngine;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use WPEngine\Config\Configuration;
use WPEngine\Config\ConfigurationManager;
use WPEngine\RateLimit\RateLimiter;
use WPEngine\Generated\Api\AccountApi;
use WPEngine\Generated\Api\AccountUserApi;
use WPEngine\Generated\Api\BackupApi;
use WPEngine\Generated\Api\CacheApi;
use WPEngine\Generated\Api\DomainApi;
use WPEngine\Generated\Api\InstallApi;
use WPEngine\Generated\Api\SiteApi;
use WPEngine\Generated\Api\SshKeyApi;
use WPEngine\Generated\Api\StatusApi;
use WPEngine\Generated\Api\UserApi;
use WPEngine\Generated\Configuration as ApiConfiguration;

class WPEngineSDK
{
    private Configuration $config;
    private Client $client;
    private RateLimiter $rateLimiter;
    private ApiConfiguration $apiConfig;

    // API Clients
    public readonly AccountApi $accounts;
    public readonly AccountUserApi $accountUsers;
    public readonly BackupApi $backups;
    public readonly CacheApi $cache;
    public readonly DomainApi $domains;
    public readonly InstallApi $installs;
    public readonly SiteApi $sites;
    public readonly SshKeyApi $sshKeys;
    public readonly StatusApi $status;
    public readonly UserApi $users;

    public function __construct(
        ?array $credentials = null,
        ?string $configPath = null,
        string $profile = 'Default',
        array $options = []
    ) {
        // Initialize rate limiter
        $this->rateLimiter = new RateLimiter($options['maxRequestsPerSecond'] ?? 5);

        if ($credentials !== null) {
            // Validate provided credentials
            $this->validateCredentials($credentials);
            
            $this->config = new Configuration([
                'credentials' => $credentials,
                'baseURL' => 'https://api.wpengineapi.com/v1'
            ]);
        } else {
            // Load from config file or environment variables
            $configManager = new ConfigurationManager($configPath);
            $this->config = $configManager->getConfig($profile);
            
            // Validate loaded credentials
            $this->validateCredentials($this->config->getCredentials());
        }

        // Create HTTP client with middleware
        $stack = HandlerStack::create();
        
        // Add rate limiting middleware
        $stack->push(function ($handler) {
            return function ($request, $options) use ($handler) {
                return $this->rateLimiter->acquire()->then(
                    function () use ($handler, $request, $options) {
                        return $handler($request, $options);
                    }
                );
            };
        });

        // Configure the generated API client
        $this->apiConfig = new ApiConfiguration();
        $this->apiConfig->setHost($this->config->getBaseURL());
        $this->apiConfig->setUsername($this->config->getCredentials()['username']);
        $this->apiConfig->setPassword($this->config->getCredentials()['password']);
        $this->apiConfig->setUserAgent('WPEngine-PHP-SDK/1.0');

        // Initialize API clients
        $this->accounts = new AccountApi(null, $this->apiConfig);
        $this->accountUsers = new AccountUserApi(null, $this->apiConfig);
        $this->backups = new BackupApi(null, $this->apiConfig);
        $this->cache = new CacheApi(null, $this->apiConfig);
        $this->domains = new DomainApi(null, $this->apiConfig);
        $this->installs = new InstallApi(null, $this->apiConfig);
        $this->sites = new SiteApi(null, $this->apiConfig);
        $this->sshKeys = new SshKeyApi(null, $this->apiConfig);
        $this->status = new StatusApi(null, $this->apiConfig);
        $this->users = new UserApi(null, $this->apiConfig);
    }

    private function validateCredentials(array $credentials): void
    {
        if (!isset($credentials['username']) || !isset($credentials['password'])) {
            throw new \InvalidArgumentException('Username and password are required');
        }

        if (empty($credentials['username']) || empty($credentials['password'])) {
            throw new \InvalidArgumentException('Username and password cannot be empty');
        }
    }

    public function getConfig(): array
    {
        return $this->config->toArray();
    }

    public function getRateLimiterStats(): array
    {
        return [
            'availableTokens' => $this->rateLimiter->getAvailableTokens(),
            'waitTime' => $this->rateLimiter->getWaitTime()
        ];
    }
}
