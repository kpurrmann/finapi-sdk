<?php
/**
 * GenericReport
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * finAPI Data Intelligence RESTful Services
 *
 * The following pages give you some general information on how to use the API.  The actual API services documentation then follows further below. You can use the menu to jump between API sections.   This page has a built-in HTTP(S) client, so you can test the services directly from within this page, by filling in the request parameters and/or body in the respective services, and then hitting the TRY button. Note that you need to be authorized to make a successful API call. To authorize, refer to the 'Authorization' section of the API, or just use the OAUTH button that can be found near the TRY button.   You should also check out the Developer Portal for more information. If you need any help with the API, contact support@finapi.io   <sub>Application-Version: 1.582.0</sub>
 *
 * The version of the OpenAPI document: 2022.38.1
 * Contact: kontakt@finapi.io
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.2.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPIDataIntelligence\Client\Model;

use \ArrayAccess;
use \OpenAPIDataIntelligence\Client\ObjectSerializer;

/**
 * GenericReport Class Doc Comment
 *
 * @category Class
 * @description Returns the needed report
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class GenericReport implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'GenericReport';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'chargebacks' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'debt_collection' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'gambling' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'seizure' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'maximum_available_funds' => '\OpenAPIDataIntelligence\Client\Model\MaxAvailableFundsReportResource',
        'income' => '\OpenAPIDataIntelligence\Client\Model\IncomeReportResource',
        'spending' => '\OpenAPIDataIntelligence\Client\Model\SpendingReportResource',
        'rent_and_living' => '\OpenAPIDataIntelligence\Client\Model\RentReportResource',
        'insurance' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'bank_and_credit' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'savings' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'travel' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'health_and_wellness' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'b2b_balances' => '\OpenAPIDataIntelligence\Client\Model\B2BReportBalanceResource',
        'contracts_insurance' => '\OpenAPIDataIntelligence\Client\Model\ContractsReportResource',
        'contracts_loan' => '\OpenAPIDataIntelligence\Client\Model\ContractsReportResource',
        'contracts_electricity' => '\OpenAPIDataIntelligence\Client\Model\ContractsReportResource',
        'contracts_telecommunication' => '\OpenAPIDataIntelligence\Client\Model\ContractsReportResource',
        'contracts_gas' => '\OpenAPIDataIntelligence\Client\Model\ContractsReportResource',
        'schufa_credit_check' => '\OpenAPIDataIntelligence\Client\Model\SchufaCreditCheckReportResource',
        'tax' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'mobility' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'shopping' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource',
        'entertainment' => '\OpenAPIDataIntelligence\Client\Model\AllReportsResource'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'chargebacks' => null,
        'debt_collection' => null,
        'gambling' => null,
        'seizure' => null,
        'maximum_available_funds' => null,
        'income' => null,
        'spending' => null,
        'rent_and_living' => null,
        'insurance' => null,
        'bank_and_credit' => null,
        'savings' => null,
        'travel' => null,
        'health_and_wellness' => null,
        'b2b_balances' => null,
        'contracts_insurance' => null,
        'contracts_loan' => null,
        'contracts_electricity' => null,
        'contracts_telecommunication' => null,
        'contracts_gas' => null,
        'schufa_credit_check' => null,
        'tax' => null,
        'mobility' => null,
        'shopping' => null,
        'entertainment' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'chargebacks' => false,
		'debt_collection' => false,
		'gambling' => false,
		'seizure' => false,
		'maximum_available_funds' => false,
		'income' => false,
		'spending' => false,
		'rent_and_living' => false,
		'insurance' => false,
		'bank_and_credit' => false,
		'savings' => false,
		'travel' => false,
		'health_and_wellness' => false,
		'b2b_balances' => false,
		'contracts_insurance' => false,
		'contracts_loan' => false,
		'contracts_electricity' => false,
		'contracts_telecommunication' => false,
		'contracts_gas' => false,
		'schufa_credit_check' => false,
		'tax' => false,
		'mobility' => false,
		'shopping' => false,
		'entertainment' => false
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
        'chargebacks' => 'chargebacks',
        'debt_collection' => 'debtCollection',
        'gambling' => 'gambling',
        'seizure' => 'seizure',
        'maximum_available_funds' => 'maximumAvailableFunds',
        'income' => 'income',
        'spending' => 'spending',
        'rent_and_living' => 'rentAndLiving',
        'insurance' => 'insurance',
        'bank_and_credit' => 'bankAndCredit',
        'savings' => 'savings',
        'travel' => 'travel',
        'health_and_wellness' => 'healthAndWellness',
        'b2b_balances' => 'b2bBalances',
        'contracts_insurance' => 'contractsInsurance',
        'contracts_loan' => 'contractsLoan',
        'contracts_electricity' => 'contractsElectricity',
        'contracts_telecommunication' => 'contractsTelecommunication',
        'contracts_gas' => 'contractsGas',
        'schufa_credit_check' => 'schufaCreditCheck',
        'tax' => 'tax',
        'mobility' => 'mobility',
        'shopping' => 'shopping',
        'entertainment' => 'entertainment'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'chargebacks' => 'setChargebacks',
        'debt_collection' => 'setDebtCollection',
        'gambling' => 'setGambling',
        'seizure' => 'setSeizure',
        'maximum_available_funds' => 'setMaximumAvailableFunds',
        'income' => 'setIncome',
        'spending' => 'setSpending',
        'rent_and_living' => 'setRentAndLiving',
        'insurance' => 'setInsurance',
        'bank_and_credit' => 'setBankAndCredit',
        'savings' => 'setSavings',
        'travel' => 'setTravel',
        'health_and_wellness' => 'setHealthAndWellness',
        'b2b_balances' => 'setB2bBalances',
        'contracts_insurance' => 'setContractsInsurance',
        'contracts_loan' => 'setContractsLoan',
        'contracts_electricity' => 'setContractsElectricity',
        'contracts_telecommunication' => 'setContractsTelecommunication',
        'contracts_gas' => 'setContractsGas',
        'schufa_credit_check' => 'setSchufaCreditCheck',
        'tax' => 'setTax',
        'mobility' => 'setMobility',
        'shopping' => 'setShopping',
        'entertainment' => 'setEntertainment'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'chargebacks' => 'getChargebacks',
        'debt_collection' => 'getDebtCollection',
        'gambling' => 'getGambling',
        'seizure' => 'getSeizure',
        'maximum_available_funds' => 'getMaximumAvailableFunds',
        'income' => 'getIncome',
        'spending' => 'getSpending',
        'rent_and_living' => 'getRentAndLiving',
        'insurance' => 'getInsurance',
        'bank_and_credit' => 'getBankAndCredit',
        'savings' => 'getSavings',
        'travel' => 'getTravel',
        'health_and_wellness' => 'getHealthAndWellness',
        'b2b_balances' => 'getB2bBalances',
        'contracts_insurance' => 'getContractsInsurance',
        'contracts_loan' => 'getContractsLoan',
        'contracts_electricity' => 'getContractsElectricity',
        'contracts_telecommunication' => 'getContractsTelecommunication',
        'contracts_gas' => 'getContractsGas',
        'schufa_credit_check' => 'getSchufaCreditCheck',
        'tax' => 'getTax',
        'mobility' => 'getMobility',
        'shopping' => 'getShopping',
        'entertainment' => 'getEntertainment'
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
        $this->setIfExists('chargebacks', $data ?? [], null);
        $this->setIfExists('debt_collection', $data ?? [], null);
        $this->setIfExists('gambling', $data ?? [], null);
        $this->setIfExists('seizure', $data ?? [], null);
        $this->setIfExists('maximum_available_funds', $data ?? [], null);
        $this->setIfExists('income', $data ?? [], null);
        $this->setIfExists('spending', $data ?? [], null);
        $this->setIfExists('rent_and_living', $data ?? [], null);
        $this->setIfExists('insurance', $data ?? [], null);
        $this->setIfExists('bank_and_credit', $data ?? [], null);
        $this->setIfExists('savings', $data ?? [], null);
        $this->setIfExists('travel', $data ?? [], null);
        $this->setIfExists('health_and_wellness', $data ?? [], null);
        $this->setIfExists('b2b_balances', $data ?? [], null);
        $this->setIfExists('contracts_insurance', $data ?? [], null);
        $this->setIfExists('contracts_loan', $data ?? [], null);
        $this->setIfExists('contracts_electricity', $data ?? [], null);
        $this->setIfExists('contracts_telecommunication', $data ?? [], null);
        $this->setIfExists('contracts_gas', $data ?? [], null);
        $this->setIfExists('schufa_credit_check', $data ?? [], null);
        $this->setIfExists('tax', $data ?? [], null);
        $this->setIfExists('mobility', $data ?? [], null);
        $this->setIfExists('shopping', $data ?? [], null);
        $this->setIfExists('entertainment', $data ?? [], null);
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
     * Gets chargebacks
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getChargebacks()
    {
        return $this->container['chargebacks'];
    }

    /**
     * Sets chargebacks
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $chargebacks chargebacks
     *
     * @return self
     */
    public function setChargebacks($chargebacks)
    {

        if (is_null($chargebacks)) {
            throw new \InvalidArgumentException('non-nullable chargebacks cannot be null');
        }

        $this->container['chargebacks'] = $chargebacks;

        return $this;
    }

    /**
     * Gets debt_collection
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getDebtCollection()
    {
        return $this->container['debt_collection'];
    }

    /**
     * Sets debt_collection
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $debt_collection debt_collection
     *
     * @return self
     */
    public function setDebtCollection($debt_collection)
    {

        if (is_null($debt_collection)) {
            throw new \InvalidArgumentException('non-nullable debt_collection cannot be null');
        }

        $this->container['debt_collection'] = $debt_collection;

        return $this;
    }

    /**
     * Gets gambling
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getGambling()
    {
        return $this->container['gambling'];
    }

    /**
     * Sets gambling
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $gambling gambling
     *
     * @return self
     */
    public function setGambling($gambling)
    {

        if (is_null($gambling)) {
            throw new \InvalidArgumentException('non-nullable gambling cannot be null');
        }

        $this->container['gambling'] = $gambling;

        return $this;
    }

    /**
     * Gets seizure
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getSeizure()
    {
        return $this->container['seizure'];
    }

    /**
     * Sets seizure
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $seizure seizure
     *
     * @return self
     */
    public function setSeizure($seizure)
    {

        if (is_null($seizure)) {
            throw new \InvalidArgumentException('non-nullable seizure cannot be null');
        }

        $this->container['seizure'] = $seizure;

        return $this;
    }

    /**
     * Gets maximum_available_funds
     *
     * @return \OpenAPIDataIntelligence\Client\Model\MaxAvailableFundsReportResource|null
     */
    public function getMaximumAvailableFunds()
    {
        return $this->container['maximum_available_funds'];
    }

    /**
     * Sets maximum_available_funds
     *
     * @param \OpenAPIDataIntelligence\Client\Model\MaxAvailableFundsReportResource|null $maximum_available_funds maximum_available_funds
     *
     * @return self
     */
    public function setMaximumAvailableFunds($maximum_available_funds)
    {

        if (is_null($maximum_available_funds)) {
            throw new \InvalidArgumentException('non-nullable maximum_available_funds cannot be null');
        }

        $this->container['maximum_available_funds'] = $maximum_available_funds;

        return $this;
    }

    /**
     * Gets income
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeReportResource|null
     */
    public function getIncome()
    {
        return $this->container['income'];
    }

    /**
     * Sets income
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeReportResource|null $income income
     *
     * @return self
     */
    public function setIncome($income)
    {

        if (is_null($income)) {
            throw new \InvalidArgumentException('non-nullable income cannot be null');
        }

        $this->container['income'] = $income;

        return $this;
    }

    /**
     * Gets spending
     *
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingReportResource|null
     */
    public function getSpending()
    {
        return $this->container['spending'];
    }

    /**
     * Sets spending
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingReportResource|null $spending spending
     *
     * @return self
     */
    public function setSpending($spending)
    {

        if (is_null($spending)) {
            throw new \InvalidArgumentException('non-nullable spending cannot be null');
        }

        $this->container['spending'] = $spending;

        return $this;
    }

    /**
     * Gets rent_and_living
     *
     * @return \OpenAPIDataIntelligence\Client\Model\RentReportResource|null
     */
    public function getRentAndLiving()
    {
        return $this->container['rent_and_living'];
    }

    /**
     * Sets rent_and_living
     *
     * @param \OpenAPIDataIntelligence\Client\Model\RentReportResource|null $rent_and_living rent_and_living
     *
     * @return self
     */
    public function setRentAndLiving($rent_and_living)
    {

        if (is_null($rent_and_living)) {
            throw new \InvalidArgumentException('non-nullable rent_and_living cannot be null');
        }

        $this->container['rent_and_living'] = $rent_and_living;

        return $this;
    }

    /**
     * Gets insurance
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getInsurance()
    {
        return $this->container['insurance'];
    }

    /**
     * Sets insurance
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $insurance insurance
     *
     * @return self
     */
    public function setInsurance($insurance)
    {

        if (is_null($insurance)) {
            throw new \InvalidArgumentException('non-nullable insurance cannot be null');
        }

        $this->container['insurance'] = $insurance;

        return $this;
    }

    /**
     * Gets bank_and_credit
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getBankAndCredit()
    {
        return $this->container['bank_and_credit'];
    }

    /**
     * Sets bank_and_credit
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $bank_and_credit bank_and_credit
     *
     * @return self
     */
    public function setBankAndCredit($bank_and_credit)
    {

        if (is_null($bank_and_credit)) {
            throw new \InvalidArgumentException('non-nullable bank_and_credit cannot be null');
        }

        $this->container['bank_and_credit'] = $bank_and_credit;

        return $this;
    }

    /**
     * Gets savings
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getSavings()
    {
        return $this->container['savings'];
    }

    /**
     * Sets savings
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $savings savings
     *
     * @return self
     */
    public function setSavings($savings)
    {

        if (is_null($savings)) {
            throw new \InvalidArgumentException('non-nullable savings cannot be null');
        }

        $this->container['savings'] = $savings;

        return $this;
    }

    /**
     * Gets travel
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getTravel()
    {
        return $this->container['travel'];
    }

    /**
     * Sets travel
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $travel travel
     *
     * @return self
     */
    public function setTravel($travel)
    {

        if (is_null($travel)) {
            throw new \InvalidArgumentException('non-nullable travel cannot be null');
        }

        $this->container['travel'] = $travel;

        return $this;
    }

    /**
     * Gets health_and_wellness
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getHealthAndWellness()
    {
        return $this->container['health_and_wellness'];
    }

    /**
     * Sets health_and_wellness
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $health_and_wellness health_and_wellness
     *
     * @return self
     */
    public function setHealthAndWellness($health_and_wellness)
    {

        if (is_null($health_and_wellness)) {
            throw new \InvalidArgumentException('non-nullable health_and_wellness cannot be null');
        }

        $this->container['health_and_wellness'] = $health_and_wellness;

        return $this;
    }

    /**
     * Gets b2b_balances
     *
     * @return \OpenAPIDataIntelligence\Client\Model\B2BReportBalanceResource|null
     */
    public function getB2bBalances()
    {
        return $this->container['b2b_balances'];
    }

    /**
     * Sets b2b_balances
     *
     * @param \OpenAPIDataIntelligence\Client\Model\B2BReportBalanceResource|null $b2b_balances b2b_balances
     *
     * @return self
     */
    public function setB2bBalances($b2b_balances)
    {

        if (is_null($b2b_balances)) {
            throw new \InvalidArgumentException('non-nullable b2b_balances cannot be null');
        }

        $this->container['b2b_balances'] = $b2b_balances;

        return $this;
    }

    /**
     * Gets contracts_insurance
     *
     * @return \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null
     */
    public function getContractsInsurance()
    {
        return $this->container['contracts_insurance'];
    }

    /**
     * Sets contracts_insurance
     *
     * @param \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null $contracts_insurance contracts_insurance
     *
     * @return self
     */
    public function setContractsInsurance($contracts_insurance)
    {

        if (is_null($contracts_insurance)) {
            throw new \InvalidArgumentException('non-nullable contracts_insurance cannot be null');
        }

        $this->container['contracts_insurance'] = $contracts_insurance;

        return $this;
    }

    /**
     * Gets contracts_loan
     *
     * @return \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null
     */
    public function getContractsLoan()
    {
        return $this->container['contracts_loan'];
    }

    /**
     * Sets contracts_loan
     *
     * @param \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null $contracts_loan contracts_loan
     *
     * @return self
     */
    public function setContractsLoan($contracts_loan)
    {

        if (is_null($contracts_loan)) {
            throw new \InvalidArgumentException('non-nullable contracts_loan cannot be null');
        }

        $this->container['contracts_loan'] = $contracts_loan;

        return $this;
    }

    /**
     * Gets contracts_electricity
     *
     * @return \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null
     */
    public function getContractsElectricity()
    {
        return $this->container['contracts_electricity'];
    }

    /**
     * Sets contracts_electricity
     *
     * @param \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null $contracts_electricity contracts_electricity
     *
     * @return self
     */
    public function setContractsElectricity($contracts_electricity)
    {

        if (is_null($contracts_electricity)) {
            throw new \InvalidArgumentException('non-nullable contracts_electricity cannot be null');
        }

        $this->container['contracts_electricity'] = $contracts_electricity;

        return $this;
    }

    /**
     * Gets contracts_telecommunication
     *
     * @return \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null
     */
    public function getContractsTelecommunication()
    {
        return $this->container['contracts_telecommunication'];
    }

    /**
     * Sets contracts_telecommunication
     *
     * @param \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null $contracts_telecommunication contracts_telecommunication
     *
     * @return self
     */
    public function setContractsTelecommunication($contracts_telecommunication)
    {

        if (is_null($contracts_telecommunication)) {
            throw new \InvalidArgumentException('non-nullable contracts_telecommunication cannot be null');
        }

        $this->container['contracts_telecommunication'] = $contracts_telecommunication;

        return $this;
    }

    /**
     * Gets contracts_gas
     *
     * @return \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null
     */
    public function getContractsGas()
    {
        return $this->container['contracts_gas'];
    }

    /**
     * Sets contracts_gas
     *
     * @param \OpenAPIDataIntelligence\Client\Model\ContractsReportResource|null $contracts_gas contracts_gas
     *
     * @return self
     */
    public function setContractsGas($contracts_gas)
    {

        if (is_null($contracts_gas)) {
            throw new \InvalidArgumentException('non-nullable contracts_gas cannot be null');
        }

        $this->container['contracts_gas'] = $contracts_gas;

        return $this;
    }

    /**
     * Gets schufa_credit_check
     *
     * @return \OpenAPIDataIntelligence\Client\Model\SchufaCreditCheckReportResource|null
     */
    public function getSchufaCreditCheck()
    {
        return $this->container['schufa_credit_check'];
    }

    /**
     * Sets schufa_credit_check
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SchufaCreditCheckReportResource|null $schufa_credit_check schufa_credit_check
     *
     * @return self
     */
    public function setSchufaCreditCheck($schufa_credit_check)
    {

        if (is_null($schufa_credit_check)) {
            throw new \InvalidArgumentException('non-nullable schufa_credit_check cannot be null');
        }

        $this->container['schufa_credit_check'] = $schufa_credit_check;

        return $this;
    }

    /**
     * Gets tax
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getTax()
    {
        return $this->container['tax'];
    }

    /**
     * Sets tax
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $tax tax
     *
     * @return self
     */
    public function setTax($tax)
    {

        if (is_null($tax)) {
            throw new \InvalidArgumentException('non-nullable tax cannot be null');
        }

        $this->container['tax'] = $tax;

        return $this;
    }

    /**
     * Gets mobility
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getMobility()
    {
        return $this->container['mobility'];
    }

    /**
     * Sets mobility
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $mobility mobility
     *
     * @return self
     */
    public function setMobility($mobility)
    {

        if (is_null($mobility)) {
            throw new \InvalidArgumentException('non-nullable mobility cannot be null');
        }

        $this->container['mobility'] = $mobility;

        return $this;
    }

    /**
     * Gets shopping
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getShopping()
    {
        return $this->container['shopping'];
    }

    /**
     * Sets shopping
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $shopping shopping
     *
     * @return self
     */
    public function setShopping($shopping)
    {

        if (is_null($shopping)) {
            throw new \InvalidArgumentException('non-nullable shopping cannot be null');
        }

        $this->container['shopping'] = $shopping;

        return $this;
    }

    /**
     * Gets entertainment
     *
     * @return \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null
     */
    public function getEntertainment()
    {
        return $this->container['entertainment'];
    }

    /**
     * Sets entertainment
     *
     * @param \OpenAPIDataIntelligence\Client\Model\AllReportsResource|null $entertainment entertainment
     *
     * @return self
     */
    public function setEntertainment($entertainment)
    {

        if (is_null($entertainment)) {
            throw new \InvalidArgumentException('non-nullable entertainment cannot be null');
        }

        $this->container['entertainment'] = $entertainment;

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


