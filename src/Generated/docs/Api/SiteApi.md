# WPEngineGenerated\SiteApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createSite()**](SiteApi.md#createSite) | **POST** /sites | Create a new site |
| [**deleteSite()**](SiteApi.md#deleteSite) | **DELETE** /sites/{site_id} | Delete a site |
| [**getSite()**](SiteApi.md#getSite) | **GET** /sites/{site_id} | Get a site by ID |
| [**listSites()**](SiteApi.md#listSites) | **GET** /sites | List your sites |
| [**updateSite()**](SiteApi.md#updateSite) | **PATCH** /sites/{site_id} | Change a site name |


## `createSite()`

```php
createSite($body, $authorization): \WPEngineGenerated\Model\Site
```

Create a new site

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SiteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \WPEngineGenerated\Model\CreateSiteRequest(); // \WPEngineGenerated\Model\CreateSiteRequest | ##### Properties * name - **required** - The name of the site * account_id - **required** - The ID of the account that the site will belong to
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createSite($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SiteApi->createSite: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **body** | [**\WPEngineGenerated\Model\CreateSiteRequest**](../Model/CreateSiteRequest.md)| ##### Properties * name - **required** - The name of the site * account_id - **required** - The ID of the account that the site will belong to | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Site**](../Model/Site.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteSite()`

```php
deleteSite($siteId, $authorization)
```

Delete a site

This will delete the site and any installs associated with this site. This delete is permanent and there is no confirmation prompt.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SiteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$siteId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | The ID of the site to delete *(For accounts with sites enabled)*
$authorization = 'authorization_example'; // string

try {
    $apiInstance->deleteSite($siteId, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling SiteApi->deleteSite: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **siteId** | **string**| The ID of the site to delete *(For accounts with sites enabled)* | |
| **authorization** | **string**|  | [optional] |

### Return type

void (empty response body)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getSite()`

```php
getSite($siteId, $authorization): \WPEngineGenerated\Model\Site
```

Get a site by ID

Returns a single site

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SiteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$siteId = a1b2c3d4-e5f6-41b2-b3d4-e5f6a1b2c3d4; // string | The site ID
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getSite($siteId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SiteApi->getSite: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **siteId** | **string**| The site ID | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Site**](../Model/Site.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSites()`

```php
listSites($authorization, $limit, $offset, $accountId): \WPEngineGenerated\Model\ListSites200Response
```

List your sites

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SiteApi(
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
    $result = $apiInstance->listSites($authorization, $limit, $offset, $accountId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SiteApi->listSites: ', $e->getMessage(), PHP_EOL;
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

[**\WPEngineGenerated\Model\ListSites200Response**](../Model/ListSites200Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateSite()`

```php
updateSite($siteId, $body, $authorization): \WPEngineGenerated\Model\Site
```

Change a site name

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\SiteApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$siteId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | The ID of the site to change the name of *(For accounts with sites enabled)*
$body = new \WPEngineGenerated\Model\UpdateSiteRequest(); // \WPEngineGenerated\Model\UpdateSiteRequest | ##### Properties * name - The new name for the site
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->updateSite($siteId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SiteApi->updateSite: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **siteId** | **string**| The ID of the site to change the name of *(For accounts with sites enabled)* | |
| **body** | [**\WPEngineGenerated\Model\UpdateSiteRequest**](../Model/UpdateSiteRequest.md)| ##### Properties * name - The new name for the site | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Site**](../Model/Site.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
