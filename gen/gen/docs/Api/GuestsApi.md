# OpenAPI\Client\GuestsApi

All URIs are relative to http://localhost:8000/api, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**guestsGet()**](GuestsApi.md#guestsGet) | **GET** /guests | Получить список всех гостей |
| [**guestsIdDelete()**](GuestsApi.md#guestsIdDelete) | **DELETE** /guests/{id} | Удалить гостя по ID |
| [**guestsIdGet()**](GuestsApi.md#guestsIdGet) | **GET** /guests/{id} | Получить данные гостя по ID |
| [**guestsIdPut()**](GuestsApi.md#guestsIdPut) | **PUT** /guests/{id} | Обновить данные гостя по ID |
| [**guestsPost()**](GuestsApi.md#guestsPost) | **POST** /guests | Создать нового гостя |


## `guestsGet()`

```php
guestsGet(): \OpenAPI\Client\Model\Guest[]
```

Получить список всех гостей

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\GuestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->guestsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GuestsApi->guestsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\Guest[]**](../Model/Guest.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `guestsIdDelete()`

```php
guestsIdDelete($id)
```

Удалить гостя по ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\GuestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int

try {
    $apiInstance->guestsIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling GuestsApi->guestsIdDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

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

## `guestsIdGet()`

```php
guestsIdGet($id): \OpenAPI\Client\Model\Guest
```

Получить данные гостя по ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\GuestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int

try {
    $result = $apiInstance->guestsIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GuestsApi->guestsIdGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\OpenAPI\Client\Model\Guest**](../Model/Guest.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `guestsIdPut()`

```php
guestsIdPut($id, $update_guest_request): \OpenAPI\Client\Model\Guest
```

Обновить данные гостя по ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\GuestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int
$update_guest_request = new \OpenAPI\Client\Model\UpdateGuestRequest(); // \OpenAPI\Client\Model\UpdateGuestRequest

try {
    $result = $apiInstance->guestsIdPut($id, $update_guest_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GuestsApi->guestsIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **update_guest_request** | [**\OpenAPI\Client\Model\UpdateGuestRequest**](../Model/UpdateGuestRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\Guest**](../Model/Guest.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `guestsPost()`

```php
guestsPost($create_guest_request): \OpenAPI\Client\Model\Guest
```

Создать нового гостя

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\GuestsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$create_guest_request = new \OpenAPI\Client\Model\CreateGuestRequest(); // \OpenAPI\Client\Model\CreateGuestRequest

try {
    $result = $apiInstance->guestsPost($create_guest_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling GuestsApi->guestsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_guest_request** | [**\OpenAPI\Client\Model\CreateGuestRequest**](../Model/CreateGuestRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\Guest**](../Model/Guest.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
