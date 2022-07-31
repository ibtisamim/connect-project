<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('countries', function($table){
            $table->increments('id')->unsigned();
            $table->string('code',2)->unique();
            $table->text('country');
        });


        DB::table('all_countries')->insert(array('code'=>'AF','country'=>'Afghanistan'));
        DB::table('all_countries')->insert(array('code'=>'AL','country'=>'Albania'));
        DB::table('all_countries')->insert(array('code'=>'DZ','country'=>'Algeria'));
        DB::table('all_countries')->insert(array('code'=>'AS','country'=>'American Samoa'));
        DB::table('all_countries')->insert(array('code'=>'AD','country'=>'Andorra'));
        DB::table('all_countries')->insert(array('code'=>'AO','country'=>'Angola'));
        DB::table('all_countries')->insert(array('code'=>'AI','country'=>'Anguilla'));
        DB::table('all_countries')->insert(array('code'=>'AQ','country'=>'Antarctica'));
        DB::table('all_countries')->insert(array('code'=>'AG','country'=>'Antigua and Barbuda'));
        DB::table('all_countries')->insert(array('code'=>'AR','country'=>'Argentina'));
        DB::table('all_countries')->insert(array('code'=>'AM','country'=>'Armenia'));
        DB::table('all_countries')->insert(array('code'=>'AW','country'=>'Aruba'));
        DB::table('all_countries')->insert(array('code'=>'AU','country'=>'Australia'));
        DB::table('all_countries')->insert(array('code'=>'AT','country'=>'Austria'));
        DB::table('all_countries')->insert(array('code'=>'AZ','country'=>'Azerbaijan'));
        DB::table('all_countries')->insert(array('code'=>'BS','country'=>'Bahamas'));
        DB::table('all_countries')->insert(array('code'=>'BH','country'=>'Bahrain'));
        DB::table('all_countries')->insert(array('code'=>'BD','country'=>'Bangladesh'));
        DB::table('all_countries')->insert(array('code'=>'BB','country'=>'Barbados'));
        DB::table('all_countries')->insert(array('code'=>'BY','country'=>'Belarus'));
        DB::table('all_countries')->insert(array('code'=>'BE','country'=>'Belgium'));
        DB::table('all_countries')->insert(array('code'=>'BZ','country'=>'Belize'));
        DB::table('all_countries')->insert(array('code'=>'BJ','country'=>'Benin'));
        DB::table('all_countries')->insert(array('code'=>'BM','country'=>'Bermuda'));
        DB::table('all_countries')->insert(array('code'=>'BT','country'=>'Bhutan'));
        DB::table('all_countries')->insert(array('code'=>'BO','country'=>'Bolivia'));
        DB::table('all_countries')->insert(array('code'=>'BA','country'=>'Bosnia and Herzegovina'));
        DB::table('all_countries')->insert(array('code'=>'BW','country'=>'Botswana'));
        DB::table('all_countries')->insert(array('code'=>'BV','country'=>'Bouvet Island'));
        DB::table('all_countries')->insert(array('code'=>'BR','country'=>'Brazil'));
        DB::table('all_countries')->insert(array('code'=>'IO','country'=>'British Indian Ocean Territory'));
        DB::table('all_countries')->insert(array('code'=>'VG','country'=>'British Virgin Islands'));
        DB::table('all_countries')->insert(array('code'=>'BN','country'=>'Brunei Darussalam'));
        DB::table('all_countries')->insert(array('code'=>'BG','country'=>'Bulgaria'));
        DB::table('all_countries')->insert(array('code'=>'BF','country'=>'Burkina Faso'));
        DB::table('all_countries')->insert(array('code'=>'BI','country'=>'Burundi'));
        DB::table('all_countries')->insert(array('code'=>'KH','country'=>'Cambodia'));
        DB::table('all_countries')->insert(array('code'=>'CM','country'=>'Cameroon'));
        DB::table('all_countries')->insert(array('code'=>'CA','country'=>'Canada'));
        DB::table('all_countries')->insert(array('code'=>'CV','country'=>'Cape Verde'));
        DB::table('all_countries')->insert(array('code'=>'KY','country'=>'Cayman Islands'));
        DB::table('all_countries')->insert(array('code'=>'CF','country'=>'Central African Republic'));
        DB::table('all_countries')->insert(array('code'=>'TD','country'=>'Chad'));
        DB::table('all_countries')->insert(array('code'=>'CL','country'=>'Chile'));
        DB::table('all_countries')->insert(array('code'=>'CN','country'=>'China'));
        DB::table('all_countries')->insert(array('code'=>'CX','country'=>'Christmas Island'));
        DB::table('all_countries')->insert(array('code'=>'CC','country'=>'Cocos'));
        DB::table('all_countries')->insert(array('code'=>'CO','country'=>'Colombia'));
        DB::table('all_countries')->insert(array('code'=>'KM','country'=>'Comoros'));
        DB::table('all_countries')->insert(array('code'=>'CD','country'=>'Congo'));
        DB::table('all_countries')->insert(array('code'=>'CG','country'=>'Congo'));
        DB::table('all_countries')->insert(array('code'=>'CK','country'=>'Cook Islands'));
        DB::table('all_countries')->insert(array('code'=>'CR','country'=>'Costa Rica'));
        DB::table('all_countries')->insert(array('code'=>'CI','country'=>'Cote D\'Ivoire'));
        DB::table('all_countries')->insert(array('code'=>'CU','country'=>'Cuba'));
        DB::table('all_countries')->insert(array('code'=>'CY','country'=>'Cyprus'));
        DB::table('all_countries')->insert(array('code'=>'CZ','country'=>'Czech Republic'));
        DB::table('all_countries')->insert(array('code'=>'DK','country'=>'Denmark'));
        DB::table('all_countries')->insert(array('code'=>'DJ','country'=>'Djibouti'));
        DB::table('all_countries')->insert(array('code'=>'DM','country'=>'Dominica'));
        DB::table('all_countries')->insert(array('code'=>'DO','country'=>'Dominican Republic'));
        DB::table('all_countries')->insert(array('code'=>'EC','country'=>'Ecuador'));
        DB::table('all_countries')->insert(array('code'=>'EG','country'=>'Egypt'));
        DB::table('all_countries')->insert(array('code'=>'SV','country'=>'El Salvador'));
        DB::table('all_countries')->insert(array('code'=>'GQ','country'=>'Equatorial Guinea'));
        DB::table('all_countries')->insert(array('code'=>'ER','country'=>'Eritrea'));
        DB::table('all_countries')->insert(array('code'=>'EE','country'=>'Estonia'));
        DB::table('all_countries')->insert(array('code'=>'ET','country'=>'Ethiopia'));
        DB::table('all_countries')->insert(array('code'=>'FO','country'=>'Faeroe Islands'));
        DB::table('all_countries')->insert(array('code'=>'FK','country'=>'Falkland Islands'));
        DB::table('all_countries')->insert(array('code'=>'FJ','country'=>'Fiji'));
        DB::table('all_countries')->insert(array('code'=>'FI','country'=>'Finland'));
        DB::table('all_countries')->insert(array('code'=>'FR','country'=>'France'));
        DB::table('all_countries')->insert(array('code'=>'GF','country'=>'French Guiana'));
        DB::table('all_countries')->insert(array('code'=>'PF','country'=>'French Polynesia'));
        DB::table('all_countries')->insert(array('code'=>'TF','country'=>'French Southern Territories'));
        DB::table('all_countries')->insert(array('code'=>'GA','country'=>'Gabon'));
        DB::table('all_countries')->insert(array('code'=>'GM','country'=>'Gambia'));
        DB::table('all_countries')->insert(array('code'=>'GE','country'=>'Georgia'));
        DB::table('all_countries')->insert(array('code'=>'DE','country'=>'Germany'));
        DB::table('all_countries')->insert(array('code'=>'GH','country'=>'Ghana'));
        DB::table('all_countries')->insert(array('code'=>'GI','country'=>'Gibraltar'));
        DB::table('all_countries')->insert(array('code'=>'GR','country'=>'Greece'));
        DB::table('all_countries')->insert(array('code'=>'GL','country'=>'Greenland'));
        DB::table('all_countries')->insert(array('code'=>'GD','country'=>'Grenada'));
        DB::table('all_countries')->insert(array('code'=>'GP','country'=>'Guadaloupe'));
        DB::table('all_countries')->insert(array('code'=>'GU','country'=>'Guam'));
        DB::table('all_countries')->insert(array('code'=>'GT','country'=>'Guatemala'));
        DB::table('all_countries')->insert(array('code'=>'GN','country'=>'Guinea'));
        DB::table('all_countries')->insert(array('code'=>'GW','country'=>'Guinea-Bissau'));
        DB::table('all_countries')->insert(array('code'=>'GY','country'=>'Guyana'));
        DB::table('all_countries')->insert(array('code'=>'HT','country'=>'Haiti'));
        DB::table('all_countries')->insert(array('code'=>'HM','country'=>'Heard and McDonald Islands'));
        DB::table('all_countries')->insert(array('code'=>'VA','country'=>'Holy See'));
        DB::table('all_countries')->insert(array('code'=>'HN','country'=>'Honduras'));
        DB::table('all_countries')->insert(array('code'=>'HK','country'=>'Hong Kong'));
        DB::table('all_countries')->insert(array('code'=>'HR','country'=>'Hrvatska'));
        DB::table('all_countries')->insert(array('code'=>'HU','country'=>'Hungary'));
        DB::table('all_countries')->insert(array('code'=>'IS','country'=>'Iceland'));
        DB::table('all_countries')->insert(array('code'=>'IN','country'=>'India'));
        DB::table('all_countries')->insert(array('code'=>'ID','country'=>'Indonesia'));
        DB::table('all_countries')->insert(array('code'=>'IR','country'=>'Iran'));
        DB::table('all_countries')->insert(array('code'=>'IQ','country'=>'Iraq'));
        DB::table('all_countries')->insert(array('code'=>'IE','country'=>'Ireland'));
        DB::table('all_countries')->insert(array('code'=>'IL','country'=>'Israel'));
        DB::table('all_countries')->insert(array('code'=>'IT','country'=>'Italy'));
        DB::table('all_countries')->insert(array('code'=>'JM','country'=>'Jamaica'));
        DB::table('all_countries')->insert(array('code'=>'JP','country'=>'Japan'));
        DB::table('all_countries')->insert(array('code'=>'JO','country'=>'Jordan'));
        DB::table('all_countries')->insert(array('code'=>'KZ','country'=>'Kazakhstan'));
        DB::table('all_countries')->insert(array('code'=>'KE','country'=>'Kenya'));
        DB::table('all_countries')->insert(array('code'=>'KI','country'=>'Kiribati'));
        DB::table('all_countries')->insert(array('code'=>'KP','country'=>'Korea'));
        DB::table('all_countries')->insert(array('code'=>'KR','country'=>'Korea'));
        DB::table('all_countries')->insert(array('code'=>'KW','country'=>'Kuwait'));
        DB::table('all_countries')->insert(array('code'=>'KG','country'=>'Kyrgyz Republic'));
        DB::table('all_countries')->insert(array('code'=>'LA','country'=>'Lao People\'s Democratic Republic'));
        DB::table('all_countries')->insert(array('code'=>'LV','country'=>'Latvia'));
        DB::table('all_countries')->insert(array('code'=>'LB','country'=>'Lebanon'));
        DB::table('all_countries')->insert(array('code'=>'LS','country'=>'Lesotho'));
        DB::table('all_countries')->insert(array('code'=>'LR','country'=>'Liberia'));
        DB::table('all_countries')->insert(array('code'=>'LY','country'=>'Libyan Arab Jamahiriya'));
        DB::table('all_countries')->insert(array('code'=>'LI','country'=>'Liechtenstein'));
        DB::table('all_countries')->insert(array('code'=>'LT','country'=>'Lithuania'));
        DB::table('all_countries')->insert(array('code'=>'LU','country'=>'Luxembourg'));
        DB::table('all_countries')->insert(array('code'=>'MO','country'=>'Macao'));
        DB::table('all_countries')->insert(array('code'=>'MK','country'=>'Macedonia'));
        DB::table('all_countries')->insert(array('code'=>'MG','country'=>'Madagascar'));
        DB::table('all_countries')->insert(array('code'=>'MW','country'=>'Malawi'));
        DB::table('all_countries')->insert(array('code'=>'MY','country'=>'Malaysia'));
        DB::table('all_countries')->insert(array('code'=>'MV','country'=>'Maldives'));
        DB::table('all_countries')->insert(array('code'=>'ML','country'=>'Mali'));
        DB::table('all_countries')->insert(array('code'=>'MT','country'=>'Malta'));
        DB::table('all_countries')->insert(array('code'=>'MH','country'=>'Marshall Islands'));
        DB::table('all_countries')->insert(array('code'=>'MQ','country'=>'Martinique'));
        DB::table('all_countries')->insert(array('code'=>'MR','country'=>'Mauritania'));
        DB::table('all_countries')->insert(array('code'=>'MU','country'=>'Mauritius'));
        DB::table('all_countries')->insert(array('code'=>'YT','country'=>'Mayotte'));
        DB::table('all_countries')->insert(array('code'=>'MX','country'=>'Mexico'));
        DB::table('all_countries')->insert(array('code'=>'FM','country'=>'Micronesia'));
        DB::table('all_countries')->insert(array('code'=>'MD','country'=>'Moldova'));
        DB::table('all_countries')->insert(array('code'=>'MC','country'=>'Monaco'));
        DB::table('all_countries')->insert(array('code'=>'MN','country'=>'Mongolia'));
        DB::table('all_countries')->insert(array('code'=>'MS','country'=>'Montserrat'));
        DB::table('all_countries')->insert(array('code'=>'MA','country'=>'Morocco'));
        DB::table('all_countries')->insert(array('code'=>'MZ','country'=>'Mozambique'));
        DB::table('all_countries')->insert(array('code'=>'MM','country'=>'Myanmar'));
        DB::table('all_countries')->insert(array('code'=>'NA','country'=>'Namibia'));
        DB::table('all_countries')->insert(array('code'=>'NR','country'=>'Nauru'));
        DB::table('all_countries')->insert(array('code'=>'NP','country'=>'Nepal'));
        DB::table('all_countries')->insert(array('code'=>'AN','country'=>'Netherlands Antilles'));
        DB::table('all_countries')->insert(array('code'=>'NL','country'=>'Netherlands'));
        DB::table('all_countries')->insert(array('code'=>'NC','country'=>'New Caledonia'));
        DB::table('all_countries')->insert(array('code'=>'NZ','country'=>'New Zealand'));
        DB::table('all_countries')->insert(array('code'=>'NI','country'=>'Nicaragua'));
        DB::table('all_countries')->insert(array('code'=>'NE','country'=>'Niger'));
        DB::table('all_countries')->insert(array('code'=>'NG','country'=>'Nigeria'));
        DB::table('all_countries')->insert(array('code'=>'NU','country'=>'Niue'));
        DB::table('all_countries')->insert(array('code'=>'NF','country'=>'Norfolk Island'));
        DB::table('all_countries')->insert(array('code'=>'MP','country'=>'Northern Mariana Islands'));
        DB::table('all_countries')->insert(array('code'=>'NO','country'=>'Norway'));
        DB::table('all_countries')->insert(array('code'=>'OM','country'=>'Oman'));
        DB::table('all_countries')->insert(array('code'=>'PK','country'=>'Pakistan'));
        DB::table('all_countries')->insert(array('code'=>'PW','country'=>'Palau'));
        DB::table('all_countries')->insert(array('code'=>'PS','country'=>'Palestinian Territory'));
        DB::table('all_countries')->insert(array('code'=>'PA','country'=>'Panama'));
        DB::table('all_countries')->insert(array('code'=>'PG','country'=>'Papua New Guinea'));
        DB::table('all_countries')->insert(array('code'=>'PY','country'=>'Paraguay'));
        DB::table('all_countries')->insert(array('code'=>'PE','country'=>'Peru'));
        DB::table('all_countries')->insert(array('code'=>'PH','country'=>'Philippines'));
        DB::table('all_countries')->insert(array('code'=>'PN','country'=>'Pitcairn Island'));
        DB::table('all_countries')->insert(array('code'=>'PL','country'=>'Poland'));
        DB::table('all_countries')->insert(array('code'=>'PT','country'=>'Portugal'));
        DB::table('all_countries')->insert(array('code'=>'PR','country'=>'Puerto Rico'));
        DB::table('all_countries')->insert(array('code'=>'QA','country'=>'Qatar'));
        DB::table('all_countries')->insert(array('code'=>'RE','country'=>'Reunion'));
        DB::table('all_countries')->insert(array('code'=>'RO','country'=>'Romania'));
        DB::table('all_countries')->insert(array('code'=>'RU','country'=>'Russian Federation'));
        DB::table('all_countries')->insert(array('code'=>'RW','country'=>'Rwanda'));
        DB::table('all_countries')->insert(array('code'=>'SH','country'=>'St. Helena'));
        DB::table('all_countries')->insert(array('code'=>'KN','country'=>'St. Kitts and Nevis'));
        DB::table('all_countries')->insert(array('code'=>'LC','country'=>'St. Lucia'));
        DB::table('all_countries')->insert(array('code'=>'PM','country'=>'St. Pierre and Miquelon'));
        DB::table('all_countries')->insert(array('code'=>'VC','country'=>'St. Vincent and the Grenadines'));
        DB::table('all_countries')->insert(array('code'=>'WS','country'=>'Samoa'));
        DB::table('all_countries')->insert(array('code'=>'SM','country'=>'San Marino'));
        DB::table('all_countries')->insert(array('code'=>'ST','country'=>'Sao Tome and Principe'));
        DB::table('all_countries')->insert(array('code'=>'SA','country'=>'Saudi Arabia'));
        DB::table('all_countries')->insert(array('code'=>'SN','country'=>'Senegal'));
        DB::table('all_countries')->insert(array('code'=>'CS','country'=>'Serbia and Montenegro'));
        DB::table('all_countries')->insert(array('code'=>'SC','country'=>'Seychelles'));
        DB::table('all_countries')->insert(array('code'=>'SL','country'=>'Sierra Leone'));
        DB::table('all_countries')->insert(array('code'=>'SG','country'=>'Singapore'));
        DB::table('all_countries')->insert(array('code'=>'SK','country'=>'Slovakia'));
        DB::table('all_countries')->insert(array('code'=>'SI','country'=>'Slovenia'));
        DB::table('all_countries')->insert(array('code'=>'SB','country'=>'Solomon Islands'));
        DB::table('all_countries')->insert(array('code'=>'SO','country'=>'Somalia'));
        DB::table('all_countries')->insert(array('code'=>'ZA','country'=>'South Africa'));
        DB::table('all_countries')->insert(array('code'=>'GS','country'=>'South Georgia and the South Sandwich Islands'));
        DB::table('all_countries')->insert(array('code'=>'ES','country'=>'Spain'));
        DB::table('all_countries')->insert(array('code'=>'LK','country'=>'Sri Lanka'));
        DB::table('all_countries')->insert(array('code'=>'SD','country'=>'Sudan'));
        DB::table('all_countries')->insert(array('code'=>'SR','country'=>'Suriname'));
        DB::table('all_countries')->insert(array('code'=>'SJ','country'=>'Svalbard & Jan Mayen Islands'));
        DB::table('all_countries')->insert(array('code'=>'SZ','country'=>'Swaziland'));
        DB::table('all_countries')->insert(array('code'=>'SE','country'=>'Sweden'));
        DB::table('all_countries')->insert(array('code'=>'CH','country'=>'Switzerland'));
        DB::table('all_countries')->insert(array('code'=>'SY','country'=>'Syrian Arab Republic'));
        DB::table('all_countries')->insert(array('code'=>'TW','country'=>'Taiwan'));
        DB::table('all_countries')->insert(array('code'=>'TJ','country'=>'Tajikistan'));
        DB::table('all_countries')->insert(array('code'=>'TZ','country'=>'Tanzania'));
        DB::table('all_countries')->insert(array('code'=>'TH','country'=>'Thailand'));
        DB::table('all_countries')->insert(array('code'=>'TL','country'=>'Timor-Leste'));
        DB::table('all_countries')->insert(array('code'=>'TG','country'=>'Togo'));
        DB::table('all_countries')->insert(array('code'=>'TK','country'=>'Tokelau'));
        DB::table('all_countries')->insert(array('code'=>'TO','country'=>'Tonga'));
        DB::table('all_countries')->insert(array('code'=>'TT','country'=>'Trinidad and Tobago'));
        DB::table('all_countries')->insert(array('code'=>'TN','country'=>'Tunisia'));
        DB::table('all_countries')->insert(array('code'=>'TR','country'=>'Turkey'));
        DB::table('all_countries')->insert(array('code'=>'TM','country'=>'Turkmenistan'));
        DB::table('all_countries')->insert(array('code'=>'TC','country'=>'Turks and Caicos Islands'));
        DB::table('all_countries')->insert(array('code'=>'TV','country'=>'Tuvalu'));
        DB::table('all_countries')->insert(array('code'=>'VI','country'=>'US Virgin Islands'));
        DB::table('all_countries')->insert(array('code'=>'UG','country'=>'Uganda'));
        DB::table('all_countries')->insert(array('code'=>'UA','country'=>'Ukraine'));
        DB::table('all_countries')->insert(array('code'=>'AE','country'=>'United Arab Emirates'));
        DB::table('all_countries')->insert(array('code'=>'GB','country'=>'United Kingdom of Great Britain & N. Ireland'));
        DB::table('all_countries')->insert(array('code'=>'UM','country'=>'United States Minor Outlying Islands'));
        DB::table('all_countries')->insert(array('code'=>'US','country'=>'United States of America'));
        DB::table('all_countries')->insert(array('code'=>'UY','country'=>'Uruguay'));
        DB::table('all_countries')->insert(array('code'=>'UZ','country'=>'Uzbekistan'));
        DB::table('all_countries')->insert(array('code'=>'VU','country'=>'Vanuatu'));
        DB::table('all_countries')->insert(array('code'=>'VE','country'=>'Venezuela'));
        DB::table('all_countries')->insert(array('code'=>'VN','country'=>'Viet Nam'));
        DB::table('all_countries')->insert(array('code'=>'WF','country'=>'Wallis and Futuna Islands'));
        DB::table('all_countries')->insert(array('code'=>'EH','country'=>'Western Sahara'));
        DB::table('all_countries')->insert(array('code'=>'YE','country'=>'Yemen'));
        DB::table('all_countries')->insert(array('code'=>'ZM','country'=>'Zambia'));
        DB::table('all_countries')->insert(array('code'=>'ZW','country'=>'Zimbabwe'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
