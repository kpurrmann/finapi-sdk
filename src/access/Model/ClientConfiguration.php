<?php
/**
 * ClientConfiguration
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
 * ClientConfiguration Class Doc Comment
 *
 * @category Class
 * @description Client configuration parameters
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ClientConfiguration implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ClientConfiguration';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'pfm_services_enabled' => 'bool',
        'is_automatic_batch_update_enabled' => 'bool',
        'is_development_mode_enabled' => 'bool',
        'is_non_euro_accounts_supported' => 'bool',
        'is_auto_categorization_enabled' => 'bool',
        'mandator_license' => 'MandatorLicense',
        'preferred_consent_type' => 'PreferredConsentType',
        'user_notification_callback_url' => 'string',
        'user_synchronization_callback_url' => 'string',
        'refresh_tokens_validity_period' => 'int',
        'user_access_tokens_validity_period' => 'int',
        'client_access_tokens_validity_period' => 'int',
        'max_user_login_attempts' => 'int',
        'transaction_import_limitation' => 'int',
        'is_user_auto_verification_enabled' => 'bool',
        'is_mandator_admin' => 'bool',
        'is_web_scraping_enabled' => 'bool',
        'payments_enabled' => 'bool',
        'is_standalone_payments_enabled' => 'bool',
        'available_bank_groups' => 'string[]',
        'products' => 'Product[]',
        'fin_ts_product_registration_number' => 'string',
        'ais_via_web_form' => 'bool',
        'pis_via_web_form' => 'bool',
        'pis_standalone_via_web_form' => 'bool',
        'beta_banks_enabled' => 'bool',
        'category_restrictions_enabled' => 'bool',
        'category_restrictions' => '\OpenAPIAccess\Client\Model\Category[]',
        'cors_allowed_origins' => 'string[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'pfm_services_enabled' => null,
        'is_automatic_batch_update_enabled' => null,
        'is_development_mode_enabled' => null,
        'is_non_euro_accounts_supported' => null,
        'is_auto_categorization_enabled' => null,
        'mandator_license' => null,
        'preferred_consent_type' => null,
        'user_notification_callback_url' => null,
        'user_synchronization_callback_url' => null,
        'refresh_tokens_validity_period' => 'int32',
        'user_access_tokens_validity_period' => 'int32',
        'client_access_tokens_validity_period' => 'int32',
        'max_user_login_attempts' => 'int32',
        'transaction_import_limitation' => 'int32',
        'is_user_auto_verification_enabled' => null,
        'is_mandator_admin' => null,
        'is_web_scraping_enabled' => null,
        'payments_enabled' => null,
        'is_standalone_payments_enabled' => null,
        'available_bank_groups' => null,
        'products' => null,
        'fin_ts_product_registration_number' => null,
        'ais_via_web_form' => null,
        'pis_via_web_form' => null,
        'pis_standalone_via_web_form' => null,
        'beta_banks_enabled' => null,
        'category_restrictions_enabled' => null,
        'category_restrictions' => null,
        'cors_allowed_origins' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'pfm_services_enabled' => false,
		'is_automatic_batch_update_enabled' => false,
		'is_development_mode_enabled' => false,
		'is_non_euro_accounts_supported' => false,
		'is_auto_categorization_enabled' => false,
		'mandator_license' => false,
		'preferred_consent_type' => false,
		'user_notification_callback_url' => false,
		'user_synchronization_callback_url' => false,
		'refresh_tokens_validity_period' => false,
		'user_access_tokens_validity_period' => false,
		'client_access_tokens_validity_period' => false,
		'max_user_login_attempts' => false,
		'transaction_import_limitation' => false,
		'is_user_auto_verification_enabled' => false,
		'is_mandator_admin' => false,
		'is_web_scraping_enabled' => false,
		'payments_enabled' => false,
		'is_standalone_payments_enabled' => false,
		'available_bank_groups' => false,
		'products' => false,
		'fin_ts_product_registration_number' => false,
		'ais_via_web_form' => false,
		'pis_via_web_form' => false,
		'pis_standalone_via_web_form' => false,
		'beta_banks_enabled' => false,
		'category_restrictions_enabled' => false,
		'category_restrictions' => false,
		'cors_allowed_origins' => false
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
        'pfm_services_enabled' => 'pfmServicesEnabled',
        'is_automatic_batch_update_enabled' => 'isAutomaticBatchUpdateEnabled',
        'is_development_mode_enabled' => 'isDevelopmentModeEnabled',
        'is_non_euro_accounts_supported' => 'isNonEuroAccountsSupported',
        'is_auto_categorization_enabled' => 'isAutoCategorizationEnabled',
        'mandator_license' => 'mandatorLicense',
        'preferred_consent_type' => 'preferredConsentType',
        'user_notification_callback_url' => 'userNotificationCallbackUrl',
        'user_synchronization_callback_url' => 'userSynchronizationCallbackUrl',
        'refresh_tokens_validity_period' => 'refreshTokensValidityPeriod',
        'user_access_tokens_validity_period' => 'userAccessTokensValidityPeriod',
        'client_access_tokens_validity_period' => 'clientAccessTokensValidityPeriod',
        'max_user_login_attempts' => 'maxUserLoginAttempts',
        'transaction_import_limitation' => 'transactionImportLimitation',
        'is_user_auto_verification_enabled' => 'isUserAutoVerificationEnabled',
        'is_mandator_admin' => 'isMandatorAdmin',
        'is_web_scraping_enabled' => 'isWebScrapingEnabled',
        'payments_enabled' => 'paymentsEnabled',
        'is_standalone_payments_enabled' => 'isStandalonePaymentsEnabled',
        'available_bank_groups' => 'availableBankGroups',
        'products' => 'products',
        'fin_ts_product_registration_number' => 'finTSProductRegistrationNumber',
        'ais_via_web_form' => 'aisViaWebForm',
        'pis_via_web_form' => 'pisViaWebForm',
        'pis_standalone_via_web_form' => 'pisStandaloneViaWebForm',
        'beta_banks_enabled' => 'betaBanksEnabled',
        'category_restrictions_enabled' => 'categoryRestrictionsEnabled',
        'category_restrictions' => 'categoryRestrictions',
        'cors_allowed_origins' => 'corsAllowedOrigins'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'pfm_services_enabled' => 'setPfmServicesEnabled',
        'is_automatic_batch_update_enabled' => 'setIsAutomaticBatchUpdateEnabled',
        'is_development_mode_enabled' => 'setIsDevelopmentModeEnabled',
        'is_non_euro_accounts_supported' => 'setIsNonEuroAccountsSupported',
        'is_auto_categorization_enabled' => 'setIsAutoCategorizationEnabled',
        'mandator_license' => 'setMandatorLicense',
        'preferred_consent_type' => 'setPreferredConsentType',
        'user_notification_callback_url' => 'setUserNotificationCallbackUrl',
        'user_synchronization_callback_url' => 'setUserSynchronizationCallbackUrl',
        'refresh_tokens_validity_period' => 'setRefreshTokensValidityPeriod',
        'user_access_tokens_validity_period' => 'setUserAccessTokensValidityPeriod',
        'client_access_tokens_validity_period' => 'setClientAccessTokensValidityPeriod',
        'max_user_login_attempts' => 'setMaxUserLoginAttempts',
        'transaction_import_limitation' => 'setTransactionImportLimitation',
        'is_user_auto_verification_enabled' => 'setIsUserAutoVerificationEnabled',
        'is_mandator_admin' => 'setIsMandatorAdmin',
        'is_web_scraping_enabled' => 'setIsWebScrapingEnabled',
        'payments_enabled' => 'setPaymentsEnabled',
        'is_standalone_payments_enabled' => 'setIsStandalonePaymentsEnabled',
        'available_bank_groups' => 'setAvailableBankGroups',
        'products' => 'setProducts',
        'fin_ts_product_registration_number' => 'setFinTsProductRegistrationNumber',
        'ais_via_web_form' => 'setAisViaWebForm',
        'pis_via_web_form' => 'setPisViaWebForm',
        'pis_standalone_via_web_form' => 'setPisStandaloneViaWebForm',
        'beta_banks_enabled' => 'setBetaBanksEnabled',
        'category_restrictions_enabled' => 'setCategoryRestrictionsEnabled',
        'category_restrictions' => 'setCategoryRestrictions',
        'cors_allowed_origins' => 'setCorsAllowedOrigins'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'pfm_services_enabled' => 'getPfmServicesEnabled',
        'is_automatic_batch_update_enabled' => 'getIsAutomaticBatchUpdateEnabled',
        'is_development_mode_enabled' => 'getIsDevelopmentModeEnabled',
        'is_non_euro_accounts_supported' => 'getIsNonEuroAccountsSupported',
        'is_auto_categorization_enabled' => 'getIsAutoCategorizationEnabled',
        'mandator_license' => 'getMandatorLicense',
        'preferred_consent_type' => 'getPreferredConsentType',
        'user_notification_callback_url' => 'getUserNotificationCallbackUrl',
        'user_synchronization_callback_url' => 'getUserSynchronizationCallbackUrl',
        'refresh_tokens_validity_period' => 'getRefreshTokensValidityPeriod',
        'user_access_tokens_validity_period' => 'getUserAccessTokensValidityPeriod',
        'client_access_tokens_validity_period' => 'getClientAccessTokensValidityPeriod',
        'max_user_login_attempts' => 'getMaxUserLoginAttempts',
        'transaction_import_limitation' => 'getTransactionImportLimitation',
        'is_user_auto_verification_enabled' => 'getIsUserAutoVerificationEnabled',
        'is_mandator_admin' => 'getIsMandatorAdmin',
        'is_web_scraping_enabled' => 'getIsWebScrapingEnabled',
        'payments_enabled' => 'getPaymentsEnabled',
        'is_standalone_payments_enabled' => 'getIsStandalonePaymentsEnabled',
        'available_bank_groups' => 'getAvailableBankGroups',
        'products' => 'getProducts',
        'fin_ts_product_registration_number' => 'getFinTsProductRegistrationNumber',
        'ais_via_web_form' => 'getAisViaWebForm',
        'pis_via_web_form' => 'getPisViaWebForm',
        'pis_standalone_via_web_form' => 'getPisStandaloneViaWebForm',
        'beta_banks_enabled' => 'getBetaBanksEnabled',
        'category_restrictions_enabled' => 'getCategoryRestrictionsEnabled',
        'category_restrictions' => 'getCategoryRestrictions',
        'cors_allowed_origins' => 'getCorsAllowedOrigins'
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
        $this->setIfExists('pfm_services_enabled', $data ?? [], null);
        $this->setIfExists('is_automatic_batch_update_enabled', $data ?? [], null);
        $this->setIfExists('is_development_mode_enabled', $data ?? [], null);
        $this->setIfExists('is_non_euro_accounts_supported', $data ?? [], null);
        $this->setIfExists('is_auto_categorization_enabled', $data ?? [], null);
        $this->setIfExists('mandator_license', $data ?? [], null);
        $this->setIfExists('preferred_consent_type', $data ?? [], null);
        $this->setIfExists('user_notification_callback_url', $data ?? [], null);
        $this->setIfExists('user_synchronization_callback_url', $data ?? [], null);
        $this->setIfExists('refresh_tokens_validity_period', $data ?? [], null);
        $this->setIfExists('user_access_tokens_validity_period', $data ?? [], null);
        $this->setIfExists('client_access_tokens_validity_period', $data ?? [], null);
        $this->setIfExists('max_user_login_attempts', $data ?? [], null);
        $this->setIfExists('transaction_import_limitation', $data ?? [], null);
        $this->setIfExists('is_user_auto_verification_enabled', $data ?? [], null);
        $this->setIfExists('is_mandator_admin', $data ?? [], null);
        $this->setIfExists('is_web_scraping_enabled', $data ?? [], null);
        $this->setIfExists('payments_enabled', $data ?? [], null);
        $this->setIfExists('is_standalone_payments_enabled', $data ?? [], null);
        $this->setIfExists('available_bank_groups', $data ?? [], null);
        $this->setIfExists('products', $data ?? [], null);
        $this->setIfExists('fin_ts_product_registration_number', $data ?? [], null);
        $this->setIfExists('ais_via_web_form', $data ?? [], null);
        $this->setIfExists('pis_via_web_form', $data ?? [], null);
        $this->setIfExists('pis_standalone_via_web_form', $data ?? [], null);
        $this->setIfExists('beta_banks_enabled', $data ?? [], null);
        $this->setIfExists('category_restrictions_enabled', $data ?? [], null);
        $this->setIfExists('category_restrictions', $data ?? [], null);
        $this->setIfExists('cors_allowed_origins', $data ?? [], null);
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

        if ($this->container['pfm_services_enabled'] === null) {
            $invalidProperties[] = "'pfm_services_enabled' can't be null";
        }
        if ($this->container['is_automatic_batch_update_enabled'] === null) {
            $invalidProperties[] = "'is_automatic_batch_update_enabled' can't be null";
        }
        if ($this->container['is_development_mode_enabled'] === null) {
            $invalidProperties[] = "'is_development_mode_enabled' can't be null";
        }
        if ($this->container['is_non_euro_accounts_supported'] === null) {
            $invalidProperties[] = "'is_non_euro_accounts_supported' can't be null";
        }
        if ($this->container['is_auto_categorization_enabled'] === null) {
            $invalidProperties[] = "'is_auto_categorization_enabled' can't be null";
        }
        if ($this->container['mandator_license'] === null) {
            $invalidProperties[] = "'mandator_license' can't be null";
        }
        if ($this->container['preferred_consent_type'] === null) {
            $invalidProperties[] = "'preferred_consent_type' can't be null";
        }
        if ($this->container['refresh_tokens_validity_period'] === null) {
            $invalidProperties[] = "'refresh_tokens_validity_period' can't be null";
        }
        if ($this->container['user_access_tokens_validity_period'] === null) {
            $invalidProperties[] = "'user_access_tokens_validity_period' can't be null";
        }
        if ($this->container['client_access_tokens_validity_period'] === null) {
            $invalidProperties[] = "'client_access_tokens_validity_period' can't be null";
        }
        if ($this->container['max_user_login_attempts'] === null) {
            $invalidProperties[] = "'max_user_login_attempts' can't be null";
        }
        if ($this->container['transaction_import_limitation'] === null) {
            $invalidProperties[] = "'transaction_import_limitation' can't be null";
        }
        if ($this->container['is_user_auto_verification_enabled'] === null) {
            $invalidProperties[] = "'is_user_auto_verification_enabled' can't be null";
        }
        if ($this->container['is_mandator_admin'] === null) {
            $invalidProperties[] = "'is_mandator_admin' can't be null";
        }
        if ($this->container['is_web_scraping_enabled'] === null) {
            $invalidProperties[] = "'is_web_scraping_enabled' can't be null";
        }
        if ($this->container['payments_enabled'] === null) {
            $invalidProperties[] = "'payments_enabled' can't be null";
        }
        if ($this->container['is_standalone_payments_enabled'] === null) {
            $invalidProperties[] = "'is_standalone_payments_enabled' can't be null";
        }
        if ($this->container['available_bank_groups'] === null) {
            $invalidProperties[] = "'available_bank_groups' can't be null";
        }
        if ($this->container['products'] === null) {
            $invalidProperties[] = "'products' can't be null";
        }
        if ($this->container['ais_via_web_form'] === null) {
            $invalidProperties[] = "'ais_via_web_form' can't be null";
        }
        if ($this->container['pis_via_web_form'] === null) {
            $invalidProperties[] = "'pis_via_web_form' can't be null";
        }
        if ($this->container['pis_standalone_via_web_form'] === null) {
            $invalidProperties[] = "'pis_standalone_via_web_form' can't be null";
        }
        if ($this->container['beta_banks_enabled'] === null) {
            $invalidProperties[] = "'beta_banks_enabled' can't be null";
        }
        if ($this->container['category_restrictions_enabled'] === null) {
            $invalidProperties[] = "'category_restrictions_enabled' can't be null";
        }
        if ($this->container['category_restrictions'] === null) {
            $invalidProperties[] = "'category_restrictions' can't be null";
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
     * Gets pfm_services_enabled
     *
     * @return bool
     */
    public function getPfmServicesEnabled()
    {
        return $this->container['pfm_services_enabled'];
    }

    /**
     * Sets pfm_services_enabled
     *
     * @param bool $pfm_services_enabled Whether your client is allowed to call PFM services (Personal Finance Management). The set of PFM services is the following:<br/><br/>&bull; all /mandatorAdmin/ibanRules/_* and /mandatorAdmin/keywordRules/_* services<br/>&bull; GET /accounts/dailyBalances<br/>&bull; all /transactions/_* services, except for GET /transactions/[id(s)] and DELETE /transactions/[id]<br/>&bull; all /categories/_* services, except for GET /categories/[id(s)]<br/>&bull; all /labels/_* services<br/>&bull; all /notificationRules/_* services<br/>&bull; all /tests/_* services
     *
     * @return self
     */
    public function setPfmServicesEnabled($pfm_services_enabled)
    {

        if (is_null($pfm_services_enabled)) {
            throw new \InvalidArgumentException('non-nullable pfm_services_enabled cannot be null');
        }

        $this->container['pfm_services_enabled'] = $pfm_services_enabled;

        return $this;
    }

    /**
     * Gets is_automatic_batch_update_enabled
     *
     * @return bool
     */
    public function getIsAutomaticBatchUpdateEnabled()
    {
        return $this->container['is_automatic_batch_update_enabled'];
    }

    /**
     * Sets is_automatic_batch_update_enabled
     *
     * @param bool $is_automatic_batch_update_enabled Whether finAPI performs a regular automatic update of your users' bank connections. To find out how the automatic batch update is configured for your client, i.e. which bank connections get updated, and at which time and interval, please contact your Sys-Admin. Note that even if the automatic batch update is enabled for your client, individual users can still disable the feature for their own bank connections.
     *
     * @return self
     */
    public function setIsAutomaticBatchUpdateEnabled($is_automatic_batch_update_enabled)
    {

        if (is_null($is_automatic_batch_update_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_automatic_batch_update_enabled cannot be null');
        }

        $this->container['is_automatic_batch_update_enabled'] = $is_automatic_batch_update_enabled;

        return $this;
    }

    /**
     * Gets is_development_mode_enabled
     *
     * @return bool
     */
    public function getIsDevelopmentModeEnabled()
    {
        return $this->container['is_development_mode_enabled'];
    }

    /**
     * Sets is_development_mode_enabled
     *
     * @param bool $is_development_mode_enabled Whether development mode is enabled. This setting is enabled on mandator level and allows any user to access the 'Mock batch update' service. <br/><br/>NOTE: This flag is meant for testing purposes during development of your application. <br/>This is why this will never be enabled on a production environment.
     *
     * @return self
     */
    public function setIsDevelopmentModeEnabled($is_development_mode_enabled)
    {

        if (is_null($is_development_mode_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_development_mode_enabled cannot be null');
        }

        $this->container['is_development_mode_enabled'] = $is_development_mode_enabled;

        return $this;
    }

    /**
     * Gets is_non_euro_accounts_supported
     *
     * @return bool
     */
    public function getIsNonEuroAccountsSupported()
    {
        return $this->container['is_non_euro_accounts_supported'];
    }

    /**
     * Sets is_non_euro_accounts_supported
     *
     * @param bool $is_non_euro_accounts_supported Whether finAPI will download data (balance and transactions) for bank accounts with a currency other than EUR (affects all users). If this flag is false, then non-EUR accounts will still be returned in the account list, but they will have no balance and no transactions. Note that this currently applies to Checking accounts only.
     *
     * @return self
     */
    public function setIsNonEuroAccountsSupported($is_non_euro_accounts_supported)
    {

        if (is_null($is_non_euro_accounts_supported)) {
            throw new \InvalidArgumentException('non-nullable is_non_euro_accounts_supported cannot be null');
        }

        $this->container['is_non_euro_accounts_supported'] = $is_non_euro_accounts_supported;

        return $this;
    }

    /**
     * Gets is_auto_categorization_enabled
     *
     * @return bool
     */
    public function getIsAutoCategorizationEnabled()
    {
        return $this->container['is_auto_categorization_enabled'];
    }

    /**
     * Sets is_auto_categorization_enabled
     *
     * @param bool $is_auto_categorization_enabled Whether transactions will be categorized as soon as they are downloaded. <br/>In case this flag is false, the user needs to manually trigger categorization using the 'Trigger categorization' service.
     *
     * @return self
     */
    public function setIsAutoCategorizationEnabled($is_auto_categorization_enabled)
    {

        if (is_null($is_auto_categorization_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_auto_categorization_enabled cannot be null');
        }

        $this->container['is_auto_categorization_enabled'] = $is_auto_categorization_enabled;

        return $this;
    }

    /**
     * Gets mandator_license
     *
     * @return MandatorLicense
     */
    public function getMandatorLicense()
    {
        return $this->container['mandator_license'];
    }

    /**
     * Sets mandator_license
     *
     * @param MandatorLicense $mandator_license <strong>Type:</strong> MandatorLicense<br/> The license associated with your client. <br/>The licensing model affects the TPP registration data used to connect to the bank (e.g. <b>finTSProductRegistrationNumber</b> for FINTS_SERVER interface). Licenses are administered by finAPI. Please contact the support to change the license that was set up for you.<br/>Possible values are:<br/>UNLICENSED: finAPI will use its own TPP registration to connect to the bank for both account information services (AIS) and payment initiation services (PIS).<br/>AISP: finAPI will use its own TPP registration to connect to the bank for PIS, and your registration for AIS.<br/>PISP: finAPI will use its own TPP registration to connect to the bank for AIS, and your registration for PIS.<br/>FULLY_LICENSED: finAPI will use your TPP registration to connect to the bank for both AIS and PIS.
     *
     * @return self
     */
    public function setMandatorLicense($mandator_license)
    {

        if (is_null($mandator_license)) {
            throw new \InvalidArgumentException('non-nullable mandator_license cannot be null');
        }

        $this->container['mandator_license'] = $mandator_license;

        return $this;
    }

    /**
     * Gets preferred_consent_type
     *
     * @return PreferredConsentType
     */
    public function getPreferredConsentType()
    {
        return $this->container['preferred_consent_type'];
    }

    /**
     * Sets preferred_consent_type
     *
     * @param PreferredConsentType $preferred_consent_type <strong>Type:</strong> PreferredConsentType<br/> The preferred consent type that will be used for the XS2A interface.<br/><br/>&bull; <b>ONETIME</b> - The consent can only be used once to download data associated with the account. The consent won’t be saved by finAPI.<br/>&bull; <b>RECURRING</b> - The consent is valid for up to 90 days and can be used by finAPI to access and download account data for up to 4 times per day.<br/><br/>NOTE: If the bank does not support the preferred consent type, then finAPI will default to the other type.
     *
     * @return self
     */
    public function setPreferredConsentType($preferred_consent_type)
    {

        if (is_null($preferred_consent_type)) {
            throw new \InvalidArgumentException('non-nullable preferred_consent_type cannot be null');
        }

        $this->container['preferred_consent_type'] = $preferred_consent_type;

        return $this;
    }

    /**
     * Gets user_notification_callback_url
     *
     * @return string|null
     */
    public function getUserNotificationCallbackUrl()
    {
        return $this->container['user_notification_callback_url'];
    }

    /**
     * Sets user_notification_callback_url
     *
     * @param string|null $user_notification_callback_url Callback URL to which finAPI sends the notification messages that are triggered from the automatic batch update of the users' bank connections. This field is only relevant if the automatic batch update is enabled for your client. For details about what the notification messages look like, please see the documentation in the 'Notification Rules' section. finAPI will call this URL with HTTP method POST. Note that the response of the call is not processed by finAPI. Also note that while the callback URL may be a non-secured (http) URL on the finAPI sandbox or alpha environment, it MUST be a SSL-secured (https) URL on the finAPI live system.
     *
     * @return self
     */
    public function setUserNotificationCallbackUrl($user_notification_callback_url)
    {

        if (is_null($user_notification_callback_url)) {
            throw new \InvalidArgumentException('non-nullable user_notification_callback_url cannot be null');
        }

        $this->container['user_notification_callback_url'] = $user_notification_callback_url;

        return $this;
    }

    /**
     * Gets user_synchronization_callback_url
     *
     * @return string|null
     */
    public function getUserSynchronizationCallbackUrl()
    {
        return $this->container['user_synchronization_callback_url'];
    }

    /**
     * Sets user_synchronization_callback_url
     *
     * @param string|null $user_synchronization_callback_url Callback URL for user synchronization. This field should be set if you - as a finAPI customer - have multiple clients using finAPI. In such case, all of your clients will share the same user base, making it possible for a user to be created in one client, but then deleted in another. To keep the client-side user data consistent in all clients, you should set a callback URL for each client. finAPI will send a notification to the callback URL of each client whenever a user of your user base gets deleted. Note that finAPI will send a deletion notification to ALL clients, including the one that made the user deletion request to finAPI. So when deleting a user in finAPI, a client should rely on the callback to delete the user on its own side. <p>The notification that finAPI sends to the clients' callback URLs will be a POST request, with this body: <pre>{    \"userId\" : string // contains the identifier of the deleted user    \"event\" : string // this will always be \"DELETED\" }</pre><br/>Note that finAPI does not process the response of this call. Also note that while the callback URL may be a non-secured (http) URL on the finAPI sandbox or alpha environment, it MUST be a SSL-secured (https) URL on the finAPI live system.</p>As long as you have just one client, you can ignore this field and let it be null. However keep in mind that in this case your client will not receive any callback when a user gets deleted - so the deletion of the user on the client-side must not be forgotten. Of course you may still use the callback URL even for just one client, if you want to implement the deletion of the user on the client-side via the callback from finAPI.
     *
     * @return self
     */
    public function setUserSynchronizationCallbackUrl($user_synchronization_callback_url)
    {

        if (is_null($user_synchronization_callback_url)) {
            throw new \InvalidArgumentException('non-nullable user_synchronization_callback_url cannot be null');
        }

        $this->container['user_synchronization_callback_url'] = $user_synchronization_callback_url;

        return $this;
    }

    /**
     * Gets refresh_tokens_validity_period
     *
     * @return int
     */
    public function getRefreshTokensValidityPeriod()
    {
        return $this->container['refresh_tokens_validity_period'];
    }

    /**
     * Sets refresh_tokens_validity_period
     *
     * @param int $refresh_tokens_validity_period The validity period that newly requested refresh tokens initially have (in seconds). A value of 0 means that the tokens never expire (Unless explicitly invalidated, e.g. by revocation, or when a user gets locked, or when the password is reset for a user).
     *
     * @return self
     */
    public function setRefreshTokensValidityPeriod($refresh_tokens_validity_period)
    {

        if (is_null($refresh_tokens_validity_period)) {
            throw new \InvalidArgumentException('non-nullable refresh_tokens_validity_period cannot be null');
        }

        $this->container['refresh_tokens_validity_period'] = $refresh_tokens_validity_period;

        return $this;
    }

    /**
     * Gets user_access_tokens_validity_period
     *
     * @return int
     */
    public function getUserAccessTokensValidityPeriod()
    {
        return $this->container['user_access_tokens_validity_period'];
    }

    /**
     * Sets user_access_tokens_validity_period
     *
     * @param int $user_access_tokens_validity_period The validity period that newly requested access tokens for users initially have (in seconds). A value of 0 means that the tokens never expire (Unless explicitly invalidated, e.g. by revocation, or when a user gets locked, or when the password is reset for a user).
     *
     * @return self
     */
    public function setUserAccessTokensValidityPeriod($user_access_tokens_validity_period)
    {

        if (is_null($user_access_tokens_validity_period)) {
            throw new \InvalidArgumentException('non-nullable user_access_tokens_validity_period cannot be null');
        }

        $this->container['user_access_tokens_validity_period'] = $user_access_tokens_validity_period;

        return $this;
    }

    /**
     * Gets client_access_tokens_validity_period
     *
     * @return int
     */
    public function getClientAccessTokensValidityPeriod()
    {
        return $this->container['client_access_tokens_validity_period'];
    }

    /**
     * Sets client_access_tokens_validity_period
     *
     * @param int $client_access_tokens_validity_period The validity period that newly requested access tokens for clients initially have (in seconds). A value of 0 means that the tokens never expire (Unless explicitly invalidated, e.g. by revocation).
     *
     * @return self
     */
    public function setClientAccessTokensValidityPeriod($client_access_tokens_validity_period)
    {

        if (is_null($client_access_tokens_validity_period)) {
            throw new \InvalidArgumentException('non-nullable client_access_tokens_validity_period cannot be null');
        }

        $this->container['client_access_tokens_validity_period'] = $client_access_tokens_validity_period;

        return $this;
    }

    /**
     * Gets max_user_login_attempts
     *
     * @return int
     */
    public function getMaxUserLoginAttempts()
    {
        return $this->container['max_user_login_attempts'];
    }

    /**
     * Sets max_user_login_attempts
     *
     * @param int $max_user_login_attempts Number of consecutive failed login attempts of a user into his finAPI account that is allowed before finAPI locks the user's account. When a user's account is locked, finAPI will invalidate all user's tokens and it will deny any service call in the context of this user (i.e. any call to a service using one of the user's authorization tokens, as well as the service for requesting a new token for this user). To unlock a user's account, a new password must be set for the account by the client (see the services /users/requestPasswordChange and /users/executePasswordChange). Once a new password has been set, all services will be available again for this user and the user's failed login attempts counter is reset to 0. The user's failed login attempts counter is also reset whenever a new authorization token has been successfully retrieved, or whenever the user himself changes his password.<br/><br/>Note that when this field has a value of 0, it means that there is no limit for user login attempts, i.e. finAPI will never lock user accounts.
     *
     * @return self
     */
    public function setMaxUserLoginAttempts($max_user_login_attempts)
    {

        if (is_null($max_user_login_attempts)) {
            throw new \InvalidArgumentException('non-nullable max_user_login_attempts cannot be null');
        }

        $this->container['max_user_login_attempts'] = $max_user_login_attempts;

        return $this;
    }

    /**
     * Gets transaction_import_limitation
     *
     * @return int
     */
    public function getTransactionImportLimitation()
    {
        return $this->container['transaction_import_limitation'];
    }

    /**
     * Sets transaction_import_limitation
     *
     * @param int $transaction_import_limitation This setting defines the upper limit of how much of an account's transactions history may get downloaded whenever a new account is imported, across all of your users. More technically, it depicts the maximum number of days for which transactions might get downloaded, starting from - and including - the date of the account import. '0' means that there is no limitation.
     *
     * @return self
     */
    public function setTransactionImportLimitation($transaction_import_limitation)
    {

        if (is_null($transaction_import_limitation)) {
            throw new \InvalidArgumentException('non-nullable transaction_import_limitation cannot be null');
        }

        $this->container['transaction_import_limitation'] = $transaction_import_limitation;

        return $this;
    }

    /**
     * Gets is_user_auto_verification_enabled
     *
     * @return bool
     */
    public function getIsUserAutoVerificationEnabled()
    {
        return $this->container['is_user_auto_verification_enabled'];
    }

    /**
     * Sets is_user_auto_verification_enabled
     *
     * @param bool $is_user_auto_verification_enabled Whether users that are created with this client are automatically verified on creation. If this field is set to 'false', then any user that is created with this client must first be verified with the \"Verify a user\" service before he can be authorized. If the field is 'true', then no verification is required by the client and the user can be authorized immediately after creation.
     *
     * @return self
     */
    public function setIsUserAutoVerificationEnabled($is_user_auto_verification_enabled)
    {

        if (is_null($is_user_auto_verification_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_user_auto_verification_enabled cannot be null');
        }

        $this->container['is_user_auto_verification_enabled'] = $is_user_auto_verification_enabled;

        return $this;
    }

    /**
     * Gets is_mandator_admin
     *
     * @return bool
     */
    public function getIsMandatorAdmin()
    {
        return $this->container['is_mandator_admin'];
    }

    /**
     * Sets is_mandator_admin
     *
     * @param bool $is_mandator_admin Whether this client is a 'Mandator Admin'. Mandator Admins are special clients that can access the 'Mandator Administration' section of finAPI. If you do not yet have credentials for a Mandator Admin, please contact us at support@finapi.io. For further information, please refer to <a href='https://documentation.finapi.io/access/Application-management.2763423767.html' target='_blank'>this page</a> on our Access Public Documentation.
     *
     * @return self
     */
    public function setIsMandatorAdmin($is_mandator_admin)
    {

        if (is_null($is_mandator_admin)) {
            throw new \InvalidArgumentException('non-nullable is_mandator_admin cannot be null');
        }

        $this->container['is_mandator_admin'] = $is_mandator_admin;

        return $this;
    }

    /**
     * Gets is_web_scraping_enabled
     *
     * @return bool
     */
    public function getIsWebScrapingEnabled()
    {
        return $this->container['is_web_scraping_enabled'];
    }

    /**
     * Sets is_web_scraping_enabled
     *
     * @param bool $is_web_scraping_enabled Whether finAPI is allowed to use the WEB_SCRAPER interface for data download or payments. <br/><br/>If this field is set to 'true', then finAPI might download data from the online banking websites of banks (either in addition to other interfaces, or as the sole data source for the download). Also, it will be possible to do payments via the WEB_SCRAPER interface.<br/><br/>If this field is set to 'false', then finAPI will not use any web scrapers. Payments via the WEB_SCRAPER interface will not be possible, and finAPI will not allow any data download for banks where no other interface except WEB_SCRAPER is available. <br/><br/>Please contact your Sys-Admin if you want to change this setting.
     *
     * @return self
     */
    public function setIsWebScrapingEnabled($is_web_scraping_enabled)
    {

        if (is_null($is_web_scraping_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_web_scraping_enabled cannot be null');
        }

        $this->container['is_web_scraping_enabled'] = $is_web_scraping_enabled;

        return $this;
    }

    /**
     * Gets payments_enabled
     *
     * @return bool
     */
    public function getPaymentsEnabled()
    {
        return $this->container['payments_enabled'];
    }

    /**
     * Sets payments_enabled
     *
     * @param bool $payments_enabled Whether this client is allowed to do PIS.<br/><br/>Note that on the Sandbox environment, it is always possible to execute payments (regardless of what this field says), as long as you are using a test bank (see Bank.isTestBank)
     *
     * @return self
     */
    public function setPaymentsEnabled($payments_enabled)
    {

        if (is_null($payments_enabled)) {
            throw new \InvalidArgumentException('non-nullable payments_enabled cannot be null');
        }

        $this->container['payments_enabled'] = $payments_enabled;

        return $this;
    }

    /**
     * Gets is_standalone_payments_enabled
     *
     * @return bool
     */
    public function getIsStandalonePaymentsEnabled()
    {
        return $this->container['is_standalone_payments_enabled'];
    }

    /**
     * Sets is_standalone_payments_enabled
     *
     * @param bool $is_standalone_payments_enabled Whether this client is allowed to do standalone PIS (doing money transfers and standing orders for accounts that are not imported in finAPI).<br/><br/>Note that on the Sandbox environment, it is always possible to execute payments and standing orders (regardless of what this field says), as long as you are using a test bank (see Bank.isTestBank)
     *
     * @return self
     */
    public function setIsStandalonePaymentsEnabled($is_standalone_payments_enabled)
    {

        if (is_null($is_standalone_payments_enabled)) {
            throw new \InvalidArgumentException('non-nullable is_standalone_payments_enabled cannot be null');
        }

        $this->container['is_standalone_payments_enabled'] = $is_standalone_payments_enabled;

        return $this;
    }

    /**
     * Gets available_bank_groups
     *
     * @return string[]
     */
    public function getAvailableBankGroups()
    {
        return $this->container['available_bank_groups'];
    }

    /**
     * Sets available_bank_groups
     *
     * @param string[] $available_bank_groups available_bank_groups
     *
     * @return self
     */
    public function setAvailableBankGroups($available_bank_groups)
    {

        if (is_null($available_bank_groups)) {
            throw new \InvalidArgumentException('non-nullable available_bank_groups cannot be null');
        }

        $this->container['available_bank_groups'] = $available_bank_groups;

        return $this;
    }

    /**
     * Gets products
     *
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->container['products'];
    }

    /**
     * Sets products
     *
     * @param Product[] $products products
     *
     * @return self
     */
    public function setProducts($products)
    {



        if (is_null($products)) {
            throw new \InvalidArgumentException('non-nullable products cannot be null');
        }

        $this->container['products'] = $products;

        return $this;
    }

    /**
     * Gets fin_ts_product_registration_number
     *
     * @return string|null
     */
    public function getFinTsProductRegistrationNumber()
    {
        return $this->container['fin_ts_product_registration_number'];
    }

    /**
     * Sets fin_ts_product_registration_number
     *
     * @param string|null $fin_ts_product_registration_number The FinTS product registration number. If a value is stored, this will always be 'XXXXX'.
     *
     * @return self
     */
    public function setFinTsProductRegistrationNumber($fin_ts_product_registration_number)
    {

        if (is_null($fin_ts_product_registration_number)) {
            throw new \InvalidArgumentException('non-nullable fin_ts_product_registration_number cannot be null');
        }

        $this->container['fin_ts_product_registration_number'] = $fin_ts_product_registration_number;

        return $this;
    }

    /**
     * Gets ais_via_web_form
     *
     * @return bool
     */
    public function getAisViaWebForm()
    {
        return $this->container['ais_via_web_form'];
    }

    /**
     * Sets ais_via_web_form
     *
     * @param bool $ais_via_web_form Whether you must use finAPI's Web Form for Account Information Services. See: https://documentation.finapi.io/webform/Introduction.2038136860.html
     *
     * @return self
     */
    public function setAisViaWebForm($ais_via_web_form)
    {

        if (is_null($ais_via_web_form)) {
            throw new \InvalidArgumentException('non-nullable ais_via_web_form cannot be null');
        }

        $this->container['ais_via_web_form'] = $ais_via_web_form;

        return $this;
    }

    /**
     * Gets pis_via_web_form
     *
     * @return bool
     */
    public function getPisViaWebForm()
    {
        return $this->container['pis_via_web_form'];
    }

    /**
     * Sets pis_via_web_form
     *
     * @param bool $pis_via_web_form Whether you must use finAPI's Web Form for Standard Payment Initiation Services (Payments for accounts that have been imported in finAPI). See: https://documentation.finapi.io/webform/Introduction.2038136860.html
     *
     * @return self
     */
    public function setPisViaWebForm($pis_via_web_form)
    {

        if (is_null($pis_via_web_form)) {
            throw new \InvalidArgumentException('non-nullable pis_via_web_form cannot be null');
        }

        $this->container['pis_via_web_form'] = $pis_via_web_form;

        return $this;
    }

    /**
     * Gets pis_standalone_via_web_form
     *
     * @return bool
     */
    public function getPisStandaloneViaWebForm()
    {
        return $this->container['pis_standalone_via_web_form'];
    }

    /**
     * Sets pis_standalone_via_web_form
     *
     * @param bool $pis_standalone_via_web_form Whether you must use finAPI's Web Form for Standalone Payment Initiation Services (Payments without account import). See: https://documentation.finapi.io/webform/Introduction.2038136860.html
     *
     * @return self
     */
    public function setPisStandaloneViaWebForm($pis_standalone_via_web_form)
    {

        if (is_null($pis_standalone_via_web_form)) {
            throw new \InvalidArgumentException('non-nullable pis_standalone_via_web_form cannot be null');
        }

        $this->container['pis_standalone_via_web_form'] = $pis_standalone_via_web_form;

        return $this;
    }

    /**
     * Gets beta_banks_enabled
     *
     * @return bool
     */
    public function getBetaBanksEnabled()
    {
        return $this->container['beta_banks_enabled'];
    }

    /**
     * Sets beta_banks_enabled
     *
     * @param bool $beta_banks_enabled Whether the set of banks that are available to your client contains \"Beta banks\". Beta banks provide pre-release interfaces that are still in a beta phase. Communication to the bank via such interfaces might be unstable, and the correctness and/or quality of data delivery or payment execution cannot be guaranteed.<br/>As the word \"BETA\" already indicates, Beta banks are subject to changes. Their properties, as well as their behaviour can change based on continuous tests and customer feedback. Also, to keep our bank list clean, we might remove Beta banks at any point in time, including all related user data (bank connections, accounts, transactions etc). We still recommend you to enable beta banks in your application, because it enables us to release a stable interface faster. However, you should point it out to your users when using a beta bank (also see field Bank.isBeta).<br/><br/>If this field is true, then the GET /banks services will include beta banks in their results, and you can use beta banks in any service where you can pass a bank identifier. If the field is false, then beta banks will not exist for your client.
     *
     * @return self
     */
    public function setBetaBanksEnabled($beta_banks_enabled)
    {

        if (is_null($beta_banks_enabled)) {
            throw new \InvalidArgumentException('non-nullable beta_banks_enabled cannot be null');
        }

        $this->container['beta_banks_enabled'] = $beta_banks_enabled;

        return $this;
    }

    /**
     * Gets category_restrictions_enabled
     *
     * @return bool
     */
    public function getCategoryRestrictionsEnabled()
    {
        return $this->container['category_restrictions_enabled'];
    }

    /**
     * Sets category_restrictions_enabled
     *
     * @param bool $category_restrictions_enabled Whether category restrictions are applied to your client. If true, transaction access is restricted to the categories contained in the ‘categoryRestrictions’ list. If false, then there are no restrictions for your client, and you may retrieve the full set of imported transactions.
     *
     * @return self
     */
    public function setCategoryRestrictionsEnabled($category_restrictions_enabled)
    {

        if (is_null($category_restrictions_enabled)) {
            throw new \InvalidArgumentException('non-nullable category_restrictions_enabled cannot be null');
        }

        $this->container['category_restrictions_enabled'] = $category_restrictions_enabled;

        return $this;
    }

    /**
     * Gets category_restrictions
     *
     * @return \OpenAPIAccess\Client\Model\Category[]
     */
    public function getCategoryRestrictions()
    {
        return $this->container['category_restrictions'];
    }

    /**
     * Sets category_restrictions
     *
     * @param \OpenAPIAccess\Client\Model\Category[] $category_restrictions <strong>Type:</strong> Category<br/> Defines the set of transaction categories to which your client is restricted. This field is only relevant if the 'categoryRestrictionsEnabled' flag is set to true. In this case, when retrieving transactions (via the GET /transactions services), you may request only those transactions whose 'category' is one of the listed categories. If the set is empty, you won’t be able to access any transactions.
     *
     * @return self
     */
    public function setCategoryRestrictions($category_restrictions)
    {

        if (is_null($category_restrictions)) {
            throw new \InvalidArgumentException('non-nullable category_restrictions cannot be null');
        }

        $this->container['category_restrictions'] = $category_restrictions;

        return $this;
    }

    /**
     * Gets cors_allowed_origins
     *
     * @return string[]|null
     */
    public function getCorsAllowedOrigins()
    {
        return $this->container['cors_allowed_origins'];
    }

    /**
     * Sets cors_allowed_origins
     *
     * @param string[]|null $cors_allowed_origins The list of allowed origins for cross-origin requests. The CORS configuration applies to all the API services except for the /oauth services. If this list is empty, then CORS is not enabled for this client. Please contact the support if you want to enable or change the client's CORS configuration.
     *
     * @return self
     */
    public function setCorsAllowedOrigins($cors_allowed_origins)
    {

        if (is_null($cors_allowed_origins)) {
            throw new \InvalidArgumentException('non-nullable cors_allowed_origins cannot be null');
        }

        $this->container['cors_allowed_origins'] = $cors_allowed_origins;

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


