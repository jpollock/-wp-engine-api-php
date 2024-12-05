<?php

namespace WPEngine\Config;

class ConfigurationManager
{
    private const DEFAULT_BASE_URL = 'https://api.wpengineapi.com/v1';
    private array $config = [];

    public function __construct(?string $configPath = null)
    {
        if ($configPath !== null) {
            $this->loadFromFile($configPath);
        } else {
            // Try to load from default locations
            $defaultPaths = [
                './.env',
                $_SERVER['HOME'] . '/.wpengine/config'
            ];

            foreach ($defaultPaths as $path) {
                if (file_exists($path)) {
                    $this->loadFromFile($path);
                    break;
                }
            }
        }

        // Load from environment variables if available
        if (getenv('WPENGINE_USERNAME') && getenv('WPENGINE_PASSWORD')) {
            $this->config['Default'] = new Configuration([
                'credentials' => [
                    'username' => getenv('WPENGINE_USERNAME'),
                    'password' => getenv('WPENGINE_PASSWORD')
                ],
                'baseURL' => getenv('WPENGINE_API_URL') ?: self::DEFAULT_BASE_URL
            ]);
        }
    }

    private function loadFromFile(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new \RuntimeException("Configuration file not found: {$filePath}");
        }

        $content = file_get_contents($filePath);
        $parsed = $this->parseConfigFile($content);

        foreach ($parsed as $section => $config) {
            $this->config[$section] = new Configuration([
                'credentials' => [
                    'username' => $config['WPENGINE_USERNAME'] ?? '',
                    'password' => $config['WPENGINE_PASSWORD'] ?? ''
                ],
                'baseURL' => $config['WPENGINE_API_URL'] ?? self::DEFAULT_BASE_URL
            ]);
        }
    }

    private function parseConfigFile(string $content): array
    {
        $lines = explode("\n", $content);
        $currentSection = 'Default';
        $config = [$currentSection => []];

        foreach ($lines as $line) {
            $line = trim($line);
            
            // Skip empty lines and comments
            if (empty($line) || str_starts_with($line, '#')) {
                continue;
            }

            // Check for section header
            if (preg_match('/^\[(.*)\]$/', $line, $matches)) {
                $currentSection = $matches[1];
                $config[$currentSection] = [];
                continue;
            }

            // Parse key-value pairs
            $parts = explode('=', $line, 2);
            if (count($parts) === 2) {
                $key = trim($parts[0]);
                $value = trim($parts[1]);
                $config[$currentSection][$key] = $value;
            }
        }

        return $config;
    }

    public function getConfig(string $profile = 'Default'): Configuration
    {
        if (!isset($this->config[$profile])) {
            throw new \RuntimeException("Configuration profile '{$profile}' not found");
        }

        return $this->config[$profile];
    }

    public function getAllProfiles(): array
    {
        return array_keys($this->config);
    }
}
