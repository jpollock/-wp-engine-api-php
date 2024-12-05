# # Installation

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  |
**name** | **string** |  |
**account** | [**\WPEngineGenerated\Model\InstallationAccount**](InstallationAccount.md) |  |
**phpVersion** | **string** | The PHP version used to run WordPress (read-only) |
**status** | **string** |  | [optional]
**site** | [**\WPEngineGenerated\Model\InstallationSite**](InstallationSite.md) |  | [optional]
**cname** | **string** | Returns the CNAME of the install | [optional]
**stableIps** | **string[]** | A list of stable IPs bound to the install. This will only apply to some premium/enterprise plans | [optional]
**environment** | **string** |  | [optional]
**primaryDomain** | **string** | The primary domain for the install. | [optional]
**isMultisite** | **bool** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
