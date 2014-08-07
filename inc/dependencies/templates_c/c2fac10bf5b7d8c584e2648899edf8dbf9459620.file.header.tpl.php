<?php /* Smarty version Smarty-3.1.18, created on 2014-08-07 06:39:10
         compiled from "inc\dependencies\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29090536ce559083b43-01705001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2fac10bf5b7d8c584e2648899edf8dbf9459620' => 
    array (
      0 => 'inc\\dependencies\\templates\\header.tpl',
      1 => 1407393509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29090536ce559083b43-01705001',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536ce55958af19_21072040',
  'variables' => 
  array (
    'path' => 0,
    'metaInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536ce55958af19_21072040')) {function content_536ce55958af19_21072040($_smarty_tpl) {?><!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:700,400|Droid+Serif:400,70" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
css/styles.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if IE]>
      <script src="//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->
	<?php echo $_smarty_tpl->tpl_vars['metaInfo']->value;?>

   </head>
   <body>
<?php echo $_smarty_tpl->getSubTemplate ("menu.main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("flying.player.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="main-content">
<div class="pageContainer">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

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
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
