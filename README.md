# WP Engine API PHP SDK

A PHP SDK for interacting with the WP Engine API.

> **Note**: This SDK is maintained by Jeremy Pollock (jeremy.pollock@wpengine.com) and is not affiliated with or supported by WP Engine.

## Requirements

- PHP 8.0 or higher
- Composer
- WP Engine API credentials (username and password)

## Installation

Install via Composer:

```bash
composer require jpollock/wp-engine-api-php
```

## Usage

### Basic Usage

```php
<?php

use WPEngine\WPEngineSDK;

// Initialize with credentials
$sdk = new WPEngineSDK([
    'username' => 'your-username',
    'password' => 'your-password'
]);

// List sites
try {
    $sites = $sdk->sites->listSites();
    print_r($sites);
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Get a specific site
try {
    $site = $sdk->sites->getSite('site-id');
    print_r($site);
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

### Configuration

You can configure the SDK in several ways:

1. Direct credentials:
```php
$sdk = new WPEngineSDK([
    'username' => 'your-username',
    'password' => 'your-password'
]);
```

2. Configuration file:
```php
// Load from default locations (./.env or ~/.wpengine/config)
$sdk = new WPEngineSDK();

// Or specify a custom config path
$sdk = new WPEngineSDK(null, '/path/to/config');
```

3. Environment variables:
```bash
export WPENGINE_USERNAME=your-username
export WPENGINE_PASSWORD=your-password
```

```php
$sdk = new WPEngineSDK();
```

### Rate Limiting

The SDK includes built-in rate limiting to prevent API quota exhaustion. You can configure the rate limit when initializing the SDK:

```php
$sdk = new WPEngineSDK([
    'username' => 'your-username',
    'password' => 'your-password'
], null, 'Default', [
    'maxRequestsPerSecond' => 5 // Default is 5
]);
```

### Available APIs

The SDK provides access to the following WP Engine API endpoints:

- Sites API (`$sdk->sites`)
- Accounts API (`$sdk->accounts`)
- Account Users API (`$sdk->accountUsers`)
- Backups API (`$sdk->backups`)
- Cache API (`$sdk->cache`)
- Domains API (`$sdk->domains`)
- Installs API (`$sdk->installs`)
- SSH Keys API (`$sdk->sshKeys`)
- Status API (`$sdk->status`)
- Users API (`$sdk->users`)

### Example: Managing Sites

```php
// Create a new site
try {
    $newSite = $sdk->sites->createSite([
        'name' => 'My New Site',
        'account_id' => 'account-id'
    ]);
    print_r($newSite);
} catch (\Exception $e) {
    echo "Error creating site: " . $e->getMessage();
}

// Update a site's name
try {
    $updatedSite = $sdk->sites->updateSite('site-id', [
        'name' => 'New Site Name'
    ]);
    print_r($updatedSite);
} catch (\Exception $e) {
    echo "Error updating site: " . $e->getMessage();
}

// Delete a site
try {
    $sdk->sites->deleteSite('site-id');
    echo "Site deleted successfully";
} catch (\Exception $e) {
    echo "Error deleting site: " . $e->getMessage();
}
```

### Error Handling

The SDK throws exceptions for various error conditions:

- `InvalidArgumentException`: For invalid parameter values
- `GuzzleException`: For HTTP-related errors
- `RateLimitException`: When rate limit is exceeded

```php
try {
    $sites = $sdk->sites->listSites();
} catch (\InvalidArgumentException $e) {
    echo "Invalid parameters: " . $e->getMessage();
} catch (\WPEngine\RateLimit\RateLimitException $e) {
    echo "Rate limit exceeded: " . $e->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo "HTTP error: " . $e->getMessage();
} catch (\Exception $e) {
    echo "General error: " . $e->getMessage();
}
```

## Development

### OpenAPI Generation

The SDK uses OpenAPI Generator to generate API clients from the WP Engine API specification. To regenerate the API clients:

1. Install dependencies:
```bash
composer install
```

2. Generate the API clients:
```bash
composer run-script generate-api
```

This will generate the API clients in `src/Generated/` based on the `swagger.json` specification.

### Project Structure

```
wp-engine-api-php/
├── src/
│   ├── Config/
│   │   ├── Configuration.php
│   │   └── ConfigurationManager.php
│   ├── Generated/           # OpenAPI generated code
│   │   ├── Api/            # API client classes
│   │   └── Model/          # API models
│   ├── RateLimit/
│   │   ├── RateLimiter.php
│   │   └── RateLimitException.php
│   └── WPEngineSDK.php
├── .env.example
├── .gitignore
├── LICENSE
├── README.md
├── composer.json
├── openapitools.json       # OpenAPI Generator config
└── swagger.json           # API specification
```

## License

This SDK is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Maintainer

This SDK is maintained by Jeremy Pollock (jeremy.pollock@wpengine.com). For any questions, issues, or contributions, please reach out directly.
