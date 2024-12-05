# WPEngineGenerated\DomainApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**checkStatus()**](DomainApi.md#checkStatus) | **POST** /installs/{install_id}/domains/{domain_id}/check_status | Check the status of a domain |
| [**createBulkDomains()**](DomainApi.md#createBulkDomains) | **POST** /installs/{install_id}/domains/bulk | Add multiple domains and redirects to an existing install |
| [**createDomain()**](DomainApi.md#createDomain) | **POST** /installs/{install_id}/domains | Add a new domain or redirect to an existing install |
| [**deleteDomain()**](DomainApi.md#deleteDomain) | **DELETE** /installs/{install_id}/domains/{domain_id} | Delete a specific domain for an install |
| [**getDomain()**](DomainApi.md#getDomain) | **GET** /installs/{install_id}/domains/{domain_id} | Get a specific domain for an install |
| [**listDomains()**](DomainApi.md#listDomains) | **GET** /installs/{install_id}/domains | Get the domains for an install by install id |
| [**updateDomain()**](DomainApi.md#updateDomain) | **PATCH** /installs/{install_id}/domains/{domain_id} | Set an existing domain as primary |


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


$apiInstance = new WPEngineGenerated\Api\DomainApi(
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
    echo 'Exception when calling DomainApi->checkStatus: ', $e->getMessage(), PHP_EOL;
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

## `createBulkDomains()`

```php
createBulkDomains($installId, $body, $authorization): \WPEngineGenerated\Model\DomainOrRedirect
```

Add multiple domains and redirects to an existing install

Adds multiple domains and redirects to a specific install

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$body = new \WPEngineGenerated\Model\CreateBulkDomainsRequest(); // \WPEngineGenerated\Model\CreateBulkDomainsRequest | ##### Properties * domains - **required** - array of domains to be created, min size: 1, max size: 20   * items:     * name  - **required** - The name of the new domain (or redirect)     * redirect_to - **optional**  - Name of the domain to set redirect to
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createBulkDomains($installId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->createBulkDomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **body** | [**\WPEngineGenerated\Model\CreateBulkDomainsRequest**](../Model/CreateBulkDomainsRequest.md)| ##### Properties * domains - **required** - array of domains to be created, min size: 1, max size: 20   * items:     * name  - **required** - The name of the new domain (or redirect)     * redirect_to - **optional**  - Name of the domain to set redirect to | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\DomainOrRedirect**](../Model/DomainOrRedirect.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createDomain()`

```php
createDomain($installId, $body, $authorization): \WPEngineGenerated\Model\Domain
```

Add a new domain or redirect to an existing install

Adds a domain or redirect to a specific install and optionally sets it as the primary domain

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$body = new \WPEngineGenerated\Model\CreateDomainRequest(); // \WPEngineGenerated\Model\CreateDomainRequest | ##### Properties * name  - **required** - The name of the new domain * primary - **optional**  - Sets the domain as the primary domain on the install * redirect_to - **optional** - ID of a domain to create a redirect to
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createDomain($installId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->createDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **body** | [**\WPEngineGenerated\Model\CreateDomainRequest**](../Model/CreateDomainRequest.md)| ##### Properties * name  - **required** - The name of the new domain * primary - **optional**  - Sets the domain as the primary domain on the install * redirect_to - **optional** - ID of a domain to create a redirect to | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Domain**](../Model/Domain.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDomain()`

```php
deleteDomain($installId, $domainId, $authorization)
```

Delete a specific domain for an install

Delete specific domain for an install

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$domainId = e41fa98f-ea80-4654-b229-a9b765d0863a; // string | ID of domain
$authorization = 'authorization_example'; // string

try {
    $apiInstance->deleteDomain($installId, $domainId, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->deleteDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **domainId** | **string**| ID of domain | |
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

## `getDomain()`

```php
getDomain($installId, $domainId, $authorization): \WPEngineGenerated\Model\Domain
```

Get a specific domain for an install

Returns specific domain for an install

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$domainId = e41fa98f-ea80-4654-b229-a9b765d0863a; // string | ID of domain
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getDomain($installId, $domainId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->getDomain: ', $e->getMessage(), PHP_EOL;
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

## `listDomains()`

```php
listDomains($installId, $authorization, $limit, $offset): \WPEngineGenerated\Model\ListDomains200Response
```

Get the domains for an install by install id

Returns domains for a specific install

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | ID of install
$authorization = 'authorization_example'; // string
$limit = 100; // int | (Optional) The number of records to return
$offset = 0; // int | (Optional) The first record of the result set to be retrieved

try {
    $result = $apiInstance->listDomains($installId, $authorization, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->listDomains: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| ID of install | |
| **authorization** | **string**|  | [optional] |
| **limit** | **int**| (Optional) The number of records to return | [optional] [default to 100] |
| **offset** | **int**| (Optional) The first record of the result set to be retrieved | [optional] [default to 0] |

### Return type

[**\WPEngineGenerated\Model\ListDomains200Response**](../Model/ListDomains200Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateDomain()`

```php
updateDomain($installId, $domainId, $body, $authorization): \WPEngineGenerated\Model\Domain
```

Set an existing domain as primary

Sets a domain as the primary. Cannot set a duplicate, wildcard, or redirected domain as the primary.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\DomainApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$installId = 294deacc-d8b8-4005-82c4-0727ba8ddde0; // string | The install ID
$domainId = e41fa98f-ea80-4654-b229-a9b765d0863a; // string | ID of domain
$body = new \WPEngineGenerated\Model\UpdateDomainRequest(); // \WPEngineGenerated\Model\UpdateDomainRequest | ##### Properties * primary - **optional** - Boolean value to make the domain primary on the given install * redirect_to - **optional** - The UUID of another Domain record, or \"nil\" to remove an existing redirect.
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->updateDomain($installId, $domainId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DomainApi->updateDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **installId** | **string**| The install ID | |
| **domainId** | **string**| ID of domain | |
| **body** | [**\WPEngineGenerated\Model\UpdateDomainRequest**](../Model/UpdateDomainRequest.md)| ##### Properties * primary - **optional** - Boolean value to make the domain primary on the given install * redirect_to - **optional** - The UUID of another Domain record, or \&quot;nil\&quot; to remove an existing redirect. | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\Domain**](../Model/Domain.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
