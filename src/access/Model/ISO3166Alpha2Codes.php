<?php
/**
 * ISO3166Alpha2Codes
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
 * <strong>RESTful API for Account Information Services (AIS) and Payment Initiation Services (PIS)</strong> <br/> <strong>Application Version:</strong> 2.7.0 <br/>  The following pages give you some general information on how to use our APIs.<br/> The actual API services documentation then follows further below. You can use the menu to jump between API sections. <br/> <br/> This page has a built-in HTTP(S) client, so you can test the services directly from within this page, by filling in the request parameters and/or body in the respective services, and then hitting the TRY button. Note that you need to be authorized to make a successful API call. To authorize, refer to the 'Authorization' section of the API, or just use the OAUTH button that can be found near the TRY button. <br/>  <h2 id=\"general-information\">General information</h2>  <h3 id=\"general-error-responses\"><strong>Error Responses</strong></h3> When an API call returns with an error, then in general it has the structure shown in the following example:  <pre> {   \"errors\": [     {       \"message\": \"Interface 'FINTS_SERVER' is not supported for this operation.\",       \"code\": \"BAD_REQUEST\",       \"type\": \"TECHNICAL\"     }   ],   \"date\": \"2020-11-19T16:54:06.854+01:00\",   \"requestId\": \"selfgen-312042e7-df55-47e4-bffd-956a68ef37b5\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/21\",   \"bank\": \"DEMO0002 - finAPI Test Redirect Bank\" } </pre>  If an API call requires an additional authentication by the user, HTTP code 510 is returned and the error response contains the additional \"multiStepAuthentication\" object, see the following example:  <pre> {   \"errors\": [     {       \"message\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",       \"code\": \"ADDITIONAL_AUTHENTICATION_REQUIRED\",       \"type\": \"BUSINESS\",       \"multiStepAuthentication\": {         \"hash\": \"678b13f4be9ed7d981a840af8131223a\",         \"status\": \"CHALLENGE_RESPONSE_REQUIRED\",         \"challengeMessage\": \"Es ist eine zusätzliche Authentifizierung erforderlich. Bitte geben Sie folgenden Code an: 123456\",         \"answerFieldLabel\": \"TAN\",         \"redirectUrl\": null,         \"redirectContext\": null,         \"redirectContextField\": null,         \"twoStepProcedures\": null,         \"photoTanMimeType\": null,         \"photoTanData\": null,         \"opticalData\": null,         \"opticalDataAsReinerSct\": false       }     }   ],   \"date\": \"2019-11-29T09:51:55.931+01:00\",   \"requestId\": \"selfgen-45059c99-1b14-4df7-9bd3-9d5f126df294\",   \"endpoint\": \"POST /api/v2/bankConnections/import\",   \"authContext\": \"1/18\",   \"bank\": \"DEMO0001 - finAPI Test Bank\" } </pre>  An exception to this error format are API authentication errors, where the following structure is returned:  <pre> {   \"error\": \"invalid_token\",   \"error_description\": \"Invalid access token: cccbce46-xxxx-xxxx-xxxx-xxxxxxxxxx\" } </pre>  <h3 id=\"general-paging\"><strong>Paging</strong></h3> API services that may potentially return a lot of data implement paging. They return a limited number of entries within a \"page\". Further entries must be fetched with subsequent calls. <br/><br/> Any API service that implements paging provides the following input parameters:<br/> &bull; \"page\": the number of the page to be retrieved (starting with 1).<br/> &bull; \"perPage\": the number of entries within a page. The default and maximum value is stated in the documentation of the respective services.  A paged response contains an additional \"paging\" object with the following structure:  <pre> {   ...   ,   \"paging\": {     \"page\": 1,     \"perPage\": 20,     \"pageCount\": 234,     \"totalCount\": 4662   } } </pre>  <h3 id=\"general-internationalization\"><strong>Internationalization</strong></h3> The finAPI services support internationalization which means you can define the language you prefer for API service responses. <br/><br/> The following languages are available: German, English, Czech, Slovak. <br/><br/> The preferred language can be defined by providing the official HTTP <strong>Accept-Language</strong> header. <br/><br/> finAPI reacts on the official iso language codes &quot;de&quot;, &quot;en&quot;, &quot;cs&quot; and &quot;sk&quot; for the named languages. Additional subtags supported by the Accept-Language header may be provided, e.g. &quot;en-US&quot;, but are ignored. <br/> If no Accept-Language header is given, German is used as the default language. <br/><br/> Exceptions:<br/> &bull; Bank login hints and login fields are only available in the language of the bank and not being translated.<br/> &bull; Direct messages from the bank systems typically returned as BUSINESS errors will not be translated.<br/> &bull; BUSINESS errors created by finAPI directly are available in German and English.<br/> &bull; TECHNICAL errors messages meant for developers are mostly in English, but also may be translated.  <h3 id=\"general-request-ids\"><strong>Request IDs</strong></h3> With any API call, you can pass a request ID via a header with name \"X-Request-Id\". The request ID can be an arbitrary string with up to 255 characters. Passing a longer string will result in an error. <br/><br/> If you don't pass a request ID for a call, finAPI will generate a random ID internally. <br/><br/> The request ID is always returned back in the response of a service, as a header with name \"X-Request-Id\". <br/><br/> We highly recommend to always pass a (preferably unique) request ID, and include it into your client application logs whenever you make a request or receive a response (especially in the case of an error response). finAPI is also logging request IDs on its end. Having a request ID can help the finAPI support team to work more efficiently and solve tickets faster.  <h3 id=\"general-overriding-http-methods\"><strong>Overriding HTTP methods</strong></h3> Some HTTP clients do not support the HTTP methods PATCH or DELETE. If you are using such a client in your application, you can use a POST request instead with a special HTTP header indicating the originally intended HTTP method. <br/><br/> The header's name is <strong>X-HTTP-Method-Override</strong>. Set its value to either <strong>PATCH</strong> or <strong>DELETE</strong>. POST Requests having this header set will be treated either as PATCH or DELETE by the finAPI servers. <br/><br/> Example: <br/><br/> <strong>X-HTTP-Method-Override: PATCH</strong><br/> POST /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/><br/> will be interpreted by finAPI as:<br/><br/> PATCH /api/v2/label/51<br/> {\"name\": \"changed label\"}<br/>  <h3 id=\"general-user-metadata\"><strong>User metadata</strong></h3> With the migration to PSD2 APIs, a new term called \"User metadata\" (also known as \"PSU metadata\") has been introduced to the API. This user metadata aims to inform the banking API if there was a real end-user behind an HTTP request or if the request was triggered by a system (e.g. by an automatic batch update). In the latter case, the bank may apply some restrictions such as limiting the number of HTTP requests for a single consent. Also, some operations may be forbidden entirely by the banking API. For example, some banks do not allow issuing a new consent without the end-user being involved. Therefore, it is certainly necessary and obligatory for the customer to provide the PSU metadata for such operations. <br/><br/> As finAPI does not have direct interaction with the end-user, it is the client application's responsibility to provide all the necessary information about the end-user. This must be done by sending additional headers with every request triggered on behalf of the end-user. <br/><br/> At the moment, the following headers are supported by the API:<br/> &bull; \"PSU-IP-Address\" - the IP address of the user's device.<br/> &bull; \"PSU-Device-OS\" - the user's device and/or operating system identification.<br/> &bull; \"PSU-User-Agent\" - the user's web browser or other client device identification.  <h3 id=\"general-faq\"><strong>FAQ</strong></h3> <strong>Is there a finAPI SDK?</strong> <br/> Currently we do not offer a native SDK, but there is the option to generate an SDK for almost any target language via OpenAPI. Use the 'Download SDK' button on this page for SDK generation. <br/> <br/> <strong>How can I enable finAPI's automatic batch update?</strong> <br/> Currently there is no way to set up the batch update via the API. Please contact support@finapi.io for this. <br/> <br/> <strong>Why do I need to keep authorizing when calling services on this page?</strong> <br/> This page is a \"one-page-app\". Reloading the page resets the OAuth authorization context. There is generally no need to reload the page, so just don't do it and your authorization will persist.
 *
 * The version of the OpenAPI document: 2023.06.1
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
 * ISO3166Alpha2Codes Class Doc Comment
 *
 * @category Class
 * @package  OpenAPIAccess\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ISO3166Alpha2Codes
{
    /**
     * Possible values of this enum
     */
    public const AD = 'AD';

    public const AE = 'AE';

    public const AF = 'AF';

    public const AG = 'AG';

    public const AI = 'AI';

    public const AL = 'AL';

    public const AM = 'AM';

    public const AO = 'AO';

    public const AQ = 'AQ';

    public const AR = 'AR';

    public const _AS = 'AS';

    public const AT = 'AT';

    public const AU = 'AU';

    public const AW = 'AW';

    public const AX = 'AX';

    public const AZ = 'AZ';

    public const BA = 'BA';

    public const BB = 'BB';

    public const BD = 'BD';

    public const BE = 'BE';

    public const BF = 'BF';

    public const BG = 'BG';

    public const BH = 'BH';

    public const BI = 'BI';

    public const BJ = 'BJ';

    public const BL = 'BL';

    public const BM = 'BM';

    public const BN = 'BN';

    public const BO = 'BO';

    public const BQ = 'BQ';

    public const BR = 'BR';

    public const BS = 'BS';

    public const BT = 'BT';

    public const BV = 'BV';

    public const BW = 'BW';

    public const BY = 'BY';

    public const BZ = 'BZ';

    public const CA = 'CA';

    public const CC = 'CC';

    public const CD = 'CD';

    public const CF = 'CF';

    public const CG = 'CG';

    public const CH = 'CH';

    public const CI = 'CI';

    public const CK = 'CK';

    public const CL = 'CL';

    public const CM = 'CM';

    public const CN = 'CN';

    public const CO = 'CO';

    public const CR = 'CR';

    public const CU = 'CU';

    public const CV = 'CV';

    public const CW = 'CW';

    public const CX = 'CX';

    public const CY = 'CY';

    public const CZ = 'CZ';

    public const DE = 'DE';

    public const DJ = 'DJ';

    public const DK = 'DK';

    public const DM = 'DM';

    public const _DO = 'DO';

    public const DZ = 'DZ';

    public const EC = 'EC';

    public const EE = 'EE';

    public const EG = 'EG';

    public const EH = 'EH';

    public const ER = 'ER';

    public const ES = 'ES';

    public const ET = 'ET';

    public const FI = 'FI';

    public const FJ = 'FJ';

    public const FK = 'FK';

    public const FM = 'FM';

    public const FO = 'FO';

    public const FR = 'FR';

    public const GA = 'GA';

    public const GB = 'GB';

    public const GD = 'GD';

    public const GE = 'GE';

    public const GF = 'GF';

    public const GG = 'GG';

    public const GH = 'GH';

    public const GI = 'GI';

    public const GL = 'GL';

    public const GM = 'GM';

    public const GN = 'GN';

    public const GP = 'GP';

    public const GQ = 'GQ';

    public const GR = 'GR';

    public const GS = 'GS';

    public const GT = 'GT';

    public const GU = 'GU';

    public const GW = 'GW';

    public const GY = 'GY';

    public const HK = 'HK';

    public const HM = 'HM';

    public const HN = 'HN';

    public const HR = 'HR';

    public const HT = 'HT';

    public const HU = 'HU';

    public const ID = 'ID';

    public const IE = 'IE';

    public const IL = 'IL';

    public const IM = 'IM';

    public const IN = 'IN';

    public const IO = 'IO';

    public const IQ = 'IQ';

    public const IR = 'IR';

    public const IS = 'IS';

    public const IT = 'IT';

    public const JE = 'JE';

    public const JM = 'JM';

    public const JO = 'JO';

    public const JP = 'JP';

    public const KE = 'KE';

    public const KG = 'KG';

    public const KH = 'KH';

    public const KI = 'KI';

    public const KM = 'KM';

    public const KN = 'KN';

    public const KP = 'KP';

    public const KR = 'KR';

    public const KW = 'KW';

    public const KY = 'KY';

    public const KZ = 'KZ';

    public const LA = 'LA';

    public const LB = 'LB';

    public const LC = 'LC';

    public const LI = 'LI';

    public const LK = 'LK';

    public const LR = 'LR';

    public const LS = 'LS';

    public const LT = 'LT';

    public const LU = 'LU';

    public const LV = 'LV';

    public const LY = 'LY';

    public const MA = 'MA';

    public const MC = 'MC';

    public const MD = 'MD';

    public const ME = 'ME';

    public const MF = 'MF';

    public const MG = 'MG';

    public const MH = 'MH';

    public const MK = 'MK';

    public const ML = 'ML';

    public const MM = 'MM';

    public const MN = 'MN';

    public const MO = 'MO';

    public const MP = 'MP';

    public const MQ = 'MQ';

    public const MR = 'MR';

    public const MS = 'MS';

    public const MT = 'MT';

    public const MU = 'MU';

    public const MV = 'MV';

    public const MW = 'MW';

    public const MX = 'MX';

    public const MY = 'MY';

    public const MZ = 'MZ';

    public const NA = 'NA';

    public const NC = 'NC';

    public const NE = 'NE';

    public const NF = 'NF';

    public const NG = 'NG';

    public const NI = 'NI';

    public const NL = 'NL';

    public const NO = 'NO';

    public const NP = 'NP';

    public const NR = 'NR';

    public const NU = 'NU';

    public const NZ = 'NZ';

    public const OM = 'OM';

    public const PA = 'PA';

    public const PE = 'PE';

    public const PF = 'PF';

    public const PG = 'PG';

    public const PH = 'PH';

    public const PK = 'PK';

    public const PL = 'PL';

    public const PM = 'PM';

    public const PN = 'PN';

    public const PR = 'PR';

    public const PS = 'PS';

    public const PT = 'PT';

    public const PW = 'PW';

    public const PY = 'PY';

    public const QA = 'QA';

    public const RE = 'RE';

    public const RO = 'RO';

    public const RS = 'RS';

    public const RU = 'RU';

    public const RW = 'RW';

    public const SA = 'SA';

    public const SB = 'SB';

    public const SC = 'SC';

    public const SD = 'SD';

    public const SE = 'SE';

    public const SG = 'SG';

    public const SH = 'SH';

    public const SI = 'SI';

    public const SJ = 'SJ';

    public const SK = 'SK';

    public const SL = 'SL';

    public const SM = 'SM';

    public const SN = 'SN';

    public const SO = 'SO';

    public const SR = 'SR';

    public const SS = 'SS';

    public const ST = 'ST';

    public const SV = 'SV';

    public const SX = 'SX';

    public const SY = 'SY';

    public const SZ = 'SZ';

    public const TC = 'TC';

    public const TD = 'TD';

    public const TF = 'TF';

    public const TG = 'TG';

    public const TH = 'TH';

    public const TJ = 'TJ';

    public const TK = 'TK';

    public const TL = 'TL';

    public const TM = 'TM';

    public const TN = 'TN';

    public const TO = 'TO';

    public const TR = 'TR';

    public const TT = 'TT';

    public const TV = 'TV';

    public const TW = 'TW';

    public const TZ = 'TZ';

    public const UA = 'UA';

    public const UG = 'UG';

    public const UM = 'UM';

    public const US = 'US';

    public const UY = 'UY';

    public const UZ = 'UZ';

    public const VA = 'VA';

    public const VC = 'VC';

    public const VE = 'VE';

    public const VG = 'VG';

    public const VI = 'VI';

    public const VN = 'VN';

    public const VU = 'VU';

    public const WF = 'WF';

    public const WS = 'WS';

    public const XK = 'XK';

    public const YE = 'YE';

    public const YT = 'YT';

    public const ZA = 'ZA';

    public const ZM = 'ZM';

    public const ZW = 'ZW';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::AD,
            self::AE,
            self::AF,
            self::AG,
            self::AI,
            self::AL,
            self::AM,
            self::AO,
            self::AQ,
            self::AR,
            self::_AS,
            self::AT,
            self::AU,
            self::AW,
            self::AX,
            self::AZ,
            self::BA,
            self::BB,
            self::BD,
            self::BE,
            self::BF,
            self::BG,
            self::BH,
            self::BI,
            self::BJ,
            self::BL,
            self::BM,
            self::BN,
            self::BO,
            self::BQ,
            self::BR,
            self::BS,
            self::BT,
            self::BV,
            self::BW,
            self::BY,
            self::BZ,
            self::CA,
            self::CC,
            self::CD,
            self::CF,
            self::CG,
            self::CH,
            self::CI,
            self::CK,
            self::CL,
            self::CM,
            self::CN,
            self::CO,
            self::CR,
            self::CU,
            self::CV,
            self::CW,
            self::CX,
            self::CY,
            self::CZ,
            self::DE,
            self::DJ,
            self::DK,
            self::DM,
            self::_DO,
            self::DZ,
            self::EC,
            self::EE,
            self::EG,
            self::EH,
            self::ER,
            self::ES,
            self::ET,
            self::FI,
            self::FJ,
            self::FK,
            self::FM,
            self::FO,
            self::FR,
            self::GA,
            self::GB,
            self::GD,
            self::GE,
            self::GF,
            self::GG,
            self::GH,
            self::GI,
            self::GL,
            self::GM,
            self::GN,
            self::GP,
            self::GQ,
            self::GR,
            self::GS,
            self::GT,
            self::GU,
            self::GW,
            self::GY,
            self::HK,
            self::HM,
            self::HN,
            self::HR,
            self::HT,
            self::HU,
            self::ID,
            self::IE,
            self::IL,
            self::IM,
            self::IN,
            self::IO,
            self::IQ,
            self::IR,
            self::IS,
            self::IT,
            self::JE,
            self::JM,
            self::JO,
            self::JP,
            self::KE,
            self::KG,
            self::KH,
            self::KI,
            self::KM,
            self::KN,
            self::KP,
            self::KR,
            self::KW,
            self::KY,
            self::KZ,
            self::LA,
            self::LB,
            self::LC,
            self::LI,
            self::LK,
            self::LR,
            self::LS,
            self::LT,
            self::LU,
            self::LV,
            self::LY,
            self::MA,
            self::MC,
            self::MD,
            self::ME,
            self::MF,
            self::MG,
            self::MH,
            self::MK,
            self::ML,
            self::MM,
            self::MN,
            self::MO,
            self::MP,
            self::MQ,
            self::MR,
            self::MS,
            self::MT,
            self::MU,
            self::MV,
            self::MW,
            self::MX,
            self::MY,
            self::MZ,
            self::NA,
            self::NC,
            self::NE,
            self::NF,
            self::NG,
            self::NI,
            self::NL,
            self::NO,
            self::NP,
            self::NR,
            self::NU,
            self::NZ,
            self::OM,
            self::PA,
            self::PE,
            self::PF,
            self::PG,
            self::PH,
            self::PK,
            self::PL,
            self::PM,
            self::PN,
            self::PR,
            self::PS,
            self::PT,
            self::PW,
            self::PY,
            self::QA,
            self::RE,
            self::RO,
            self::RS,
            self::RU,
            self::RW,
            self::SA,
            self::SB,
            self::SC,
            self::SD,
            self::SE,
            self::SG,
            self::SH,
            self::SI,
            self::SJ,
            self::SK,
            self::SL,
            self::SM,
            self::SN,
            self::SO,
            self::SR,
            self::SS,
            self::ST,
            self::SV,
            self::SX,
            self::SY,
            self::SZ,
            self::TC,
            self::TD,
            self::TF,
            self::TG,
            self::TH,
            self::TJ,
            self::TK,
            self::TL,
            self::TM,
            self::TN,
            self::TO,
            self::TR,
            self::TT,
            self::TV,
            self::TW,
            self::TZ,
            self::UA,
            self::UG,
            self::UM,
            self::US,
            self::UY,
            self::UZ,
            self::VA,
            self::VC,
            self::VE,
            self::VG,
            self::VI,
            self::VN,
            self::VU,
            self::WF,
            self::WS,
            self::XK,
            self::YE,
            self::YT,
            self::ZA,
            self::ZM,
            self::ZW
        ];
    }
}


