<?php
/**
 * Currency
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * finAPI Access V2
 *
 * <strong>RESTful API for Account Information Services (AIS) and Payment Initiation Services (PIS)</strong> <br/> <strong>Application Version:</strong> 2.6.2 <br/>  The following pages give you some general information on how to use our APIs.<br/> The actual API services documentation then follows further below. You can use the menu to jump between API sections. <br/> <br/> This page has a built-in HTTP(S) client, so you can test the services directly from within this page, by filling in the request parameters and/or body in the respective services, and then hitting the TRY button. Note that you need to be authorized to make a successful API call. To authorize, refer to the 'Authorization' section of the API, or just use the OAUTH button that can be found near the TRY button. <br/>  <h2 id=\"general-information\">General information</h2>  <h3 id=\"general-error-responses\"><strong>Error Responses</strong></h3> When an API call returns with an error, then in general it has the structure shown in the following example:  <pre> {   \"errors\": [     {       \"message\": \"Interface 'FINTS_SERVER' is not supported for this operation.\",       \"code\": \"BAD_REQUEST\",       \"type\": \"TECHNICAL\"     }   ],   \"date\": \"2020-11-19T16:54:06.854+01:00\",   \"requestId\": \"selfgen-312042e7-df55-47e4-bffd-956a68ef37b5\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/21\",   \"bank\": \"DEMO0002 - finAPI Test Redirect Bank\" } </pre>  If an API call requires an additional authentication by the user, HTTP code 510 is returned and the error response contains the additional \"multiStepAuthentication\" object, see the following example:  <pre> {   \"errors\": [     {       \"message\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",       \"code\": \"ADDITIONAL_AUTHENTICATION_REQUIRED\",       \"type\": \"BUSINESS\",       \"multiStepAuthentication\": {         \"hash\": \"678b13f4be9ed7d981a840af8131223a\",         \"status\": \"CHALLENGE_RESPONSE_REQUIRED\",         \"challengeMessage\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",         \"answerFieldLabel\": \"TAN\",         \"redirectUrl\": null,         \"redirectContext\": null,         \"redirectContextField\": null,         \"twoStepProcedures\": null,         \"photoTanMimeType\": null,         \"photoTanData\": null,         \"opticalData\": null,         \"opticalDataAsReinerSct\": false       }     }   ],   \"date\": \"2019-11-29T09:51:55.931+01:00\",   \"requestId\": \"selfgen-45059c99-1b14-4df7-9bd3-9d5f126df294\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/18\",   \"bank\": \"DEMO0001 - finAPI Test Bank\" } </pre>  An exception to this error format are API authentication errors, where the following structure is returned:  <pre> {   \"error\": \"invalid_token\",   \"error_description\": \"Invalid access token: cccbce46-xxxx-xxxx-xxxx-xxxxxxxxxx\" } </pre>  <h3 id=\"general-paging\"><strong>Paging</strong></h3> API services that may potentially return a lot of data implement paging. They return a limited number of entries within a \"page\". Further entries must be fetched with subsequent calls. <br/><br/> Any API service that implements paging provides the following input parameters:<br/> &bull; \"page\": the number of the page to be retrieved (starting with 1).<br/> &bull; \"perPage\": the number of entries within a page. The default and maximum value is stated in the documentation of the respective services.  A paged response contains an additional \"paging\" object with the following structure:  <pre> {   ...   ,   \"paging\": {     \"page\": 1,     \"perPage\": 20,     \"pageCount\": 234,     \"totalCount\": 4662   } } </pre>  <h3 id=\"general-internationalization\"><strong>Internationalization</strong></h3> The finAPI services support internationalization which means you can define the language you prefer for API service responses. <br/><br/> The following languages are available: German, English, Czech, Slovak. <br/><br/> The preferred language can be defined by providing the official HTTP <strong>Accept-Language</strong> header. <br/><br/> finAPI reacts on the official iso language codes &quot;de&quot;, &quot;en&quot;, &quot;cs&quot; and &quot;sk&quot; for the named languages. Additional subtags supported by the Accept-Language header may be provided, e.g. &quot;en-US&quot;, but are ignored. <br/> If no Accept-Language header is given, German is used as the default language. <br/><br/> Exceptions:<br/> &bull; Bank login hints and login fields are only available in the language of the bank and not being translated.<br/> &bull; Direct messages from the bank systems typically returned as BUSINESS errors will not be translated.<br/> &bull; BUSINESS errors created by finAPI directly are available in German and English.<br/> &bull; TECHNICAL errors messages meant for developers are mostly in English, but also may be translated.  <h3 id=\"general-request-ids\"><strong>Request IDs</strong></h3> With any API call, you can pass a request ID via a header with name \"X-Request-Id\". The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. <br/><br/> If you don't pass a request ID for a call, finAPI will generate a random ID internally. <br/><br/> The request ID is always returned back in the response of a service, as a header with name \"X-Request-Id\". <br/><br/> We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster.  <h3 id=\"general-overriding-http-methods\"><strong>Overriding HTTP methods</strong></h3> Some HTTP clients do not support the HTTP methods PATCH or DELETE. If you are using such a client in your application, you can use a POST request instead with a special HTTP header indicating the originally intended HTTP method. <br/><br/> The header's name is <strong>X-HTTP-Method-Override</strong>. Set its value to either <strong>PATCH</strong> or <strong>DELETE</strong>. POST Requests having this header set will be treated either as PATCH or DELETE by the finAPI servers. <br/><br/> Example: <br/><br/> <strong>X-HTTP-Method-Override: PATCH</strong><br/> POST /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/><br/> will be interpreted by finAPI as:<br/><br/> PATCH /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/>  <h3 id=\"general-user-metadata\"><strong>User metadata</strong></h3> With the migration to PSD2 APIs, a new term called \"User metadata\" (also known as \"PSU metadata\") has been introduced to the API. This user metadata aims to inform the banking API if there was a real end-user behind an HTTP request or if the request was triggered by a system (e.g. by an automatic batch update). In the latter case, the bank may apply some restrictions such as limiting the number of HTTP requests for a single consent. Also, some operations may be forbidden entirely by the banking API. For example, some banks do not allow issuing a new consent without the end-user being involved. Therefore, it is certainly necessary and obligatory for the customer to provide the PSU metadata for such operations. <br/><br/> As finAPI does not have direct interaction with the end-user, it is the client application's responsibility to provide all the necessary information about the end-user. This must be done by sending additional headers with every request triggered on behalf of the end-user. <br/><br/> At the moment, the following headers are supported by the API:<br/> &bull; \"PSU-IP-Address\" - the IP address of the user's device.<br/> &bull; \"PSU-Device-OS\" - the user's device and/or operating system identification.<br/> &bull; \"PSU-User-Agent\" - the user's web browser or other client device identification.  <h3 id=\"general-faq\"><strong>FAQ</strong></h3> <strong>Is there a finAPI SDK?</strong> <br/> Currently we do not offer a native SDK, but there is the option to generate an SDK for almost any target language via OpenAPI. Use the 'Download SDK' button on this page for SDK generation. <br/> <br/> <strong>How can I enable finAPI's automatic batch update?</strong> <br/> Currently there is no way to set up the batch update via the API. Please contact support@finapi.io for this. <br/> <br/> <strong>Why do I need to keep authorizing when calling services on this page?</strong> <br/> This page is a \"one-page-app\". Reloading the page resets the OAuth authorization context. There is generally no need to reload the page, so just don't do it and your authorization will persist.
 *
 * The version of the OpenAPI document: 2023.03.3
 * Contact: kontakt@finapi.io
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.1.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPIAccess\Client\Model;
use \OpenAPIAccess\Client\ObjectSerializer;

/**
 * Currency Class Doc Comment
 *
 * @category Class
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class Currency
{
    /**
     * Possible values of this enum
     */
    public const AED = 'AED';

    public const AFN = 'AFN';

    public const ALL = 'ALL';

    public const AMD = 'AMD';

    public const ANG = 'ANG';

    public const AOA = 'AOA';

    public const ARS = 'ARS';

    public const AUD = 'AUD';

    public const AWG = 'AWG';

    public const AZN = 'AZN';

    public const BAM = 'BAM';

    public const BBD = 'BBD';

    public const BDT = 'BDT';

    public const BGN = 'BGN';

    public const BHD = 'BHD';

    public const BIF = 'BIF';

    public const BMD = 'BMD';

    public const BND = 'BND';

    public const BOB = 'BOB';

    public const BOV = 'BOV';

    public const BRL = 'BRL';

    public const BSD = 'BSD';

    public const BTN = 'BTN';

    public const BWP = 'BWP';

    public const BYN = 'BYN';

    public const BZD = 'BZD';

    public const CAD = 'CAD';

    public const CDF = 'CDF';

    public const CHE = 'CHE';

    public const CHF = 'CHF';

    public const CHN = 'CHN';

    public const CHW = 'CHW';

    public const CLF = 'CLF';

    public const CLP = 'CLP';

    public const CNY = 'CNY';

    public const COP = 'COP';

    public const COU = 'COU';

    public const CRC = 'CRC';

    public const CUC = 'CUC';

    public const CUP = 'CUP';

    public const CVE = 'CVE';

    public const CZK = 'CZK';

    public const DJF = 'DJF';

    public const DKK = 'DKK';

    public const DOP = 'DOP';

    public const DZD = 'DZD';

    public const EGP = 'EGP';

    public const ERN = 'ERN';

    public const ETB = 'ETB';

    public const EUR = 'EUR';

    public const FJD = 'FJD';

    public const FKP = 'FKP';

    public const GBP = 'GBP';

    public const GEL = 'GEL';

    public const GGP = 'GGP';

    public const GHS = 'GHS';

    public const GIP = 'GIP';

    public const GMD = 'GMD';

    public const GNF = 'GNF';

    public const GTQ = 'GTQ';

    public const GYD = 'GYD';

    public const HKD = 'HKD';

    public const HNL = 'HNL';

    public const HRK = 'HRK';

    public const HTG = 'HTG';

    public const HUF = 'HUF';

    public const IDR = 'IDR';

    public const ILS = 'ILS';

    public const IMP = 'IMP';

    public const INR = 'INR';

    public const IQD = 'IQD';

    public const IRR = 'IRR';

    public const ISK = 'ISK';

    public const JEP = 'JEP';

    public const JMD = 'JMD';

    public const JOD = 'JOD';

    public const JPY = 'JPY';

    public const KES = 'KES';

    public const KGS = 'KGS';

    public const KHR = 'KHR';

    public const KID = 'KID';

    public const KMF = 'KMF';

    public const KPW = 'KPW';

    public const KRW = 'KRW';

    public const KWD = 'KWD';

    public const KYD = 'KYD';

    public const KZT = 'KZT';

    public const LAK = 'LAK';

    public const LBP = 'LBP';

    public const LKR = 'LKR';

    public const LRD = 'LRD';

    public const LSL = 'LSL';

    public const LYD = 'LYD';

    public const MAD = 'MAD';

    public const MDL = 'MDL';

    public const MGA = 'MGA';

    public const MKD = 'MKD';

    public const MMK = 'MMK';

    public const MNT = 'MNT';

    public const MOP = 'MOP';

    public const MRU = 'MRU';

    public const MUR = 'MUR';

    public const MVR = 'MVR';

    public const MWK = 'MWK';

    public const MXN = 'MXN';

    public const MXV = 'MXV';

    public const MYR = 'MYR';

    public const MZN = 'MZN';

    public const NAD = 'NAD';

    public const NGN = 'NGN';

    public const NIO = 'NIO';

    public const NIS = 'NIS';

    public const NOK = 'NOK';

    public const NPR = 'NPR';

    public const NTD = 'NTD';

    public const NZD = 'NZD';

    public const OMR = 'OMR';

    public const PAB = 'PAB';

    public const PEN = 'PEN';

    public const PGK = 'PGK';

    public const PHP = 'PHP';

    public const PKR = 'PKR';

    public const PLN = 'PLN';

    public const PRB = 'PRB';

    public const PYG = 'PYG';

    public const QAR = 'QAR';

    public const RMB = 'RMB';

    public const RON = 'RON';

    public const RSD = 'RSD';

    public const RUB = 'RUB';

    public const RWF = 'RWF';

    public const SAR = 'SAR';

    public const SBD = 'SBD';

    public const SCR = 'SCR';

    public const SDG = 'SDG';

    public const SEK = 'SEK';

    public const SGD = 'SGD';

    public const SHP = 'SHP';

    public const SLL = 'SLL';

    public const SLS = 'SLS';

    public const SOS = 'SOS';

    public const SRD = 'SRD';

    public const SSP = 'SSP';

    public const STN = 'STN';

    public const SVC = 'SVC';

    public const SYP = 'SYP';

    public const SZL = 'SZL';

    public const THB = 'THB';

    public const TJS = 'TJS';

    public const TMT = 'TMT';

    public const TND = 'TND';

    public const TOP = 'TOP';

    public const _TRY = 'TRY';

    public const TTD = 'TTD';

    public const TVD = 'TVD';

    public const TWD = 'TWD';

    public const TZS = 'TZS';

    public const UAH = 'UAH';

    public const UGX = 'UGX';

    public const USD = 'USD';

    public const USN = 'USN';

    public const UYI = 'UYI';

    public const UYU = 'UYU';

    public const UYW = 'UYW';

    public const UZS = 'UZS';

    public const VEF = 'VEF';

    public const VES = 'VES';

    public const VND = 'VND';

    public const VUV = 'VUV';

    public const WST = 'WST';

    public const XAF = 'XAF';

    public const XAG = 'XAG';

    public const XAU = 'XAU';

    public const XBA = 'XBA';

    public const XBB = 'XBB';

    public const XBC = 'XBC';

    public const XBD = 'XBD';

    public const XCD = 'XCD';

    public const XDR = 'XDR';

    public const XOF = 'XOF';

    public const XPD = 'XPD';

    public const XPF = 'XPF';

    public const XPT = 'XPT';

    public const XSU = 'XSU';

    public const XTS = 'XTS';

    public const XUA = 'XUA';

    public const XXX = 'XXX';

    public const YER = 'YER';

    public const ZAR = 'ZAR';

    public const ZMW = 'ZMW';

    public const ZWB = 'ZWB';

    public const ZWL = 'ZWL';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::AED,
            self::AFN,
            self::ALL,
            self::AMD,
            self::ANG,
            self::AOA,
            self::ARS,
            self::AUD,
            self::AWG,
            self::AZN,
            self::BAM,
            self::BBD,
            self::BDT,
            self::BGN,
            self::BHD,
            self::BIF,
            self::BMD,
            self::BND,
            self::BOB,
            self::BOV,
            self::BRL,
            self::BSD,
            self::BTN,
            self::BWP,
            self::BYN,
            self::BZD,
            self::CAD,
            self::CDF,
            self::CHE,
            self::CHF,
            self::CHN,
            self::CHW,
            self::CLF,
            self::CLP,
            self::CNY,
            self::COP,
            self::COU,
            self::CRC,
            self::CUC,
            self::CUP,
            self::CVE,
            self::CZK,
            self::DJF,
            self::DKK,
            self::DOP,
            self::DZD,
            self::EGP,
            self::ERN,
            self::ETB,
            self::EUR,
            self::FJD,
            self::FKP,
            self::GBP,
            self::GEL,
            self::GGP,
            self::GHS,
            self::GIP,
            self::GMD,
            self::GNF,
            self::GTQ,
            self::GYD,
            self::HKD,
            self::HNL,
            self::HRK,
            self::HTG,
            self::HUF,
            self::IDR,
            self::ILS,
            self::IMP,
            self::INR,
            self::IQD,
            self::IRR,
            self::ISK,
            self::JEP,
            self::JMD,
            self::JOD,
            self::JPY,
            self::KES,
            self::KGS,
            self::KHR,
            self::KID,
            self::KMF,
            self::KPW,
            self::KRW,
            self::KWD,
            self::KYD,
            self::KZT,
            self::LAK,
            self::LBP,
            self::LKR,
            self::LRD,
            self::LSL,
            self::LYD,
            self::MAD,
            self::MDL,
            self::MGA,
            self::MKD,
            self::MMK,
            self::MNT,
            self::MOP,
            self::MRU,
            self::MUR,
            self::MVR,
            self::MWK,
            self::MXN,
            self::MXV,
            self::MYR,
            self::MZN,
            self::NAD,
            self::NGN,
            self::NIO,
            self::NIS,
            self::NOK,
            self::NPR,
            self::NTD,
            self::NZD,
            self::OMR,
            self::PAB,
            self::PEN,
            self::PGK,
            self::PHP,
            self::PKR,
            self::PLN,
            self::PRB,
            self::PYG,
            self::QAR,
            self::RMB,
            self::RON,
            self::RSD,
            self::RUB,
            self::RWF,
            self::SAR,
            self::SBD,
            self::SCR,
            self::SDG,
            self::SEK,
            self::SGD,
            self::SHP,
            self::SLL,
            self::SLS,
            self::SOS,
            self::SRD,
            self::SSP,
            self::STN,
            self::SVC,
            self::SYP,
            self::SZL,
            self::THB,
            self::TJS,
            self::TMT,
            self::TND,
            self::TOP,
            self::_TRY,
            self::TTD,
            self::TVD,
            self::TWD,
            self::TZS,
            self::UAH,
            self::UGX,
            self::USD,
            self::USN,
            self::UYI,
            self::UYU,
            self::UYW,
            self::UZS,
            self::VEF,
            self::VES,
            self::VND,
            self::VUV,
            self::WST,
            self::XAF,
            self::XAG,
            self::XAU,
            self::XBA,
            self::XBB,
            self::XBC,
            self::XBD,
            self::XCD,
            self::XDR,
            self::XOF,
            self::XPD,
            self::XPF,
            self::XPT,
            self::XSU,
            self::XTS,
            self::XUA,
            self::XXX,
            self::YER,
            self::ZAR,
            self::ZMW,
            self::ZWB,
            self::ZWL
        ];
    }
}


