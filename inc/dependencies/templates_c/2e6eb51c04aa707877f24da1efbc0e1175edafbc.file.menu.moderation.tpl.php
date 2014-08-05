<?php /* Smarty version Smarty-3.1.18, created on 2014-06-13 05:43:46
         compiled from "inc\dependencies\templates\menu.moderation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6921537988744c7d94-12469796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e6eb51c04aa707877f24da1efbc0e1175edafbc' => 
    array (
      0 => 'inc\\dependencies\\templates\\menu.moderation.tpl',
      1 => 1402638223,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6921537988744c7d94-12469796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537988744cb7c9_62818707',
  'variables' => 
  array (
    'moderation_link' => 0,
    'moderation_link_collections' => 0,
    'moderation_link_users' => 0,
    'moderation_link_pages' => 0,
    'moderation_link_settings' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537988744cb7c9_62818707')) {function content_537988744cb7c9_62818707($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

if(isset($_REQUEST['do'])){
$action=$_REQUEST['do'];
$actions="stats"||"collections"||"users"||"pages"||"customize"||"settings";
function getActive($action,$compare){
	return $action==$compare ? 'class="active"' : '';
}
echo '<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link']->value;?>
"><i class="fa fa-home"></i> Estadisticas</a></li>
<li '. getActive($action,'collections') .'><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections']->value;?>
"><i class="fa fa-heart"></i> Colecciones</a></li>
<li '. getActive($action,'users') .'><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_users']->value;?>
"><i class="fa fa-user"></i> Usuarios</a></li>
<li '. getActive($action,'pages') .'><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_pages']->value;?>
"><i class="fa fa-file"></i> P&aacute;ginas</a></li>
<li '. getActive($action,'settings') .'><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_settings']->value;?>
"><i class="fa fa-cogs"></i> Configuracion</a></li>';
}else{
echo '<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link']->value;?>
"><i class="fa fa-home"></i> Estadisticas</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections']->value;?>
"><i class="fa fa-heart"></i> Colecciones</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_users']->value;?>
"><i class="fa fa-user"></i> Usuarios</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_pages']->value;?>
"><i class="fa fa-file"></i> P&aacute;ginas</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_settings']->value;?>
"><i class="fa fa-cogs"></i> Configuracion</a></li>';
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
