<?php /* Smarty version Smarty-3.1.18, created on 2014-05-11 17:09:45
         compiled from "C:\apacheServer\www\labelmusicinc\root\inc\dependencies\class\cuenta.php" */ ?>
<?php /*%%SmartyHeaderCode:7201536faed9284014-54337690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef9c2e3797108d953f908082f3ddc61b80f66462' => 
    array (
      0 => 'C:\\apacheServer\\www\\labelmusicinc\\root\\inc\\dependencies\\class\\cuenta.php',
      1 => 1399828180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7201536faed9284014-54337690',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536faed9293bf2_29845207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536faed9293bf2_29845207')) {function content_536faed9293bf2_29845207($_smarty_tpl) {?><<?php ?>?php

$action = $_GET['dump'] | $_GET['create'];
if(isset($action) && $action!=""){
	switch($action){
		case "temp":
			$_SESSION['is_user'] = "true";
			break;
		case "tempr":
			unset($_SESSION['is_user']);
			break;
	}
}

?<?php ?>><?php }} ?>
