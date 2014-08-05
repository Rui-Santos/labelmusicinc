<?php /* Smarty version Smarty-3.1.18, created on 2014-06-13 04:51:11
         compiled from "inc\dependencies\templates\moderacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:290635379782f46d134-74929404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '118b25f3054a0c1c5707e80210f986179dfc4c89' => 
    array (
      0 => 'inc\\dependencies\\templates\\moderacion.tpl',
      1 => 1402635067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '290635379782f46d134-74929404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5379782f4aebf6_60997969',
  'variables' => 
  array (
    'is_user' => 0,
    'is_moderator' => 0,
    'is_action' => 0,
    'action' => 0,
    'moderation_link_collections' => 0,
    'moderation_link_collections_published' => 0,
    'moderation_link_collections_drafted' => 0,
    'moderation_link_collections_deleted' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379782f4aebf6_60997969')) {function content_5379782f4aebf6_60997969($_smarty_tpl) {?><?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true"&&$_smarty_tpl->tpl_vars['is_moderator']->value=="true")) {?>


<div class="container _p">
<div class="_p_t">
<div class="col-xs-8">
	<h1><a href="#">Moderacion</a> <span>Centro de moderacion</span></h1>
</div>
<div class="col-xs-4 text-right">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/dependencies/class/perfil.php');
if(User::isOnlineAdmin()!=false){
$perfil = User::Perfil(User::isOnlineAdmin());
	if($perfil!="false" || $perfil!=false){
		echo '<a href="'.$profile_link.$perfil["nick"].'" class="tooltip-t _user_pic_small" title="'.$perfil["nick"].'"><img src="'.$perfil["picture"].'" /></a>';
	}
}else{
	header("Location ./?module=index");
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>
<span class="clearfix"></span>
</div>

<div class="_p_b">
<div class="_pager">
<div class="row">
	<div class="_pager_tabs small">
		<ul>
			<?php echo $_smarty_tpl->getSubTemplate ("menu.moderation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		</ul>
			<span class="clearfix"></span>
	</div>
</div>
</div>
</div>

<span class="clearfix"></span>







<div class="col-sm-9 col-md-10">
<?php if (($_smarty_tpl->tpl_vars['is_action']->value)) {?>


<?php if (($_smarty_tpl->tpl_vars['action']->value=='users')) {?>
<h2 class="_t_M">Usuarios <small>Control de usuarios</small></h2>
<span class="clearfix"></span>
<div class="_t_M_m">
<ul>
<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections']->value;?>
">Todos</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections_published']->value;?>
">Nuevos</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections_drafted']->value;?>
">Activos</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections_deleted']->value;?>
">Baneados</a></li>
</ul>
<span class="clearfix"></span>
</div>

<span class="clearfix"></span>

<div class="_i_l">


</div>



<?php } elseif (($_smarty_tpl->tpl_vars['action']->value=='collections')) {?>
<h2 class="_t_M">Colecciones <small>Colecciones y albums por los creadores</small></h2>
<span class="clearfix"></span>
<div class="_t_M_m">
<ul>
<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections']->value;?>
">Todo</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections_published']->value;?>
">Publicadas</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections_drafted']->value;?>
">Borradores</a></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections_deleted']->value;?>
">Eliminadas</a></li>
<span class="clearfix"></span>
</ul>
</div>

<div class="row _i_l">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/dependencies/class/perfil.php');
$get_co = User::getModCollections('all');

echo '<div class="col-sm-4 col-md-3 col-xs-6"><a href=""><div class="col-sm-12 _cI">
	<div class="_cPic"><i class="fa fa-plus"></i></div>
	<h4>Nueva</h4>
	</div></a></div>';
if(count($get_co)>0){
foreach ($get_co as $row){
	echo '<div class="col-sm-4 col-md-3 col-xs-6"><div class="col-sm-12 _cI">';
	echo $row[1];
	echo '</div></div>';
}
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>



<?php }?>




<?php } else { ?>

<h2 class="_t_M">Estadisticas <small>Informe de usuarios y publicaciones</small></h2>
<span class="clearfix"></span>
<div class="_t_M_m">
<ul>
<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link_collections']->value;?>
">Todo</a></li>
<li><a href="">Usuarios</a></li>
<li><a href="">Colecciones</a></li>
<li><a href="">Canciones</a></li>
<span class="clearfix"></span>
</ul>
</div>
<div class="_i_l">
</div>
<?php }?>

</div>
</div>
</div>

<span class="clearfix"></span>





<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ("denied.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php }} ?>
