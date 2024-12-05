<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WPEngine\WPEngineSDK;

// Initialize the SDK with credentials
$sdk = new WPEngineSDK([
    'username' => 'your-username',
    'password' => 'your-password'
]);

// Get current user
try {
    $user = $sdk->users->getCurrentUser();
    echo "Current user: " . $user['email'] . "\n";
} catch (Exception $e) {
    echo "Error getting user: " . $e->getMessage() . "\n";
}

// List sites
try {
    $response = $sdk->sites->listSites();
    foreach ($response['results'] as $site) {
        echo "Site: " . $site['name'] . " (ID: " . $site['id'] . ")\n";
    }
} catch (Exception $e) {
    echo "Error listing sites: " . $e->getMessage() . "\n";
}

// List accounts
try {
    $response = $sdk->accounts->listAccounts();
    foreach ($response['results'] as $account) {
        echo "Account: " . $account['name'] . " (ID: " . $account['id'] . ")\n";
    }
} catch (Exception $e) {
    echo "Error listing accounts: " . $e->getMessage() . "\n";
}
