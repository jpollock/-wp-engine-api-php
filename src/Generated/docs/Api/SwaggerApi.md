# WPEngineGenerated\SwaggerApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**swagger()**](SwaggerApi.md#swagger) | **GET** /swagger | The current swagger specification |


## `swagger()`

```php
swagger()
```

The current swagger specification

# Description This will output the current swagger specification

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new WPEngineGenerated\Api\SwaggerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->swagger();
} catch (Exception $e) {
    echo 'Exception when calling SwaggerApi->swagger: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
