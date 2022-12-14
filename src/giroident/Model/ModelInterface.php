<?php
/**
 * ModelInterface
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIGiroIdent\Client\Model
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

namespace OpenAPIGiroIdent\Client\Model;

/**
 * Interface abstracting model access.
 *
 * @package OpenAPIGiroIdent\Client\Model
 * @author  OpenAPI Generator team
 */
interface ModelInterface
{
    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName();

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes();

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats();

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @return array
     */
    public static function attributeMap();

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters();

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters();

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array
     */
    public function listInvalidProperties();

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool
     */
    public function valid();

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool;

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool;
}
