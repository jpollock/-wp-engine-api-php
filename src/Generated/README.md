# OpenAPIClient-php

The API described in this document is subject to change.



## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## API Endpoints

All URIs are relative to *https://api.wpengineapi.com/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountApi* | [**getAccount**](docs/Api/AccountApi.md#getaccount) | **GET** /accounts/{account_id} | Get an account by ID
*AccountApi* | [**listAccounts**](docs/Api/AccountApi.md#listaccounts) | **GET** /accounts | List your WP Engine accounts
*AccountUserApi* | [**createAccountUser**](docs/Api/AccountUserApi.md#createaccountuser) | **POST** /accounts/{account_id}/account_users | Create a new account user
*AccountUserApi* | [**deleteAccountUser**](docs/Api/AccountUserApi.md#deleteaccountuser) | **DELETE** /accounts/{account_id}/account_users/{user_id} | Delete an account user
*AccountUserApi* | [**getAccountUser**](docs/Api/AccountUserApi.md#getaccountuser) | **GET** /accounts/{account_id}/account_users/{user_id} | Get an account user by ID
*AccountUserApi* | [**listAccountUsers**](docs/Api/AccountUserApi.md#listaccountusers) | **GET** /accounts/{account_id}/account_users | List your account users
*AccountUserApi* | [**updateAccountUser**](docs/Api/AccountUserApi.md#updateaccountuser) | **PATCH** /accounts/{account_id}/account_users/{user_id} | Update an account user
*BackupApi* | [**createBackup**](docs/Api/BackupApi.md#createbackup) | **POST** /installs/{install_id}/backups | Requests a new backup of a WordPress installation
*BackupApi* | [**showBackup**](docs/Api/BackupApi.md#showbackup) | **GET** /installs/{install_id}/backups/{backup_id} | Retreives the status of a backup of a WordPress installation
*CacheApi* | [**purgeCache**](docs/Api/CacheApi.md#purgecache) | **POST** /installs/{install_id}/purge_cache | Purge an install&#39;s cache
*CdnApi* | [**checkStatus**](docs/Api/CdnApi.md#checkstatus) | **POST** /installs/{install_id}/domains/{domain_id}/check_status | Check the status of a domain
*DomainApi* | [**checkStatus**](docs/Api/DomainApi.md#checkstatus) | **POST** /installs/{install_id}/domains/{domain_id}/check_status | Check the status of a domain
*DomainApi* | [**createBulkDomains**](docs/Api/DomainApi.md#createbulkdomains) | **POST** /installs/{install_id}/domains/bulk | Add multiple domains and redirects to an existing install
*DomainApi* | [**createDomain**](docs/Api/DomainApi.md#createdomain) | **POST** /installs/{install_id}/domains | Add a new domain or redirect to an existing install
*DomainApi* | [**deleteDomain**](docs/Api/DomainApi.md#deletedomain) | **DELETE** /installs/{install_id}/domains/{domain_id} | Delete a specific domain for an install
*DomainApi* | [**getDomain**](docs/Api/DomainApi.md#getdomain) | **GET** /installs/{install_id}/domains/{domain_id} | Get a specific domain for an install
*DomainApi* | [**listDomains**](docs/Api/DomainApi.md#listdomains) | **GET** /installs/{install_id}/domains | Get the domains for an install by install id
*DomainApi* | [**updateDomain**](docs/Api/DomainApi.md#updatedomain) | **PATCH** /installs/{install_id}/domains/{domain_id} | Set an existing domain as primary
*InstallApi* | [**createInstall**](docs/Api/InstallApi.md#createinstall) | **POST** /installs | Create a new WordPress installation
*InstallApi* | [**deleteInstall**](docs/Api/InstallApi.md#deleteinstall) | **DELETE** /installs/{install_id} | Delete an install by ID
*InstallApi* | [**getInstall**](docs/Api/InstallApi.md#getinstall) | **GET** /installs/{install_id} | Get an install by ID
*InstallApi* | [**listInstalls**](docs/Api/InstallApi.md#listinstalls) | **GET** /installs | List your WordPress installations
*InstallApi* | [**updateInstall**](docs/Api/InstallApi.md#updateinstall) | **PATCH** /installs/{install_id} | Update a WordPress installation
*SiteApi* | [**createSite**](docs/Api/SiteApi.md#createsite) | **POST** /sites | Create a new site
*SiteApi* | [**deleteSite**](docs/Api/SiteApi.md#deletesite) | **DELETE** /sites/{site_id} | Delete a site
*SiteApi* | [**getSite**](docs/Api/SiteApi.md#getsite) | **GET** /sites/{site_id} | Get a site by ID
*SiteApi* | [**listSites**](docs/Api/SiteApi.md#listsites) | **GET** /sites | List your sites
*SiteApi* | [**updateSite**](docs/Api/SiteApi.md#updatesite) | **PATCH** /sites/{site_id} | Change a site name
*SshKeyApi* | [**createSshKey**](docs/Api/SshKeyApi.md#createsshkey) | **POST** /ssh_keys | Add a new SSH key
*SshKeyApi* | [**deleteSshKey**](docs/Api/SshKeyApi.md#deletesshkey) | **DELETE** /ssh_keys/{ssh_key_id} | Delete an existing SSH key
*SshKeyApi* | [**listSshKeys**](docs/Api/SshKeyApi.md#listsshkeys) | **GET** /ssh_keys | Get your SSH keys
*StatusApi* | [**status**](docs/Api/StatusApi.md#status) | **GET** /status | The status of the WP Engine Public API
*SwaggerApi* | [**swagger**](docs/Api/SwaggerApi.md#swagger) | **GET** /swagger | The current swagger specification
*UserApi* | [**getCurrentUser**](docs/Api/UserApi.md#getcurrentuser) | **GET** /user | Get the current user

## Models

- [Account](docs/Model/Account.md)
- [AccountUser](docs/Model/AccountUser.md)
- [AccountUserInstallsInner](docs/Model/AccountUserInstallsInner.md)
- [AuthenticationErrorResponse](docs/Model/AuthenticationErrorResponse.md)
- [Backup](docs/Model/Backup.md)
- [BadRequestErrorResponse](docs/Model/BadRequestErrorResponse.md)
- [CheckStatus429Response](docs/Model/CheckStatus429Response.md)
- [CreateAccountUser201Response](docs/Model/CreateAccountUser201Response.md)
- [CreateAccountUserRequest](docs/Model/CreateAccountUserRequest.md)
- [CreateAccountUserRequestUser](docs/Model/CreateAccountUserRequestUser.md)
- [CreateBackupRequest](docs/Model/CreateBackupRequest.md)
- [CreateBulkDomainsRequest](docs/Model/CreateBulkDomainsRequest.md)
- [CreateBulkDomainsRequestDomainsInner](docs/Model/CreateBulkDomainsRequestDomainsInner.md)
- [CreateDomainRequest](docs/Model/CreateDomainRequest.md)
- [CreateInstallRequest](docs/Model/CreateInstallRequest.md)
- [CreateSiteRequest](docs/Model/CreateSiteRequest.md)
- [CreateSshKeyRequest](docs/Model/CreateSshKeyRequest.md)
- [Domain](docs/Model/Domain.md)
- [DomainOrRedirect](docs/Model/DomainOrRedirect.md)
- [DomainRedirectsToInner](docs/Model/DomainRedirectsToInner.md)
- [ForbiddenErrorResponse](docs/Model/ForbiddenErrorResponse.md)
- [Installation](docs/Model/Installation.md)
- [InstallationAccount](docs/Model/InstallationAccount.md)
- [InstallationSite](docs/Model/InstallationSite.md)
- [InternalServerErrorResponse](docs/Model/InternalServerErrorResponse.md)
- [ListAccountUsers200Response](docs/Model/ListAccountUsers200Response.md)
- [ListAccounts200Response](docs/Model/ListAccounts200Response.md)
- [ListDomains200Response](docs/Model/ListDomains200Response.md)
- [ListInstalls200Response](docs/Model/ListInstalls200Response.md)
- [ListSites200Response](docs/Model/ListSites200Response.md)
- [ListSshKeys200Response](docs/Model/ListSshKeys200Response.md)
- [NotFoundErrorResponse](docs/Model/NotFoundErrorResponse.md)
- [PurgeCache429Response](docs/Model/PurgeCache429Response.md)
- [PurgeCacheRequest](docs/Model/PurgeCacheRequest.md)
- [ResourceError](docs/Model/ResourceError.md)
- [Site](docs/Model/Site.md)
- [SiteInstallsInner](docs/Model/SiteInstallsInner.md)
- [SshKey](docs/Model/SshKey.md)
- [Status](docs/Model/Status.md)
- [UpdateAccountUserRequest](docs/Model/UpdateAccountUserRequest.md)
- [UpdateDomainRequest](docs/Model/UpdateDomainRequest.md)
- [UpdateInstallRequest](docs/Model/UpdateInstallRequest.md)
- [UpdateSiteRequest](docs/Model/UpdateSiteRequest.md)
- [User](docs/Model/User.md)

## Authorization

Authentication schemes defined for the API:
### basicAuth

- **Type**: HTTP basic authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.6.7`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
