# WPEngineGenerated\AccountUserApi

All URIs are relative to https://api.wpengineapi.com/v1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAccountUser()**](AccountUserApi.md#createAccountUser) | **POST** /accounts/{account_id}/account_users | Create a new account user |
| [**deleteAccountUser()**](AccountUserApi.md#deleteAccountUser) | **DELETE** /accounts/{account_id}/account_users/{user_id} | Delete an account user |
| [**getAccountUser()**](AccountUserApi.md#getAccountUser) | **GET** /accounts/{account_id}/account_users/{user_id} | Get an account user by ID |
| [**listAccountUsers()**](AccountUserApi.md#listAccountUsers) | **GET** /accounts/{account_id}/account_users | List your account users |
| [**updateAccountUser()**](AccountUserApi.md#updateAccountUser) | **PATCH** /accounts/{account_id}/account_users/{user_id} | Update an account user |


## `createAccountUser()`

```php
createAccountUser($accountId, $body, $authorization): \WPEngineGenerated\Model\CreateAccountUser201Response
```

Create a new account user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\AccountUserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accountId = eeda3227-9a39-46ae-9e14-20958bb4e6c9; // string | ID of account
$body = new \WPEngineGenerated\Model\CreateAccountUserRequest(); // \WPEngineGenerated\Model\CreateAccountUserRequest | ##### Properties * user - **required** - The user that will be created   * account_id - **required** - The ID of the account that the account_user will belong to   * first_name - **required** - The first name of the user   * last_name - **required** - The last name of the user   * email - **required** - The email of the user   * roles -- **required** - The roles the user is allowed. The following roles are valid     * owner     * full     * full,billing     * partial     * partial,billing   * install_ids - **optional** - Used with partial role selection. The ids of the installs the user will have access to.
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->createAccountUser($accountId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUserApi->createAccountUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accountId** | **string**| ID of account | |
| **body** | [**\WPEngineGenerated\Model\CreateAccountUserRequest**](../Model/CreateAccountUserRequest.md)| ##### Properties * user - **required** - The user that will be created   * account_id - **required** - The ID of the account that the account_user will belong to   * first_name - **required** - The first name of the user   * last_name - **required** - The last name of the user   * email - **required** - The email of the user   * roles -- **required** - The roles the user is allowed. The following roles are valid     * owner     * full     * full,billing     * partial     * partial,billing   * install_ids - **optional** - Used with partial role selection. The ids of the installs the user will have access to. | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\CreateAccountUser201Response**](../Model/CreateAccountUser201Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteAccountUser()`

```php
deleteAccountUser($accountId, $userId, $authorization)
```

Delete an account user

This will remove the association this user has to this account. This delete is permanent and there is no confirmation prompt.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\AccountUserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accountId = eeda3227-9a39-46ae-9e14-20958bb4e6c9; // string | ID of account
$userId = a1b2c3d4-e5f6-41b2-b3d4-e5f6a1b2c3d4; // string | ID of the user
$authorization = 'authorization_example'; // string

try {
    $apiInstance->deleteAccountUser($accountId, $userId, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling AccountUserApi->deleteAccountUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accountId** | **string**| ID of account | |
| **userId** | **string**| ID of the user | |
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

## `getAccountUser()`

```php
getAccountUser($accountId, $userId, $authorization): \WPEngineGenerated\Model\AccountUser
```

Get an account user by ID

Returns a single account user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\AccountUserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accountId = eeda3227-9a39-46ae-9e14-20958bb4e6c9; // string | ID of account
$userId = a1b2c3d4-e5f6-41b2-b3d4-e5f6a1b2c3d4; // string | ID of the user
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->getAccountUser($accountId, $userId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUserApi->getAccountUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accountId** | **string**| ID of account | |
| **userId** | **string**| ID of the user | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\AccountUser**](../Model/AccountUser.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAccountUsers()`

```php
listAccountUsers($accountId, $authorization): \WPEngineGenerated\Model\ListAccountUsers200Response
```

List your account users

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\AccountUserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accountId = eeda3227-9a39-46ae-9e14-20958bb4e6c9; // string | ID of account
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->listAccountUsers($accountId, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUserApi->listAccountUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accountId** | **string**| ID of account | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\ListAccountUsers200Response**](../Model/ListAccountUsers200Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateAccountUser()`

```php
updateAccountUser($accountId, $userId, $body, $authorization): \WPEngineGenerated\Model\CreateAccountUser201Response
```

Update an account user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basicAuth
$config = WPEngineGenerated\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WPEngineGenerated\Api\AccountUserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$accountId = eeda3227-9a39-46ae-9e14-20958bb4e6c9; // string | ID of account
$userId = a1b2c3d4-e5f6-41b2-b3d4-e5f6a1b2c3d4; // string | ID of the user
$body = new \WPEngineGenerated\Model\UpdateAccountUserRequest(); // \WPEngineGenerated\Model\UpdateAccountUserRequest | ##### Properties * roles -- **required** - The roles the user is allowed. The following roles are valid   * owner   * full   * full,billing   * partial   * partial,billing * install_ids - **optional** - Used with partial role selection. The ids of the installs the user will have access to.
$authorization = 'authorization_example'; // string

try {
    $result = $apiInstance->updateAccountUser($accountId, $userId, $body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountUserApi->updateAccountUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **accountId** | **string**| ID of account | |
| **userId** | **string**| ID of the user | |
| **body** | [**\WPEngineGenerated\Model\UpdateAccountUserRequest**](../Model/UpdateAccountUserRequest.md)| ##### Properties * roles -- **required** - The roles the user is allowed. The following roles are valid   * owner   * full   * full,billing   * partial   * partial,billing * install_ids - **optional** - Used with partial role selection. The ids of the installs the user will have access to. | |
| **authorization** | **string**|  | [optional] |

### Return type

[**\WPEngineGenerated\Model\CreateAccountUser201Response**](../Model/CreateAccountUser201Response.md)

### Authorization

[basicAuth](../../README.md#basicAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
