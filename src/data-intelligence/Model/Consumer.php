<?php
/**
 * Consumer
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
 * Consumer Class Doc Comment
 *
 * @category Class
 * @description SCHUFA consumer, on behalf of this person the service will be called.
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Consumer implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Consumer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'schufa_id' => 'string',
        'title' => 'string',
        'gender' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'date_of_birth' => 'string',
        'place_of_birth' => 'string',
        'current_address' => '\OpenAPIDataIntelligence\Client\Model\Address'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'schufa_id' => null,
        'title' => null,
        'gender' => null,
        'first_name' => null,
        'last_name' => null,
        'date_of_birth' => null,
        'place_of_birth' => null,
        'current_address' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'schufa_id' => false,
		'title' => false,
		'gender' => false,
		'first_name' => false,
		'last_name' => false,
		'date_of_birth' => false,
		'place_of_birth' => false,
		'current_address' => false
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
        'schufa_id' => 'schufaId',
        'title' => 'title',
        'gender' => 'gender',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'date_of_birth' => 'dateOfBirth',
        'place_of_birth' => 'placeOfBirth',
        'current_address' => 'currentAddress'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'schufa_id' => 'setSchufaId',
        'title' => 'setTitle',
        'gender' => 'setGender',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'date_of_birth' => 'setDateOfBirth',
        'place_of_birth' => 'setPlaceOfBirth',
        'current_address' => 'setCurrentAddress'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'schufa_id' => 'getSchufaId',
        'title' => 'getTitle',
        'gender' => 'getGender',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'date_of_birth' => 'getDateOfBirth',
        'place_of_birth' => 'getPlaceOfBirth',
        'current_address' => 'getCurrentAddress'
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

    public const GENDER_F = 'F';
    public const GENDER_M = 'M';
    public const GENDER_U = 'U';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getGenderAllowableValues()
    {
        return [
            self::GENDER_F,
            self::GENDER_M,
            self::GENDER_U,
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
        $this->setIfExists('schufa_id', $data ?? [], null);
        $this->setIfExists('title', $data ?? [], null);
        $this->setIfExists('gender', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('date_of_birth', $data ?? [], null);
        $this->setIfExists('place_of_birth', $data ?? [], null);
        $this->setIfExists('current_address', $data ?? [], null);
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

        if (!is_null($this->container['schufa_id']) && (mb_strlen($this->container['schufa_id']) > 10)) {
            $invalidProperties[] = "invalid value for 'schufa_id', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['title']) && (mb_strlen($this->container['title']) > 30)) {
            $invalidProperties[] = "invalid value for 'title', the character length must be smaller than or equal to 30.";
        }

        if ($this->container['gender'] === null) {
            $invalidProperties[] = "'gender' can't be null";
        }
        $allowedValues = $this->getGenderAllowableValues();
        if (!is_null($this->container['gender']) && !in_array($this->container['gender'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'gender', must be one of '%s'",
                $this->container['gender'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['first_name'] === null) {
            $invalidProperties[] = "'first_name' can't be null";
        }
        if ((mb_strlen($this->container['first_name']) > 44)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be smaller than or equal to 44.";
        }

        if ((mb_strlen($this->container['first_name']) < 2)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['last_name'] === null) {
            $invalidProperties[] = "'last_name' can't be null";
        }
        if ((mb_strlen($this->container['last_name']) > 46)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be smaller than or equal to 46.";
        }

        if ((mb_strlen($this->container['last_name']) < 2)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['date_of_birth']) && (mb_strlen($this->container['date_of_birth']) > 10)) {
            $invalidProperties[] = "invalid value for 'date_of_birth', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['date_of_birth']) && (mb_strlen($this->container['date_of_birth']) < 10)) {
            $invalidProperties[] = "invalid value for 'date_of_birth', the character length must be bigger than or equal to 10.";
        }

        if (!is_null($this->container['date_of_birth']) && !preg_match("/\\d{4}\\-(0?[1-9]|1[012])\\-(0?[1-9]|[12][0-9]|3[01])$/", $this->container['date_of_birth'])) {
            $invalidProperties[] = "invalid value for 'date_of_birth', must be conform to the pattern /\\d{4}\\-(0?[1-9]|1[012])\\-(0?[1-9]|[12][0-9]|3[01])$/.";
        }

        if (!is_null($this->container['place_of_birth']) && (mb_strlen($this->container['place_of_birth']) > 24)) {
            $invalidProperties[] = "invalid value for 'place_of_birth', the character length must be smaller than or equal to 24.";
        }

        if (!is_null($this->container['place_of_birth']) && (mb_strlen($this->container['place_of_birth']) < 2)) {
            $invalidProperties[] = "invalid value for 'place_of_birth', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['current_address'] === null) {
            $invalidProperties[] = "'current_address' can't be null";
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
     * Gets schufa_id
     *
     * @return string|null
     */
    public function getSchufaId()
    {
        return $this->container['schufa_id'];
    }

    /**
     * Sets schufa_id
     *
     * @param string|null $schufa_id SCHUFA internal user ID (only required for 'Basiskontoauskunft').
     *
     * @return self
     */
    public function setSchufaId($schufa_id)
    {
        if (!is_null($schufa_id) && (mb_strlen($schufa_id) > 10)) {
            throw new \InvalidArgumentException('invalid length for $schufa_id when calling Consumer., must be smaller than or equal to 10.');
        }


        if (is_null($schufa_id)) {
            throw new \InvalidArgumentException('non-nullable schufa_id cannot be null');
        }

        $this->container['schufa_id'] = $schufa_id;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string|null $title Consumer's title.
     *
     * @return self
     */
    public function setTitle($title)
    {
        if (!is_null($title) && (mb_strlen($title) > 30)) {
            throw new \InvalidArgumentException('invalid length for $title when calling Consumer., must be smaller than or equal to 30.');
        }


        if (is_null($title)) {
            throw new \InvalidArgumentException('non-nullable title cannot be null');
        }

        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->container['gender'];
    }

    /**
     * Sets gender
     *
     * @param string $gender Consumer's gender. It can contain the following enums: <ul>   <li>F - Female</li>   <li>M - Male</li>   <li>U - Unknown</li> </ul>
     *
     * @return self
     */
    public function setGender($gender)
    {
        $allowedValues = $this->getGenderAllowableValues();
        if (!in_array($gender, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'gender', must be one of '%s'",
                    $gender,
                    implode("', '", $allowedValues)
                )
            );
        }

        if (is_null($gender)) {
            throw new \InvalidArgumentException('non-nullable gender cannot be null');
        }

        $this->container['gender'] = $gender;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string $first_name Consumers's first name.
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        if ((mb_strlen($first_name) > 44)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling Consumer., must be smaller than or equal to 44.');
        }
        if ((mb_strlen($first_name) < 2)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling Consumer., must be bigger than or equal to 2.');
        }


        if (is_null($first_name)) {
            throw new \InvalidArgumentException('non-nullable first_name cannot be null');
        }

        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string $last_name Consumers's last name
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        if ((mb_strlen($last_name) > 46)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling Consumer., must be smaller than or equal to 46.');
        }
        if ((mb_strlen($last_name) < 2)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling Consumer., must be bigger than or equal to 2.');
        }


        if (is_null($last_name)) {
            throw new \InvalidArgumentException('non-nullable last_name cannot be null');
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets date_of_birth
     *
     * @return string|null
     */
    public function getDateOfBirth()
    {
        return $this->container['date_of_birth'];
    }

    /**
     * Sets date_of_birth
     *
     * @param string|null $date_of_birth Consumers's date of birth in the format '<code>YYYY-MM-DD</code>'.
     *
     * @return self
     */
    public function setDateOfBirth($date_of_birth)
    {
        if (!is_null($date_of_birth) && (mb_strlen($date_of_birth) > 10)) {
            throw new \InvalidArgumentException('invalid length for $date_of_birth when calling Consumer., must be smaller than or equal to 10.');
        }
        if (!is_null($date_of_birth) && (mb_strlen($date_of_birth) < 10)) {
            throw new \InvalidArgumentException('invalid length for $date_of_birth when calling Consumer., must be bigger than or equal to 10.');
        }
        if (!is_null($date_of_birth) && (!preg_match("/\\d{4}\\-(0?[1-9]|1[012])\\-(0?[1-9]|[12][0-9]|3[01])$/", $date_of_birth))) {
            throw new \InvalidArgumentException("invalid value for \$date_of_birth when calling Consumer., must conform to the pattern /\\d{4}\\-(0?[1-9]|1[012])\\-(0?[1-9]|[12][0-9]|3[01])$/.");
        }


        if (is_null($date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable date_of_birth cannot be null');
        }

        $this->container['date_of_birth'] = $date_of_birth;

        return $this;
    }

    /**
     * Gets place_of_birth
     *
     * @return string|null
     */
    public function getPlaceOfBirth()
    {
        return $this->container['place_of_birth'];
    }

    /**
     * Sets place_of_birth
     *
     * @param string|null $place_of_birth Consumers place of birth
     *
     * @return self
     */
    public function setPlaceOfBirth($place_of_birth)
    {
        if (!is_null($place_of_birth) && (mb_strlen($place_of_birth) > 24)) {
            throw new \InvalidArgumentException('invalid length for $place_of_birth when calling Consumer., must be smaller than or equal to 24.');
        }
        if (!is_null($place_of_birth) && (mb_strlen($place_of_birth) < 2)) {
            throw new \InvalidArgumentException('invalid length for $place_of_birth when calling Consumer., must be bigger than or equal to 2.');
        }


        if (is_null($place_of_birth)) {
            throw new \InvalidArgumentException('non-nullable place_of_birth cannot be null');
        }

        $this->container['place_of_birth'] = $place_of_birth;

        return $this;
    }

    /**
     * Gets current_address
     *
     * @return \OpenAPIDataIntelligence\Client\Model\Address
     */
    public function getCurrentAddress()
    {
        return $this->container['current_address'];
    }

    /**
     * Sets current_address
     *
     * @param \OpenAPIDataIntelligence\Client\Model\Address $current_address current_address
     *
     * @return self
     */
    public function setCurrentAddress($current_address)
    {

        if (is_null($current_address)) {
            throw new \InvalidArgumentException('non-nullable current_address cannot be null');
        }

        $this->container['current_address'] = $current_address;

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


