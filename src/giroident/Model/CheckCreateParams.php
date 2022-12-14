<?php
/**
 * CheckCreateParams
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIGiroIdent\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * finAPI GiroIdent Services
 *
 * GiroIdent is an user identity check service. It validates the user's personal information against the user's bank account details, and optionally against the SCHUFA account check and identity check services.  The following documentation aims to provide guidance on how to use the GiroIdent API to carry out secure online verifications of end customers. The Service is based on a set of **Checks**. As a partner application, the recommended integration of these checks is as follows:  1. Partner application calls GiroIdent service **Create Check** with the relevant parameters. GiroIdent returns a GiroIdent Redirect URL. 1. Partner application *sends* (redirects) the user to \"Web Form Redirect URL\". 1. The user follows GiroIdent UI and grants GiroIdent access to her bank account. 1. The GiroIdent UI will optionally redirect the user to a result or error URL, if configured by the partner application (via query parameters appended to the Web Form Redirect URL). 1. The partner application checks the GiroIdent result using **Get Check** service and displays the result.  All API calls have to be autorized using an OAuth2 bearer token, which represents a finAPI user identity. Creating this user identity is a pre-requisite for using the GiroIdent services. This enables GiroIdent to be integrated in more advanced usecases, including other finAPI webservices like finAPI Access or finAPI Data Intelligence.  Detailed documentation related to use and integration can be found in the [GiroIdent developer documentation](https://documentation.finapi.io/gi2.0).  How to use the finAPI Web Form, and how to integrate it as website or web component, or to configure redirects after termination: finAPI Web Form [API documentation](https://docs.finapi.io/?product=web_form_2.0) and [public documentation](https://finapi.jira.com/wiki/spaces/FWFPD).  Related to user creation and retrieval of the required authorization token to use Giroident, refer to the [finAPI Access API documentation and REST client](https://docs-testing.finapi.io/) for the finAPI sandbox environment.  <sub>Application-Version: 1.30.0</sub>
 *
 * The version of the OpenAPI document: 2022.34.1
 * Contact: kontakt@finapi.io
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.2.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPIGiroIdent\Client\Model;

use \ArrayAccess;
use \OpenAPIGiroIdent\Client\ObjectSerializer;

/**
 * CheckCreateParams Class Doc Comment
 *
 * @category Class
 * @package  OpenAPIGiroIdent\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CheckCreateParams implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CheckCreateParams';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'first_name' => 'string',
        'last_name' => 'string',
        'iban' => 'string',
        'blz' => 'string',
        'external_id' => 'string',
        'callback_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'first_name' => null,
        'last_name' => null,
        'iban' => null,
        'blz' => null,
        'external_id' => null,
        'callback_url' => 'uri'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'first_name' => false,
		'last_name' => false,
		'iban' => false,
		'blz' => false,
		'external_id' => false,
		'callback_url' => false
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
        'first_name' => 'first-name',
        'last_name' => 'last-name',
        'iban' => 'iban',
        'blz' => 'blz',
        'external_id' => 'external-id',
        'callback_url' => 'callback-url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'iban' => 'setIban',
        'blz' => 'setBlz',
        'external_id' => 'setExternalId',
        'callback_url' => 'setCallbackUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'iban' => 'getIban',
        'blz' => 'getBlz',
        'external_id' => 'getExternalId',
        'callback_url' => 'getCallbackUrl'
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
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('iban', $data ?? [], null);
        $this->setIfExists('blz', $data ?? [], null);
        $this->setIfExists('external_id', $data ?? [], null);
        $this->setIfExists('callback_url', $data ?? [], null);
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

        if ($this->container['first_name'] === null) {
            $invalidProperties[] = "'first_name' can't be null";
        }
        if ((mb_strlen($this->container['first_name']) < 2)) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be bigger than or equal to 2.";
        }

        if ($this->container['last_name'] === null) {
            $invalidProperties[] = "'last_name' can't be null";
        }
        if ((mb_strlen($this->container['last_name']) < 2)) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be bigger than or equal to 2.";
        }

        if (!is_null($this->container['iban']) && (mb_strlen($this->container['iban']) > 64)) {
            $invalidProperties[] = "invalid value for 'iban', the character length must be smaller than or equal to 64.";
        }

        if (!is_null($this->container['blz']) && (mb_strlen($this->container['blz']) > 32)) {
            $invalidProperties[] = "invalid value for 'blz', the character length must be smaller than or equal to 32.";
        }

        if (!is_null($this->container['external_id']) && (mb_strlen($this->container['external_id']) > 255)) {
            $invalidProperties[] = "invalid value for 'external_id', the character length must be smaller than or equal to 255.";
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
     * @param string $first_name User's first name.
     *
     * @return self
     */
    public function setFirstName($first_name)
    {

        if ((mb_strlen($first_name) < 2)) {
            throw new \InvalidArgumentException('invalid length for $first_name when calling CheckCreateParams., must be bigger than or equal to 2.');
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
     * @param string $last_name User's last name
     *
     * @return self
     */
    public function setLastName($last_name)
    {

        if ((mb_strlen($last_name) < 2)) {
            throw new \InvalidArgumentException('invalid length for $last_name when calling CheckCreateParams., must be bigger than or equal to 2.');
        }


        if (is_null($last_name)) {
            throw new \InvalidArgumentException('non-nullable last_name cannot be null');
        }

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets iban
     *
     * @return string|null
     */
    public function getIban()
    {
        return $this->container['iban'];
    }

    /**
     * Sets iban
     *
     * @param string|null $iban User's IBAN. If either IBAN or BLZ is provided and GiroIdent finds the bank identified, user will be redirected to the bank-login page. If both are provided, IBAN will be considered. If neither parameters are provided user will be redirected to bank - selection page
     *
     * @return self
     */
    public function setIban($iban)
    {
        if (!is_null($iban) && (mb_strlen($iban) > 64)) {
            throw new \InvalidArgumentException('invalid length for $iban when calling CheckCreateParams., must be smaller than or equal to 64.');
        }


        if (is_null($iban)) {
            throw new \InvalidArgumentException('non-nullable iban cannot be null');
        }

        $this->container['iban'] = $iban;

        return $this;
    }

    /**
     * Gets blz
     *
     * @return string|null
     */
    public function getBlz()
    {
        return $this->container['blz'];
    }

    /**
     * Sets blz
     *
     * @param string|null $blz User's BLZ. See IBAN for details.
     *
     * @return self
     */
    public function setBlz($blz)
    {
        if (!is_null($blz) && (mb_strlen($blz) > 32)) {
            throw new \InvalidArgumentException('invalid length for $blz when calling CheckCreateParams., must be smaller than or equal to 32.');
        }


        if (is_null($blz)) {
            throw new \InvalidArgumentException('non-nullable blz cannot be null');
        }

        $this->container['blz'] = $blz;

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
     * @param string|null $external_id Client app specific ID to be stored with the check.
     *
     * @return self
     */
    public function setExternalId($external_id)
    {
        if (!is_null($external_id) && (mb_strlen($external_id) > 255)) {
            throw new \InvalidArgumentException('invalid length for $external_id when calling CheckCreateParams., must be smaller than or equal to 255.');
        }


        if (is_null($external_id)) {
            throw new \InvalidArgumentException('non-nullable external_id cannot be null');
        }

        $this->container['external_id'] = $external_id;

        return $this;
    }

    /**
     * Gets callback_url
     *
     * @return string|null
     */
    public function getCallbackUrl()
    {
        return $this->container['callback_url'];
    }

    /**
     * Sets callback_url
     *
     * @param string|null $callback_url URL to which the notification with the check result is sent. The notification is sent in case of a final state of the check is reached (<code>COMPLETED</code>, <code>COMPLETED_WITH_ERROR</code>). <br> <strong>Note:</strong> a secured connection is expected to be used for the notifications, unsecured callbacks may be blocked in future SW versions.
     *
     * @return self
     */
    public function setCallbackUrl($callback_url)
    {

        if (is_null($callback_url)) {
            throw new \InvalidArgumentException('non-nullable callback_url cannot be null');
        }

        $this->container['callback_url'] = $callback_url;

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


