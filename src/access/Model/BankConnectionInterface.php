<?php
/**
 * BankConnectionInterface
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
 * BankConnectionInterface Class Doc Comment
 *
 * @category Class
 * @description Resource representing a bank connection interface
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BankConnectionInterface implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BankConnectionInterface';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'banking_interface' => '\OpenAPIAccess\Client\Model\BankingInterface',
        'login_credentials' => '\OpenAPIAccess\Client\Model\LoginCredentialResource[]',
        'default_two_step_procedure_id' => 'string',
        'two_step_procedures' => '\OpenAPIAccess\Client\Model\TwoStepProcedure[]',
        'ais_consent' => '\OpenAPIAccess\Client\Model\BankConnectionInterfaceAisConsent',
        'last_manual_update' => '\OpenAPIAccess\Client\Model\BankConnectionInterfaceLastManualUpdate',
        'last_auto_update' => '\OpenAPIAccess\Client\Model\BankConnectionInterfaceLastAutoUpdate',
        'user_action_required' => 'bool',
        'max_days_for_download' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'banking_interface' => null,
        'login_credentials' => null,
        'default_two_step_procedure_id' => null,
        'two_step_procedures' => null,
        'ais_consent' => null,
        'last_manual_update' => null,
        'last_auto_update' => null,
        'user_action_required' => null,
        'max_days_for_download' => 'int32'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'banking_interface' => false,
		'login_credentials' => false,
		'default_two_step_procedure_id' => false,
		'two_step_procedures' => false,
		'ais_consent' => false,
		'last_manual_update' => false,
		'last_auto_update' => false,
		'user_action_required' => false,
		'max_days_for_download' => false
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
        'banking_interface' => 'bankingInterface',
        'login_credentials' => 'loginCredentials',
        'default_two_step_procedure_id' => 'defaultTwoStepProcedureId',
        'two_step_procedures' => 'twoStepProcedures',
        'ais_consent' => 'aisConsent',
        'last_manual_update' => 'lastManualUpdate',
        'last_auto_update' => 'lastAutoUpdate',
        'user_action_required' => 'userActionRequired',
        'max_days_for_download' => 'maxDaysForDownload'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'banking_interface' => 'setBankingInterface',
        'login_credentials' => 'setLoginCredentials',
        'default_two_step_procedure_id' => 'setDefaultTwoStepProcedureId',
        'two_step_procedures' => 'setTwoStepProcedures',
        'ais_consent' => 'setAisConsent',
        'last_manual_update' => 'setLastManualUpdate',
        'last_auto_update' => 'setLastAutoUpdate',
        'user_action_required' => 'setUserActionRequired',
        'max_days_for_download' => 'setMaxDaysForDownload'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'banking_interface' => 'getBankingInterface',
        'login_credentials' => 'getLoginCredentials',
        'default_two_step_procedure_id' => 'getDefaultTwoStepProcedureId',
        'two_step_procedures' => 'getTwoStepProcedures',
        'ais_consent' => 'getAisConsent',
        'last_manual_update' => 'getLastManualUpdate',
        'last_auto_update' => 'getLastAutoUpdate',
        'user_action_required' => 'getUserActionRequired',
        'max_days_for_download' => 'getMaxDaysForDownload'
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
        $this->setIfExists('banking_interface', $data ?? [], null);
        $this->setIfExists('login_credentials', $data ?? [], null);
        $this->setIfExists('default_two_step_procedure_id', $data ?? [], null);
        $this->setIfExists('two_step_procedures', $data ?? [], null);
        $this->setIfExists('ais_consent', $data ?? [], null);
        $this->setIfExists('last_manual_update', $data ?? [], null);
        $this->setIfExists('last_auto_update', $data ?? [], null);
        $this->setIfExists('user_action_required', $data ?? [], null);
        $this->setIfExists('max_days_for_download', $data ?? [], null);
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

        if ($this->container['banking_interface'] === null) {
            $invalidProperties[] = "'banking_interface' can't be null";
        }
        if ($this->container['login_credentials'] === null) {
            $invalidProperties[] = "'login_credentials' can't be null";
        }
        if ($this->container['two_step_procedures'] === null) {
            $invalidProperties[] = "'two_step_procedures' can't be null";
        }
        if ($this->container['user_action_required'] === null) {
            $invalidProperties[] = "'user_action_required' can't be null";
        }
        if ($this->container['max_days_for_download'] === null) {
            $invalidProperties[] = "'max_days_for_download' can't be null";
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
     * Gets banking_interface
     *
     * @return BankingInterface
     */
    public function getBankingInterface()
    {
        return $this->container['banking_interface'];
    }

    /**
     * Sets banking_interface
     *
     * @param BankingInterface $banking_interface <strong>Type:</strong> BankingInterface<br/> Banking interface. Possible values:<br><br>&bull; <code>WEB_SCRAPER</code> - means that finAPI will parse data from the bank's online banking website.<br>&bull; <code>FINTS_SERVER</code> - means that finAPI will download data via the bank's FinTS interface.<br>&bull; <code>XS2A</code> - means that finAPI will download data via the bank's XS2A interface.<br>
     *
     * @return self
     */
    public function setBankingInterface($banking_interface)
    {

        if (is_null($banking_interface)) {
            throw new \InvalidArgumentException('non-nullable banking_interface cannot be null');
        }

        $this->container['banking_interface'] = $banking_interface;

        return $this;
    }

    /**
     * Gets login_credentials
     *
     * @return \OpenAPIAccess\Client\Model\LoginCredentialResource[]
     */
    public function getLoginCredentials()
    {
        return $this->container['login_credentials'];
    }

    /**
     * Sets login_credentials
     *
     * @param \OpenAPIAccess\Client\Model\LoginCredentialResource[] $login_credentials <strong>Type:</strong> LoginCredentialResource<br/> Login fields for this interface (in the order that we suggest to show them to the user), with their currently stored values. Note that this list always contains all existing login fields for this interface, even when there is no stored value for a field (value will be null in such a case).
     *
     * @return self
     */
    public function setLoginCredentials($login_credentials)
    {

        if (is_null($login_credentials)) {
            throw new \InvalidArgumentException('non-nullable login_credentials cannot be null');
        }

        $this->container['login_credentials'] = $login_credentials;

        return $this;
    }

    /**
     * Gets default_two_step_procedure_id
     *
     * @return string|null
     */
    public function getDefaultTwoStepProcedureId()
    {
        return $this->container['default_two_step_procedure_id'];
    }

    /**
     * Sets default_two_step_procedure_id
     *
     * @param string|null $default_two_step_procedure_id The default two-step-procedure for this interface. Must match one of the available 'procedureId's from the 'twoStepProcedures' list. When this field is set, then finAPI will automatically try to select the procedure wherever applicable. Note that the list of available procedures of a bank connection may change as a result of an update of the connection, and if this field references a procedure that is no longer available after an update, finAPI will automatically clear the default procedure (set it to null).
     *
     * @return self
     */
    public function setDefaultTwoStepProcedureId($default_two_step_procedure_id)
    {

        if (is_null($default_two_step_procedure_id)) {
            throw new \InvalidArgumentException('non-nullable default_two_step_procedure_id cannot be null');
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
     * @param \OpenAPIAccess\Client\Model\TwoStepProcedure[] $two_step_procedures <strong>Type:</strong> TwoStepProcedure<br/> Available two-step-procedures in this interface, used for submitting a money transfer or direct debit request (see /accounts/requestSepaMoneyTransfer or /requestSepaDirectDebit),or for multi-step-authentication during bank connection import or update. The available two-step-procedures mya be re-evaluated each time this bank connection is updated (/bankConnections/update). This means that this list may change as a result of an update.
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
     * Gets ais_consent
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionInterfaceAisConsent|null
     */
    public function getAisConsent()
    {
        return $this->container['ais_consent'];
    }

    /**
     * Sets ais_consent
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionInterfaceAisConsent|null $ais_consent ais_consent
     *
     * @return self
     */
    public function setAisConsent($ais_consent)
    {

        if (is_null($ais_consent)) {
            throw new \InvalidArgumentException('non-nullable ais_consent cannot be null');
        }

        $this->container['ais_consent'] = $ais_consent;

        return $this;
    }

    /**
     * Gets last_manual_update
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionInterfaceLastManualUpdate|null
     */
    public function getLastManualUpdate()
    {
        return $this->container['last_manual_update'];
    }

    /**
     * Sets last_manual_update
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionInterfaceLastManualUpdate|null $last_manual_update last_manual_update
     *
     * @return self
     */
    public function setLastManualUpdate($last_manual_update)
    {

        if (is_null($last_manual_update)) {
            throw new \InvalidArgumentException('non-nullable last_manual_update cannot be null');
        }

        $this->container['last_manual_update'] = $last_manual_update;

        return $this;
    }

    /**
     * Gets last_auto_update
     *
     * @return \OpenAPIAccess\Client\Model\BankConnectionInterfaceLastAutoUpdate|null
     */
    public function getLastAutoUpdate()
    {
        return $this->container['last_auto_update'];
    }

    /**
     * Sets last_auto_update
     *
     * @param \OpenAPIAccess\Client\Model\BankConnectionInterfaceLastAutoUpdate|null $last_auto_update last_auto_update
     *
     * @return self
     */
    public function setLastAutoUpdate($last_auto_update)
    {

        if (is_null($last_auto_update)) {
            throw new \InvalidArgumentException('non-nullable last_auto_update cannot be null');
        }

        $this->container['last_auto_update'] = $last_auto_update;

        return $this;
    }

    /**
     * Gets user_action_required
     *
     * @return bool
     */
    public function getUserActionRequired()
    {
        return $this->container['user_action_required'];
    }

    /**
     * Sets user_action_required
     *
     * @param bool $user_action_required This field indicates whether the user's attention is required for the next update of the given bank connection interface.<br/>If the field is true, finAPI stops auto-updates of this bank connection interface to mitigate the risk of locking the user's bank account and also of triggering a multi-step authentication that might lead to a notification being sent to the end-user.<br/>If the field is false, the user's attention might still be required for the next bank update, e.g. because of new Terms and Conditions that have to get approved by the user.(this only applies to users whose mandator doesn't have an AIS license)<br/>Every communication with the bank (e.g. updating a bank connection, submitting a money transfer or a direct debit, etc.) can change the value of this flag. If the field is true, we recommend to ask the end-user to trigger a manual update of the bank connection interface (using the 'Update a bank connection' service). If the update completes successfully without triggering a strong customer authentication or results in storing a valid XS2A consent, this flag will switch to false. The logic about determination of the user's attention being required might change in time. Please use this as a convenience function to know, when you have to involve the user in the next communication with the bank. Once the flag switches to false, the bank connection interface will be enabled again for the auto-update (if it is configured).
     *
     * @return self
     */
    public function setUserActionRequired($user_action_required)
    {

        if (is_null($user_action_required)) {
            throw new \InvalidArgumentException('non-nullable user_action_required cannot be null');
        }

        $this->container['user_action_required'] = $user_action_required;

        return $this;
    }

    /**
     * Gets max_days_for_download
     *
     * @return int
     */
    public function getMaxDaysForDownload()
    {
        return $this->container['max_days_for_download'];
    }

    /**
     * Sets max_days_for_download
     *
     * @param int $max_days_for_download This setting defines how much of an account's transactions history will get downloaded whenever a new account is imported. More technically, it depicts the number of days to download transactions for, starting from - and including - the date of the account import. For example, on an account import that happens today, the value 30 would instruct finAPI to download transactions from the past 30 days (including today). The minimum allowed value is 14, the maximum value is 3650. Also possible is the value 0 (which is the default value), in which case there will be no limit to the transactions download and finAPI will try to get all transactions that it can. <br/><br/>NOTES:<br/>&bull; There is no guarantee that finAPI will actually download transactions for the entire defined date range, as there may be limitations to the download range (set by the bank or by finAPI, e.g. see ClientConfiguration.transactionImportLimitation). <br/>&bull; This parameter only applies to transactions, not to security positions; For security accounts, finAPI will always download all security positions that it can. <br/>&bull; This setting is stored for each interface individually.<br/>&bull; After an interface has been connected with this setting, there is no way to change the setting for that interface afterwards.<br/>&bull; <b>If you do not limit the download range to a value less than 90 days, the bank is more likely to trigger a strong customer authentication request for the user when finAPI is attempting to download the transactions.</b>
     *
     * @return self
     */
    public function setMaxDaysForDownload($max_days_for_download)
    {

        if (is_null($max_days_for_download)) {
            throw new \InvalidArgumentException('non-nullable max_days_for_download cannot be null');
        }

        $this->container['max_days_for_download'] = $max_days_for_download;

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


