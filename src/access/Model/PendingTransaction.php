<?php
/**
 * PendingTransaction
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
 * PendingTransaction Class Doc Comment
 *
 * @category Class
 * @description Container for a pending transaction&#39;s data
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PendingTransaction implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'PendingTransaction';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'account_id' => 'int',
        'import_date' => '\DateTime',
        'value_date' => '\DateTime',
        'bank_booking_date' => '\DateTime',
        'amount' => 'float',
        'currency' => 'Currency',
        'purpose' => 'string',
        'counterparty_name' => 'string',
        'counterparty_iban' => 'string',
        'counterparty_account_number' => 'string',
        'counterparty_blz' => 'string',
        'counterparty_bic' => 'string',
        'counterparty_bank_name' => 'string',
        'counterparty_mandate_reference' => 'string',
        'counterparty_customer_reference' => 'string',
        'counterparty_creditor_id' => 'string',
        'counterparty_debtor_id' => 'string',
        'end_to_end_id' => 'string',
        'type' => 'string',
        'type_code_zka' => 'string',
        'type_code_swift' => 'string',
        'sepa_purpose_code' => 'string',
        'bank_transaction_code' => 'string',
        'primanota' => 'string',
        'compensation_amount' => 'float',
        'original_amount' => 'float',
        'original_currency' => 'Currency',
        'different_debtor' => 'string',
        'different_creditor' => 'string',
        'paypal_data' => '\OpenAPIAccess\Client\Model\PendingTransactionPaypalData'
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
        'account_id' => 'int64',
        'import_date' => 'date-time',
        'value_date' => 'date',
        'bank_booking_date' => 'date',
        'amount' => null,
        'currency' => null,
        'purpose' => null,
        'counterparty_name' => null,
        'counterparty_iban' => null,
        'counterparty_account_number' => null,
        'counterparty_blz' => null,
        'counterparty_bic' => null,
        'counterparty_bank_name' => null,
        'counterparty_mandate_reference' => null,
        'counterparty_customer_reference' => null,
        'counterparty_creditor_id' => null,
        'counterparty_debtor_id' => null,
        'end_to_end_id' => null,
        'type' => null,
        'type_code_zka' => null,
        'type_code_swift' => null,
        'sepa_purpose_code' => null,
        'bank_transaction_code' => null,
        'primanota' => null,
        'compensation_amount' => null,
        'original_amount' => null,
        'original_currency' => null,
        'different_debtor' => null,
        'different_creditor' => null,
        'paypal_data' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'account_id' => false,
		'import_date' => false,
		'value_date' => false,
		'bank_booking_date' => false,
		'amount' => false,
		'currency' => false,
		'purpose' => false,
		'counterparty_name' => false,
		'counterparty_iban' => false,
		'counterparty_account_number' => false,
		'counterparty_blz' => false,
		'counterparty_bic' => false,
		'counterparty_bank_name' => false,
		'counterparty_mandate_reference' => false,
		'counterparty_customer_reference' => false,
		'counterparty_creditor_id' => false,
		'counterparty_debtor_id' => false,
		'end_to_end_id' => false,
		'type' => false,
		'type_code_zka' => false,
		'type_code_swift' => false,
		'sepa_purpose_code' => false,
		'bank_transaction_code' => false,
		'primanota' => false,
		'compensation_amount' => false,
		'original_amount' => false,
		'original_currency' => false,
		'different_debtor' => false,
		'different_creditor' => false,
		'paypal_data' => false
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
        'account_id' => 'accountId',
        'import_date' => 'importDate',
        'value_date' => 'valueDate',
        'bank_booking_date' => 'bankBookingDate',
        'amount' => 'amount',
        'currency' => 'currency',
        'purpose' => 'purpose',
        'counterparty_name' => 'counterpartyName',
        'counterparty_iban' => 'counterpartyIban',
        'counterparty_account_number' => 'counterpartyAccountNumber',
        'counterparty_blz' => 'counterpartyBlz',
        'counterparty_bic' => 'counterpartyBic',
        'counterparty_bank_name' => 'counterpartyBankName',
        'counterparty_mandate_reference' => 'counterpartyMandateReference',
        'counterparty_customer_reference' => 'counterpartyCustomerReference',
        'counterparty_creditor_id' => 'counterpartyCreditorId',
        'counterparty_debtor_id' => 'counterpartyDebtorId',
        'end_to_end_id' => 'endToEndId',
        'type' => 'type',
        'type_code_zka' => 'typeCodeZka',
        'type_code_swift' => 'typeCodeSwift',
        'sepa_purpose_code' => 'sepaPurposeCode',
        'bank_transaction_code' => 'bankTransactionCode',
        'primanota' => 'primanota',
        'compensation_amount' => 'compensationAmount',
        'original_amount' => 'originalAmount',
        'original_currency' => 'originalCurrency',
        'different_debtor' => 'differentDebtor',
        'different_creditor' => 'differentCreditor',
        'paypal_data' => 'paypalData'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'account_id' => 'setAccountId',
        'import_date' => 'setImportDate',
        'value_date' => 'setValueDate',
        'bank_booking_date' => 'setBankBookingDate',
        'amount' => 'setAmount',
        'currency' => 'setCurrency',
        'purpose' => 'setPurpose',
        'counterparty_name' => 'setCounterpartyName',
        'counterparty_iban' => 'setCounterpartyIban',
        'counterparty_account_number' => 'setCounterpartyAccountNumber',
        'counterparty_blz' => 'setCounterpartyBlz',
        'counterparty_bic' => 'setCounterpartyBic',
        'counterparty_bank_name' => 'setCounterpartyBankName',
        'counterparty_mandate_reference' => 'setCounterpartyMandateReference',
        'counterparty_customer_reference' => 'setCounterpartyCustomerReference',
        'counterparty_creditor_id' => 'setCounterpartyCreditorId',
        'counterparty_debtor_id' => 'setCounterpartyDebtorId',
        'end_to_end_id' => 'setEndToEndId',
        'type' => 'setType',
        'type_code_zka' => 'setTypeCodeZka',
        'type_code_swift' => 'setTypeCodeSwift',
        'sepa_purpose_code' => 'setSepaPurposeCode',
        'bank_transaction_code' => 'setBankTransactionCode',
        'primanota' => 'setPrimanota',
        'compensation_amount' => 'setCompensationAmount',
        'original_amount' => 'setOriginalAmount',
        'original_currency' => 'setOriginalCurrency',
        'different_debtor' => 'setDifferentDebtor',
        'different_creditor' => 'setDifferentCreditor',
        'paypal_data' => 'setPaypalData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'account_id' => 'getAccountId',
        'import_date' => 'getImportDate',
        'value_date' => 'getValueDate',
        'bank_booking_date' => 'getBankBookingDate',
        'amount' => 'getAmount',
        'currency' => 'getCurrency',
        'purpose' => 'getPurpose',
        'counterparty_name' => 'getCounterpartyName',
        'counterparty_iban' => 'getCounterpartyIban',
        'counterparty_account_number' => 'getCounterpartyAccountNumber',
        'counterparty_blz' => 'getCounterpartyBlz',
        'counterparty_bic' => 'getCounterpartyBic',
        'counterparty_bank_name' => 'getCounterpartyBankName',
        'counterparty_mandate_reference' => 'getCounterpartyMandateReference',
        'counterparty_customer_reference' => 'getCounterpartyCustomerReference',
        'counterparty_creditor_id' => 'getCounterpartyCreditorId',
        'counterparty_debtor_id' => 'getCounterpartyDebtorId',
        'end_to_end_id' => 'getEndToEndId',
        'type' => 'getType',
        'type_code_zka' => 'getTypeCodeZka',
        'type_code_swift' => 'getTypeCodeSwift',
        'sepa_purpose_code' => 'getSepaPurposeCode',
        'bank_transaction_code' => 'getBankTransactionCode',
        'primanota' => 'getPrimanota',
        'compensation_amount' => 'getCompensationAmount',
        'original_amount' => 'getOriginalAmount',
        'original_currency' => 'getOriginalCurrency',
        'different_debtor' => 'getDifferentDebtor',
        'different_creditor' => 'getDifferentCreditor',
        'paypal_data' => 'getPaypalData'
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
        $this->setIfExists('account_id', $data ?? [], null);
        $this->setIfExists('import_date', $data ?? [], null);
        $this->setIfExists('value_date', $data ?? [], null);
        $this->setIfExists('bank_booking_date', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('purpose', $data ?? [], null);
        $this->setIfExists('counterparty_name', $data ?? [], null);
        $this->setIfExists('counterparty_iban', $data ?? [], null);
        $this->setIfExists('counterparty_account_number', $data ?? [], null);
        $this->setIfExists('counterparty_blz', $data ?? [], null);
        $this->setIfExists('counterparty_bic', $data ?? [], null);
        $this->setIfExists('counterparty_bank_name', $data ?? [], null);
        $this->setIfExists('counterparty_mandate_reference', $data ?? [], null);
        $this->setIfExists('counterparty_customer_reference', $data ?? [], null);
        $this->setIfExists('counterparty_creditor_id', $data ?? [], null);
        $this->setIfExists('counterparty_debtor_id', $data ?? [], null);
        $this->setIfExists('end_to_end_id', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('type_code_zka', $data ?? [], null);
        $this->setIfExists('type_code_swift', $data ?? [], null);
        $this->setIfExists('sepa_purpose_code', $data ?? [], null);
        $this->setIfExists('bank_transaction_code', $data ?? [], null);
        $this->setIfExists('primanota', $data ?? [], null);
        $this->setIfExists('compensation_amount', $data ?? [], null);
        $this->setIfExists('original_amount', $data ?? [], null);
        $this->setIfExists('original_currency', $data ?? [], null);
        $this->setIfExists('different_debtor', $data ?? [], null);
        $this->setIfExists('different_creditor', $data ?? [], null);
        $this->setIfExists('paypal_data', $data ?? [], null);
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
        if ($this->container['account_id'] === null) {
            $invalidProperties[] = "'account_id' can't be null";
        }
        if ($this->container['import_date'] === null) {
            $invalidProperties[] = "'import_date' can't be null";
        }
        if ($this->container['value_date'] === null) {
            $invalidProperties[] = "'value_date' can't be null";
        }
        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
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
     * @param int $id Pending transaction identifier
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
     * @param int $account_id Account identifier
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
     * Gets import_date
     *
     * @return \DateTime
     */
    public function getImportDate()
    {
        return $this->container['import_date'];
    }

    /**
     * Sets import_date
     *
     * @param \DateTime $import_date <strong>Format:</strong> 'YYYY-MM-DD'T'HH:MM:SS.SSSXXX' (RFC 3339, section 5.6)<br/>Date of transaction import.
     *
     * @return self
     */
    public function setImportDate($import_date)
    {

        if (is_null($import_date)) {
            throw new \InvalidArgumentException('non-nullable import_date cannot be null');
        }

        $this->container['import_date'] = $import_date;

        return $this;
    }

    /**
     * Gets value_date
     *
     * @return \DateTime
     */
    public function getValueDate()
    {
        return $this->container['value_date'];
    }

    /**
     * Sets value_date
     *
     * @param \DateTime $value_date <strong>Format:</strong> 'YYYY-MM-DD'<br/>Value date.
     *
     * @return self
     */
    public function setValueDate($value_date)
    {

        if (is_null($value_date)) {
            throw new \InvalidArgumentException('non-nullable value_date cannot be null');
        }

        $this->container['value_date'] = $value_date;

        return $this;
    }

    /**
     * Gets bank_booking_date
     *
     * @return \DateTime|null
     */
    public function getBankBookingDate()
    {
        return $this->container['bank_booking_date'];
    }

    /**
     * Sets bank_booking_date
     *
     * @param \DateTime|null $bank_booking_date <strong>Format:</strong> 'YYYY-MM-DD'<br/>Bank booking date.
     *
     * @return self
     */
    public function setBankBookingDate($bank_booking_date)
    {

        if (is_null($bank_booking_date)) {
            throw new \InvalidArgumentException('non-nullable bank_booking_date cannot be null');
        }

        $this->container['bank_booking_date'] = $bank_booking_date;

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
     * @param float $amount Transaction amount
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
     * Gets currency
     *
     * @return Currency|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param Currency|null $currency <strong>Type:</strong> Currency<br/> Transaction currency in ISO 4217 format.This field can be null if not explicitly provided the bank. In this case it can be assumed as account’s currency.
     *
     * @return self
     */
    public function setCurrency($currency)
    {

        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }

        $this->container['currency'] = $currency;

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
     * @param string|null $purpose Transaction purpose. Maximum length: 2000
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
     * Gets counterparty_name
     *
     * @return string|null
     */
    public function getCounterpartyName()
    {
        return $this->container['counterparty_name'];
    }

    /**
     * Sets counterparty_name
     *
     * @param string|null $counterparty_name Counterparty name. Maximum length: 80
     *
     * @return self
     */
    public function setCounterpartyName($counterparty_name)
    {

        if (is_null($counterparty_name)) {
            throw new \InvalidArgumentException('non-nullable counterparty_name cannot be null');
        }

        $this->container['counterparty_name'] = $counterparty_name;

        return $this;
    }

    /**
     * Gets counterparty_iban
     *
     * @return string|null
     */
    public function getCounterpartyIban()
    {
        return $this->container['counterparty_iban'];
    }

    /**
     * Sets counterparty_iban
     *
     * @param string|null $counterparty_iban Counterparty IBAN
     *
     * @return self
     */
    public function setCounterpartyIban($counterparty_iban)
    {

        if (is_null($counterparty_iban)) {
            throw new \InvalidArgumentException('non-nullable counterparty_iban cannot be null');
        }

        $this->container['counterparty_iban'] = $counterparty_iban;

        return $this;
    }

    /**
     * Gets counterparty_account_number
     *
     * @return string|null
     */
    public function getCounterpartyAccountNumber()
    {
        return $this->container['counterparty_account_number'];
    }

    /**
     * Sets counterparty_account_number
     *
     * @param string|null $counterparty_account_number Counterparty account number
     *
     * @return self
     */
    public function setCounterpartyAccountNumber($counterparty_account_number)
    {

        if (is_null($counterparty_account_number)) {
            throw new \InvalidArgumentException('non-nullable counterparty_account_number cannot be null');
        }

        $this->container['counterparty_account_number'] = $counterparty_account_number;

        return $this;
    }

    /**
     * Gets counterparty_blz
     *
     * @return string|null
     */
    public function getCounterpartyBlz()
    {
        return $this->container['counterparty_blz'];
    }

    /**
     * Sets counterparty_blz
     *
     * @param string|null $counterparty_blz Counterparty BLZ
     *
     * @return self
     */
    public function setCounterpartyBlz($counterparty_blz)
    {

        if (is_null($counterparty_blz)) {
            throw new \InvalidArgumentException('non-nullable counterparty_blz cannot be null');
        }

        $this->container['counterparty_blz'] = $counterparty_blz;

        return $this;
    }

    /**
     * Gets counterparty_bic
     *
     * @return string|null
     */
    public function getCounterpartyBic()
    {
        return $this->container['counterparty_bic'];
    }

    /**
     * Sets counterparty_bic
     *
     * @param string|null $counterparty_bic Counterparty BIC
     *
     * @return self
     */
    public function setCounterpartyBic($counterparty_bic)
    {

        if (is_null($counterparty_bic)) {
            throw new \InvalidArgumentException('non-nullable counterparty_bic cannot be null');
        }

        $this->container['counterparty_bic'] = $counterparty_bic;

        return $this;
    }

    /**
     * Gets counterparty_bank_name
     *
     * @return string|null
     */
    public function getCounterpartyBankName()
    {
        return $this->container['counterparty_bank_name'];
    }

    /**
     * Sets counterparty_bank_name
     *
     * @param string|null $counterparty_bank_name Counterparty Bank name
     *
     * @return self
     */
    public function setCounterpartyBankName($counterparty_bank_name)
    {

        if (is_null($counterparty_bank_name)) {
            throw new \InvalidArgumentException('non-nullable counterparty_bank_name cannot be null');
        }

        $this->container['counterparty_bank_name'] = $counterparty_bank_name;

        return $this;
    }

    /**
     * Gets counterparty_mandate_reference
     *
     * @return string|null
     */
    public function getCounterpartyMandateReference()
    {
        return $this->container['counterparty_mandate_reference'];
    }

    /**
     * Sets counterparty_mandate_reference
     *
     * @param string|null $counterparty_mandate_reference The mandate reference of the counterparty
     *
     * @return self
     */
    public function setCounterpartyMandateReference($counterparty_mandate_reference)
    {

        if (is_null($counterparty_mandate_reference)) {
            throw new \InvalidArgumentException('non-nullable counterparty_mandate_reference cannot be null');
        }

        $this->container['counterparty_mandate_reference'] = $counterparty_mandate_reference;

        return $this;
    }

    /**
     * Gets counterparty_customer_reference
     *
     * @return string|null
     */
    public function getCounterpartyCustomerReference()
    {
        return $this->container['counterparty_customer_reference'];
    }

    /**
     * Sets counterparty_customer_reference
     *
     * @param string|null $counterparty_customer_reference The customer reference of the counterparty
     *
     * @return self
     */
    public function setCounterpartyCustomerReference($counterparty_customer_reference)
    {

        if (is_null($counterparty_customer_reference)) {
            throw new \InvalidArgumentException('non-nullable counterparty_customer_reference cannot be null');
        }

        $this->container['counterparty_customer_reference'] = $counterparty_customer_reference;

        return $this;
    }

    /**
     * Gets counterparty_creditor_id
     *
     * @return string|null
     */
    public function getCounterpartyCreditorId()
    {
        return $this->container['counterparty_creditor_id'];
    }

    /**
     * Sets counterparty_creditor_id
     *
     * @param string|null $counterparty_creditor_id The creditor ID of the counterparty. Exists only for SEPA direct debit transactions (\"Lastschrift\").
     *
     * @return self
     */
    public function setCounterpartyCreditorId($counterparty_creditor_id)
    {

        if (is_null($counterparty_creditor_id)) {
            throw new \InvalidArgumentException('non-nullable counterparty_creditor_id cannot be null');
        }

        $this->container['counterparty_creditor_id'] = $counterparty_creditor_id;

        return $this;
    }

    /**
     * Gets counterparty_debtor_id
     *
     * @return string|null
     */
    public function getCounterpartyDebtorId()
    {
        return $this->container['counterparty_debtor_id'];
    }

    /**
     * Sets counterparty_debtor_id
     *
     * @param string|null $counterparty_debtor_id The originator's identification code. Exists only for SEPA money transfer transactions (\"Überweisung\").
     *
     * @return self
     */
    public function setCounterpartyDebtorId($counterparty_debtor_id)
    {

        if (is_null($counterparty_debtor_id)) {
            throw new \InvalidArgumentException('non-nullable counterparty_debtor_id cannot be null');
        }

        $this->container['counterparty_debtor_id'] = $counterparty_debtor_id;

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
     * @param string|null $end_to_end_id End-To-End ID
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
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type Transaction type, according to the bank. If set, this will contain a German term that you can display to the user. Some examples of common values are: \"Lastschrift\", \"Auslands&uuml;berweisung\", \"Geb&uuml;hren\", \"Zinsen\". The maximum possible length of this field is 255 characters.
     *
     * @return self
     */
    public function setType($type)
    {

        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }

        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets type_code_zka
     *
     * @return string|null
     */
    public function getTypeCodeZka()
    {
        return $this->container['type_code_zka'];
    }

    /**
     * Sets type_code_zka
     *
     * @param string|null $type_code_zka ZKA business transaction code which relates to the transaction's type. Possible values range from 1 through 999. If no information about the ZKA type code is available, then this field will be null.
     *
     * @return self
     */
    public function setTypeCodeZka($type_code_zka)
    {

        if (is_null($type_code_zka)) {
            throw new \InvalidArgumentException('non-nullable type_code_zka cannot be null');
        }

        $this->container['type_code_zka'] = $type_code_zka;

        return $this;
    }

    /**
     * Gets type_code_swift
     *
     * @return string|null
     */
    public function getTypeCodeSwift()
    {
        return $this->container['type_code_swift'];
    }

    /**
     * Sets type_code_swift
     *
     * @param string|null $type_code_swift SWIFT transaction type code. If no information about the SWIFT code is available, then this field will be null.
     *
     * @return self
     */
    public function setTypeCodeSwift($type_code_swift)
    {

        if (is_null($type_code_swift)) {
            throw new \InvalidArgumentException('non-nullable type_code_swift cannot be null');
        }

        $this->container['type_code_swift'] = $type_code_swift;

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
     * @param string|null $sepa_purpose_code SEPA purpose code, according to ISO 20022
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
     * Gets bank_transaction_code
     *
     * @return string|null
     */
    public function getBankTransactionCode()
    {
        return $this->container['bank_transaction_code'];
    }

    /**
     * Sets bank_transaction_code
     *
     * @param string|null $bank_transaction_code Bank transaction code, according to ISO 20022
     *
     * @return self
     */
    public function setBankTransactionCode($bank_transaction_code)
    {

        if (is_null($bank_transaction_code)) {
            throw new \InvalidArgumentException('non-nullable bank_transaction_code cannot be null');
        }

        $this->container['bank_transaction_code'] = $bank_transaction_code;

        return $this;
    }

    /**
     * Gets primanota
     *
     * @return string|null
     */
    public function getPrimanota()
    {
        return $this->container['primanota'];
    }

    /**
     * Sets primanota
     *
     * @param string|null $primanota Transaction primanota (bank side identification number)
     *
     * @return self
     */
    public function setPrimanota($primanota)
    {

        if (is_null($primanota)) {
            throw new \InvalidArgumentException('non-nullable primanota cannot be null');
        }

        $this->container['primanota'] = $primanota;

        return $this;
    }

    /**
     * Gets compensation_amount
     *
     * @return float|null
     */
    public function getCompensationAmount()
    {
        return $this->container['compensation_amount'];
    }

    /**
     * Sets compensation_amount
     *
     * @param float|null $compensation_amount Compensation Amount. Sum of reimbursement of out-of-pocket expenses plus processing brokerage in case of a national return / refund debit as well as an optional interest equalisation. Exists predominantly for SEPA direct debit returns.
     *
     * @return self
     */
    public function setCompensationAmount($compensation_amount)
    {

        if (is_null($compensation_amount)) {
            throw new \InvalidArgumentException('non-nullable compensation_amount cannot be null');
        }

        $this->container['compensation_amount'] = $compensation_amount;

        return $this;
    }

    /**
     * Gets original_amount
     *
     * @return float|null
     */
    public function getOriginalAmount()
    {
        return $this->container['original_amount'];
    }

    /**
     * Sets original_amount
     *
     * @param float|null $original_amount Original Amount of the original direct debit. Exists predominantly for SEPA direct debit returns.
     *
     * @return self
     */
    public function setOriginalAmount($original_amount)
    {

        if (is_null($original_amount)) {
            throw new \InvalidArgumentException('non-nullable original_amount cannot be null');
        }

        $this->container['original_amount'] = $original_amount;

        return $this;
    }

    /**
     * Gets original_currency
     *
     * @return Currency|null
     */
    public function getOriginalCurrency()
    {
        return $this->container['original_currency'];
    }

    /**
     * Sets original_currency
     *
     * @param Currency|null $original_currency <strong>Type:</strong> Currency<br/> Currency of the original amount in ISO 4217 format. This field can be null if not explicitly provided the bank. In this case it can be assumed as account’s currency.
     *
     * @return self
     */
    public function setOriginalCurrency($original_currency)
    {

        if (is_null($original_currency)) {
            throw new \InvalidArgumentException('non-nullable original_currency cannot be null');
        }

        $this->container['original_currency'] = $original_currency;

        return $this;
    }

    /**
     * Gets different_debtor
     *
     * @return string|null
     */
    public function getDifferentDebtor()
    {
        return $this->container['different_debtor'];
    }

    /**
     * Sets different_debtor
     *
     * @param string|null $different_debtor Payer's/debtor's reference party (in the case of a credit transfer) or payee's/creditor's reference party (in the case of a direct debit)
     *
     * @return self
     */
    public function setDifferentDebtor($different_debtor)
    {

        if (is_null($different_debtor)) {
            throw new \InvalidArgumentException('non-nullable different_debtor cannot be null');
        }

        $this->container['different_debtor'] = $different_debtor;

        return $this;
    }

    /**
     * Gets different_creditor
     *
     * @return string|null
     */
    public function getDifferentCreditor()
    {
        return $this->container['different_creditor'];
    }

    /**
     * Sets different_creditor
     *
     * @param string|null $different_creditor Payee's/creditor's reference party (in the case of a credit transfer) or payer's/debtor's reference party (in the case of a direct debit)
     *
     * @return self
     */
    public function setDifferentCreditor($different_creditor)
    {

        if (is_null($different_creditor)) {
            throw new \InvalidArgumentException('non-nullable different_creditor cannot be null');
        }

        $this->container['different_creditor'] = $different_creditor;

        return $this;
    }

    /**
     * Gets paypal_data
     *
     * @return \OpenAPIAccess\Client\Model\PendingTransactionPaypalData|null
     */
    public function getPaypalData()
    {
        return $this->container['paypal_data'];
    }

    /**
     * Sets paypal_data
     *
     * @param \OpenAPIAccess\Client\Model\PendingTransactionPaypalData|null $paypal_data paypal_data
     *
     * @return self
     */
    public function setPaypalData($paypal_data)
    {

        if (is_null($paypal_data)) {
            throw new \InvalidArgumentException('non-nullable paypal_data cannot be null');
        }

        $this->container['paypal_data'] = $paypal_data;

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


