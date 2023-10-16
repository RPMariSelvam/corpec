<?php

namespace app\models;

use app\models\Autogenerate;
use Yii;
use app\models\Emptemrdo;
use yii\db\Expression;
use app\models\CrmIntegration;

class CommonModel
{

    public static $CompanyBusinessInfo, $SubscribedPackage, $ModulesDetails,$Commisson_datelabel, $CompanyId,$PayrollYear,$CrmIntegration;
    public static $OutsourcingVentures = [];

    public static function getPerpage()
    {
        return '20';
    }

    public static function getExperienceyear()
    {

        return [
            '0' => '0 Year',
            '1' => '1 Year',
            '2' => '2 Years',
            '3' => '3 Years',
            '4' => '4 Years',
            '5' => '5 Years',
            '6' => '6 Years',
            '7' => '7 Years',
            '8' => '8 Years',
            '9' => '9 Years',
            '10' => '10 Years',
            '11' => '11 Years',
            '12' => '12 Years',
            '13' => '13 Years',
            '14' => '14 Years',
            '15' => '15 Years',
            '16' => '16 Years',
            '17' => '17 Years',
            '18' => '18 Years',
            '19' => '19 Years',
            '20' => '20 Years',
            '21' => '21 Years',
            '22' => '22 Years',
            '23' => '23 Years',
            '24' => '24 Years',
            '25' => '22 Years',
            '26' => '26 Years',
            '27' => '27 Years',
            '28' => '28 Years',
            '29' => '29 Years',
            '30' => '30 Years',
            '30+' => '30+ Years'
        ];
    }

    public static function getExperiencemonth()
    {
        return [
            '0' => '0 Month',
            '1' => '1 Month',
            '2' => '2 Months',
            '3' => '3 Months',
            '4' => '4 Months',
            '5' => '5 Months',
            '6' => '6 Months',
            '7' => '7 Months',
            '8' => '8 Months',
            '9' => '9 Months',
            '10' => '10 Months',
            '11' => '11 Months'
        ];
    }


    public static function getNationality()
    {
        // Code Number Getting Form IRAS 
        return [
            '351' => 'Afghan',
            '201' => 'Albanian',
            '401' => 'Algerian',
            '721' => 'American Samoan',
            '153' => 'Andorran',
            '451' => 'Angolan',
            '670' => 'Anguillan',
            '641' => 'Antiguan/Barbudan',
            '601' => 'Argentinean',
            '217' => 'Armenian',
            '625' => 'Aruban',
            '701' => 'Australian',
            '131' => 'Austrian',
            '218' => 'Azerbaijani',
            '642' => 'Bahamian',
            '371' => 'Bahraini',
            '352' => 'Bangladeshi',
            '643' => 'Barbadian',
            '211' => 'Belarusian',
            '101' => 'Belgian',
            '644' => 'Belizean',
            '452' => 'Beninese',
            '645' => 'Bermudian',
            '353' => 'Bhutanese',
            '646' => 'Bolivian',
            '453' => 'Motswana',
            '602' => 'Brazilian',
            '671' => 'British Virgin Island',
            '302' => 'Bruneian',
            '202' => 'Bulgarian',
            '454' => 'Burkinabè',
            '455' => 'Burundian',
            '312' => 'Cambodian',
            '501' => 'Canadian',
            '457' => 'Cape Verdean',
            '647' => 'Caymanian',
            '458' => 'Central African',
            '459' => 'Chadian',
            '603' => 'Chilean',
            '709' => 'Christmas Island',
            '710' => 'Cocos Island',
            '604' => 'Colombian',
            '722' => 'Cook Island',
            '648' => 'Costa Rican',
            '232' => 'Croatian',
            '621' => 'Cuban',
            '372' => 'Cypriot',
            '234' => 'Czech',
            '102' => 'Danish',
            '407' => 'Djiboutian',
            '649' => 'Dominicand',
            '622' => 'Dominicane',
            '307' => 'Timorese',
            '605' => 'Ecuadorian',
            '402' => 'Egyptian',
            '650' => 'Salvadoran',
            '462' => 'Equatorial Guinean',
            '410' => 'Eritrean',
            '213' => 'Estonian',
            '408' => 'Ethiopian',
            '651' => 'Falkland Island',
            '141' => 'Faroese',
            '702' => 'Fijian',
            '132' => 'Finnish',
            '103' => 'French',
            '652' => 'French Guianese',
            '723' => 'French Polynesian',
            '463' => 'Gabonese',
            '464' => 'Gambian',
            '216' => 'Georgian',
            '104' => 'German',
            '421' => 'Ghanaian',
            '154' => 'Gibraltar',
            '105' => 'Greek',
            '142' => 'Greenlandic',
            '653' => 'Grenadian',
            '654' => 'Guadeloupe',
            '724' => 'Guamanian',
            '655' => 'Guatemalan',
            '465' => 'Guinean',
            '466' => 'Guinean',
            '656' => 'Guyanese',
            '657' => 'Haitian',
            '658' => 'Honduran',
            '332' => 'Hongkongese',
            '205' => 'Hungarian',
            '133' => 'Icelandic',
            '354' => 'Indian',
            '303' => 'Indonesian',
            '374' => 'Iraqi',
            '106' => 'Irish',
            '672' => 'Manx',
            '375' => 'Israeli',
            '107' => 'Italian',
            '659' => 'Jamaican',
            '331' => 'Japanese',
            '376' => 'Jordanian',
            '221' => 'Kazakh',
            '423' => 'Kenyan',
            '337' => 'Korean,North',
            '333' => 'Korean,South',
            '725' => 'I-Kiribati',
            '377' => 'Kuwaiti',
            '219' => 'Kyrgyzstani',
            '214' => 'Latvian',
            '378' => 'Lebanese',
            '467' => 'Basotho',
            '424' => 'Liberian',
            '138' => 'Liechtenstein',
            '215' => 'Lithuanian',
            '108' => 'Luxembourgish',
            '335' => 'Macanese',
            '425' => 'Malagasy',
            '468' => 'Malawian',
            '304' => 'Malaysian',
            '355' => 'Maldivian',
            '469' => 'Malian',
            '155' => 'Maltese',
            '735' => 'Marshallese',
            '661' => 'Martiniquais',
            '470' => 'Mauritanian',
            '426' => 'Mauritian',
            '606' => 'Mexican',
            '736' => 'Micronesian',
            '222' => 'Moldovan',
            '143' => 'Monégasque, Monacan',
            '338' => 'Mongolian',
            '662' => 'Montserratian',
            '404' => 'Moroccan',
            '427' => 'Mozambican',
            '471' => 'Namibian',
            '703' => 'Nauruan',
            '356' => 'Nepali',
            '109' => 'Dutch',
            '704' => 'New Caledonian',
            '705' => 'New Zealand',
            '660' => 'Nicaraguan',
            '472' => 'Nigerien',
            '428' => 'Nigerian',
            '726' => 'Niuean',
            '134' => 'Norwegian',
            '379' => 'Omani',
            '357' => 'Pakistani',
            '737' => 'Palauan',
            '386' => 'Palestinian',
            '624' => 'Panamanian',
            '706' => 'Papua New Guinean',
            '607' => 'Paraguayan',
            '336' => 'Chinese',
            '608' => 'Peruvian',
            '727' => 'Filipino',
            '206' => 'Polish',
            '111' => 'Portuguese',
            '502' => 'Puerto Rican',
            '380' => 'Qatari',
            '207' => 'Romanian',
            '223' => 'Russian',
            '473' => 'Rwandan',
            '707' => 'Samoan',
            '144' => 'Sammarinese',
            '381' => 'Saudi Arabian',
            '475' => 'Senegalese',
            '476' => 'Seychellois',
            '477' => 'Sierra Leonean',
            '301' => 'Singapore',
            '233' => 'Slovenian',
            '728' => 'Solomon Island',
            '478' => 'South African',
            '112' => 'Spanish',
            '358' => 'Sri Lankan',
            '484' => 'St. Helenian',
            '405' => 'Sudanese',
            '666' => 'Surinamese',
            '480' => 'Swazi',
            '136' => 'Swedish',
            '137' => 'Swiss',
            '334' => 'Taiwanese',
            '224' => 'Tajikistani',
            '430' => 'Tanzanian',
            '306' => 'Thai',
            '481' => 'Togolese',
            '730' => 'Tongan',
            '667' => 'Trinidadian',
            '406' => 'Tunisian',
            '225' => 'Turkmen',
            '668' => 'none',
            '731' => 'Tuvaluan',
            '431' => 'Ugandan',
            '212' => 'Ukrainian',
            '383' => 'Emirati',
            '110' => 'British',
            '503' => 'American',
            '609' => 'Uruguayan',
            '226' => 'Uzbekistani',
            '610' => 'Venezuelan',
            '314' => 'Vietnamese',
            '733' => 'Wallisian/Futunan',
            '479' => 'Sahrawian',
            '384' => 'Yemeni',
            '432' => 'Zambian',
            '483' => 'Zimbabwean'

        ];
    }

    public static function getDays()
    {
        return [
            "1" => "1",
            "2" => "2",
            "3" => "3",
            "4" => "4",
            "5" => "5",
            "6" => "6",
            "7" => "7",
            "8" => "8",
            "9" => "9",
            "10" => "10",
            "11" => "11",
            "12" => "12",
            "13" => "13",
            "14" => "14",
            "15" => "15",
            "16" => "16",
            "17" => "17",
            "18" => "18",
            "19" => "19",
            "20" => "20",
            "21" => "21",
            "22" => "22",
            "23" => "23",
            "24" => "24",
            "25" => "25",
            "26" => "26",
            "27" => "27",
            "28" => "28",
            "29" => "29",
            "30" => "30",
            "31" => "31",

        ];
    }

    public static function getWeekdayList()
    {
        return [
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => "April",
            "5" => "May",
            "6" => "June",
            "7" => "July",
            "8" => "August",
            "9" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December",
        ];
    }

    public static function getCountries()
    {
        return [
            "Afghanistan" => "Afghanistan",
            "Albania" => "Albania",
            "Algeria" => "Algeria",
            "American Samoa" => "American Samoa",
            "Andorra" => "Andorra",
            "Angola" => "Angola",
            "Anguilla" => "Anguilla",
            "Antarctica" => "Antarctica",
            "Antigua and Barbuda" => "Antigua and Barbuda",
            "Argentina" => "Argentina",
            "Armenia" => "Armenia",
            "Aruba" => "Aruba",
            "Australia" => "Australia",
            "Austria" => "Austria",
            "Azerbaijan" => "Azerbaijan",
            "Bahamas" => "Bahamas",
            "Bahrain" => "Bahrain",
            "Bangladesh" => "Bangladesh",
            "Barbados" => "Barbados",
            "Belarus" => "Belarus",
            "Belgium" => "Belgium",
            "Belize" => "Belize",
            "Benin" => "Benin",
            "Bermuda" => "Bermuda",
            "Bhutan" => "Bhutan",
            "Bolivia" => "Bolivia",
            "Bosnia and Herzegovina" => "Bosnia and Herzegovina",
            "Botswana" => "Botswana",
            "Bouvet Island" => "Bouvet Island",
            "Brazil" => "Brazil",
            "British Indian Ocean Territory" => "British Indian Ocean Territory",
            "Brunei Darussalam" => "Brunei Darussalam",
            "Bulgaria" => "Bulgaria",
            "Burkina Faso" => "Burkina Faso",
            "Burundi" => "Burundi",
            "Cambodia" => "Cambodia",
            "Cameroon" => "Cameroon",
            "Canada" => "Canada",
            "Cape Verde" => "Cape Verde",
            "Cayman Islands" => "Cayman Islands",
            "Central African Republic" => "Central African Republic",
            "Chad" => "Chad",
            "Chile" => "Chile",
            "China" => "China",
            "Christmas Island" => "Christmas Island",
            "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands",
            "Colombia" => "Colombia",
            "Comoros" => "Comoros",
            "Congo" => "Congo",
            "Cook Islands" => "Cook Islands",
            "Costa Rica" => "Costa Rica",
            "Cote D'Ivoire" => "Cote D'Ivoire",
            "Croatia" => "Croatia",
            "Cuba" => "Cuba",
            "Cyprus" => "Cyprus",
            "Czech Republic" => "Czech Republic",
            "Denmark" => "Denmark",
            "Djibouti" => "Djibouti",
            "Dominica" => "Dominica",
            "Dominican Republic" => "Dominican Republic",
            "East Timor" => "East Timor",
            "Ecuador" => "Ecuador",
            "Egypt" => "Egypt",
            "El Salvador" => "El Salvador",
            "Equatorial Guinea" => "Equatorial Guinea",
            "Eritrea" => "Eritrea",
            "Estonia" => "Estonia",
            "Ethiopia" => "Ethiopia",
            "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)",
            "Faroe Islands" => "Faroe Islands",
            "Fiji" => "Fiji",
            "Finland" => "Finland",
            "France, Metropolitan" => "France, Metropolitan",
            "French Guiana" => "French Guiana",
            "French Polynesia" => "French Polynesia",
            "French Southern Territories" => "French Southern Territories",
            "Gabon" => "Gabon",
            "Gambia" => "Gambia",
            "Georgia" => "Georgia",
            "Germany" => "Germany",
            "Ghana" => "Ghana",
            "Gibraltar" => "Gibraltar",
            "Greece" => "Greece",
            "Greenland" => "Greenland",
            "Grenada" => "Grenada",
            "Guadeloupe" => "Guadeloupe",
            "Guam" => "Guam",
            "Guatemala" => "Guatemala",
            "Guinea" => "Guinea",
            "Guinea-Bissau" => "Guinea-Bissau",
            "Guyana" => "Guyana",
            "Haiti" => "Haiti",
            "Heard and Mc Donald Islands" => "Heard and Mc Donald Islands",
            "Honduras" => "Honduras",
            "Hong Kong" => "Hong Kong",
            "Hungary" => "Hungary",
            "Iceland" => "Iceland",
            "India" => "India",
            "Indonesia" => "Indonesia",
            "Iran (Islamic Republic of)" => "Iran (Islamic Republic of)",
            "Iraq" => "Iraq",
            "Ireland" => "Ireland",
            "Israel" => "Israel",
            "Italy" => "Italy",
            "Jamaica" => "Jamaica",
            "Japan" => "Japan",
            "Jordan" => "Jordan",
            "Kazakhstan" => "Kazakhstan",
            "Kenya" => "Kenya",
            "Kiribati" => "Kiribati",
            "North Korea" => "North Korea",
            "Korea, Republic of" => "Korea, Republic of",
            "Kuwait" => "Kuwait",
            "Kyrgyzstan" => "Kyrgyzstan",
            "Lao People's Democratic Republic" => "Lao People's Democratic Republic",
            "Latvia" => "Latvia",
            "Lebanon" => "Lebanon",
            "Lesotho" => "Lesotho",
            "Liberia" => "Liberia",
            "Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya",
            "Liechtenstein" => "Liechtenstein",
            "Lithuania" => "Lithuania",
            "Luxembourg" => "Luxembourg",
            "Macau" => "Macau",
            "FYROM" => "FYROM",
            "Madagascar" => "Madagascar",
            "Malawi" => "Malawi",
            "Malaysia" => "Malaysia",
            "Maldives" => "Maldives",
            "Mali" => "Mali",
            "Malta" => "Malta",
            "Marshall Islands" => "Marshall Islands",
            "Martinique" => "Martinique",
            "Mauritania" => "Mauritania",
            "Mauritius" => "Mauritius",
            "Mayotte" => "Mayotte",
            "Mexico" => "Mexico",
            "Micronesia, Federated States of" => "Micronesia, Federated States of",
            "Moldova, Republic of" => "Moldova, Republic of",
            "Monaco" => "Monaco",
            "Mongolia" => "Mongolia",
            "Montserrat" => "Montserrat",
            "Morocco" => "Morocco",
            "Mozambique" => "Mozambique",
            "Myanmar" => "Myanmar",
            "Namibia" => "Namibia",
            "Nauru" => "Nauru",
            "Nepal" => "Nepal",
            "Netherlands" => "Netherlands",
            "Netherlands Antilles" => "Netherlands Antilles",
            "New Caledonia" => "New Caledonia",
            "New Zealand" => "New Zealand",
            "Nicaragua" => "Nicaragua",
            "Niger" => "Niger",
            "Nigeria" => "Nigeria",
            "Niue" => "Niue",
            "Norfolk Island" => "Norfolk Island",
            "Northern Mariana Islands" => "Northern Mariana Islands",
            "Norway" => "Norway",
            "Oman" => "Oman",
            "Pakistan" => "Pakistan",
            "Palau" => "Palau",
            "Panama" => "Panama",
            "Papua New Guinea" => "Papua New Guinea",
            "Paraguay" => "Paraguay",
            "Peru" => "Peru",
            "Philippines" => "Philippines",
            "Pitcairn" => "Pitcairn",
            "Poland" => "Poland",
            "Portugal" => "Portugal",
            "Puerto Rico" => "Puerto Rico",
            "Qatar" => "Qatar",
            "Reunion" => "Reunion",
            "Romania" => "Romania",
            "Russian Federation" => "Russian Federation",
            "Rwanda" => "Rwanda",
            "Saint Kitts and Nevis" => "Saint Kitts and Nevis",
            "Saint Lucia" => "Saint Lucia",
            "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines",
            "Samoa" => "Samoa",
            "San Marino" => "San Marino",
            "Sao Tome and Principe" => "Sao Tome and Principe",
            "Saudi Arabia" => "Saudi Arabia",
            "Senegal" => "Senegal",
            "Seychelles" => "Seychelles",
            "Sierra Leone" => "Sierra Leone",
            "Singapore" => "Singapore",
            "Slovak Republic" => "Slovak Republic",
            "Slovenia" => "Slovenia",
            "Solomon Islands" => "Solomon Islands",
            "Somalia" => "Somalia",
            "South Africa" => "South Africa",
            "South Georgia & South Sandwich Islands" => "South Georgia & South Sandwich Islands",
            "Spain" => "Spain",
            "Sri Lanka" => "Sri Lanka",
            "St. Helena" => "St. Helena",
            "St. Pierre and Miquelon" => "St. Pierre and Miquelon",
            "Sudan" => "Sudan",
            "Suriname" => "Suriname",
            "Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands",
            "Swaziland" => "Swaziland",
            "Sweden" => "Sweden",
            "Switzerland" => "Switzerland",
            "Syrian Arab Republic" => "Syrian Arab Republic",
            "Taiwan" => "Taiwan",
            "Tajikistan" => "Tajikistan",
            "Tanzania, United Republic of" => "Tanzania, United Republic of",
            "Thailand" => "Thailand",
            "Togo" => "Togo",
            "Tokelau" => "Tokelau",
            "Tonga" => "Tonga",
            "Trinidad and Tobago" => "Trinidad and Tobago",
            "Tunisia" => "Tunisia",
            "Turkey" => "Turkey",
            "Turkmenistan" => "Turkmenistan",
            "Turks and Caicos Islands" => "Turks and Caicos Islands",
            "Tuvalu" => "Tuvalu",
            "Uganda" => "Uganda",
            "Ukraine" => "Ukraine",
            "United Arab Emirates" => "United Arab Emirates",
            "United Kingdom" => "United Kingdom",
            "United States" => "United States",
            "United States Minor Outlying Islands" => "United States Minor Outlying Islands",
            "Uruguay" => "Uruguay",
            "Uzbekistan" => "Uzbekistan",
            "Vanuatu" => "Vanuatu",
            "Vatican City State (Holy See)" => "Vatican City State (Holy See)",
            "Venezuela" => "Venezuela",
            "Viet Nam" => "Viet Nam",
            "Virgin Islands (British)" => "Virgin Islands (British)",
            "Virgin Islands (U.S.)" => "Virgin Islands (U.S.)",
            "Wallis and Futuna Islands" => "Wallis and Futuna Islands",
            "Western Sahara" => "Western Sahara",
            "Yemen" => "Yemen",
            "Democratic Republic of Congo" => "Democratic Republic of Congo",
            "Zambia" => "Zambia",
            "Zimbabwe" => "Zimbabwe",
            "Jersey" => "Jersey",
            "Guernsey" => "Guernsey",
            "Montenegro" => "Montenegro",
            "Serbia" => "Serbia",
            "Aaland Islands" => "Aaland Islands",
            "Bonaire, Sint Eustatius and Saba" => "Bonaire, Sint Eustatius and Saba",
            "Curacao" => "Curacao",
            "Palestinian Territory, Occupied" => "Palestinian Territory, Occupied",
            "South Sudan" => "South Sudan",
            "St. Barthelemy" => "St. Barthelemy",
            "St. Martin (French part)" => "St. Martin (French part)",
            "Canary Islands" => "Canary Islands"
        ];
    }

    public static function getNationalityNameByID($id)
    {

        if (!(is_null($id) || empty($id))) {
            $list = self::getCountrynameWithCodes();
            return $list[$id];
        } else {
            return null;
        }

    }

    public static function getCountrynameWithCodes()
    {
        // Code Number Getting Form IRAS
        return [
            "351" => "AFGHANISTAN",
            "201" => "ALBANIA",
            "401" => "ALGERIA",
            "721" => "AMERICAN SAMOA",
            "153" => "ANDORRA",
            "451" => "ANGOLA",
            "670" => "ANGUILLA",
            "641" => "ANTIGUA AND BARBUDA",
            "601" => "ARGENTINA",
            "217" => "ARMENIA",
            "625" => "ARUBA",
            "701" => "AUSTRALIA",
            "131" => "AUSTRIA",
            "218" => "AZERBAIJAN",
            "642" => "BAHAMAS ISLAND",
            "371" => "BAHRAIN",
            "352" => "BANGLADESH",
            "643" => "BARBADOS",
            "211" => "BELARUS",
            "101" => "BELGIUM",
            "644" => "BELIZE",
            "452" => "BENIN",
            "645" => "BERMUDA",
            "353" => "BHUTAN",
            "646" => "BOLIVIA",
            "453" => "BOTSWANA",
            "139" => "BOUVET ISLAND",
            "602" => "BRAZIL",
            "708" => "BRITISH INDIAN OCEAN",
            "671" => "BRITISH VIRGIN ISLND",
            "302" => "BRUNEI",
            "202" => "BULGARIA",
            "454" => "BURKINA FASO",
            "455" => "BURUNDI",
            "312" => "CAMBODIA",
            "456" => "CAMEROON UNITED REP",
            "501" => "CANADA",
            "457" => "CAPE VERDE",
            "647" => "CAYMAN ISLANDS",
            "458" => "CENTRAL AFRICAN REP",
            "459" => "CHAD",
            "603" => "CHILE",
            "709" => "CHRISTMAS ISLANDS",
            "710" => "COCOS KEELING ISLAND",
            "604" => "COLOMBIA",
            "460" => "COMOROS ISLAND",
            "461" => "CONGO",
            "722" => "COOK ISLAND",
            "648" => "COSTA RICA",
            "422" => "COTE DIVOIRE",
            "232" => "CROATIA",
            "621" => "CUBA",
            "372" => "CYPRUS",
            "234" => "CZECH REPUBLIC",
            "203" => "CZECHOSLOVAKIA",
            "409" => "DEM REP OF SOMALI",
            "385" => "DEMOCRATIC YEMEN",
            "102" => "DENMARK",
            "407" => "DJIBOUTI",
            "649" => "DOMINICA",
            "622" => "DOMINICAN REPUBLIC",
            "307" => "EAST TIMOR",
            "605" => "ECUADOR",
            "402" => "EGYPT",
            "650" => "EL SALVADOR",
            "462" => "EQUATORIAL GUINEA",
            "410" => "ERITREA",
            "213" => "ESTONIA",
            "408" => "ETHIOPIA",
            "141" => "FAEROE ISLANDS",
            "651" => "FALKLAND IS",
            "702" => "FIJI",
            "132" => "FINLAND",
            "103" => "FRANCE",
            "652" => "FRENCH GUIANA",
            "723" => "FRENCH POLYNESIA",
            "711" => "FRENCH SOUTHERN TERR",
            "463" => "GABON",
            "464" => "GAMBIA",
            "216" => "GEORGIA",
            "104" => "GERMANY",
            "421" => "GHANA",
            "154" => "GIBRALTAR",
            "105" => "GREECE",
            "142" => "GREENLAND",
            "653" => "GRENADA",
            "654" => "GUADELOUPE",
            "724" => "GUAM",
            "655" => "GUATEMALA",
            "465" => "GUINEA",
            "466" => "GUINES BISSAU",
            "656" => "GUYANA",
            "657" => "HAITI",
            "712" => "HEARD MCDONALD ISLND",
            "658" => "HONDURAS",
            "332" => "HONG KONG",
            "205" => "HUNGARY",
            "133" => "ICELAND",
            "354" => "INDIA",
            "303" => "INDONESIA",
            "374" => "IRAQ",
            "106" => "IRELAND",
            "373" => "ISLAMIC REP OF IRAN",
            "672" => "ISLE OF MAN",
            "375" => "ISRAEL",
            "107" => "ITALY",
            "659" => "JAMAICA",
            "331" => "JAPAN",
            "376" => "JORDAN",
            "221" => "KAZAKHSTAN",
            "423" => "KENYA",
            "725" => "KIRIBATI",
            "337" => "KOREA NORTH DEM PEO",
            "377" => "KUWAIT",
            "219" => "KYRGYZSTAN",
            "313" => "LAOS PEO DEM REP",
            "214" => "LATVIA",
            "378" => "LEBANON",
            "467" => "LESOTHO",
            "424" => "LIBERIA",
            "403" => "LIBYA A JAMAHIRIYA",
            "138" => "LIECHSTENSTEIN",
            "215" => "LITHUANIA",
            "108" => "LUXEMBOURG",
            "335" => "MACAU",
            "425" => "MADAGASCAR",
            "468" => "MALAWI",
            "304" => "MALAYSIA",
            "355" => "MALDIVES",
            "469" => "MALI",
            "155" => "MALTA",
            "735" => "MARSHALL ISLANDS",
            "661" => "MARTINIQUE",
            "470" => "MAURITANIA",
            "426" => "MAURITIUS",
            "606" => "MEXICO",
            "736" => "MICRONESIA",
            "222" => "MOLDOVA",
            "143" => "MONACO",
            "338" => "MONGOLIA",
            "662" => "MONTSERRAT",
            "404" => "MOROCCO",
            "427" => "MOZAMBIQUE",
            "311" => "MYANMAR",
            "471" => "NAMIBIA",
            "703" => "NAURU",
            "356" => "NEPAL",
            "109" => "NETHERLANDS",
            "623" => "NETHERLANDS ANTILLES",
            "704" => "NEW CALEDONIA",
            "732" => "NEW HERBRIDES",
            "705" => "NEW ZEALAND",
            "660" => "NICARAGUA",
            "472" => "NIGER",
            "428" => "NIGERIA",
            "726" => "NIUE",
            "713" => "NORFOLK ISLAND",
            "734" => "NORTHERN MARIANA ISLANDS",
            "134" => "NORWAY",
            "499" => "O C IN OTHER AFRICA",
            "319" => "O C IN S E ASIA",
            "699" => "OC CTRL STH AMERICA",
            "509" => "OC NORTH AMERICA",
            "799" => "OC OCEANIA",
            "379" => "OMAN",
            "999" => "OTHERS",
            "357" => "PAKISTAN",
            "737" => "PALAU",
            "386" => "PALESTINE",
            "624" => "PANAMA",
            "706" => "PAPUA NEW GUINEA",
            "607" => "PARAGUAY",
            "336" => "PEOPLES REPUBLIC OF CHINA",
            "608" => "PERU",
            "305" => "PHILIPPINES",
            "727" => "PITCAIRN",
            "206" => "POLAND",
            "111" => "PORTUGAL",
            "502" => "PUERTO RICO",
            "380" => "QATAR",
            "333" => "REP OF KOREA",
            "482" => "REP OF ZAIRE",
            "429" => "REUNION ISLAND",
            "207" => "ROMANIA",
            "223" => "RUSSIA",
            "473" => "RWANDA",
            "663" => "SAINT KITTS NEVIS",
            "664" => "SAINT LUCIA",
            "665" => "SAINT VINCENT",
            "707" => "SAMOA",
            "144" => "SAN MARINO",
            "474" => "SAO TOME PRINCIPE",
            "381" => "SAUDI ARABIA",
            "475" => "SENEGAL",
            "476" => "SEYCHELLES",
            "477" => "SIERRA LEONE",
            "301" => "SINGAPORE",
            "235" => "SLOVAK REPUBLIC",
            "233" => "SLOVENIA",
            "728" => "SOLOMON ISLANDS",
            "478" => "SOUTH AFRICA",
            "112" => "SPAIN",
            "358" => "SRI LANKA",
            "484" => "ST HELENA",
            "505" => "ST PIERRE MIQUELON",
            "405" => "SUDAN",
            "666" => "SURINAM",
            "135" => "SVALBARD JAN MAYEN",
            "480" => "SWAZILAND",
            "136" => "SWEDEN",
            "137" => "SWITZERLAND",
            "382" => "SYRIAN ARAB REP",
            "334" => "TAIWAN",
            "224" => "TAJIKISTAN",
            "430" => "TANZANIA",
            "306" => "THAILAND",
            "481" => "TOGO",
            "729" => "TOKELAU",
            "730" => "TONGA",
            "667" => "TRINIDAD AND TOBAGO",
            "406" => "TUNISIA",
            "225" => "TURKMENISTAN",
            "668" => "TURKS AND CAICOS IS",
            "731" => "TUVALU",
            "504" => "U S MINOR ISLANDS",
            "431" => "UGANDA",
            "212" => "UKRAINE",
            "383" => "UNITED ARAB EMIRATES",
            "110" => "UNITED KINGDOM",
            "503" => "UNITED STATES",
            "609" => "URUGUAY",
            "226" => "UZBEKISTAN",
            "145" => "VATICAN CITY STATE",
            "610" => "VENEZUELA",
            "314" => "VIETNAM SOC REP OF",
            "669" => "VIRGIN ISLANDS US",
            "733" => "WALLIS AND FUTUNA",
            "479" => "WESTERN SAHARA",
            "384" => "YEMEN",
            "209" => "YUGOSLAVIA",
            "432" => "ZAMBIA",
            "483" => "ZIMBABWE",

        ];
    }

    public static function getMaritalStatusByID($id)
    {

        if (!(is_null($id) || empty($id))) {
            $list = self::getMaritalStatusList();
            return $list[$id];
        } else {
            return null;
        }

    }

    public static function getMaritalStatusList()
    {
        return [
            "3" => "DIVORCED",
            "2" => "MARRIED",
            "6" => "OTHERS",
            "1" => "SINGLE",
            "5" => "SEPERATED",
            "4" => "WIDOWED",
        ];
    }

    public static function getIdentityType()
    {
        return [
            "1" => "NRIC",
            "2" => "FIN",
            "3" => "IMMIGRATION FILE REF NO",
            "4" => "WORK PERMIT NO",
            "5" => "MALAYSIAN I/C(for non-resident director and seaman only)",
            "6" => "PASSPORT NO(for non-resident director and seaman only)",
        ];
    }

    public static function getCpfrateTypeList()
    {
        return [
            // "ALL" => "ALL",
            "F/G" => "F/G",
            "G/G" => "G/G",
        ];
    }

    public static function getWorkPass()
    {
        return [
            "DP" => "Dependant's Pass",
            "E" => "E Pass",
            "EP" => "Entrepass",
            "LTVP" => "LTVP/LTVP+",
            "MWP" => "Miscellaneous Work Pass",
            "PEP" => "Personalised EP",
            "S" => "S Pass",
            "STP" => "Student Pass",
            "WP" => "Work Permit",
        ];
    }

    public static function getWorkPassSearch()
    {
        return [
            "A" => "All",
            "DP" => "Dependant's Pass",
            "E" => "E Pass",
            "EP" => "Entrepass",
            "LTVP" => "LTVP/LTVP+",
            "MWP" => "Miscellaneous Work Pass",
            'NRIC' => 'NRIC',
            "PEP" => "Personalised EP",
            "S" => "S Pass",
            "STP" => "Student Pass",
            "WP" => "Work Permit",
        ];
    }

    public static function getWorkPassSearchs()
    {
        return [
            "A" => "Work Pass",
            "S" => "S Pass",
            "E" => "E Pass",
            "WP" => "Work Permit",
            "EP" => "Entrepass",
            "PEP" => "Personalised EP",
            "DP" => "Dependant's Pass",
            "LTVP" => "LTVP/LTVP+",
            "MWP" => "Miscellaneous Work Pass",
            "STP" => "Student Pass",
        ];
    }

    public static function getContributionCpfType()
    {
        return [
            "G" => "General",
            "FSPR" => "First year of SPR",
            "SSPR" => "Second year of SPR",
        ];
    }

    public static function getContributionWages()
    {
        return [
            'SINDA' => 'SINDA',
            'MBMF' => 'MBMF',
            'ECF' => 'ECF',
            'CDAC' => 'CDAC'
        ];
    }

    public static function getPayItemCategory()
    {
        return [
            "A" => "Addition",
            "D" => "Deduction",
            "OT" => "Overtime",
            "R" => "Reimbursement",
            "AH" => "Amount on Hold",
        ];
    }

    public static function getCpfType()
    {

        return [
            "AW" => "Additional Wages",
            "NCPF" => "No CPF",
            "OW" => "Ordinary Wages",
        ];
    }

    public static function getFrequency()
    {


        return [
            "F" => "Fixed",
            "V" => "Variable",
        ];
    }

    public static function getAmountOption()
    {
        return [
            "1" => "__% of Present month’s basic salary",
            "2" => "Enter per-day amount; that will be Pro-rated based on days worked in the month",
            /*"3" => "Amount per day for the Total Working days in a month",
            "4" => "Other user entered amount (may differ every month)",*/
            "5" => "Based On Leave and Lateness conditions",
        ];
    }

    public static function CurrencyToNumeric($Currency)
    {
        // Dont use Session,this function use to all queue 
        $removeprefix = '$ ';
        $negative = false;
        if (!empty($Currency)) {
            $Currency_explode = explode(' ', $Currency);
            if (!empty($Currency_explode)) {
                $removeprefix = $Currency_explode[0] . ' ';
            }
            if(strstr($removeprefix, "-") !== false){
                $negative = true;
            }
        }
        $Currency = str_replace([$removeprefix, ",", " "], "", trim($Currency));
        $Currency = (($negative) ? "-".$Currency : $Currency);
        if (!is_numeric($Currency)) {
            return $Currency;
        }
        return number_format($Currency, 2, '.', '');
    }


    public static function getEthnicrace()
    {
        return [
            "C" => "CHINESE",
            "E" => "EURASIAN",
            "I" => "INDIAN",
            "M" => "MALAY",
            "O" => "OTHERS",
        ];
    }

    public static function getReligion()
    {
        return [
            "B" => "BUDDHIST",
            "CH" => "CHRISTIAN",
            "CA" => "CATHOLICISM",
            "FT" => "FREE THINKER",
            "H" => "HINDU",
            "M" => "MUSLIM",
            "S" => "SIKH",
            "T" => "TAOIST",
            "O" => "OTHERS",
        ];
    }

    public static function getYesno()
    {
        return [
            "Yes" => "Yes",
            "No" => "No",
        ];
    }

    public static function getYesnos()
    {
        return [
            "1" => "No",
            "2" => "Yes",
        ];
    }

    public static function getCommissionStatus()
    {
        return [
            "1" => "Enable",
            "0" => "Disable",
        ];
    }

    public static function getFlatCommissionStatus()
    {
        return [
            "1" => "Fixed Percentage",
            "0" => "Fixed Amount",
        ];
    }

    public static function getLoanPaymentMode()
    {
        return [
            "1" => "E-Transfer",
            "2" => "Cheque",
            "3" => "Cash",
        ];
    }

    public static function getLoanAmountType()
    {
        return [
            "balance" => "Balance",
            "partial" => "Partial",
        ];
    }

    public static function getSector()
    {
        return [
            "0" => "Public",
            "1" => "Private"];
    }

    public static function getWorkingdays()
    {
        return [
            "organization" => "By Organization",
            "department" => "By Department",
            "rosteringoff" => "By Rostering Off"];
    }

    public static function getWorkWeek()
    {
        return [
            '1' => '5 Days ',
            '2' => '5.5 Days ',
            '3' => '6 Days ',
            '4' => '6.5 Days ',
            '5' => '7 Days ',
            /*'1' => '5 Days ( Monday - Friday )',
            '2' => '5.5 Days (Monday - Saturday 1/2 )',
            '3' => '6 Days ( Monday - Saturday )',
            '4' => '6.5 Days ( Monday - Sunday 1/2 )',
            '5' => '7 Days ( Monday - Sunday )',*/
        ];
    }

    public static function getWeeks()
    {
        return [
            'Mon' => 'Monday',
            'Tue' => 'Tuesday',
            'Wed' => 'Wednesday',
            'Thu' => 'Thursday',
            'Fri' => 'Friday',
            'Sat' => 'Saturday',
            'Sun' => 'Sunday',
        ];
    }

    public static function getWorkWeekdays()
    {
        return [
            '1' => '5',
            '2' => '5.5',
            '3' => '6',
            '4' => '6.5',
            '5' => '7',
        ];
    }

    public static function getWorkWeektimecard()
    {
        return [
            '1' => '5 Days ( Monday - Friday )',
            '3' => '6 Days ( Monday - Saturday )',
            '5' => '7 Days ( Monday - Sunday )',
        ];
    }

    public static function getWorkdaysWeek($status_id)
    {
        if (!(is_null($status_id) || empty($status_id))) {
            $statusList = self::getWorkWeekDaysList();
            if (isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        } else
            return null;

    }

    public static function getWorkWeekDaysList()
    {
        return [
            '1' => '5 Days',
            '2' => '5.5 Days',
            '3' => '6 Days',
            '4' => '6.5 Days',
            '5' => '7 Days',
        ];
    }

    public static function getClaimPolicy($status_id)
    {
        if (!(is_null($status_id) || empty($status_id))) {
            $statusList = self::getClaimPolicyList();
            if (isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        } else
            return null;

    }

    public static function getClaimPolicyList()
    {
        return [
            '1' => '1 month',
            '2' => '2 months',
            '3' => '3 months',
            '6' => '6 months',
            '12' => '12 months',
            '24' => '24 months'
        ];
    }

    public static function genereteyear()
    {
        return $years = array_combine(range(date("Y"), 1930), range(date("Y"), 1930));
    }

    public static function claimgenerateyear()
    {
        $prYear = date('Y') - 2;

        return $years = array_combine(range(date('Y'), $prYear), range(date('Y'), $prYear));

    }

    public static function getMonthShortNamebyId($monthId, $case = 'u', $offset = 0, $limit = 3)
    {
        $monthName = self::getMonthNamebyId($monthId);
        $tempShortName = null;
        if (!is_null($monthName)) {
            $shortName = substr($monthName, $offset, $limit);
            if ($case == 'u') {
                $tempShortName = strtoupper($shortName);
            } elseif ($case = 'l') {
                $tempShortName = strtolower($monthName);
            }
        }

        return $tempShortName;
    }

    public static function getMonthNamebyId($monthId)
    {
        if (!(is_null($monthId) || empty($monthId)) && $monthId >= 1 && $monthId <= 12) {
            $monthlist = self::getMonthList();
            return $monthlist[$monthId];
        } else {
            return null;
        }

    }

    public static function getMonthList()
    {
        return [
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => "April",
            "5" => "May",
            "6" => "June",
            "7" => "July",
            "8" => "August",
            "9" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December",
        ];
    }

    public static function getCommissionvariablerateNameByID($id)
    {

        if (!(is_null($id) || empty($id))) {
            $list = self::getVariableCommissionStatus();
            return $list[$id];
        } else {
            return null;
        }

    }

    public static function getVariableCommissionStatus()
    {
        return [
            "1" => "Percentage",
            "2" => "Amount",
        ];
    }

    public static function getCommissionNameByID($id)
    {

        if (!(is_null($id) || empty($id))) {
            $list = self::getCommissionTypeList();
            return $list[$id];
        } else {
            return null;
        }

    }

    public static function getCommissionTypeList()
    {
        $commissiontypelist = CompanyCommissionInfoModel::getCompanyCommissionInfo(Yii::$app->company->current_company_id);
        $commissiontype = $commissiontypelist['commission_type'];
        if ($commissiontype == '1') {
            return ['1' => 'Flat Commission'];
        } elseif ($commissiontype == '2') {
            return ['2' => 'Sliding Scale Commission'];
        } else if ($commissiontype == '3') {
            return ['3' => 'Variable Commission'];
        } else {
            return [
                '' => 'All',
                '1' => 'Flat Commission',
                '2' => 'Sliding Scale Commission',
                '3' => 'Variable Commission'];
        }
    }

    public static function getEmployeeType()
    {
        return [
            'all' => 'All Employees',
            'title' => 'Based on Job Title',
            'category' => 'Based on Job Department',];
    }

    public static function getPaymentModebyId($p_modeid)
    {
        if (!(is_null($p_modeid) || empty($p_modeid))) {
            $PaymentModes = self::getPaymentMode();
            return $PaymentModes[$p_modeid];
        } else
            return null;
    }

    public static function getPaymentMode()
    {
        return [
            "2" => "Cash",
            "3" => "Cheque",
            "1" => "Interbank GIRO",

        ];
    }

    public static function getEmployeeStatusById($statusId)
    {
        if (!(is_null($statusId) || empty($statusId))) {
            $tempStatusList = self::getEmployeeStatus();
            return $tempStatusList[$statusId];
        } else
            return null;
    }

    public static function getEmployeeStatus()
    {
        return [
            "C" => "Confirmed",
            "P" => "Probation",
            "R" => "Resigned",

        ];
    }

    public static function getSalaryOptionsById($statusId)
    {
        if (!(is_null($statusId) || empty($statusId))) {
            var_dump("expression");
            $tempStatusList = self::getSalaryoptions();
            return $tempStatusList[$statusId];
        } else
            return null;
    }

    public static function getSalaryoptions()
    {
        return [
            /*"1" => "Hourly",*/
            "3" => "Daily",
            "2" => "Monthly",

        ];
    }

    public static function getCitizenshipbyId($c_id)
    {
        if (!(is_null($c_id) || empty($c_id))) {
            $tempCitizenshipList = self::getCitizenshipList();
            return $tempCitizenshipList[$c_id];
        } else
            return null;
    }

    public static function getCitizenshipList()
    {
        $Country = self::GetCompanyCountryName();
        if ($Country == 'Singapore') {
            return [
                "FR" => "Foreigner",
                "SG" => "Singaporean",
                "SPR" => "Singapore PR",
            ];
        } else if ($Country == 'India') {
            return [
                "IN" => "Indian",
                "FR" => "Foreigner",
            ];
        } else {
            $CountryNatinality = self::CountryAndNationality();
            $ContryValue = $CountryNatinality[$Country];
            if (!empty($ContryValue)) {
                return [
                    $ContryValue => $ContryValue,
                    "FR" => "Foreigner",
                ];
            } else {
                return [
                    $Country => $Country,
                    "FR" => "Foreigner",
                ];

            }
        }
    }

    public static function getLeaveDay()
    {
        return ['SDAY' => 'Single Day',
            'MDAY' => 'Multi Days'];
    }

    public static function getLeaveFirst()
    {
        return ['ALL' => 'All day',
            'FAM' => 'First part of the day'];
    }

    public static function getLeaveSecond()
    {
        return ['ALL' => 'All day',
            'SPM' => 'Second part of the day'];
    }

    public static function getLeaveSingle()
    {
        return ['ALL' => 'All day',
            'FAM' => 'First part of the day',
            'SPM' => 'Second part of the day'];
    }

    public static function getLeaveSingleEmail()
    {
        return ['ALL' => 'All day',
            'FAM' => 'First off day',
            'SPM' => 'Second off day'];
    }

    public static function getLeaveHours()
    {
        return [
            'FAM' => 'First off day',
            'SPM' => 'Second off day'];
    }

    public static function getMonthStartAndEnd($month, $year)
    {
        $tempMonth = intval($month);
        $tempResult = [
            "month_start" => null,
            "month_end" => null
        ];
        if ($tempMonth >= 1 && $tempMonth <= 12) {
            $tempFirstofMonth = "first DAY of " . CommonModel::getMonthNamebyId($month) . " " . $year;
            $tempLastofMonth = "last DAY of " . CommonModel::getMonthNamebyId($month) . " " . $year;

            $tempResult["month_start"] = date("Y-m-d", strtotime($tempFirstofMonth));
            $tempResult["month_end"] = date("Y-m-d", strtotime($tempLastofMonth));
        }
        return $tempResult;
    }

    public static function getHrsAndMins($total_minutes, $format = '%d:%d')
    {
        settype($total_minutes, 'integer');
        if ($total_minutes < 1) {
            return null;
        }
        $hours = floor($total_minutes / 60);
        $minutes = ($total_minutes % 60);
        return sprintf($format, $hours, $minutes);
    }

    public static function getStatus()
    {
        //Salary Adjustment Status
        return ['1' => 'Completed', '0' => 'In Progress'];
    }

    public static function getIr8aStatus()
    {
        //IR8A Adjustment Status
        return ['2' => 'Confirm', '1' => 'In Progress',];
    }

    public static function getMonthIdbyName($monthName)
    {
        $MonthList = self::getMonthList();
        $tempMonth = array_search($monthName, $MonthList);
        if ($tempMonth) {
            return $tempMonth;
        } else {
            return null;
        }

    }

    public static function getHolidayLeavetype()
    {
        return [
            'Full' => 'Full Day',
            'Half' => 'Half Day'
        ];
    }

    public static function getLeaveStatussearch()
    {
        return [
            'ALL' => 'ALL',
            'A' => 'Approved',
            'P' => 'Pending',
            'R' => 'Rejected'
        ];
    }

    public static function getLeaveStatusid($statusId)
    {
        if (isset($statusId) || !empty($statusId)) {
            $statusLists = self::getLeaveStatus();
            if (isset($statusLists[$statusId]))
                return $statusLists[$statusId];
            else
                return null;
        } else
            return null;
    }

    public static function getLeaveStatus()
    {
        return [
            'ALL' => 'All',
            'A' => 'Approved',
            'P' => 'Pending',
            'R' => 'Rejected'
        ];
    }

    public static function getLeavetakenStatus()
    {
        return [
            'P' => 'Pending',
            'A' => 'Approved',
            'R' => 'Rejected'
        ];
    }

    public static function getSplitCommissionoptionsById($opID)
    {
        if (!(is_null($opID) || empty($opID))) {
            $TempOptions = self::getSplitCommissionoptions();
            if (isset($TempOptions[$opID]))
                return $TempOptions[$opID];
            else
                return null;
        } else
            return null;
    }

    public static function getSplitCommissionoptions()
    {
        return ['1' => 'Split Equal',
            '2' => 'Custom',
        ];
    }

    public static function getCustomSplitoptionsById($opID)
    {
        if (!(is_null($opID) || empty($opID))) {
            $TempOptions = self::getCustomSplitoptions();
            if (isset($TempOptions[$opID]))
                return $TempOptions[$opID];
            else
                return null;
        } else
            return null;
    }

    public static function getCustomSplitoptions()
    {
        return ['1' => 'Amount',
            '2' => 'Percentage',
        ];
    }

    public static function getMonthListByMonths($month_list, $attribute_name)
    {
        $calendar_months = self::getMonthList();
        $temp_result = [];
        foreach ($month_list as $eachRow) {
            $temp_month_number = $eachRow[$attribute_name];
            if (array_key_exists($temp_month_number, $calendar_months)) {
                $temp_result[$temp_month_number] = $calendar_months[$temp_month_number];
            }
        }

        return $temp_result;
    }

    public static function getBatchName($batch_list, $attribute_name)
    {
        $batchs = self::getBatchList();
        $temp_result = [];
        foreach ($batch_list as $eachRow) {
            $temp_batch_number = $eachRow[$attribute_name];
            if (array_key_exists($temp_batch_number, $batchs)) {
                $temp_result[$temp_batch_number] = $batchs[$temp_batch_number];
            }
        }

        return $temp_result;
    }

    public static function getBatchList()
    {
        return [
            "2" => "Amendment",
            "1" => "Original",
        ];
    }

    public static function getEstablishedYearRange()
    {
        $data = self::getCompanyBusinessInfo(\Yii::$app->company->current_company_id);
        $year = $data->established_year;
        $finYear = [$year - 1 => $year - 1, $year => $year, $year + 1 => $year + 1];
        return $finYear;
    }

    public static function getPayrollProcessingWagesYearRange()
    {
        $data = WagesModel::find()->select('financial_year')->asArray()->distinct()->all();

        if (!empty($data)) {

            foreach ($data as $key => $value) {
                $yr = $value['financial_year'];
                $finYear[$yr] = $value['financial_year'];
            }
            return $finYear;
        }

    }

    public static function getSalaryStatusById($salaryId)
    {
        if (!(is_null($salaryId) || empty($salaryId))) {
            $tempSalaryStatusList = self::getSalaryStatus();
            if (isset($tempSalaryStatusList[$salaryId]))
                return $tempSalaryStatusList[$salaryId];
            else
                return null;
        } else
            return null;
    }

    public static function getSalaryStatus()
    {
        return ['1' => 'Hourly',
            '2' => 'Monthly',
            '3' => 'Daily',];
    }

    public static function getUserAccessType()
    {
        $SubscribePackage = self::SubscribedPackage(Yii::$app->company->current_company_id);
        if (!empty($SubscribePackage) && $SubscribePackage->emp_self_service == 1) {
            return [
                "admin" => "Admin",
                "staff" => "Staff",
                "adminandstaff" => "Admin & Staff"
            ];
        } else {
            return [
                "admin" => "Admin",
            ];
        }

    }

    public static function getClaimStatus($status_id)
    {
        if (!(is_null($status_id) || empty($status_id))) {
            $statusList = self::getClaimStatusList();
            if (isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        } else
            return null;

    }

    public static function getClaimStatusList()
    {
        return [
            '1' => 'Pending',
            '2' => 'Approved',
            '3' => 'Rejected'
        ];
    }


    public static function getPaidLeaves()
    {
        $companyid = Yii::$app->company->current_company_id;
        $entitlePaidLists = EntitlementsModel::getEntitlementsall($companyid);
        $paidleave = ['TOIL', 'Public Holiday In Lieu'];
        foreach ($entitlePaidLists as $entitlePaidList) {
            array_push($paidleave, $entitlePaidList->leave_type);
        }
        return $paidleave;
    }

    public static function getCommissionPayrollstatusbyId($status_id)
    {
        if (!(is_null($status_id) || empty($status_id))) {
            $statusList = self::getCommissionPayrollstatus();
            if (isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        } else
            return null;
    }

    public static function getCommissionPayrollstatus()
    {
        return [
            'No' => 'Unpaid',
            'Yes' => 'Paid',
            'All' => 'All',

        ];
    }

    public static function getCommissionPayrollstatuswithallfirst()
    {
        return [
            '' => 'All',
            'No' => 'Unpaid',
            'Yes' => 'Paid',

        ];
    }

    public static function getLeaveStatusbyId($status_id)
    {
        if (!(is_null($status_id) || empty($status_id))) {
            $statusList = self::getLeaveStatus();
            if (isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        } else
            return null;
    }

    public static function getCompanyAdminInfo($company_id)
    {
        $AdminInfo = [];
        if (isset($company_id) && !empty($company_id)) {
            $connection = \Yii::$app->db;
            $itemname = "hrmClientAdmin_" . $company_id;
            $model = $connection->createCommand("SELECT hu.id,hu.email,hu.fullname,hu.display_name,haa.item_name FROM  hrm_users hu INNER JOIN hrm_auth_assignment haa ON haa.user_id = hu.id WHERE item_name = '" . $itemname . "'");
            $AdminInfo = $model->queryOne();
        }

        return $AdminInfo;
    }

    public static function getTimesheetSummaryProcessStatusById($statusId)
    {
        if (isset($statusId) || !empty($statusId)) {
            $statusList = self::getTimesheetSummaryProcessStatusList();
            if (isset($statusList[$statusId]))
                return $statusList[$statusId];
            else
                return null;
        } else
            return null;
    }

    public static function getTimesheetSummaryProcessStatusList()
    {
        // 1-Draft, 2-Pending, 3-Processed
        return [
            //'1' => 'Draft',
            '2' => 'Pending',
            '3' => 'Processed',
            '5' => 'Processed',
        ];
    }

    public static function getClaimStatusListsStatusById($statusId)
    {
        if (isset($statusId) || !empty($statusId)) {
            $statusLists = self::getClaimStatusLists();
            if (isset($statusLists[$statusId]))
                return $statusLists[$statusId];
            else
                return null;
        } else
            return null;
    }

    public static function getClaimStatusLists()
    {
        // 1-Pending, 2-In Process, 3-Processed
        return [
            '0' => 'Draft',
            '1' => 'Pending',
            '2' => 'Processed',
        ];
    }

    public static function getClaimPayrollStatusById($statusId)
    {
        if (isset($statusId) || !empty($statusId)) {
            $statusLists = self::getClaimPayrollLists();
            if (isset($statusLists[$statusId]))
                return $statusLists[$statusId];
            else
                return null;
        } else
            return null;
    }

    public static function getClaimPayrollLists()
    {
        // 1-Pending, 2-In Process, 3-Processed
        return [
            '0' => 'Pending',
            '1' => 'Processed',
        ];
    }

    /*public static function getTimesheetStatusList()

    {
        if (isset($statusId)||!empty($statusId)){
            $statusLists = self::getClaimStatusLists();
            if(isset($statusLists[$statusId]))
                return $statusLists[$statusId];
            else
                return null;
        }else
            return null;
    }*/

    public static function getCommissionStatusListsStatusById($statusId)
    {
        if (isset($statusId) || !empty($statusId)) {
            $statusLists = self::getCommissionStatusLists();
            if (isset($statusLists[$statusId]))
                return $statusLists[$statusId];
            else
                return null;
        } else
            return null;
    }


    public static function getCommissionStatusLists()
    {
        return [
            '1' => 'Active',
            '2' => 'Inactive',

        ];
    }

    public static function getTimesheetStatusByid($status_id)
    {
        if (isset($status_id) || !empty($status_id)) {
            $statusList = self::getTimesheetStatusList();
            if (isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        } else
            return null;
    }

    public static function getTimesheetStatusList()
    {
        return [
            '1' => 'Pending',
            '2' => 'Approved',
            '3' => 'Rejected',
        ];
    }

    public static function getUploadFileList()
    {
        return [
            '3' => 'Admin Pay Items Details Template',
            '5' => 'Department Template',
            '1' => 'Employees Details Template',
            '7' => 'Educational Background Template',
            //'2' => 'TimeSheet Details Template'EDUCATIONAL BACKGROUND,
            '4' => 'Job Titles Template',
            '6' => 'Projects Template',
            '8' => 'Skill and Qualification Template',
        ];
    }

    public static function getExportFileList()
    {
        return [
            '3' => 'Admin Pay Items Details',
            '5' => 'Department Details',
            '1' => 'Employees Details',
            '2' => 'Employee Other Payitems Details',
            '4' => 'Job Titles Details',
            '6' => 'Projects Details',

        ];
    }

    public static function getCommissionListById($type_id)
    {
        if (isset($type_id) || !empty($type_id)) {
            $statusList = self::getCommissionList();
            if (isset($statusList[$type_id]))
                return $statusList[$type_id];
            else
                return null;
        } else
            return null;
    }

    public static function getCommissionList()
    {
        return [
            '' => 'All',
            '1' => 'Individual',
            '2' => 'Split',
            '3' => 'Bulk Upload',

        ];
    }

    public static function getCommissionListwithoutbulk()
    {
        return [
            '' => 'All',
            '1' => 'Individual',
            '2' => 'Split',
            //  '3' => 'Bulk Upload',

        ];
    }

    public static function getCommissionapproval()
    {
        $status = [
            '' => 'All',
            'Approved' => 'Approved',
            'Pending' => 'Pending',
            'Rejected' => 'Rejected'
        ];
        return $status;
    }

    public static function getCommissionapprovalById($type_id)
    {
        if (isset($type_id) || !empty($type_id)) {
            $statusList = self::getCommissionapproval();
            if (isset($statusList[$type_id]))
                return $statusList[$type_id];
            else
                return null;
        } else
            return null;
    }

    public static function getTimesheetPaymentTypeById($type_id)
    {
        if (isset($type_id) || !empty($type_id)) {
            $statusList = self::getTimesheetPaymentTypeList();
            if (isset($statusList[$type_id]))
                return $statusList[$type_id];
            else
                return null;
        } else
            return null;
    }

    public static function getTimesheetPaymentTypeList()
    {
        return [
            '1' => 'Pending',
            '2' => 'Pay',
            '3' => 'TOIL',
            '4' => 'OT Rejected',
        ];
    }

    public static function getStatusAppList($statusid)
    {
        if (isset($statusid) || !empty($statusid)) {
            $statusLists = self::getApplicationsStatusList();
            if (isset($statusLists[$statusid]))
                return $statusLists[$statusid];
            else
                return null;
        } else
            return null;
    }

    public static function getApplicationsStatusList()
    {
        return [
            //'1' => 'Pending',
            'si' => 'Schedule Interview',
            'reject' => 'Reject',
        ];
    }

    public static function getCompanyCommissionType()
    {

        return [
            '1' => 'Flat Commission',
            '2' => 'Sliding Scale Commission',
            '3' => 'Variable Commission'
        ];
    }

    public static function getCompanyCommissionPlanType($CommissionList)
    {
        $CommissionPlan = [];
        foreach (self::getCompanyCommissionType() as $key => $value) {
            if (in_array($key, $CommissionList)) {
                $CommissionPlan[$key] = $value;
            }
        }
        return $CommissionPlan;
    }


    public static function getHourlyDurationTypes()
    {
        return [
            'HOUR' => 'Hours',
            'SDAY' => 'Single Day',
            'MDAY' => 'Multi Days',
        ];
    }

    public static function getHourlyPermissionList()
    {
        return [
            '0' => '0 Hour',
            '1' => '1 Hour',
            '2' => '2 Hours',
            '3' => '3 Hours',
            '4' => '4 Hours',
            '5' => '5 Hours',
            '6' => '6 Hours',
            '7' => '7 Hours',
            '8' => '8 Hours',
        ];
    }

    public static function getMinutePermissionList()
    {
        return [
            '0' => 'Select Minute',
            '5' => '5 Minute',
            '10' => '10 Minute',
            '15' => '15 Minute',
            '20' => '20 Minute',
            '25' => '25 Minute',
            '30' => '30 Minute',
            '35' => '35 Minute',
            '40' => '40 Minute',
            '45' => '45 Minute',
            '50' => '50 Minute',
            '55' => '55 Minute'
        ];
    }

    public static function getMinutesFromHours($input_hours)
    {
        if (isset($input_hours) && !empty($input_hours)) {
            $temp_days = intval($input_hours) * 60;
            return $temp_days;
        } else
            return 0;
    }

    public static function getJobOpeningstatus()
    {
        return [
            'open' => 'open',
            'closed' => 'Closed',

        ];
    }

    public static function getPluralizedStringforNumber($input_value, $value_scale)
    {
        $temp_value = floatval($input_value);
        if (isset($temp_value) && !empty($temp_value)) {
            if ($temp_value > 1) {
                return $temp_value . ' ' . $value_scale . 's';
            } else {
                return $temp_value . ' ' . $value_scale;
            }
        } else
            return null;
    }

    /*
     * Before we add the Data for Next Financial Year,
     * must updated the CPF Configuration Rate for the Year in location components\cpf_contributions
     * */

    public static function getPayrollAvailableYears()
    {
        $tempCpfContributionDetails = self::getCpfContributionDetailsUpdatedList();
        $tempYears = [];

        foreach ($tempCpfContributionDetails as $key => $value) {
            $tempYears[] = $key;
        }

        return $tempYears;
    }

    private static function getCpfContributionDetailsUpdatedList()
    {
        return [
            /*'2014' => [
                'ow_ceiling_permonth' => '5000',
                'age_limits' => [],
                'wages_range' => []
            ],*/
            '2015' => [
                'ow_ceiling_permonth' => '5000',
                'age_limits' => ['0_50', '50_55', '55_60', '60_65', '65_120'],
                'wages_range' => ['0_50', '50_500', '500_750', '750_100000']
            ],
            '2016' => [
                'ow_ceiling_permonth' => '6000',
                'age_limits' => ['0_55', '55_60', '60_65', '65_120'],
                'wages_range' => ['0_50', '50_500', '500_750', '750_100000']
            ],
            '2017' => [
                'ow_ceiling_permonth' => '6000',
                'age_limits' => ['0_55', '55_60', '60_65', '65_120'],
                'wages_range' => ['0_50', '50_500', '500_750', '750_100000']
            ],
            '2018' => [
                'ow_ceiling_permonth' => '6000',
                'age_limits' => ['0_55', '55_60', '60_65', '65_120'],
                'wages_range' => ['0_50', '50_500', '500_750', '750_100000']
            ],
            '2019' => [
                'ow_ceiling_permonth' => '6000',
                'age_limits' => ['0_55', '55_60', '60_65', '65_120'],
                'wages_range' => ['0_50', '50_500', '500_750', '750_100000']
            ]
        ];
    }

    public static function getPayrollAvailableYearsFromYear($from_year)
    {
        $tempCpfContributionDetails = self::getCpfContributionDetailsUpdatedList();
        $tempYears = [];

        foreach ($tempCpfContributionDetails as $key => $value) {
            if (intval($key) >= (int)$from_year) {
                $tempYears[] = $key;
            }
        }

        return $tempYears;
    }

    public static function getPayrollAvailableYearsNextYear($from_year)
    {
        $curYear = date('Y') + 1;
        for ($i = $from_year; $i <= $curYear; $i++) {
            $tempYears[$i] = $i;
        }
        return $tempYears;
    }

    /**
     * @param $year
     * @return null
     */
    public static function getCpfContributionDetailByYear($year)
    {
        $AvailableDetails = self::getCpfContributionDetailsUpdatedList();
        if (array_key_exists($year, $AvailableDetails)) {
            return $AvailableDetails[$year];
        } else {
            return null;
        }
    }

    public static function getCompanyPrimarySectors()
    {
        return [
            'C' => 'Construction',
            'M' => 'Manufacturing',
            'Me' => 'Marine',
            'P' => 'Process',
            'S' => 'Services',
            'Wr' => 'Wholesale & Retail',
        ];
    }

    public static function getCompanySecondarySectors()
    {
        return [
            '1' => 'Biomedical & Healthcare Services',
            '2' => 'Construction',
            '3' => 'Education',
            '4' => 'Food & Beverage Services',
            '5' => 'Information Technology',
            '7' => 'Logistics',
            '6' => 'Others',
        ];
    }

    public static function getCompanyWholesaleSectors()
    {
        return [
            '7' => 'Beauty & Wellness Retailer',
            '8' => 'Convenience Retailer',
            '9' => 'Department Stores',
            '10' => 'Discount Retailer',
            '11' => 'Electronics & Gadgets',
            '12' => 'Grocery Stores',
            '13' => 'Health Retailer',
            '14' => 'Hypermarkets',
            '15' => 'Internet E-tailer',
            '16' => 'Others',
            '17' => 'Specialty Retailers',
            '18' => 'Supermarkets',
            '19' => 'Warehouse Retailer',
        ];
    }


    /**
     * @param $country_name
     */
    public static function getSourceOriginforLevy($country_name)
    {
        $result = null;

        switch ($country_name) {
            case 'Malaysia' :
                $result = 'Malaysia';
                break;
            case 'China' :
                $result = 'PRC';
                break;
            case ($country_name == 'India' || $country_name == 'Sri Lanka' || $country_name == 'Thailand' || $country_name == 'Bangladesh' || $country_name == 'Myanmar' || $country_name == 'Philippines') :
                $result = 'NTS';
                break;
            case ($country_name == 'Hong Kong' || $country_name == 'Macau' || $country_name == 'Korea, Republic of' || $country_name == 'Taiwan') :
                $result = 'NAS';
                break;
        }

        return $result;
    }

    public static function getAllLevyRateValues()
    {
        return [
            [
                'form_date' => '01-07-2015',
                'to_date' => '30-06-2016',
                'file_name' => 'levy_rates_2015SH_2016FH'
            ]
        ];
    }

    public static function getCommissionReportlist()
    {
        return [
            '1' => 'All Employees',
            '2' => 'Specific Employee',

        ];
    }

    public static function getNriclist()
    {
        return [
            'F' => 'F',
            'G' => 'G',
            'S' => 'S',
            'T' => 'T',

        ];
    }

    public static function getNriclists2()
    {
        return [
            'A' => 'A',
            'B' => 'B',
            'C' => 'C',
            'D' => 'D',
            'E' => 'E',
            'F' => 'F',
            'G' => 'G',
            'H' => 'H',
            'I' => 'I',
            'J' => 'J',
            'K' => 'K',
            'L' => 'L',
            'M' => 'M',
            'N' => 'N',
            'O' => 'O',
            'P' => 'P',
            'Q' => 'Q',
            'R' => 'R',
            'S' => 'S',
            'T' => 'T',
            'U' => 'U',
            'V' => 'V',
            'W' => 'W',
            'X' => 'X',
            'Y' => 'Y',
            'Z' => 'Z',

        ];
    }

    public static function getSwiftBic()
    {
        return [
            '7931' => 'ANZBSGSXXXX',
            '7047' => 'BKKBSGSGXXX',
            '7065' => 'BOFASG2XXXX',
            '7083' => 'BKCHSGSGXXX',
            '7092' => 'BEASSGSGXXX',
            '7108' => 'BKIDSGSGXXX',
            '7126' => 'BOTKSGSXXXX',
            '7418' => 'BNPASGSGXXX',
            '9353' => 'CTCBSGSGXXX',
            '7986' => 'CIBBSGSGXXX',
            '7214' => 'CITISGSGXXX',
            '8606' => 'COBASGSXXXX',
            '7135' => 'CRLYSGSGXXX',
            '7171' => 'DBSSSGSGXXX',
            '7463' => 'DEUTSGSGXXX',
            '7737' => 'DNBASGSGXXX',
            '7199' => 'FAEASGSGXXX',
            '7764' => 'FCBKSGSGXXX',
            '7287' => 'HLBBSGSGXXX',
            '7232' => 'HSBCSGSGXXX',
            '9186' => 'ICICSGSGXXX',
            '7241' => 'IDIBSGSGXXX',
            '7250' => 'IOBASGSGXXX',
            '8712' => 'ICBKSGSGXXX',
            '8350' => 'BCITSGSGXXX',
            '7153' => 'CHASSGSGXXX',
            '7490' => 'KOEXSGSGXXX',
            '8873' => 'SOLASGSGXXX',
            '7302' => 'MBBESGSGXXX',
            '7621' => 'MHCBSGSGXXX',
            '8077' => 'NATASGSGXXX',
            '8518' => 'NDEASGSGXXX',
            '7339' => 'OCBCSGSGXXX',
            '7056' => 'BNINSGSGXXX',
            '7366' => 'RHBBSGSGXXX',
            '7010' => 'ABNASGSGXXX',
            '8527' => 'ESSESGSGXXX',
            '7852' => 'SOGESGSGXXX',
            '7144' => 'SCBLSGSGXXX',
            '7791' => 'SBINSGSGXXX',
            '7472' => 'SMBCSGSGXXX',
            '8493' => 'HANDSGSGXXX',
            '7685' => 'UBSWSGSGXXX',
            '7357' => 'UCBASGSGXXX',
            '7375' => 'UOVBSGSGXXX',
        ];
    }

    public static function getCompanystartyear()
    {

        $Company = self::getCompanyBusinessInfo(\Yii::$app->company->current_company_id);
        $startyear = $Company->established_year;
        $currentyear = date('Y');
        $yearlist = [];
        if ($currentyear != $startyear) {
            $currentyear = $currentyear + 1;
            $diff = $currentyear - $startyear;
            for ($i = 0; $i <= $diff; $i++) {
                $nextyear = $startyear++;
                array_push($yearlist, $nextyear);
            }
        } else {
            array_push($yearlist, $currentyear);
            array_push($yearlist, $currentyear + 1);
        }
        return $yearlist;
    }

    public static function getUsertwodigits($id)
    {
        $model = UsersModel::find()->where(['id' => $id])->one();
        $name = $model->fullname;
        $splitnamespace = explode(" ", $name);
        $namecount = sizeof($splitnamespace);
        if ($namecount == 1) {
            $firstname = $splitnamespace[0];
            $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
            $fullname = substr($firstname, 0, 1);
        } else {
            $firstname = $splitnamespace[0];
            $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
            $firstname = substr($firstname, 0, 1);
            $secondname = $splitnamespace[1];
            $secondname = preg_replace("/[^a-zA-Z]/", "", $secondname);
            $secondname = substr($secondname, 0, 1);
            $fullname = $firstname . $secondname;
            if ((strlen($fullname) == 1) && $namecount > 2) {
                $thirdname = $splitnamespace[2];
                $thirdname = preg_replace("/[^a-zA-Z]/", "", $thirdname);
                $thirdname = substr($thirdname, 0, 1);
                $fullname = $firstname . $secondname . $thirdname;
            }
        }
        return $fullname;
    }

    public static function getEmployeetwodigits($id)
    {
        $model = EmployeesModel::find()->select(['employeeid', 'fullname'])->where(['employeeid' => $id])->one();
        $name = $model->fullname;
        $splitnamespace = explode(" ", $name);
        $namecount = sizeof($splitnamespace);
        if ($namecount == 1) {
            $firstname = $splitnamespace[0];
            $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
            $fullname = substr($firstname, 0, 1);
        } else {
            $firstname = $splitnamespace[0];
            $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
            $firstname = substr($firstname, 0, 1);
            $secondname = $splitnamespace[1];
            $secondname = preg_replace("/[^a-zA-Z]/", "", $secondname);
            $secondname = substr($secondname, 0, 1);
            $fullname = $firstname . $secondname;
            if ((strlen($fullname) == 1) && $namecount > 2) {
                $thirdname = $splitnamespace[2];
                $thirdname = preg_replace("/[^a-zA-Z]/", "", $thirdname);
                $thirdname = substr($thirdname, 0, 1);
                $fullname = $firstname . $secondname . $thirdname;
            }
        }
        return $fullname;
    }

    public static function logaction($event, $action, $employeeid = null, $login_status = null)
    {
        $AudittrailModel = new AudittrailModel();
        $AudittrailModelUser_id = (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->id : null;
        $AudittrailModel->logtime = date("H:i:s");
        $AudittrailModel->login_date = date('Y-m-d');
        $AudittrailModel->username = isset(Yii::$app->user->identity->fullname) ? self::getDispalyName(Yii::$app->user->identity->fullname, Yii::$app->user->identity->display_name) : '';
        $AudittrailModel->ipaddress = Yii::$app->request->getUserIP();
        $AudittrailModel->event = $event;
        $AudittrailModel->action = $action;
        $AudittrailModel->user_id = $AudittrailModelUser_id;
        $AudittrailModel->employee_id = $employeeid;
        if (!is_null($login_status)) {
            $AudittrailModel->login_status = $login_status;
        }
        $AudittrailModel->save(false);
        return $AudittrailModel;
    }

    public static function logactionwithoutsession($event, $action, $fullname = null, $loginUserId = null, $employeeid = null)
    {
        $AudittrailModel = new AudittrailModel();
        $AudittrailModel->logtime = date("H:i:s");
        $AudittrailModel->login_date = date('Y-m-d');
        $AudittrailModel->username = $fullname;
        $AudittrailModel->ipaddress = Yii::$app->request->getUserIP();
        $AudittrailModel->event = $event;
        $AudittrailModel->action = $action;
        $AudittrailModel->user_id = $loginUserId;
        $AudittrailModel->employee_id = $employeeid;
        $AudittrailModel->save(false);
        return $AudittrailModel;
    }

    public static function GenerateEmployeecodenumber($companyid)
    {
        $Autogenerate = Autogenerate::find()->where(['company_id' => $companyid])->one();
        $CompanyPayrollModel = CompanyPayrollModel::find()->where(['company_id' => $companyid])->one();
        if (!empty($Autogenerate)) {
            if ($CompanyPayrollModel->emp_prefix != '') {
                $GenerateNumber = $CompanyPayrollModel->emp_prefix . sprintf("%03d", $Autogenerate['employee_id'] + 1);
            } else {
                $GenerateNumber = sprintf("%03d", $Autogenerate['employee_id'] + 1);
            }
            $Autogenerate->employee_id = $Autogenerate['employee_id'] + 1;
            $Autogenerate->save();
        } else {
            $NewAutogenerate = new Autogenerate();
            $NewAutogenerate->company_id = $companyid;
            $NewAutogenerate->employee_id = 1;
            $NewAutogenerate->save();
            if ($CompanyPayrollModel->emp_prefix != '') {
                $GenerateNumber = $CompanyPayrollModel->emp_prefix . sprintf("%03d", $NewAutogenerate->employee_id);
            } else {
                $GenerateNumber = sprintf("%03d", $NewAutogenerate->employee_id);
            }
        }
        return $GenerateNumber;
    }

    public static function Getdefaultworkweek($companyid, $employeeid)
    {
        $work_week = '';
        $CompanyPayrollModel = CompanyPayrollModel::getCompanyPayrollModel($companyid);
        if (isset($CompanyPayrollModel) && !empty($CompanyPayrollModel)) {
            $default_workingdays = $CompanyPayrollModel->default_workingdays;
            if ($default_workingdays == 'organization') {
                $work_week = $CompanyPayrollModel->work_week;
            } else {
                $empdetails = EmployeesModel::find()
                    ->where(['hrm_employees.companyid' => $companyid, 'hrm_employees.employeeid' => $employeeid])
                    ->joinWith('jobcategory')
                    ->asArray()
                    ->one();
                if (!empty($empdetails['jobcategory']['work_week']) && $empdetails['jobcategory']['work_week'] != null) {
                    $work_week = $empdetails['jobcategory']['work_week'];
                } else {
                    $work_week = 1;
                }
            }
        }
        return $work_week;
    }

    public static function GetPayrollworkweek($companyid, $employeeid)
    {
        $CompanyPayrollModel = CompanyPayrollModel::getCompanyPayrollModel($companyid);
        if (isset($CompanyPayrollModel)) {
            $default_workingdays = $CompanyPayrollModel['default_workingdays'];
            if ($default_workingdays == 'organization') {
                $work_week = $CompanyPayrollModel;
            } else if ($default_workingdays == 'department') {
                $empdetails = EmployeesModel::getCompanyEmployee($companyid,$employeeid);
                $Jobcategories = JobcategoriesModel::getJobcategoriesOne($empdetails->jobcategoryid);
                if (!empty($Jobcategories->work_week) && $Jobcategories->work_week != null) {
                    $work_week = $Jobcategories;
                } else {
                    $work_week = ['work_week' => 1, 'week_off_day1' => 'Sat', 'week_off_day2' => 'Sun'];
                }
            } else if ($default_workingdays == 'rosteringoff') {
                $work_week = ['work_week' => 5, 'week_off_day1' => '', 'week_off_day2' => ''];
            }
        }
        return $work_week;
    }

    public static function Getdefaultworkweekleave($companyid, $employeeid)
    {
        $CompanyPayrollModel = CompanyPayrollModel::getCompanyPayrollModel($companyid);
        $work_week = [];
        if (isset($CompanyPayrollModel)) {
            $default_workingdays = $CompanyPayrollModel->default_workingdays;
            if ($default_workingdays == 'organization') {
                $work_week = $CompanyPayrollModel;
            } else if ($default_workingdays == 'department') {
                $empdetails = EmployeesModel::getCompanyEmployee($companyid,$employeeid);
                if (!empty($empdetails->jobcategoryid) && $empdetails->jobcategoryid != null) {
                    $work_week = JobcategoriesModel::getJobcategoriesOne($empdetails->jobcategoryid);
                }
            } else if ($default_workingdays == 'rosteringoff') {
                $CompanyPayrollModel->work_week = 'rosteringoff';
                $work_week = $CompanyPayrollModel;
            }
        }
        return $work_week;
    }

    public static function Getviewsalarydetails()
    {
        if (Yii::$app->user->can('hrmClientAdmin_' . \Yii::$app->user->identity->company_id) || Yii::$app->user->can('viewsalary')) {
            return 'Yes';
        } else {
            /*$Employee = EmployeesModel::find()->select(['employeeid', 'jobcategoryid', 'viewsalary_details'])
                ->Where(['employeeid' => Yii::$app->user->identity->emp_id])->one();
            if ($Employee->viewsalary_details == 'all') {
                $JobcategoriesModel = JobcategoriesModel::find()->select('jobcategoryid')->where(['companyid' => Yii::$app->company->current_company_id, 'deletestatus' => "No"])
                    ->all();
                $viewsalarydetails = [];
                foreach ($JobcategoriesModel as $Jobcategorie) {
                    array_push($viewsalarydetails, $Jobcategorie['jobcategoryid']);
                }
            } else {
                $viewsalarydetails = explode(",", $Employee->viewsalary_details);
            }
            $EmployeesModel = EmployeesModel::find()->select(['employeeid', 'jobcategoryid'])
                ->where(['in', 'jobcategoryid', $viewsalarydetails])
                ->all();
            $empid = [];
            foreach ($EmployeesModel as $employee) {
                array_push($empid, $employee['employeeid']);
            }
            if (in_array(Yii::$app->request->get('id'), $empid)) {
                return 'Yes';
            } else {
                return 'No';
            }*/
            return 'No';
        }
    }

    public static function GetHoursMinutesConvert($tohourminute)
    {
        $hourss = floor($tohourminute / 60);
        if (strlen($hourss) < 2) {
            $hourss = '0' . $hourss;
        } else {
            $hourss = $hourss;
        }
        $decimalMinutess = $tohourminute - floor($tohourminute / 60) * 60;
        if (strlen($decimalMinutess) < 2) {
            $decimalMinutess = '0' . $decimalMinutess;
        } else {
            $decimalMinutess = $decimalMinutess;
        }
        return $hourss . ':' . $decimalMinutess;
    }

    public static function getWeekCount($date)
    {
        $date = date('Y-m-d');
        $last_day_Month = date('Y-m-t', strtotime($date));
        $EventStartDay = date('D', strtotime($last_day_Month));
        if ($EventStartDay == 'Mon')
            $EventStartDay = 'monday';
        if ($EventStartDay == 'Tue')
            $EventStartDay = 'tuesday';
        if ($EventStartDay == 'Wed')
            $EventStartDay = 'wednesday';
        if ($EventStartDay == 'Thu')
            $EventStartDay = 'thursday';
        if ($EventStartDay == 'Fri')
            $EventStartDay = 'friday';
        if ($EventStartDay == 'Sat')
            $EventStartDay = 'saturday';
        if ($EventStartDay == 'Sun')
            $EventStartDay = 'sunday';
        $date = $last_day_Month;
        $rollover = $EventStartDay;
        $cut = substr($date, 0, 8);
        $daylen = 86400;
        $timestamp = strtotime($date);
        $first = strtotime($cut . "00");
        $elapsed = ($timestamp - $first) / $daylen;
        $weeks = 0;
        for ($i = 1; $i <= $elapsed; $i++) {
            $dayfind = $cut . (strlen($i) < 2 ? '0' . $i : $i);
            $daytimestamp = strtotime($dayfind);

            $day = strtolower(date("l", $daytimestamp));

            if ($day == strtolower($rollover)) $weeks++;
        }
        return $weeks;

    }

    public static function getdayoffdate($enddate, $employeeid, $startdate, $CompanyId = null)
    {
        // $date variable is using end date.
        $enddate = date('Y-m-d', strtotime($enddate));
        $startdate = date('Y-m-d', strtotime($startdate));
        /*if (empty($CompanyId)) {
            $CompanyId = Yii::$app->company->current_company_id;
        }*/

        $EmprdoModel = EmprdoModel::find()->joinWith(['leavetype' => function ($leave) {
            return $leave->where(['status_option' => 'enable']);
        }])
            ->where(['hrm_emp_rdo.companyid' => $CompanyId, 'hrm_emp_rdo.employeeid' => $employeeid, 'parent_rdoid' => null, 'hrm_emp_rdo.deletestatus' => 'No'])->all();

        $Weeklist = ['Mon' => 'Monday', 'Tue' => 'Tuesday', 'Wed' => 'Wednesday', 'Thu' => 'Thursday', 'Fri' => 'Friday', 'Sat' => 'Saturday', 'Sun' => 'Sunday'];
        $Month_List = ['January' => '1', 'February' => '2', 'March' => '3', 'April' => '4', 'May' => '5', 'June' => '6', 'July' => '7', 'August' => '8', 'September' => '9', 'October' => '10', 'November' => '11', 'December' => '12'];
        $AllEventList = [];
        foreach ($EmprdoModel as $Emprdo) {
            $Entitlementsemp = EntitlementsemployeeModel::getEntitlementsemp($CompanyId,$Emprdo->leavetype);
            //find()->where(['companyid' => $CompanyId, 'empleavemasterid' => $Emprdo->leavetype])->one();
            $start = isset($Emprdo->startdate) ? $startdate : '';
            $end = isset($Emprdo->enddate) ? date('Y-m-d', strtotime($enddate)) : '';
            if ($Emprdo->repeat_applicable == 'Yes') {
                if ($Emprdo->repeat_type == 'Weekly') {
                    $repeateveryweek = $Emprdo->repeat_every_week;
                    if ($repeateveryweek == 1) {
                        $repeatdays = explode(',', $Emprdo->repeat_days);
                        $interval = new \DateInterval('P1D');
                        $realEnd = new \DateTime($end);
                        $realEnd->add($interval);
                        $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                        foreach ($perioddate as $date) {
                            $dateformat = $date->format('Y-m-d');
                            if ($Emprdo->startdate <= $dateformat && $dateformat <= $Emprdo->enddate) {
                                $applyleaveday = date('D', strtotime($dateformat));
                                if (in_array($applyleaveday, $repeatdays)) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    } else {
                        $repeatdays = explode(',', $Emprdo->repeat_days);
                        $interval = new \DateInterval('P1D');
                        $realEnd = new \DateTime($end);
                        $realEnd->add($interval);
                        $addnoweekday = '';
                        foreach ($repeatdays as $weekdays) {
                            $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $weekdays])->one();
                            if (empty($EmptemrdoModel)) {
                                $nextstart = '';
                            } else {
                                $nextstart = $Emprdo->startdate;
                            }

                            $perioddate = new \DatePeriod(new \DateTime($nextstart), $interval, $realEnd);
                            $i = 1;
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                $applyleaveday = date('D', strtotime($dateformat));
                                if ($applyleaveday == $weekdays) {
                                    if ($i == 1) {
                                        $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                            ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                        if (empty($EmprdoStatus)) {
                                            array_push($AllEventList, $dateformat);
                                        }
                                    }
                                    if ($i == $repeateveryweek) {
                                        $i = 0;
                                    }
                                    $i++;
                                }
                            }
                        }
                    }
                } else if ($Emprdo->repeat_type == 'Monthly') {
                    $replacemonthyear = date('m-Y', strtotime($enddate));
                    $repeateverymonth = $Emprdo->repeat_every_month;
                    if ($Emprdo->repeat_every_month_type == 'dayofmonth') {
                        $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $Emprdo->repeat_every_month_type])->one();
                        if (!empty($EmptemrdoModel)) {
                            $start_ts = strtotime($start);
                            $end_ts = strtotime($end);
                            $from_ts = strtotime($Emprdo->startdate);

                            $interval = new \DateInterval('P1D');
                            $realEnd = new \DateTime($end);
                            $realEnd->add($interval);

                            $monthyearsplit = explode('-', $replacemonthyear);
                            if ($EmptemrdoModel->curryear <= $monthyearsplit[1]) {
                                if ($EmptemrdoModel->curryear == $monthyearsplit[1]) {
                                    $currentyeardate = $EmptemrdoModel->current_year_date;
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofmonth($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            } else if (date('Y', $from_ts) <= $monthyearsplit[1]) {
                                if (date('Y', $from_ts) == $monthyearsplit[1]) {
                                    $currentyeardate = self::Getdayofmonth(date('Y', $from_ts), date('d', $from_ts), date('m', $from_ts), $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = date('Y', $from_ts);
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofmonth($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            }
                            $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                if (in_array($dateformat, explode(',', $EmptemrdoModel->current_year_date))) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    } else if ($Emprdo->repeat_every_month_type == 'dayofweek') {
                        $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $Emprdo->repeat_every_month_type])->one();
                        if (!empty($EmptemrdoModel)) {
                            $start_ts = strtotime($start);
                            $end_ts = strtotime($end);
                            $from_ts = strtotime($Emprdo->startdate);
                            $interval = new \DateInterval('P1D');
                            $realEnd = new \DateTime($end);
                            $realEnd->add($interval);
                            $monthyearsplit = explode('-', $replacemonthyear);
                            if ($EmptemrdoModel->curryear <= $monthyearsplit[1]) {
                                if ($EmptemrdoModel->curryear == $monthyearsplit[1]) {
                                    $currentyeardate = $EmptemrdoModel->current_year_date;
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofweek($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            } else if (date('Y', $from_ts) <= $monthyearsplit[1]) {
                                if (date('Y', $from_ts) == $monthyearsplit[1]) {
                                    $currentyeardate = self::Getdayofweek(date('Y', $from_ts), date('d', $from_ts), date('m', $from_ts), $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = date('Y', $from_ts);
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofweek($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            }
                            $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                if (in_array($dateformat, explode(',', $EmptemrdoModel->current_year_date))) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                array_push($AllEventList, $Emprdo->startdate);
            }
        }

        return $AllEventList;
    }

    public static function getdayoffdateDashboard($enddate, $employeeid, $startdate)
    {
        // $date variable is using end date.
        $enddate = date('Y-m-d', strtotime($enddate));
        $startdate = date('Y-m-d', strtotime($startdate));
        $CompanyId = Yii::$app->company->current_company_id;
        $employeeid = $employeeid;

        $EmprdoModel = EmprdoModel::find()
            ->joinWith(['leavetype' => function ($leave) {
                return $leave->where(['status_option' => 'enable']);
            }])
            ->where(['hrm_emp_rdo.companyid' => $CompanyId, 'hrm_emp_rdo.employeeid' => $employeeid, 'parent_rdoid' => null, 'hrm_emp_rdo.deletestatus' => 'No'])->all();
        $Weeklist = ['Mon' => 'Monday', 'Tue' => 'Tuesday', 'Wed' => 'Wednesday', 'Thu' => 'Thursday', 'Fri' => 'Friday', 'Sat' => 'Saturday', 'Sun' => 'Sunday'];
        $Month_List = ['January' => '1', 'February' => '2', 'March' => '3', 'April' => '4', 'May' => '5', 'June' => '6', 'July' => '7', 'August' => '8', 'September' => '9', 'October' => '10', 'November' => '11', 'December' => '12'];
        $AllEventList = [];
        foreach ($EmprdoModel as $Emprdo) {
            $Entitlementsemp = EntitlementsemployeeModel::find()->where(['companyid' => $CompanyId, 'empleavemasterid' => $Emprdo->leavetype])->one();
            $start = isset($Emprdo->startdate) ? $startdate : '';
            $end = isset($Emprdo->enddate) ? date('Y-m-d', strtotime($enddate)) : '';
            if ($Emprdo->repeat_applicable == 'Yes') {
                if ($Emprdo->repeat_type == 'Weekly') {
                    $repeateveryweek = $Emprdo->repeat_every_week;
                    if ($repeateveryweek == 1) {
                        $repeatdays = explode(',', $Emprdo->repeat_days);
                        $interval = new \DateInterval('P1D');
                        $realEnd = new \DateTime($end);
                        $realEnd->add($interval);
                        $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                        foreach ($perioddate as $date) {
                            $dateformat = $date->format('Y-m-d');
                            if ($Emprdo->startdate <= $dateformat && $dateformat <= $Emprdo->enddate) {
                                $applyleaveday = date('D', strtotime($dateformat));
                                if (in_array($applyleaveday, $repeatdays)) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    } else {
                        $repeatdays = explode(',', $Emprdo->repeat_days);
                        $interval = new \DateInterval('P1D');
                        $realEnd = new \DateTime($end);
                        $realEnd->add($interval);
                        $addnoweekday = '';
                        foreach ($repeatdays as $weekdays) {
                            $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $weekdays])->one();
                            if (empty($EmptemrdoModel)) {
                                $nextstart = '';
                            } else {
                                $nextstart = $Emprdo->startdate;
                            }

                            $perioddate = new \DatePeriod(new \DateTime($nextstart), $interval, $realEnd);
                            $i = 1;
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                $applyleaveday = date('D', strtotime($dateformat));
                                if ($applyleaveday == $weekdays) {
                                    if ($i == 1) {
                                        $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                            ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                        if (empty($EmprdoStatus)) {
                                            array_push($AllEventList, $dateformat);
                                        }
                                    }
                                    if ($i == $repeateveryweek) {
                                        $i = 0;
                                    }
                                    $i++;
                                }
                            }
                        }
                    }
                } else if ($Emprdo->repeat_type == 'Monthly') {
                    $replacemonthyear = date('m-Y', strtotime($enddate));
                    $repeateverymonth = $Emprdo->repeat_every_month;
                    if ($Emprdo->repeat_every_month_type == 'dayofmonth') {
                        $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $Emprdo->repeat_every_month_type])->one();
                        if (!empty($EmptemrdoModel)) {
                            $start_ts = strtotime($start);
                            $end_ts = strtotime($end);
                            $from_ts = strtotime($Emprdo->startdate);

                            $interval = new \DateInterval('P1D');
                            $realEnd = new \DateTime($end);
                            $realEnd->add($interval);

                            $monthyearsplit = explode('-', $replacemonthyear);
                            if ($EmptemrdoModel->curryear <= $monthyearsplit[1]) {
                                if ($EmptemrdoModel->curryear == $monthyearsplit[1]) {
                                    $currentyeardate = $EmptemrdoModel->current_year_date;
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofmonth($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            } else if (date('Y', $from_ts) <= $monthyearsplit[1]) {
                                if (date('Y', $from_ts) == $monthyearsplit[1]) {
                                    $currentyeardate = self::Getdayofmonth(date('Y', $from_ts), date('d', $from_ts), date('m', $from_ts), $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = date('Y', $from_ts);
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofmonth($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            }
                            $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                if (in_array($dateformat, explode(',', $EmptemrdoModel->current_year_date))) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    } else if ($Emprdo->repeat_every_month_type == 'dayofweek') {
                        $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $Emprdo->repeat_every_month_type])->one();
                        if (!empty($EmptemrdoModel)) {
                            $start_ts = strtotime($start);
                            $end_ts = strtotime($end);
                            $from_ts = strtotime($Emprdo->startdate);
                            $interval = new \DateInterval('P1D');
                            $realEnd = new \DateTime($end);
                            $realEnd->add($interval);
                            $monthyearsplit = explode('-', $replacemonthyear);
                            if ($EmptemrdoModel->curryear <= $monthyearsplit[1]) {
                                if ($EmptemrdoModel->curryear == $monthyearsplit[1]) {
                                    $currentyeardate = $EmptemrdoModel->current_year_date;
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofweek($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            } else if (date('Y', $from_ts) <= $monthyearsplit[1]) {
                                if (date('Y', $from_ts) == $monthyearsplit[1]) {
                                    $currentyeardate = self::Getdayofweek(date('Y', $from_ts), date('d', $from_ts), date('m', $from_ts), $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = date('Y', $from_ts);
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofweek($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            }
                            $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                if (in_array($dateformat, explode(',', $EmptemrdoModel->current_year_date))) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                array_push($AllEventList, $Emprdo->startdate);
            }
        }

        return $AllEventList;
    }

    public static function Getdayofmonth($syear, $sday, $smonth, $repeateverymonth)
    {
        $yeardate = [];
        $smonth = round($smonth);
        if ($repeateverymonth == 1) {
            for ($month = $smonth; $month <= 12; $month++) {
                if ($month < 10) {
                    $yeardate[] = $syear . '-0' . $month . '-' . $sday;
                } else {
                    $yeardate[] = $syear . '-' . $month . '-' . $sday;
                }
            }
        } else {
            for ($month = $smonth; $month <= 12; $month++) {
                if ($month < 10) {
                    $yeardate[] = $syear . '-0' . $month . '-' . $sday;
                } else {
                    $yeardate[] = $syear . '-' . $month . '-' . $sday;
                }
                $month = $month + ($repeateverymonth - 1);
            }
        }
        return $explodedate = implode(',', $yeardate);
    }

    public static function Getdayofweek($syear, $sday, $smonth, $repeateverymonth, $dayofweek_type)
    {
        $yeardate = [];
        $smonth = round($smonth);
        if ($repeateverymonth == 1) {
            for ($month = $smonth; $month <= 12; $month++) {
                if ($month < 10) {
                    $formingdate = $syear . '-0' . $month . '-' . '01';
                    $formatday = date('F Y', strtotime($formingdate));
                    $yeardate[] = date('Y-m-d', strtotime($dayofweek_type . ' of ' . $formatday));
                } else {
                    $formingdate = $syear . '-' . $month . '-' . '01';
                    $formatday = date('F Y', strtotime($formingdate));
                    $yeardate[] = date('Y-m-d', strtotime($dayofweek_type . ' of ' . $formatday));
                }
            }
        } else {
            for ($month = $smonth; $month <= 12; $month++) {
                if ($month < 10) {
                    $formingdate = $syear . '-0' . $month . '-' . '01';
                    $formatday = date('F Y', strtotime($formingdate));
                    $yeardate[] = date('Y-m-d', strtotime($dayofweek_type . ' of ' . $formatday));
                } else {
                    $formingdate = $syear . '-' . $month . '-' . '01';
                    $formatday = date('F Y', strtotime($formingdate));
                    $yeardate[] = date('Y-m-d', strtotime($dayofweek_type . ' of ' . $formatday));
                }
                $month = $month + ($repeateverymonth - 1);
            }
        }
        return $explodedate = implode(',', $yeardate);
    }

    public static function getRosteringDayOffDate($enddate, $employeeid, $startdate, $CompanyId = null)
    {
        // $date variable is using end date.
        $enddate = date('Y-m-d', strtotime($enddate));
        $startdate = date('Y-m-d', strtotime($startdate));
        if (empty($CompanyId)) {
            $CompanyId = Yii::$app->company->current_company_id;
        }

        $EmprdoModel = EmprdoModel::find()
            ->joinWith(['leavetype' => function ($leave) {
                return $leave->where(['status_option' => 'enable']);
            }])
            ->where(['hrm_emp_rdo.companyid' => $CompanyId, 'hrm_emp_rdo.employeeid' => $employeeid, 'parent_rdoid' => null, 'hrm_emp_rdo.deletestatus' => 'No'])->all();
        $Weeklist = ['Mon' => 'Monday', 'Tue' => 'Tuesday', 'Wed' => 'Wednesday', 'Thu' => 'Thursday', 'Fri' => 'Friday', 'Sat' => 'Saturday', 'Sun' => 'Sunday'];
        $Month_List = ['January' => '1', 'February' => '2', 'March' => '3', 'April' => '4', 'May' => '5', 'June' => '6', 'July' => '7', 'August' => '8', 'September' => '9', 'October' => '10', 'November' => '11', 'December' => '12'];
        $AllEventList = [];
        foreach ($EmprdoModel as $Emprdo) {
            $Entitlementsemp = EntitlementsemployeeModel::find()->where(['hrm_employee_leave_master.companyid' => $CompanyId, 'empleavemasterid' => $Emprdo->leavetype])->joinWith(["entitlements"])->one();
            $start = isset($Emprdo->startdate) ? $startdate : '';
            $end = isset($Emprdo->enddate) ? date('Y-m-d', strtotime($enddate)) : '';
            if ($Emprdo->repeat_applicable == 'Yes') {
                if ($Emprdo->repeat_type == 'Weekly') {
                    $repeateveryweek = $Emprdo->repeat_every_week;
                    if ($repeateveryweek == 1) {
                        $repeatdays = explode(',', $Emprdo->repeat_days);
                        $interval = new \DateInterval('P1D');
                        $realEnd = new \DateTime($end);
                        $realEnd->add($interval);
                        $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                        foreach ($perioddate as $date) {
                            $dateformat = $date->format('Y-m-d');
                            if ($Emprdo->startdate <= $dateformat && $dateformat <= $Emprdo->enddate) {
                                $applyleaveday = date('D', strtotime($dateformat));
                                if (in_array($applyleaveday, $repeatdays)) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        $tempArray = [
                                            "leaveTitle" => $Entitlementsemp->leave_type,
                                            "rostering_affect" => $Entitlementsemp->entitlements->rostering_affect
                                        ];
                                        $AllEventList[$dateformat] = $tempArray;
                                        //array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    } else {
                        $repeatdays = explode(',', $Emprdo->repeat_days);
                        $interval = new \DateInterval('P1D');
                        $realEnd = new \DateTime($end);
                        $realEnd->add($interval);
                        $addnoweekday = '';
                        foreach ($repeatdays as $weekdays) {
                            $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $weekdays])->one();
                            if (empty($EmptemrdoModel)) {
                                $nextstart = '';
                            } else {
                                $nextstart = $Emprdo->startdate;
                            }

                            $perioddate = new \DatePeriod(new \DateTime($nextstart), $interval, $realEnd);
                            $i = 1;
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                $applyleaveday = date('D', strtotime($dateformat));
                                if ($applyleaveday == $weekdays) {
                                    if ($i == 1) {
                                        $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                            ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                        if (empty($EmprdoStatus)) {
                                            $tempArray = [
                                                "leaveTitle" => $Entitlementsemp->leave_type,
                                                "rostering_affect" => $Entitlementsemp->entitlements->rostering_affect
                                            ];
                                            $AllEventList[$dateformat] = $tempArray;
                                            //array_push($AllEventList, $dateformat);
                                        }
                                    }
                                    if ($i == $repeateveryweek) {
                                        $i = 0;
                                    }
                                    $i++;
                                }
                            }
                        }
                    }
                } else if ($Emprdo->repeat_type == 'Monthly') {
                    $replacemonthyear = date('m-Y', strtotime($enddate));
                    $repeateverymonth = $Emprdo->repeat_every_month;
                    if ($Emprdo->repeat_every_month_type == 'dayofmonth') {
                        $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $Emprdo->repeat_every_month_type])->one();
                        if (!empty($EmptemrdoModel)) {
                            $start_ts = strtotime($start);
                            $end_ts = strtotime($end);
                            $from_ts = strtotime($Emprdo->startdate);

                            $interval = new \DateInterval('P1D');
                            $realEnd = new \DateTime($end);
                            $realEnd->add($interval);

                            $monthyearsplit = explode('-', $replacemonthyear);
                            if ($EmptemrdoModel->curryear <= $monthyearsplit[1]) {
                                if ($EmptemrdoModel->curryear == $monthyearsplit[1]) {
                                    $currentyeardate = $EmptemrdoModel->current_year_date;
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofmonth($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            } else if (date('Y', $from_ts) <= $monthyearsplit[1]) {
                                if (date('Y', $from_ts) == $monthyearsplit[1]) {
                                    $currentyeardate = self::Getdayofmonth(date('Y', $from_ts), date('d', $from_ts), date('m', $from_ts), $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = date('Y', $from_ts);
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofmonth($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            }
                            $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                if (in_array($dateformat, explode(',', $EmptemrdoModel->current_year_date))) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        $tempArray = [
                                            "leaveTitle" => $Entitlementsemp->leave_type,
                                            "rostering_affect" => $Entitlementsemp->entitlements->rostering_affect
                                        ];
                                        $AllEventList[$dateformat] = $tempArray;
                                        //array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    } else if ($Emprdo->repeat_every_month_type == 'dayofweek') {
                        $EmptemrdoModel = Emptemrdo::find()->where(['rdoid' => $Emprdo->rdoid, 'employeeid' => $Emprdo->employeeid, 'repeats_day' => $Emprdo->repeat_every_month_type])->one();
                        if (!empty($EmptemrdoModel)) {
                            $start_ts = strtotime($start);
                            $end_ts = strtotime($end);
                            $from_ts = strtotime($Emprdo->startdate);
                            $interval = new \DateInterval('P1D');
                            $realEnd = new \DateTime($end);
                            $realEnd->add($interval);
                            $monthyearsplit = explode('-', $replacemonthyear);
                            if ($EmptemrdoModel->curryear <= $monthyearsplit[1]) {
                                if ($EmptemrdoModel->curryear == $monthyearsplit[1]) {
                                    $currentyeardate = $EmptemrdoModel->current_year_date;
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofweek($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            } else if (date('Y', $from_ts) <= $monthyearsplit[1]) {
                                if (date('Y', $from_ts) == $monthyearsplit[1]) {
                                    $currentyeardate = self::Getdayofweek(date('Y', $from_ts), date('d', $from_ts), date('m', $from_ts), $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = date('Y', $from_ts);
                                } else {
                                    if ($repeateverymonth != 1) {
                                        $empstartdate = new \DateTime($Emprdo->startdate);
                                        $empcurrdate = new \DateTime($monthyearsplit[1] . "-01-" . date('d', $from_ts));
                                        $TotalMonth = $empstartdate->diff($empcurrdate)->m + ($empstartdate->diff($empcurrdate)->y * 12);
                                        $RemainMonth = $TotalMonth % $repeateverymonth;
                                        $smonth = 1 + ($repeateverymonth - $RemainMonth);
                                    } else {
                                        $smonth = '01';
                                    }
                                    $currentyeardate = self::Getdayofweek($monthyearsplit[1], date('d', $from_ts), $smonth, $repeateverymonth, $Emprdo->dayofweek_type);
                                    $EmptemrdoModel->current_year_date = $currentyeardate;
                                    $EmptemrdoModel->curryear = $monthyearsplit[1];
                                }
                            }
                            $perioddate = new \DatePeriod(new \DateTime($start), $interval, $realEnd);
                            foreach ($perioddate as $date) {
                                $dateformat = $date->format('Y-m-d');
                                if (in_array($dateformat, explode(',', $EmptemrdoModel->current_year_date))) {
                                    $EmprdoStatus = EmprdoModel::find()->where(['leavetype' => $Emprdo->leavetype, 'employeeid' => $employeeid])
                                        ->andWhere(['or', ['status' => 'delete'], ['status' => 'update']])->andWhere(['parent_rdoid' => $Emprdo->rdoid, 'startdate' => $dateformat])->asArray()->one();
                                    if (empty($EmprdoStatus)) {
                                        $tempArray = [
                                            "leaveTitle" => $Entitlementsemp->leave_type,
                                            "rostering_affect" => $Entitlementsemp->entitlements->rostering_affect
                                        ];
                                        $AllEventList[$dateformat] = $tempArray;
                                        //array_push($AllEventList, $dateformat);
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                $tempArray = [
                    "leaveTitle" => $Entitlementsemp->leave_type,
                    "rostering_affect" => $Entitlementsemp->entitlements->rostering_affect
                ];
                $AllEventList[$Emprdo->startdate] = $tempArray;
                //array_push($AllEventList, $Emprdo->startdate);
            }
        }

        return $AllEventList;
    }

    public static function getWeekOffDate($date, $employeeid, $CompanyId = null)
    {
        if (empty($CompanyId)) {
            $CompanyId = Yii::$app->company->current_company_id;
        }

        $CompanyPayrollModel = CompanyPayrollModel::find()->where(['company_id' => $CompanyId])->one();
        if (isset($CompanyPayrollModel->default_workingdays) && !empty($CompanyPayrollModel->default_workingdays) && $CompanyPayrollModel->default_workingdays != 'rosteringoff') {
            $leaveDay = date("D", strtotime($date));
            $EmpworkweekoffModel = EmployeeworkweekoffModel::find()->where(['employeeid' => $employeeid,
                'companyid' => $CompanyId, 'deletestatus' => 'No'])
                ->andWhere(['or', ['=', 'week_off_day1', $leaveDay], ['=', 'week_off_day2', $leaveDay],])
                ->one();

            if ($EmpworkweekoffModel) {
                return $date;
            }
            return false;
        } else {
            return false;
        }

    }

    public static function getHolidayDate($date, $CompanyId = null)
    {

        if (empty($CompanyId)) {
            $CompanyId = Yii::$app->company->current_company_id;
        }

        $HolidayTempArray = ['or',
            ['=', 'is_recurring', 'Yes'],
            ['and', ['=', 'is_recurring', 'No'],
                ['=', 'holiday_year', date('Y', time())]
            ],
        ];
        $HolidayList = HolidaysModel::find()
            ->select(['holiday_title', 'holiday_date', 'holiday_day', 'holiday_month', 'is_recurring'])
            ->where(['companyid' => $CompanyId, 'deletestatus' => 'No'])
            ->andWhere(['between', 'holiday_date', $date, $date])
            ->andWhere($HolidayTempArray)
            ->all();
        $HolidayArray = [];
        foreach ($HolidayList as $Holiday) {
            $hDate = date("Y-m-d", strtotime($Holiday->holiday_date));
            $HolidayArray[$hDate] = $Holiday->holiday_title;
        }

        if (count($HolidayArray) > 0) {
            return $HolidayArray;
        }
        return false;

    }

    public static function getApprovalLeaveDate($date, $employeeid, $CompanyId = null)
    {

        if (empty($CompanyId)) {
            $CompanyId = Yii::$app->company->current_company_id;
        }

        $LeaveModels = LeaveModel::find()
            ->where(['hrm_leave.companyid' => $CompanyId, 'hrm_leave.deletestatus' => 'No'])
            ->andWhere(['=', 'hrm_leave.leave_status', 'A'])
            ->andWhere(['=', 'hrm_leave.employeeid', $employeeid])
            ->andWhere(['or', ['between', 'hrm_leave.singledate', $date, $date], ['between', 'hrm_leave.from_date', $date, $date], ['between', 'hrm_leave.to_date', $date, $date], ['and', ['<', 'hrm_leave.from_date', $date], ['>', 'hrm_leave.to_date', $date]]])
            ->andWhere(['IS', 'hrm_leave.parent_leaveid', (new Expression('Null'))])
            ->joinWith(["leavetype"])
            ->all();

        if (count($LeaveModels) > 0) {
            return $LeaveModels;
        }
        return false;
    }

    public static function getEmployeeName($employeeid)
    {
        $EmployeesModel = EmployeesModel::find()->select(['employeeid', 'fullname', 'companyid', 'display_name'])->joinWith(['companyInfo' => function ($e) {
            return $e->select(['company_id', 'short_name']);
        }])->where(['employeeid' => $employeeid])->one();
        if ($EmployeesModel->companyInfo->short_name == 'Yes') {
            if (!empty($EmployeesModel->display_name))
                $Display_Name = $EmployeesModel->display_name;
            else
                $Display_Name = $EmployeesModel->fullname;
        } else {
            $Display_Name = $EmployeesModel->fullname;
        }
        return $Display_Name;
    }


    /*public static function getDispalyNametwodigit($employeeid)
    {
          $name = self::getDispalyName($employeeid);
          $splitnamespace = explode(" ", $name);
          $namecount = sizeof($splitnamespace);
          if ($namecount == 1) {
                $firstname = $splitnamespace[0];
                $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
                $fullname = substr($firstname, 0, 1);
          } else {
                $firstname = $splitnamespace[0];
                $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
                $firstname = substr($firstname, 0, 1);
                $secondname = $splitnamespace[1];
                $secondname = preg_replace("/[^a-zA-Z]/", "", $secondname);
                $secondname = substr($secondname, 0, 1);
                $fullname = $firstname . $secondname;
                if ((strlen($fullname) == 1) && $namecount > 2) {
                    $thirdname = $splitnamespace[2];
                    $thirdname = preg_replace("/[^a-zA-Z]/", "", $thirdname);
                    $thirdname = substr($thirdname, 0, 1);
                    $fullname = $firstname . $secondname . $thirdname;
                }
          }
          return $fullname;
    }*/

    public static function getDispalyName($full_name, $display_name, $list = null)
    {
        if (!Yii::$app->session->has('shortName_show')) {
            $shortName_show = 'No';
            $BusinessInfoModel = self::getCompanyBusinessInfo(Yii::$app->user->identity->company_id);
            if (!empty($BusinessInfoModel)) {
                if ($BusinessInfoModel->short_name == 'Yes') {
                    $shortName_show = 'Yes';
                }
            }
            Yii::$app->session->set('shortName_show', $shortName_show);
        }

        $Display_Name = '';
        if (Yii::$app->session->get('shortName_show') == 'Yes') {
            if (!empty($display_name)) {
                if ($list != 'list')
                    $Display_Name = $display_name;
                else
                    $Display_Name = $full_name . ', ' . $display_name;
            } else {
                $Display_Name = $full_name;
            }
        } else {
            $Display_Name = $full_name;
        }
        return $Display_Name;
    }


    public static function GetBothName($fullname, $display_name)
    {
        if (Yii::$app->session->get('shortName_show') == 'Yes') {
            if (!empty($display_name)) {
                $short_name_list = $fullname . ' (' . $display_name . ')';
            } else {
                $short_name_list = $fullname;
            }
        } else {
            $short_name_list = $fullname;
        }
        return $short_name_list;
    }

    public static function getDispalyNametwodigit($full_name, $display_name, $list = null)
    {
        $name = self::getDispalyName($full_name, $display_name, $list);
        $splitnamespace = explode(" ", $name);
        $namecount = sizeof($splitnamespace);
        if ($namecount == 1) {
            $firstname = $splitnamespace[0];
            $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
            $fullname = substr($firstname, 0, 1);
        } else {
            $firstname = $splitnamespace[0];
            $firstname = preg_replace("/[^a-zA-Z]/", "", $firstname);
            $firstname = substr($firstname, 0, 1);
            $secondname = $splitnamespace[1];
            $secondname = preg_replace("/[^a-zA-Z]/", "", $secondname);
            $secondname = substr($secondname, 0, 1);
            $fullname = $firstname . $secondname;
            if ((strlen($fullname) == 1) && $namecount > 2) {
                $thirdname = $splitnamespace[2];
                $thirdname = preg_replace("/[^a-zA-Z]/", "", $thirdname);
                $thirdname = substr($thirdname, 0, 1);
                $fullname = $firstname . $secondname . $thirdname;
            }
        }
        return $fullname;
    }

    public static function getEntitleName($name, $arrayname)
    {
        $letters = substr(preg_replace('/(\B.|\s+)/', '', $name), 0, 4);
        if (in_array($letters, $arrayname)) {
            $i = 1;
            $words = explode(" ", $name);
            $acronym = "";
            foreach ($words as $word) {
                if ($i == 1) {
                    $acronym .= substr($word, 0, 2);
                } else {
                    $acronym .= substr($word, 0, 1);
                }
                $i++;
            }
            $letters = $acronym;
        }
        return strtoupper($letters);
    }

    public static function getDeductibles_type()
    {
        return [
            "0" => "Individual by Sliding Scale",
            "1" => "Common",
            "2" => "Both",
        ];
    }

    public static function getMultileaveapproval($CompanyId)
    {
        $CompanyLeavepolicyModel = CompanyLeavepolicyModel::find()->select(['companyid', 'leave_approval', 'leave_approval_person'])->where(['companyid' => $CompanyId])->one();
        if (!empty($CompanyLeavepolicyModel)) {
            if ($CompanyLeavepolicyModel->leave_approval == '1') {
                $LeaveApproval = 'Yes';
            } else
                $LeaveApproval = 'No';
        } else {
            $LeaveApproval = 'No';
        }
        return $LeaveApproval;
    }

    public static function getMultileaveapprovalsettings($CompanyId)
    {
        $CompanyLeavepolicy = CompanyLeavepolicyModel::getCompanyLeavepolicy($CompanyId);
        $LeaveApproval = ['LeaveApproval' => 'No', 'ApprovalMethod' => 'No'];
        //$LeaveApproval = ['LeaveApproval'=>'No','Approvedby'=>$countApprovedby,'ApprovalMethod'=>$approval_method,'ApprovalType'=>$approvel_type];
        if (!empty($CompanyLeavepolicy)) {
            if ($CompanyLeavepolicy->multileave_approval == 'Yes') {
                $approval_method = $CompanyLeavepolicy->approval_method;
                $approvel_type = $CompanyLeavepolicy->approvel_type;
                if ($approval_method == 'multilevel') {
                    $countRecommendby = $CompanyLeavepolicy->recommended_by;
                    $countApprovedby = $CompanyLeavepolicy->approved_by;
                    $LeaveApproval = ['Recommendby' => $countRecommendby, 'Approvedby' => $countApprovedby, 'ApprovalType' => $approvel_type,
                        'ApprovalMethod' => $approval_method, 'LeaveApproval' => 'Yes', 'leveloption' => $CompanyLeavepolicy->level_approval,
                        'level_approvetype_1' => $CompanyLeavepolicy->level_approvetype_1, 'level_approvetype_2' => $CompanyLeavepolicy->level_approvetype_2, 'level_approvetype_3' => $CompanyLeavepolicy->level_approvetype_3,
                        'level_approvetype_4' => $CompanyLeavepolicy->level_approvetype_4, 'level_approvetype_5' => $CompanyLeavepolicy->level_approvetype_5,
                        'approve_level_by1' => $CompanyLeavepolicy->approve_level_by1, 'approve_level_by2' => $CompanyLeavepolicy->approve_level_by2, 'approve_level_by3' => $CompanyLeavepolicy->approve_level_by3,
                        'approve_level_by4' => $CompanyLeavepolicy->approve_level_by4, 'approve_level_by5' => $CompanyLeavepolicy->approve_level_by5];
                } else {
                    $countApprovedby = $CompanyLeavepolicy->leave_approval_persons;
                    $countRecommendby = '';
                    $LeaveApproval = ['LeaveApproval' => 'Yes', 'Recommendby' => $countRecommendby, 'Approvedby' => $countApprovedby, 'ApprovalMethod' => $approval_method, 'ApprovalType' => $approvel_type];
                }

            } else {
                $approval_method = $CompanyLeavepolicy->approval_method;
                $approvel_type = $CompanyLeavepolicy->approvel_type;
                $countApprovedby = $CompanyLeavepolicy->leave_approval_persons;
                $LeaveApproval = ['LeaveApproval' => 'No', 'Approvedby' => $countApprovedby, 'ApprovalMethod' => $approval_method, 'ApprovalType' => $approvel_type];
            }
        }
        return $LeaveApproval;
    }

    public static function formatSizeUnits($size)
    {
        $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        if ($size == 0) {

        } else {
            return (round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
        }
    }

    public static function GetWeekNumber()
    {
        $WeekNumber = ['Mon' => 1, 'Tue' => 2, 'Wed' => 3, 'Thu' => 4, 'Fri' => 5, 'Sat' => 6, 'Sun' => 7];
        return $WeekNumber;
    }

    public static function GetDepartmentlist()
    {
        $departmentlist = JobcategoriesModel::find()->select(['companyid', 'name', 'deletestatus', 'jobcategoryid'])->where(['companyid' => Yii::$app->company->current_company_id, 'deletestatus' => 'No'])->orderBy('name asc')->all();
        $alldepartment = ['all' => 'All'];
        foreach ($departmentlist as $department) {
            $alldepartment[$department->jobcategoryid] = $department->name;
        }
        return $alldepartment;
    }

    public static function GetOldJobtitle($employeeid, $processmonth, $processyear)
    {
        $jobtitle = false;
        $ProgrationModel = EmpprogrationModel::find()->joinWith(['olddesgination'])->where(['hrm_emp_progration.employeeid' => $employeeid])
            ->andWhere('(MONTH(hrm_emp_progration.effecteddate) > ' . $processmonth . ' and YEAR(hrm_emp_progration.effecteddate) = ' . $processyear . ') or (YEAR(hrm_emp_progration.effecteddate) > ' . $processyear . ')')
            ->one();
        if (!empty($ProgrationModel)) {
            $jobtitle = $ProgrationModel['olddesgination']['title'];
        }
        return $jobtitle;
    }

    public static function GetCurrentcompanyName()
    {
        $companyname = '';
        $CompanyId = Yii::$app->company->current_company_id;
        $CompanyBusinessInfo = self::getCompanyBusinessInfo($CompanyId);
        if (!empty($CompanyBusinessInfo)) {
            $companyname = $CompanyBusinessInfo->company_name;
        }
        return $companyname;
    }

    public static function EmailAlreadyExist($Emailid)
    {
        $EmployeeCount = EmployeesModel::find()->where(['emailid' => $Emailid, 'companyid' => Yii::$app->company->current_company_id])->Asarray()->count();
        $UsersCount = UsersModel::find()->where(['email' => $Emailid, 'company_id' => Yii::$app->company->current_company_id])->Asarray()->count();
        if ($EmployeeCount == '1' || $UsersCount == '1') {
            return true;
        } else {
            return false;
        }
    }

    public static function PayrollAlphabet()
    {
        return [1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D', 5 => 'E', 6 => 'F', 7 => 'G', 8 => 'H', 9 => 'I', 10 => 'J', 11 => 'K', 12 => 'L', 13 => 'M', 14 => 'N', 15 => 'O', 16 => 'P', 17 => 'Q', 18 => 'R', 19 => 'S', 20 => 'T', 21 => 'U', 22 => 'V', 23 => 'W', 24 => 'X', 25 => 'Y', 25 => 'Z'];
    }

    public static function LatestCommission()
    {
      if(empty(self::$Commisson_datelabel)){
        $companyid = Yii::$app->company->current_company_id;
        $mons = array(1 => "Jan", 2 => "Feb", 3 => "Mar", 4 => "Apr", 5 => "May", 6 => "Jun", 7 => "Jul", 8 => "Aug", 9 => "Sep", 10 => "Oct", 11 => "Nov", 12 => "Dec");
        $sql = 'SELECT year,employeeid,MAX(month) as month FROM hrm_empcommission_summary
                    WHERE year=(SELECT MAX(year)FROM hrm_empcommission_summary WHERE companyid="' . $companyid . '") and companyid="' . $companyid . '"  ORDER BY summaryid DESC';
        $SummaryModel = EmpcommissionSummaryModel::findBySql($sql)->one();
        if (!empty($SummaryModel)) {
            $EmpcommissionSummaryModel = EmpcommissionSummaryModel::find()
                ->where(['month' => $SummaryModel->month, 'year' => $SummaryModel->year,
                    /*'employeeid'=>$SummaryModel->employeeid,*/
                    'companyid' => $companyid])
                ->orderBy('summaryid desc')
                ->one();
            if (!empty($EmpcommissionSummaryModel)) {
                self::$Commisson_datelabel = $mons[$EmpcommissionSummaryModel->month] . '-' . $EmpcommissionSummaryModel->year;
            } else {
                self::$Commisson_datelabel = date('M') . '-' . date('Y');
            }
        } else {
            self::$Commisson_datelabel = date('M') . '-' . date('Y');
        }
      }
      return self::$Commisson_datelabel;
      
    }

    public static function TextColor($bgcolor)
    {
        if ($bgcolor != '') {
            $hex = str_replace("#", "", $bgcolor);
            if (strlen($hex) == 3) {
                $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
                $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
                $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
            } else {
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
            }
            $value = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
            if ($value >= 128) {
                $fontcolor = 'black';
            } else {
                $fontcolor = 'white';
            }
            return $fontcolor;
        }
    }

    public static function ShowHideNricFin()
    {
        $CompanyGeneralInfo = self::getCompanyBusinessInfo(Yii::$app->company->current_company_id);
        /*CompanyGeneralInfoModel::find()->select('empcode_nricfin')->where(['company_id' => Yii::$app->company->current_company_id])->one();*/
        $EmpcodeNricfin = false;
        if (isset($CompanyGeneralInfo->empcode_nricfin) && !empty($CompanyGeneralInfo->empcode_nricfin)) {
            if (strpos($CompanyGeneralInfo->empcode_nricfin, 'nricfin') !== false) {
                $EmpcodeNricfin = true;
            }
        }
        return $EmpcodeNricfin;
    }

    public static function ShowHideEmployeeCode()
    {
        $CompanyGeneralInfo = self::getCompanyBusinessInfo(Yii::$app->company->current_company_id);
        //CompanyGeneralInfoModel::find()->select('empcode_nricfin')->where(['company_id' => Yii::$app->company->current_company_id])->one();
        $EmpcodeNricfin = false;

        if (isset($CompanyGeneralInfo->empcode_nricfin) && !empty($CompanyGeneralInfo->empcode_nricfin)) {
            if (strpos($CompanyGeneralInfo->empcode_nricfin, 'employeecode') !== false) {
                $EmpcodeNricfin = true;
            }
        }
        return $EmpcodeNricfin;
    }

    public static function getModulesdetails($CompanyId)
    {
        if (!empty(self::$ModulesDetails) && self::$ModulesDetails->companyid == $CompanyId) {
            return self::$ModulesDetails;
        }

        $ModulesModel = CompanymodulesModel::find()->where(['companyid' => $CompanyId])->one();
        if (!empty($ModulesModel)) {
            self::$ModulesDetails = $ModulesModel;
            return self::$ModulesDetails;
        } else {
            return null;
        }
    }

    public static function GetPayrollYear()
    {
        if(is_null(self::$PayrollYear)){
            self::$PayrollYear = '';
            $CompanyPayrollModel = CompanyPayrollModel::find()->where(['company_id' => Yii::$app->company->current_company_id])->one();
            if (!empty($CompanyPayrollModel)) {
                  self::$PayrollYear = $CompanyPayrollModel->payroll_process_year;
            }
        }
        return self::$PayrollYear;
    }

    public static function GetExtensionImage($exts, $FilePath, $filename)
    {
        switch ($exts) {
            case "pdf":
                $ext_icon = "pdf_icon.png";
                break;
            case "doc":
                $ext_icon = "doc_icon.png";
                break;
            case "docx":
                $ext_icon = "doc_icon.png";
                break;
            case "xls":
                $ext_icon = "xls.png";
                break;
            case "xlsx":
                /*$ext_icon =  "excel_icon.png";*/
                $ext_icon = "xls.png";
                break;
            case "txt":
                $ext_icon = "text_icon.png";
                break;
            case "zip":
                $ext_icon = "zip.png";
                break;
            default:
                $ext_icon = "doc_icon.png";
        }
        $allMembers = '';
        if ($exts == "jpg" || $exts == "jpeg" || $exts == "gif" || $exts == "png") {
            $Image = "<a href='" . Yii::$app->request->baseUrl . '/' . $FilePath . "' target='_blank'>
                  <img alt='" . $filename . "' src='" . Yii::$app->request->baseUrl . '/' . $FilePath . "' class='thumbnail img-responsive' style='width:40px;height:40px'></a>";
        } else if ($exts == "pdf") {
            $Image = "<a href='" . Yii::$app->request->baseUrl . '/' . $FilePath . "' target='_blank' data-pjax='0'>
                  <img alt='" . $filename . "' src='" . Yii::$app->request->baseUrl . '/images/' . $ext_icon . "' class='iconSize' style='width:40px;height:40px'></a>";
        } else if ($exts == "xlsx" || $exts == "xls") {
            $Image = "<a href='" . Yii::$app->request->baseUrl . '/' . $FilePath . "' target='_blank' data-pjax='0'>
                  <img alt='" . $filename . "' src='" . Yii::$app->request->baseUrl . '/images/' . $ext_icon . "' class='iconSize' style='width:40px;height:40px'></a>";
        } else if ($exts == "docx" || $exts == "doc") {
            $Image = "<a href='" . Yii::$app->request->baseUrl . '/' . $FilePath . "' target='_blank' data-pjax='0'>
                  <img alt='" . $filename . "' src='" . Yii::$app->request->baseUrl . '/images/' . $ext_icon . "' class='iconSize' style='width:40px;height:40px'></a>";
        } else {
            $Image = "<a href='" . Yii::$app->request->baseUrl . '/' . $FilePath . "' target='_blank'>
                  <img alt='" . $filename . "' src='" . Yii::$app->request->baseUrl . '/images/' . $ext_icon . "' class='iconSize' style='width:40px;height:40px'></a>";
        }
        return $Image;
    }

    public static function GetSecondToHours($TotalSeconds)
    {
        $hours = floor($TotalSeconds / 3600);
        $minutes = floor(($TotalSeconds / 60) % 60);
        $seconds = $TotalSeconds % 60;
        return "$hours:$minutes:$seconds";
    }

    public static function GetHoursToSecond($TotalHMS)
    {
        $ExplodeTotalHMS = explode(":", $TotalHMS);
        $hours = $ExplodeTotalHMS[0] * 3600;
        $minutes = $ExplodeTotalHMS[1] * 60;
        $seconds = 0;
        if (isset($ExplodeTotalHMS[2])) {
            $seconds = $ExplodeTotalHMS[2];
        }
        return $totalseconds = $hours + $minutes + $seconds;
    }


    public static function GetTimesheetApprovedProcessedCount()
    {
        $approvetype = 'approve_timesheet';
        $companyid = Yii::$app->company->current_company_id;
        $EmployeesModel = EmployeesModel::getEmployeesTimesheetApproval(Yii::$app->user->identity->id,$approvetype,[]);
        if (!empty($EmployeesModel)) {
            foreach ($EmployeesModel as $employee) {
                $employeeid[] = $employee['employeeid'];
            }
        } else {
            $employeeid = [];
        }


        $ApprovedCount = TimesheetsummaryModel::find()
            ->where(['hrm_timesheetsummary.companyid' => $companyid,
                'hrm_timesheetsummary.deletestatus' => 'No'])
            ->andWhere(['<>', 'total_entries', '0'])
            ->andWhere("hrm_timesheetsummary.processing_status IS NOT NULL")
            ->andWhere(['hrm_timesheetsummary.processing_status' => 4])
            ->andWhere(['IN', 'hrm_timesheetsummary.employeeid', $employeeid])->count();


        $ProcessedCount = TimesheetsummaryModel::find()
            ->where(['hrm_timesheetsummary.companyid' => $companyid,
                'hrm_timesheetsummary.deletestatus' => 'No'])
            ->andWhere(['<>', 'total_entries', '0'])
            ->andWhere("hrm_timesheetsummary.processing_status IS NOT NULL")
            ->andWhere(['in', 'hrm_timesheetsummary.processing_status', [2, 4]])
            ->andWhere(['IN', 'hrm_timesheetsummary.employeeid', $employeeid])->count();

        return ['Approved' => $ApprovedCount, 'Processed' => $ProcessedCount];
    }

    public static function GetPublicholidaywork($departmentid,$CompanyId)
    {
        $CompanyLeavepolicyModel = CompanyLeavepolicyModel::getWorkPublicHoliday($departmentid,$CompanyId);
        $Publicholidaywork = [];
        if (!empty($CompanyLeavepolicyModel)) {
            if ((isset($CompanyLeavepolicyModel->extra_day_salary_phw) && !empty($CompanyLeavepolicyModel->extra_day_salary_phw)) || (isset($CompanyLeavepolicyModel->extra_day_salary_ph) && !empty($CompanyLeavepolicyModel->extra_day_salary_ph))
                || (isset($CompanyLeavepolicyModel->grantoff_in_lieu_phw) && !empty($CompanyLeavepolicyModel->grantoff_in_lieu_phw)) || (isset($CompanyLeavepolicyModel->grantoff_in_lieu_ph) && !empty($CompanyLeavepolicyModel->grantoff_in_lieu_ph))
                || (isset($CompanyLeavepolicyModel->none_phw) && !empty($CompanyLeavepolicyModel->none_phw)) || (isset($CompanyLeavepolicyModel->none_ph) && !empty($CompanyLeavepolicyModel->none_ph))
            ) {

                $extra_day_salary_phw = explode(',', $CompanyLeavepolicyModel->extra_day_salary_phw);
                if (in_array($departmentid, $extra_day_salary_phw)) {
                    $Publicholidaywork[] = 'extra_day_salary_phw';
                }

                $extra_day_salary_ph = explode(',', $CompanyLeavepolicyModel->extra_day_salary_ph);
                if (in_array($departmentid, $extra_day_salary_ph)) {
                    $Publicholidaywork['extra_day_salary_ph'] = 'extra_day_salary_ph';
                }

                $grantoff_in_lieu_phw = explode(',', $CompanyLeavepolicyModel->grantoff_in_lieu_phw);
                if (in_array($departmentid, $grantoff_in_lieu_phw)) {
                    $Publicholidaywork['grantoff_in_lieu_phw'] = 'grantoff_in_lieu_phw';
                }

                $grantoff_in_lieu_ph = explode(',', $CompanyLeavepolicyModel->grantoff_in_lieu_ph);
                if (in_array($departmentid, $grantoff_in_lieu_ph)) {
                    $Publicholidaywork['grantoff_in_lieu_ph'] = 'grantoff_in_lieu_ph';
                }

                $none_phw = explode(',', $CompanyLeavepolicyModel->none_phw);
                if (in_array($departmentid, $none_phw)) {
                    //$Publicholidaywork['none_phw'] = 'none_phw';
                }

                $none_ph = explode(',', $CompanyLeavepolicyModel->none_ph);
                if (in_array($departmentid, $none_ph)) {
                    // $Publicholidaywork['none_ph'] = 'none_ph';
                }

            }
        }

        return $Publicholidaywork;
    }

    public static function DuartionYearMonthDay($FromDate, $ToDate)
    {
        $Duration = '';
        $joindiff = date_diff(date_create($FromDate), date_create($ToDate));
        $DiffYear = $joindiff->format('%y');
        $DiffMonth = $joindiff->format('%m');
        $DiffDay = $joindiff->format('%d');
        if ($DiffYear > 0) {
            $Duration .= ($DiffYear > 1) ? $DiffYear . ' Years, ' : $DiffYear . ' Year, ';
        }
        if ($DiffMonth > 0) {
            $Duration .= ($DiffMonth > 1) ? $DiffMonth . ' Months, ' : $DiffMonth . ' Month, ';
        }
        if ($DiffDay > 0) {
            $Duration .= ($DiffDay > 1) ? $DiffDay . ' Days ' : $DiffDay . ' Day ';
        }
        return $Duration;
    }

    public static function GetProgressionButtonType($effecteddate, $ProgessionCurrent, $OldProgid, $ResginedDate)
    {
        $OldEffectedDate = '';
        if (!empty($OldProgid)) {
            $EmpprogrationModel = EmpprogrationModel::getEmpprogrationOne($OldProgid);
            $OldEffectedDate = $EmpprogrationModel->effecteddate;
        }
        if (empty($ResginedDate)) {
            if (strtotime($effecteddate) > strtotime(date("Y-m-d"))) {
                $ButtonType = "Future";
                $ButtonColor = "btn-info";
            } else {
                if (!empty($ProgessionCurrent)) {
                    $ButtonType = "Past";
                    $ButtonColor = "btn-warning";
                } else {
                    $ButtonType = "Current";
                    $ButtonColor = "btn-success";
                }
            }
        } else {
            $ButtonType = "Past";
            $ButtonColor = "btn-warning";
            $OldEffectedDate = $ResginedDate;
        }
        $Period = '';
        if ($ButtonType == 'Future') {
            $Period = "From " . date("d-M-Y", strtotime($effecteddate));
            $FromDate = date("Y-m-d");
            $ToDate = $effecteddate;
        } else if ($ButtonType == 'Current') {
            $Period = "From " . date("d-M-Y", strtotime($effecteddate)) . " To Today";
            $FromDate = $effecteddate;
            $ToDate = date("Y-m-d");
        } else if ($ButtonType == 'Past') {
            $Period = date("d-M-Y", strtotime($effecteddate)) . " To " . date("d-M-Y", strtotime($OldEffectedDate));
            $FromDate = $effecteddate;
            $ToDate = $OldEffectedDate;
        }
        return ['ButtonType' => $ButtonType, 'ButtonColor' => $ButtonColor, 'OldEffectedDate' => $OldEffectedDate, 'Period' => $Period, 'FromDate' => $FromDate, 'ToDate' => $ToDate, 'ProgessionCurrent' => $ProgessionCurrent];
    }

    public static function GetApprovalEmployee($approvetype)
    {
        $EmployeesModel = EmployeesModel::getEmployeesClaimApproval(Yii::$app->user->identity->id,$approvetype,[]);
        if (!empty($EmployeesModel)) {
            foreach ($EmployeesModel as $employee) {
                $employeeid[] = $employee['employeeid'];
            }
        } else {
            $employeeid = [];
        }
        return $employeeid;
    }

    public static function GetWithHoldPaidedMonthYear($ArrayArgs)
    {
        $WithHoldingMonthYearPaid = '';
        $WithholdAmountMonthYear = WithholdingtaxModel::find()->where($ArrayArgs)->all();
        if (!empty($WithholdAmountMonthYear)) {
            $MonthYearPaid = '';
            foreach ($WithholdAmountMonthYear as $WithholdMonthYear) {
                $MonthName = CommonModel::getMonthList();
                $MonthYearPaid .= $MonthName[$WithholdMonthYear->processedmonth] . '-' . $WithholdMonthYear->processedyear . ',';
            }
            $MonthYearPaid = rtrim($MonthYearPaid, ',');
            $WithHoldingMonthYearPaid = "< " . $MonthYearPaid . " >";
        }
        return $WithHoldingMonthYearPaid;
    }

    public static function getValidPayslipDate($payrollProcessingMonth, $payrollProcessingYear, $CompanyPayrollInfo)
    {
        $tempPayslipDate = new \DateTime($payrollProcessingYear . "-" . $payrollProcessingMonth . "-" . $CompanyPayrollInfo->payroll_day);

        $tempPayslipDay = $tempPayslipDate->format('w');

        if ($CompanyPayrollInfo->salary_payout == 'n') {
            // Next Working Day
            if ($tempPayslipDay == 0) { //for Sunday
                $tempPayslipDate = $tempPayslipDate->add(new \DateInterval('P1D'));
            } else if ($tempPayslipDay == 6) { //for Saturday
                $tempPayslipDate = $tempPayslipDate->add(new \DateInterval('P2D'));
            }
        } else {
            // Previous Working Day
            if ($tempPayslipDay == 0) { //for Sunday
                $tempPayslipDate = $tempPayslipDate->sub(new \DateInterval('P2D'));
            } else if ($tempPayslipDay == 6) { //for Saturday
                $tempPayslipDate = $tempPayslipDate->sub(new \DateInterval('P1D'));
            };
        };
        return $tempPayslipDate;
    }

    public static function GoogleTranslateLanguage()
    {
        return [
            'af' => 'Afrikaans',
            'sq' => 'Albanian',
            'ar' => 'Arabic',
            'hy' => 'Armenian',
            'az' => 'Azerbaijani',
            'eu' => 'Basque',
            'be' => 'Belarusian',
            'bn' => 'Bengali',
            'bg' => 'Bulgarian',
            'ca' => 'Catalan',
            'zh-CN' => 'Chinese (Simplified)',
            'zh-TW' => 'Chinese (Traditional)',
            'hr' => 'Croatian',
            'cs' => 'Czech',
            'da' => 'Danish',
            'nl' => 'Dutch',
            'en' => 'English',
            'eo' => 'Esperanto',
            'et' => 'Estonian',
            'tl' => 'Filipino',
            'fi' => 'Finnish',
            'fr' => 'French',
            'gl' => 'Galician',
            'ka' => 'Georgian',
            'de' => 'German',
            'el' => 'Greek',
            'gu' => 'Gujarati',
            'ht' => 'Haitian Creole',
            'iw' => 'Hebrew',
            'hi' => 'Hindi',
            'hu' => 'Hungarian',
            'is' => 'Icelandic',
            'id' => 'Indonesian',
            'ga' => 'Irish',
            'it' => 'Italian',
            'ja' => 'Japanese',
            'kn' => 'Kannada',
            'ko' => 'Korean',
            'la' => 'Latin',
            'lv' => 'Latvian',
            'lt' => 'Lithuanian',
            'mk' => 'Macedonian',
            'ms' => 'Malay',
            'mt' => 'Maltese',
            'no' => 'Norwegian',
            'fa' => 'Persian',
            'pl' => 'Polish',
            'pt' => 'Portuguese',
            'ro' => 'Romanian',
            'ru' => 'Russian',
            'sr' => 'Serbian',
            'sk' => 'Slovak',
            'sl' => 'Slovenian',
            'es' => 'Spanish',
            'sw' => 'Swahili',
            'sv' => 'Swedish',
            'ta' => 'Tamil',
            'te' => 'Telugu',
            'th' => 'Thai',
            'tr' => 'Turkish',
            'uk' => 'Ukrainian',
            'ur' => 'Urdu',
            'vi' => 'Vietnamese',
            'cy' => 'Welsh',
            'yi' => 'Yiddish'
        ];
    }

    public static function Outsourcingservice($CompanyId, $parent_company_id)
    {
        $CompaniesModel = CompaniesModel::find()->where(['companyid' => $parent_company_id])->one();
        $Outsourcingservice_data = [];
        if ($CompaniesModel->payroll_company == 'Yes') {
            $OutsourcingserviceModel = OutsourcingservicesModel::find()->where(['companyid' => $CompanyId])->all();
            foreach ($OutsourcingserviceModel as $Outsourcingservice) {
                if ($Outsourcingservice->modules == 'Payroll') {
                    $Outsourcingservice_data['Payroll'] = $Outsourcingservice->payrollcompany_status;
                }
                if ($Outsourcingservice->modules == 'Leave') {
                    $Outsourcingservice_data['Leave'] = $Outsourcingservice->payrollcompany_status;
                }
                if ($Outsourcingservice->modules == 'Reimbursement Claim') {
                    $Outsourcingservice_data['Reimbursement_Claim'] = $Outsourcingservice->payrollcompany_status;
                }
                if ($Outsourcingservice->modules == 'Timesheet') {
                    $Outsourcingservice_data['Timesheet'] = $Outsourcingservice->payrollcompany_status;
                }
                if ($Outsourcingservice->modules == 'Clock IN/OUT') {
                    $Outsourcingservice_data['Clock_In_OUT'] = $Outsourcingservice->payrollcompany_status;
                }
                if ($Outsourcingservice->modules == 'Rostering') {
                    $Outsourcingservice_data['Rostering'] = $Outsourcingservice->payrollcompany_status;
                }
                if ($Outsourcingservice->modules == 'Commission') {
                    $Outsourcingservice_data['Commission'] = $Outsourcingservice->payrollcompany_status;
                }
            }
        }
        return $Outsourcingservice_data;
    }

    public static function OutsourcingVentures($CompanyId)
    {
      if(empty(self::$OutsourcingVentures) || self::$CompanyId != $CompanyId){        
        $Outsourcingservice_data = [];
        $OutsourcingserviceModel = OutsourcingservicesModel::find()->where(['companyid' => $CompanyId])->all();
        foreach ($OutsourcingserviceModel as $Outsourcingservice) {
            if ($Outsourcingservice->modules == 'Payroll') {
                $Outsourcingservice_data['Payroll'] = $Outsourcingservice->company_status;
            }
            if ($Outsourcingservice->modules == 'Leave') {
                $Outsourcingservice_data['Leave'] = $Outsourcingservice->company_status;
            }
            if ($Outsourcingservice->modules == 'Reimbursement Claim') {
                $Outsourcingservice_data['Reimbursement_Claim'] = $Outsourcingservice->company_status;
            }
            if ($Outsourcingservice->modules == 'Timesheet') {
                $Outsourcingservice_data['Timesheet'] = $Outsourcingservice->company_status;
            }
            if ($Outsourcingservice->modules == 'Clock IN/OUT') {
                $Outsourcingservice_data['Clock_In_OUT'] = $Outsourcingservice->company_status;
            }
            if ($Outsourcingservice->modules == 'Rostering') {
                $Outsourcingservice_data['Rostering'] = $Outsourcingservice->company_status;
            }
            if ($Outsourcingservice->modules == 'Commission') {
                $Outsourcingservice_data['Commission'] = $Outsourcingservice->company_status;
            }
        }
        self::$CompanyId = $CompanyId;
        self::$OutsourcingVentures = $Outsourcingservice_data;
      }
        return self::$OutsourcingVentures;
    }

    public static function CountryIdentyName($CountryName)
    {
        if ($CountryName == 'Singapore') {
            $IdentyName = "NRIC / FIN";
        } else if ($CountryName == 'India') {
            $IdentyName = "Aadhaar / Identification Number";
        } else {
            $IdentyName = "Identification Number";
        }
        return $IdentyName;
    }

    public static function GetCompanyCountryName($companyid = null)
    {
        if ($companyid == null) {
            $companyid = Yii::$app->company->current_company_id;
        }
        $Country = '';
        $BusinessInfo = self::getCompanyBusinessInfo($companyid);
        if (!empty($BusinessInfo)) {
            $Country = $BusinessInfo->country;
        }
        return $Country;
    }

    public static function GetJobCountryNricName($company_id)
    {
        $IdentyName = '';
        $BusinessInfo = self::getCompanyBusinessInfo($company_id);
        if (!empty($BusinessInfo)) {
            $CountryName = $BusinessInfo->country;
            if ($CountryName == 'Singapore') {
                $IdentyName = "NRIC / FIN";
            } else if ($CountryName == 'India') {
                $IdentyName = "Aadhaar / Identification Number";
            } else {
                $IdentyName = "Identification Number";
            }
        }
        return $IdentyName;
    }

    public static function CountryAndNationality()
    {
        return [
            "Afghanistan" => "Afghan",
            "Albania" => "Albanian",
            "Algeria" => "Algerian",
            "Andorra" => "Andorran",
            "Angola" => "Angolan",
            "Antigua and Barbuda" => "Antiguans, Barbudans",
            "Argentina" => "Argentine or Argentinean",
            "Armenia" => "Armenian",
            "Australia" => "Australian or Ozzie or Aussie",
            "Austria" => "Austrian",
            "Azerbaijan" => "Azerbaijani",
            "The Bahamas" => "Bahamian",
            "Bahrain" => "Bahraini",
            "Bangladesh" => "Bangladeshi",
            "Barbados" => "Barbadian or Bajuns",
            "Belarus" => "Belarusian",
            "Belgium" => "Belgian",
            "Belize" => "Belizean",
            "Benin" => "Beninese",
            "Bhutan" => "Bhutanese",
            "Bolivia" => "Bolivian",
            "Bosnia and Herzegovina" => "Bosnian, Herzegovinian",
            "Botswana" => "Motswana (singular), Batswana (plural)",
            "Brazil" => "Brazilian",
            "Brunei" => "Bruneian",
            "Bulgaria" => "Bulgarian",
            "Burkina Faso" => "Burkinabe",
            "Burundi" => "Burundian",
            "Cambodia" => "Cambodian",
            "Cameroon" => "Cameroonian",
            "Canada" => "Canadian",
            "Cape Verde" => "Cape Verdian or Cape Verdean",
            "Central African Republic" => "Central African",
            "Chad" => "Chadian",
            "Chile" => "Chilean",
            "China" => "Chinese",
            "Colombia" => "Colombian",
            "Comoros" => "Comoran",
            "Congo" => "Congolese",
            "Costa Rica" => "Costa Rican",
            "Cote D'Ivoire" => "Ivorian",
            "Croatia" => "Croat or Croatian",
            "Cuba" => "Cuban",
            "Cyprus" => "Cypriot",
            "Czech Republic" => "Czech",
            "Denmark" => "Dane or Danish",
            "Djibouti" => "Djibouti",
            "Dominica" => "Dominican",
            "Dominican Republic" => "Dominican",
            "East Timor" => "East Timorese",
            "Ecuador" => "Ecuadorean",
            "Egypt" => "Egyptian",
            "El Salvador" => "Salvadoran",
            "Equatorial Guinea" => "Equatorial Guinean or Equatoguinean",
            "Eritrea" => "Eritrean",
            "Estonia" => "Estonian",
            "Ethiopia" => "Ethiopian",
            "Fiji" => "Fijian",
            "Finland" => "Finn or Finnish",
            "France" => "French or Frenchman or Frenchwoman",
            "Gabon" => "Gabonese",
            "The Gambia" => "Gambian",
            "Georgia" => "Georgian",
            "Germany" => "German",
            "Ghana" => "Ghanaian",
            "Greece" => "Greek",
            "Grenada" => "Grenadian or Grenadan",
            "Guatemala" => "Guatemalan",
            "Guinea" => "Guinean",
            "Guinea-Bissau" => "Guinea-Bissauan",
            "Guyana" => "Guyanese",
            "Haiti" => "Haitian",
            "Honduras" => "Honduran",
            "Hungary" => "Hungarian",
            "Iceland" => "Icelander",
            "India" => "Indian",
            "Indonesia" => "Indonesian",
            "Iran" => "Iranian",
            "Iraq" => "Iraqi",
            "Ireland" => "Irishman or Irishwoman or Irish",
            "Israel" => "Israeli",
            "Italy" => "Italian",
            "Jamaica" => "Jamaican",
            "Japan" => "Japanese",
            "Jordan" => "Jordanian",
            "Kazakhstan" => "Kazakhstani",
            "Kenya" => "Kenyan",
            "Kiribati" => "I-Kiribati",
            "Korea, North" => "North Korean",
            "Korea, South" => "South Korean",
            "Kosovo" => "Kosovar",
            "Kuwait" => "Kuwaiti",
            "Kyrgyz Republic/Kyrgyzstan" => "Kyrgyz or Kirghiz",
            "Laos" => "Lao or Laotian",
            "Latvia" => "Latvian",
            "Lebanon" => "Lebanese",
            "Lesotho" => "Mosotho (plural Basotho)",
            "Liberia" => "Liberian",
            "Libya" => "Libyan",
            "Liechtenstein" => "Liechtensteiner",
            "Lithuania" => "Lithuanian",
            "Luxembourg" => "Luxembourger",
            "Macedonia" => "Macedonian",
            "Madagascar" => "Malagasy",
            "Malawi" => "Malawian",
            "Malaysia" => "Malaysian",
            "Maldives" => "Maldivan",
            "Mali" => "Malian",
            "Malta" => "Maltese",
            "Marshall Islands" => "Marshallese",
            "Mauritania" => "Mauritanian",
            "Mauritius" => "Mauritian",
            "Mexico" => "Mexican",
            "Federated States of Micronesia" => "Micronesian",
            "Moldova" => "Moldovan",
            "Monaco" => "Monegasque or Monacan",
            "Mongolia" => "Mongolian",
            "Montenegro" => "Montenegrin",
            "Morocco" => "Moroccan",
            "Mozambique" => "Mozambican",
            "Myanmar (Burma)" => "Burmese or Myanmarese",
            "Namibia" => "Namibian",
            "Nauru" => "Nauruan",
            "Nepal" => "Nepalese",
            "Netherlands" => "Netherlander, Dutchman, Dutchwoman, Hollander or Dutch",
            "New Zealand" => "New Zealander or Kiwi",
            "Nicaragua" => "Nicaraguan",
            "Niger" => "Nigerien",
            "Nigeria" => "Nigerian",
            "Norway" => "Norwegian",
            "Oman" => "Omani",
            "Pakistan" => "Pakistani",
            "Palau" => "Palauan",
            "Panama" => "Panamanian",
            "Papua New Guinea" => "Papua New Guinean",
            "Paraguay" => "Paraguayan",
            "Peru" => "Peruvian",
            "Philippines" => "Filipino",
            "Poland" => "Pole or Polish",
            "Portugal" => "Portuguese",
            "Qatar" => "Qatari",
            "Romania" => "Romanian",
            "Russia" => "Russian",
            "Rwanda" => "Rwandan",
            "Saint Kitts and Nevis" => "Kittian and Nevisian",
            "Saint Lucia" => "Saint Lucian",
            "Samoa" => "Samoan",
            "San Marino" => "Sammarinese or San Marinese",
            "Sao Tome and Principe" => "Sao Tomean",
            "Saudi Arabia" => "Saudi or Saudi Arabian",
            "Senegal" => "Senegalese",
            "Serbia" => "Serbian",
            "Seychelles" => "Seychellois",
            "Sierra Leone" => "Sierra Leonean",
            "Singapore" => "Singaporean",
            "Slovakia" => "Slovak or Slovakian",
            "Slovenia" => "Slovene or Slovenian",
            "Solomon Islands" => "Solomon Islander",
            "Somalia" => "Somali",
            "South Africa" => "South African",
            "Spain" => "Spaniard or Spanish",
            "Sri Lanka" => "Sri Lankan",
            "Sudan" => "Sudanese",
            "Suriname" => "Surinamer",
            "Swaziland" => "Swazi",
            "Sweden" => "Swede or Swedish",
            "Switzerland" => "Swiss",
            "Syria" => "Syrian",
            "Taiwan" => "Taiwanese",
            "Tajikistan" => "Tajik or Tadzhik",
            "Tanzania" => "Tanzanian",
            "Thailand" => "Thai",
            "Togo" => "Togolese",
            "Tonga" => "Tongan",
            "Trinidad and Tobago" => "Trinidadian or Tobagonian",
            "Tunisia" => "Tunisian",
            "Turkey" => "Turk or Turkish",
            "Turkmenistan" => "Turkmen(s)",
            "Tuvalu" => "Tuvaluan",
            "Uganda" => "Ugandan",
            "Ukraine" => "Ukrainian",
            "United Arab Emirates" => "Emirian",
            "United Kingdom" => "Briton or British, Englishman or Englishwoman, Scot or Scotsman or Scotswoman, Welshman or Welshwoman, Northern Irishman or Northern Irishwoman or Irish or Northern Irish",
            "United States" => "American",
            "Uruguay" => "Uruguayan",
            "Uzbekistan" => "Uzbek or Uzbekistani",
            "Vanuatu" => "Ni-Vanuatu",
            "Vatican City State (Holy See)" => "Vatican",
            "Venezuela" => "Venezuelan",
            "Vietnam" => "Vietnamese",
            "Yemen" => "Yemeni or Yemenite",
            "Zambia" => "Zambian",
            "Zimbabwe" => "Zimbabwean",
        ];
    }

    public static function CurrencyFormat($amount, $currencySymbol, $decimals = 2)
    {

        if (empty($amount)) {
            $amount = 0;
        }
        if (empty($currencySymbol)) {
            $currencySymbol = '$ ';
        }

        if (is_numeric($amount)) {
            return $currencySymbol . number_format($amount, $decimals);
        }
        return $currencySymbol . number_format(sprintf('%0.2f', preg_replace("/[^0-9.-]/", "", $amount)), $decimals);

    }

    public static function timelineaction($event_type, $action, $companyid, $event_id)
    {
        $TimelineModel = new TimelineModel();

        $TimelineModel->event_type = $event_type;
        $TimelineModel->action = $action;
        $TimelineModel->companyid = $companyid;
        $TimelineModel->action = $action;
        $TimelineModel->event_id = $event_id;
        $TimelineModel->save(false);
        return $TimelineModel;
    }

    public static function PlanPeriod()
    {
        return [
            "1" => "1 Month (Monthly)",
            "2" => "2 Months",
            "3" => "3 Months (Quarterly)",
            "4" => "4 Months",
            "5" => "5 Months",
            "6" => "6 Months (Half Yearly)",
            "7" => "7 Months",
            "8" => "8 Months",
            "9" => "9 Months",
            "10" => "10 Months",
            "11" => "11 Months",
            "12" => "12 Months (Yearly)",
            "trial" => "Free Trial",
            "enterprise" => "Enterprise",
        ];
    }

    public static function FreePlanPeriod()
    {
        return [
            "1" => "1 Month",
            "2" => "2 Months",
            "3" => "3 Months",
            "4" => "4 Months",
            "5" => "5 Months",
            "6" => "6 Months",
            "7" => "7 Months",
            "8" => "8 Months",
            "9" => "9 Months",
            "10" => "10 Months",
            "11" => "11 Months",
            "12" => "12 Months",
        ];
    }

    public static function SubscribedPackage($CompanyId)
    {
        $payRollCompanyId = Yii::$app->company->payroll_company_id;
        if (!empty($payRollCompanyId)) {
            $CompanyId = $payRollCompanyId;
        }
        if (!empty(self::$SubscribedPackage) && self::$SubscribedPackage->companyid == $CompanyId) {
            return self::$SubscribedPackage;
        } else {
            $SubscribedPackage = SubscribedPackageModel::find()->where(['companyid' => $CompanyId])->orderBy("id desc")->one();
            if (!empty($SubscribedPackage)) {
                self::$SubscribedPackage = $SubscribedPackage;
                return self::$SubscribedPackage;
            } else {
                return null;
            }
        }
    }

    public static function PackageExpiry()
    {
        $SubscribePackage = CommonModel::SubscribedPackage(Yii::$app->company->parent_company_id);
        if (!empty($SubscribePackage)) {
            if ($SubscribePackage->period_time == "trial") {
                $start_date = strtotime(date("Y-m-d H:i:s"));
                $end_date = strtotime($SubscribePackage->end_date);
                $balanceDate = floatval(($end_date - $start_date) / 60 / 60 / 24);
                if ($balanceDate < 0) {
                    Yii::$app->response->redirect(Yii::$app->params['MYASALTA_BASE_URL']);
                }
            } else {
                $checkingDate = date("Y-m-d H:i:s", strtotime("+40 day", strtotime($SubscribePackage->end_date)));
                if ($checkingDate <= date("Y-m-d H:i:s")) {
                    Yii::$app->response->redirect(Yii::$app->params['MYASALTA_BASE_URL'] . "invoices");
                }
            }
        }
    }

    public static function getCompanyBusinessInfo($CompanyId)
    {
        if (!empty(self::$CompanyBusinessInfo) && self::$CompanyBusinessInfo->company_id == $CompanyId) {
            return self::$CompanyBusinessInfo;
        } else {
            self::$CompanyBusinessInfo = CompanyBusinessInfoModel::find()->where(['company_id' => $CompanyId])->one();
            return self::$CompanyBusinessInfo;
        }
    }

    public static function getCrmIntegration($CompanyId)
    {
      if (!empty(self::$CrmIntegration) || !isset(self::$CrmIntegration[$CompanyId]) ) {
            self::$CrmIntegration[$CompanyId] = CrmIntegration::find()->where(['crm_company_id' => $CompanyId])->one();
      }
      return self::$CrmIntegration[$CompanyId];
    }
}