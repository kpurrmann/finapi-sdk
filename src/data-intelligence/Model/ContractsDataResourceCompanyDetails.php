<?php
/**
 * ContractsDataResourceCompanyDetails
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
 * ContractsDataResourceCompanyDetails Class Doc Comment
 *
 * @category Class
 * @description Data of the company with which the contract was concluded
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ContractsDataResourceCompanyDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ContractsDataResource_companyDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'company_id' => 'string',
        'address_city' => 'string',
        'address_country' => 'string',
        'address_zip' => 'string',
        'address_street_name' => 'string',
        'address_street_number' => 'string',
        'contact_mail' => 'string',
        'contact_phone' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'company_id' => null,
        'address_city' => null,
        'address_country' => null,
        'address_zip' => null,
        'address_street_name' => null,
        'address_street_number' => null,
        'contact_mail' => null,
        'contact_phone' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'company_id' => false,
		'address_city' => false,
		'address_country' => false,
		'address_zip' => false,
		'address_street_name' => false,
		'address_street_number' => false,
		'contact_mail' => false,
		'contact_phone' => false
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
        'company_id' => 'companyId',
        'address_city' => 'addressCity',
        'address_country' => 'addressCountry',
        'address_zip' => 'addressZip',
        'address_street_name' => 'addressStreetName',
        'address_street_number' => 'addressStreetNumber',
        'contact_mail' => 'contactMail',
        'contact_phone' => 'contactPhone'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'company_id' => 'setCompanyId',
        'address_city' => 'setAddressCity',
        'address_country' => 'setAddressCountry',
        'address_zip' => 'setAddressZip',
        'address_street_name' => 'setAddressStreetName',
        'address_street_number' => 'setAddressStreetNumber',
        'contact_mail' => 'setContactMail',
        'contact_phone' => 'setContactPhone'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'company_id' => 'getCompanyId',
        'address_city' => 'getAddressCity',
        'address_country' => 'getAddressCountry',
        'address_zip' => 'getAddressZip',
        'address_street_name' => 'getAddressStreetName',
        'address_street_number' => 'getAddressStreetNumber',
        'contact_mail' => 'getContactMail',
        'contact_phone' => 'getContactPhone'
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
        $this->setIfExists('company_id', $data ?? [], null);
        $this->setIfExists('address_city', $data ?? [], null);
        $this->setIfExists('address_country', $data ?? [], null);
        $this->setIfExists('address_zip', $data ?? [], null);
        $this->setIfExists('address_street_name', $data ?? [], null);
        $this->setIfExists('address_street_number', $data ?? [], null);
        $this->setIfExists('contact_mail', $data ?? [], null);
        $this->setIfExists('contact_phone', $data ?? [], null);
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

        if ($this->container['company_id'] === null) {
            $invalidProperties[] = "'company_id' can't be null";
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
     * Gets company_id
     *
     * @return string
     */
    public function getCompanyId()
    {
        return $this->container['company_id'];
    }

    /**
     * Sets company_id
     *
     * @param string $company_id UUID of the company
     *
     * @return self
     */
    public function setCompanyId($company_id)
    {

        if (is_null($company_id)) {
            throw new \InvalidArgumentException('non-nullable company_id cannot be null');
        }

        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets address_city
     *
     * @return string|null
     */
    public function getAddressCity()
    {
        return $this->container['address_city'];
    }

    /**
     * Sets address_city
     *
     * @param string|null $address_city City where the company is located
     *
     * @return self
     */
    public function setAddressCity($address_city)
    {

        if (is_null($address_city)) {
            throw new \InvalidArgumentException('non-nullable address_city cannot be null');
        }

        $this->container['address_city'] = $address_city;

        return $this;
    }

    /**
     * Gets address_country
     *
     * @return string|null
     */
    public function getAddressCountry()
    {
        return $this->container['address_country'];
    }

    /**
     * Sets address_country
     *
     * @param string|null $address_country Country where the company is located
     *
     * @return self
     */
    public function setAddressCountry($address_country)
    {

        if (is_null($address_country)) {
            throw new \InvalidArgumentException('non-nullable address_country cannot be null');
        }

        $this->container['address_country'] = $address_country;

        return $this;
    }

    /**
     * Gets address_zip
     *
     * @return string|null
     */
    public function getAddressZip()
    {
        return $this->container['address_zip'];
    }

    /**
     * Sets address_zip
     *
     * @param string|null $address_zip Zip code of the company's location
     *
     * @return self
     */
    public function setAddressZip($address_zip)
    {

        if (is_null($address_zip)) {
            throw new \InvalidArgumentException('non-nullable address_zip cannot be null');
        }

        $this->container['address_zip'] = $address_zip;

        return $this;
    }

    /**
     * Gets address_street_name
     *
     * @return string|null
     */
    public function getAddressStreetName()
    {
        return $this->container['address_street_name'];
    }

    /**
     * Sets address_street_name
     *
     * @param string|null $address_street_name Name of the street where the company is located
     *
     * @return self
     */
    public function setAddressStreetName($address_street_name)
    {

        if (is_null($address_street_name)) {
            throw new \InvalidArgumentException('non-nullable address_street_name cannot be null');
        }

        $this->container['address_street_name'] = $address_street_name;

        return $this;
    }

    /**
     * Gets address_street_number
     *
     * @return string|null
     */
    public function getAddressStreetNumber()
    {
        return $this->container['address_street_number'];
    }

    /**
     * Sets address_street_number
     *
     * @param string|null $address_street_number Number of the street where the company is located
     *
     * @return self
     */
    public function setAddressStreetNumber($address_street_number)
    {

        if (is_null($address_street_number)) {
            throw new \InvalidArgumentException('non-nullable address_street_number cannot be null');
        }

        $this->container['address_street_number'] = $address_street_number;

        return $this;
    }

    /**
     * Gets contact_mail
     *
     * @return string|null
     */
    public function getContactMail()
    {
        return $this->container['contact_mail'];
    }

    /**
     * Sets contact_mail
     *
     * @param string|null $contact_mail Contact mail address of the company
     *
     * @return self
     */
    public function setContactMail($contact_mail)
    {

        if (is_null($contact_mail)) {
            throw new \InvalidArgumentException('non-nullable contact_mail cannot be null');
        }

        $this->container['contact_mail'] = $contact_mail;

        return $this;
    }

    /**
     * Gets contact_phone
     *
     * @return string|null
     */
    public function getContactPhone()
    {
        return $this->container['contact_phone'];
    }

    /**
     * Sets contact_phone
     *
     * @param string|null $contact_phone Phone number of the company
     *
     * @return self
     */
    public function setContactPhone($contact_phone)
    {

        if (is_null($contact_phone)) {
            throw new \InvalidArgumentException('non-nullable contact_phone cannot be null');
        }

        $this->container['contact_phone'] = $contact_phone;

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


