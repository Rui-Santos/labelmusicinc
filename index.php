<?php 
session_start();

//index file
require_once("inc/settings.php");
require_once("inc/class.php");


$rutas = $routes;
$place = isset($_GET["module"]) ? ( $_GET["module"]=="" || $_GET["module"]=="home" ? "index" : $_GET["module"] ) : "index";


if (in_array($place, $rutas)) {


switch($place){
	case "index":
		if(!$is_ajax) showPart::__showHeader("<title>Inicio :: Label Music Inc.</title>");
		showPart::__showIndex("index");
		if(!$is_ajax) showPart::__showFooter();
		break;
	
	case "colecciones":
		showPart::__showIndex("colecciones");
		if(!$is_ajax) showPart::__showFooter();
		break;

	case "cuenta":
		if(!$is_ajax) showPart::__showHeader("<title>Cuenta :: Label Music Inc.</title>");
		showPart::__showIndex("cuenta");
		if(!$is_ajax) showPart::__showFooter();
		break;

	case "filemanager":
		if(!$is_ajax) showPart::__showHeader("<title>Mis archivos :: Label Music Inc.</title>");
		showPart::__showIndex("filemanager");
		if(!$is_ajax) showPart::__showFooter();
		break;
	
	case "moderacion":
		if(!$is_ajax) showPart::__showHeader("<title>Moderacion :: Label Music Inc.</title>");
		showPart::__showIndex("denied");
		if(!$is_ajax) showPart::__showFooter();
		break;
case "notfound":
		// if(!$is_ajax) showPart::__showHeader("<title>Moderacion :: Label Music Inc.</title>");
		showPart::__showIndex("notfound");
		// if(!$is_ajax) showPart::__showFooter();
		break;

	default:
		showPart::__showIndex("notfound");
		break;
	
}


}else{
	showPart::__showIndex("notfound");
}



 ?>