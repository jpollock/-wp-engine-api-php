# WPEngineGenerated\CacheApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**purgeCache()**](CacheApi.md#purgeCache) | **POST** /installs/{install_id}/purge_cache | Purge an install&#39;s cache |


## `purgeCache()`

```php
purgeCache($installId, $body, $authorization)
```

Purge an install's cache

This will purge the specified cache associated with the install

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\CacheApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$body = new \WPEngineGenerated\Model\PurgeCacheRequest(); // \WPEngineGenerated\Model\PurgeCacheRequest | ##### Properties * type - **required**  - The type of cache to be purged
$authorization = 'authorization_example'; // string

try {
    $apiInstance->purgeCache($installId, $body, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling CacheApi->purgeCache: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **body** | [**\WPEngineGenerated\Model\PurgeCacheRequest**](../Model/PurgeCacheRequest.md)| ##### Properties * type - **required**  - The type of cache to be purged | |
| **authorization** | **string**|  | [optional] |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
