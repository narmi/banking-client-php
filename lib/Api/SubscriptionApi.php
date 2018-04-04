<?php
/**
 * SubscriptionApi
 * PHP version 5
 *
 * @category Class
 * @package  Banking\Client
 */

/**
 * Narmi Banking API
 *
 * Contact: contact@narmitech.com
 * NOTE: This class is auto generated, do not edit the class manually.
 */


namespace Banking\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Banking\Client\ApiException;
use Banking\Client\Configuration;
use Banking\Client\HeaderSelector;
use Banking\Client\ObjectSerializer;

/**
 * SubscriptionApi Class Doc Comment
 *
 * @category Class
 * @package  Banking\Client
 */
class SubscriptionApi
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
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: Configuration::getDefaultConfiguration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation callList
     *
     * List subscriptions
     *
     * @param  int $page page (optional)
     * @param  int $per_page per_page (optional)
     * @param  string $authorization authorization (optional)
     * @param  string $date date (optional)
     * @param  string $signature signature (optional)
     * @param  string $x_request_id x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Banking\Client\Model\InlineResponse2008
     */
    public function callList($page = null, $per_page = null, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        list($response) = $this->callListWithHttpInfo($page, $per_page, $authorization, $date, $signature, $x_request_id);
        return $response;
    }

    /**
     * Operation callListWithHttpInfo
     *
     * List subscriptions
     *
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Banking\Client\Model\InlineResponse2008, HTTP status code, HTTP response headers (array of strings)
     */
    public function callListWithHttpInfo($page = null, $per_page = null, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2008';
        $request = $this->callListRequest($page, $per_page, $authorization, $date, $signature, $x_request_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
                        '\Banking\Client\Model\InlineResponse2008',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation callListAsync
     *
     * List subscriptions
     *
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function callListAsync($page = null, $per_page = null, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        return $this->callListAsyncWithHttpInfo($page, $per_page, $authorization, $date, $signature, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation callListAsyncWithHttpInfo
     *
     * List subscriptions
     *
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function callListAsyncWithHttpInfo($page = null, $per_page = null, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2008';
        $request = $this->callListRequest($page, $per_page, $authorization, $date, $signature, $x_request_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'callList'
     *
     * @param  int $page (optional)
     * @param  int $per_page (optional)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function callListRequest($page = null, $per_page = null, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {

        $resourcePath = '/subscriptions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page);
        }
        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page);
        }
        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }
        // header params
        if ($date !== null) {
            $headerParams['Date'] = ObjectSerializer::toHeaderValue($date);
        }
        // header params
        if ($signature !== null) {
            $headerParams['Signature'] = ObjectSerializer::toHeaderValue($signature);
        }
        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

            $date = date('c');
            $secret = $this->config->getSecret();
            $signature = base64_encode(hash_hmac('sha256', 'date: ' . $date, $secret, true));
            $headers['Date'] = $date;
            $headers['Signature'] = 'keyId="' . $this->config->getAccessToken() . '",algorithm="hmac-' . 'sha256' . '",signature="' . $signature . '",headers="date"';
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation create
     *
     * Create subscription
     *
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to create object (required)
     * @param  string $authorization authorization (optional)
     * @param  string $date date (optional)
     * @param  string $signature signature (optional)
     * @param  string $x_request_id x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Banking\Client\Model\InlineResponse2011
     */
    public function create($body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        list($response) = $this->createWithHttpInfo($body, $authorization, $date, $signature, $x_request_id);
        return $response;
    }

    /**
     * Operation createWithHttpInfo
     *
     * Create subscription
     *
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to create object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Banking\Client\Model\InlineResponse2011, HTTP status code, HTTP response headers (array of strings)
     */
    public function createWithHttpInfo($body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2011';
        $request = $this->createRequest($body, $authorization, $date, $signature, $x_request_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Banking\Client\Model\InlineResponse2011',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Banking\Client\Model\Error',
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
     * Create subscription
     *
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to create object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAsync($body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        return $this->createAsyncWithHttpInfo($body, $authorization, $date, $signature, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createAsyncWithHttpInfo
     *
     * Create subscription
     *
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to create object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createAsyncWithHttpInfo($body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2011';
        $request = $this->createRequest($body, $authorization, $date, $signature, $x_request_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'create'
     *
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to create object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function createRequest($body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling create'
            );
        }

        $resourcePath = '/subscriptions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }
        // header params
        if ($date !== null) {
            $headerParams['Date'] = ObjectSerializer::toHeaderValue($date);
        }
        // header params
        if ($signature !== null) {
            $headerParams['Signature'] = ObjectSerializer::toHeaderValue($signature);
        }
        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }


        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

            $date = date('c');
            $secret = $this->config->getSecret();
            $signature = base64_encode(hash_hmac('sha256', 'date: ' . $date, $secret, true));
            $headers['Date'] = $date;
            $headers['Signature'] = 'keyId="' . $this->config->getAccessToken() . '",algorithm="hmac-' . 'sha256' . '",signature="' . $signature . '",headers="date"';
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation destroy
     *
     * Delete subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization authorization (optional)
     * @param  string $date date (optional)
     * @param  string $signature signature (optional)
     * @param  string $x_request_id x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function destroy($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        list($response) = $this->destroyWithHttpInfo($subscription_id, $authorization, $date, $signature, $x_request_id);
        return $response;
    }

    /**
     * Operation destroyWithHttpInfo
     *
     * Delete subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function destroyWithHttpInfo($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = 'string';
        $request = $this->destroyRequest($subscription_id, $authorization, $date, $signature, $x_request_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
                case 204:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation destroyAsync
     *
     * Delete subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function destroyAsync($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        return $this->destroyAsyncWithHttpInfo($subscription_id, $authorization, $date, $signature, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation destroyAsyncWithHttpInfo
     *
     * Delete subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function destroyAsyncWithHttpInfo($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = 'string';
        $request = $this->destroyRequest($subscription_id, $authorization, $date, $signature, $x_request_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'destroy'
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function destroyRequest($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling destroy'
            );
        }

        $resourcePath = '/subscriptions/{subscriptionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }
        // header params
        if ($date !== null) {
            $headerParams['Date'] = ObjectSerializer::toHeaderValue($date);
        }
        // header params
        if ($signature !== null) {
            $headerParams['Signature'] = ObjectSerializer::toHeaderValue($signature);
        }
        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }

        // path params
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscriptionId' . '}',
                ObjectSerializer::toPathValue($subscription_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

            $date = date('c');
            $secret = $this->config->getSecret();
            $signature = base64_encode(hash_hmac('sha256', 'date: ' . $date, $secret, true));
            $headers['Date'] = $date;
            $headers['Signature'] = 'keyId="' . $this->config->getAccessToken() . '",algorithm="hmac-' . 'sha256' . '",signature="' . $signature . '",headers="date"';
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation get
     *
     * Get subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization authorization (optional)
     * @param  string $date date (optional)
     * @param  string $signature signature (optional)
     * @param  string $x_request_id x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Banking\Client\Model\InlineResponse2011
     */
    public function get($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        list($response) = $this->getWithHttpInfo($subscription_id, $authorization, $date, $signature, $x_request_id);
        return $response;
    }

    /**
     * Operation getWithHttpInfo
     *
     * Get subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Banking\Client\Model\InlineResponse2011, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWithHttpInfo($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2011';
        $request = $this->getRequest($subscription_id, $authorization, $date, $signature, $x_request_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
                        '\Banking\Client\Model\InlineResponse2011',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAsync
     *
     * Get subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAsync($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        return $this->getAsyncWithHttpInfo($subscription_id, $authorization, $date, $signature, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAsyncWithHttpInfo
     *
     * Get subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAsyncWithHttpInfo($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2011';
        $request = $this->getRequest($subscription_id, $authorization, $date, $signature, $x_request_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'get'
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getRequest($subscription_id, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling get'
            );
        }

        $resourcePath = '/subscriptions/{subscriptionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }
        // header params
        if ($date !== null) {
            $headerParams['Date'] = ObjectSerializer::toHeaderValue($date);
        }
        // header params
        if ($signature !== null) {
            $headerParams['Signature'] = ObjectSerializer::toHeaderValue($signature);
        }
        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }

        // path params
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscriptionId' . '}',
                ObjectSerializer::toPathValue($subscription_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

            $date = date('c');
            $secret = $this->config->getSecret();
            $signature = base64_encode(hash_hmac('sha256', 'date: ' . $date, $secret, true));
            $headers['Date'] = $date;
            $headers['Signature'] = 'keyId="' . $this->config->getAccessToken() . '",algorithm="hmac-' . 'sha256' . '",signature="' . $signature . '",headers="date"';
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation update
     *
     * Update subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to update object (required)
     * @param  string $authorization authorization (optional)
     * @param  string $date date (optional)
     * @param  string $signature signature (optional)
     * @param  string $x_request_id x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Banking\Client\Model\InlineResponse2011
     */
    public function update($subscription_id, $body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        list($response) = $this->updateWithHttpInfo($subscription_id, $body, $authorization, $date, $signature, $x_request_id);
        return $response;
    }

    /**
     * Operation updateWithHttpInfo
     *
     * Update subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to update object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \Banking\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Banking\Client\Model\InlineResponse2011, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateWithHttpInfo($subscription_id, $body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2011';
        $request = $this->updateRequest($subscription_id, $body, $authorization, $date, $signature, $x_request_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
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
                        '\Banking\Client\Model\InlineResponse2011',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Banking\Client\Model\Error',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateAsync
     *
     * Update subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to update object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAsync($subscription_id, $body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        return $this->updateAsyncWithHttpInfo($subscription_id, $body, $authorization, $date, $signature, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateAsyncWithHttpInfo
     *
     * Update subscription
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to update object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAsyncWithHttpInfo($subscription_id, $body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        $returnType = '\Banking\Client\Model\InlineResponse2011';
        $request = $this->updateRequest($subscription_id, $body, $authorization, $date, $signature, $x_request_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
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
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'update'
     *
     * @param  string $subscription_id The id of the subscription to be operated on (required)
     * @param  \Banking\Client\Model\Subscription $body Subscription attributes to update object (required)
     * @param  string $authorization (optional)
     * @param  string $date (optional)
     * @param  string $signature (optional)
     * @param  string $x_request_id (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateRequest($subscription_id, $body, $authorization = null, $date = null, $signature = null, $x_request_id = null)
    {
        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling update'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling update'
            );
        }

        $resourcePath = '/subscriptions/{subscriptionId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }
        // header params
        if ($date !== null) {
            $headerParams['Date'] = ObjectSerializer::toHeaderValue($date);
        }
        // header params
        if ($signature !== null) {
            $headerParams['Signature'] = ObjectSerializer::toHeaderValue($signature);
        }
        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }

        // path params
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscriptionId' . '}',
                ObjectSerializer::toPathValue($subscription_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers= $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();

            $date = date('c');
            $secret = $this->config->getSecret();
            $signature = base64_encode(hash_hmac('sha256', 'date: ' . $date, $secret, true));
            $headers['Date'] = $date;
            $headers['Signature'] = 'keyId="' . $this->config->getAccessToken() . '",algorithm="hmac-' . 'sha256' . '",signature="' . $signature . '",headers="date"';
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
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
