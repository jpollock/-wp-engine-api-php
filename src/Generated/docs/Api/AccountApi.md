# WPEngineGenerated\AccountApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAccount()**](AccountApi.md#getAccount) | **GET** /accounts/{account_id} | Get an account by ID |
| [**listAccounts()**](AccountApi.md#listAccounts) | **GET** /accounts | List your WP Engine accounts |


## `getAccount()`

```php
getAccount($accountId, $authorization): \WPEngineGenerated\Model\Account
```

Get an account by ID

Returns a single Account

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accountId = eeda3227-9a39-46ae-9e14-20958bb4e6c9; // string | ID of account
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getAccount($accountId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accountId** | **string**| ID of account | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Account**](../Model/Account.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAccounts()`

```php
listAccounts($authorization, $limit, $offset): \WPEngineGenerated\Model\ListAccounts200Response
```

List your WP Engine accounts

# Description Use this to list your WP Engine accounts.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\AccountApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$authorization = 'authorization_example'; // string
$limit = 100; // int | (Optional) The number of records to return
$offset = 0; // int | (Optional) The first record of the result set to be retrieved

try {
    $result = $apiInstance->listAccounts($authorization, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountApi->listAccounts: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authorization** | **string**|  | [optional] |
| **limit** | **int**| (Optional) The number of records to return | [optional] [default to 100] |
| **offset** | **int**| (Optional) The first record of the result set to be retrieved | [optional] [default to 0] |

### Return type

[**\WPEngineGenerated\Model\ListAccounts200Response**](../Model/ListAccounts200Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
