<?php
/**
 * DataSourceBank
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
 * DataSourceBank Class Doc Comment
 *
 * @category Class
 * @description Available banks for the user
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DataSourceBank implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DataSourceBank';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'data_source_id' => 'string',
        'creation_date' => 'string',
        'last_update' => 'string',
        'external_id' => 'string',
        'bic' => 'string',
        'bank_name' => 'string',
        'bank_status' => 'string',
        'update_required' => 'bool',
        'accounts' => '\OpenAPIDataIntelligence\Client\Model\DataSourceAccount[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'data_source_id' => null,
        'creation_date' => null,
        'last_update' => null,
        'external_id' => null,
        'bic' => null,
        'bank_name' => null,
        'bank_status' => null,
        'update_required' => null,
        'accounts' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'data_source_id' => false,
		'creation_date' => false,
		'last_update' => false,
		'external_id' => false,
		'bic' => false,
		'bank_name' => false,
		'bank_status' => false,
		'update_required' => false,
		'accounts' => false
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
        'data_source_id' => 'dataSourceId',
        'creation_date' => 'creationDate',
        'last_update' => 'lastUpdate',
        'external_id' => 'externalId',
        'bic' => 'bic',
        'bank_name' => 'bankName',
        'bank_status' => 'bankStatus',
        'update_required' => 'updateRequired',
        'accounts' => 'accounts'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'data_source_id' => 'setDataSourceId',
        'creation_date' => 'setCreationDate',
        'last_update' => 'setLastUpdate',
        'external_id' => 'setExternalId',
        'bic' => 'setBic',
        'bank_name' => 'setBankName',
        'bank_status' => 'setBankStatus',
        'update_required' => 'setUpdateRequired',
        'accounts' => 'setAccounts'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'data_source_id' => 'getDataSourceId',
        'creation_date' => 'getCreationDate',
        'last_update' => 'getLastUpdate',
        'external_id' => 'getExternalId',
        'bic' => 'getBic',
        'bank_name' => 'getBankName',
        'bank_status' => 'getBankStatus',
        'update_required' => 'getUpdateRequired',
        'accounts' => 'getAccounts'
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

    public const BANK_STATUS_FAILED = 'FAILED';
    public const BANK_STATUS_IN_PROGRESS = 'IN_PROGRESS';
    public const BANK_STATUS_SUCCESSFUL = 'SUCCESSFUL';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBankStatusAllowableValues()
    {
        return [
            self::BANK_STATUS_FAILED,
            self::BANK_STATUS_IN_PROGRESS,
            self::BANK_STATUS_SUCCESSFUL,
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
        $this->setIfExists('data_source_id', $data ?? [], null);
        $this->setIfExists('creation_date', $data ?? [], null);
        $this->setIfExists('last_update', $data ?? [], null);
        $this->setIfExists('external_id', $data ?? [], null);
        $this->setIfExists('bic', $data ?? [], null);
        $this->setIfExists('bank_name', $data ?? [], null);
        $this->setIfExists('bank_status', $data ?? [], null);
        $this->setIfExists('update_required', $data ?? [], null);
        $this->setIfExists('accounts', $data ?? [], null);
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

        if ($this->container['data_source_id'] === null) {
            $invalidProperties[] = "'data_source_id' can't be null";
        }
        if ($this->container['creation_date'] === null) {
            $invalidProperties[] = "'creation_date' can't be null";
        }
        $allowedValues = $this->getBankStatusAllowableValues();
        if (!is_null($this->container['bank_status']) && !in_array($this->container['bank_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'bank_status', must be one of '%s'",
                $this->container['bank_status'],
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
     * Gets data_source_id
     *
     * @return string
     */
    public function getDataSourceId()
    {
        return $this->container['data_source_id'];
    }

    /**
     * Sets data_source_id
     *
     * @param string $data_source_id UUID of the data source.
     *
     * @return self
     */
    public function setDataSourceId($data_source_id)
    {

        if (is_null($data_source_id)) {
            throw new \InvalidArgumentException('non-nullable data_source_id cannot be null');
        }

        $this->container['data_source_id'] = $data_source_id;

        return $this;
    }

    /**
     * Gets creation_date
     *
     * @return string
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param string $creation_date Creation date of the data source, in the format '<code>YYYY-MM-DD HH:MM:SS</code>' (CET Europe / Berlin)
     *
     * @return self
     */
    public function setCreationDate($creation_date)
    {

        if (is_null($creation_date)) {
            throw new \InvalidArgumentException('non-nullable creation_date cannot be null');
        }

        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets last_update
     *
     * @return string|null
     */
    public function getLastUpdate()
    {
        return $this->container['last_update'];
    }

    /**
     * Sets last_update
     *
     * @param string|null $last_update Date of the last update of the data source, in the format '<code>YYYY-MM-DD HH:MM:SS</code>' (CET Europe / Berlin)
     *
     * @return self
     */
    public function setLastUpdate($last_update)
    {

        if (is_null($last_update)) {
            throw new \InvalidArgumentException('non-nullable last_update cannot be null');
        }

        $this->container['last_update'] = $last_update;

        return $this;
    }

    /**
     * Gets external_id
     *
     * @return string|null
     */
    public function getExternalId()
    {
        return $this->container['external_id'];
    }

    /**
     * Sets external_id
     *
     * @param string|null $external_id External ID of the datasource. For Banks imported from finAPI Access, this is the Access <code>bankConnectionId</code>.
     *
     * @return self
     */
    public function setExternalId($external_id)
    {

        if (is_null($external_id)) {
            throw new \InvalidArgumentException('non-nullable external_id cannot be null');
        }

        $this->container['external_id'] = $external_id;

        return $this;
    }

    /**
     * Gets bic
     *
     * @return string|null
     */
    public function getBic()
    {
        return $this->container['bic'];
    }

    /**
     * Sets bic
     *
     * @param string|null $bic BIC of the bank
     *
     * @return self
     */
    public function setBic($bic)
    {

        if (is_null($bic)) {
            throw new \InvalidArgumentException('non-nullable bic cannot be null');
        }

        $this->container['bic'] = $bic;

        return $this;
    }

    /**
     * Gets bank_name
     *
     * @return string|null
     */
    public function getBankName()
    {
        return $this->container['bank_name'];
    }

    /**
     * Sets bank_name
     *
     * @param string|null $bank_name Name of the bank
     *
     * @return self
     */
    public function setBankName($bank_name)
    {

        if (is_null($bank_name)) {
            throw new \InvalidArgumentException('non-nullable bank_name cannot be null');
        }

        $this->container['bank_name'] = $bank_name;

        return $this;
    }

    /**
     * Gets bank_status
     *
     * @return string|null
     */
    public function getBankStatus()
    {
        return $this->container['bank_status'];
    }

    /**
     * Sets bank_status
     *
     * @param string|null $bank_status Status of the connection to the bank
     *
     * @return self
     */
    public function setBankStatus($bank_status)
    {
        $allowedValues = $this->getBankStatusAllowableValues();
        if (!is_null($bank_status) && !in_array($bank_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'bank_status', must be one of '%s'",
                    $bank_status,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($bank_status)) {
            throw new \InvalidArgumentException('non-nullable bank_status cannot be null');
        }

        $this->container['bank_status'] = $bank_status;

        return $this;
    }

    /**
     * Gets update_required
     *
     * @return bool|null
     */
    public function getUpdateRequired()
    {
        return $this->container['update_required'];
    }

    /**
     * Sets update_required
     *
     * @param bool|null $update_required the bank's consent for account access has expired, the user has to update bank connection in finAPI Access,  otherwise the next datasource synchronization will fail.
     *
     * @return self
     */
    public function setUpdateRequired($update_required)
    {

        if (is_null($update_required)) {
            throw new \InvalidArgumentException('non-nullable update_required cannot be null');
        }

        $this->container['update_required'] = $update_required;

        return $this;
    }

    /**
     * Gets accounts
     *
     * @return \OpenAPIDataIntelligence\Client\Model\DataSourceAccount[]|null
     */
    public function getAccounts()
    {
        return $this->container['accounts'];
    }

    /**
     * Sets accounts
     *
     * @param \OpenAPIDataIntelligence\Client\Model\DataSourceAccount[]|null $accounts Array of accounts imported via bank connection
     *
     * @return self
     */
    public function setAccounts($accounts)
    {

        if (is_null($accounts)) {
            throw new \InvalidArgumentException('non-nullable accounts cannot be null');
        }

        $this->container['accounts'] = $accounts;

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


