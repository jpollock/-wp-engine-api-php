<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WPEngine\WPEngineSDK;

// Initialize the SDK with credentials
$sdk = new WPEngineSDK();

// Example account ID (replace with a real one)
$accountId = 'eeda3227-9a39-46ae-9e14-20958bb4e6c9';

// Get current user
try {
    $currentUser = $sdk->users->getCurrentUser();
    echo "Current user:\n";
    echo "- Email: {$currentUser['email']}\n";
    echo "- Name: {$currentUser['first_name']} {$currentUser['last_name']}\n";
    if (isset($currentUser['phone_number'])) {
        echo "- Phone: {$currentUser['phone_number']}\n";
    }
    echo "\n";
} catch (Exception $e) {
    echo "Error getting current user: " . $e->getMessage() . "\n";
}

// List account users
try {
    $users = $sdk->accountUsers->listAccountUsers($accountId);
    echo "Account users:\n";
    foreach ($users['results'] as $user) {
        echo "- {$user['email']} ({$user['roles']})\n";
        echo "  * First Name: {$user['first_name']}\n";
        echo "  * Last Name: {$user['last_name']}\n";
        echo "  * MFA Enabled: " . ($user['mfa_enabled'] ? 'Yes' : 'No') . "\n";
        echo "  * Invite Accepted: " . ($user['invite_accepted'] ? 'Yes' : 'No') . "\n";
        
        // Show install access for partial access users
        if (!empty($user['installs'])) {
            echo "  * Install Access:\n";
            foreach ($user['installs'] as $install) {
                echo "    - {$install['name']} (ID: {$install['id']})\n";
            }
        }
        echo "\n";
    }
} catch (Exception $e) {
    echo "Error listing account users: " . $e->getMessage() . "\n";
}

// Create a new account user
try {
    $newUser = $sdk->accountUsers->createAccountUser($accountId, [
        'user' => [
            'account_id' => $accountId,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'roles' => 'partial'
        ]
    ]);
    
    echo "Created new user:\n";
    echo "- Email: {$newUser['account_user']['email']}\n";
    echo "- Roles: {$newUser['account_user']['roles']}\n";
    echo "- Message: {$newUser['message']}\n\n";

    // Get specific user details
    $userId = $newUser['account_user']['user_id'];
    $userDetails = $sdk->accountUsers->getAccountUser($accountId, $userId);
    echo "User details:\n";
    echo "- Name: {$userDetails['first_name']} {$userDetails['last_name']}\n";
    echo "- Email: {$userDetails['email']}\n";
    echo "- Roles: {$userDetails['roles']}\n\n";

    // Update user roles
    $updatedUser = $sdk->accountUsers->updateAccountUser($accountId, $userId, [
        'roles' => 'partial,billing'
    ]);
    echo "Updated user roles to: {$updatedUser['account_user']['roles']}\n\n";

    // Delete the user
    $sdk->accountUsers->deleteAccountUser($accountId, $userId);
    echo "Successfully deleted user\n";
} catch (Exception $e) {
    echo "Error in user management: " . $e->getMessage() . "\n";
}

// Example of managing SSH keys
try {
    // List SSH keys
    $response = $sdk->sshKeys->listSshKeys();
    echo "\nSSH Keys:\n";
    foreach ($response['results'] as $key) {
        echo "- {$key['comment']}\n";
        echo "  * Fingerprint: {$key['fingerprint']}\n";
        echo "  * Created: {$key['created_at']}\n";
    }

    // Add a new SSH key
    $newKey = $sdk->sshKeys->createSshKey([
        'public_key' => 'ssh-rsa AAAAB3NzaC1yc2EAAAADA... example@email.com'
    ]);
    echo "\nAdded new SSH key:\n";
    echo "- Comment: {$newKey['comment']}\n";
    echo "- Fingerprint: {$newKey['fingerprint']}\n";

    // Delete the SSH key
    $sdk->sshKeys->deleteSshKey($newKey['uuid']);
    echo "Successfully deleted SSH key\n";
} catch (Exception $e) {
    echo "Error managing SSH keys: " . $e->getMessage() . "\n";
}
