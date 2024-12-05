# WPEngineGenerated\SshKeyApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSshKey()**](SshKeyApi.md#createSshKey) | **POST** /ssh_keys | Add a new SSH key |
| [**deleteSshKey()**](SshKeyApi.md#deleteSshKey) | **DELETE** /ssh_keys/{ssh_key_id} | Delete an existing SSH key |
| [**listSshKeys()**](SshKeyApi.md#listSshKeys) | **GET** /ssh_keys | Get your SSH keys |


## `createSshKey()`

```php
createSshKey($body, $authorization): \WPEngineGenerated\Model\SshKey
```

Add a new SSH key

# Description Use this to add a new SSH key to WP Engine.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SshKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \WPEngineGenerated\Model\CreateSshKeyRequest(); // \WPEngineGenerated\Model\CreateSshKeyRequest | ##### Properties * public_key - **required** - The public key you want to add
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createSshKey($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SshKeyApi->createSshKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**\WPEngineGenerated\Model\CreateSshKeyRequest**](../Model/CreateSshKeyRequest.md)| ##### Properties * public_key - **required** - The public key you want to add | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\SshKey**](../Model/SshKey.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSshKey()`

```php
deleteSshKey($sshKeyId, $authorization)
```

Delete an existing SSH key

# Description This will delete the SSH key.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SshKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$sshKeyId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | The ID of the SSH key to delete
$authorization = 'authorization_example'; // string

try {
    $apiInstance->deleteSshKey($sshKeyId, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling SshKeyApi->deleteSshKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **sshKeyId** | **string**| The ID of the SSH key to delete | |
| **authorization** | **string**|  | [optional] |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSshKeys()`

```php
listSshKeys($authorization, $limit, $offset): \WPEngineGenerated\Model\ListSshKeys200Response
```

Get your SSH keys

# Description Use this to list the SSH keys that you've added to WP Engine.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SshKeyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$authorization = 'authorization_example'; // string
$limit = 100; // int | (Optional) The number of records to return
$offset = 0; // int | (Optional) The first record of the result set to be retrieved

try {
    $result = $apiInstance->listSshKeys($authorization, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SshKeyApi->listSshKeys: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authorization** | **string**|  | [optional] |
| **limit** | **int**| (Optional) The number of records to return | [optional] [default to 100] |
| **offset** | **int**| (Optional) The first record of the result set to be retrieved | [optional] [default to 0] |

### Return type

[**\WPEngineGenerated\Model\ListSshKeys200Response**](../Model/ListSshKeys200Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
