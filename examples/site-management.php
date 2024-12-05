<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WPEngine\WPEngineSDK;

// Initialize the SDK with credentials
$sdk = new WPEngineSDK([
    'username' => 'your-username',
    'password' => 'your-password'
]);

// Example account ID (replace with a real one)
$accountId = 'eeda3227-9a39-46ae-9e14-20958bb4e6c9';

// List all sites
try {
    $response = $sdk->sites->listSites();
    echo "Found {$response['count']} sites:\n";
    foreach ($response['results'] as $site) {
        echo "- {$site['name']} (ID: {$site['id']})\n";
    }
    echo "\n";
} catch (Exception $e) {
    echo "Error listing sites: " . $e->getMessage() . "\n";
}

// Create a new site
try {
    $newSite = $sdk->sites->createSite([
        'name' => 'Example Site ' . date('Y-m-d'),
        'account_id' => $accountId
    ]);
    
    echo "Created new site:\n";
    echo "- Name: {$newSite['name']}\n";
    echo "- ID: {$newSite['id']}\n\n";

    // Get the site details
    $site = $sdk->sites->getSite($newSite['id']);
    echo "Site details:\n";
    echo "- Name: {$site['name']}\n";
    echo "- Account ID: {$site['account']['id']}\n";
    if (!empty($site['installs'])) {
        echo "- Installations:\n";
        foreach ($site['installs'] as $install) {
            echo "  * {$install['name']} ({$install['environment']})\n";
        }
    }
    echo "\n";

    // Update the site name
    $updatedSite = $sdk->sites->updateSite($newSite['id'], [
        'name' => 'Updated Example Site'
    ]);
    echo "Updated site name to: {$updatedSite['name']}\n\n";

    // Delete the site
    $sdk->sites->deleteSite($newSite['id']);
    echo "Successfully deleted site\n";
} catch (Exception $e) {
    echo "Error in site management: " . $e->getMessage() . "\n";
}

// List sites with pagination
try {
    echo "\nListing sites with pagination:\n";
    $limit = 2;
    $offset = 0;

    do {
        $response = $sdk->sites->listSites([
            'limit' => $limit,
            'offset' => $offset
        ]);

        foreach ($response['results'] as $site) {
            echo "- {$site['name']} (ID: {$site['id']})\n";
        }

        $offset += $limit;
        echo "Page complete. ";
        
        if ($response['next']) {
            echo "More results available...\n";
        } else {
            echo "No more results.\n";
            break;
        }
    } while ($response['next']);
} catch (Exception $e) {
    echo "Error in paginated listing: " . $e->getMessage() . "\n";
}

// List sites for a specific account
try {
    echo "\nListing sites for account {$accountId}:\n";
    $response = $sdk->sites->listSites([
        'account_id' => $accountId
    ]);

    foreach ($response['results'] as $site) {
        echo "- {$site['name']} (ID: {$site['id']})\n";
        
        // Show installations if any
        if (!empty($site['installs'])) {
            foreach ($site['installs'] as $install) {
                echo "  * Install: {$install['name']} ({$install['environment']})\n";
                if (!empty($install['primary_domain'])) {
                    echo "    Domain: {$install['primary_domain']}\n";
                }
            }
        }
    }
} catch (Exception $e) {
    echo "Error listing account sites: " . $e->getMessage() . "\n";
}
