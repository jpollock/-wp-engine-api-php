<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WPEngine\WPEngineSDK;

// Initialize the SDK with credentials
$sdk = new WPEngineSDK([
    'username' => 'your-username',
    'password' => 'your-password'
]);

// Example install ID (replace with a real one)
$installId = '294deacc-d8b8-4005-82c4-0727ba8ddde0';

// Create a backup
try {
    $backup = $sdk->backups->createBackup($installId, [
        'description' => 'Example backup via PHP SDK',
        'notification_emails' => ['admin@example.com']
    ]);
    
    echo "Backup created with ID: " . $backup['id'] . "\n";
    echo "Status: " . $backup['status'] . "\n";

    // Get backup status
    $backupStatus = $sdk->backups->showBackup($installId, $backup['id']);
    echo "Current backup status: " . $backupStatus['status'] . "\n";
} catch (Exception $e) {
    echo "Error managing backup: " . $e->getMessage() . "\n";
}

// Example of checking backup status in a loop (with timeout)
function waitForBackupCompletion($sdk, $installId, $backupId, $timeoutSeconds = 300) {
    $startTime = time();
    $status = '';

    while (time() - $startTime < $timeoutSeconds) {
        try {
            $backup = $sdk->backups->showBackup($installId, $backupId);
            $status = $backup['status'];

            echo "Backup status: " . $status . "\n";

            if ($status === 'complete' || $status === 'failed') {
                break;
            }

            // Wait 5 seconds before checking again
            sleep(5);
        } catch (Exception $e) {
            echo "Error checking backup status: " . $e->getMessage() . "\n";
            break;
        }
    }

    return $status;
}

// Example usage of the waitForBackupCompletion function
try {
    $backup = $sdk->backups->createBackup($installId, [
        'description' => 'Example backup with status monitoring',
        'notification_emails' => ['admin@example.com']
    ]);

    echo "Created backup with ID: " . $backup['id'] . "\n";
    
    $finalStatus = waitForBackupCompletion($sdk, $installId, $backup['id']);
    echo "Final backup status: " . $finalStatus . "\n";
} catch (Exception $e) {
    echo "Error in backup process: " . $e->getMessage() . "\n";
}
