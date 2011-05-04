<?php
function install_get_countries()
{
	# MAX ID is 313 atm
	return array(
//		'0' => array('Unknown Country', 'eng', '--', '--'),
//		"666" => array('Local Area Network', 'eng', '--', '--'),
//		'305' => array('Abkhazia', ''),
//		'306' => array('Akrotiri and Dhekelia', ),
		'100' => array('Afghanistan', 'per:pas', 'as', 'AF', 29121286),
		'301' => array('Aland Islands', 'swe', 'eu', 'AX', 0),
		'69' => array('Albania', 'alb', 'eu', 'AL', 2986952),
		'307' => array('Alderney', 'eng:fre', 'eu', 'GG', 0),
		'79' => array('Algeria', 'ara:ama:fre', 'af', 'DZ', 34586184),
		'101' => array('American Samoa', 'eng:sam', 'au', 'AS', 66432),
		'71' => array('Andorra', 'cat', 'eu', 'AD', 84525),
		'102' => array('Angola', 'por', 'af', 'AO', 13068161),
		'103' => array('Anguilla', 'eng', 'ma', 'AI', 14766),
		'104' => array('Antarctica', 'eng', 'an', 'AQ', 0),
		'105' => array('Antigua And Barbuda', 'eng', 'ma', 'AG', 86754),
		'29' => array('Argentina', 'spa', 'sa', 'AR', 41343201),
		'36' => array('Armenia', 'arm', 'as', 'AM', 2966802),
		'106' => array('Aruba', 'dut', 'ma', 'AW', 104589),
		'308' => array('Ascension Island', 'eng', 'am', 'AC', 0),
		'26' => array('Australia', 'eng', 'au', 'AU', 21515754),
		'22' => array('Austria', 'ger', 'eu', 'AT', 8214160),
		'46' => array('Azerbaijan', 'aze', 'as', 'AZ', 8303512),
		'107' => array('Bahamas', 'eng', 'ma', 'BS', 310426),
		'108' => array('Bahrain', 'ara', 'as', 'BH', 738004),
		'75' => array('Bangladesh', 'ben', 'as', 'BD', 156118464),
		'109' => array('Barbados', 'eng:baj', 'ma', 'BB', 285653),
		'110' => array('Belarus', 'rus:bel', 'eu', 'BY', 9612632),
		'23' => array('Belgium', 'fre:ger:dut', 'eu', 'BE', 10423493),
		'111' => array('Belize', 'eng:spa', 'ma', 'BZ', 314522),
		'112' => array('Benin', 'fre', 'af', 'BJ', 9056010),
		'113' => array('Bermuda', 'eng', 'ma', 'BM', 68265),
		'114' => array('Bhutan', 'dzo', 'as', 'BT', 699847),
		'115' => array('Bolivia', 'spa:que:aym', 'sa', 'BO', 9947418),
		'82' => array('Bosnia Herzegovina', 'bos:ser:cro', 'eu', 'BA', 4621598),
		'116' => array('Botswana', 'eng:set', 'af', 'BW', 2029307),
		'117' => array('Bouvet Island', 'eng', 'sa', 'BV', 0),
		'38' => array('Brazil', 'por', 'sa', 'BR', 201103330),
		'118' => array('British Indian Ocean Territory', 'eng', 'au', 'IO', 0),
		'119' => array('Brunei Darussalam', 'mal:bru', 'as', 'BN', 395027),
		'37' => array('Bulgaria', 'bul', 'eu', 'BG', 7148785),
		'120' => array('Burkina Faso', 'fre:ind', 'af', 'BF', 16241811),
		'121' => array('Burundi', 'kir:fre:swa', 'af', 'BI', 9863117),
		'122' => array('Cambodia', 'khm', 'as', 'KH', 14453680),
		'123' => array('Cameroon', 'fre:eng', 'af', 'CM', 19294149),
		'19' => array('Canada', 'eng:fre', 'na', 'CA', 33759742),
		'124' => array('Cape Verde', 'por', 'af', 'CV', 508659),
		'125' => array('Cayman Islands', 'eng', 'ma', 'KY', 50209),
		'126' => array('Central African Republic', 'fre:san', 'af', 'CF', 4844927),
		'127' => array('Chad', 'fre:ara', 'af', 'TD', 10543464),
		'63' => array('Chile', 'spa', 'sa', 'CL', 16746491),
		'47' => array('China', 'chi', 'as', 'CN', 1330141295),
		'128' => array('Christmas Islands', 'eng', 'au', 'CX', 1402),
		'129' => array('Cocos (Keeling) Islands', 'eng', 'au', 'CC', 596),
		'31' => array('Colombia', 'spa', 'sa', 'CO', 44205293),
		'130' => array('Comoros', 'ara:fre', 'af', 'KM', 773407),
		'131' => array('Congo', 'fre', 'af', 'CG', 4125916),
		'132' => array('Congo, The Democratic Republic Of The', 'fre:swa:lin:kon:tsh', 'af', 'CD', 70916439),
		'133' => array('Cook Islands', 'eng:mao', 'au', 'CK', 11488),
		'83' => array('Costa Rica', 'spa', 'ma', 'CR', 4516220),
		'134' => array('Côte d’Ivoire', 'fre', 'af', 'CI', 0),
		'48' => array('Croatia', 'cro', 'eu', 'HR', 4486881),
		'62' => array('Cuba', 'spa', 'ma', 'CU', 11477459),
		'76' => array('Cyprus', 'gre:tur', 'eu', 'CY', 1102677),
		'20' => array('Czech Republic', 'cze', 'eu', 'CZ', 10201707),
		'21' => array('Denmark', 'dan', 'eu', 'DK', 5515575),
		'135' => array('Djibouti', 'ara:fre:afa:som', 'af', 'DJ', 740528),
		'136' => array('Dominica', 'eng', 'ma', 'DM', 72813),
		'60' => array('Dominican Republic', 'spa', 'ma', 'DO', 9823821),
		'309' => array('East Timor', 'tet:por:inn:eng', 'as', 'TL', 1154625),
		'77' => array('Ecuador', 'spa', 'sa', 'EC', 14790608),
		'14' => array('Egypt', 'ara', 'af', 'EG', 80471869),
		'137' => array('El Salvador', 'spa', 'ma', 'SV', 6052064),
		'138' => array('Equatorial Guinea', 'spa:fre:por:fan:bub:ann', 'af', 'GQ', 650702),
		'139' => array('Eritrea', 'ara:tig', 'af', 'ER', 5792984),
		'140' => array('Estonia', 'est', 'eu', 'EE', 1291170),
		'141' => array('Ethiopia', 'amh', 'af', 'ET', 88013491),
		'142' => array('Falkland Islands (Malvinas)', 'eng', 'sa', 'FK', 3140),
		'143' => array('Faroe Islands', 'far:dan', 'eu', 'FO', 49057),
		'144' => array('Fiji', 'eng:bau:hit', 'au', 'FJ', 875983),
		'15' => array('Finland', 'fin:swe', 'eu', 'FI', 5255068),
		'16' => array('France', 'fre', 'eu', 'FR', 64768389),
		'146' => array('French Guiana', 'fre', 'sa', 'GF', 0),
		'147' => array('French Polynesia', 'fre:tah', 'au', 'PF', 291000),
		'148' => array('French Southern Territories', 'fre', 'an', 'TF', 0),
		'149' => array('Gabon', 'fre', 'af', 'GA', 1545255),
		'150' => array('Gambia', 'eng', 'af', 'GM', 1824158),
		'151' => array('Georgia', 'geo', 'eu', 'GE', 4600825),
		'17' => array('Germany', 'ger', 'eu', 'DE', 82282988),
		'152' => array('Ghana', 'eng', 'af', 'GH', 24339838),
		'153' => array('Gibraltar', 'eng:spa', 'eu', 'GI', 28877),
		'44' => array('Greece', 'gre', 'eu', 'GR', 10749943),
		'154' => array('Greenland', 'grl:dan', 'na', 'GL', 57637),
		'155' => array('Grenada', 'eng', 'ma', 'GD', 107818),
		'156' => array('Guadeloupe', 'fre', 'ma', 'GP', 0),
		'157' => array('Guam', 'eng:cha', 'au', 'GU', 0),
		'18' => array('Guatemala', 'spa', 'ma', 'GT', 13550440),
		'310' => array('Guernsey', 'eng:fre', 'eu', 'GG', 64775),
		'158' => array('Guinea', 'fre:cri', 'af', 'GN', 10324025),
		'159' => array('Guinea-Bissau', 'por:cri', 'af', 'GW', 1565126),
		'160' => array('Guyana', 'eng:hin', 'sa', 'GY', 748486),
		'161' => array('Haiti', 'fre:hai', 'ma', 'HT', 9648924),
//		'162' => array('Heard And McDonald Islands', 'HM),
		'163' => array('Holy See (Vatican City State)', 'ita', 'eu', 'VA', 0),
		'66' => array('Honduras', 'spa', 'ma', 'HN', 7989415),
		'164' => array('Hong Kong', 'chi:eng', 'as', 'HK', 7089705),
		'9' => array('Hungary', 'hun', 'eu', 'HU', 9992339),
		'10' => array('Iceland', 'ice', 'eu', 'IS', 308910),
		'33' => array('India', 'hin:eng', 'as', 'IN', 1173108018),
		'165' => array('Indonesia', 'inn', 'as', 'ID', 242968342),
		'55' => array('Iran', 'per:kur', 'as', 'IR', 76923300),
		'166' => array('Iraq', 'ara:kur', 'as', 'IQ', 29671605),
		'11' => array('Ireland', 'iri:eng', 'eu', 'IE', 4622917),
		'304' => array('Isle of Man', 'max:eng', 'eu', 'IM', 83859),
		'35' => array('Israel', 'heb:ara', 'as', 'IL', 7353985),
		'12' => array('Italy', 'ita', 'eu', 'IT', 58090681),
		'56' => array('Jamaica', 'eng', 'ma', 'JM', 2847232),
		'13' => array('Japan', 'jap', 'as', 'JP', 126804433),
		'303' => array('Jersey', 'eng:fre', 'eu', 'JE', 93363),
		'167' => array('Jordan', 'ara:eng', 'as', 'JO', 6407085),
		'168' => array('Kazakhstan', 'kaz:rus', 'as', 'KZ', 15460484),
		'169' => array('Kenya', 'swa:eng', 'af', 'KE', 40046566),
		'170' => array('Kiribati', 'eng:gil', 'au', 'KI', 99482),
		'171' => array('Korea, Democratic People\'s Republic Of', 'kor', 'as', 'KP', 22757275),
		'172' => array('Korea, Republic Of', 'kor', 'as', 'KR', 48636068),
		'311' => array('Kosovo', 'alb:ser', 'eu', 'RS', 1815048),
		'173' => array('Kuwait', 'ara', 'as', 'KW', 2789132),
		'174' => array('Kyrgyzstan', 'kyr:rus', 'as', 'KG', 5508626),
		'175' => array('Lao People\'s Democratic Republic', 'lao', 'as', 'LA', 6368162),
		'28' => array('Latvia', 'lat', 'eu', 'LV', 2217969),
		'40' => array('Lebanon', 'ara:fre:eng:arm', 'as', 'LB', 4125247),
		'176' => array('Lesotho', 'sso:eng', 'af', 'LS', 1919552),
		'177' => array('Liberia', 'eng', 'af', 'LR', 3685076),
		'178' => array('Libya', 'ara', 'af', 'LY', 6461454),
		'179' => array('Liechtenstein', 'ger', 'eu', 'LI', 35002),
		'30' => array('Lithuania', 'lit', 'eu', 'LT', 3545319),
		'53' => array('Luxembourg', 'lux:ger:fre', 'eu', 'LU', 497538),
		'180' => array('Macau', 'chi:por', 'as', 'MO', 567957),
		'64' => array('Macedonia, Republic of', 'mac', 'eu', 'MK', 2072086),
		'181' => array('Madagascar', 'mag:fre:eng', 'af', 'MG', 21281844),
		'182' => array('Malawi', 'eng:chw', 'af', 'MW', 15447500),
		'73' => array('Malaysia', 'mal', 'as', 'MY', 28274729),
		'78' => array('Maldives', 'dhi', 'af', 'MV', 395650),
		'183' => array('Mali', 'fre', 'af', 'ML', 13796354),
		'184' => array('Malta', 'mat:eng', 'eu', 'MT', 406771),
		'185' => array('Marshall Islands', 'mar:eng', 'au', 'MH', 65859),
		'186' => array('Martinique', 'fre', 'ma', 'MQ', 0),
		'187' => array('Mauritania', 'ara:fre', 'af', 'MR', 3205060),
		'188' => array('Mauritius', 'eng:fre', 'af', 'MU', 1294104),
		'189' => array('Mayotte', 'fre', 'af', 'YT', 231139),
		'42' => array('Mexico', 'spa', 'ma', 'MX', 112468855),
		'190' => array('Micronesia, Federated States Of', 'eng', 'au', 'FM', 107154),
		'191' => array('Moldova, Republic Of', 'mol:rus:ukr:gag', 'eu', 'MD', 4317483),
		'192' => array('Monaco', 'fre:moq', 'eu', 'MC', 30586),
		'80' => array('Montenegro', 'mon:ser:bos:alb:cro', 'eu', 'ME', 666730),
		'193' => array('Mongolia', 'mgl', 'as', 'MN', 3086918),
		'194' => array('Montserrat', 'eng', 'ma', 'MS', 5118),
		'74' => array('Morocco', 'ara', 'af', 'MA', 31627428),
		'195' => array('Mozambique', 'por', 'af', 'MZ', 22061451),
		'196' => array('Myanmar', 'bur', 'as', 'MM', 53414374),
		'197' => array('Namibia', 'eng:ger:afr:osh', 'af', 'NA', 2128471),
		'198' => array('Nauru', 'eng:nau', 'au', 'NR', 9267),
		'199' => array('Nepal', 'nep', 'as', 'NP', 28951852),
		'25' => array('Netherlands, The', 'dut', 'eu', 'NL', 16783092),
		'200' => array('Netherlands Antilles', 'dut:eng:pap', 'ma', 'AN', 228693),
		'201' => array('New Caledonia', 'fre', 'au', 'NC', 252352),
		'39' => array('New Zealand', 'mao:eng', 'au', 'NZ', 4252277),
		'202' => array('Nicaragua', 'spa', 'ma', 'NI', 5995928),
		'203' => array('Niger', 'fre', 'af', 'NE', 15878271),
		'204' => array('Nigeria', 'eng', 'af', 'NG', 152217341),
		'205' => array('Niue', 'niu:eng', 'au', 'NU', 1354),
		'206' => array('Norfolk Island', 'eng:nfk', 'au', 'NF', 2155),
		'207' => array('Northern Mariana Islands', 'eng:cha:car', 'au', 'MP', 48317),
		'6' => array('Norway', 'nor', 'eu', 'NO', 4676305),
		'208' => array('Oman', 'ara', 'as', 'OM', 2967717),
		'209' => array('Pakistan', 'urd', 'as', 'PK', 184404791),
		'210' => array('Palau', 'eng:pal', 'au', 'PW', 20879),
		'211' => array('Palestinian Territory, Occupied', 'ara', 'as', 'PS', 0),
//		'57'  => array('Palestine',  '', ''),
		'45' => array('Panama', 'spa', 'ma', 'PA', 3410676),
		'212' => array('Papua New Guinea', 'eng:tok:hir', 'au', 'PG', 6064515),
		'213' => array('Paraguay', 'spa:gua', 'sa', 'PY', 6375830),
		'67' => array('Peru', 'spa', 'sa', 'PE', 29907003),
		'54' => array('Philippines, The', 'fil:eng', 'as', 'PH', 99900177),
		'214' => array('Pitcairn Islands', 'eng:pit', 'ma', 'PN', 48),
		'7' => array('Poland', 'pol', 'eu', 'PL', 38463689),
		'8' => array('Portugal', 'por', 'eu', 'PT', 10735765),
//		'319' => array('Pridnestrovian Moldavian Republic', '', '', ''),
		'215' => array('Puerto Rico', 'spa:eng', 'ma', 'PR', 3978702),
		'216' => array('Qatar', 'ara', 'as', 'QA', 840926),
		'217' => array('Reunion', 'fre', 'eu', 'RE', 0),
		'27' => array('Romania', 'rom', 'eu', 'RO', 21959278),
		'32' => array('Russian Federation', 'rus', 'as', 'RU', 139390205),
		'218' => array('Rwanda', 'kin:fre:eng', 'af', 'RW', 11055976),
		'219' => array('Saint Kitts And Nevis', 'eng', 'ma', 'KN', 49898),
		'220' => array('Saint Lucia', 'eng:ant', 'ma', 'LC', 160922),
		'221' => array('Saint Vincent And The Grenadines', 'eng', 'ma', 'VC', 104217),
		'222' => array('Samoa', 'eng:sam', 'ma', 'WS', 192001),
		'223' => array('San Marino', 'ita', 'eu', 'SM', 31477),
		'224' => array('Sao Tome And Principe', 'por', 'af', 'ST', 175808),
		'59' => array('Saudi Arabia', 'ara', 'as', 'SA', 25731776),
		'225' => array('Senegal', 'fre:wol', 'af', 'SN', 12323252),
		'81' => array('Serbia', 'ser:hun:slo:rom:cro:alb', 'eu', 'RS', 7344847),
		'312' => array('Serbia and Montenegro', 'ser', 'eu', 'CS', 0),
		'226' => array('Seychelles', 'eng:fre', 'af', 'SC', 88340),
		'227' => array('Sierra Leone', 'eng', 'af', 'SL', 5245695),
		'52' => array('Singapore', 'eng:mal:man:tam', 'as', 'SG', 4701069),
		'4' => array('Slovakia', 'slo', 'eu', 'SK', 5470306),
		'41' => array('Slovenia', 'slv', 'eu', 'SI', 2003136),
		'228' => array('Solomon Islands', 'eng', 'au', 'SB', 559198),
		'229' => array('Somalia', 'som:eng:ita:ara', 'af', 'SO', 10112453),
		'3' => array('South Africa', 'afr:zul:xho:nso:tsw:sot:tso', 'af', 'ZA', 49109107),
		'313' => array('South Georgia and the South Sandwich Islands', 'eng', 'sa', 'GS', 0),
//		'317' => array('South Ossetia, Republic of', '', '', ''),
		'5' => array('Spain', 'spa', 'eu', 'ES', 46505963),
		'230' => array('Sri Lanka', 'sin:tam', 'as', 'LK', 21513990),
		'231' => array('St. Helena', 'eng', 'ma', 'sa', 7670),
		'232' => array('St. Pierre And Miquelon', 'fre', 'na', 'pm', 0),
		'233' => array('Sudan', 'ara:eng', 'af', 'SD', 43939598),
		'235' => array('Suriname', 'dut:sra', 'af', 'SR', 486618),
//		'236' => array('Svalbard And Jan Mayen Islands'), 2 COUNTRIES
		'237' => array('Swaziland', 'eng:swt', 'af', 'SZ', 1354051),
		'24' => array('Sweden', 'swe', 'eu', 'SE', 9074055),
		'43' => array('Switzerland', 'ger:fre:ita:rom', 'eu', 'CH', 7623438),
		'240' => array('Syrian Arab Republic', 'syr', 'as', 'SY', 22198110),
		'300' => array('Taiwan', 'tai:chi', 'as', 'TW', 23024956),
		'241' => array('Tajikistan', 'taj', 'as', 'TJ', 7487489),
		'242' => array('Tanzania, United Republic Of', 'swa:eng', 'af', 'TZ', 0),
		'65' => array('Thailand', 'tha', 'as', 'TH', 67089500),
		'243' => array('Timor-Leste', 'tet:por', 'au', 'tl', 0),
		'244' => array('Togo', 'fre', 'af', 'TG', 6587239),
		'245' => array('Tokelau', 'tol:eng', 'au', 'TK', 1400),
		'246' => array('Tonga', 'ton:eng', 'au', 'TO', 122580),
		'34' => array('Trinidad & Tobago', 'eng:spa', 'ma', 'TT', 1228691),
		'320' => array('Tristan da Cunha', 'eng', 'af', 'SH', 0),
		'70' => array('Tunisia', 'ara', 'af', 'TN', 10589025),
		'61' => array('Turkey', 'tur', 'as', 'TR', 77804122),
		'247' => array('Turkmenistan', 'tkm:rus:uzb:dar', 'as', 'TM', 4940916),
		'248' => array('Turks And Caicos Islands', 'eng', 'ma', 'TC', 23528),
		'249' => array('Tuvalu', 'tuv', 'au', 'TV', 10472),
		'250' => array('Uganda', 'eng:swa', 'af', 'UG', 33398682),
		'58' => array('Ukraine', 'ukr', 'eu', 'UA', 45415596),
		'251' => array('United Arab Emirates', 'ara', 'as', 'AE', 4975593),
		'2' => array('United Kingdom', 'eng', 'eu', 'GB', 62348447),
		'1' => array('United States', 'eng', 'na', 'US', 310232863),
		'252' => array('United States Minor Outlying Islands', 'eng', 'ma', 'UM', 0),
		'68' => array('Uruguay', 'spa', 'sa', 'UY', 3510386),
		'253' => array('Uzbekistan', 'uzb', 'as', 'UZ', 27865738),
		'254' => array('Vanuatu', 'bis:eng:fre', 'au', 'VU', 221552),
		'49' => array('Venezuela', 'spa', 'sa', 'VE', 27223228),
		'50' => array('Vietnam', 'vie', 'as', 'VN', 89571130),
		'255' => array('Virgin Islands (British)', 'eng', 'ma', 'VG', 24939),
		'256' => array('Virgin Islands (U.S.)', 'eng', 'ma', 'VI', 109750),
		'257' => array('Wallis And Futuna Islands', 'fre:uve:fut', 'au', 'WF', 0),
		'258' => array('Western Sahara', 'ara:spa', 'af', 'eh', 491519),
		'259' => array('Yemen', 'ara', 'as', 'YE', 23495361),
		'260' => array('Zambia', 'eng', 'af', 'ZM', 13460305),
		'270' => array('Zimbabwe', 'eng:sho:sid', 'af', 'ZW', 11651858),
	);	
}

function install_get_languages()
{
	# English Name | Native Name | iso-639-3 | iso-639-1
	static $languages = array(
		array('English', 'English', 'eng', 'en'),
		array('German', 'Deutsch', 'ger', 'de'),
		array('French', 'Française', 'fre', 'fr'),
		array('Bulgarian', 'български език', 'bul', 'bg'),
		array('Spanish', 'español', 'spa', 'es'),
		array('Chinese', '汉语 / 漢語', 'chi', 'zh'),
		array('Croatian', 'hrvatski', 'cro', 'hr'),
		array('Albanian', 'Shqip', 'alb', 'sq'),
		array('Arabic', 'العربية', 'ara', 'ar'),
		array('Amazigh', '', 'ama', ''),
		array('Catalan', 'català', 'cat', 'ca'),
		array('Armenian', 'Հայերեն', 'arm', 'hy'),
		array('Azerbaijani', 'Azərbaycan / Азәрбајҹан / آذربایجان دیلی', 'aze', 'az'),
		array('Bengali', 'বাংলা',  'ben', 'bn'),
		array('Dutch', 'Nederlands', 'dut', 'nl'),
		array('Bosnian', 'bosanski/босански', 'bos', 'bs'),
		array('Serbian', 'Српски / Srpski ', 'ser', 'sr'),
		array('Portuguese', 'português', 'por', 'pt'),
		array('Greek', 'Ελληνικά / Ellīniká', 'gre', 'el'),
		array('Turkish', 'Türkçe', 'tur', 'tr'),
		array('Czech', 'Čeština', 'cze', 'cs'),
		array('Danish', 'dansk', 'dan', 'da'),
		array('Finnish', 'suomi', 'fin', 'fi'),
		array('Swedish', 'svenska', 'swe', 'sv'),
		array('Hungarian', 'magyar', 'hun', 'hu'),
		array('Icelandic', 'Íslenska', 'ice', 'is'),
		array('Hindi', 'हिन्दी / हिंदी',  'hin', 'hi'),
		array('Persian', 'فارسی', 'per', 'fa'),
		array('Kurdish', 'Kurdî / کوردی', 'kur', 'ku'),
		array('Irish', 'Gaeilge', 'iri', 'ga'),
		array('Hebrew', 'עִבְרִית / \'Ivrit', 'heb', 'he'),
		array('Italian', 'Italiano', 'ita', 'it'),
		array('Japanese', '日本語 / Nihongo', 'jap', 'ja'),
		array('Korean', '한국어 / 조선말',  'kor', 'ko'),
		array('Latvian', 'latviešu valoda', 'lat', 'lv'),
		array('Lithuanian', 'Lietuvių kalba', 'lit', 'lt'),
		array('Luxembourgish', 'Lëtzebuergesch', 'lux', 'lb'),
		array('Macedonian', 'Македонски јазик / Makedonski jazik', 'mac', 'mk'),
		array('Malay', 'Bahasa Melayu / بهاس ملايو', 'mal', 'ms'),
		array('Dhivehi', 'Dhivehi / Mahl', 'dhi', 'dv'),
		array("Montenegrin", "Црногорски / Crnogorski", "mon", ''),
		array('Maori', 'Māori', 'mao', 'mi'),
		array('Norwegian', 'norsk', 'nor', 'no'),
		array('Filipino', 'Filipino', 'fil', 'tl'),
		array('Polish', 'język polski', 'pol', 'pl'),
		array('Romanian', 'română / limba română', 'rom', 'ro'),
		array('Russian', 'Русский язык', 'rus', 'ru'),
		array('Slovak', 'slovenčina', 'slo', 'sk'),
		array('Mandarin', '官話 / Guānhuà', 'man', 'zh'),
		array('Tamil', 'தமிழ', 'tam', 'ta'),
		array('Slovene', 'slovenščina', 'slv', 'sl'),
		array('Zulu', 'isiZulu', 'zul', 'zu'),
		array('Xhosa', 'isiXhosa', 'xho', 'xh'),
		array('Afrikaans', 'Afrikaans', 'afr', 'af'),
		array('Northern Sotho', 'Sesotho sa Leboa', 'nso', '--'),
		array('Tswana', 'Setswana / Sitswana', 'tsw', 'tn'),
		array('Sotho', 'Sesotho', 'sot', 'st'),
		array('Tsonga', 'Tsonga', 'tso', 'ts'),
		array('Thai', 'ภาษาไทย / phasa thai', 'tha', 'th'),
		array('Ukrainian', 'українська мова', 'ukr', 'uk'),
		array('Vietnamese', 'Tiếng Việt', 'vie', 'vi'),
		array('Pashto', 'پښت', 'pas', 'ps'),
		array('Samoan', 'gagana Sāmoa', 'sam', 'sm'),
		array('Bajan', 'Barbadian Creole', 'baj', '--'),
		array('Belarusian', 'беларуская мова', 'bel', 'be'),
		array('Dzongkha', '', 'dzo', 'dz'),
		array('Quechua', '', 'que', ''),
		array('Aymara', '', 'aym', ''),
		array('Setswana', '', 'set', ''),
		array('Bruneian', '', 'bru', ''),
		array('Indigenous', '', 'ind', ''),
		array('Kirundi', '', 'kir', ''),
		array('Swahili', '', 'swa', ''),
		array('Khmer', '', 'khm', ''),
		array('Sango', '', 'san', ''),
		array('Lingala', '', 'lin', ''),
		array('Kongo/Kituba', '', 'kon', ''),
		array('Tshiluba', '', 'tsh', ''),
		array('Afar', '', 'afa', ''),
		array('Somali', '', 'som', ''),
		array('Fang', '', 'fan', ''),
		array('Bube', '', 'bub', ''),
		array('Annobonese', '', 'ann', ''),
		array('Tigrinya', '', 'tig', ''),
		array('Estonian', 'Eesti', 'est', 'et'),
		array('Amharic', '', 'amh', ''),
		array('Faroese', '', 'far', ''),
		array('Bau Fijian', '', 'bau', ''),
		array('Hindustani', '', 'hit', ''),
		array('Tahitian', '', 'tah', ''),
		array('Georgian', '', 'geo', ''),
		array('Greenlandic', '', 'grl', ''),
		array('Chamorro', '', 'cha', ''),
		array('Crioulo', '', 'cri', ''),
		array('Haitian Creole', '', 'hai', ''),
		array('Indonesian', '', 'inn', ''),
		array('Kazakh', '', 'kaz', ''),
		array('Gilbertese', '', 'gil', ''),
		array('Kyrgyz', '', 'kyr', ''),
		array('Lao', '', 'lao', ''),
		array('Southern Sotho', '', 'sso', ''),
		array('Malagasy', '', 'mag', ''),
		array('Chichewa', '', 'chw', ''),
		array('Maltese', '', 'mat', ''),
		array('Marshallese', '', 'mar', ''),
		array('Moldovan', '', 'mol', ''),
		array('Gagauz', '', 'gag', ''),
		array('Monegasque', '', 'moq', ''),
		array('Mongolian', '', 'mgl', ''),
		array('Burmese', '', 'bur', ''),
		array('Oshiwambo', '', 'osh', ''),
		array('Nauruan', '', 'nau', ''),
		array('Nepal', '', 'nep', ''),
		array('Papiamento', '', 'pap', ''),
		array('Niuean', '', 'niu', ''),
		array('Norfuk', '', 'nfk', ''),
		array('Carolinian', '', 'car', ''),
		array('Urdu', 'اردو', 'urd', 'ur'),
		array('Palauan', '', 'pal', ''),
		array('Tok Pisin', '', 'tok', ''),
		array('Hiri Motu', '', 'hir', ''),
		array('Guarani', '', 'gua', ''),
		array('Pitkern', '', 'pit', ''),
		array('Kinyarwanda', '', 'kin', ''),
		array('Antillean Creole', '', 'ant', ''),
		array('Wolof', '', 'wol', ''),
		array('Sinhala', '', 'sin', ''),
		array('Sranan Tongo', '', 'sra', ''),
		array('Swati', '', 'swt', ''),
		array('Syrian', '', 'syr', ''),
		array('Tajik', '', 'taj', ''),
		array('Tetum', '', 'tet', ''),
		array('Tokelauan', '', 'tol', ''),
		array('Tongan', '', 'ton', ''),
		array('Turkmen', '', 'tkm', ''),
		array('Uzbek', '', 'uzb', ''),
		array('Dari', '', 'dar', ''),
		array('Tuvaluan', '', 'tuv', ''),
		array('Bislama', '', 'bis', ''),
		array('Uvean', '', 'uve', ''),
		array('Futunan', '', 'fut', ''),
		array('Shona', '', 'sho', ''),
		array('Sindebele', '', 'sid', ''),
		array('Taiwanese', '', 'tai', ''),
		array('Manx', '', 'max', ''),
	);
	return $languages;
}
?>
