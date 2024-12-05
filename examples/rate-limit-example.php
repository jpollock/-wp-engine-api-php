<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WPEngine\WPEngineSDK;
use WPEngine\RateLimit\RateLimitException;

// Initialize the SDK with a low rate limit for demonstration
$sdk = new WPEngineSDK(null, null, 'Default', [
    'maxRequestsPerSecond' => 2 // Set a low limit to demonstrate rate limiting
]);

// Function to make example API calls
function makeApiCall($sdk, $iteration) {
    try {
        $status = $sdk->status->status();
        echo "Call {$iteration} succeeded\n";
        
        // Get rate limiter stats
        $stats = $sdk->getRateLimiterStats();
        echo "Available tokens: {$stats['availableTokens']}\n";
        echo "Wait time: {$stats['waitTime']}ms\n\n";
    } catch (RateLimitException $e) {
        echo "Call {$iteration} rate limited: {$e->getMessage()}\n";
    } catch (Exception $e) {
        echo "Call {$iteration} failed: {$e->getMessage()}\n";
    }
}

// Make several rapid API calls to demonstrate rate limiting
echo "Making rapid API calls...\n\n";

for ($i = 1; $i <= 5; $i++) {
    makeApiCall($sdk, $i);
    
    // Small delay to make output more readable
    usleep(200000); // 200ms
}

// Example of handling rate limits in a loop with backoff
echo "\nMaking calls with backoff handling...\n\n";

for ($i = 1; $i <= 5; $i++) {
    $success = false;
    $attempts = 0;
    $maxAttempts = 3;
    
    while (!$success && $attempts < $maxAttempts) {
        try {
            $status = $sdk->status->status();
            echo "Call {$i} succeeded on attempt " . ($attempts + 1) . "\n";
            $success = true;
        } catch (RateLimitException $e) {
            $attempts++;
            $waitTime = $sdk->getRateLimiterStats()['waitTime'];
            
            if ($attempts < $maxAttempts) {
                echo "Rate limited, waiting {$waitTime}ms before retry...\n";
                usleep($waitTime * 1000); // Convert ms to microseconds
            } else {
                echo "Rate limited after {$maxAttempts} attempts, giving up.\n";
            }
        } catch (Exception $e) {
            echo "Call failed: {$e->getMessage()}\n";
            break;
        }
    }
}

// Example of pre-checking rate limit before making calls
echo "\nPre-checking rate limits...\n\n";

for ($i = 1; $i <= 3; $i++) {
    $stats = $sdk->getRateLimiterStats();
    
    if ($stats['availableTokens'] >= 1) {
        try {
            $status = $sdk->status->status();
            echo "Call {$i} succeeded (had {$stats['availableTokens']} tokens available)\n";
        } catch (Exception $e) {
            echo "Call failed: {$e->getMessage()}\n";
        }
    } else {
        echo "Skipping call {$i} (no tokens available, wait time: {$stats['waitTime']}ms)\n";
        usleep($stats['waitTime'] * 1000);
    }
}
