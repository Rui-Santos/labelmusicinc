<!DOCTYPE html>
<!--[if lt IE 9]>
<html lang="en" class="ie ie-old">
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- styles -->
    <link rel="stylesheet" type="text/css" href="{$path}css/styles.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if IE]>
      <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
	{$metaInfo}
   </head>
   <body>
{include file="menu.main.tpl"}
{include file="flying.player.tpl"}
<div class="main-content">
<div class="pageContainer">
{php}
if(isset($_GET['ref'])){
$msg = isset($_GET['msg']) ? $_GET['msg'] : false;

if($msg!=false){
if($msg=="1"){
echo '<span style="display: none;" rel="notify" data-notification-message="Bienvenido! has iniciado sesion correctamente." data-notification-attributes="true"></span>';
} else if($msg=="2"){
  echo '<span style="display: none;" rel="notify" data-notification-message="Felicidades! Te has registrado." data-notification-attributes="true"></span>';
} else if($msg=="3"){
  echo '<span style="display: none;" rel="notify" data-notification-message="Sesion terminada."></span>';
}


}

}
{/php}