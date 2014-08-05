<?php /* Smarty version Smarty-3.1.18, created on 2014-08-05 04:35:37
         compiled from "inc\dependencies\templates\menu.main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:922536ce8758e8b14-62637734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c790b84ec6b4d8e67e8126e4aef3b58cad5edc' => 
    array (
      0 => 'inc\\dependencies\\templates\\menu.main.tpl',
      1 => 1407213336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '922536ce8758e8b14-62637734',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536ce875a19042_11752836',
  'variables' => 
  array (
    'link' => 0,
    'path' => 0,
    'collections_link' => 0,
    'is_user' => 0,
    'is_moderator' => 0,
    'profile_link' => 0,
    'user' => 0,
    'is_admin' => 0,
    'moderation_link' => 0,
    'collections_link_new_collection' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536ce875a19042_11752836')) {function content_536ce875a19042_11752836($_smarty_tpl) {?><div class="menu-area">
<div class="navbar navbar-static-top <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  echo 'open '.$_COOKIE['LMI_playerVisible'];
  }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" id="top" role="banner">
<div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle pull-right" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <i class="ion-ios7-keypad"></i>
      </button>
      <button class="navbar-toggle pull-left" type="button" onclick="$.pageslide({href:'#playlistplayer', modal: true});">
        <i class="ion-play"></i>
      </button>
   <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" class="navbar-brand"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
image/logo.png" /></a>       
    </div>



<div class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

<ul class="nav navbar-nav navbar-left">
<li class="vertical-divider"></li>
<li class="loading _st_load <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  echo 'open active';
  }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"><a href="javascript:;" class="player-toggl<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  echo ' ui-orange';
  }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" style="display: none">
<span class="mini-loader"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
image/preloader.gif" /></span>
<i class="ion-play"></i></a></li>


<li class="search-box search-dialog"><form id="searchform" action="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/buscar">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


$is_action = isset($_REQUEST['do']) && $_REQUEST['do']!='' ? true : false;
if($is_action){
  $action = $_REQUEST['do'];
  $is_show = isset($_REQUEST['view']) ? true : false;
  if($is_show){
    $show = $_REQUEST['view'];
  }
}

if($is_action!=false && $action=="buscar"){
  if($is_show!=false && $show!=""){
    echo '<input name="searchquery" type="text" value="'.$show.'" class="search-box" onfocus="if(this.value==\'Busca mixes, remixes..\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Busca mixes, remixes..\';" id="searchquery" />';
  }else{
    echo '<input name="searchquery" type="text" value="Busca mixes, remixes.." class="search-box" onfocus="if(this.value==\'Busca mixes, remixes..\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Busca mixes, remixes..\';" id="searchquery" />';
  }
}else{
  echo '<input name="searchquery" type="text" value="Busca mixes, remixes.." class="search-box" onfocus="if(this.value==\'Busca mixes, remixes..\')this.value=\'\';" onblur="if(this.value==\'\')this.value=\'Busca mixes, remixes..\';" id="searchquery" />';
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</form></li>
<!-- <li class="visible-sm"><a href="javascript:;" class="search-dialog"><i class="fa fa-search"></i></a></li> -->
</ul>

<ul class="nav navbar-nav navbar-right text-left">
<li class=" hidden-sm"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">inicio</a></li>


<li class="navbar-left"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
">descubre</a></li>


<li class="hidden-sm"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">acerca</a></li>


<?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true")) {?>

<?php if (($_smarty_tpl->tpl_vars['is_moderator']->value=="true")) {?>

<li class="hidden-sm"><a href="<?php echo $_smarty_tpl->tpl_vars['profile_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
"><span class="hidden-sm hidden-md hidden-lg">Mi perfil: </span> <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

global $username;$usershortname = "";
if(strpos($username, ' ')>-1){
  $usershortname = explode(' ', $username);
  $usershortname = $usershortname[0];
}else{
  $usershortname = $username;
}
echo $usershortname;
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>

<li class="vertical-divider"></li>

<?php if (($_smarty_tpl->tpl_vars['is_admin']->value=="true")) {?>
<li class="user-links hidden-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link']->value;?>
" class="tooltip-t" title="Moderaci&oacute;n" data-placement="bottom"><i class="ion-ios7-bell"></i></a></li>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['moderation_link']->value;?>
">Centro de moderacion</a></li>
<?php }?>



<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once 'inc/libs/Mobile_Detect.php';
$detect = new Mobile_Detect;
global $is_user, $action;
$place = isset($_GET["module"]) ? ( $_GET["module"]=="" || $_GET["module"]=="home" ? "index" : $_GET["module"] ) : "index";
if($place=="filemanager" || $detect->isMobile() || $detect->isTablet()){

echo <<<EOD
<li class="navbar-left user-links upload-links hidden-xs filemanager"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager/" class="tooltip-t" title="mis&nbsp;archivos" data-placement="bottom"><i class="ion-folder"></i> archivos</a></li>
EOD;


}else{

echo <<<EOD

<li class="dropdown navbar-left user-links upload-links hidden-xs filemanager"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager/" class="tooltip-t dropdown-toggle " title="mis&nbsp;archivos" data-placement="bottom" data-toggle="dropdown"><i class="ion-folder"></i> archivos</a>
<ul class="dropdown-menu notifications-dropdown filelist filecompact">
<div style="padding: 0px 20px" class="text-muted">Cargando..</div>

<div class="divider"></div>
<li><a href="javascript:;" class="loadmore">cargar mas</a></li>
</ul>

<script type="text/html" id="filetemplate">
<li class="file file-item {{type}}" data-id="{{id}}">
  <a href="{{link}}colecciones/{{link.type}}/{{id}}" class="{{type}}" data-id="{{id}}">
  {{icon}} {{name}}
  </a>
</li>
</script>

</li>

EOD;

}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<li class="dropdown navbar-left user-links hidden-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" class="dropdown-toggle tooltip-t" data-placement="bottom" title="Publicar" data-toggle="dropdown"><i class="ion-more"></i></a>
<ul class="dropdown-menu notifications-dropdown">
  <li class="dropdown-header">Publicar</li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear nueva colecci&oacute;n</a></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
addsong">Subir una cancion</a></li>
  <!-- <li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Subir video</a></li> -->
<!--   <li class="notifications-container" style="display: none">
    <div class="notification-contents">
      <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Somebody posted in your profile</a></li>
      </ul>
    </div>
  </li> -->
<!--   <li class="white_link_dropdown"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Ver todo</a></li> -->
</ul>
</li>


<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear nueva coleccion</a></li>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Subir una cancion</a></li>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Subir video</a></li>

<?php } else { ?>
<li class="vertical-divider"></li>
<?php }?>

<li class="dropdown navbar-left user-links hidden-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" class="dropdown-toggle tooltip-t" data-placement="bottom" title="Configuracion" data-toggle="dropdown"><b class="ion-gear-a"></b></a>
<ul class="dropdown-menu">
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>
  <?php if (($_smarty_tpl->tpl_vars['is_moderator']->value=="true")) {?>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager/">Mis archivos</a></li>
  <?php }?>
  <li class="divider"></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta/editar">Configuracion</a></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta&dump=tempr">Cerrar Sesion</a></li>
</ul>
</li>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager/">Mis archivos</a></li>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta/editar">Configuracion</a></li>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta&dump=tempr">Cerrar Sesion</a></li>
<?php } else { ?>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta">acceder</a></li>
<li class="visible-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta&registrar">crear cuenta</a></li>
<li class="hidden-xs"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta" class="btn btn-default btn-access btn-new-modal">acceder</a>
<ul class="dropdown-menu login-drop">
<div class="col-xs-12">

<form role="form" action="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta" method="post">
<input type="hidden" name="_usr_form_login" value="1" >
<div class="form-group">
  <label class="control-label" for="__n">Nombre de usuario</label>
  <input type="text" class="form-control input-sm" name="_login_n" id="__n" />

  <label class="control-label" for="__pw">Contrase&ntilde;a</label>
  <input type="password" class="form-control input-sm" name="_login_p" id="__pw" />
  <!-- <p><a href="javascript:;" class="forgot-pw">La olvide.</a></p> -->

  <button type="submit" class="btn btn-warning">Acceder</button>
  <span class="clearfix"></span>
</div>


<div class="well well-sm">
<p><small class="text-muted">No tienes una cuenta aun? Es gratis!</small></p>
<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta&registrar">Crea una cuenta</a>
</div>

</form>

</div>
</ul>
</li>
<?php }?>

</ul>
    </div>
  </div>
</div><?php }} ?>
