<?php
/**
 * BatchApi
 * PHP version 7.3
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Properties
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Properties
 *
 * All HubSpot objects store data in default and custom properties. These endpoints provide access to read and modify object properties in HubSpot.
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.4.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Crm\Properties\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use HubSpot\Client\Crm\Properties\ApiException;
use HubSpot\Client\Crm\Properties\Configuration;
use HubSpot\Client\Crm\Properties\HeaderSelector;
use HubSpot\Client\Crm\Properties\ObjectSerializer;

/**
 * BatchApi Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Crm\Properties
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BatchApi
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
     * Operation archive
     *
     * Archive a batch of properties
     *
     * @param  string $object_type object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyName $batch_input_property_name batch_input_property_name (required)
     *
     * @throws \HubSpot\Client\Crm\Properties\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function archive($object_type, $batch_input_property_name)
    {
        $this->archiveWithHttpInfo($object_type, $batch_input_property_name);
    }

    /**
     * Operation archiveWithHttpInfo
     *
     * Archive a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyName $batch_input_property_name (required)
     *
     * @throws \HubSpot\Client\Crm\Properties\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function archiveWithHttpInfo($object_type, $batch_input_property_name)
    {
        $request = $this->archiveRequest($object_type, $batch_input_property_name);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Properties\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation archiveAsync
     *
     * Archive a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyName $batch_input_property_name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function archiveAsync($object_type, $batch_input_property_name)
    {
        return $this->archiveAsyncWithHttpInfo($object_type, $batch_input_property_name)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation archiveAsyncWithHttpInfo
     *
     * Archive a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyName $batch_input_property_name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function archiveAsyncWithHttpInfo($object_type, $batch_input_property_name)
    {
        $returnType = '';
        $request = $this->archiveRequest($object_type, $batch_input_property_name);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'archive'
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyName $batch_input_property_name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function archiveRequest($object_type, $batch_input_property_name)
    {
        // verify the required parameter 'object_type' is set
        if ($object_type === null || (is_array($object_type) && count($object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $object_type when calling archive'
            );
        }
        // verify the required parameter 'batch_input_property_name' is set
        if ($batch_input_property_name === null || (is_array($batch_input_property_name) && count($batch_input_property_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_input_property_name when calling archive'
            );
        }

        $resourcePath = '/crm/v3/properties/{objectType}/batch/archive';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'objectType' . '}',
                ObjectSerializer::toPathValue($object_type),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['*/*'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($batch_input_property_name)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($batch_input_property_name));
            } else {
                $httpBody = $batch_input_property_name;
            }
        } elseif (count($formParams) > 0) {
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation create
     *
     * Create a batch of properties
     *
     * @param  string $object_type object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyCreate $batch_input_property_create batch_input_property_create (required)
     *
     * @throws \HubSpot\Client\Crm\Properties\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\Error
     */
    public function create($object_type, $batch_input_property_create)
    {
        list($response) = $this->createWithHttpInfo($object_type, $batch_input_property_create);
        return $response;
    }

    /**
     * Operation createWithHttpInfo
     *
     * Create a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyCreate $batch_input_property_create (required)
     *
     * @throws \HubSpot\Client\Crm\Properties\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function createWithHttpInfo($object_type, $batch_input_property_create)
    {
        $request = $this->createRequest($object_type, $batch_input_property_create);

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
                case 201:
                    if ('\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 207:
                    if ('\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Crm\Properties\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Properties\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 207:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Properties\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createAsync
     *
     * Create a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyCreate $batch_input_property_create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAsync($object_type, $batch_input_property_create)
    {
        return $this->createAsyncWithHttpInfo($object_type, $batch_input_property_create)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAsyncWithHttpInfo
     *
     * Create a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyCreate $batch_input_property_create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAsyncWithHttpInfo($object_type, $batch_input_property_create)
    {
        $returnType = '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty';
        $request = $this->createRequest($object_type, $batch_input_property_create);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'create'
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchInputPropertyCreate $batch_input_property_create (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createRequest($object_type, $batch_input_property_create)
    {
        // verify the required parameter 'object_type' is set
        if ($object_type === null || (is_array($object_type) && count($object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $object_type when calling create'
            );
        }
        // verify the required parameter 'batch_input_property_create' is set
        if ($batch_input_property_create === null || (is_array($batch_input_property_create) && count($batch_input_property_create) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_input_property_create when calling create'
            );
        }

        $resourcePath = '/crm/v3/properties/{objectType}/batch/create';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'objectType' . '}',
                ObjectSerializer::toPathValue($object_type),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($batch_input_property_create)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($batch_input_property_create));
            } else {
                $httpBody = $batch_input_property_create;
            }
        } elseif (count($formParams) > 0) {
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation read
     *
     * Read a batch of properties
     *
     * @param  string $object_type object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchReadInputPropertyName $batch_read_input_property_name batch_read_input_property_name (required)
     *
     * @throws \HubSpot\Client\Crm\Properties\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\Error
     */
    public function read($object_type, $batch_read_input_property_name)
    {
        list($response) = $this->readWithHttpInfo($object_type, $batch_read_input_property_name);
        return $response;
    }

    /**
     * Operation readWithHttpInfo
     *
     * Read a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchReadInputPropertyName $batch_read_input_property_name (required)
     *
     * @throws \HubSpot\Client\Crm\Properties\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty|\HubSpot\Client\Crm\Properties\Model\Error, HTTP status code, HTTP response headers (array of strings)
     */
    public function readWithHttpInfo($object_type, $batch_read_input_property_name)
    {
        $request = $this->readRequest($object_type, $batch_read_input_property_name);

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
                    if ('\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 207:
                    if ('\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                default:
                    if ('\HubSpot\Client\Crm\Properties\Model\Error' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\HubSpot\Client\Crm\Properties\Model\Error', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
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
                        '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 207:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                default:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\HubSpot\Client\Crm\Properties\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation readAsync
     *
     * Read a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchReadInputPropertyName $batch_read_input_property_name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readAsync($object_type, $batch_read_input_property_name)
    {
        return $this->readAsyncWithHttpInfo($object_type, $batch_read_input_property_name)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readAsyncWithHttpInfo
     *
     * Read a batch of properties
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchReadInputPropertyName $batch_read_input_property_name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readAsyncWithHttpInfo($object_type, $batch_read_input_property_name)
    {
        $returnType = '\HubSpot\Client\Crm\Properties\Model\BatchResponseProperty';
        $request = $this->readRequest($object_type, $batch_read_input_property_name);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
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
     * Create request for operation 'read'
     *
     * @param  string $object_type (required)
     * @param  \HubSpot\Client\Crm\Properties\Model\BatchReadInputPropertyName $batch_read_input_property_name (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function readRequest($object_type, $batch_read_input_property_name)
    {
        // verify the required parameter 'object_type' is set
        if ($object_type === null || (is_array($object_type) && count($object_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $object_type when calling read'
            );
        }
        // verify the required parameter 'batch_read_input_property_name' is set
        if ($batch_read_input_property_name === null || (is_array($batch_read_input_property_name) && count($batch_read_input_property_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $batch_read_input_property_name when calling read'
            );
        }

        $resourcePath = '/crm/v3/properties/{objectType}/batch/read';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($object_type !== null) {
            $resourcePath = str_replace(
                '{' . 'objectType' . '}',
                ObjectSerializer::toPathValue($object_type),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json', '*/*']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json', '*/*'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($batch_read_input_property_name)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($batch_read_input_property_name));
            } else {
                $httpBody = $batch_read_input_property_name;
            }
        } elseif (count($formParams) > 0) {
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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('hapikey');
        if ($apiKey !== null) {
            $queryParams['hapikey'] = $apiKey;
        }
        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
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
