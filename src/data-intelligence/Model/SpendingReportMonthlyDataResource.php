<?php
/**
 * SpendingReportMonthlyDataResource
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
 * SpendingReportMonthlyDataResource Class Doc Comment
 *
 * @category Class
 * @description Report data organized by months.
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SpendingReportMonthlyDataResource implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SpendingReportMonthlyDataResource';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'total_spending' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'rent_and_living' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'insurance' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'bank_and_credit' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'savings' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'travel' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'tax' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'mobility' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'shopping' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'entertainment' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource',
        'health_and_wellness' => '\OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'total_spending' => null,
        'rent_and_living' => null,
        'insurance' => null,
        'bank_and_credit' => null,
        'savings' => null,
        'travel' => null,
        'tax' => null,
        'mobility' => null,
        'shopping' => null,
        'entertainment' => null,
        'health_and_wellness' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'total_spending' => false,
		'rent_and_living' => false,
		'insurance' => false,
		'bank_and_credit' => false,
		'savings' => false,
		'travel' => false,
		'tax' => false,
		'mobility' => false,
		'shopping' => false,
		'entertainment' => false,
		'health_and_wellness' => false
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
        'total_spending' => 'totalSpending',
        'rent_and_living' => 'rentAndLiving',
        'insurance' => 'insurance',
        'bank_and_credit' => 'bankAndCredit',
        'savings' => 'savings',
        'travel' => 'travel',
        'tax' => 'tax',
        'mobility' => 'mobility',
        'shopping' => 'shopping',
        'entertainment' => 'entertainment',
        'health_and_wellness' => 'healthAndWellness'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'total_spending' => 'setTotalSpending',
        'rent_and_living' => 'setRentAndLiving',
        'insurance' => 'setInsurance',
        'bank_and_credit' => 'setBankAndCredit',
        'savings' => 'setSavings',
        'travel' => 'setTravel',
        'tax' => 'setTax',
        'mobility' => 'setMobility',
        'shopping' => 'setShopping',
        'entertainment' => 'setEntertainment',
        'health_and_wellness' => 'setHealthAndWellness'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'total_spending' => 'getTotalSpending',
        'rent_and_living' => 'getRentAndLiving',
        'insurance' => 'getInsurance',
        'bank_and_credit' => 'getBankAndCredit',
        'savings' => 'getSavings',
        'travel' => 'getTravel',
        'tax' => 'getTax',
        'mobility' => 'getMobility',
        'shopping' => 'getShopping',
        'entertainment' => 'getEntertainment',
        'health_and_wellness' => 'getHealthAndWellness'
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
        $this->setIfExists('total_spending', $data ?? [], null);
        $this->setIfExists('rent_and_living', $data ?? [], null);
        $this->setIfExists('insurance', $data ?? [], null);
        $this->setIfExists('bank_and_credit', $data ?? [], null);
        $this->setIfExists('savings', $data ?? [], null);
        $this->setIfExists('travel', $data ?? [], null);
        $this->setIfExists('tax', $data ?? [], null);
        $this->setIfExists('mobility', $data ?? [], null);
        $this->setIfExists('shopping', $data ?? [], null);
        $this->setIfExists('entertainment', $data ?? [], null);
        $this->setIfExists('health_and_wellness', $data ?? [], null);
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

        if ($this->container['total_spending'] === null) {
            $invalidProperties[] = "'total_spending' can't be null";
        }
        if ($this->container['rent_and_living'] === null) {
            $invalidProperties[] = "'rent_and_living' can't be null";
        }
        if ($this->container['insurance'] === null) {
            $invalidProperties[] = "'insurance' can't be null";
        }
        if ($this->container['bank_and_credit'] === null) {
            $invalidProperties[] = "'bank_and_credit' can't be null";
        }
        if ($this->container['savings'] === null) {
            $invalidProperties[] = "'savings' can't be null";
        }
        if ($this->container['travel'] === null) {
            $invalidProperties[] = "'travel' can't be null";
        }
        if ($this->container['tax'] === null) {
            $invalidProperties[] = "'tax' can't be null";
        }
        if ($this->container['health_and_wellness'] === null) {
            $invalidProperties[] = "'health_and_wellness' can't be null";
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
     * Gets total_spending
     *
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getTotalSpending()
    {
        return $this->container['total_spending'];
    }

    /**
     * Sets total_spending
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $total_spending total_spending
     *
     * @return self
     */
    public function setTotalSpending($total_spending)
    {

        if (is_null($total_spending)) {
            throw new \InvalidArgumentException('non-nullable total_spending cannot be null');
        }

        $this->container['total_spending'] = $total_spending;

        return $this;
    }

    /**
     * Gets rent_and_living
     *
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getRentAndLiving()
    {
        return $this->container['rent_and_living'];
    }

    /**
     * Sets rent_and_living
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $rent_and_living rent_and_living
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
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getInsurance()
    {
        return $this->container['insurance'];
    }

    /**
     * Sets insurance
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $insurance insurance
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
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getBankAndCredit()
    {
        return $this->container['bank_and_credit'];
    }

    /**
     * Sets bank_and_credit
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $bank_and_credit bank_and_credit
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
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getSavings()
    {
        return $this->container['savings'];
    }

    /**
     * Sets savings
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $savings savings
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
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getTravel()
    {
        return $this->container['travel'];
    }

    /**
     * Sets travel
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $travel travel
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
     * Gets tax
     *
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getTax()
    {
        return $this->container['tax'];
    }

    /**
     * Sets tax
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $tax tax
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
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource|null
     */
    public function getMobility()
    {
        return $this->container['mobility'];
    }

    /**
     * Sets mobility
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource|null $mobility mobility
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
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource|null
     */
    public function getShopping()
    {
        return $this->container['shopping'];
    }

    /**
     * Sets shopping
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource|null $shopping shopping
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
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource|null
     */
    public function getEntertainment()
    {
        return $this->container['entertainment'];
    }

    /**
     * Sets entertainment
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource|null $entertainment entertainment
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
     * Gets health_and_wellness
     *
     * @return \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource
     */
    public function getHealthAndWellness()
    {
        return $this->container['health_and_wellness'];
    }

    /**
     * Sets health_and_wellness
     *
     * @param \OpenAPIDataIntelligence\Client\Model\SpendingMonthlyDataResource $health_and_wellness health_and_wellness
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


