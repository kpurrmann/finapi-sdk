<?php
/**
 * BankConnection
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
 * BankConnection Class Doc Comment
 *
 * @category Class
 * @description Container for a bank connection&#39;s data
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BankConnection implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BankConnection';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'bank_id' => 'int',
        'name' => 'string',
        'banking_user_id' => 'string',
        'banking_customer_id' => 'string',
        'banking_pin' => 'string',
        'type' => 'string',
        'update_status' => 'string',
        'categorization_status' => '\OpenAPIAccess\Client\Model\CategorizationStatus',
        'last_manual_update' => '\OpenAPIAccess\Client\Model\BankConnectionLastManualUpdate',
        'last_auto_update' => '\OpenAPIAccess\Client\Model\BankConnectionLastAutoUpdate',
        'iban_only_money_transfer_supported' => 'bool',
        'iban_only_direct_debit_supported' => 'bool',
        'collective_money_transfer_supported' => 'bool',
        'default_two_step_procedure_id' => 'string',
        'two_step_procedures' => '\OpenAPIAccess\Client\Model\TwoStepProcedure[]',
        'interfaces' => '\OpenAPIAccess\Client\Model\BankConnectionInterface[]',
        'account_ids' => 'int[]',
        'owners' => '\OpenAPIAccess\Client\Model\BankConnectionOwner[]',
        'bank' => '\OpenAPIAccess\Client\Model\BankConnectionBank',
        'further_login_not_recommended' => 'bool'
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
        'bank_id' => 'int64',
        'name' => null,
        'banking_user_id' => null,
        'banking_customer_id' => null,
        'banking_pin' => null,
        'type' => null,
        'update_status' => null,
        'categorization_status' => null,
        'last_manual_update' => null,
        'last_auto_update' => null,
        'iban_only_money_transfer_supported' => null,
        'iban_only_direct_debit_supported' => null,
        'collective_money_transfer_supported' => null,
        'default_two_step_procedure_id' => null,
        'two_step_procedures' => null,
        'interfaces' => null,
        'account_ids' => 'int64',
        'owners' => null,
        'bank' => null,
        'further_login_not_recommended' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'bank_id' => false,
		'name' => true,
		'banking_user_id' => true,
		'banking_customer_id' => true,
		'banking_pin' => true,
		'type' => false,
		'update_status' => false,
		'categorization_status' => false,
		'last_manual_update' => true,
		'last_auto_update' => true,
		'iban_only_money_transfer_supported' => false,
		'iban_only_direct_debit_supported' => false,
		'collective_money_transfer_supported' => false,
		'default_two_step_procedure_id' => true,
		'two_step_procedures' => false,
		'interfaces' => false,
		'account_ids' => false,
		'owners' => true,
		'bank' => false,
		'further_login_not_recommended' => false
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
        'bank_id' => 'bankId',
        'name' => 'name',
        'banking_user_id' => 'bankingUserId',
        'banking_customer_id' => 'bankingCustomerId',
        'banking_pin' => 'bankingPin',
        'type' => 'type',
        'update_status' => 'updateStatus',
        'categorization_status' => 'categorizationStatus',
        'last_manual_update' => 'lastManualUpdate',
        'last_auto_update' => 'lastAutoUpdate',
        'iban_only_money_transfer_supported' => 'ibanOnlyMoneyTransferSupported',
        'iban_only_direct_debit_supported' => 'ibanOnlyDirectDebitSupported',
        'collective_money_transfer_supported' => 'collectiveMoneyTransferSupported',
        'default_two_step_procedure_id' => 'defaultTwoStepProcedureId',
        'two_step_procedures' => 'twoStepProcedures',
        'interfaces' => 'interfaces',
        'account_ids' => 'accountIds',
        'owners' => 'owners',
        'bank' => 'bank',
        'further_login_not_recommended' => 'furtherLoginNotRecommended'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'bank_id' => 'setBankId',
        'name' => 'setName',
        'banking_user_id' => 'setBankingUserId',
        'banking_customer_id' => 'setBankingCustomerId',
        'banking_pin' => 'setBankingPin',
        'type' => 'setType',
        'update_status' => 'setUpdateStatus',
        'categorization_status' => 'setCategorizationStatus',
        'last_manual_update' => 'setLastManualUpdate',
        'last_auto_update' => 'setLastAutoUpdate',
        'iban_only_money_transfer_supported' => 'setIbanOnlyMoneyTransferSupported',
        'iban_only_direct_debit_supported' => 'setIbanOnlyDirectDebitSupported',
        'collective_money_transfer_supported' => 'setCollectiveMoneyTransferSupported',
        'default_two_step_procedure_id' => 'setDefaultTwoStepProcedureId',
        'two_step_procedures' => 'setTwoStepProcedures',
        'interfaces' => 'setInterfaces',
        'account_ids' => 'setAccountIds',
        'owners' => 'setOwners',
        'bank' => 'setBank',
        'further_login_not_recommended' => 'setFurtherLoginNotRecommended'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'bank_id' => 'getBankId',
        'name' => 'getName',
        'banking_user_id' => 'getBankingUserId',
        'banking_customer_id' => 'getBankingCustomerId',
        'banking_pin' => 'getBankingPin',
        'type' => 'getType',
        'update_status' => 'getUpdateStatus',
        'categorization_status' => 'getCategorizationStatus',
        'last_manual_update' => 'getLastManualUpdate',
        'last_auto_update' => 'getLastAutoUpdate',
        'iban_only_money_transfer_supported' => 'getIbanOnlyMoneyTransferSupported',
        'iban_only_direct_debit_supported' => 'getIbanOnlyDirectDebitSupported',
        'collective_money_transfer_supported' => 'getCollectiveMoneyTransferSupported',
        'default_two_step_procedure_id' => 'getDefaultTwoStepProcedureId',
        'two_step_procedures' => 'getTwoStepProcedures',
        'interfaces' => 'getInterfaces',
        'account_ids' => 'getAccountIds',
        'owners' => 'getOwners',
        'bank' => 'getBank',
        'further_login_not_recommended' => 'getFurtherLoginNotRecommended'
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

    public const TYPE_ONLINE = 'ONLINE';
    public const TYPE_DEMO = 'DEMO';
    public const UPDATE_STATUS_IN_PROGRESS = 'IN_PROGRESS';
    public const UPDATE_STATUS_READY = 'READY';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_ONLINE,
            self::TYPE_DEMO,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getUpdateStatusAllowableValues()
    {
        return [
            self::UPDATE_STATUS_IN_PROGRESS,
            self::UPDATE_STATUS_READY,
        ];
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
        $this->setIfExists('bank_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('banking_user_id', $data ?? [], null);
        $this->setIfExists('banking_customer_id', $data ?? [], null);
        $this->setIfExists('banking_pin', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('update_status', $data ?? [], null);
        $this->setIfExists('categorization_status', $data ?? [], null);
        $this->setIfExists('last_manual_update', $data ?? [], null);
        $this->setIfExists('last_auto_update', $data ?? [], null);
        $this->setIfExists('iban_only_money_transfer_supported', $data ?? [], null);
        $this->setIfExists('iban_only_direct_debit_supported', $data ?? [], null);
        $this->setIfExists('collective_money_transfer_supported', $data ?? [], null);
        $this->setIfExists('default_two_step_procedure_id', $data ?? [], null);
        $this->setIfExists('two_step_procedures', $data ?? [], null);
        $this->setIfExists('interfaces', $data ?? [], null);
        $this->setIfExists('account_ids', $data ?? [], null);
        $this->setIfExists('owners', $data ?? [], null);
        $this->setIfExists('bank', $data ?? [], null);
        $this->setIfExists('further_login_not_recommended', $data ?? [], null);
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
        if ($this->container['bank_id'] === null) {
            $invalidProperties[] = "'bank_id' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ($this->container['banking_user_id'] === null) {
            $invalidProperties[] = "'banking_user_id' can't be null";
        }
        if ($this->container['banking_customer_id'] === null) {
            $invalidProperties[] = "'banking_customer_id' can't be null";
        }
        if ($this->container['banking_pin'] === null) {
            $invalidProperties[] = "'banking_pin' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['update_status'] === null) {
            $invalidProperties[] = "'update_status' can't be null";
        }
        $allowedValues = $this->getUpdateStatusAllowableValues();
        if (!is_null($this->container['update_status']) && !in_array($this->container['update_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'update_status', must be one of '%s'",
                $this->container['update_status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['categorization_status'] === null) {
            $invalidProperties[] = "'categorization_status' can't be null";
        }
        if ($this->container['last_manual_update'] === null) {
            $invalidProperties[] = "'last_manual_update' can't be null";
        }
        if ($this->container['last_auto_update'] === null) {
            $invalidProperties[] = "'last_auto_update' can't be null";
        }
        if ($this->container['iban_only_money_transfer_supported'] === null) {
            $invalidProperties[] = "'iban_only_money_transfer_supported' can't be null";
        }
        if ($this->container['iban_only_direct_debit_supported'] === null) {
            $invalidProperties[] = "'iban_only_direct_debit_supported' can't be null";
        }
        if ($this->container['collective_money_transfer_supported'] === null) {
            $invalidProperties[] = "'collective_money_transfer_supported' can't be null";
        }
        if ($this->container['default_two_step_procedure_id'] === null) {
            $invalidProperties[] = "'default_two_step_procedure_id' can't be null";
        }
        if ($this->container['two_step_procedures'] === null) {
            $invalidProperties[] = "'two_step_procedures' can't be null";
        }
        if ($this->container['interfaces'] === null) {
            $invalidProperties[] = "'interfaces' can't be null";
        }
        if ($this->container['account_ids'] === null) {
            $invalidProperties[] = "'account_ids' can't be null";
        }
        if ($this->container['owners'] === null) {
            $invalidProperties[] = "'owners' can't be null";
        }
        if ($this->container['bank'] === null) {
            $invalidProperties[] = "'bank' can't be null";
        }
        if ($this->container['further_login_not_recommended'] === null) {
            $invalidProperties[] = "'further_login_not_recommended' can't be null";
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
     * @param int $id Bank connection identifier
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
     * Gets bank_id
     *
     * @return int
     */
    public function getBankId()
    {
        return $this->container['bank_id'];
    }

    /**
     * Sets bank_id
     *
     * @param int $bank_id THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'bank' field instead.<br/><br/>Identifier of the bank that this connection belongs to.
     *
     * @return self
     */
    public function setBankId($bank_id)
    {

        if (is_null($bank_id)) {
            throw new \InvalidArgumentException('non-nullable bank_id cannot be null');
        }

        $this->container['bank_id'] = $bank_id;

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
     * @param string $name Custom name for the bank connection. You can set this field with the 'Edit a bank connection' service, as well as during the initial import of the bank connection. Maximum length is 64.
     *
     * @return self
     */
    public function setName($name)
    {

        if (is_null($name)) {
            array_push($this->openAPINullablesSetToNull, 'name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets banking_user_id
     *
     * @return string
     */
    public function getBankingUserId()
    {
        return $this->container['banking_user_id'];
    }

    /**
     * Sets banking_user_id
     *
     * @param string $banking_user_id THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'loginCredentials' in the 'interfaces' instead.<br/><br/>Stored online banking user ID credential. This field may be null for the 'demo connection'. If your client has no license for processing banking credentials then a banking user ID will always be 'XXXXX'
     *
     * @return self
     */
    public function setBankingUserId($banking_user_id)
    {

        if (is_null($banking_user_id)) {
            array_push($this->openAPINullablesSetToNull, 'banking_user_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('banking_user_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['banking_user_id'] = $banking_user_id;

        return $this;
    }

    /**
     * Gets banking_customer_id
     *
     * @return string
     */
    public function getBankingCustomerId()
    {
        return $this->container['banking_customer_id'];
    }

    /**
     * Sets banking_customer_id
     *
     * @param string $banking_customer_id THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'loginCredentials' in the 'interfaces' instead.<br/><br/>Stored online banking customer ID credential. If your client has no license for processing banking credentials or if this field contains a value that requires password protection (see field 'isCustomerIdPassword' in Bank Resource) then the banking customer ID will always be 'XXXXX
     *
     * @return self
     */
    public function setBankingCustomerId($banking_customer_id)
    {

        if (is_null($banking_customer_id)) {
            array_push($this->openAPINullablesSetToNull, 'banking_customer_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('banking_customer_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['banking_customer_id'] = $banking_customer_id;

        return $this;
    }

    /**
     * Gets banking_pin
     *
     * @return string
     */
    public function getBankingPin()
    {
        return $this->container['banking_pin'];
    }

    /**
     * Sets banking_pin
     *
     * @param string $banking_pin THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'loginCredentials' in the 'interfaces' instead.<br/><br/>Stored online banking PIN. If a PIN is stored, this will always be 'XXXXX'
     *
     * @return self
     */
    public function setBankingPin($banking_pin)
    {

        if (is_null($banking_pin)) {
            array_push($this->openAPINullablesSetToNull, 'banking_pin');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('banking_pin', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['banking_pin'] = $banking_pin;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Bank connection type
     *
     * @return self
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }

        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets update_status
     *
     * @return string
     */
    public function getUpdateStatus()
    {
        return $this->container['update_status'];
    }

    /**
     * Sets update_status
     *
     * @param string $update_status Current status of data download (account balances and transactions/securities). The POST /bankConnections/import and POST /bankConnections/<id>/update services will set this flag to IN_PROGRESS before they return. Once the import or update has finished, the status will be changed to READY.
     *
     * @return self
     */
    public function setUpdateStatus($update_status)
    {
        $allowedValues = $this->getUpdateStatusAllowableValues();
        if (!in_array($update_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'update_status', must be one of '%s'",
                    $update_status,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($update_status)) {
            throw new \InvalidArgumentException('non-nullable update_status cannot be null');
        }

        $this->container['update_status'] = $update_status;

        return $this;
    }

    /**
     * Gets categorization_status
     *
     * @return CategorizationStatus
     */
    public function getCategorizationStatus()
    {
        return $this->container['categorization_status'];
    }

    /**
     * Sets categorization_status
     *
     * @param CategorizationStatus $categorization_status <strong>Type:</strong> CategorizationStatus<br/> Current status of transaction categorization. The asynchronous download process that is triggered by a call of the POST /bankConnections/import and POST /bankConnections/<id>/update services (and also by finAPI's auto update, if enabled) will set this flag to PENDING once the download has finished and a categorization is scheduled for the imported transactions. A separate categorization thread will then start to categorize the transactions (during this process, the status is IN_PROGRESS). When categorization has finished, the status will be (re-)set to READY. Note that the current categorization status should only be queried after the download has finished, i.e. once the download status has switched from IN_PROGRESS to READY.
     *
     * @return self
     */
    public function setCategorizationStatus($categorization_status)
    {

        if (is_null($categorization_status)) {
            throw new \InvalidArgumentException('non-nullable categorization_status cannot be null');
        }

        $this->container['categorization_status'] = $categorization_status;

        return $this;
    }

    /**
     * Gets last_manual_update
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionLastManualUpdate
     */
    public function getLastManualUpdate()
    {
        return $this->container['last_manual_update'];
    }

    /**
     * Sets last_manual_update
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionLastManualUpdate $last_manual_update last_manual_update
     *
     * @return self
     */
    public function setLastManualUpdate($last_manual_update)
    {

        if (is_null($last_manual_update)) {
            array_push($this->openAPINullablesSetToNull, 'last_manual_update');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_manual_update', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_manual_update'] = $last_manual_update;

        return $this;
    }

    /**
     * Gets last_auto_update
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionLastAutoUpdate
     */
    public function getLastAutoUpdate()
    {
        return $this->container['last_auto_update'];
    }

    /**
     * Sets last_auto_update
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionLastAutoUpdate $last_auto_update last_auto_update
     *
     * @return self
     */
    public function setLastAutoUpdate($last_auto_update)
    {

        if (is_null($last_auto_update)) {
            array_push($this->openAPINullablesSetToNull, 'last_auto_update');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_auto_update', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['last_auto_update'] = $last_auto_update;

        return $this;
    }

    /**
     * Gets iban_only_money_transfer_supported
     *
     * @return bool
     */
    public function getIbanOnlyMoneyTransferSupported()
    {
        return $this->container['iban_only_money_transfer_supported'];
    }

    /**
     * Sets iban_only_money_transfer_supported
     *
     * @param bool $iban_only_money_transfer_supported THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'capabilities' field of the 'interfaces' in the Account resource instead.<br/><br/>Whether this bank connection accepts money transfer requests where the recipient's account is defined just by the IBAN (without an additional BIC). This field is re-evaluated each time this bank connection is updated. <br/>See also: /accounts/requestSepaMoneyTransfer
     *
     * @return self
     */
    public function setIbanOnlyMoneyTransferSupported($iban_only_money_transfer_supported)
    {

        if (is_null($iban_only_money_transfer_supported)) {
            throw new \InvalidArgumentException('non-nullable iban_only_money_transfer_supported cannot be null');
        }

        $this->container['iban_only_money_transfer_supported'] = $iban_only_money_transfer_supported;

        return $this;
    }

    /**
     * Gets iban_only_direct_debit_supported
     *
     * @return bool
     */
    public function getIbanOnlyDirectDebitSupported()
    {
        return $this->container['iban_only_direct_debit_supported'];
    }

    /**
     * Sets iban_only_direct_debit_supported
     *
     * @param bool $iban_only_direct_debit_supported THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'capabilities' field of the 'interfaces' in the Account resource instead.<br/><br/>Whether this bank connection accepts direct debit requests where the debitor's account is defined just by the IBAN (without an additional BIC). This field is re-evaluated each time this bank connection is updated. <br/>See also: /accounts/requestSepaDirectDebit
     *
     * @return self
     */
    public function setIbanOnlyDirectDebitSupported($iban_only_direct_debit_supported)
    {

        if (is_null($iban_only_direct_debit_supported)) {
            throw new \InvalidArgumentException('non-nullable iban_only_direct_debit_supported cannot be null');
        }

        $this->container['iban_only_direct_debit_supported'] = $iban_only_direct_debit_supported;

        return $this;
    }

    /**
     * Gets collective_money_transfer_supported
     *
     * @return bool
     */
    public function getCollectiveMoneyTransferSupported()
    {
        return $this->container['collective_money_transfer_supported'];
    }

    /**
     * Sets collective_money_transfer_supported
     *
     * @param bool $collective_money_transfer_supported THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'capabilities' field of the 'interfaces' in the Account resource instead.<br/><br/>Whether this bank connection supports submitting collective money transfers. This field is re-evaluated each time this bank connection is updated. <br/>See also: /accounts/requestSepaMoneyTransfer
     *
     * @return self
     */
    public function setCollectiveMoneyTransferSupported($collective_money_transfer_supported)
    {

        if (is_null($collective_money_transfer_supported)) {
            throw new \InvalidArgumentException('non-nullable collective_money_transfer_supported cannot be null');
        }

        $this->container['collective_money_transfer_supported'] = $collective_money_transfer_supported;

        return $this;
    }

    /**
     * Gets default_two_step_procedure_id
     *
     * @return string
     */
    public function getDefaultTwoStepProcedureId()
    {
        return $this->container['default_two_step_procedure_id'];
    }

    /**
     * Sets default_two_step_procedure_id
     *
     * @param string $default_two_step_procedure_id THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the corresponding field in 'interfaces' instead.<br/><br/>The default two-step-procedure. Must match one of the available 'procedureId's from the 'twoStepProcedures' list. When this field is set, then finAPI will automatically try to select the procedure wherever applicable. Note that the list of available procedures of a bank connection may change as a result of an update of the connection, and if this field references a procedure that is no longer available after an update, finAPI will automatically clear the default procedure (set it to null).
     *
     * @return self
     */
    public function setDefaultTwoStepProcedureId($default_two_step_procedure_id)
    {

        if (is_null($default_two_step_procedure_id)) {
            array_push($this->openAPINullablesSetToNull, 'default_two_step_procedure_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('default_two_step_procedure_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['default_two_step_procedure_id'] = $default_two_step_procedure_id;

        return $this;
    }

    /**
     * Gets two_step_procedures
     *
     * @return \OpenAPIAccess\Client\Model\TwoStepProcedure[]
     */
    public function getTwoStepProcedures()
    {
        return $this->container['two_step_procedures'];
    }

    /**
     * Sets two_step_procedures
     *
     * @param \OpenAPIAccess\Client\Model\TwoStepProcedure[] $two_step_procedures <strong>Type:</strong> TwoStepProcedure<br/> THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the corresponding field in 'interfaces' instead.<br/><br/>Available two-step-procedures for this bank connection, used for submitting a money transfer or direct debit request (see /accounts/requestSepaMoneyTransfer or /requestSepaDirectDebit). The available two-step-procedures are re-evaluated each time this bank connection is updated (/bankConnections/update). This means that this list may change as a result of an update.
     *
     * @return self
     */
    public function setTwoStepProcedures($two_step_procedures)
    {

        if (is_null($two_step_procedures)) {
            throw new \InvalidArgumentException('non-nullable two_step_procedures cannot be null');
        }

        $this->container['two_step_procedures'] = $two_step_procedures;

        return $this;
    }

    /**
     * Gets interfaces
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionInterface[]
     */
    public function getInterfaces()
    {
        return $this->container['interfaces'];
    }

    /**
     * Sets interfaces
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionInterface[] $interfaces <strong>Type:</strong> BankConnectionInterface<br/> Set of interfaces that are connected for this bank connection.
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
     * Gets account_ids
     *
     * @return int[]
     */
    public function getAccountIds()
    {
        return $this->container['account_ids'];
    }

    /**
     * Sets account_ids
     *
     * @param int[] $account_ids Identifiers of the accounts that belong to this bank connection
     *
     * @return self
     */
    public function setAccountIds($account_ids)
    {

        if (is_null($account_ids)) {
            throw new \InvalidArgumentException('non-nullable account_ids cannot be null');
        }

        $this->container['account_ids'] = $account_ids;

        return $this;
    }

    /**
     * Gets owners
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionOwner[]
     */
    public function getOwners()
    {
        return $this->container['owners'];
    }

    /**
     * Sets owners
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionOwner[] $owners <strong>Type:</strong> BankConnectionOwner<br/> Information about the owner(s) of the bank connection
     *
     * @return self
     */
    public function setOwners($owners)
    {

        if (is_null($owners)) {
            array_push($this->openAPINullablesSetToNull, 'owners');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('owners', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['owners'] = $owners;

        return $this;
    }

    /**
     * Gets bank
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionBank
     */
    public function getBank()
    {
        return $this->container['bank'];
    }

    /**
     * Sets bank
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionBank $bank bank
     *
     * @return self
     */
    public function setBank($bank)
    {

        if (is_null($bank)) {
            throw new \InvalidArgumentException('non-nullable bank cannot be null');
        }

        $this->container['bank'] = $bank;

        return $this;
    }

    /**
     * Gets further_login_not_recommended
     *
     * @return bool
     */
    public function getFurtherLoginNotRecommended()
    {
        return $this->container['further_login_not_recommended'];
    }

    /**
     * Sets further_login_not_recommended
     *
     * @param bool $further_login_not_recommended THIS FIELD IS DEPRECATED AND WILL BE REMOVED.<br/>Please refer to the 'userActionRequired' field of the BankConnectionInterface resource instead.<br/><br/>This field indicates whether the last communication with the bank failed with an error that requires the user's attention or multi-step authentication error. If 'furtherLoginNotRecommended' is true, finAPI will stop auto updates of this bank connection to mitigate the risk of the user's bank account getting locked by the bank. Every communication with the bank (via updates, money_transfers, direct debits. etc.) can change the value of this flag. If this field is true, we recommend the user to check his credentials and try a manual update of the bank connection. If the update is successful without any multi-step authentication error, the 'furtherLoginNotRecommended' field will be set to false and the bank connection will be reincluded in the next batch update process. A manual update of the bank connection with incorrect credentials or if multi-step authentication error happens will set this field to true and lead to the exclusion of the bank connection from the following batch updates.
     *
     * @return self
     */
    public function setFurtherLoginNotRecommended($further_login_not_recommended)
    {

        if (is_null($further_login_not_recommended)) {
            throw new \InvalidArgumentException('non-nullable further_login_not_recommended cannot be null');
        }

        $this->container['further_login_not_recommended'] = $further_login_not_recommended;

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


