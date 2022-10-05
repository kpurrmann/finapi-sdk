<?php
/**
 * ApiException
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIGiroIdent\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * finAPI GiroIdent Services
 *
 * GiroIdent is an user identity check service. It validates the user's personal information against the user's bank account details, and optionally against the SCHUFA account check and identity check services.  The following documentation aims to provide guidance on how to use the GiroIdent API to carry out secure online verifications of end customers. The Service is based on a set of **Checks**. As a partner application, the recommended integration of these checks is as follows:  1. Partner application calls GiroIdent service **Create Check** with the relevant parameters. GiroIdent returns a GiroIdent Redirect URL. 1. Partner application *sends* (redirects) the user to \"Web Form Redirect URL\". 1. The user follows GiroIdent UI and grants GiroIdent access to her bank account. 1. The GiroIdent UI will optionally redirect the user to a result or error URL, if configured by the partner application (via query parameters appended to the Web Form Redirect URL). 1. The partner application checks the GiroIdent result using **Get Check** service and displays the result.  All API calls have to be autorized using an OAuth2 bearer token, which represents a finAPI user identity. Creating this user identity is a pre-requisite for using the GiroIdent services. This enables GiroIdent to be integrated in more advanced usecases, including other finAPI webservices like finAPI Access or finAPI Data Intelligence.  Detailed documentation related to use and integration can be found in the [GiroIdent developer documentation](https://documentation.finapi.io/gi2.0).  How to use the finAPI Web Form, and how to integrate it as website or web component, or to configure redirects after termination: finAPI Web Form [API documentation](https://docs.finapi.io/?product=web_form_2.0) and [public documentation](https://finapi.jira.com/wiki/spaces/FWFPD).  Related to user creation and retrieval of the required authorization token to use Giroident, refer to the [finAPI Access API documentation and REST client](https://docs-testing.finapi.io/) for the finAPI sandbox environment.  <sub>Application-Version: 1.30.0</sub>
 *
 * The version of the OpenAPI document: 2022.34.1
 * Contact: kontakt@finapi.io
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.2.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPIGiroIdent\Client;

use \Exception;

/**
 * ApiException Class Doc Comment
 *
 * @category Class
 * @package  OpenAPIGiroIdent\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ApiException extends Exception
{
    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var \stdClass|string|null
     */
    protected $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[]|null
     */
    protected $responseHeaders;

    /**
     * The deserialized response object
     *
     * @var \stdClass|string|null
     */
    protected $responseObject;

    /**
     * Constructor
     *
     * @param string                $message         Error message
     * @param int                   $code            HTTP status code
     * @param string[]|null         $responseHeaders HTTP response header
     * @param \stdClass|string|null $responseBody    HTTP decoded body of the server response either as \stdClass or string
     */
    public function __construct($message = "", $code = 0, $responseHeaders = [], $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header
     *
     * @return string[]|null HTTP response header
     */
    public function getResponseHeaders()
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return \stdClass|string|null HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Sets the deserialized response object (during deserialization)
     *
     * @param mixed $obj Deserialized response object
     *
     * @return void
     */
    public function setResponseObject($obj)
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deserialized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }
}
