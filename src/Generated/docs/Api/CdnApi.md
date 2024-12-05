# WPEngineGenerated\CdnApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**checkStatus()**](CdnApi.md#checkStatus) | **POST** /installs/{install_id}/domains/{domain_id}/check_status | Check the status of a domain |


## `checkStatus()`

```php
checkStatus($installId, $domainId, $authorization): \WPEngineGenerated\Model\Domain
```

Check the status of a domain

Submits a request to check the status of the domain

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\CdnApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$domainId = e41fa98f-ea80-4654-b229-a9b765d0863a; // string | ID of domain
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->checkStatus($installId, $domainId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CdnApi->checkStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **domainId** | **string**| ID of domain | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Domain**](../Model/Domain.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
