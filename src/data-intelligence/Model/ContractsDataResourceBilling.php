<?php
/**
 * ContractsDataResourceBilling
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
 * ContractsDataResourceBilling Class Doc Comment
 *
 * @category Class
 * @description Billing history of the contract
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ContractsDataResourceBilling implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ContractsDataResource_billing';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'period' => 'string',
        'first_billing_date' => 'string',
        'last_billing_date' => 'string',
        'last_billing_amount' => 'float',
        'average_contract_income' => 'float',
        'average_contract_spending' => 'float',
        'total_contract_income' => 'float',
        'total_contract_spending' => 'float',
        'total_billings_count' => 'int',
        'history' => '\OpenAPIDataIntelligence\Client\Model\ContractsBillingHistoryResource[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'period' => null,
        'first_billing_date' => null,
        'last_billing_date' => null,
        'last_billing_amount' => null,
        'average_contract_income' => null,
        'average_contract_spending' => null,
        'total_contract_income' => null,
        'total_contract_spending' => null,
        'total_billings_count' => null,
        'history' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'period' => false,
		'first_billing_date' => false,
		'last_billing_date' => false,
		'last_billing_amount' => false,
		'average_contract_income' => false,
		'average_contract_spending' => false,
		'total_contract_income' => false,
		'total_contract_spending' => false,
		'total_billings_count' => false,
		'history' => false
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
        'period' => 'period',
        'first_billing_date' => 'firstBillingDate',
        'last_billing_date' => 'lastBillingDate',
        'last_billing_amount' => 'lastBillingAmount',
        'average_contract_income' => 'averageContractIncome',
        'average_contract_spending' => 'averageContractSpending',
        'total_contract_income' => 'totalContractIncome',
        'total_contract_spending' => 'totalContractSpending',
        'total_billings_count' => 'totalBillingsCount',
        'history' => 'history'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'period' => 'setPeriod',
        'first_billing_date' => 'setFirstBillingDate',
        'last_billing_date' => 'setLastBillingDate',
        'last_billing_amount' => 'setLastBillingAmount',
        'average_contract_income' => 'setAverageContractIncome',
        'average_contract_spending' => 'setAverageContractSpending',
        'total_contract_income' => 'setTotalContractIncome',
        'total_contract_spending' => 'setTotalContractSpending',
        'total_billings_count' => 'setTotalBillingsCount',
        'history' => 'setHistory'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'period' => 'getPeriod',
        'first_billing_date' => 'getFirstBillingDate',
        'last_billing_date' => 'getLastBillingDate',
        'last_billing_amount' => 'getLastBillingAmount',
        'average_contract_income' => 'getAverageContractIncome',
        'average_contract_spending' => 'getAverageContractSpending',
        'total_contract_income' => 'getTotalContractIncome',
        'total_contract_spending' => 'getTotalContractSpending',
        'total_billings_count' => 'getTotalBillingsCount',
        'history' => 'getHistory'
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

    public const PERIOD_WEEKLY = 'WEEKLY';
    public const PERIOD_BI_WEEKLY = 'BI-WEEKLY';
    public const PERIOD_MONTHLY = 'MONTHLY';
    public const PERIOD_QUARTERLY = 'QUARTERLY';
    public const PERIOD_HALF_YEARLY = 'HALF-YEARLY';
    public const PERIOD_YEARLY = 'YEARLY';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPeriodAllowableValues()
    {
        return [
            self::PERIOD_WEEKLY,
            self::PERIOD_BI_WEEKLY,
            self::PERIOD_MONTHLY,
            self::PERIOD_QUARTERLY,
            self::PERIOD_HALF_YEARLY,
            self::PERIOD_YEARLY,
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
        $this->setIfExists('period', $data ?? [], null);
        $this->setIfExists('first_billing_date', $data ?? [], null);
        $this->setIfExists('last_billing_date', $data ?? [], null);
        $this->setIfExists('last_billing_amount', $data ?? [], null);
        $this->setIfExists('average_contract_income', $data ?? [], null);
        $this->setIfExists('average_contract_spending', $data ?? [], null);
        $this->setIfExists('total_contract_income', $data ?? [], null);
        $this->setIfExists('total_contract_spending', $data ?? [], null);
        $this->setIfExists('total_billings_count', $data ?? [], null);
        $this->setIfExists('history', $data ?? [], null);
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

        $allowedValues = $this->getPeriodAllowableValues();
        if (!is_null($this->container['period']) && !in_array($this->container['period'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'period', must be one of '%s'",
                $this->container['period'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['average_contract_income'] === null) {
            $invalidProperties[] = "'average_contract_income' can't be null";
        }
        if ($this->container['average_contract_spending'] === null) {
            $invalidProperties[] = "'average_contract_spending' can't be null";
        }
        if ($this->container['total_contract_income'] === null) {
            $invalidProperties[] = "'total_contract_income' can't be null";
        }
        if ($this->container['total_contract_spending'] === null) {
            $invalidProperties[] = "'total_contract_spending' can't be null";
        }
        if ($this->container['total_billings_count'] === null) {
            $invalidProperties[] = "'total_billings_count' can't be null";
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
     * Gets period
     *
     * @return string|null
     */
    public function getPeriod()
    {
        return $this->container['period'];
    }

    /**
     * Sets period
     *
     * @param string|null $period Billing period of the contract. The period is not provided in case the report returns fewer than two transactions for the defined contract within specified maxDaysForCase.
     *
     * @return self
     */
    public function setPeriod($period)
    {
        $allowedValues = $this->getPeriodAllowableValues();
        if (!is_null($period) && !in_array($period, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'period', must be one of '%s'",
                    $period,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($period)) {
            throw new \InvalidArgumentException('non-nullable period cannot be null');
        }

        $this->container['period'] = $period;

        return $this;
    }

    /**
     * Gets first_billing_date
     *
     * @return string|null
     */
    public function getFirstBillingDate()
    {
        return $this->container['first_billing_date'];
    }

    /**
     * Sets first_billing_date
     *
     * @param string|null $first_billing_date First billing date detected for this contract within the specified maxDaysForCase period in the format '<code>YYYY-MM-DD HH:MM:SS</code>' (CET Europe / Berlin).
     *
     * @return self
     */
    public function setFirstBillingDate($first_billing_date)
    {

        if (is_null($first_billing_date)) {
            throw new \InvalidArgumentException('non-nullable first_billing_date cannot be null');
        }

        $this->container['first_billing_date'] = $first_billing_date;

        return $this;
    }

    /**
     * Gets last_billing_date
     *
     * @return string|null
     */
    public function getLastBillingDate()
    {
        return $this->container['last_billing_date'];
    }

    /**
     * Sets last_billing_date
     *
     * @param string|null $last_billing_date Last billing date detected for this contract within the specified maxDaysForCase period in the format '<code>YYYY-MM-DD HH:MM:SS</code>' (CET Europe / Berlin).
     *
     * @return self
     */
    public function setLastBillingDate($last_billing_date)
    {

        if (is_null($last_billing_date)) {
            throw new \InvalidArgumentException('non-nullable last_billing_date cannot be null');
        }

        $this->container['last_billing_date'] = $last_billing_date;

        return $this;
    }

    /**
     * Gets last_billing_amount
     *
     * @return float|null
     */
    public function getLastBillingAmount()
    {
        return $this->container['last_billing_amount'];
    }

    /**
     * Sets last_billing_amount
     *
     * @param float|null $last_billing_amount The amount of last billing detected for this contract within the specified maxDaysForCase period.
     *
     * @return self
     */
    public function setLastBillingAmount($last_billing_amount)
    {

        if (is_null($last_billing_amount)) {
            throw new \InvalidArgumentException('non-nullable last_billing_amount cannot be null');
        }

        $this->container['last_billing_amount'] = $last_billing_amount;

        return $this;
    }

    /**
     * Gets average_contract_income
     *
     * @return float
     */
    public function getAverageContractIncome()
    {
        return $this->container['average_contract_income'];
    }

    /**
     * Sets average_contract_income
     *
     * @param float $average_contract_income Average amount obtained for the contract within the specified maxDaysForCase period
     *
     * @return self
     */
    public function setAverageContractIncome($average_contract_income)
    {

        if (is_null($average_contract_income)) {
            throw new \InvalidArgumentException('non-nullable average_contract_income cannot be null');
        }

        $this->container['average_contract_income'] = $average_contract_income;

        return $this;
    }

    /**
     * Gets average_contract_spending
     *
     * @return float
     */
    public function getAverageContractSpending()
    {
        return $this->container['average_contract_spending'];
    }

    /**
     * Sets average_contract_spending
     *
     * @param float $average_contract_spending Average amount paid for the contract within the specified maxDaysForCase period
     *
     * @return self
     */
    public function setAverageContractSpending($average_contract_spending)
    {

        if (is_null($average_contract_spending)) {
            throw new \InvalidArgumentException('non-nullable average_contract_spending cannot be null');
        }

        $this->container['average_contract_spending'] = $average_contract_spending;

        return $this;
    }

    /**
     * Gets total_contract_income
     *
     * @return float
     */
    public function getTotalContractIncome()
    {
        return $this->container['total_contract_income'];
    }

    /**
     * Sets total_contract_income
     *
     * @param float $total_contract_income Total amount obtained for the contract within the specified maxDaysForCase period
     *
     * @return self
     */
    public function setTotalContractIncome($total_contract_income)
    {

        if (is_null($total_contract_income)) {
            throw new \InvalidArgumentException('non-nullable total_contract_income cannot be null');
        }

        $this->container['total_contract_income'] = $total_contract_income;

        return $this;
    }

    /**
     * Gets total_contract_spending
     *
     * @return float
     */
    public function getTotalContractSpending()
    {
        return $this->container['total_contract_spending'];
    }

    /**
     * Sets total_contract_spending
     *
     * @param float $total_contract_spending Total amount paid for the contract within the specified maxDaysForCase period
     *
     * @return self
     */
    public function setTotalContractSpending($total_contract_spending)
    {

        if (is_null($total_contract_spending)) {
            throw new \InvalidArgumentException('non-nullable total_contract_spending cannot be null');
        }

        $this->container['total_contract_spending'] = $total_contract_spending;

        return $this;
    }

    /**
     * Gets total_billings_count
     *
     * @return int
     */
    public function getTotalBillingsCount()
    {
        return $this->container['total_billings_count'];
    }

    /**
     * Sets total_billings_count
     *
     * @param int $total_billings_count Total count of billings for the contract within the specified maxDaysForCase period
     *
     * @return self
     */
    public function setTotalBillingsCount($total_billings_count)
    {

        if (is_null($total_billings_count)) {
            throw new \InvalidArgumentException('non-nullable total_billings_count cannot be null');
        }

        $this->container['total_billings_count'] = $total_billings_count;

        return $this;
    }

    /**
     * Gets history
     *
     * @return \OpenAPIDataIntelligence\Client\Model\ContractsBillingHistoryResource[]|null
     */
    public function getHistory()
    {
        return $this->container['history'];
    }

    /**
     * Sets history
     *
     * @param \OpenAPIDataIntelligence\Client\Model\ContractsBillingHistoryResource[]|null $history Billing history containing amounts billed and dates of billing
     *
     * @return self
     */
    public function setHistory($history)
    {

        if (is_null($history)) {
            throw new \InvalidArgumentException('non-nullable history cannot be null');
        }

        $this->container['history'] = $history;

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


