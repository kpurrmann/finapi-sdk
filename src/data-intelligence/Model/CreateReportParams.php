<?php
/**
 * CreateReportParams
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
 * CreateReportParams Class Doc Comment
 *
 * @category Class
 * @description Parameters for report creation
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateReportParams implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateReportParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'interval_period' => 'string',
        'interval' => 'int',
        'continuous_report' => '\OpenAPIDataIntelligence\Client\Model\ContinuousReportResource'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'interval_period' => null,
        'interval' => null,
        'continuous_report' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'interval_period' => false,
		'interval' => false,
		'continuous_report' => false
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
        'interval_period' => 'intervalPeriod',
        'interval' => 'interval',
        'continuous_report' => 'continuousReport'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'interval_period' => 'setIntervalPeriod',
        'interval' => 'setInterval',
        'continuous_report' => 'setContinuousReport'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'interval_period' => 'getIntervalPeriod',
        'interval' => 'getInterval',
        'continuous_report' => 'getContinuousReport'
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

    public const INTERVAL_PERIOD_NONE = 'NONE';
    public const INTERVAL_PERIOD_DAYS = 'DAYS';
    public const INTERVAL_PERIOD_WEEKS = 'WEEKS';
    public const INTERVAL_PERIOD_MONTHS = 'MONTHS';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getIntervalPeriodAllowableValues()
    {
        return [
            self::INTERVAL_PERIOD_NONE,
            self::INTERVAL_PERIOD_DAYS,
            self::INTERVAL_PERIOD_WEEKS,
            self::INTERVAL_PERIOD_MONTHS,
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
        $this->setIfExists('interval_period', $data ?? [], null);
        $this->setIfExists('interval', $data ?? [], null);
        $this->setIfExists('continuous_report', $data ?? [], null);
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

        $allowedValues = $this->getIntervalPeriodAllowableValues();
        if (!is_null($this->container['interval_period']) && !in_array($this->container['interval_period'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'interval_period', must be one of '%s'",
                $this->container['interval_period'],
                implode("', '", $allowedValues)
            );
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
     * Gets interval_period
     *
     * @return string|null
     * @deprecated
     */
    public function getIntervalPeriod()
    {
        return $this->container['interval_period'];
    }

    /**
     * Sets interval_period
     *
     * @param string|null $interval_period Defines the period, for which the <code>interval</code> was specified. For the parameter, week equals to 7 calendar days, month equals 30 calendar days. If the <code>intervalPeriod</code> is set to <code>NONE</code>, this report is not considered to be a continuous one. By default, if not specified, the value of the parameter is set to <code>NONE</code>.
     *
     * @return self
     * @deprecated
     */
    public function setIntervalPeriod($interval_period)
    {
        $allowedValues = $this->getIntervalPeriodAllowableValues();
        if (!is_null($interval_period) && !in_array($interval_period, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'interval_period', must be one of '%s'",
                    $interval_period,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($interval_period)) {
            throw new \InvalidArgumentException('non-nullable interval_period cannot be null');
        }

        $this->container['interval_period'] = $interval_period;

        return $this;
    }

    /**
     * Gets interval
     *
     * @return int|null
     * @deprecated
     */
    public function getInterval()
    {
        return $this->container['interval'];
    }

    /**
     * Sets interval
     *
     * @param int|null $interval Defines how often a new report should be created. Depending on the <code>intervalPeriod</code>, the parameter can define different scales of intervals.
     *
     * @return self
     * @deprecated
     */
    public function setInterval($interval)
    {

        if (is_null($interval)) {
            throw new \InvalidArgumentException('non-nullable interval cannot be null');
        }

        $this->container['interval'] = $interval;

        return $this;
    }

    /**
     * Gets continuous_report
     *
     * @return \OpenAPIDataIntelligence\Client\Model\ContinuousReportResource|null
     */
    public function getContinuousReport()
    {
        return $this->container['continuous_report'];
    }

    /**
     * Sets continuous_report
     *
     * @param \OpenAPIDataIntelligence\Client\Model\ContinuousReportResource|null $continuous_report continuous_report
     *
     * @return self
     */
    public function setContinuousReport($continuous_report)
    {

        if (is_null($continuous_report)) {
            throw new \InvalidArgumentException('non-nullable continuous_report cannot be null');
        }

        $this->container['continuous_report'] = $continuous_report;

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


