<?php /* Smarty version Smarty-3.1.18, created on 2014-08-05 04:26:21
         compiled from "inc\dependencies\templates\colecciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24282537ae568844e41-73111217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9fbc467a80c53f186f5023b1d61eb7bd982b474' => 
    array (
      0 => 'inc\\dependencies\\templates\\colecciones.tpl',
      1 => 1407184248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24282537ae568844e41-73111217',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537ae568847377_01699030',
  'variables' => 
  array (
    'is_action' => 0,
    'action' => 0,
    'is_show' => 0,
    'show' => 0,
    'is_user' => 0,
    'link' => 0,
    'collections_link' => 0,
    'collections_link_my_collections' => 0,
    'collections_link_new_collection' => 0,
    'path' => 0,
    'vcategorias' => 0,
    'cid' => 0,
    'curr_id' => 0,
    'is_id' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537ae568847377_01699030')) {function content_537ae568847377_01699030($_smarty_tpl) {?>	<?php if (($_smarty_tpl->tpl_vars['is_action']->value&&$_smarty_tpl->tpl_vars['action']->value=="mycollections")) {?>
		<?php if (($_smarty_tpl->tpl_vars['is_show']->value&&$_smarty_tpl->tpl_vars['show']->value=="create")) {?>


<?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true")) {?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
require_once('inc/dependencies/class/perfil.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias, $link, $is_id, $is_action, $action, $country, $bi_day, $bi_month, $bi_year, $is_ajax;
if(!$is_ajax) showPart::__showHeader("<title>Crear nueva coleccion</title>");
echo '<link rel="stylesheet" href="'.$path.'plugins/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />';

$loadbyid = false;
$loadowner = true;
$sid=0;
$sid=$user_id;
$usera=User::getUserInfo($user_id,true);
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
</a> <small class="hidden-xs">&nbsp; crear colecci&oacute;n</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Crear colecci&oacute;n</a>
<div class="choseoptions"><ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Mis colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager">Archivos</a></li>
	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear colecci&oacute;n</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Lo ultimo</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';

}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!-- 
<div class="__intro _affixer" data-spy="affix" data-offset-top="62" data-offset-bottom="0">
<div class="container"> -->
<!-- <div class="_pager">
<div class="row">
	<div class="_pager_tabs small">
		<ul>
			<li><a href="?module=cuenta">Perfil</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Mis Colecciones</a></li>
			<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear colecci&oacute;n</a></li>

		</ul>
			<span class="clearfix"></span>
	</div>
</div>
</div> -->
<!-- <div class="col-xs-6">
<div id="main" class="main-full profile-container self">
  <div class="profile-head">
    <h1 style="text-align: left">
      <small>crear colecci&oacute;n</small></h1>
</div>
</div>
</div> --> <!-- main-col -->

<!-- <div class="chose col-sm-4 col-xs-6 pull-right">
<a href="" class="curchoice">Crear colecci&oacute;n</a>
<div class="choseoptions"><ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Mis colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager">Archivos</a></li>
	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear colecci&oacute;n</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Lo ultimo</a></li>
</ul></div>
</div>
<span class="clearfix"></span>
</div>
</div>
<div class="_affixer_clone"></div> -->

<div class="container _p_t">
<h1><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Colecciones</a> <span>Nueva coleccion</span></h1>
</div>


<div class="container _p">


<div class="text-left _mB">
<h2>Crear nueva colecci&oacute;n</h2>
</div>
<form class="_collection_create" enctype="multipart/form-data" method="POST" >
<input type="hidden" name="_frm_collection" id="_frm_collection" value="1" />

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


require_once('inc/class.php');
if(isset($_REQUEST['_frm_collection'])){
$num = $_POST['song_count'];

echo '<div class="alert alert-warning alert-dismissable __s_alert_g"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<div class="alert-content">
		<ol>';
if($num>0 && isset($_POST['_cover']) && $_POST['_cover']!=""){

$title = $_POST['_title'];
$cover = $_POST['_cover'];
$category = $_POST['cat'];
$songs = array();
$songs_id = array();
for($i=0; $i<$num; $i++){
	$songs[$i] = array(
		"tmp_name"=> $_POST['song_'.$i.'_tmpname'],
		"name"=> $_POST['song_'.$i.'_name'],
		"status"=> $_POST['song_'.$i.'_status'],
		"id"=> $_POST['song_'.$i.'_post_id']
	);

	$songs_id[$i]=$_POST['song_'.$i.'_post_id'];
}

$songs_id_im = implode(',',$songs_id);

Collections::insert($title, $cover, $songs, $songs_id, $songs_id_im, $category);


}else{
echo '<li>Tu coleccio&oacute;n no tiene tracks? Debe contener almenos 1 canci&oacute;n!</li>';
echo '<li>Asegurate de que has elejido una imagen de portada.</li>';
}

echo '</ol></div></div>';


}else{
echo '<div class="alert alert-info alert-dismissable __s_alert_g" style="display: none"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<div class="alert-content">
		Completa el formulario y crea tu colecc&oacute;n
	</div>
</div>';
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<div class="row">
<div class="col-sm-6">


<div class="col-sm-12">
<div class="form-group">
	<label class="control-label" for="_title">Nombre de la colecci&oacute;n</label>
	<input type="text" class="form-control" id="_title" name="_title" value="Sin t&iacute;tulo" />
	</div>

<span class="clearfix"></span>
</div>
<span class="clearfix"></span>
<br />


<span class="clearfix"></span>
<br />

<div class="_cover_ch">
<div class="col-sm-12 _v_a text-center">
<div class="_v_a_c">
<h4 class="_cover_change">Elige una imagen de portada</h4>

<div id="cover_upload">
<div class="__file_controls _choose">
<a href="javascript:;" class="btn btn-primary" id="pickfiles">Selecciona un archivo</a>
</div>

<div class="progress_handler">
	<div class="progress_bg">
		<div class="progress_percent"></div>
	</div>
</div>

</div>


</div>
</div>
<div class="col-sm-12 _cover_ _v_a text-center">
<img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
image/0_.png" class="img-rounded" />
<input type="hidden" name="_cover" id="_cover_value" />
</div>

<span class="clearfix"></span>

</div>

<br /><br />


<div class="form-group">
<label class="control-label" for="cat">Categoria:</label>
<select id="cat" name="cat" class="form-control">
<?php  $_smarty_tpl->tpl_vars['curr_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curr_id']->_loop = false;
 $_smarty_tpl->tpl_vars['cid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vcategorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curr_id']->key => $_smarty_tpl->tpl_vars['curr_id']->value) {
$_smarty_tpl->tpl_vars['curr_id']->_loop = true;
 $_smarty_tpl->tpl_vars['cid']->value = $_smarty_tpl->tpl_vars['curr_id']->key;
?>
  <option value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
</option>
<?php } ?>
</select>
</div>



<span class="clearfix"></span>
</div>


<div class="col-sm-6">

<div class="_song-list">

<h3>Agrega tracks a la colecci&oacute;n</h3>

<div class="alert alert-warning alert-dismissable __s_alert" style="display: none"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<div class="alert-content">
		<ol></ol>
	</div>
</div>

<div class="html5_uploader" id="song"></div>
</div>

</div>

<span class="clearfix"></span>

<div class="col-sm-12">
<button class="btn btn-success" type="submit">Guardar colecci&oacute;n</button>
</div>

<span class="clearfix"></span>

<div class="addSpace"></div>
</div>

</form>

</div>











<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ("denied.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

			

			<?php } else { ?>
			



<?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true")) {?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
require_once('inc/dependencies/class/perfil.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias, $link, $is_id, $is_action, $action, $country, $bi_day, $bi_month, $bi_year, $is_ajax;
if(!$is_ajax) showPart::__showHeader("<title>Mis colecciones</title>");
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
</a> <small class="hidden-xs">&nbsp; colecciones</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Mis colecciones</a>
<div class="choseoptions"><ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>
	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Mis colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager">Archivos</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear colecci&oacute;n</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Lo ultimo</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';

}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<div class="container _p_t">
<h1><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Colecciones</a> <span>Mis colecciones</span></h1>
</div>

<div class="container">

<div class="_collections_l" style="padding: 0px; margin: 0px;">

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $link, $categorias;
$limit = 8;
$collections = Collections::getcollections($user_id,0,$limit);



for($i=0;$i<count($collections);$i++){
echo '<div class="col-xs-6 col-md-3 __feature_oi __content_collection"><div class="col-xs-12"><div class="__feature_oi_cover"><div class="__feature_oi_info"><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'"><div class="__b_a" style="border-bottom: 1px solid #FCECEC;">'.$collections[$i]['name'].'<br /><small>'.$categorias[$collections[$i]['category']].'</small></div></a><div style="margin: 7px; text-align: left"><a href="'.$link.'colecciones/editar/coleccion-'.$collections[$i]['id'].'" class="btn btn-default btn-xs">EDITAR</a>&nbsp;<a href="'.$link.'colecciones/eliminar/coleccion-'.$collections[$i]['id'].'" class="btn btn-cancel btn-xs pull-right">&times;</a></div><span class="clearfix"></span></div></div></div></div>';
}



echo '</div><span class="clearfix"></span>';


if(count($collections)>($limit-1)){

echo '<span class="clearfix"></span><div class="collection_more text-center"><a href="javascript:;" class="btn btn-primary" data-limit="'.$limit.'" data-user="'.$user_id.'">Cargar mas</a></div>';

}



<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<br /><br />
<span class="clearfix"></span>
</div>


<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ("denied.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
		

<?php }?>



<?php } elseif (($_smarty_tpl->tpl_vars['is_action']->value&&$_smarty_tpl->tpl_vars['action']->value=="editar"&&$_smarty_tpl->tpl_vars['is_id']->value&&$_smarty_tpl->tpl_vars['id']->value!=null)) {?>





<?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true")) {?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
require_once('inc/dependencies/class/perfil.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias, $link, $is_id, $is_action, $action, $country, $bi_day, $bi_month, $bi_year, $is_ajax;
if(!$is_ajax) showPart::__showHeader("<title>Editar</title>");
$loadbyid = false;
$loadowner = true;
$sid=0;

$sid=$user_id;
$usera=User::getUserInfo($user_id,true);


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
</a> <small class="hidden-xs">&nbsp; colecciones</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Editar</a>
<div class="choseoptions"><ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Mis colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager">Archivos</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear colecci&oacute;n</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Lo ultimo</a></li>
	<li class="active"><a href="">Editar</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';

}


echo '
<div class="container _p_t">
<h1><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Colecciones</a> <span>Editar</span></h1>
</div>

<div class="container">';

global $id, $is_id;

if($is_id && strpos($id, 'coleccion')>-1){


if(isset($_POST['confirm']) && $_POST['confirm']==true){
//print_r($_POST);
$data=array(
	'collection_name'=> $_POST['_title'],
	'collection_category'=> $_POST['cat'],
	'collection_cover_id'=> $_POST['_cover']
);
$uc=Collections::updateItem($id, $data, true);
if($uc!=false){
	echo '<div class=""><span rel="notify" data-notification-message="Cambios realizados exitosamente!" data-notification-attributes="true">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/coleccion/'.str_replace('coleccion-', '', $id).'" class="btn btn-default">volver</a>
		</span></div><span class="clearfix"></span>';
}else{
	echo '<span style="display: none;" rel="notify" data-notification-message="No se pudieron guardar los cambios."></span>';
}
}


$id = str_replace('coleccion-', '', $id);




$c=Collections::fetch($id);
if($c!=false && ($c['user_id']==$user_id || $is_moderator!=false)){




echo '

<div class="container _p">
<form class="_collection_create" enctype="multipart/form-data" method="POST" autocomplete="off">
<input type="hidden" name="_frm_collection" id="_frm_collection" value="1">

<div class="row">
<div class="col-sm-6">

<div class="form-group">
	<label class="control-label" for="_title">&nbsp;</label>
	<input type="text" class="form-control" id="_title" name="_title" value="'.$c['name'].'">
</div>



<span class="clearfix"></span>
<br>

<div class="_cover_ch backstretch_image" data-image="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
usercontent/media/'.$c['user_id'].'/small_'.$c['cover_url'].'">
<div class="col-sm-12 _v_a text-center">
<div class="_v_a_c">

<div id="cover_upload" style="position: relative;">
<div class="__file_controls _choose">
<a href="javascript:;" class="btn btn-primary" id="pickfiles" style="z-index: 1;">Cambiar</a>
</div>

<div class="progress_handler">
	<div class="progress_bg">
		<div class="progress_percent"></div>
	</div>
</div>


</div>


</div>
</div>
<div class="col-sm-12 _cover_ _v_a text-center">
<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
usercontent/media/'.$c['user_id'].'/small_'.$c['cover_url'].'" style="opacity: 0.1; filter: alpha(opacity=10)" class="img-rounded">
<input type="hidden" name="_cover" id="_cover_value" value="'.$c['cover_id'].'">
<input type="hidden" name="_cover_name" id="_cover_name_value" value="'.$c['cover_url'].'">
</div>

<span class="clearfix"></span>

</div>

<br><br>


<div class="form-group">
<select id="cat" name="cat" class="form-control">';
for($i=0; $i<count($categorias); $i++){
echo '<option value="'.$i.'" '.($i==$c['category']?'selected="selected"':'').'>'.$categorias[$i].'</option>';
}
echo '</select>
</div>



<span class="clearfix"></span>
</div>


<div class="col-sm-6">

<div class="_song-list">


<div class="_collection_list__ collection_songs collection_edition" data-id="'.$id.'" style="display: block; margin: 0px; border: none; box-shadow: none">
<div id="collection_1" class="_hidden_information">
<input type="hidden" id="collection_count" name="collection_count" value="12">
</div>
<h3 class="text-muted text-center">Tracks: <span class="numb_representer '.($c['numb']==12?"text-danger":'').'">'.$c['numb'].'</span></h3>
<ul>

</ul>
<span class="clearfix"></span>
</div>


</div>

</div>

<span class="clearfix"></span>

<div class="col-sm-12" style="margin-top: 40px">
<input type="hidden" name="confirm" value="true" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
<button class="btn btn-primary" type="submit">Guardar cambios</button>
<div class="btn btn-group pull-right">
<a class="btn btn-secondary" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/eliminar/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><i class="ion-trash-b"></i></a>
<a class="btn btn-cancel" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/coleccion/'.$id.'">Cancelar</a>
</div>
</div>

<span class="clearfix"></span>

<div class="addSpace"></div>
</div>

</form>

</div>';






}else{
echo '
<h2>Redireccionando...</h2>
<script>setTimeout(function(){window.location.href=\'<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones\';},500);</script>
';
}























} else if($is_id && strpos($id, 'cancion')>-1){


$id = str_replace('cancion-', '', $id);
if(isset($_POST['confirm']) && $_POST['confirm']==true){

$data=array(
	'post_title'=> $_POST['songname'] . '.mp3',
	'post_category_id'=> $_POST['categoria']
);
$uc=Collections::updateItem($id, $data, false);
if($uc!=false){
	echo '<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3"><span rel="notify" data-notification-message="Cambios realizados exitosamente!" data-notification-attributes="true">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/song/'.$id.'" class="btn btn-default">volver</a>
		</span></div><span class="clearfix"></span>';
}else{
	echo '<span style="display: none;" rel="notify" data-notification-message="No se pudieron guardar los cambios."></span>';
}

}

//sleep(500);
$c=Collections::fetchSongInfo($id);
if($c!=false && ($c['user_id']==$user_id || $is_moderator!=false)){

$temp = explode(".", $c['filename']);
$extension = strtolower(end($temp));
$filename = str_replace('.'.$extension, '', $c['filename']);

echo '<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 _p">
<div class="col-sm-12 _mTb">
<h3>Editar canci&oacute;n</h3>
<form method="POST">
<div class="form-group">
<input type="text" name="songname" id="songname" value="'.$filename.'" class="form-control" />
</div>

<div class="form-group">
<select id="categoria" name="categoria" class="form-control">';
for($i=0; $i<count($categorias); $i++){
echo '<option value="'.$i.'" '.($i==$c['category']?'selected="selected"':'').'>'.$categorias[$i].'</option>';
}
echo '
</select>
</div>
';

if($c['collection']!=""){
echo '<div class="form-group">
<h3 class="_nM_nP"><i class="ion-folder tooltip-t" title="Colecci&oacute;n: '.$c['collection'].'"></i> '.$c['collection'].' <span><a href="javascript:;" class="btn btn-default openaction" data-action="changecollection" data-id="'.$id.'" data-par="'.$c['collection_id'].'">Cambiar</a></span></h3>
</div>';
}

echo '<div class="form-group">
<input type="hidden" name="confirm" value="true" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
<button type="submit" class="btn btn-primary">Guardar</button>
<div class="btn-group pull-right">
<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/eliminar/cancion-'.$id.'" class="btn btn-secondary"><i class="ion-trash-b"></i></a>
<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/song/'.$id.'" class="btn btn-cancel">Cancelar</a>
</div>
</div>
</form>
</div>
</div>';

}else{
echo '
<h2>Redireccionando...</h2>
<script>setTimeout(function(){window.location.href=\'<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones\';},500);</script>
';
}


}


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>


<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ("denied.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>













<?php } elseif (($_smarty_tpl->tpl_vars['is_action']->value&&$_smarty_tpl->tpl_vars['action']->value=="eliminar"&&$_smarty_tpl->tpl_vars['is_id']->value&&$_smarty_tpl->tpl_vars['id']->value!=null)) {?>





<?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true")) {?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
require_once('inc/dependencies/class/perfil.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias, $link, $is_id, $is_action, $action, $country, $bi_day, $bi_month, $bi_year, $is_ajax, $is_moderator;
if(!$is_ajax) showPart::__showHeader("<title>Editar</title>");
$loadbyid = false;
$loadowner = true;
$sid=0;

$sid=$user_id;
$usera=User::getUserInfo($user_id,true);


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
</a> <small class="hidden-xs">&nbsp; colecciones</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Editar</a>
<div class="choseoptions"><ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Mis colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager">Archivos</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear colecci&oacute;n</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Lo ultimo</a></li>
	<li class="active"><a href="">Editar</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';

}

echo '
<div class="container _p_t">
<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
<h1><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Colecciones</a> <span>Eliminar</span></h1>
</div>
</div>

<div class="container"> ';

if($is_id && strpos($id, 'coleccion')>-1){

$id = str_replace('coleccion-', '', $id);
if(isset($_POST['confirm']) && $_POST['confirm']==true){
	Collections::removeItem($id, true);
}
$c=Collections::fetch($id);
if($c!=false && ($c['user_id']==$user_id || $is_moderator!=false)){
echo '<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 _p">
<div class="col-sm-12 _mTb">
<h3>Estas seguro de realizar esta acci&oacute;n?</h3>
<p class="text-danger">Al eliminar una colecci&oacute;n o archivo de m&uacute;sica no se puede revertir la acci&oacute;n.</p>
<div class="form-group">
<form method="POST">
<input type="hidden" name="confirm" value="true" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
<button type="submit" class="btn btn-danger">Continuar</button>
<a href="javascript:window.history.go(-1);" class="btn btn-cancel pull-right">Cancelar</a>
</form>
</div>
</div>
</div>';

}else{
echo '
<h2>Redireccionando...</h2>
<script>setTimeout(function(){window.location.href=\'<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones\';},500);</script>
';
}

} else if($is_id && strpos($id, 'cancion')>-1){


$id = str_replace('cancion-', '', $id);
if(isset($_POST['confirm']) && $_POST['confirm']==true){
	Collections::removeItem($id, false);
}
$c=Collections::fetchSongInfo($id);
if($c!=false && ($c['user_id']==$user_id || $is_moderator!=false)){
echo '<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 _p">
<div class="col-sm-12 _mTb">
<h3>Estas seguro de realizar esta acci&oacute;n?</h3>
<p class="text-danger">Al eliminar una colecci&oacute;n o archivo de m&uacute;sica no se puede revertir la acci&oacute;n.</p>
<div class="form-group">
<form method="POST">
<input type="hidden" name="confirm" value="true" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
<button type="submit" class="btn btn-danger">Continuar</button>
<a href="javascript:window.history.go(-1);" class="btn btn-cancel pull-right">Cancelar</a>
</form>
</div>
</div>
</div>';

}else{
echo '
<h2>Redireccionando...</h2>
<script>setTimeout(function(){window.location.href=\'<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones\';},500);</script>
';
}



}


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>


<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ("denied.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>












<?php } elseif (($_smarty_tpl->tpl_vars['is_action']->value&&$_smarty_tpl->tpl_vars['action']->value=="song"&&$_smarty_tpl->tpl_vars['is_id']->value&&$_smarty_tpl->tpl_vars['id']->value!=null)) {?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
global $path, $link, $user, $user_id, $collections_link, $collections_link_id, $id, $is_moderator, $is_user, $profile_link, $categorias, $is_ajax;
$song = Collections::fetchSongInfo($id);

if($song!=false){

$temp = explode(".", $song["filename"]);
$extension  = ".".strtolower(end($temp));
$song_name = str_replace($extension, "", $song["filename"]);

$categoria = $categorias[$song["category"]];

$size = $song['filesize'] / 1024;
if($size>1000){
	$size = $size / 1024;
	$size = round($size, 2) . "mb";
}else{
	$size = round($size, 2) . "kb";
}

$downloads = $song["downloads"];
$plays = $song["plays"];

if($downloads==null) $downloads = 0;
if($plays==null) $plays = 0;

$downloads = DB::counterStyle($downloads);
$plays = DB::counterStyle($plays);


$duration = '0:00';
if($song["audioinfo"]!=null){
	$song["audioinfo"] = json_decode($song["audioinfo"], true);
	$duration = $song["audioinfo"]["Length_mmss"];
}

if(!$is_ajax) showPart::__showHeader("<title>$song_name</title>");


if($song["collection_id"]!=null && $song["collection"]!=null){

$categoryb = $song["category"];
switch ($categoryb){
	case '0':
		$categoryb = 'sincategoria';
		break;
	case '1':
		$categoryb = 'mixes';
		break;
	case '2':
		$categoryb = 'remixes';
		break;
	case '3':
		$categoryb = 'edicion';
		break;

}
echo '<div class="song_view_songs_list_">
<div class="_wbg">
<div class="container">
<div class="row">
<a href="'.$collections_link.$collections_link_id.$song['collection_id'].'/" class="toggle_list_collection" data-collection="'.$song['collection_id'].'" data-status="notfired"><div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 song__ c_info__"><div class="_wr"><span class="pull-left"><img src="'.$path.'image/0_.png"></span><b class="caret"></b> Colecci&oacute;n <br />by <strong>'.$song["user_username"].'</strong></div></div></a><div class="col-xs-6 col-sm-9 col-md-9 col-lg-10 song__ song__inf"><div class="_wr"><div class="pull-right"><a class="btn btn-primary tooltip-t" title="Compartir" data-placement="bottom" href="#share"><i class="fa fa-share"></i></a></div><h4>'.$song_name.'</h4><a href="'.$collections_link.$collections_link_id.$song['collection_id'].'/" class="collection_s text-muted">Colecci&oacute;n</a> &middot; <a href="'.$collections_link.'#view/'.$categoryb.'" class="text-muted">'.$categoria.'</a> &middot; <a href="'.$link.'@'.$song["user_username"].'" class="text-muted">'.$song["user_fullname"].'</a></div></div></div></div></div><span class="clearfix"></span><div class="_song_view_collection_list"><div class="__song__list"><ul class="__scrollable_wx"><div class="items-ul" style="width: 100%; min-height: 40px"><img src="'.$path.'image/preloader_small_inverse.gif" style="margin: 24px auto; display: block;" /></div><span class="clearfix"></span></ul></div><div class="col-sm-1 hidden-xs hidden-sm hidden-md hidden-lg"><div class="__song__list_img"><img src="'.$path.'image/0_.png"></div></div></div></div>';
}

$collection = $song["collection_id"]!=null ? $song["collection_id"] : "__?";
echo '<span class="clearfix"></span><div class="song_view_song_info">
<div class="container">
<div class="row">



<div class="col-sm-8 col-sm-offset-2 __song_info__">
<a href="javascript:;" class="pull-left play_ play_song_in" data-collection="'.$collection.'" data-duration="'.$duration.'" data-song-id="'.$id.'" data-song-name="'.$song_name.'.mp3" data-file="'.$song['file'].'" data-user-name="'.$song['user_username'].'" data-user-id="'.$song['folder_id'].'">
<i class="ion-play"></i>
<i class="ion-pause"></i>
</a>

<h2><span>'.$song_name.'</span>.mp3</h2>
<h4>Por <a href="'.$link.'@'.$song["user_username"].'">'.$song['user_fullname'].'</a></h4>
<h4><!-- <span class="tooltip-t" title="Reproducciones"><i class="ion-headphone"></i> '.$plays.'</span> &nbsp; --> 
<span class="tooltip-t duraton_mmss" title="Duraci&oacute;n"><i class="ion-ios7-clock-outline"></i> '.$duration.'m</span> &nbsp; 
<span class="tooltip-t downloads-number" title="Descargas"><i class="ion-ios7-cloud-download-outline"></i> '.$downloads.'</span> &nbsp; 
<span class="tooltip-t" title="Tama&ntilde;o"><i class="ion-ios7-box-outline"></i> '.$size.'</span></h4>

</div>



<span class="clearfix"></span>
</div>
</div>
</div>


<div class="_song_view_pager">
<div class="container">
<div class="_pager">
<div class="row">
	<div class="_pager_tabs small _layer_toggle">
		<ul>
			<li class="active"><a href="#">Actividad</a></li>
			<li><a href="#">Relacionadas</a></li>

		</ul>
			<span class="clearfix"></span>
	</div>
</div>
</div>
</div>
</div>


<div class="share_options" id="share">
<div class="container">
<div class="row">
<div class="col-sm-6 text-xs-center">
<div class="form-group">
<label class="control-label">Comparte este contenido</label>
<div class="col-xs-12">
<!-- share buttons -->
<span class="st_sharethis_large" displayText="ShareThis"></span>
<span class="st_facebook_large" displayText="Facebook"></span>
<span class="st_twitter_large" displayText="Tweet"></span>
<span class="st_myspace_large" displayText="MySpace"></span>
<span class="st_googleplus_large" displayText="Google +"></span>
<!-- share buttons -->
</div>
</div>
</div>

<div class="col-sm-6 text-right text-xs-center">
<div class="form-group">
';

if($is_user!=false && ($user_id==$song['user_id'] || $is_moderator!=false)){

echo '

<label class="control-label">&nbsp;</label>
<div class="btn-group">
  <div class="btn-group text-left">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Escuchar <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
		<li><a href="javascript:;" onclick="$(\'.play_song_in\').trigger(\'click\')"><span><i class="ion-play"></i> Escuchar</span></a></li>
		<?php if (($_smarty_tpl->tpl_vars['is_user']->value!="false")) {?>
		<li><a href="javascript:;" data-download="'.$path.'../dl.php?song&view='.$id.'" class="download"><span><i class="fa fa-cloud-download"></i> Descargar</span></a></li>
		<?php }?>
    </ul>
    </div>

  <div class="btn-group text-left">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Acciones <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/editar/cancion-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Editar</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/eliminar/cancion-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Eliminar</a></li>
    </ul>
    </div>



</div>



';


}else{


echo '<label class="control-label">&nbsp;</label>
<div class="col-xs-12">
<a href="javascript:;" class="btn btn-success" onclick="$(\'.collection_songs li .play_song_in\').trigger(\'click\')"><span><i class="ion-play"></i> Escuchar</span></a>
<?php if (($_smarty_tpl->tpl_vars['is_user']->value!="false")) {?>
&nbsp;<a href="javascript:;" data-download="'.$path.'../dl.php?collection&view='.$id.'" class="btn btn-success download"><span><i class="fa fa-cloud-download"></i> Descargar</span></a>
<?php }?>';


}

echo '</div>
</div>

</div>

</div>
</div>
</div>

<div class="_wbg ptb" style="background: none">
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-4 pull-right text-xs-center">
<div class="user_info">
<a href="javascript:;"><div class="preview_picture"><img src="' .$song['profile_picture'].'" /></div>
<h2>'.$song['user_fullname'].'</h2></a>
</div>
<span class="clearfix"></span>
</div>

<div class="col-sm-8 col-xs-12">
<div class="_layer active">
<h3 class="visible-xs text-muted text-center">Comentarios</h3>';

if($is_user!="false"){
echo '<div class="_comment_box"><div class="_comment_text_wrapp">
	<textarea id="_comment_text" class="_comment_text form-control" name="_comment_text form-control" onfocus="$(\'._comment_box_submit\').css({visibility:\'visible\',height:\'inherit\'});if(this.value==\'Que piensas de '.$song_name.'?\')this.value=\'\'">Que piensas de '.$song_name.'?</textarea></div><div class="col-xs-12"><div class="text-right">
	<a href="javascrip:;" class="btn btn-success _comment_box_submit">Comentar</a></div></div><span class="clearfix"></span><div class="_comment_box_hidden"><input type="hidden" value="'.$user_id.'" /><input type="hidden" value="'.$id.'" /><input type="hidden" value="1" /></div></div>';
}

echo '<span class="clearfix"></span><div class="activity_feed" data-from="song-id::<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
,data-load::activityfeed">
<div style="max-width:40%; margin: 50px auto; text-align: center; color: #B1B1B1;">
cargando...<br />
<div class="progress progress-striped active">
  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
  </div>
</div>
</div>
</div>

<span class="clearfix"></span>
</div>

<div class="_layer">
<div class="fetch_collections"></div>
</div>
</div>


<span class="clearfix"></span>

</div>
</div>
</div>';


}else{
include('inc/dependencies/templates/notfound.tpl');
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>




<?php } elseif (($_smarty_tpl->tpl_vars['is_action']->value&&$_smarty_tpl->tpl_vars['action']->value=="coleccion"&&$_smarty_tpl->tpl_vars['is_id']->value&&$_smarty_tpl->tpl_vars['id']->value!=null)) {?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
global $path, $link, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $is_ajax;
$collection = Collections::fetch($id);



if($collection!=false){


$add_to_list = "";
if($is_user == "true"){
$add_to_list = '';
}

$published = date('d\.m\.Y', strtotime($collection['published']));


if(!$is_ajax) showPart::__showHeader("<title>".$collection['name']."</title>");

$downloads = $collection["downloads"];

if($downloads==null) $downloads = 0;
$downloads = DB::counterStyle($downloads);


echo '<div class="jumbotron new-account _nPB _col_np _collection_view">
<div class="_col_cover_big" data-image="';

if (file_exists(dirname(__FILE__).'..\\..\\..\\usercontent\\media\\'.$collection['user_id'].'\\max_'.$collection["cover_url"])) {
    echo $link . 'usercontent/media/'.$collection['user_id'].'/max_'.$collection["cover_url"];
} else if (file_exists(dirname(__FILE__).'..\\..\\..\\usercontent\\media\\'.$collection['user_id'].'\\medium_'.$collection["cover_url"])) {
	echo $link . 'usercontent/media/'.$collection['user_id'].'/medium_'.$collection["cover_url"];
}else{
	echo $link . 'usercontent/media/'.$collection['user_id'].'/small_'.$collection["cover_url"];
}

echo '">
	<div class="_col_cover_info">
		<div class="container">
			<div class="col-xs-12">
			<div class="text-center col_b">
				
				
			</div>
			<div class="text-left">
			<span class="pull-left">
				<img src="' . $path . '../usercontent/media/'.$collection['user_id'].'/thumb_'.$collection["cover_url"].'" class="_thumb_cover" />
			</span>
				<h1 class="title_col c_t">'.$collection["name"].'</h1>
				<h4 class="sbtitle_col c_t">Por <a href="'.$link.'@'.$collection["username"].'" class="tooltip-t" title="'.$collection["fullname"].'">'.$collection["fullname"].' ('.$collection["username"].')</a></h4>
				<h4 class="sbtitle_col c_t">
				<span class="tooltip-t" title="Numero de canciones"><i class="ion-music-note"></i> '.$collection["numb"].'</span> 
				&nbsp; <span class="tooltip-t downloads-number" title="Descargas"><i class="ion-ios7-cloud-download-outline"></i> '.$downloads.'</span>
				&nbsp; <span class="tooltip-t" title="Fecha de publicacion"><i class="ion-calendar"></i> '.$published.'</span>
				</h4>

<div class="_pager _layer_toggle">
<div class="row hidden-xs">
	<div class="_pager_tabs small">
		<ul>
			<li class="active"><a href="#">Canciones</a></li>
			<li><a href="#">Relacionadas</a></li>
			<li><a href="#">Actividad</a></li>

		</ul>
			<span class="clearfix"></span>
	</div>
</div>
</div>

			</div>
			</div>
		</div>

</div>

</div>
</div>

<div class="share_options" id="share">
<div class="container">
<div class="row">
<div class="col-sm-6 text-xs-center">
<div class="form-group">
<label class="control-label">Comparte esta colecci&oacute;n</label>
<div class="col-xs-12">
<!-- share buttons -->
<span class="st_sharethis_large" displayText="ShareThis"></span>
<span class="st_facebook_large" displayText="Facebook"></span>
<span class="st_twitter_large" displayText="Tweet"></span>
<span class="st_myspace_large" displayText="MySpace"></span>
<span class="st_googleplus_large" displayText="Google +"></span>
<!-- share buttons -->
</div>
</div>
</div>

<div class="col-sm-6 text-right text-xs-center">
<div class="form-group">';

if($is_user!=false && ($user_id==$collection['user_id'] || $is_moderator!=false)){

echo '

<label class="control-label">&nbsp;</label>
<div class="btn-group">
  <div class="btn-group text-left">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Escuchar <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
		<li><a href="javascript:;" onclick="$(\'.collection_songs li .play_song_in\').trigger(\'click\')"><span><i class="ion-play"></i> Escuchar</span></a></li>
		<?php if (($_smarty_tpl->tpl_vars['is_user']->value!="false")) {?>
		<li><a href="javascript:;" data-download="'.$path.'../dl.php?collection&view='.$id.'" class="download"><span><i class="fa fa-cloud-download"></i> Descargar</span></a></li>
		<?php }?>
    </ul>
    </div>

  <div class="btn-group text-left">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
      Acciones <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/editar/coleccion-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Editar</a></li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/eliminar/coleccion-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Eliminar</a></li>
    </ul>
    </div>



</div>



';


}else{


echo '<label class="control-label">&nbsp;</label>
<div class="col-xs-12">
<a href="javascript:;" class="btn btn-success" onclick="$(\'.collection_songs li .play_song_in\').trigger(\'click\')"><span><i class="ion-play"></i> Escuchar</span></a>
<?php if (($_smarty_tpl->tpl_vars['is_user']->value!="false")) {?>
&nbsp;<a href="javascript:;" data-download="'.$path.'../dl.php?collection&view='.$id.'" class="btn btn-success download"><span><i class="fa fa-cloud-download"></i> Descargar</span></a>
<?php }?>';


}

echo '</div>
</div>

<span class="clearfix"></span>
</div>

</div>
</div>
</div>

<div class="_wB" style="background: none">
<div class="container">
<div class="row">

<div class="col-xs-12 col-sm-4 pull-right text-xs-center">
<div class="user_info">
<a href="'.$link.'@'.$collection['username'].'"><div class="preview_picture"><img src="' .$collection['profile_picture'].'" /></div>
<h2>'.$collection['fullname'].'</h2></a>
</div>
<span class="clearfix"></span>
</div>

<div class="col-xs-12 col-sm-8">

<div class="_layer active">
<div class="_collection_list__ collection_songs" style="display: block">';

$songs_ = Collections::fetchSongs($id, true);
$songs = json_decode($songs_, true);
$count = count($songs);
$collection_songs = htmlentities($songs_);
$admin_opt_="";

if($is_moderator!=false){
$admin_opt_='<a href="javascript:;" class="btn btn-default btn-xs tooltip-t" title="Editar (s&oacute;lo moderadores)"><i class="fa fa-edit"></i></a>&nbsp;';
}

echo '<div id="collection_'.$id.'" class="_hidden_information"><input type="hidden" id="collection_id" name="collection_id" value="'.$id.'"><input type="hidden" id="collection_count" name="collection_count" value="'.$count.'"><input type="hidden" id="collection_songs" name="collection_songs" value="'.$collection_songs.'"></div>';


echo '<h3 class="text-muted text-center">'.$count.' Canciones</h3><ul>';

$song_name = array();$temp=array();$extension=array();
for($i=1; $i <= count($songs); $i++){

$a=$i-1;

$duration = '0:00';
if($songs[$a]["audioinfo"]!=null){
	$songs[$a]["audioinfo"] = json_decode($songs[$a]["audioinfo"], true);
	$duration = isset($songs[$a]["audioinfo"]["Length_mmss"]) ? $songs[$a]["audioinfo"]["Length_mmss"] : "0:00";
}


$temp[$a] = explode(".", $songs[$a]["filename"]);
$extension[$a]  = ".".strtolower(end($temp[$a]));
$song_name[$a] = str_replace($extension[$a], "", $songs[$a]["filename"]);
echo '<li class="mod_'.$is_moderator.'"><div class="container_in_song"><span class="pull-left song_n"><i class="ion-volume-medium play_btn pull-left play_song_in" data-song-id="'.$songs[$a]["id"].'" data-collection="'.$id.'" data-song-name="'.$songs[$a]["filename"].'" data-user-id="'.$collection["user_id"].'" data-user-name="'.$songs[$a]["user_fullname"].'" data-file="'.$songs[$a]["file"].'" data-duration="'.$duration.'" data-placement="left"></i> <i class="song_n_n">'.$i.'</i> </span><a href="'.$collections_link.$collections_song_link_id.$songs[$a]["id"].'/" class="_song_name" title="'.$songs[$a]["filename"].'">'.$song_name[$a].' <span class="text-muted pull-right"><i class="ion-ios7-clock-outline"></i> '.$duration.'</span> </a> <span class="clearfix"></span></div></li>';

}



echo '</ul>
<span class="clearfix"></span>
</div>
<span class="clearfix"></span>
</div>

<div class="fetch_collections _layer"></div>

<div class="_layer"><h3 class="visible-xs text-muted text-center">Comentarios</h3>';


if($is_user!="false"){
	echo '<div class="_comment_box"><div class="_comment_text_wrapp">
	<textarea id="_comment_text" class="_comment_text form-control" name="_comment_text form-control" onfocus="$(\'._comment_box_submit\').css({visibility:\'visible\',height:\'inherit\'});if(this.value==\'Que piensas de '.$collection["name"].'?\')this.value=\'\'">Que piensas de '.$collection["name"].'?</textarea></div><div class="col-xs-12"><div class="text-right">
	<a href="javascrip:;" class="btn btn-success _comment_box_submit">Comentar</a></div></div><span class="clearfix"></span><div class="_comment_box_hidden"><input type="hidden" value="'.$user_id.'" /><input type="hidden" value="'.$collection["id"].'" /><input type="hidden" value="0" /><input type="hidden" value="'.$collection["name"].'" /></div></div>';
}

echo '<span class="clearfix"></span><div class="activity_feed" data-from="collection-id::'.$id.',data-load::activityfeed">
<div style="max-width:40%; margin: 50px auto; text-align: center; color: #B1B1B1;">
cargando...<br />
<div class="progress progress-striped active">
  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
  </div>
</div>
</div>
</div>

<span class="clearfix"></span>
</div>
</div>


<span class="clearfix"></span>
</div>';


}else{
include('inc/dependencies/templates/notfound.tpl');
}






<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>





	<?php } else { ?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
global $is_ajax, $path, $is_action, $action;
if(!$is_ajax) showPart::__showHeader("<title>Descubre</title>");
global $action, $is_action;
$is_action = isset($_REQUEST['do']) && $_REQUEST['do']!="" ? "true" : "false";
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<?php if (($_smarty_tpl->tpl_vars['is_action']->value!="false")) {?>
<div class="_big_cover">
<div id="carousel-image-and-text" class="touchcarousel grey-blue">       
<ul class="touchcarousel-container">

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user;

$collections = Collections::getcollections('all',0,12);
if($collections!=false){
if(count($collections)>12){
$limit = 12;
}else{
$limit = count($collections);
}


for($i=0;$i<$limit;$i++){
$published = DB::timeConverter($collections[$i]['published']);
echo '<li class="touchcarousel-item">
<a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'/" class="item-block">
<img src="'.$path.'../usercontent/media/'.$collections[$i]['user_id'].'/small_'.$collections[$i]['cover_url'].'" width="300" height="230" />
<h4>'.$collections[$i]['name'].'</h4>
<p><i class="ion-music-note"></i> '.$collections[$i]["numb"].' &nbsp; <i class="ion-calendar"></i> <span title="'.$collections[$i]['published'].'" class="date_counter capital">'.$published.'</span></p>
</a></li>';	
}

}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				
	</ul> 	
</div>

<span class="clearfix"></span>
</div>


<div class="__intro _affixer __noabs" data-spy="affix" data-offset-top="341" data-offset-bottom="0">
<div class="container">
<div class="row">

<div class="chose col-sm-4 col-sm-3 col-xs-6" data-attach="true">
<a href="" class="curchoice">Colecciones</a>
<div class="choseoptions"><ul>
	<li><a href="#view/all">Colecciones</a></li>
	<li><a href="#view/songs/all">Canciones</a></li>
</ul></div>
</div>

<div class="chose col-sm-4 col-sm-3 col-xs-6 onlycollections" data-attach="true">
<a href="" class="curchoice">Todas las categorias</a>
<div class="choseoptions"><ul>
	<li><a href="#view/all">Todas las categorias</a></li>
	<li><a href="#view/mixes">Mixes</a></li>
	<li><a href="#view/remixes">Re-mixes</a></li>
	<li><a href="#view/ediciones">Ediciones</a></li>
	<li><a href="#view/sincategoria">Sin categor&iacute;a</a></li>
</ul></div>
</div>
<div class="chose col-sm-4 col-sm-3 col-xs-6 onlysongs" data-attach="true">
<a href="" class="curchoice">Todas las categorias</a>
<div class="choseoptions"><ul>
	<li><a href="#view/songs/all">Todas las categorias</a></li>
	<li><a href="#view/songs/mixes">Mixes</a></li>
	<li><a href="#view/songs/remixes">Re-mixes</a></li>
	<li><a href="#view/songs/ediciones">Ediciones</a></li>
	<li><a href="#view/songs/sincategoria">Sin categor&iacute;a</a></li>
</ul></div>
</div>






</div>
</div>
</div>
<div class="_affixer_clone"></div>
<?php } else { ?>

<div class="__intro _affixer __noabs" data-spy="affix" data-offset-top="341" data-offset-bottom="0">
<div class="container">
<div class="row">
<div class="chose col-sm-4 col-sm-3 col-xs-6">
<a href="" class="curchoice">Resultados de Busqueda <b class="caret"></b></a>
<div class="choseoptions"><ul>
	<li><a href="#view/buscar/">Resultados de Busqueda</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
colecciones/">Volver a colecciones</a></li>
</ul></div>
</div>

</div>
</div>
</div>
<div class="_affixer_clone"></div>
<span class="clearfix"></span>
<?php }?>

<div class="__feature_feed">

<div class="container _feed_container">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias;
$collections = Collections::getcollections('all',0,12);


if($collections!=false){

for($i=0;$i<count($collections);$i++){
/*echo '<div class="col-xs-12 col-sm-4 col-md-3 __feature_oi" style="display:none"><div class="col-xs-12"><div class="__feature_oi_cover"><div class="__feature_oi_info"><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'" class="_play_this">Escuchar</a><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'" class="__linker"></a><div class="__b_a">'.$collections[$i]['name'].'<br /><small>'.$categorias[$collections[$i]['category']].'</small></div></div><div class="__feature_oi_img"><img src="usercontent/media/'.$collections[$i]['user_id'].'/small_'.$collections[$i]['cover_url'].'"></div></div></div></div>';*/
}
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



</div> <!-- container -->
<span class="clearfix"></span>

<div class="text-center text-xs-center d-more-btn" style="display:none;">
	<a href="javascript:;" class="btn btn-success">mas</a>
</div>

</div>

<?php if (($_smarty_tpl->tpl_vars['is_action']->value!="false")) {?>
<script type="text/javascript">
if(window.location.href.indexOf('#')<0) window.location.href = '#view/all';
</script>
<?php } else { ?>
<script type="text/javascript">
//if(window.location.href.indexOf('#view/buscar')<0) window.location.href = '#view/buscar/' + (''.replace(/ /g, '+'));
</script>
<?php }?>

<?php }?><?php }} ?>