<?php
//configuration file
require 'libs/Smarty.class.php';
$app = new Smarty;
// use php advanced features
require_once('libs/SmartyBC.class.php');
$app = new SmartyBC();


if (is_file('inc/dependencies/class/cuenta.php'))
{
    require_once('inc/dependencies/class/cuenta.php');
}else{
	require_once('../../inc/dependencies/class/cuenta.php');
}



$app->template_dir = 'inc/dependencies/templates/';
$app->compile_dir  = 'inc/dependencies/templates_c/';
$app->config_dir   = 'inc/dependencies/configs/';
$app->cache_dir    = 'inc/dependencies/cache/';

// $app->caching = true;
// $app->cache_lifetime = 120;

$app->caching = 0;

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'labelmusicinc';
$app->assign('host', $db_host);
$app->assign('dbuser', $db_user);
$app->assign('password', $db_password);
$app->assign('db_name', $db_name);

$GLOBALS['db_host'] = $db_host;
$GLOBALS['db_user'] = $db_user;
$GLOBALS['db_password'] = $db_password;
$GLOBALS['db_name'] = $db_name;



$bi_day = array("");
$bi_month = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
	"Septiembre", "Octubre", "Noviembre", "Diciembre");
$bi_year = array("1900");
for($i=0;$i<31;$i++){$bi_day[$i] = $i+1;}
for($yr=1950;$yr<2015;$yr++){$bi_year[$yr] = $yr;}
$gender = array("Hombre", "Mujer", "Otro");

$country = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");;

if(isset($_POST['_usr_form'])){ $is_reg=true; }else{$is_reg=false;}

$is_user = (isset($_SESSION['is_user']) && ($_SESSION['is_user']!=false || $_SESSION['is_user']!="false")) ? $_SESSION['is_user'] : "false";
$is_moderator = isset($_SESSION['is_moderator']) ? $_SESSION['is_moderator'] : false;
$is_admin = isset($_SESSION['is_admin']) ? $_SESSION['is_admin'] : false;
$app->assign('is_user', $is_user);
$app->assign('is_moderator', $is_moderator);
$app->assign('is_admin', $is_admin);

$GLOBALS['is_user'] = $is_user;
$GLOBALS['is_moderator'] = $is_moderator;


$user = "";
$user_id = "";
$username = "";
if($is_user!="false"||$is_user!=false){
	$user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
	$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
}

$app->assign('user', $user);
$app->assign('user_id', $user_id);
$app->assign('username', $username);



$app->assign('bi_day', $bi_day);
$app->assign('bi_month', $bi_month);
$app->assign('bi_year', $bi_year);
$app->assign('gender', $gender);
$app->assign('country', $country);
$app->assign('is_reg', $is_reg);



$db_rows = array(
	"user"=> array(
		"username"=>"user_username",
		"email"=>"user_email",
		"password"=>"user_password",
		"fullname"=>"user_fullname",
		"range"=>"user_range",
		"gender"=>"user_genre",
		"country"=>"user_country_id",
		"address"=>"user_address",
		"birth"=>"user_birth",
		"is_facebook"=>"user_is_fb_account",
		)
	);
$app->assign('db_rows', $db_rows);



$app->assign('app_name', 'Label Music Inc.');
$path = "//localhost/labelmusicinc/assets/";
$template_dir = "//localhost/labelmusicinc/inc/dependencies/templates/";
$link = "//localhost/labelmusicinc/";
$site_name = "Label Music Inc.";
$metaInfo = "";
$routes = array("", "home", "index", "yo", "cuenta", "subir", "colecciones", "descubre", "usuarios", "buscar", "moderacion", "listas", "notfound", 'filemanager');

$app->assign("path",$path);
$app->assign("link",$link);
$app->assign("site_name",$site_name);

$categorias = array("Sin categor&iacute;a", "Mix", "Remix", "Edici&oacute;n", "Video Remix");
$app->assign("categorias",$categorias);
$vcategorias = array("Sin categor&iacute;a", "Mix", "Remix", "Edici&oacute;n");
$app->assign("vcategorias",$vcategorias);

$generos = array("Bachata","Buenas Epocas","Electronica","Cumbias","Tecno/Trance","Merengue","Reggaeton","Sandungueo","Bolitos R","Electro Latino","Salsa","Reggae","Pop Latino","Rock","Exitos de los 90's","Baladas y Boleros","Rock'N' Roll","Rap & Hip Hop");
$app->assign("generos",$generos);



$is_action = isset($_REQUEST['do']) && $_REQUEST['do']!='' ? true : false;
$is_ajax = isset($_REQUEST['ajax']) ? true : false;
$app->assign("is_action", $is_action);
$app->assign("is_ajax", $is_ajax);
if($is_action){
	$action = $_REQUEST['do'];
	$app->assign("action", $action);
	$is_show = isset($_REQUEST['view']) ? true : false;
	$app->assign("is_show", $is_show);
	if($is_show){
		$show = $_REQUEST['view'];
		$app->assign("show", $show);
	}
}


$is_id = false;
if(isset($_GET['view'])){
	$is_id = true;
	$id = $_GET['view'];
	$app->assign('id', $id);
}
$app->assign('is_id', $is_id);

//links
$app->assign("login_link",$link."cuenta");
$app->assign("login_link_action",$link."cuenta");
$app->assign("register_link",$link."?module=cuenta&registrar");
$app->assign("register_link_action",$link."?module=cuenta&registrar");
$app->assign("profile_link",$link."@");

$app->assign("moderation_link",$link . "moderacion/");
$app->assign("moderation_link_stats",$link . "moderacion/stats");
$app->assign("moderation_link_stats_users",$link . "moderacion/stats/users");
$app->assign("moderation_link_stats_collections",$link . "moderacion/stats/collections");
$app->assign("moderation_link_stats_songs",$link . "moderacion/stats/songs");

$app->assign("moderation_link_collections",$link . "moderacion/collections");
$app->assign("moderation_link_collections_published",$link . "moderacion/collections/published");
$app->assign("moderation_link_collections_drafted",$link . "moderacion/collections/drafted");
$app->assign("moderation_link_collections_deleted",$link . "moderacion/collections/deleted");

$app->assign("moderation_link_users",$link . "moderacion/users/");

$app->assign("moderation_link_pages",$link . "moderacion/pages/");

$app->assign("moderation_link_customize",$link . "moderacion/customize/");

$app->assign("moderation_link_settings",$link . "moderacion/settings/");


$collections_link = $link . 'colecciones/';
$collections_link_id = "coleccion/";
$collections_song_link_id = "song/";
$app->assign("collections_link",$collections_link);
$app->assign("collections_link_id",$collections_link_id);
$app->assign("collections_link_new_song","mycollections/upload/");
$app->assign("collections_link_new_collection","mycollections/create/");
$app->assign("collections_link_my_collections","mycollections/");
$app->assign("collections_link_my_playlists","mycollections/playlists/");



$app->assign("collections_mod", "");

?>