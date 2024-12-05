<?php

namespace WPEngine\Config;

class Configuration
{
    private array $credentials;
    private string $baseURL;

    public function __construct(array $config)
    {
        $this->credentials = $config['credentials'];
        $this->baseURL = $config['baseURL'] ?? 'https://api.wpengineapi.com/v1';
    }

    public function getCredentials(): array
    {
        return $this->credentials;
    }

    public function getBaseURL(): string
    {
        return $this->baseURL;
    }

    public function toArray(): array
    {
        return [
            'credentials' => $this->credentials,
            'baseURL' => $this->baseURL
        ];
    }
}
