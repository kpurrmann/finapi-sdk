<?php
/**
 * WeekDayEnum
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
use \OpenAPIDataIntelligence\Client\ObjectSerializer;

/**
 * WeekDayEnum Class Doc Comment
 *
 * @category Class
 * @package  OpenAPIDataIntelligence\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class WeekDayEnum
{
    /**
     * Possible values of this enum
     */
    public const MONDAY = 'MONDAY';

    public const TUESDAY = 'TUESDAY';

    public const WEDNESDAY = 'WEDNESDAY';

    public const THURSDAY = 'THURSDAY';

    public const FRIDAY = 'FRIDAY';

    public const SATURDAY = 'SATURDAY';

    public const SUNDAY = 'SUNDAY';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::MONDAY,
            self::TUESDAY,
            self::WEDNESDAY,
            self::THURSDAY,
            self::FRIDAY,
            self::SATURDAY,
            self::SUNDAY
        ];
    }
}


