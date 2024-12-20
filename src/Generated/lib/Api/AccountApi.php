<?php
/**
 * AccountApi
 * PHP version 7.4
 *
 * @category Class
 * @package  WPEngineGenerated
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * WP Engine API
 *
 * The API described in this document is subject to change.
 *
 * The version of the OpenAPI document: 1.6.7
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.6.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace WPEngineGenerated\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use WPEngineGenerated\ApiException;
use WPEngineGenerated\Configuration;
use WPEngineGenerated\HeaderSelector;
use WPEngineGenerated\ObjectSerializer;

/**
 * AccountApi Class Doc Comment
 *
 * @category Class
 * @package  WPEngineGenerated
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AccountApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'getAccount' => [
            'application/json',
        ],
        'listAccounts' => [
            'application/json',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getAccount
     *
     * Get an account by ID
     *
     * @param  string $accountId ID of account (required)
     * @param  string $authorization authorization (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAccount'] to see the possible values for this operation
     *
     * @throws \WPEngineGenerated\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WPEngineGenerated\Model\Account|\WPEngineGenerated\Model\AuthenticationErrorResponse|\WPEngineGenerated\Model\NotFoundErrorResponse
     */
    public function getAccount($accountId, $authorization = null, string $contentType = self::contentTypes['getAccount'][0])
    {
        list($response) = $this->getAccountWithHttpInfo($accountId, $authorization, $contentType);
        return $response;
    }

    /**
     * Operation getAccountWithHttpInfo
     *
     * Get an account by ID
     *
     * @param  string $accountId ID of account (required)
     * @param  string $authorization (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAccount'] to see the possible values for this operation
     *
     * @throws \WPEngineGenerated\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WPEngineGenerated\Model\Account|\WPEngineGenerated\Model\AuthenticationErrorResponse|\WPEngineGenerated\Model\NotFoundErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAccountWithHttpInfo($accountId, $authorization = null, string $contentType = self::contentTypes['getAccount'][0])
    {
        $request = $this->getAccountRequest($accountId, $authorization, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\WPEngineGenerated\Model\Account' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WPEngineGenerated\Model\Account' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WPEngineGenerated\Model\Account', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\WPEngineGenerated\Model\AuthenticationErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WPEngineGenerated\Model\AuthenticationErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WPEngineGenerated\Model\AuthenticationErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\WPEngineGenerated\Model\NotFoundErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WPEngineGenerated\Model\NotFoundErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WPEngineGenerated\Model\NotFoundErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\WPEngineGenerated\Model\Account';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WPEngineGenerated\Model\Account',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WPEngineGenerated\Model\AuthenticationErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WPEngineGenerated\Model\NotFoundErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAccountAsync
     *
     * Get an account by ID
     *
     * @param  string $accountId ID of account (required)
     * @param  string $authorization (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAccount'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAccountAsync($accountId, $authorization = null, string $contentType = self::contentTypes['getAccount'][0])
    {
        return $this->getAccountAsyncWithHttpInfo($accountId, $authorization, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAccountAsyncWithHttpInfo
     *
     * Get an account by ID
     *
     * @param  string $accountId ID of account (required)
     * @param  string $authorization (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAccount'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAccountAsyncWithHttpInfo($accountId, $authorization = null, string $contentType = self::contentTypes['getAccount'][0])
    {
        $returnType = '\WPEngineGenerated\Model\Account';
        $request = $this->getAccountRequest($accountId, $authorization, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAccount'
     *
     * @param  string $accountId ID of account (required)
     * @param  string $authorization (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getAccount'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getAccountRequest($accountId, $authorization = null, string $contentType = self::contentTypes['getAccount'][0])
    {

        // verify the required parameter 'accountId' is set
        if ($accountId === null || (is_array($accountId) && count($accountId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accountId when calling getAccount'
            );
        }



        $resourcePath = '/accounts/{account_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($accountId !== null) {
            $resourcePath = str_replace(
                '{' . 'account_id' . '}',
                ObjectSerializer::toPathValue($accountId),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation listAccounts
     *
     * List your WP Engine accounts
     *
     * @param  string $authorization authorization (optional)
     * @param  int $limit (Optional) The number of records to return (optional, default to 100)
     * @param  int $offset (Optional) The first record of the result set to be retrieved (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAccounts'] to see the possible values for this operation
     *
     * @throws \WPEngineGenerated\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \WPEngineGenerated\Model\ListAccounts200Response|\WPEngineGenerated\Model\BadRequestErrorResponse|\WPEngineGenerated\Model\AuthenticationErrorResponse
     */
    public function listAccounts($authorization = null, $limit = 100, $offset = 0, string $contentType = self::contentTypes['listAccounts'][0])
    {
        list($response) = $this->listAccountsWithHttpInfo($authorization, $limit, $offset, $contentType);
        return $response;
    }

    /**
     * Operation listAccountsWithHttpInfo
     *
     * List your WP Engine accounts
     *
     * @param  string $authorization (optional)
     * @param  int $limit (Optional) The number of records to return (optional, default to 100)
     * @param  int $offset (Optional) The first record of the result set to be retrieved (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAccounts'] to see the possible values for this operation
     *
     * @throws \WPEngineGenerated\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \WPEngineGenerated\Model\ListAccounts200Response|\WPEngineGenerated\Model\BadRequestErrorResponse|\WPEngineGenerated\Model\AuthenticationErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function listAccountsWithHttpInfo($authorization = null, $limit = 100, $offset = 0, string $contentType = self::contentTypes['listAccounts'][0])
    {
        $request = $this->listAccountsRequest($authorization, $limit, $offset, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\WPEngineGenerated\Model\ListAccounts200Response' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WPEngineGenerated\Model\ListAccounts200Response' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WPEngineGenerated\Model\ListAccounts200Response', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\WPEngineGenerated\Model\BadRequestErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WPEngineGenerated\Model\BadRequestErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WPEngineGenerated\Model\BadRequestErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\WPEngineGenerated\Model\AuthenticationErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\WPEngineGenerated\Model\AuthenticationErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\WPEngineGenerated\Model\AuthenticationErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\WPEngineGenerated\Model\ListAccounts200Response';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WPEngineGenerated\Model\ListAccounts200Response',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WPEngineGenerated\Model\BadRequestErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\WPEngineGenerated\Model\AuthenticationErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listAccountsAsync
     *
     * List your WP Engine accounts
     *
     * @param  string $authorization (optional)
     * @param  int $limit (Optional) The number of records to return (optional, default to 100)
     * @param  int $offset (Optional) The first record of the result set to be retrieved (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAccounts'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAccountsAsync($authorization = null, $limit = 100, $offset = 0, string $contentType = self::contentTypes['listAccounts'][0])
    {
        return $this->listAccountsAsyncWithHttpInfo($authorization, $limit, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listAccountsAsyncWithHttpInfo
     *
     * List your WP Engine accounts
     *
     * @param  string $authorization (optional)
     * @param  int $limit (Optional) The number of records to return (optional, default to 100)
     * @param  int $offset (Optional) The first record of the result set to be retrieved (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAccounts'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listAccountsAsyncWithHttpInfo($authorization = null, $limit = 100, $offset = 0, string $contentType = self::contentTypes['listAccounts'][0])
    {
        $returnType = '\WPEngineGenerated\Model\ListAccounts200Response';
        $request = $this->listAccountsRequest($authorization, $limit, $offset, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'listAccounts'
     *
     * @param  string $authorization (optional)
     * @param  int $limit (Optional) The number of records to return (optional, default to 100)
     * @param  int $offset (Optional) The first record of the result set to be retrieved (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listAccounts'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listAccountsRequest($authorization = null, $limit = 100, $offset = 0, string $contentType = self::contentTypes['listAccounts'][0])
    {


        if ($limit !== null && $limit > 100) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AccountApi.listAccounts, must be smaller than or equal to 100.');
        }
        if ($limit !== null && $limit < 0) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling AccountApi.listAccounts, must be bigger than or equal to 0.');
        }
        
        if ($offset !== null && $offset < 0) {
            throw new \InvalidArgumentException('invalid value for "$offset" when calling AccountApi.listAccounts, must be bigger than or equal to 0.');
        }
        

        $resourcePath = '/accounts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $limit,
            'limit', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }



        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if (!empty($this->config->getUsername()) || !(empty($this->config->getPassword()))) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
