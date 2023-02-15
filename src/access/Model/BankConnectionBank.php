<?php
/**
 * BankConnectionBank
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * finAPI Access V1 (deprecated)
 *
 * <strong>RESTful API for Account Information Services (AIS) and Payment Initiation Services (PIS)</strong> <br/> <strong>Application Version:</strong> 2.7.0 <br/>  The following pages give you some general information on how to use our APIs.<br/> The actual API services documentation then follows further below. You can use the menu to jump between API sections. <br/> <br/> This page has a built-in HTTP(S) client, so you can test the services directly from within this page, by filling in the request parameters and/or body in the respective services, and then hitting the TRY button. Note that you need to be authorized to make a successful API call. To authorize, refer to the 'Authorization' section of the API, or just use the OAUTH button that can be found near the TRY button. <br/>  <h2 id=\"general-information\">General information</h2>  <h3 id=\"general-error-responses\"><strong>Error Responses</strong></h3> When an API call returns with an error, then in general it has the structure shown in the following example:  <pre> {   \"errors\": [     {       \"message\": \"Interface 'FINTS_SERVER' is not supported for this operation.\",       \"code\": \"BAD_REQUEST\",       \"type\": \"TECHNICAL\"     }   ],   \"date\": \"2020-11-19 16:54:06.854\",   \"requestId\": \"selfgen-312042e7-df55-47e4-bffd-956a68ef37b5\",   \"endpoint\": \"POST /api/v1/bankConnections/import\",   \"authContext\": \"1/21\",   \"bank\": \"DEMO0002 - finAPI Test Redirect Bank\" } </pre>  If an API call requires an additional authentication by the user, HTTP code 510 is returned and the error response contains the additional \"multiStepAuthentication\" object, see the following example:  <pre> {   \"errors\": [     {       \"message\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",       \"code\": \"ADDITIONAL_AUTHENTICATION_REQUIRED\",       \"type\": \"BUSINESS\",       \"multiStepAuthentication\": {         \"hash\": \"678b13f4be9ed7d981a840af8131223a\",         \"status\": \"CHALLENGE_RESPONSE_REQUIRED\",         \"challengeMessage\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",         \"answerFieldLabel\": \"TAN\",         \"redirectUrl\": null,         \"redirectContext\": null,         \"redirectContextField\": null,         \"twoStepProcedures\": null,         \"photoTanMimeType\": null,         \"photoTanData\": null,         \"opticalData\": null,         \"opticalDataAsReinerSct\": false       }     }   ],   \"date\": \"2019-11-29 09:51:55.931\",   \"requestId\": \"selfgen-45059c99-1b14-4df7-9bd3-9d5f126df294\",   \"endpoint\": \"POST /api/v1/bankConnections/import\",   \"authContext\": \"1/18\",   \"bank\": \"DEMO0001 - finAPI Test Bank\" } </pre>  An exception to this error format are API authentication errors, where the following structure is returned:  <pre> {   \"error\": \"invalid_token\",   \"error_description\": \"Invalid access token: cccbce46-xxxx-xxxx-xxxx-xxxxxxxxxx\" } </pre>  <h3 id=\"general-paging\"><strong>Paging</strong></h3> API services that may potentially return a lot of data implement paging. They return a limited number of entries within a \"page\". Further entries must be fetched with subsequent calls. <br/><br/> Any API service that implements paging provides the following input parameters:<br/> &bull; \"page\": the number of the page to be retrieved (starting with 1).<br/> &bull; \"perPage\": the number of entries within a page. The default and maximum value is stated in the documentation of the respective services.  A paged response contains an additional \"paging\" object with the following structure:  <pre> {   ...   ,   \"paging\": {     \"page\": 1,     \"perPage\": 20,     \"pageCount\": 234,     \"totalCount\": 4662   } } </pre>  <h3 id=\"general-internationalization\"><strong>Internationalization</strong></h3> The finAPI services support internationalization which means you can define the language you prefer for API service responses. <br/><br/> The following languages are available: German, English, Czech, Slovak. <br/><br/> The preferred language can be defined by providing the official HTTP <strong>Accept-Language</strong> header. <br/><br/> finAPI reacts on the official iso language codes &quot;de&quot;, &quot;en&quot;, &quot;cs&quot; and &quot;sk&quot; for the named languages. Additional subtags supported by the Accept-Language header may be provided, e.g. &quot;en-US&quot;, but are ignored. <br/> If no Accept-Language header is given, German is used as the default language. <br/><br/> Exceptions:<br/> &bull; Bank login hints and login fields are only available in the language of the bank and not being translated.<br/> &bull; Direct messages from the bank systems typically returned as BUSINESS errors will not be translated.<br/> &bull; BUSINESS errors created by finAPI directly are available in German and English.<br/> &bull; TECHNICAL errors messages meant for developers are mostly in English, but also may be translated.  <h3 id=\"general-request-ids\"><strong>Request IDs</strong></h3> With any API call, you can pass a request ID via a header with name \"X-Request-Id\". The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. <br/><br/> If you don't pass a request ID for a call, finAPI will generate a random ID internally. <br/><br/> The request ID is always returned back in the response of a service, as a header with name \"X-Request-Id\". <br/><br/> We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster.  <h3 id=\"general-overriding-http-methods\"><strong>Overriding HTTP methods</strong></h3> Some HTTP clients do not support the HTTP methods PATCH or DELETE. If you are using such a client in your application, you can use a POST request instead with a special HTTP header indicating the originally intended HTTP method. <br/><br/> The header's name is <strong>X-HTTP-Method-Override</strong>. Set its value to either <strong>PATCH</strong> or <strong>DELETE</strong>. POST Requests having this header set will be treated either as PATCH or DELETE by the finAPI servers. <br/><br/> Example: <br/><br/> <strong>X-HTTP-Method-Override: PATCH</strong><br/> POST /api/v1/label/51<br/> {\"name\": \"changed label\"}<br/><br/> will be interpreted by finAPI as:<br/><br/> PATCH /api/v1/label/51<br/> {\"name\": \"changed label\"}<br/>  <h3 id=\"general-user-metadata\"><strong>User metadata</strong></h3> With the migration to PSD2 APIs, a new term called \"User metadata\" (also known as \"PSU metadata\") has been introduced to the API. This user metadata aims to inform the banking API if there was a real end-user behind an HTTP request or if the request was triggered by a system (e.g. by an automatic batch update). In the latter case, the bank may apply some restrictions such as limiting the number of HTTP requests for a single consent. Also, some operations may be forbidden entirely by the banking API. For example, some banks do not allow issuing a new consent without the end-user being involved. Therefore, it is certainly necessary and obligatory for the customer to provide the PSU metadata for such operations. <br/><br/> As finAPI does not have direct interaction with the end-user, it is the client application's responsibility to provide all the necessary information about the end-user. This must be done by sending additional headers with every request triggered on behalf of the end-user. <br/><br/> At the moment, the following headers are supported by the API:<br/> &bull; \"PSU-IP-Address\" - the IP address of the user's device.<br/> &bull; \"PSU-Device-OS\" - the user's device and/or operating system identification.<br/> &bull; \"PSU-User-Agent\" - the user's web browser or other client device identification.  <h3 id=\"general-faq\"><strong>FAQ</strong></h3> <strong>Is there a finAPI SDK?</strong> <br/> Currently we do not offer a native SDK, but there is the option to generate an SDK for almost any target language via OpenAPI. Use the 'Download SDK' button on this page for SDK generation. <br/> <br/> <strong>How can I enable finAPI's automatic batch update?</strong> <br/> Currently there is no way to set up the batch update via the API. Please contact support@finapi.io for this. <br/> <br/> <strong>Why do I need to keep authorizing when calling services on this page?</strong> <br/> This page is a \"one-page-app\". Reloading the page resets the OAuth authorization context. There is generally no need to reload the page, so just don't do it and your authorization will persist.
 *
 * The version of the OpenAPI document: 2023.06.1
 * Contact: kontakt@finapi.io
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.1.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPIAccess\Client\Model;

use \ArrayAccess;
use \OpenAPIAccess\Client\ObjectSerializer;

/**
 * BankConnectionBank Class Doc Comment
 *
 * @category Class
 * @description &lt;strong&gt;Type:&lt;/strong&gt; Bank&lt;br/&gt; Bank that this connection belongs to
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BankConnectionBank implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BankConnection_bank';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'name' => 'string',
        'login_hint' => 'string',
        'bic' => 'string',
        'blzs' => 'string[]',
        'blz' => 'string',
        'location' => 'string',
        'city' => 'string',
        'is_supported' => 'bool',
        'is_test_bank' => 'bool',
        'popularity' => 'int',
        'health' => 'int',
        'login_field_user_id' => 'string',
        'login_field_customer_id' => 'string',
        'login_field_pin' => 'string',
        'pins_are_volatile' => 'bool',
        'is_customer_id_password' => 'bool',
        'supported_data_sources' => '\OpenAPIAccess\Client\Model\SupportedDataSource[]',
        'interfaces' => '\OpenAPIAccess\Client\Model\BankInterface[]',
        'bank_group' => '\OpenAPIAccess\Client\Model\BankBankGroup',
        'last_communication_attempt' => 'string',
        'last_successful_communication' => 'string',
        'is_beta' => 'bool',
        'logo' => '\OpenAPIAccess\Client\Model\BankLogo',
        'icon' => '\OpenAPIAccess\Client\Model\BankIcon'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'int64',
        'name' => null,
        'login_hint' => null,
        'bic' => null,
        'blzs' => null,
        'blz' => null,
        'location' => null,
        'city' => null,
        'is_supported' => null,
        'is_test_bank' => null,
        'popularity' => 'int32',
        'health' => 'int32',
        'login_field_user_id' => null,
        'login_field_customer_id' => null,
        'login_field_pin' => null,
        'pins_are_volatile' => null,
        'is_customer_id_password' => null,
        'supported_data_sources' => null,
        'interfaces' => null,
        'bank_group' => null,
        'last_communication_attempt' => null,
        'last_successful_communication' => null,
        'is_beta' => null,
        'logo' => null,
        'icon' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'name' => false,
		'login_hint' => true,
		'bic' => true,
		'blzs' => false,
		'blz' => false,
		'location' => true,
		'city' => true,
		'is_supported' => false,
		'is_test_bank' => false,
		'popularity' => false,
		'health' => false,
		'login_field_user_id' => true,
		'login_field_customer_id' => true,
		'login_field_pin' => true,
		'pins_are_volatile' => false,
		'is_customer_id_password' => false,
		'supported_data_sources' => false,
		'interfaces' => false,
		'bank_group' => true,
		'last_communication_attempt' => true,
		'last_successful_communication' => true,
		'is_beta' => false,
		'logo' => true,
		'icon' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'name' => 'name',
        'login_hint' => 'loginHint',
        'bic' => 'bic',
        'blzs' => 'blzs',
        'blz' => 'blz',
        'location' => 'location',
        'city' => 'city',
        'is_supported' => 'isSupported',
        'is_test_bank' => 'isTestBank',
        'popularity' => 'popularity',
        'health' => 'health',
        'login_field_user_id' => 'loginFieldUserId',
        'login_field_customer_id' => 'loginFieldCustomerId',
        'login_field_pin' => 'loginFieldPin',
        'pins_are_volatile' => 'pinsAreVolatile',
        'is_customer_id_password' => 'isCustomerIdPassword',
        'supported_data_sources' => 'supportedDataSources',
        'interfaces' => 'interfaces',
        'bank_group' => 'bankGroup',
        'last_communication_attempt' => 'lastCommunicationAttempt',
        'last_successful_communication' => 'lastSuccessfulCommunication',
        'is_beta' => 'isBeta',
        'logo' => 'logo',
        'icon' => 'icon'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'login_hint' => 'setLoginHint',
        'bic' => 'setBic',
        'blzs' => 'setBlzs',
        'blz' => 'setBlz',
        'location' => 'setLocation',
        'city' => 'setCity',
        'is_supported' => 'setIsSupported',
        'is_test_bank' => 'setIsTestBank',
        'popularity' => 'setPopularity',
        'health' => 'setHealth',
        'login_field_user_id' => 'setLoginFieldUserId',
        'login_field_customer_id' => 'setLoginFieldCustomerId',
        'login_field_pin' => 'setLoginFieldPin',
        'pins_are_volatile' => 'setPinsAreVolatile',
        'is_customer_id_password' => 'setIsCustomerIdPassword',
        'supported_data_sources' => 'setSupportedDataSources',
        'interfaces' => 'setInterfaces',
        'bank_group' => 'setBankGroup',
        'last_communication_attempt' => 'setLastCommunicationAttempt',
        'last_successful_communication' => 'setLastSuccessfulCommunication',
        'is_beta' => 'setIsBeta',
        'logo' => 'setLogo',
        'icon' => 'setIcon'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'login_hint' => 'getLoginHint',
        'bic' => 'getBic',
        'blzs' => 'getBlzs',
        'blz' => 'getBlz',
        'location' => 'getLocation',
        'city' => 'getCity',
        'is_supported' => 'getIsSupported',
        'is_test_bank' => 'getIsTestBank',
        'popularity' => 'getPopularity',
        'health' => 'getHealth',
        'login_field_user_id' => 'getLoginFieldUserId',
        'login_field_customer_id' => 'getLoginFieldCustomerId',
        'login_field_pin' => 'getLoginFieldPin',
        'pins_are_volatile' => 'getPinsAreVolatile',
        'is_customer_id_password' => 'getIsCustomerIdPassword',
        'supported_data_sources' => 'getSupportedDataSources',
        'interfaces' => 'getInterfaces',
        'bank_group' => 'getBankGroup',
        'last_communication_attempt' => 'getLastCommunicationAttempt',
        'last_successful_communication' => 'getLastSuccessfulCommunication',
        'is_beta' => 'getIsBeta',
        'logo' => 'getLogo',
        'icon' => 'getIcon'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('login_hint', $data ?? [], null);
        $this->setIfExists('bic', $data ?? [], null);
        $this->setIfExists('blzs', $data ?? [], null);
        $this->setIfExists('blz', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
        $this->setIfExists('is_supported', $data ?? [], null);
        $this->setIfExists('is_test_bank', $data ?? [], null);
        $this->setIfExists('popularity', $data ?? [], null);
        $this->setIfExists('health', $data ?? [], null);
        $this->setIfExists('login_field_user_id', $data ?? [], null);
        $this->setIfExists('login_field_customer_id', $data ?? [], null);
        $this->setIfExists('login_field_pin', $data ?? [], null);
        $this->setIfExists('pins_are_volatile', $data ?? [], null);
        $this->setIfExists('is_customer_id_password', $data ?? [], null);
        $this->setIfExists('supported_data_sources', $data ?? [], null);
        $this->setIfExists('interfaces', $data ?? [], null);
        $this->setIfExists('bank_group', $data ?? [], null);
        $this->setIfExists('last_communication_attempt', $data ?? [], null);
        $this->setIfExists('last_successful_communication', $data ?? [], null);
        $this->setIfExists('is_beta', $data ?? [], null);
        $this->setIfExists('logo', $data ?? [], null);
        $this->setIfExists('icon', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['login_hint'] === null) {
            $invalidProperties[] = "'login_hint' can't be null";
        }
        if ($this->container['bic'] === null) {
            $invalidProperties[] = "'bic' can't be null";
        }
        if ($this->container['blzs'] === null) {
            $invalidProperties[] = "'blzs' can't be null";
        }
        if ($this->container['blz'] === null) {
            $invalidProperties[] = "'blz' can't be null";
        }
        if ($this->container['location'] === null) {
            $invalidProperties[] = "'location' can't be null";
        }
        if ($this->container['city'] === null) {
            $invalidProperties[] = "'city' can't be null";
        }
        if ($this->container['is_supported'] === null) {
            $invalidProperties[] = "'is_supported' can't be null";
        }
        if ($this->container['is_test_bank'] === null) {
            $invalidProperties[] = "'is_test_bank' can't be null";
        }
        if ($this->container['popularity'] === null) {
            $invalidProperties[] = "'popularity' can't be null";
        }
        if ($this->container['health'] === null) {
            $invalidProperties[] = "'health' can't be null";
        }
        if (($this->container['health'] > 100)) {
            $invalidProperties[] = "invalid value for 'health', must be smaller than or equal to 100.";
        }

        if (($this->container['health'] < 0)) {
            $invalidProperties[] = "invalid value for 'health', must be bigger than or equal to 0.";
        }

        if ($this->container['login_field_user_id'] === null) {
            $invalidProperties[] = "'login_field_user_id' can't be null";
        }
        if ($this->container['login_field_customer_id'] === null) {
            $invalidProperties[] = "'login_field_customer_id' can't be null";
        }
        if ($this->container['login_field_pin'] === null) {
            $invalidProperties[] = "'login_field_pin' can't be null";
        }
        if ($this->container['pins_are_volatile'] === null) {
            $invalidProperties[] = "'pins_are_volatile' can't be null";
        }
        if ($this->container['is_customer_id_password'] === null) {
            $invalidProperties[] = "'is_customer_id_password' can't be null";
        }
        if ($this->container['supported_data_sources'] === null) {
            $invalidProperties[] = "'supported_data_sources' can't be null";
        }
        if ($this->container['interfaces'] === null) {
            $invalidProperties[] = "'interfaces' can't be null";
        }
        if ($this->container['bank_group'] === null) {
            $invalidProperties[] = "'bank_group' can't be null";
        }
        if ($this->container['last_communication_attempt'] === null) {
            $invalidProperties[] = "'last_communication_attempt' can't be null";
        }
        if ($this->container['last_successful_communication'] === null) {
            $invalidProperties[] = "'last_successful_communication' can't be null";
        }
        if ($this->container['is_beta'] === null) {
            $invalidProperties[] = "'is_beta' can't be null";
        }
        if ($this->container['logo'] === null) {
            $invalidProperties[] = "'logo' can't be null";
        }
        if ($this->container['icon'] === null) {
            $invalidProperties[] = "'icon' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id Bank identifier.<br/><br/>NOTE: Do NOT assume that the identifiers of banks are the same across different finAPI environments. In fact, the identifiers may change whenever a new finAPI version is released, even within the same environment. The identifiers are meant to be used for references within the finAPI services only, but not for hard-coding them in your application. If you need to hard-code the usage of a certain bank within your application, please instead refer to the BLZ.
     *
     * @return self
     */
    public function setId($id)
    {

        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }

        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Name of bank
     *
     * @return self
     */
    public function setName($name)
    {

        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets login_hint
     *
     * @return string
     */
    public function getLoginHint()
    {
        return $this->container['login_hint'];
    }

    /**
     * Sets login_hint
     *
     * @param string $login_hint THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'loginHint' field in the 'interfaces' instead.<br/><br/>Login hint. Contains a German message for the user that explains what kind of credentials are expected.<br/><br/>Please note that it is strongly recommended to always show the login hint to the user if there is one, as the credentials that finAPI requires for the bank might be different to the credentials that the user knows from the bank's website.<br/><br/>Also note that the contents of this field should always be interpreted as HTML, as the text might contain HTML tags for highlighted words, paragraphs, etc.
     *
     * @return self
     */
    public function setLoginHint($login_hint)
    {

        if (is_null($login_hint)) {
            array_push($this->openAPINullablesSetToNull, 'login_hint');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('login_hint', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['login_hint'] = $login_hint;

        return $this;
    }

    /**
     * Gets bic
     *
     * @return string
     */
    public function getBic()
    {
        return $this->container['bic'];
    }

    /**
     * Sets bic
     *
     * @param string $bic BIC of bank
     *
     * @return self
     */
    public function setBic($bic)
    {

        if (is_null($bic)) {
            array_push($this->openAPINullablesSetToNull, 'bic');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('bic', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['bic'] = $bic;

        return $this;
    }

    /**
     * Gets blzs
     *
     * @return string[]
     */
    public function getBlzs()
    {
        return $this->container['blzs'];
    }

    /**
     * Sets blzs
     *
     * @param string[] $blzs blzs
     *
     * @return self
     */
    public function setBlzs($blzs)
    {

        if (is_null($blzs)) {
            throw new \InvalidArgumentException('non-nullable blzs cannot be null');
        }

        $this->container['blzs'] = $blzs;

        return $this;
    }

    /**
     * Gets blz
     *
     * @return string
     */
    public function getBlz()
    {
        return $this->container['blz'];
    }

    /**
     * Sets blz
     *
     * @param string $blz BLZ of bank
     *
     * @return self
     */
    public function setBlz($blz)
    {

        if (is_null($blz)) {
            throw new \InvalidArgumentException('non-nullable blz cannot be null');
        }

        $this->container['blz'] = $blz;

        return $this;
    }

    /**
     * Gets location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param string $location Bank location (two-letter country code; ISO 3166 ALPHA-2). Note that when this field is not set, it means that this bank depicts an international institute which is not bound to any specific country.
     *
     * @return self
     */
    public function setLocation($location)
    {

        if (is_null($location)) {
            array_push($this->openAPINullablesSetToNull, 'location');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('location', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['location'] = $location;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city City that this bank is located in. Note that this field may not be set for some banks.
     *
     * @return self
     */
    public function setCity($city)
    {

        if (is_null($city)) {
            array_push($this->openAPINullablesSetToNull, 'city');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('city', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets is_supported
     *
     * @return bool
     */
    public function getIsSupported()
    {
        return $this->container['is_supported'];
    }

    /**
     * Sets is_supported
     *
     * @param bool $is_supported THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'isMoneyTransferSupported' and 'isAisSupported' fields in the 'interfaces' instead.<br/><br/>Whether this bank is supported by finAPI, i.e. whether you can import/update a bank connection of this bank.<br/><br/>NOTE: this field only regards FINTS_SERVER and WEB_SCRAPER interfaces. XS2A is not considered.
     *
     * @return self
     */
    public function setIsSupported($is_supported)
    {

        if (is_null($is_supported)) {
            throw new \InvalidArgumentException('non-nullable is_supported cannot be null');
        }

        $this->container['is_supported'] = $is_supported;

        return $this;
    }

    /**
     * Gets is_test_bank
     *
     * @return bool
     */
    public function getIsTestBank()
    {
        return $this->container['is_test_bank'];
    }

    /**
     * Sets is_test_bank
     *
     * @param bool $is_test_bank If true, then this bank does not depict a real bank, but rather a testing endpoint provided by a bank or by finAPI. You probably want to regard these banks only during the development of your application, but not in production. You can filter out these banks in production by making sure that the 'isTestBank' parameter is always set to 'false' whenever your application is calling the 'Get and search all banks' service.
     *
     * @return self
     */
    public function setIsTestBank($is_test_bank)
    {

        if (is_null($is_test_bank)) {
            throw new \InvalidArgumentException('non-nullable is_test_bank cannot be null');
        }

        $this->container['is_test_bank'] = $is_test_bank;

        return $this;
    }

    /**
     * Gets popularity
     *
     * @return int
     */
    public function getPopularity()
    {
        return $this->container['popularity'];
    }

    /**
     * Sets popularity
     *
     * @param int $popularity Popularity of this bank with your users (mandator-wide, i.e. across all of your clients). The value equals the number of bank connections that are currently imported for this bank across all of your users (which means it is a constantly adjusting value). You can use this field for statistical evaluation, and also for ordering bank search results (see service 'Get and search all banks').
     *
     * @return self
     */
    public function setPopularity($popularity)
    {

        if (is_null($popularity)) {
            throw new \InvalidArgumentException('non-nullable popularity cannot be null');
        }

        $this->container['popularity'] = $popularity;

        return $this;
    }

    /**
     * Gets health
     *
     * @return int
     */
    public function getHealth()
    {
        return $this->container['health'];
    }

    /**
     * Sets health
     *
     * @param int $health THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'health' field in the 'interfaces' instead. <br/><br/>The health status of this bank. This is a value between 0 and 100, depicting the percentage of successful communication attempts with this bank during the latest couple of bank connection imports or updates (across the entire finAPI system). Note that 'successful' means that there was no technical error trying to establish a communication with the bank. Non-technical errors (like incorrect credentials) are regarded successful communication attempts.
     *
     * @return self
     */
    public function setHealth($health)
    {

        if (($health > 100)) {
            throw new \InvalidArgumentException('invalid value for $health when calling BankConnectionBank., must be smaller than or equal to 100.');
        }
        if (($health < 0)) {
            throw new \InvalidArgumentException('invalid value for $health when calling BankConnectionBank., must be bigger than or equal to 0.');
        }


        if (is_null($health)) {
            throw new \InvalidArgumentException('non-nullable health cannot be null');
        }

        $this->container['health'] = $health;

        return $this;
    }

    /**
     * Gets login_field_user_id
     *
     * @return string
     */
    public function getLoginFieldUserId()
    {
        return $this->container['login_field_user_id'];
    }

    /**
     * Sets login_field_user_id
     *
     * @param string $login_field_user_id THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'loginCredentials' in the 'interfaces' instead.<br/><br/>Label for the user ID login field, as it is called on the bank's website (e.g. \"Nutzerkennung\"). If this field is set (i.e. not null) then you should prompt your users to enter the required data in a text field which you can label with this field's value.
     *
     * @return self
     */
    public function setLoginFieldUserId($login_field_user_id)
    {

        if (is_null($login_field_user_id)) {
            array_push($this->openAPINullablesSetToNull, 'login_field_user_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('login_field_user_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['login_field_user_id'] = $login_field_user_id;

        return $this;
    }

    /**
     * Gets login_field_customer_id
     *
     * @return string
     */
    public function getLoginFieldCustomerId()
    {
        return $this->container['login_field_customer_id'];
    }

    /**
     * Sets login_field_customer_id
     *
     * @param string $login_field_customer_id THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'loginCredentials' in the 'interfaces' instead.<br/><br/>Label for the customer ID login field, as it is called on the bank's website (e.g. \"Kundennummer\"). If this field is set (i.e. not null) then you should prompt your users to enter the required data in a text field which you can label with this field's value.
     *
     * @return self
     */
    public function setLoginFieldCustomerId($login_field_customer_id)
    {

        if (is_null($login_field_customer_id)) {
            array_push($this->openAPINullablesSetToNull, 'login_field_customer_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('login_field_customer_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['login_field_customer_id'] = $login_field_customer_id;

        return $this;
    }

    /**
     * Gets login_field_pin
     *
     * @return string
     */
    public function getLoginFieldPin()
    {
        return $this->container['login_field_pin'];
    }

    /**
     * Sets login_field_pin
     *
     * @param string $login_field_pin THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'loginCredentials' in the 'interfaces' instead.<br/><br/>Label for the PIN field, as it is called on the bank's website (mostly \"PIN\"). If this field is set (i.e. not null) then you should prompt your users to enter the required data in a text field which you can label with this field's value.
     *
     * @return self
     */
    public function setLoginFieldPin($login_field_pin)
    {

        if (is_null($login_field_pin)) {
            array_push($this->openAPINullablesSetToNull, 'login_field_pin');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('login_field_pin', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['login_field_pin'] = $login_field_pin;

        return $this;
    }

    /**
     * Gets pins_are_volatile
     *
     * @return bool
     */
    public function getPinsAreVolatile()
    {
        return $this->container['pins_are_volatile'];
    }

    /**
     * Sets pins_are_volatile
     *
     * @param bool $pins_are_volatile THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'isVolatile' field of the 'loginCredentials' in the 'interfaces' instead.<br/><br/>Whether the PINs that are used for authentication with the bank are volatile. If the PINs are volatile, it means that the value for the field, which is provided by the user, is valid only for a single authentication and then gets invalidated on bank-side. If pinsAreVolatile is true, it is not possible to store the PIN in finAPI, as a stored PIN will never work for future authentications.
     *
     * @return self
     */
    public function setPinsAreVolatile($pins_are_volatile)
    {

        if (is_null($pins_are_volatile)) {
            throw new \InvalidArgumentException('non-nullable pins_are_volatile cannot be null');
        }

        $this->container['pins_are_volatile'] = $pins_are_volatile;

        return $this;
    }

    /**
     * Gets is_customer_id_password
     *
     * @return bool
     */
    public function getIsCustomerIdPassword()
    {
        return $this->container['is_customer_id_password'];
    }

    /**
     * Sets is_customer_id_password
     *
     * @param bool $is_customer_id_password THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'isSecret' field of the 'loginCredentials' in 'interfaces' instead.<br/><br/>Whether the banking customer ID has to be treated like a password. Certain banks require a second password (besides the PIN) for the user to login. In this case your application should use a password input field when prompting users for their credentials.
     *
     * @return self
     */
    public function setIsCustomerIdPassword($is_customer_id_password)
    {

        if (is_null($is_customer_id_password)) {
            throw new \InvalidArgumentException('non-nullable is_customer_id_password cannot be null');
        }

        $this->container['is_customer_id_password'] = $is_customer_id_password;

        return $this;
    }

    /**
     * Gets supported_data_sources
     *
     * @return SupportedDataSource[]
     */
    public function getSupportedDataSources()
    {
        return $this->container['supported_data_sources'];
    }

    /**
     * Sets supported_data_sources
     *
     * @param SupportedDataSource[] $supported_data_sources supported_data_sources
     *
     * @return self
     */
    public function setSupportedDataSources($supported_data_sources)
    {

        if (is_null($supported_data_sources)) {
            throw new \InvalidArgumentException('non-nullable supported_data_sources cannot be null');
        }

        $this->container['supported_data_sources'] = $supported_data_sources;

        return $this;
    }

    /**
     * Gets interfaces
     *
     * @return \OpenAPIAccess\Client\Model\BankInterface[]
     */
    public function getInterfaces()
    {
        return $this->container['interfaces'];
    }

    /**
     * Sets interfaces
     *
     * @param \OpenAPIAccess\Client\Model\BankInterface[] $interfaces <strong>Type:</strong> BankInterface<br/> Set of interfaces that finAPI can use to connect to the bank. Note that this set will be empty for non-supported banks. Note also that the WEB_SCRAPER interface might be disabled for your client (see GET /clientConfiguration). When this is the case, then finAPI will not use the web scraper for data download, and if the web scraper is the only supported interface of this bank, then finAPI will not allow to download any data for this bank at all (for details, see POST /bankConnections/import and POST /bankConnections/update).
     *
     * @return self
     */
    public function setInterfaces($interfaces)
    {

        if (is_null($interfaces)) {
            throw new \InvalidArgumentException('non-nullable interfaces cannot be null');
        }

        $this->container['interfaces'] = $interfaces;

        return $this;
    }

    /**
     * Gets bank_group
     *
     * @return \OpenAPIAccess\Client\Model\BankBankGroup
     */
    public function getBankGroup()
    {
        return $this->container['bank_group'];
    }

    /**
     * Sets bank_group
     *
     * @param \OpenAPIAccess\Client\Model\BankBankGroup $bank_group bank_group
     *
     * @return self
     */
    public function setBankGroup($bank_group)
    {

        if (is_null($bank_group)) {
            array_push($this->openAPINullablesSetToNull, 'bank_group');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('bank_group', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['bank_group'] = $bank_group;

        return $this;
    }

    /**
     * Gets last_communication_attempt
     *
     * @return string
     */
    public function getLastCommunicationAttempt()
    {
        return $this->container['last_communication_attempt'];
    }

    /**
     * Sets last_communication_attempt
     *
     * @param string $last_communication_attempt <strong>Format:</strong> 'YYYY-MM-DD HH:MM:SS.SSS' (german time)<br/>THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'lastCommunicationAttempt' field in the 'interfaces' instead. <br/><br/>Time of the last communication attempt with this bank during a bank connection import or update (across the entire finAPI system).
     *
     * @return self
     */
    public function setLastCommunicationAttempt($last_communication_attempt)
    {

        if (is_null($last_communication_attempt)) {
            array_push($this->openAPINullablesSetToNull, 'last_communication_attempt');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_communication_attempt', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_communication_attempt'] = $last_communication_attempt;

        return $this;
    }

    /**
     * Gets last_successful_communication
     *
     * @return string
     */
    public function getLastSuccessfulCommunication()
    {
        return $this->container['last_successful_communication'];
    }

    /**
     * Sets last_successful_communication
     *
     * @param string $last_successful_communication <strong>Format:</strong> 'YYYY-MM-DD HH:MM:SS.SSS' (german time)<br/>THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'lastSuccessfulCommunication' field in the 'interfaces' instead. <br/><br/>Time of the last successful communication with this bank during a bank connection import or update (across the entire finAPI system).
     *
     * @return self
     */
    public function setLastSuccessfulCommunication($last_successful_communication)
    {

        if (is_null($last_successful_communication)) {
            array_push($this->openAPINullablesSetToNull, 'last_successful_communication');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_successful_communication', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_successful_communication'] = $last_successful_communication;

        return $this;
    }

    /**
     * Gets is_beta
     *
     * @return bool
     */
    public function getIsBeta()
    {
        return $this->container['is_beta'];
    }

    /**
     * Sets is_beta
     *
     * @param bool $is_beta Whether this bank is in beta phase. For more details, please refer to the field ClientConfiguration.betaBanksEnabled.
     *
     * @return self
     */
    public function setIsBeta($is_beta)
    {

        if (is_null($is_beta)) {
            throw new \InvalidArgumentException('non-nullable is_beta cannot be null');
        }

        $this->container['is_beta'] = $is_beta;

        return $this;
    }

    /**
     * Gets logo
     *
     * @return \OpenAPIAccess\Client\Model\BankLogo
     */
    public function getLogo()
    {
        return $this->container['logo'];
    }

    /**
     * Sets logo
     *
     * @param \OpenAPIAccess\Client\Model\BankLogo $logo logo
     *
     * @return self
     */
    public function setLogo($logo)
    {

        if (is_null($logo)) {
            array_push($this->openAPINullablesSetToNull, 'logo');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('logo', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['logo'] = $logo;

        return $this;
    }

    /**
     * Gets icon
     *
     * @return \OpenAPIAccess\Client\Model\BankIcon
     */
    public function getIcon()
    {
        return $this->container['icon'];
    }

    /**
     * Sets icon
     *
     * @param \OpenAPIAccess\Client\Model\BankIcon $icon icon
     *
     * @return self
     */
    public function setIcon($icon)
    {

        if (is_null($icon)) {
            array_push($this->openAPINullablesSetToNull, 'icon');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('icon', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['icon'] = $icon;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


