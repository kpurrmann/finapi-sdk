<?php
/**
 * RequestSepaMoneyTransferParams
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * finAPI Access
 *
 * <strong>RESTful API for Account Information Services (AIS) and Payment Initiation Services (PIS)</strong>  The following pages give you some general information on how to use our APIs.<br/> The actual API services documentation then follows further below. You can use the menu to jump between API sections. <br/> <br/> This page has a built-in HTTP(S) client, so you can test the services directly from within this page, by filling in the request parameters and/or body in the respective services, and then hitting the TRY button. Note that you need to be authorized to make a successful API call. To authorize, refer to the 'Authorization' section of the API, or just use the OAUTH button that can be found near the TRY button. <br/>  <h2 id=\"general-information\">General information</h2>  <h3 id=\"general-error-responses\"><strong>Error Responses</strong></h3> When an API call returns with an error, then in general it has the structure shown in the following example:  <pre> {   \"errors\": [     {       \"message\": \"Interface 'FINTS_SERVER' is not supported for this operation.\",       \"code\": \"BAD_REQUEST\",       \"type\": \"TECHNICAL\"     }   ],   \"date\": \"2020-11-19 16:54:06.854\",   \"requestId\": \"selfgen-312042e7-df55-47e4-bffd-956a68ef37b5\",   \"endpoint\": \"POST /api/v1/bankConnections/import\",   \"authContext\": \"1/21\",   \"bank\": \"DEMO0002 - finAPI Test Redirect Bank\" } </pre>  If an API call requires an additional authentication by the user, HTTP code 510 is returned and the error response contains the additional \"multiStepAuthentication\" object, see the following example:  <pre> {   \"errors\": [     {       \"message\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",       \"code\": \"ADDITIONAL_AUTHENTICATION_REQUIRED\",       \"type\": \"BUSINESS\",       \"multiStepAuthentication\": {         \"hash\": \"678b13f4be9ed7d981a840af8131223a\",         \"status\": \"CHALLENGE_RESPONSE_REQUIRED\",         \"challengeMessage\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",         \"answerFieldLabel\": \"TAN\",         \"redirectUrl\": null,         \"redirectContext\": null,         \"redirectContextField\": null,         \"twoStepProcedures\": null,         \"photoTanMimeType\": null,         \"photoTanData\": null,         \"opticalData\": null,         \"opticalDataAsReinerSct\": false       }     }   ],   \"date\": \"2019-11-29 09:51:55.931\",   \"requestId\": \"selfgen-45059c99-1b14-4df7-9bd3-9d5f126df294\",   \"endpoint\": \"POST /api/v1/bankConnections/import\",   \"authContext\": \"1/18\",   \"bank\": \"DEMO0001 - finAPI Test Bank\" } </pre>  An exception to this error format are API authentication errors, where the following structure is returned:  <pre> {   \"error\": \"invalid_token\",   \"error_description\": \"Invalid access token: cccbce46-xxxx-xxxx-xxxx-xxxxxxxxxx\" } </pre>  <h3 id=\"general-paging\"><strong>Paging</strong></h3> API services that may potentially return a lot of data implement paging. They return a limited number of entries within a \"page\". Further entries must be fetched with subsequent calls. <br/><br/> Any API service that implements paging provides the following input parameters:<br/> &bull; \"page\": the number of the page to be retrieved (starting with 1).<br/> &bull; \"perPage\": the number of entries within a page. The default and maximum value is stated in the documentation of the respective services.  A paged response contains an additional \"paging\" object with the following structure:  <pre> {   ...   ,   \"paging\": {     \"page\": 1,     \"perPage\": 20,     \"pageCount\": 234,     \"totalCount\": 4662   } } </pre>  <h3 id=\"general-internationalization\"><strong>Internationalization</strong></h3> The finAPI services support internationalization which means you can define the language you prefer for API service responses. <br/><br/> The following languages are available: German, English, Czech, Slovak. <br/><br/> The preferred language can be defined by providing the official HTTP <strong>Accept-Language</strong> header. <br/><br/> finAPI reacts on the official iso language codes &quot;de&quot;, &quot;en&quot;, &quot;cs&quot; and &quot;sk&quot; for the named languages. Additional subtags supported by the Accept-Language header may be provided, e.g. &quot;en-US&quot;, but are ignored. <br/> If no Accept-Language header is given, German is used as the default language. <br/><br/> Exceptions:<br/> &bull; Bank login hints and login fields are only available in the language of the bank and not being translated.<br/> &bull; Direct messages from the bank systems typically returned as BUSINESS errors will not be translated.<br/> &bull; BUSINESS errors created by finAPI directly are available in German and English.<br/> &bull; TECHNICAL errors messages meant for developers are mostly in English, but also may be translated.  <h3 id=\"general-request-ids\"><strong>Request IDs</strong></h3> With any API call, you can pass a request ID via a header with name \"X-Request-Id\". The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. <br/><br/> If you don't pass a request ID for a call, finAPI will generate a random ID internally. <br/><br/> The request ID is always returned back in the response of a service, as a header with name \"X-Request-Id\". <br/><br/> We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster.  <h3 id=\"general-overriding-http-methods\"><strong>Overriding HTTP methods</strong></h3> Some HTTP clients do not support the HTTP methods PATCH or DELETE. If you are using such a client in your application, you can use a POST request instead with a special HTTP header indicating the originally intended HTTP method. <br/><br/> The header's name is <strong>X-HTTP-Method-Override</strong>. Set its value to either <strong>PATCH</strong> or <strong>DELETE</strong>. POST Requests having this header set will be treated either as PATCH or DELETE by the finAPI servers. <br/><br/> Example: <br/><br/> <strong>X-HTTP-Method-Override: PATCH</strong><br/> POST /api/v1/label/51<br/> {\"name\": \"changed label\"}<br/><br/> will be interpreted by finAPI as:<br/><br/> PATCH /api/v1/label/51<br/> {\"name\": \"changed label\"}<br/>  <h3 id=\"general-user-metadata\"><strong>User metadata</strong></h3> With the migration to PSD2 APIs, a new term called \"User metadata\" (also known as \"PSU metadata\") has been introduced to the API. This user metadata aims to inform the banking API if there was a real end-user behind an HTTP request or if the request was triggered by a system (e.g. by an automatic batch update). In the latter case, the bank may apply some restrictions such as limiting the number of HTTP requests for a single consent. Also, some operations may be forbidden entirely by the banking API. For example, some banks do not allow issuing a new consent without the end-user being involved. Therefore, it is certainly necessary and obligatory for the customer to provide the PSU metadata for such operations. <br/><br/> As finAPI does not have direct interaction with the end-user, it is the client application's responsibility to provide all the necessary information about the end-user. This must be done by sending additional headers with every request triggered on behalf of the end-user. <br/><br/> At the moment, the following headers are supported by the API:<br/> &bull; \"PSU-IP-Address\" - the IP address of the user's device.<br/> &bull; \"PSU-Device-OS\" - the user's device and/or operating system identification.<br/> &bull; \"PSU-User-Agent\" - the user's web browser or other client device identification.  <h3 id=\"general-faq\"><strong>FAQ</strong></h3> <strong>Is there a finAPI SDK?</strong> <br/> Currently we do not offer a native SDK, but there is the option to generate an SDK for almost any target language via OpenAPI. Use the 'Download SDK' button on this page for SDK generation. <br/> <br/> <strong>How can I enable finAPI's automatic batch update?</strong> <br/> Currently there is no way to set up the batch update via the API. Please contact support@finapi.io for this. <br/> <br/> <strong>Why do I need to keep authorizing when calling services on this page?</strong> <br/> This page is a \"one-page-app\". Reloading the page resets the OAuth authorization context. There is generally no need to reload the page, so just don't do it and your authorization will persist.
 *
 * The version of the OpenAPI document: 1.162.3
 * Contact: kontakt@finapi.io
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.2.0
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
 * RequestSepaMoneyTransferParams Class Doc Comment
 *
 * @category Class
 * @description Parameters for a single or collective SEPA money transfer order request
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class RequestSepaMoneyTransferParams implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'RequestSepaMoneyTransferParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'recipient_name' => 'string',
        'recipient_iban' => 'string',
        'recipient_bic' => 'string',
        'clearing_account_id' => 'string',
        'end_to_end_id' => 'string',
        'amount' => 'float',
        'purpose' => 'string',
        'sepa_purpose_code' => 'string',
        'account_id' => 'int',
        'store_secrets' => 'bool',
        'two_step_procedure_id' => 'string',
        'execution_date' => 'string',
        'single_booking' => 'bool',
        'additional_money_transfers' => '\OpenAPIAccess\Client\Model\SingleMoneyTransferRecipientData[]',
        'hide_transaction_details_in_web_form' => 'bool',
        'multi_step_authentication' => '\OpenAPIAccess\Client\Model\ConnectInterfaceParamsMultiStepAuthentication'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'recipient_name' => null,
        'recipient_iban' => null,
        'recipient_bic' => null,
        'clearing_account_id' => null,
        'end_to_end_id' => null,
        'amount' => null,
        'purpose' => null,
        'sepa_purpose_code' => null,
        'account_id' => 'int64',
        'store_secrets' => null,
        'two_step_procedure_id' => null,
        'execution_date' => null,
        'single_booking' => null,
        'additional_money_transfers' => null,
        'hide_transaction_details_in_web_form' => null,
        'multi_step_authentication' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'recipient_name' => false,
		'recipient_iban' => false,
		'recipient_bic' => false,
		'clearing_account_id' => false,
		'end_to_end_id' => false,
		'amount' => false,
		'purpose' => false,
		'sepa_purpose_code' => false,
		'account_id' => false,
		'store_secrets' => false,
		'two_step_procedure_id' => false,
		'execution_date' => false,
		'single_booking' => false,
		'additional_money_transfers' => false,
		'hide_transaction_details_in_web_form' => false,
		'multi_step_authentication' => false
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
        'recipient_name' => 'recipientName',
        'recipient_iban' => 'recipientIban',
        'recipient_bic' => 'recipientBic',
        'clearing_account_id' => 'clearingAccountId',
        'end_to_end_id' => 'endToEndId',
        'amount' => 'amount',
        'purpose' => 'purpose',
        'sepa_purpose_code' => 'sepaPurposeCode',
        'account_id' => 'accountId',
        'store_secrets' => 'storeSecrets',
        'two_step_procedure_id' => 'twoStepProcedureId',
        'execution_date' => 'executionDate',
        'single_booking' => 'singleBooking',
        'additional_money_transfers' => 'additionalMoneyTransfers',
        'hide_transaction_details_in_web_form' => 'hideTransactionDetailsInWebForm',
        'multi_step_authentication' => 'multiStepAuthentication'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'recipient_name' => 'setRecipientName',
        'recipient_iban' => 'setRecipientIban',
        'recipient_bic' => 'setRecipientBic',
        'clearing_account_id' => 'setClearingAccountId',
        'end_to_end_id' => 'setEndToEndId',
        'amount' => 'setAmount',
        'purpose' => 'setPurpose',
        'sepa_purpose_code' => 'setSepaPurposeCode',
        'account_id' => 'setAccountId',
        'store_secrets' => 'setStoreSecrets',
        'two_step_procedure_id' => 'setTwoStepProcedureId',
        'execution_date' => 'setExecutionDate',
        'single_booking' => 'setSingleBooking',
        'additional_money_transfers' => 'setAdditionalMoneyTransfers',
        'hide_transaction_details_in_web_form' => 'setHideTransactionDetailsInWebForm',
        'multi_step_authentication' => 'setMultiStepAuthentication'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'recipient_name' => 'getRecipientName',
        'recipient_iban' => 'getRecipientIban',
        'recipient_bic' => 'getRecipientBic',
        'clearing_account_id' => 'getClearingAccountId',
        'end_to_end_id' => 'getEndToEndId',
        'amount' => 'getAmount',
        'purpose' => 'getPurpose',
        'sepa_purpose_code' => 'getSepaPurposeCode',
        'account_id' => 'getAccountId',
        'store_secrets' => 'getStoreSecrets',
        'two_step_procedure_id' => 'getTwoStepProcedureId',
        'execution_date' => 'getExecutionDate',
        'single_booking' => 'getSingleBooking',
        'additional_money_transfers' => 'getAdditionalMoneyTransfers',
        'hide_transaction_details_in_web_form' => 'getHideTransactionDetailsInWebForm',
        'multi_step_authentication' => 'getMultiStepAuthentication'
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
        $this->setIfExists('recipient_name', $data ?? [], null);
        $this->setIfExists('recipient_iban', $data ?? [], null);
        $this->setIfExists('recipient_bic', $data ?? [], null);
        $this->setIfExists('clearing_account_id', $data ?? [], null);
        $this->setIfExists('end_to_end_id', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('purpose', $data ?? [], null);
        $this->setIfExists('sepa_purpose_code', $data ?? [], null);
        $this->setIfExists('account_id', $data ?? [], null);
        $this->setIfExists('store_secrets', $data ?? [], false);
        $this->setIfExists('two_step_procedure_id', $data ?? [], null);
        $this->setIfExists('execution_date', $data ?? [], null);
        $this->setIfExists('single_booking', $data ?? [], false);
        $this->setIfExists('additional_money_transfers', $data ?? [], null);
        $this->setIfExists('hide_transaction_details_in_web_form', $data ?? [], false);
        $this->setIfExists('multi_step_authentication', $data ?? [], null);
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

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['account_id'] === null) {
            $invalidProperties[] = "'account_id' can't be null";
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
     * Gets recipient_name
     *
     * @return string|null
     */
    public function getRecipientName()
    {
        return $this->container['recipient_name'];
    }

    /**
     * Sets recipient_name
     *
     * @param string|null $recipient_name Name of the recipient. Note: Neither finAPI nor the involved bank servers are guaranteed to validate the recipient name. Even if the recipient name does not depict the actual registered account holder of the specified recipient account, the money transfer request might still be successful. This field is optional only when you pass a clearing account as the recipient. Otherwise, this field is required.
     *
     * @return self
     */
    public function setRecipientName($recipient_name)
    {

        if (is_null($recipient_name)) {
            throw new \InvalidArgumentException('non-nullable recipient_name cannot be null');
        }

        $this->container['recipient_name'] = $recipient_name;

        return $this;
    }

    /**
     * Gets recipient_iban
     *
     * @return string|null
     */
    public function getRecipientIban()
    {
        return $this->container['recipient_iban'];
    }

    /**
     * Sets recipient_iban
     *
     * @param string|null $recipient_iban IBAN of the recipient's account. This field is optional only when you pass a clearing account as the recipient. Otherwise, this field is required.
     *
     * @return self
     */
    public function setRecipientIban($recipient_iban)
    {

        if (is_null($recipient_iban)) {
            throw new \InvalidArgumentException('non-nullable recipient_iban cannot be null');
        }

        $this->container['recipient_iban'] = $recipient_iban;

        return $this;
    }

    /**
     * Gets recipient_bic
     *
     * @return string|null
     */
    public function getRecipientBic()
    {
        return $this->container['recipient_bic'];
    }

    /**
     * Sets recipient_bic
     *
     * @param string|null $recipient_bic BIC of the recipient's account. Note: This field is optional when you pass a clearing account as the recipient or if the bank connection of the account that you want to transfer money from supports the IBAN-Only money transfer. You can find this out via GET /bankConnections/<id>. If no BIC is given, finAPI will try to recognize it using the given recipientIban value (if it's given). And then if the result value is not empty, it will be used for the money transfer request independent of whether it is required or not (unless you pass a clearing account, in which case the value will always be ignored).
     *
     * @return self
     */
    public function setRecipientBic($recipient_bic)
    {

        if (is_null($recipient_bic)) {
            throw new \InvalidArgumentException('non-nullable recipient_bic cannot be null');
        }

        $this->container['recipient_bic'] = $recipient_bic;

        return $this;
    }

    /**
     * Gets clearing_account_id
     *
     * @return string|null
     */
    public function getClearingAccountId()
    {
        return $this->container['clearing_account_id'];
    }

    /**
     * Sets clearing_account_id
     *
     * @param string|null $clearing_account_id Identifier of a clearing account. If this field is set, then the fields 'recipientName', 'recipientIban' and 'recipientBic' will be ignored and the recipient account will be the specified clearing account.
     *
     * @return self
     */
    public function setClearingAccountId($clearing_account_id)
    {

        if (is_null($clearing_account_id)) {
            throw new \InvalidArgumentException('non-nullable clearing_account_id cannot be null');
        }

        $this->container['clearing_account_id'] = $clearing_account_id;

        return $this;
    }

    /**
     * Gets end_to_end_id
     *
     * @return string|null
     */
    public function getEndToEndId()
    {
        return $this->container['end_to_end_id'];
    }

    /**
     * Sets end_to_end_id
     *
     * @param string|null $end_to_end_id End-To-End ID for the transfer transaction
     *
     * @return self
     */
    public function setEndToEndId($end_to_end_id)
    {

        if (is_null($end_to_end_id)) {
            throw new \InvalidArgumentException('non-nullable end_to_end_id cannot be null');
        }

        $this->container['end_to_end_id'] = $end_to_end_id;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount The amount to transfer. Must be a positive decimal number with at most two decimal places (e.g. 99.99)
     *
     * @return self
     */
    public function setAmount($amount)
    {

        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }

        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets purpose
     *
     * @return string|null
     */
    public function getPurpose()
    {
        return $this->container['purpose'];
    }

    /**
     * Sets purpose
     *
     * @param string|null $purpose The purpose of the transfer transaction
     *
     * @return self
     */
    public function setPurpose($purpose)
    {

        if (is_null($purpose)) {
            throw new \InvalidArgumentException('non-nullable purpose cannot be null');
        }

        $this->container['purpose'] = $purpose;

        return $this;
    }

    /**
     * Gets sepa_purpose_code
     *
     * @return string|null
     */
    public function getSepaPurposeCode()
    {
        return $this->container['sepa_purpose_code'];
    }

    /**
     * Sets sepa_purpose_code
     *
     * @param string|null $sepa_purpose_code SEPA purpose code, according to ISO 20022, external codes set.
     *
     * @return self
     */
    public function setSepaPurposeCode($sepa_purpose_code)
    {

        if (is_null($sepa_purpose_code)) {
            throw new \InvalidArgumentException('non-nullable sepa_purpose_code cannot be null');
        }

        $this->container['sepa_purpose_code'] = $sepa_purpose_code;

        return $this;
    }

    /**
     * Gets account_id
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     *
     * @param int $account_id Identifier of the bank account that you want to transfer money from
     *
     * @return self
     */
    public function setAccountId($account_id)
    {

        if (is_null($account_id)) {
            throw new \InvalidArgumentException('non-nullable account_id cannot be null');
        }

        $this->container['account_id'] = $account_id;

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
     * @param bool|null $store_secrets Whether to store the PIN. If the PIN is stored, it is not required to pass the PIN again when executing SEPA orders. Default value is 'false'. <br/><br/>NOTES:<br/> - before you set this field to true, please regard the 'pinsAreVolatile' flag of the bank connection that the account belongs to. Please note that volatile credentials will not be stored, even if provided, to enforce user involvement in the next communication with the bank;<br/> - this field is ignored in case when the user will need to use finAPI's Web Form. The user will be able to decide whether to store the PIN or not in the Web Form, depending on the 'storeSecretsAvailableInWebForm' setting (see Client Configuration).
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
     * Gets two_step_procedure_id
     *
     * @return string|null
     */
    public function getTwoStepProcedureId()
    {
        return $this->container['two_step_procedure_id'];
    }

    /**
     * Sets two_step_procedure_id
     *
     * @param string|null $two_step_procedure_id The bank-given ID of the two-step-procedure that should be used for the order. For a list of available two-step-procedures, see the corresponding bank connection (GET /bankConnections). If this field is not set, then the bank connection's default two-step-procedure will be used. Note that in this case, when the bank connection has no default two-step-procedure set, then the response of the service depends on whether you need to use finAPI's Web Form or not. If you need to use the Web Form, the user will be prompted to select the two-step-procedure within the Web Form. If you don't need to use the Web Form, then the service will return an error (passing a value for this field is required in this case).
     *
     * @return self
     */
    public function setTwoStepProcedureId($two_step_procedure_id)
    {

        if (is_null($two_step_procedure_id)) {
            throw new \InvalidArgumentException('non-nullable two_step_procedure_id cannot be null');
        }

        $this->container['two_step_procedure_id'] = $two_step_procedure_id;

        return $this;
    }

    /**
     * Gets execution_date
     *
     * @return string|null
     */
    public function getExecutionDate()
    {
        return $this->container['execution_date'];
    }

    /**
     * Sets execution_date
     *
     * @param string|null $execution_date <strong>Format:</strong> 'YYYY-MM-DD'<br/>Execution date for the money transfer(s). If not specified, then the current date will be used.
     *
     * @return self
     */
    public function setExecutionDate($execution_date)
    {

        if (is_null($execution_date)) {
            throw new \InvalidArgumentException('non-nullable execution_date cannot be null');
        }

        $this->container['execution_date'] = $execution_date;

        return $this;
    }

    /**
     * Gets single_booking
     *
     * @return bool|null
     */
    public function getSingleBooking()
    {
        return $this->container['single_booking'];
    }

    /**
     * Sets single_booking
     *
     * @param bool|null $single_booking This field is only regarded when you pass multiple orders. It determines whether the orders should be processed by the bank as one collective booking (in case of 'false'), or as single bookings (in case of 'true'). Default value is 'false'.
     *
     * @return self
     */
    public function setSingleBooking($single_booking)
    {

        if (is_null($single_booking)) {
            throw new \InvalidArgumentException('non-nullable single_booking cannot be null');
        }

        $this->container['single_booking'] = $single_booking;

        return $this;
    }

    /**
     * Gets additional_money_transfers
     *
     * @return \OpenAPIAccess\Client\Model\SingleMoneyTransferRecipientData[]|null
     */
    public function getAdditionalMoneyTransfers()
    {
        return $this->container['additional_money_transfers'];
    }

    /**
     * Sets additional_money_transfers
     *
     * @param \OpenAPIAccess\Client\Model\SingleMoneyTransferRecipientData[]|null $additional_money_transfers <strong>Type:</strong> SingleMoneyTransferRecipientData<br/> In case that you want to submit not just a single money transfer, but do a collective money transfer, use this field to pass a list of additional money transfer orders. The service will then pass a collective money transfer request to the bank, including both the money transfer specified on the top-level, as well as all money transfers specified in this list. The maximum count of money transfers that you can pass (in total) is 15000. Note that you should check the account's 'supportedOrders' field to find out whether or not it is supporting collective money transfers.
     *
     * @return self
     */
    public function setAdditionalMoneyTransfers($additional_money_transfers)
    {

        if (is_null($additional_money_transfers)) {
            throw new \InvalidArgumentException('non-nullable additional_money_transfers cannot be null');
        }

        $this->container['additional_money_transfers'] = $additional_money_transfers;

        return $this;
    }

    /**
     * Gets hide_transaction_details_in_web_form
     *
     * @return bool|null
     */
    public function getHideTransactionDetailsInWebForm()
    {
        return $this->container['hide_transaction_details_in_web_form'];
    }

    /**
     * Sets hide_transaction_details_in_web_form
     *
     * @param bool|null $hide_transaction_details_in_web_form Whether the finAPI Web Form should hide transaction details when prompting the caller for the second factor. Default value is false.
     *
     * @return self
     */
    public function setHideTransactionDetailsInWebForm($hide_transaction_details_in_web_form)
    {

        if (is_null($hide_transaction_details_in_web_form)) {
            throw new \InvalidArgumentException('non-nullable hide_transaction_details_in_web_form cannot be null');
        }

        $this->container['hide_transaction_details_in_web_form'] = $hide_transaction_details_in_web_form;

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


