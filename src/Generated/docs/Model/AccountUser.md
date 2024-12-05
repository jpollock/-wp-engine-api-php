# # AccountUser

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**userId** | **string** | The user ID |
**accountId** | **string** | The account ID |
**firstName** | **string** | The first name of the user |
**lastName** | **string** | The last name of the user |
**email** | **string** | The email of the user |
**phone** | **string** | The phone number of the user |
**inviteAccepted** | **bool** | Whether or not the user has accepted their invitation |
**mfaEnabled** | **bool** | Whether or not the user has multi-factor authentication enabled |
**roles** | **string** | The user roles |
**lastOwner** | **bool** | Whether or not this owner is the last on the account. Only shows with users that have owner level roles. | [optional]
**installs** | [**\WPEngineGenerated\Model\AccountUserInstallsInner[]**](AccountUserInstallsInner.md) | An array of installs tied to a partial user. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
