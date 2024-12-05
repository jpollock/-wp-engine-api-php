# WPEngineGenerated\BackupApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createBackup()**](BackupApi.md#createBackup) | **POST** /installs/{install_id}/backups | Requests a new backup of a WordPress installation |
| [**showBackup()**](BackupApi.md#showBackup) | **GET** /installs/{install_id}/backups/{backup_id} | Retreives the status of a backup of a WordPress installation |


## `createBackup()`

```php
createBackup($installId, $body, $authorization): \WPEngineGenerated\Model\Backup
```

Requests a new backup of a WordPress installation

Kicks off a backup of a WordPress installation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$body = new \WPEngineGenerated\Model\CreateBackupRequest(); // \WPEngineGenerated\Model\CreateBackupRequest | ##### Properties * description - **required**  - A description of this backup. * notification_emails - **required** - The email address(es) that will receive an email once the backup has completed.
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createBackup($installId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->createBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **body** | [**\WPEngineGenerated\Model\CreateBackupRequest**](../Model/CreateBackupRequest.md)| ##### Properties * description - **required**  - A description of this backup. * notification_emails - **required** - The email address(es) that will receive an email once the backup has completed. | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Backup**](../Model/Backup.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `showBackup()`

```php
showBackup($installId, $backupId, $authorization): \WPEngineGenerated\Model\Backup
```

Retreives the status of a backup of a WordPress installation

Retrieves the status of a backup of a WordPress installation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\BackupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$backupId = e41fa98f-ea80-4654-b229-a9b765d0863a; // string | ID of backup
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->showBackup($installId, $backupId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BackupApi->showBackup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **backupId** | **string**| ID of backup | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Backup**](../Model/Backup.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
