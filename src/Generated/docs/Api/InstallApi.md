# WPEngineGenerated\InstallApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createInstall()**](InstallApi.md#createInstall) | **POST** /installs | Create a new WordPress installation |
| [**deleteInstall()**](InstallApi.md#deleteInstall) | **DELETE** /installs/{install_id} | Delete an install by ID |
| [**getInstall()**](InstallApi.md#getInstall) | **GET** /installs/{install_id} | Get an install by ID |
| [**listInstalls()**](InstallApi.md#listInstalls) | **GET** /installs | List your WordPress installations |
| [**updateInstall()**](InstallApi.md#updateInstall) | **PATCH** /installs/{install_id} | Update a WordPress installation |


## `createInstall()`

```php
createInstall($body, $authorization): \WPEngineGenerated\Model\Installation
```

Create a new WordPress installation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\InstallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \WPEngineGenerated\Model\CreateInstallRequest(); // \WPEngineGenerated\Model\CreateInstallRequest | ##### Properties * name  - **required** - The name of the install * account_id - **required**  - The ID of the account that the install will belong to * site_id - **required for accounts with sites enabled** - The ID of the site that the install will belong to * environment - **required for accounts with sites enabled** - The site environment that the install will fill
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createInstall($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstallApi->createInstall: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**\WPEngineGenerated\Model\CreateInstallRequest**](../Model/CreateInstallRequest.md)| ##### Properties * name  - **required** - The name of the install * account_id - **required**  - The ID of the account that the install will belong to * site_id - **required for accounts with sites enabled** - The ID of the site that the install will belong to * environment - **required for accounts with sites enabled** - The site environment that the install will fill | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Installation**](../Model/Installation.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteInstall()`

```php
deleteInstall($installId, $authorization)
```

Delete an install by ID

This will delete the install, The delete is permanent and there is no confirmation prompt.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\InstallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$authorization = 'authorization_example'; // string

try {
    $apiInstance->deleteInstall($installId, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling InstallApi->deleteInstall: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **authorization** | **string**|  | [optional] |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInstall()`

```php
getInstall($installId, $authorization): \WPEngineGenerated\Model\Installation
```

Get an install by ID

Returns a single Install

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\InstallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getInstall($installId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstallApi->getInstall: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Installation**](../Model/Installation.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listInstalls()`

```php
listInstalls($authorization, $limit, $offset, $accountId): \WPEngineGenerated\Model\ListInstalls200Response
```

List your WordPress installations

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\InstallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$authorization = 'authorization_example'; // string
$limit = 100; // int | (Optional) The number of records to return
$offset = 0; // int | (Optional) The first record of the result set to be retrieved
$accountId = 'accountId_example'; // string | (Optional) The uuid of an account

try {
    $result = $apiInstance->listInstalls($authorization, $limit, $offset, $accountId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstallApi->listInstalls: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **authorization** | **string**|  | [optional] |
| **limit** | **int**| (Optional) The number of records to return | [optional] [default to 100] |
| **offset** | **int**| (Optional) The first record of the result set to be retrieved | [optional] [default to 0] |
| **accountId** | **string**| (Optional) The uuid of an account | [optional] |

### Return type

[**\WPEngineGenerated\Model\ListInstalls200Response**](../Model/ListInstalls200Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateInstall()`

```php
updateInstall($installId, $body, $authorization): \WPEngineGenerated\Model\Installation
```

Update a WordPress installation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\InstallApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | The install ID
$body = new \WPEngineGenerated\Model\UpdateInstallRequest(); // \WPEngineGenerated\Model\UpdateInstallRequest | ##### Properties * site_id - **optional** - The ID of the site that the install will belong to *(For accounts with sites enabled)* * environment - **optional** - The site environment that the install will fill *(For accounts with sites enabled)*
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->updateInstall($installId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InstallApi->updateInstall: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| The install ID | |
| **body** | [**\WPEngineGenerated\Model\UpdateInstallRequest**](../Model/UpdateInstallRequest.md)| ##### Properties * site_id - **optional** - The ID of the site that the install will belong to *(For accounts with sites enabled)* * environment - **optional** - The site environment that the install will fill *(For accounts with sites enabled)* | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Installation**](../Model/Installation.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
