<?php
/**
 * IncomeReportMonthlyDataResource
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
 * IncomeReportMonthlyDataResource Class Doc Comment
 *
 * @category Class
 * @description Report data organized by months.
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class IncomeReportMonthlyDataResource implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'IncomeReportMonthlyDataResource';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'total_income' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'salary' => '\OpenAPIDataIntelligence\Client\Model\SalaryMonthlyDataResource',
        'capital_income' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'rental_income' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'pension_and_retirement' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'government_aid' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'alimony' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'cash_deposit' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'child_benefit' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'student_grant' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource',
        'gambling_income' => '\OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'total_income' => null,
        'salary' => null,
        'capital_income' => null,
        'rental_income' => null,
        'pension_and_retirement' => null,
        'government_aid' => null,
        'alimony' => null,
        'cash_deposit' => null,
        'child_benefit' => null,
        'student_grant' => null,
        'gambling_income' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'total_income' => false,
		'salary' => false,
		'capital_income' => false,
		'rental_income' => false,
		'pension_and_retirement' => false,
		'government_aid' => false,
		'alimony' => false,
		'cash_deposit' => false,
		'child_benefit' => false,
		'student_grant' => false,
		'gambling_income' => false
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
        'total_income' => 'totalIncome',
        'salary' => 'salary',
        'capital_income' => 'capitalIncome',
        'rental_income' => 'rentalIncome',
        'pension_and_retirement' => 'pensionAndRetirement',
        'government_aid' => 'governmentAid',
        'alimony' => 'alimony',
        'cash_deposit' => 'cashDeposit',
        'child_benefit' => 'childBenefit',
        'student_grant' => 'studentGrant',
        'gambling_income' => 'gamblingIncome'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'total_income' => 'setTotalIncome',
        'salary' => 'setSalary',
        'capital_income' => 'setCapitalIncome',
        'rental_income' => 'setRentalIncome',
        'pension_and_retirement' => 'setPensionAndRetirement',
        'government_aid' => 'setGovernmentAid',
        'alimony' => 'setAlimony',
        'cash_deposit' => 'setCashDeposit',
        'child_benefit' => 'setChildBenefit',
        'student_grant' => 'setStudentGrant',
        'gambling_income' => 'setGamblingIncome'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'total_income' => 'getTotalIncome',
        'salary' => 'getSalary',
        'capital_income' => 'getCapitalIncome',
        'rental_income' => 'getRentalIncome',
        'pension_and_retirement' => 'getPensionAndRetirement',
        'government_aid' => 'getGovernmentAid',
        'alimony' => 'getAlimony',
        'cash_deposit' => 'getCashDeposit',
        'child_benefit' => 'getChildBenefit',
        'student_grant' => 'getStudentGrant',
        'gambling_income' => 'getGamblingIncome'
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
        $this->setIfExists('total_income', $data ?? [], null);
        $this->setIfExists('salary', $data ?? [], null);
        $this->setIfExists('capital_income', $data ?? [], null);
        $this->setIfExists('rental_income', $data ?? [], null);
        $this->setIfExists('pension_and_retirement', $data ?? [], null);
        $this->setIfExists('government_aid', $data ?? [], null);
        $this->setIfExists('alimony', $data ?? [], null);
        $this->setIfExists('cash_deposit', $data ?? [], null);
        $this->setIfExists('child_benefit', $data ?? [], null);
        $this->setIfExists('student_grant', $data ?? [], null);
        $this->setIfExists('gambling_income', $data ?? [], null);
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

        if ($this->container['total_income'] === null) {
            $invalidProperties[] = "'total_income' can't be null";
        }
        if ($this->container['salary'] === null) {
            $invalidProperties[] = "'salary' can't be null";
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
     * Gets total_income
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource
     */
    public function getTotalIncome()
    {
        return $this->container['total_income'];
    }

    /**
     * Sets total_income
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource $total_income total_income
     *
     * @return self
     */
    public function setTotalIncome($total_income)
    {

        if (is_null($total_income)) {
            throw new \InvalidArgumentException('non-nullable total_income cannot be null');
        }

        $this->container['total_income'] = $total_income;

        return $this;
    }

    /**
     * Gets salary
     *
     * @return \OpenAPIDataIntelligence\Client\Model\SalaryMonthlyDataResource
     */
    public function getSalary()
    {
        return $this->container['salary'];
    }

    /**
     * Sets salary
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SalaryMonthlyDataResource $salary salary
     *
     * @return self
     */
    public function setSalary($salary)
    {

        if (is_null($salary)) {
            throw new \InvalidArgumentException('non-nullable salary cannot be null');
        }

        $this->container['salary'] = $salary;

        return $this;
    }

    /**
     * Gets capital_income
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getCapitalIncome()
    {
        return $this->container['capital_income'];
    }

    /**
     * Sets capital_income
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $capital_income capital_income
     *
     * @return self
     */
    public function setCapitalIncome($capital_income)
    {

        if (is_null($capital_income)) {
            throw new \InvalidArgumentException('non-nullable capital_income cannot be null');
        }

        $this->container['capital_income'] = $capital_income;

        return $this;
    }

    /**
     * Gets rental_income
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getRentalIncome()
    {
        return $this->container['rental_income'];
    }

    /**
     * Sets rental_income
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $rental_income rental_income
     *
     * @return self
     */
    public function setRentalIncome($rental_income)
    {

        if (is_null($rental_income)) {
            throw new \InvalidArgumentException('non-nullable rental_income cannot be null');
        }

        $this->container['rental_income'] = $rental_income;

        return $this;
    }

    /**
     * Gets pension_and_retirement
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getPensionAndRetirement()
    {
        return $this->container['pension_and_retirement'];
    }

    /**
     * Sets pension_and_retirement
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $pension_and_retirement pension_and_retirement
     *
     * @return self
     */
    public function setPensionAndRetirement($pension_and_retirement)
    {

        if (is_null($pension_and_retirement)) {
            throw new \InvalidArgumentException('non-nullable pension_and_retirement cannot be null');
        }

        $this->container['pension_and_retirement'] = $pension_and_retirement;

        return $this;
    }

    /**
     * Gets government_aid
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getGovernmentAid()
    {
        return $this->container['government_aid'];
    }

    /**
     * Sets government_aid
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $government_aid government_aid
     *
     * @return self
     */
    public function setGovernmentAid($government_aid)
    {

        if (is_null($government_aid)) {
            throw new \InvalidArgumentException('non-nullable government_aid cannot be null');
        }

        $this->container['government_aid'] = $government_aid;

        return $this;
    }

    /**
     * Gets alimony
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getAlimony()
    {
        return $this->container['alimony'];
    }

    /**
     * Sets alimony
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $alimony alimony
     *
     * @return self
     */
    public function setAlimony($alimony)
    {

        if (is_null($alimony)) {
            throw new \InvalidArgumentException('non-nullable alimony cannot be null');
        }

        $this->container['alimony'] = $alimony;

        return $this;
    }

    /**
     * Gets cash_deposit
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getCashDeposit()
    {
        return $this->container['cash_deposit'];
    }

    /**
     * Sets cash_deposit
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $cash_deposit cash_deposit
     *
     * @return self
     */
    public function setCashDeposit($cash_deposit)
    {

        if (is_null($cash_deposit)) {
            throw new \InvalidArgumentException('non-nullable cash_deposit cannot be null');
        }

        $this->container['cash_deposit'] = $cash_deposit;

        return $this;
    }

    /**
     * Gets child_benefit
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getChildBenefit()
    {
        return $this->container['child_benefit'];
    }

    /**
     * Sets child_benefit
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $child_benefit child_benefit
     *
     * @return self
     */
    public function setChildBenefit($child_benefit)
    {

        if (is_null($child_benefit)) {
            throw new \InvalidArgumentException('non-nullable child_benefit cannot be null');
        }

        $this->container['child_benefit'] = $child_benefit;

        return $this;
    }

    /**
     * Gets student_grant
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getStudentGrant()
    {
        return $this->container['student_grant'];
    }

    /**
     * Sets student_grant
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $student_grant student_grant
     *
     * @return self
     */
    public function setStudentGrant($student_grant)
    {

        if (is_null($student_grant)) {
            throw new \InvalidArgumentException('non-nullable student_grant cannot be null');
        }

        $this->container['student_grant'] = $student_grant;

        return $this;
    }

    /**
     * Gets gambling_income
     *
     * @return \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null
     */
    public function getGamblingIncome()
    {
        return $this->container['gambling_income'];
    }

    /**
     * Sets gambling_income
     *
     * @param \OpenAPIDataIntelligence\Client\Model\IncomeMonthlyDataResource|null $gambling_income gambling_income
     *
     * @return self
     */
    public function setGamblingIncome($gambling_income)
    {

        if (is_null($gambling_income)) {
            throw new \InvalidArgumentException('non-nullable gambling_income cannot be null');
        }

        $this->container['gambling_income'] = $gambling_income;

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


