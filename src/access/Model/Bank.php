<?php
/**
 * Bank
 *
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
 * <strong>RESTful API for Account Information Services (AIS) and Payment Initiation Services (PIS)</strong> <br/> <strong>Application Version:</strong> 2.7.0 <br/>  The following pages give you some general information on how to use our APIs.<br/> The actual API services documentation then follows further below. You can use the menu to jump between API sections. <br/> <br/> This page has a built-in HTTP(S) client, so you can test the services directly from within this page, by filling in the request parameters and/or body in the respective services, and then hitting the TRY button. Note that you need to be authorized to make a successful API call. To authorize, refer to the 'Authorization' section of the API, or just use the OAUTH button that can be found near the TRY button. <br/>  <h2 id=\"general-information\">General information</h2>  <h3 id=\"general-error-responses\"><strong>Error Responses</strong></h3> When an API call returns with an error, then in general it has the structure shown in the following example:  <pre> {   \"errors\": [     {       \"message\": \"Interface 'FINTS_SERVER' is not supported for this operation.\",       \"code\": \"BAD_REQUEST\",       \"type\": \"TECHNICAL\"     }   ],   \"date\": \"2020-11-19T16:54:06.854+01:00\",   \"requestId\": \"selfgen-312042e7-df55-47e4-bffd-956a68ef37b5\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/21\",   \"bank\": \"DEMO0002 - finAPI Test Redirect Bank\" } </pre>  If an API call requires an additional authentication by the user, HTTP code 510 is returned and the error response contains the additional \"multiStepAuthentication\" object, see the following example:  <pre> {   \"errors\": [     {       \"message\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",       \"code\": \"ADDITIONAL_AUTHENTICATION_REQUIRED\",       \"type\": \"BUSINESS\",       \"multiStepAuthentication\": {         \"hash\": \"678b13f4be9ed7d981a840af8131223a\",         \"status\": \"CHALLENGE_RESPONSE_REQUIRED\",         \"challengeMessage\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",         \"answerFieldLabel\": \"TAN\",         \"redirectUrl\": null,         \"redirectContext\": null,         \"redirectContextField\": null,         \"twoStepProcedures\": null,         \"photoTanMimeType\": null,         \"photoTanData\": null,         \"opticalData\": null,         \"opticalDataAsReinerSct\": false       }     }   ],   \"date\": \"2019-11-29T09:51:55.931+01:00\",   \"requestId\": \"selfgen-45059c99-1b14-4df7-9bd3-9d5f126df294\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/18\",   \"bank\": \"DEMO0001 - finAPI Test Bank\" } </pre>  An exception to this error format are API authentication errors, where the following structure is returned:  <pre> {   \"error\": \"invalid_token\",   \"error_description\": \"Invalid access token: cccbce46-xxxx-xxxx-xxxx-xxxxxxxxxx\" } </pre>  <h3 id=\"general-paging\"><strong>Paging</strong></h3> API services that may potentially return a lot of data implement paging. They return a limited number of entries within a \"page\". Further entries must be fetched with subsequent calls. <br/><br/> Any API service that implements paging provides the following input parameters:<br/> &bull; \"page\": the number of the page to be retrieved (starting with 1).<br/> &bull; \"perPage\": the number of entries within a page. The default and maximum value is stated in the documentation of the respective services.  A paged response contains an additional \"paging\" object with the following structure:  <pre> {   ...   ,   \"paging\": {     \"page\": 1,     \"perPage\": 20,     \"pageCount\": 234,     \"totalCount\": 4662   } } </pre>  <h3 id=\"general-internationalization\"><strong>Internationalization</strong></h3> The finAPI services support internationalization which means you can define the language you prefer for API service responses. <br/><br/> The following languages are available: German, English, Czech, Slovak. <br/><br/> The preferred language can be defined by providing the official HTTP <strong>Accept-Language</strong> header. <br/><br/> finAPI reacts on the official iso language codes &quot;de&quot;, &quot;en&quot;, &quot;cs&quot; and &quot;sk&quot; for the named languages. Additional subtags supported by the Accept-Language header may be provided, e.g. &quot;en-US&quot;, but are ignored. <br/> If no Accept-Language header is given, German is used as the default language. <br/><br/> Exceptions:<br/> &bull; Bank login hints and login fields are only available in the language of the bank and not being translated.<br/> &bull; Direct messages from the bank systems typically returned as BUSINESS errors will not be translated.<br/> &bull; BUSINESS errors created by finAPI directly are available in German and English.<br/> &bull; TECHNICAL errors messages meant for developers are mostly in English, but also may be translated.  <h3 id=\"general-request-ids\"><strong>Request IDs</strong></h3> With any API call, you can pass a request ID via a header with name \"X-Request-Id\". The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. <br/><br/> If you don't pass a request ID for a call, finAPI will generate a random ID internally. <br/><br/> The request ID is always returned back in the response of a service, as a header with name \"X-Request-Id\". <br/><br/> We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster.  <h3 id=\"general-overriding-http-methods\"><strong>Overriding HTTP methods</strong></h3> Some HTTP clients do not support the HTTP methods PATCH or DELETE. If you are using such a client in your application, you can use a POST request instead with a special HTTP header indicating the originally intended HTTP method. <br/><br/> The header's name is <strong>X-HTTP-Method-Override</strong>. Set its value to either <strong>PATCH</strong> or <strong>DELETE</strong>. POST Requests having this header set will be treated either as PATCH or DELETE by the finAPI servers. <br/><br/> Example: <br/><br/> <strong>X-HTTP-Method-Override: PATCH</strong><br/> POST /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/><br/> will be interpreted by finAPI as:<br/><br/> PATCH /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/>  <h3 id=\"general-user-metadata\"><strong>User metadata</strong></h3> With the migration to PSD2 APIs, a new term called \"User metadata\" (also known as \"PSU metadata\") has been introduced to the API. This user metadata aims to inform the banking API if there was a real end-user behind an HTTP request or if the request was triggered by a system (e.g. by an automatic batch update). In the latter case, the bank may apply some restrictions such as limiting the number of HTTP requests for a single consent. Also, some operations may be forbidden entirely by the banking API. For example, some banks do not allow issuing a new consent without the end-user being involved. Therefore, it is certainly necessary and obligatory for the customer to provide the PSU metadata for such operations. <br/><br/> As finAPI does not have direct interaction with the end-user, it is the client application's responsibility to provide all the necessary information about the end-user. This must be done by sending additional headers with every request triggered on behalf of the end-user. <br/><br/> At the moment, the following headers are supported by the API:<br/> &bull; \"PSU-IP-Address\" - the IP address of the user's device.<br/> &bull; \"PSU-Device-OS\" - the user's device and/or operating system identification.<br/> &bull; \"PSU-User-Agent\" - the user's web browser or other client device identification.  <h3 id=\"general-faq\"><strong>FAQ</strong></h3> <strong>Is there a finAPI SDK?</strong> <br/> Currently we do not offer a native SDK, but there is the option to generate an SDK for almost any target language via OpenAPI. Use the 'Download SDK' button on this page for SDK generation. <br/> <br/> <strong>How can I enable finAPI's automatic batch update?</strong> <br/> Currently there is no way to set up the batch update via the API. Please contact support@finapi.io for this. <br/> <br/> <strong>Why do I need to keep authorizing when calling services on this page?</strong> <br/> This page is a \"one-page-app\". Reloading the page resets the OAuth authorization context. There is generally no need to reload the page, so just don't do it and your authorization will persist.
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
 * Bank Class Doc Comment
 *
 * @category Class
 * @description Container for a bank&#39;s data
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Bank implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Bank';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'name' => 'string',
        'bic' => 'string',
        'blz' => 'string',
        'location' => 'string',
        'city' => 'string',
        'is_test_bank' => 'bool',
        'popularity' => 'int',
        'interfaces' => '\OpenAPIAccess\Client\Model\BankInterface[]',
        'bank_group' => '\OpenAPIAccess\Client\Model\BankBankGroup',
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
        'bic' => null,
        'blz' => null,
        'location' => null,
        'city' => null,
        'is_test_bank' => null,
        'popularity' => 'int32',
        'interfaces' => null,
        'bank_group' => null,
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
		'bic' => false,
		'blz' => false,
		'location' => false,
		'city' => false,
		'is_test_bank' => false,
		'popularity' => false,
		'interfaces' => false,
		'bank_group' => false,
		'is_beta' => false,
		'logo' => false,
		'icon' => false
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
        'bic' => 'bic',
        'blz' => 'blz',
        'location' => 'location',
        'city' => 'city',
        'is_test_bank' => 'isTestBank',
        'popularity' => 'popularity',
        'interfaces' => 'interfaces',
        'bank_group' => 'bankGroup',
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
        'bic' => 'setBic',
        'blz' => 'setBlz',
        'location' => 'setLocation',
        'city' => 'setCity',
        'is_test_bank' => 'setIsTestBank',
        'popularity' => 'setPopularity',
        'interfaces' => 'setInterfaces',
        'bank_group' => 'setBankGroup',
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
        'bic' => 'getBic',
        'blz' => 'getBlz',
        'location' => 'getLocation',
        'city' => 'getCity',
        'is_test_bank' => 'getIsTestBank',
        'popularity' => 'getPopularity',
        'interfaces' => 'getInterfaces',
        'bank_group' => 'getBankGroup',
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
        $this->setIfExists('bic', $data ?? [], null);
        $this->setIfExists('blz', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
        $this->setIfExists('is_test_bank', $data ?? [], null);
        $this->setIfExists('popularity', $data ?? [], null);
        $this->setIfExists('interfaces', $data ?? [], null);
        $this->setIfExists('bank_group', $data ?? [], null);
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
        if ($this->container['blz'] === null) {
            $invalidProperties[] = "'blz' can't be null";
        }
        if ($this->container['is_test_bank'] === null) {
            $invalidProperties[] = "'is_test_bank' can't be null";
        }
        if ($this->container['popularity'] === null) {
            $invalidProperties[] = "'popularity' can't be null";
        }
        if ($this->container['interfaces'] === null) {
            $invalidProperties[] = "'interfaces' can't be null";
        }
        if ($this->container['is_beta'] === null) {
            $invalidProperties[] = "'is_beta' can't be null";
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
     * Gets bic
     *
     * @return string|null
     */
    public function getBic()
    {
        return $this->container['bic'];
    }

    /**
     * Sets bic
     *
     * @param string|null $bic BIC of bank
     *
     * @return self
     */
    public function setBic($bic)
    {

        if (is_null($bic)) {
            throw new \InvalidArgumentException('non-nullable bic cannot be null');
        }

        $this->container['bic'] = $bic;

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
     * @return string|null
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param string|null $location Bank location (two-letter country code; ISO 3166 ALPHA-2). Note that when this field is not set, it means that this bank depicts an international institute which is not bound to any specific country.
     *
     * @return self
     */
    public function setLocation($location)
    {

        if (is_null($location)) {
            throw new \InvalidArgumentException('non-nullable location cannot be null');
        }

        $this->container['location'] = $location;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string|null $city City that this bank is located in. Note that this field may not be set for some banks.
     *
     * @return self
     */
    public function setCity($city)
    {

        if (is_null($city)) {
            throw new \InvalidArgumentException('non-nullable city cannot be null');
        }

        $this->container['city'] = $city;

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
     * @param \OpenAPIAccess\Client\Model\BankInterface[] $interfaces <strong>Type:</strong> BankInterface<br/> Set of interfaces that exist for the bank.<br/><br/>Note:<br/>&bull; If the set is empty, then the bank is not supported.<br/>&bull; Even if an interface is listed, it might not be usable at the moment. Please always refer to the fields 'BankInterface.isAisSupported' / 'BankInterface.isPisSupported' before you attempt to use an interface.<br/>&bull; The WEB_SCRAPER interface might be disabled for your client (see GET /clientConfiguration). When this is the case, then finAPI will not use the web scraper for data download, and if the web scraper is the only supported interface of this bank, then finAPI will not allow to download any data for this bank at all (for details, see POST /bankConnections/import and POST /bankConnections/update). Also, you will not be able to do payments via the WEB_SCRAPER interface, if web scraping is disabled for your client.
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
     * @return \OpenAPIAccess\Client\Model\BankBankGroup|null
     */
    public function getBankGroup()
    {
        return $this->container['bank_group'];
    }

    /**
     * Sets bank_group
     *
     * @param \OpenAPIAccess\Client\Model\BankBankGroup|null $bank_group bank_group
     *
     * @return self
     */
    public function setBankGroup($bank_group)
    {

        if (is_null($bank_group)) {
            throw new \InvalidArgumentException('non-nullable bank_group cannot be null');
        }

        $this->container['bank_group'] = $bank_group;

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
     * @return \OpenAPIAccess\Client\Model\BankLogo|null
     */
    public function getLogo()
    {
        return $this->container['logo'];
    }

    /**
     * Sets logo
     *
     * @param \OpenAPIAccess\Client\Model\BankLogo|null $logo logo
     *
     * @return self
     */
    public function setLogo($logo)
    {

        if (is_null($logo)) {
            throw new \InvalidArgumentException('non-nullable logo cannot be null');
        }

        $this->container['logo'] = $logo;

        return $this;
    }

    /**
     * Gets icon
     *
     * @return \OpenAPIAccess\Client\Model\BankIcon|null
     */
    public function getIcon()
    {
        return $this->container['icon'];
    }

    /**
     * Sets icon
     *
     * @param \OpenAPIAccess\Client\Model\BankIcon|null $icon icon
     *
     * @return self
     */
    public function setIcon($icon)
    {

        if (is_null($icon)) {
            throw new \InvalidArgumentException('non-nullable icon cannot be null');
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


