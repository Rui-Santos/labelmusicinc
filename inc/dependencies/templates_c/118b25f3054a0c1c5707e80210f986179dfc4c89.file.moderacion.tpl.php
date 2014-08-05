<?php /* Smarty version Smarty-3.1.18, created on 2014-08-05 06:46:14
         compiled from "inc\dependencies\templates\moderacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:290635379782f46d134-74929404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '118b25f3054a0c1c5707e80210f986179dfc4c89' => 
    array (
      0 => 'inc\\dependencies\\templates\\moderacion.tpl',
      1 => 1407218294,
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
    'is_admin' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379782f4aebf6_60997969')) {function content_5379782f4aebf6_60997969($_smarty_tpl) {?><?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true"&&$_smarty_tpl->tpl_vars['is_moderator']->value=="true"&&$_smarty_tpl->tpl_vars['is_admin']->value=="true")) {?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
require_once('inc/dependencies/class/perfil.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias, $link, $is_id, $is_action, $action, $country, $bi_day, $bi_month, $bi_year;
$loadbyid = false;
$loadowner = true;
$sid=0;
if($is_id){
	if(is_numeric($id)){
		$loadbyid = true;
		if($is_user && $user_id==$id){
			$loadowner = true;
		}else{
			$loadowner = false;
		}
	}

	if(!$loadbyid && $is_user && $user==$id){
		$loadowner = true;
	}else{
		$loadowner = false;
	}


$sid=$id;
$usera=User::getUserInfo($id,$loadbyid);

}else{
$sid=$user_id;
$usera=User::getUserInfo($user_id,true);
}
if($usera!=false){

$loadowner = $loadbyid && $sid==$usera['id'] ? true : $loadowner;


echo '
<div class="__intro _affixer affix-top" data-spy="affix" data-offset-top="62" data-offset-bottom="0">
<div id="profilecontent" class="container compact">
<div class="row">
<div class="col-xs-6">
<div id="main" class="main-full profile-container self">
  <div class="profile-head">
    <h1>
      <a href="'.$link.'@'.$sid.'" class="url" rel="contact" title="'.$usera['name'].'">
        <div class="hidden-xs">
          <img alt="'.$usera['name'].'" class="photo" height="80" src="'.$usera['profile_picture'].'" width="80">
        </div>
        '.$usera['name'].'
</a> <small class="hidden-xs">&nbsp; moderacion</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Secciones</a>
<div class="choseoptions"><ul>
	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Escritorio</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Usuarios</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Canciones</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';

}else{
include("denied.tpl");
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ("denied.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php }} ?>
