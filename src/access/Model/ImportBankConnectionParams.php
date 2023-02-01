<?php
/**
 * ImportBankConnectionParams
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

namespace OpenAPIAccess\Client\Model;

use \ArrayAccess;
use \OpenAPIAccess\Client\ObjectSerializer;

/**
 * ImportBankConnectionParams Class Doc Comment
 *
 * @category Class
 * @description Container for bank connection import parameters
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ImportBankConnectionParams implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ImportBankConnectionParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'bank_id' => 'int',
        'name' => 'string',
        'banking_interface' => 'BankingInterface',
        'login_credentials' => '\OpenAPIAccess\Client\Model\LoginCredential[]',
        'store_secrets' => 'bool',
        'skip_balances_download' => 'bool',
        'skip_positions_download' => 'bool',
        'load_owner_data' => 'bool',
        'max_days_for_download' => 'int',
        'account_types' => 'AccountType[]',
        'account_references' => '\OpenAPIAccess\Client\Model\AccountReference[]',
        'multi_step_authentication' => '\OpenAPIAccess\Client\Model\ConnectInterfaceParamsMultiStepAuthentication',
        'redirect_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'bank_id' => 'int64',
        'name' => null,
        'banking_interface' => null,
        'login_credentials' => null,
        'store_secrets' => null,
        'skip_balances_download' => null,
        'skip_positions_download' => null,
        'load_owner_data' => null,
        'max_days_for_download' => 'int32',
        'account_types' => null,
        'account_references' => null,
        'multi_step_authentication' => null,
        'redirect_url' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'bank_id' => false,
		'name' => false,
		'banking_interface' => false,
		'login_credentials' => false,
		'store_secrets' => false,
		'skip_balances_download' => false,
		'skip_positions_download' => false,
		'load_owner_data' => false,
		'max_days_for_download' => false,
		'account_types' => false,
		'account_references' => false,
		'multi_step_authentication' => false,
		'redirect_url' => false
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
        'bank_id' => 'bankId',
        'name' => 'name',
        'banking_interface' => 'bankingInterface',
        'login_credentials' => 'loginCredentials',
        'store_secrets' => 'storeSecrets',
        'skip_balances_download' => 'skipBalancesDownload',
        'skip_positions_download' => 'skipPositionsDownload',
        'load_owner_data' => 'loadOwnerData',
        'max_days_for_download' => 'maxDaysForDownload',
        'account_types' => 'accountTypes',
        'account_references' => 'accountReferences',
        'multi_step_authentication' => 'multiStepAuthentication',
        'redirect_url' => 'redirectUrl'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'bank_id' => 'setBankId',
        'name' => 'setName',
        'banking_interface' => 'setBankingInterface',
        'login_credentials' => 'setLoginCredentials',
        'store_secrets' => 'setStoreSecrets',
        'skip_balances_download' => 'setSkipBalancesDownload',
        'skip_positions_download' => 'setSkipPositionsDownload',
        'load_owner_data' => 'setLoadOwnerData',
        'max_days_for_download' => 'setMaxDaysForDownload',
        'account_types' => 'setAccountTypes',
        'account_references' => 'setAccountReferences',
        'multi_step_authentication' => 'setMultiStepAuthentication',
        'redirect_url' => 'setRedirectUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'bank_id' => 'getBankId',
        'name' => 'getName',
        'banking_interface' => 'getBankingInterface',
        'login_credentials' => 'getLoginCredentials',
        'store_secrets' => 'getStoreSecrets',
        'skip_balances_download' => 'getSkipBalancesDownload',
        'skip_positions_download' => 'getSkipPositionsDownload',
        'load_owner_data' => 'getLoadOwnerData',
        'max_days_for_download' => 'getMaxDaysForDownload',
        'account_types' => 'getAccountTypes',
        'account_references' => 'getAccountReferences',
        'multi_step_authentication' => 'getMultiStepAuthentication',
        'redirect_url' => 'getRedirectUrl'
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
        $this->setIfExists('bank_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('banking_interface', $data ?? [], null);
        $this->setIfExists('login_credentials', $data ?? [], null);
        $this->setIfExists('store_secrets', $data ?? [], false);
        $this->setIfExists('skip_balances_download', $data ?? [], false);
        $this->setIfExists('skip_positions_download', $data ?? [], false);
        $this->setIfExists('load_owner_data', $data ?? [], false);
        $this->setIfExists('max_days_for_download', $data ?? [], 0);
        $this->setIfExists('account_types', $data ?? [], null);
        $this->setIfExists('account_references', $data ?? [], null);
        $this->setIfExists('multi_step_authentication', $data ?? [], null);
        $this->setIfExists('redirect_url', $data ?? [], null);
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

        if ($this->container['bank_id'] === null) {
            $invalidProperties[] = "'bank_id' can't be null";
        }
        if ($this->container['banking_interface'] === null) {
            $invalidProperties[] = "'banking_interface' can't be null";
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
     * @param int $bank_id Bank Identifier
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
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Custom name for the bank connection. Maximum length is 64. If you do not want to set a name, you can leave this field unset.
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
     * @param BankingInterface $banking_interface <strong>Type:</strong> BankingInterface<br/> The interface to use for connecting with the bank.
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
     * @return \OpenAPIAccess\Client\Model\LoginCredential[]|null
     */
    public function getLoginCredentials()
    {
        return $this->container['login_credentials'];
    }

    /**
     * Sets login_credentials
     *
     * @param \OpenAPIAccess\Client\Model\LoginCredential[]|null $login_credentials <strong>Type:</strong> LoginCredential<br/> Set of login credentials. Must always be passed, unless the respective bank interface does not declare any login fields.
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
     * Gets store_secrets
     *
     * @return bool|null
     */
    public function getStoreSecrets()
    {
        return $this->container['store_secrets'];
    }

    /**
     * Sets store_secrets
     *
     * @param bool|null $store_secrets Whether to store the secret login fields. If the secret fields are stored, then updates can be triggered without the involvement of the users, as long as the credentials remain valid and the bank consent has not expired. Note that bank consent will be stored regardless of the field value. Default value is false.
     *
     * @return self
     */
    public function setStoreSecrets($store_secrets)
    {

        if (is_null($store_secrets)) {
            throw new \InvalidArgumentException('non-nullable store_secrets cannot be null');
        }

        $this->container['store_secrets'] = $store_secrets;

        return $this;
    }

    /**
     * Gets skip_balances_download
     *
     * @return bool|null
     */
    public function getSkipBalancesDownload()
    {
        return $this->container['skip_balances_download'];
    }

    /**
     * Sets skip_balances_download
     *
     * @param bool|null $skip_balances_download Whether to skip the download of balances or not. May only be set to true if 'skipPositionsDownload' is also true. If set to true, then finAPI will download just the account list with the accounts' information (like account name, number, holder, etc). Default is false.<br/><br/>NOTES:<br/>&bull; Setting this flag to true is only meant to be used if A) you generally never download balances and positions, because you are only interested in the account list, or B) you want to get just the list of accounts in the first step, and then delete unwanted accounts from the bank connection, before you trigger another update that downloads balances and transactions. This approach allows you to download balances only for the accounts that you want.<br/>&bull; If you skip the download of balances during an import or update, you can still download them with a later update.<br/>&bull; If an account was stored with a balance already, and you skip the download of its balance in a subsequent update, then the account's balance will get outdated. Be also aware that certain services (like GET /accounts/dailyBalances) may return incorrect results in such cases.<br/>&bull; If any bank connection gets updated via finAPI's automatic batch update, then all balances (of already imported accounts) <u>will</u> get downloaded in any case!
     *
     * @return self
     */
    public function setSkipBalancesDownload($skip_balances_download)
    {

        if (is_null($skip_balances_download)) {
            throw new \InvalidArgumentException('non-nullable skip_balances_download cannot be null');
        }

        $this->container['skip_balances_download'] = $skip_balances_download;

        return $this;
    }

    /**
     * Gets skip_positions_download
     *
     * @return bool|null
     */
    public function getSkipPositionsDownload()
    {
        return $this->container['skip_positions_download'];
    }

    /**
     * Sets skip_positions_download
     *
     * @param bool|null $skip_positions_download Whether to skip the download of transactions and securities or not. If set to true, then finAPI will download just the account list with the accounts' information (like account name, number, holder, etc), as well as the accounts' balances (if possible), but skip the download of transactions and securities. Default is false.<br/>You may also use this flag in combination with 'skipBalancesDownload' = true, to additionally skip the download of balances.<br/><br/>NOTES:<br/>&bull; Setting this flag to true is only meant to be used if A) you generally never download positions, because you are only interested in the account list and/or balances, or B) you want to get just the list of accounts in the first step, and then delete unwanted accounts from the bank connection, before you trigger another update that downloads transactions. This approach allows you to download transactions only for the accounts that you want.<br/>&bull; If you skip the download of transactions and securities during an import or update, you can still download them with a later update (though you might not get all positions at a later point, because the date range in which the bank servers provide this data is usually limited).<br/>&bull; If an account already had any positions imported before an update, and you skip the positions download in the update, then the account's updated balance might not add up to the set of transactions / security positions. Be aware that certain services (like GET /accounts/dailyBalances) may return incorrect results for accounts in such a state.<br/>&bull; If any bank connection gets updated via finAPI's automatic batch update, then all transactions and security positions (of already imported accounts) <u>will</u> get downloaded in any case!<br/>&bull; For security accounts, skipping the downloading of the securities might result in the account's balance also not being downloaded.<br/>&bull; For the WEB_SCRAPER interface, it's technically required to download transactions for Bausparen accounts even if 'skipPositionsDownload' is set to true, but they are not actively processed by finAPI.
     *
     * @return self
     */
    public function setSkipPositionsDownload($skip_positions_download)
    {

        if (is_null($skip_positions_download)) {
            throw new \InvalidArgumentException('non-nullable skip_positions_download cannot be null');
        }

        $this->container['skip_positions_download'] = $skip_positions_download;

        return $this;
    }

    /**
     * Gets load_owner_data
     *
     * @return bool|null
     */
    public function getLoadOwnerData()
    {
        return $this->container['load_owner_data'];
    }

    /**
     * Sets load_owner_data
     *
     * @param bool|null $load_owner_data Whether to load information about the bank connection owner(s) - see field 'owners'. Default value is 'false'.<br/><br/>NOTE: This feature is supported only by the WEB_SCRAPER interface.
     *
     * @return self
     */
    public function setLoadOwnerData($load_owner_data)
    {

        if (is_null($load_owner_data)) {
            throw new \InvalidArgumentException('non-nullable load_owner_data cannot be null');
        }

        $this->container['load_owner_data'] = $load_owner_data;

        return $this;
    }

    /**
     * Gets max_days_for_download
     *
     * @return int|null
     */
    public function getMaxDaysForDownload()
    {
        return $this->container['max_days_for_download'];
    }

    /**
     * Sets max_days_for_download
     *
     * @param int|null $max_days_for_download This setting defines how much of an account's transactions history will get downloaded whenever a new account is imported. More technically, it depicts the number of days to download transactions for, starting from - and including - the date of the account import. For example, on an account import that happens today, the value 30 would instruct finAPI to download transactions from the past 30 days (including today). The minimum allowed value is 14, the maximum value is 3650. Also possible is the value 0 (which is the default value), in which case there will be no limit to the transactions download and finAPI will try to get all transactions that it can. <br/><br/>NOTES:<br/>&bull; There is no guarantee that finAPI will actually download transactions for the entire defined date range, as there may be limitations to the download range (set by the bank or by finAPI, e.g. see ClientConfiguration.transactionImportLimitation). <br/>&bull; This parameter only applies to transactions, not to security positions; For security accounts, finAPI will always download all security positions that it can. <br/>&bull; This setting is stored for each interface individually.<br/>&bull; After an interface has been connected with this setting, there is no way to change the setting for that interface afterwards.<br/>&bull; <b>If you do not limit the download range to a value less than 90 days, the bank is more likely to trigger a strong customer authentication request for the user when finAPI is attempting to download the transactions.</b>
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
     * Gets account_types
     *
     * @return AccountType[]|null
     */
    public function getAccountTypes()
    {
        return $this->container['account_types'];
    }

    /**
     * Sets account_types
     *
     * @param AccountType[]|null $account_types account_types
     *
     * @return self
     */
    public function setAccountTypes($account_types)
    {

        if (is_null($account_types)) {
            throw new \InvalidArgumentException('non-nullable account_types cannot be null');
        }

        $this->container['account_types'] = $account_types;

        return $this;
    }

    /**
     * Gets account_references
     *
     * @return \OpenAPIAccess\Client\Model\AccountReference[]|null
     */
    public function getAccountReferences()
    {
        return $this->container['account_references'];
    }

    /**
     * Sets account_references
     *
     * @param \OpenAPIAccess\Client\Model\AccountReference[]|null $account_references <strong>Type:</strong> AccountReference<br/> List of accounts for which access is requested from the bank. It must only be passed if the bank interface has the DETAILED_CONSENT property set.
     *
     * @return self
     */
    public function setAccountReferences($account_references)
    {

        if (is_null($account_references)) {
            throw new \InvalidArgumentException('non-nullable account_references cannot be null');
        }

        $this->container['account_references'] = $account_references;

        return $this;
    }

    /**
     * Gets multi_step_authentication
     *
     * @return \OpenAPIAccess\Client\Model\ConnectInterfaceParamsMultiStepAuthentication|null
     */
    public function getMultiStepAuthentication()
    {
        return $this->container['multi_step_authentication'];
    }

    /**
     * Sets multi_step_authentication
     *
     * @param \OpenAPIAccess\Client\Model\ConnectInterfaceParamsMultiStepAuthentication|null $multi_step_authentication multi_step_authentication
     *
     * @return self
     */
    public function setMultiStepAuthentication($multi_step_authentication)
    {

        if (is_null($multi_step_authentication)) {
            throw new \InvalidArgumentException('non-nullable multi_step_authentication cannot be null');
        }

        $this->container['multi_step_authentication'] = $multi_step_authentication;

        return $this;
    }

    /**
     * Gets redirect_url
     *
     * @return string|null
     */
    public function getRedirectUrl()
    {
        return $this->container['redirect_url'];
    }

    /**
     * Sets redirect_url
     *
     * @param string|null $redirect_url Must only be passed when the used interface has the property REDIRECT_APPROACH. The user will be redirected to the given URL from the bank's website after completing the bank login and (possibly) the SCA.
     *
     * @return self
     */
    public function setRedirectUrl($redirect_url)
    {

        if (is_null($redirect_url)) {
            throw new \InvalidArgumentException('non-nullable redirect_url cannot be null');
        }

        $this->container['redirect_url'] = $redirect_url;

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


