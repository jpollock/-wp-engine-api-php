<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WPEngine\WPEngineSDK;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

// Initialize the SDK with credentials
$sdk = new WPEngineSDK();

// Example of handling invalid credentials
try {
    $sdk = new WPEngineSDK([
        'username' => 'invalid',
        'password' => 'invalid'
    ]);
    $sdk->sites->listSites();
} catch (ClientException $e) {
    if ($e->getResponse()->getStatusCode() === 401) {
        echo "Authentication failed: Invalid credentials\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example of handling invalid input parameters
try {
    // Try to create a site without required fields
    $sdk->sites->createSite([
        'name' => '' // Empty name is invalid
    ]);
} catch (ClientException $e) {
    if ($e->getResponse()->getStatusCode() === 400) {
        $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        echo "Validation error: " . $response['message'] . "\n";
        if (isset($response['errors'])) {
            foreach ($response['errors'] as $error) {
                echo "- Field '{$error['field']}': {$error['message']}\n";
            }
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example of handling rate limiting
try {
    // Make multiple rapid requests to trigger rate limiting
    for ($i = 0; $i < 10; $i++) {
        $sdk->status->status();
    }
} catch (\WPEngine\RateLimit\RateLimitException $e) {
    echo "Rate limit exceeded: " . $e->getMessage() . "\n";
    $stats = $sdk->getRateLimiterStats();
    echo "Wait time: {$stats['waitTime']}ms\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example of handling resource not found
try {
    // Try to get a non-existent site
    $sdk->sites->getSite('non-existent-id');
} catch (ClientException $e) {
    if ($e->getResponse()->getStatusCode() === 404) {
        echo "Resource not found: Site does not exist\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example of handling server errors
try {
    // This is just an example - in reality, server errors happen unexpectedly
    $sdk->sites->getSite('internal-server-error');
} catch (ServerException $e) {
    if ($e->getResponse()->getStatusCode() === 500) {
        echo "Server error occurred. Please try again later.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example of validating UUIDs
function isValidUUID($uuid) {
    return preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/', $uuid);
}

try {
    $invalidId = 'not-a-uuid';
    if (!isValidUUID($invalidId)) {
        throw new InvalidArgumentException('Invalid UUID format');
    }
    $sdk->sites->getSite($invalidId);
} catch (InvalidArgumentException $e) {
    echo "Validation error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example of handling multiple potential errors
try {
    $accountId = 'eeda3227-9a39-46ae-9e14-20958bb4e6c9';
    
    // Create a user with potentially invalid data
    $sdk->accountUsers->createAccountUser($accountId, [
        'user' => [
            'account_id' => $accountId,
            'first_name' => '', // Invalid: empty name
            'last_name' => 'Doe',
            'email' => 'invalid-email', // Invalid: bad email format
            'roles' => 'invalid-role' // Invalid: unknown role
        ]
    ]);
} catch (ClientException $e) {
    if ($e->getResponse()->getStatusCode() === 400) {
        $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        echo "Validation errors occurred:\n";
        if (isset($response['errors'])) {
            foreach ($response['errors'] as $error) {
                echo "- {$error['message']}\n";
            }
        } else {
            echo "- " . $response['message'] . "\n";
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example of proper error recovery
function createSiteWithRetry($sdk, $data, $maxAttempts = 3) {
    $attempts = 0;
    $lastError = null;

    while ($attempts < $maxAttempts) {
        try {
            return $sdk->sites->createSite($data);
        } catch (ServerException $e) {
            // Retry on server errors
            $attempts++;
            $lastError = $e;
            if ($attempts < $maxAttempts) {
                echo "Server error, retrying (attempt {$attempts} of {$maxAttempts})...\n";
                sleep(1); // Wait before retrying
            }
        } catch (ClientException $e) {
            // Don't retry client errors (4xx)
            throw $e;
        }
    }

    throw $lastError;
}

// Example usage of retry function
try {
    $site = createSiteWithRetry($sdk, [
        'name' => 'Example Site',
        'account_id' => 'eeda3227-9a39-46ae-9e14-20958bb4e6c9'
    ]);
    echo "Site created successfully\n";
} catch (Exception $e) {
    echo "Failed to create site after multiple attempts: " . $e->getMessage() . "\n";
}
