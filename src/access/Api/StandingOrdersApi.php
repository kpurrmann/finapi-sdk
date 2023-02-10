<?php
/**
 * StandingOrdersApi
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * finAPI Access V2
 *
 * <strong>RESTful API for Account Information Services (AIS) and Payment Initiation Services (PIS)</strong> <br/> <strong>Application Version:</strong> 2.6.2 <br/>  The following pages give you some general information on how to use our APIs.<br/> The actual API services documentation then follows further below. You can use the menu to jump between API sections. <br/> <br/> This page has a built-in HTTP(S) client, so you can test the services directly from within this page, by filling in the request parameters and/or body in the respective services, and then hitting the TRY button. Note that you need to be authorized to make a successful API call. To authorize, refer to the 'Authorization' section of the API, or just use the OAUTH button that can be found near the TRY button. <br/>  <h2 id=\"general-information\">General information</h2>  <h3 id=\"general-error-responses\"><strong>Error Responses</strong></h3> When an API call returns with an error, then in general it has the structure shown in the following example:  <pre> {   \"errors\": [     {       \"message\": \"Interface 'FINTS_SERVER' is not supported for this operation.\",       \"code\": \"BAD_REQUEST\",       \"type\": \"TECHNICAL\"     }   ],   \"date\": \"2020-11-19T16:54:06.854+01:00\",   \"requestId\": \"selfgen-312042e7-df55-47e4-bffd-956a68ef37b5\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/21\",   \"bank\": \"DEMO0002 - finAPI Test Redirect Bank\" } </pre>  If an API call requires an additional authentication by the user, HTTP code 510 is returned and the error response contains the additional \"multiStepAuthentication\" object, see the following example:  <pre> {   \"errors\": [     {       \"message\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",       \"code\": \"ADDITIONAL_AUTHENTICATION_REQUIRED\",       \"type\": \"BUSINESS\",       \"multiStepAuthentication\": {         \"hash\": \"678b13f4be9ed7d981a840af8131223a\",         \"status\": \"CHALLENGE_RESPONSE_REQUIRED\",         \"challengeMessage\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",         \"answerFieldLabel\": \"TAN\",         \"redirectUrl\": null,         \"redirectContext\": null,         \"redirectContextField\": null,         \"twoStepProcedures\": null,         \"photoTanMimeType\": null,         \"photoTanData\": null,         \"opticalData\": null,         \"opticalDataAsReinerSct\": false       }     }   ],   \"date\": \"2019-11-29T09:51:55.931+01:00\",   \"requestId\": \"selfgen-45059c99-1b14-4df7-9bd3-9d5f126df294\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/18\",   \"bank\": \"DEMO0001 - finAPI Test Bank\" } </pre>  An exception to this error format are API authentication errors, where the following structure is returned:  <pre> {   \"error\": \"invalid_token\",   \"error_description\": \"Invalid access token: cccbce46-xxxx-xxxx-xxxx-xxxxxxxxxx\" } </pre>  <h3 id=\"general-paging\"><strong>Paging</strong></h3> API services that may potentially return a lot of data implement paging. They return a limited number of entries within a \"page\". Further entries must be fetched with subsequent calls. <br/><br/> Any API service that implements paging provides the following input parameters:<br/> &bull; \"page\": the number of the page to be retrieved (starting with 1).<br/> &bull; \"perPage\": the number of entries within a page. The default and maximum value is stated in the documentation of the respective services.  A paged response contains an additional \"paging\" object with the following structure:  <pre> {   ...   ,   \"paging\": {     \"page\": 1,     \"perPage\": 20,     \"pageCount\": 234,     \"totalCount\": 4662   } } </pre>  <h3 id=\"general-internationalization\"><strong>Internationalization</strong></h3> The finAPI services support internationalization which means you can define the language you prefer for API service responses. <br/><br/> The following languages are available: German, English, Czech, Slovak. <br/><br/> The preferred language can be defined by providing the official HTTP <strong>Accept-Language</strong> header. <br/><br/> finAPI reacts on the official iso language codes &quot;de&quot;, &quot;en&quot;, &quot;cs&quot; and &quot;sk&quot; for the named languages. Additional subtags supported by the Accept-Language header may be provided, e.g. &quot;en-US&quot;, but are ignored. <br/> If no Accept-Language header is given, German is used as the default language. <br/><br/> Exceptions:<br/> &bull; Bank login hints and login fields are only available in the language of the bank and not being translated.<br/> &bull; Direct messages from the bank systems typically returned as BUSINESS errors will not be translated.<br/> &bull; BUSINESS errors created by finAPI directly are available in German and English.<br/> &bull; TECHNICAL errors messages meant for developers are mostly in English, but also may be translated.  <h3 id=\"general-request-ids\"><strong>Request IDs</strong></h3> With any API call, you can pass a request ID via a header with name \"X-Request-Id\". The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. <br/><br/> If you don't pass a request ID for a call, finAPI will generate a random ID internally. <br/><br/> The request ID is always returned back in the response of a service, as a header with name \"X-Request-Id\". <br/><br/> We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster.  <h3 id=\"general-overriding-http-methods\"><strong>Overriding HTTP methods</strong></h3> Some HTTP clients do not support the HTTP methods PATCH or DELETE. If you are using such a client in your application, you can use a POST request instead with a special HTTP header indicating the originally intended HTTP method. <br/><br/> The header's name is <strong>X-HTTP-Method-Override</strong>. Set its value to either <strong>PATCH</strong> or <strong>DELETE</strong>. POST Requests having this header set will be treated either as PATCH or DELETE by the finAPI servers. <br/><br/> Example: <br/><br/> <strong>X-HTTP-Method-Override: PATCH</strong><br/> POST /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/><br/> will be interpreted by finAPI as:<br/><br/> PATCH /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/>  <h3 id=\"general-user-metadata\"><strong>User metadata</strong></h3> With the migration to PSD2 APIs, a new term called \"User metadata\" (also known as \"PSU metadata\") has been introduced to the API. This user metadata aims to inform the banking API if there was a real end-user behind an HTTP request or if the request was triggered by a system (e.g. by an automatic batch update). In the latter case, the bank may apply some restrictions such as limiting the number of HTTP requests for a single consent. Also, some operations may be forbidden entirely by the banking API. For example, some banks do not allow issuing a new consent without the end-user being involved. Therefore, it is certainly necessary and obligatory for the customer to provide the PSU metadata for such operations. <br/><br/> As finAPI does not have direct interaction with the end-user, it is the client application's responsibility to provide all the necessary information about the end-user. This must be done by sending additional headers with every request triggered on behalf of the end-user. <br/><br/> At the moment, the following headers are supported by the API:<br/> &bull; \"PSU-IP-Address\" - the IP address of the user's device.<br/> &bull; \"PSU-Device-OS\" - the user's device and/or operating system identification.<br/> &bull; \"PSU-User-Agent\" - the user's web browser or other client device identification.  <h3 id=\"general-faq\"><strong>FAQ</strong></h3> <strong>Is there a finAPI SDK?</strong> <br/> Currently we do not offer a native SDK, but there is the option to generate an SDK for almost any target language via OpenAPI. Use the 'Download SDK' button on this page for SDK generation. <br/> <br/> <strong>How can I enable finAPI's automatic batch update?</strong> <br/> Currently there is no way to set up the batch update via the API. Please contact support@finapi.io for this. <br/> <br/> <strong>Why do I need to keep authorizing when calling services on this page?</strong> <br/> This page is a \"one-page-app\". Reloading the page resets the OAuth authorization context. There is generally no need to reload the page, so just don't do it and your authorization will persist.
 *
 * The version of the OpenAPI document: 2023.03.3
 * Contact: kontakt@finapi.io
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.1.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPIAccess\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use OpenAPIAccess\Client\ApiException;
use OpenAPIAccess\Client\Configuration;
use OpenAPIAccess\Client\HeaderSelector;
use OpenAPIAccess\Client\ObjectSerializer;

/**
 * StandingOrdersApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class StandingOrdersApi
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
     * Operation createStandingOrder
     *
     * Create a standing order
     *
     * @param  \OpenAPIAccess\Client\Model\CreateStandingOrderParams $create_standing_order_params Create standing order parameters (required)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \OpenAPIAccess\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPIAccess\Client\Model\StandingOrder|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\BadCredentialsError|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage
     */
    public function createStandingOrder($create_standing_order_params, $x_request_id = null)
    {
        list($response) = $this->createStandingOrderWithHttpInfo($create_standing_order_params, $x_request_id);
        return $response;
    }

    /**
     * Operation createStandingOrderWithHttpInfo
     *
     * Create a standing order
     *
     * @param  \OpenAPIAccess\Client\Model\CreateStandingOrderParams $create_standing_order_params Create standing order parameters (required)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \OpenAPIAccess\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPIAccess\Client\Model\StandingOrder|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\BadCredentialsError|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage, HTTP status code, HTTP response headers (array of strings)
     */
    public function createStandingOrderWithHttpInfo($create_standing_order_params, $x_request_id = null)
    {
        $request = $this->createStandingOrderRequest($create_standing_order_params, $x_request_id);

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
                    if ('\OpenAPIAccess\Client\Model\StandingOrder' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\StandingOrder' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\StandingOrder', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPIAccess\Client\Model\BadCredentialsError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\BadCredentialsError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\BadCredentialsError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPIAccess\Client\Model\StandingOrder';
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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\StandingOrder',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\BadCredentialsError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createStandingOrderAsync
     *
     * Create a standing order
     *
     * @param  \OpenAPIAccess\Client\Model\CreateStandingOrderParams $create_standing_order_params Create standing order parameters (required)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createStandingOrderAsync($create_standing_order_params, $x_request_id = null)
    {
        return $this->createStandingOrderAsyncWithHttpInfo($create_standing_order_params, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createStandingOrderAsyncWithHttpInfo
     *
     * Create a standing order
     *
     * @param  \OpenAPIAccess\Client\Model\CreateStandingOrderParams $create_standing_order_params Create standing order parameters (required)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createStandingOrderAsyncWithHttpInfo($create_standing_order_params, $x_request_id = null)
    {
        $returnType = '\OpenAPIAccess\Client\Model\StandingOrder';
        $request = $this->createStandingOrderRequest($create_standing_order_params, $x_request_id);

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
     * Create request for operation 'createStandingOrder'
     *
     * @param  \OpenAPIAccess\Client\Model\CreateStandingOrderParams $create_standing_order_params Create standing order parameters (required)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createStandingOrderRequest($create_standing_order_params, $x_request_id = null)
    {

        // verify the required parameter 'create_standing_order_params' is set
        if ($create_standing_order_params === null || (is_array($create_standing_order_params) && count($create_standing_order_params) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_standing_order_params when calling createStandingOrder'
            );
        }


        $resourcePath = '/api/v2/standingOrders';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($create_standing_order_params)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($create_standing_order_params));
            } else {
                $httpBody = $create_standing_order_params;
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
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getStandingOrders
     *
     * Get standing orders
     *
     * @param  int[] $ids A comma-separated list of standing order identifiers. If specified, then only standing orders whose identifier is matching any of the given identifiers will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  int[] $account_ids A comma-separated list of account identifiers. If specified, then only standing orders that relate to the given account(s) will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  float $min_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or greater than the given amount will be regarded. The value must be a positive (absolute) amount. (optional)
     * @param  float $max_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or less than the given amount will be regarded. Value must be a positive (absolute) amount. (optional)
     * @param  string[] $status A comma-separated list of standing order statuses. If provided, then only standing orders whose status is matching any of the given statuses will be returned. Allowed values: &#39;OPEN&#39;, &#39;PENDING&#39;, &#39;SUCCESSFUL&#39;, &#39;NOT_SUCCESSFUL&#39; or &#39;DISCARDED&#39;. Example: &#39;OPEN,PENDING&#39;. (optional)
     * @param  int $page Result page that you want to retrieve (optional, default to 1)
     * @param  int $per_page Maximum number of records per page. By default it&#39;s 20. Can be at most 500. (optional, default to 20)
     * @param  string[] $order Determines the order of the results. You can use the following fields for ordering the response: &#39;id&#39;, &#39;amount&#39;, &#39;requestDate&#39;, &#39;requestCompletionDate&#39;. The default order for all services is &#39;id,asc&#39;. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \OpenAPIAccess\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPIAccess\Client\Model\PageableStandingOrderResources|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\BadCredentialsError|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage
     */
    public function getStandingOrders($ids = null, $account_ids = null, $min_amount = null, $max_amount = null, $status = null, $page = 1, $per_page = 20, $order = null, $x_request_id = null)
    {
        list($response) = $this->getStandingOrdersWithHttpInfo($ids, $account_ids, $min_amount, $max_amount, $status, $page, $per_page, $order, $x_request_id);
        return $response;
    }

    /**
     * Operation getStandingOrdersWithHttpInfo
     *
     * Get standing orders
     *
     * @param  int[] $ids A comma-separated list of standing order identifiers. If specified, then only standing orders whose identifier is matching any of the given identifiers will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  int[] $account_ids A comma-separated list of account identifiers. If specified, then only standing orders that relate to the given account(s) will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  float $min_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or greater than the given amount will be regarded. The value must be a positive (absolute) amount. (optional)
     * @param  float $max_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or less than the given amount will be regarded. Value must be a positive (absolute) amount. (optional)
     * @param  string[] $status A comma-separated list of standing order statuses. If provided, then only standing orders whose status is matching any of the given statuses will be returned. Allowed values: &#39;OPEN&#39;, &#39;PENDING&#39;, &#39;SUCCESSFUL&#39;, &#39;NOT_SUCCESSFUL&#39; or &#39;DISCARDED&#39;. Example: &#39;OPEN,PENDING&#39;. (optional)
     * @param  int $page Result page that you want to retrieve (optional, default to 1)
     * @param  int $per_page Maximum number of records per page. By default it&#39;s 20. Can be at most 500. (optional, default to 20)
     * @param  string[] $order Determines the order of the results. You can use the following fields for ordering the response: &#39;id&#39;, &#39;amount&#39;, &#39;requestDate&#39;, &#39;requestCompletionDate&#39;. The default order for all services is &#39;id,asc&#39;. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \OpenAPIAccess\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPIAccess\Client\Model\PageableStandingOrderResources|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\BadCredentialsError|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage, HTTP status code, HTTP response headers (array of strings)
     */
    public function getStandingOrdersWithHttpInfo($ids = null, $account_ids = null, $min_amount = null, $max_amount = null, $status = null, $page = 1, $per_page = 20, $order = null, $x_request_id = null)
    {
        $request = $this->getStandingOrdersRequest($ids, $account_ids, $min_amount, $max_amount, $status, $page, $per_page, $order, $x_request_id);

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
                    if ('\OpenAPIAccess\Client\Model\PageableStandingOrderResources' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\PageableStandingOrderResources' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\PageableStandingOrderResources', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPIAccess\Client\Model\BadCredentialsError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\BadCredentialsError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\BadCredentialsError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPIAccess\Client\Model\PageableStandingOrderResources';
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
                        '\OpenAPIAccess\Client\Model\PageableStandingOrderResources',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\BadCredentialsError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getStandingOrdersAsync
     *
     * Get standing orders
     *
     * @param  int[] $ids A comma-separated list of standing order identifiers. If specified, then only standing orders whose identifier is matching any of the given identifiers will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  int[] $account_ids A comma-separated list of account identifiers. If specified, then only standing orders that relate to the given account(s) will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  float $min_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or greater than the given amount will be regarded. The value must be a positive (absolute) amount. (optional)
     * @param  float $max_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or less than the given amount will be regarded. Value must be a positive (absolute) amount. (optional)
     * @param  string[] $status A comma-separated list of standing order statuses. If provided, then only standing orders whose status is matching any of the given statuses will be returned. Allowed values: &#39;OPEN&#39;, &#39;PENDING&#39;, &#39;SUCCESSFUL&#39;, &#39;NOT_SUCCESSFUL&#39; or &#39;DISCARDED&#39;. Example: &#39;OPEN,PENDING&#39;. (optional)
     * @param  int $page Result page that you want to retrieve (optional, default to 1)
     * @param  int $per_page Maximum number of records per page. By default it&#39;s 20. Can be at most 500. (optional, default to 20)
     * @param  string[] $order Determines the order of the results. You can use the following fields for ordering the response: &#39;id&#39;, &#39;amount&#39;, &#39;requestDate&#39;, &#39;requestCompletionDate&#39;. The default order for all services is &#39;id,asc&#39;. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStandingOrdersAsync($ids = null, $account_ids = null, $min_amount = null, $max_amount = null, $status = null, $page = 1, $per_page = 20, $order = null, $x_request_id = null)
    {
        return $this->getStandingOrdersAsyncWithHttpInfo($ids, $account_ids, $min_amount, $max_amount, $status, $page, $per_page, $order, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getStandingOrdersAsyncWithHttpInfo
     *
     * Get standing orders
     *
     * @param  int[] $ids A comma-separated list of standing order identifiers. If specified, then only standing orders whose identifier is matching any of the given identifiers will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  int[] $account_ids A comma-separated list of account identifiers. If specified, then only standing orders that relate to the given account(s) will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  float $min_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or greater than the given amount will be regarded. The value must be a positive (absolute) amount. (optional)
     * @param  float $max_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or less than the given amount will be regarded. Value must be a positive (absolute) amount. (optional)
     * @param  string[] $status A comma-separated list of standing order statuses. If provided, then only standing orders whose status is matching any of the given statuses will be returned. Allowed values: &#39;OPEN&#39;, &#39;PENDING&#39;, &#39;SUCCESSFUL&#39;, &#39;NOT_SUCCESSFUL&#39; or &#39;DISCARDED&#39;. Example: &#39;OPEN,PENDING&#39;. (optional)
     * @param  int $page Result page that you want to retrieve (optional, default to 1)
     * @param  int $per_page Maximum number of records per page. By default it&#39;s 20. Can be at most 500. (optional, default to 20)
     * @param  string[] $order Determines the order of the results. You can use the following fields for ordering the response: &#39;id&#39;, &#39;amount&#39;, &#39;requestDate&#39;, &#39;requestCompletionDate&#39;. The default order for all services is &#39;id,asc&#39;. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getStandingOrdersAsyncWithHttpInfo($ids = null, $account_ids = null, $min_amount = null, $max_amount = null, $status = null, $page = 1, $per_page = 20, $order = null, $x_request_id = null)
    {
        $returnType = '\OpenAPIAccess\Client\Model\PageableStandingOrderResources';
        $request = $this->getStandingOrdersRequest($ids, $account_ids, $min_amount, $max_amount, $status, $page, $per_page, $order, $x_request_id);

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
     * Create request for operation 'getStandingOrders'
     *
     * @param  int[] $ids A comma-separated list of standing order identifiers. If specified, then only standing orders whose identifier is matching any of the given identifiers will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  int[] $account_ids A comma-separated list of account identifiers. If specified, then only standing orders that relate to the given account(s) will be regarded. The maximum number of identifiers is 1000. (optional)
     * @param  float $min_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or greater than the given amount will be regarded. The value must be a positive (absolute) amount. (optional)
     * @param  float $max_amount If specified, then only those standing orders are regarded whose (absolute) total amount is equal or less than the given amount will be regarded. Value must be a positive (absolute) amount. (optional)
     * @param  string[] $status A comma-separated list of standing order statuses. If provided, then only standing orders whose status is matching any of the given statuses will be returned. Allowed values: &#39;OPEN&#39;, &#39;PENDING&#39;, &#39;SUCCESSFUL&#39;, &#39;NOT_SUCCESSFUL&#39; or &#39;DISCARDED&#39;. Example: &#39;OPEN,PENDING&#39;. (optional)
     * @param  int $page Result page that you want to retrieve (optional, default to 1)
     * @param  int $per_page Maximum number of records per page. By default it&#39;s 20. Can be at most 500. (optional, default to 20)
     * @param  string[] $order Determines the order of the results. You can use the following fields for ordering the response: &#39;id&#39;, &#39;amount&#39;, &#39;requestDate&#39;, &#39;requestCompletionDate&#39;. The default order for all services is &#39;id,asc&#39;. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getStandingOrdersRequest($ids = null, $account_ids = null, $min_amount = null, $max_amount = null, $status = null, $page = 1, $per_page = 20, $order = null, $x_request_id = null)
    {






        if ($page !== null && $page < 1) {
            throw new \InvalidArgumentException('invalid value for "$page" when calling StandingOrdersApi.getStandingOrders, must be bigger than or equal to 1.');
        }


        if ($per_page !== null && $per_page > 500) {
            throw new \InvalidArgumentException('invalid value for "$per_page" when calling StandingOrdersApi.getStandingOrders, must be smaller than or equal to 500.');
        }
        if ($per_page !== null && $per_page < 1) {
            throw new \InvalidArgumentException('invalid value for "$per_page" when calling StandingOrdersApi.getStandingOrders, must be bigger than or equal to 1.');
        }




        $resourcePath = '/api/v2/standingOrders';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $ids,
            'ids', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $account_ids,
            'accountIds', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $min_amount,
            'minAmount', // param base name
            'number', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $max_amount,
            'maxAmount', // param base name
            'number', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $status,
            'status', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $per_page,
            'perPage', // param base name
            'integer', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $order,
            'order', // param base name
            'array', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

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

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
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
     * Operation submitStandingOrder
     *
     * Submit standing order
     *
     * @param  \OpenAPIAccess\Client\Model\SubmitStandingOrderParams $submit_standing_order_params Parameters for standing order submission (required)
     * @param  string $psu_ip_address The IP address of the user&#39;s device. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_device_os The user&#39;s device and/or operating system identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_user_agent The user&#39;s web browser or other client device identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \OpenAPIAccess\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPIAccess\Client\Model\StandingOrder|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\BadCredentialsError|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage
     */
    public function submitStandingOrder($submit_standing_order_params, $psu_ip_address = null, $psu_device_os = null, $psu_user_agent = null, $x_request_id = null)
    {
        list($response) = $this->submitStandingOrderWithHttpInfo($submit_standing_order_params, $psu_ip_address, $psu_device_os, $psu_user_agent, $x_request_id);
        return $response;
    }

    /**
     * Operation submitStandingOrderWithHttpInfo
     *
     * Submit standing order
     *
     * @param  \OpenAPIAccess\Client\Model\SubmitStandingOrderParams $submit_standing_order_params Parameters for standing order submission (required)
     * @param  string $psu_ip_address The IP address of the user&#39;s device. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_device_os The user&#39;s device and/or operating system identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_user_agent The user&#39;s web browser or other client device identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \OpenAPIAccess\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPIAccess\Client\Model\StandingOrder|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\BadCredentialsError|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage|\OpenAPIAccess\Client\Model\ErrorMessage, HTTP status code, HTTP response headers (array of strings)
     */
    public function submitStandingOrderWithHttpInfo($submit_standing_order_params, $psu_ip_address = null, $psu_device_os = null, $psu_user_agent = null, $x_request_id = null)
    {
        $request = $this->submitStandingOrderRequest($submit_standing_order_params, $psu_ip_address, $psu_device_os, $psu_user_agent, $x_request_id);

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
                    if ('\OpenAPIAccess\Client\Model\StandingOrder' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\StandingOrder' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\StandingOrder', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\OpenAPIAccess\Client\Model\BadCredentialsError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\BadCredentialsError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\BadCredentialsError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 403:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 422:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 501:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 510:
                    if ('\OpenAPIAccess\Client\Model\ErrorMessage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\OpenAPIAccess\Client\Model\ErrorMessage' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPIAccess\Client\Model\ErrorMessage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPIAccess\Client\Model\StandingOrder';
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
                        '\OpenAPIAccess\Client\Model\StandingOrder',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\BadCredentialsError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 501:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 510:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPIAccess\Client\Model\ErrorMessage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation submitStandingOrderAsync
     *
     * Submit standing order
     *
     * @param  \OpenAPIAccess\Client\Model\SubmitStandingOrderParams $submit_standing_order_params Parameters for standing order submission (required)
     * @param  string $psu_ip_address The IP address of the user&#39;s device. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_device_os The user&#39;s device and/or operating system identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_user_agent The user&#39;s web browser or other client device identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function submitStandingOrderAsync($submit_standing_order_params, $psu_ip_address = null, $psu_device_os = null, $psu_user_agent = null, $x_request_id = null)
    {
        return $this->submitStandingOrderAsyncWithHttpInfo($submit_standing_order_params, $psu_ip_address, $psu_device_os, $psu_user_agent, $x_request_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation submitStandingOrderAsyncWithHttpInfo
     *
     * Submit standing order
     *
     * @param  \OpenAPIAccess\Client\Model\SubmitStandingOrderParams $submit_standing_order_params Parameters for standing order submission (required)
     * @param  string $psu_ip_address The IP address of the user&#39;s device. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_device_os The user&#39;s device and/or operating system identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_user_agent The user&#39;s web browser or other client device identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function submitStandingOrderAsyncWithHttpInfo($submit_standing_order_params, $psu_ip_address = null, $psu_device_os = null, $psu_user_agent = null, $x_request_id = null)
    {
        $returnType = '\OpenAPIAccess\Client\Model\StandingOrder';
        $request = $this->submitStandingOrderRequest($submit_standing_order_params, $psu_ip_address, $psu_device_os, $psu_user_agent, $x_request_id);

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
     * Create request for operation 'submitStandingOrder'
     *
     * @param  \OpenAPIAccess\Client\Model\SubmitStandingOrderParams $submit_standing_order_params Parameters for standing order submission (required)
     * @param  string $psu_ip_address The IP address of the user&#39;s device. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_device_os The user&#39;s device and/or operating system identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $psu_user_agent The user&#39;s web browser or other client device identification. This header will be forwarded to the bank if the &#39;XS2A&#39; interface is used. (optional)
     * @param  string $x_request_id With any API call, you can pass a request ID. The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. If you don&#39;t pass a request ID for a call, finAPI will generate a random ID internally. The request ID is always returned back in the response of a service, as a header with name &#39;X-Request-Id&#39;. We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function submitStandingOrderRequest($submit_standing_order_params, $psu_ip_address = null, $psu_device_os = null, $psu_user_agent = null, $x_request_id = null)
    {

        // verify the required parameter 'submit_standing_order_params' is set
        if ($submit_standing_order_params === null || (is_array($submit_standing_order_params) && count($submit_standing_order_params) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $submit_standing_order_params when calling submitStandingOrder'
            );
        }





        $resourcePath = '/api/v2/standingOrders/submit';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // header params
        if ($psu_ip_address !== null) {
            $headerParams['PSU-IP-Address'] = ObjectSerializer::toHeaderValue($psu_ip_address);
        }
        // header params
        if ($psu_device_os !== null) {
            $headerParams['PSU-Device-OS'] = ObjectSerializer::toHeaderValue($psu_device_os);
        }
        // header params
        if ($psu_user_agent !== null) {
            $headerParams['PSU-User-Agent'] = ObjectSerializer::toHeaderValue($psu_user_agent);
        }
        // header params
        if ($x_request_id !== null) {
            $headerParams['X-Request-Id'] = ObjectSerializer::toHeaderValue($x_request_id);
        }



        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($submit_standing_order_params)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($submit_standing_order_params));
            } else {
                $httpBody = $submit_standing_order_params;
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
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
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

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
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
