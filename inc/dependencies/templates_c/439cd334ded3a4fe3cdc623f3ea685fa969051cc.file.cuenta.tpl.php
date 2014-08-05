<?php /* Smarty version Smarty-3.1.18, created on 2014-08-05 06:45:26
         compiled from "inc\dependencies\templates\cuenta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18900536fade4cfd086-92703540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '439cd334ded3a4fe3cdc623f3ea685fa969051cc' => 
    array (
      0 => 'inc\\dependencies\\templates\\cuenta.tpl',
      1 => 1407221124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18900536fade4cfd086-92703540',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536fade4d7faf8_22674315',
  'variables' => 
  array (
    'is_user' => 0,
    'is_id' => 0,
    'link' => 0,
    'register_link_action' => 0,
    'gender' => 0,
    'curr_id' => 0,
    'country' => 0,
    'bi_day' => 0,
    'bi_month' => 0,
    'bi_year' => 0,
    'login_link_action' => 0,
    'register_link' => 0,
    'is_moderator' => 0,
    'collections_link' => 0,
    'collections_link_my_collections' => 0,
    'collections_link_new_collection' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536fade4d7faf8_22674315')) {function content_536fade4d7faf8_22674315($_smarty_tpl) {?><?php if (($_smarty_tpl->tpl_vars['is_user']->value=="false")) {?>

<?php if (($_smarty_tpl->tpl_vars['is_id']->value==true)) {?>


<span class="clearfix"></span>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
require_once('inc/dependencies/class/perfil.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias, $link, $is_id, $is_action, $action, $country;
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

echo '<div class="user_profile_o">
<div class="container">
<ul>
	<li><a href="'.$link.'colecciones/#view/songs/user-'.$usera['id'].'"><span class="count">'.$usera['songs'].'</span> <span class="meta">canciones</span></a></li>
	<li><a href="'.$link.'colecciones/#view/'.$usera['id'].'"><span class="count">'.$usera['collections'].'</span> <span class="meta">colecciones</span></a></li>
</ul>
</div>
</div> <span class="clearfix"></span>';



echo '
<div id="profilecontent" class="container">
<div id="main" class="main-full profile-container self">
  <div class="profile-head">
    <h1>
      <a href="'.$link.'@'.$sid.'" class="url" rel="contact" title="'.$usera['name'].'">
        <div>
          <img alt="'.$usera['name'].'" class="photo" height="80" src="'.$usera['profile_picture'].'" width="80">
        </div>
        '.$usera['name'].'
</a></h1>

      <h2 class="bio">'.$usera['bio'].'</h2>

    <ul class="profile-details">
        <li>
          <a class="location"><i class="ion-android-location"></i> '.$country[$usera['country']].'</a>
        </li>
    </ul>';

if($loadowner){

echo '
<div class="profile-dash-actions">
<div class="member-actions">
  <a href="#" class="action settings">
  <span class="hidden-xs"><i class="ion-gear-a"></i> <b class="caret"></b></span>
  <span class="visible-xs"><i class="ion-gear-a"></i> Opciones de cuenta</span>
</a>  <ul class="actions-on-user">
    <li>
      <ul>
        <li class="edit-account">
          <a href="'.$link.'@'.$sid.'/editar">Editar cuenta</a>
        </li>
      </ul>
    </li>
  </ul>
</div>
    </div>
';

}

echo '</div>
</div>
</div> <!-- /content -->

<span class="clearfix"></span>
<div class="__feature_feed">

<div class="container _feed_container" style="min-height:50px">';

$collections = Collections::getcollections($usera['id'],0,4);
if($collections!=false){
for($i=0;$i<count($collections);$i++){
echo '<div class="col-xs-6 col-md-3 __feature_oi __content_collection"><div class="col-xs-12"><div class="__feature_oi_cover"><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'"><div class="__feature_oi_img"><img src="'.$link.'usercontent/media/'.$collections[$i]['user_id'].'/small_'.$collections[$i]['cover_url'].'"></div></a><div class="__feature_oi_info"><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'" class="__linker"></a><div class="__b_a">'.$collections[$i]['name'].'<br /><small>'.$categorias[$collections[$i]['category']].'</small></div></div></div></div></div>';
}
}

echo '
</div> <!-- container -->
<div class="text-center">
<a href="'.$link.'colecciones/#view/'.$usera['id'].'" class="btn btn-secondary">colecciones de '.$usera['name'].'</a>
</div>
';


}else{
include('inc/dependencies/templates/notfound.tpl');
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>




<?php } else { ?>

<div class="__intro _affixer affix-top" data-spy="affix" data-offset-top="62" data-offset-bottom="0">
<div class="container">
<div class="row">
<div class="chose col-sm-4 col-md-3 col-xs-12">
<a href="" class="curchoice">Cuenta de usuario <b class="caret text-muted"></b></a>
<div class="choseoptions"><ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Iniciar sesi&oacute;n</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
?module=cuenta&registrar">Crear cuenta</a></li>
</ul></div>
</div>

</div>
</div>
</div><div class="_affixer_clone"></div><span class="clearfix"></span>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


if(isset($_GET['registrar'])){

if(isset($_POST['_usr_form'])){
require_once('inc/dependencies/class/perfil.php');
echo User::check();
}




echo '
<div class="container _p_t hidden-xs">
<h1><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Cuenta</a> <span>Crear cuenta</span></h1>
</div>


<div class="_nabg_">

<div class="container">
<div class="row">

<div class="col-sm-4 pull-right">
<h3>Crea una cuenta ahora!</h3>
<p class="text-muted">Registrate y comienza a difrutar de toda la musica que <b>LMI</b> te ofrece!</p>
</div>

<div class="col-sm-8 col-xs-12 _p">
	<h1>Completa el formulario</h1>';
echo <<<EOD
	<div class="help-block">Escribe todos los datos requeridos para crear una cuenta.</div>
	<form role="form" class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['register_link_action']->value;?>
" method="post">
	<input type="hidden" name="_usr_form" value="1" />
	<input type="hidden" name="_usr_is_fb" value="false" />
		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_fn">Nombre Completo</label>
			<input type="text" class="form-control" id="_usr_fn" name="_usr_fn" />
		</div>
		</div>
		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_em">Correo electr&oacute;nico</label>
			<input type="text" class="form-control" id="_usr_em" name="_usr_em" />
		</div>
		</div>
		
		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_pw">Clave</label>
			<input type="password" class="form-control" id="_usr_pw" name="_usr_pw" />
		</div>
		</div>
		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_pwc">Repite tu clave</label>
			<input type="password" class="form-control" id="_usr_pwc" name="_usr_pwc" />
		</div>
		</div>

		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_un">Nombre de usuario</label>
			<input type="text" class="form-control" id="_usr_un" name="_usr_un" />
		</div>
		</div>
		<div class="form-group col-sm-6 text-left" style="display: none">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_ge">G&eacute;nero</label>
			<select id="_usr_ge" name="_usr_ge" class="form-control">
					<option value="">G&eacute;nero</option>
					<?php  $_smarty_tpl->tpl_vars['curr_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curr_id']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gender']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curr_id']->key => $_smarty_tpl->tpl_vars['curr_id']->value) {
$_smarty_tpl->tpl_vars['curr_id']->_loop = true;
?>
					  <option value="<?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
</option>
					<?php } ?>
				</select>
		</div>
		</div>

		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_ci">Pa&iacute;s de origen</label>
			
			<select id="_usr_ci" name="_usr_ci" class="form-control">
					<option value="">Pa&iacute; de origen</option>
					<?php  $_smarty_tpl->tpl_vars['curr_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curr_id']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['country']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['curr_id']->key => $_smarty_tpl->tpl_vars['curr_id']->value) {
$_smarty_tpl->tpl_vars['curr_id']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['country']['iteration']++;
?>
					  <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['country']['iteration']-1;?>
"><?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
</option>
					<?php } ?>
				</select>
		</div>
		</div>
		<div class="form-group col-sm-6 text-left" style="display: none">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_ad">Direcci&oacute;n</label>
			<input type="text" class="form-control" id="_usr_ad" name="_usr_ad" />
		</div>
		</div>

		<div class="form-group col-sm-12" style="display: none">
		<div class="col-sm-12">
			<label class="control-label" for="_usr_bi-bi_day">Fecha de nacimiento</label>
			<span class="clearfix"></span>
			<div class="col-sm-4">
				<select id="_usr_bi-bi_day" name="_usr_bi-bi_day" class="form-control">
					<option value="">Dia</option>
					<?php  $_smarty_tpl->tpl_vars['curr_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curr_id']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bi_day']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curr_id']->key => $_smarty_tpl->tpl_vars['curr_id']->value) {
$_smarty_tpl->tpl_vars['curr_id']->_loop = true;
?>
					  <option value="<?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
</option>
					<?php } ?>
				</select>
			</div><div class="col-sm-4">
				<select id="_usr_bi-bi_day" name="_usr_bi-bi_month" class="form-control">
					<option value="">Mes</option>
					<?php  $_smarty_tpl->tpl_vars['curr_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curr_id']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bi_month']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curr_id']->key => $_smarty_tpl->tpl_vars['curr_id']->value) {
$_smarty_tpl->tpl_vars['curr_id']->_loop = true;
?>
					  <option value="<?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
</option>
					<?php } ?>
				</select>
			</div><div class="col-sm-4">
				<select id="_usr_bi-bi_day" name="_usr_bi-bi_year" class="form-control">
					<option value="">A&ntilde;o</option>
					<?php  $_smarty_tpl->tpl_vars['curr_id'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['curr_id']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bi_year']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['curr_id']->key => $_smarty_tpl->tpl_vars['curr_id']->value) {
$_smarty_tpl->tpl_vars['curr_id']->_loop = true;
?>
					  <option value="<?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['curr_id']->value;?>
</option>
					<?php } ?>
				</select>

			</div>
		</div>
		</div>
		

		<div class="form-group col-sm-12">
			<div class="col-sm-12"><input type="submit" value="Crear cuenta" class="btn btn-primary" /></div>
		</div>
	</form>

	<div class="addSpace"></div>
</div>

</div>

<span class="clearfix"></span>

</div>
</div>

EOD;

}else{


if(isset($_POST['_usr_form_login'])){
require_once('inc/dependencies/class/perfil.php');
	if(User::LoginCheck()!="true" || User::LoginCheck()!=true){
		echo User::LoginCheck();
	}
}

echo <<<EOD
<div class="container _p_t hidden-xs">
<h1><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Cuenta</a> <span>Crear cuenta</span></h1>
</div>

<div class="container">
<div class="row">

<div class="col-sm-4 pull-right">
<h3>Accede a tu cuenta</h3>
<p class="text-muted">Inicia sesion y empieza a compartir tus pensamientos.</p>
</div>

<div class="col-xs-12 col-sm-8 _p">

<h2>Inicia sesion con tus credenciales</h2>

<form role="form" class="form-horizontal text-center" action="<?php echo $_smarty_tpl->tpl_vars['login_link_action']->value;?>
" method="post">
<input type="hidden" name="_usr_form_login" value="1" />
		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_nk">Nickname</label>
			<input type="text" class="form-control" id="_nk" name="_login_n" />
		</div>
		</div>
		<div class="form-group col-sm-6 text-left">
		<div class="col-sm-12">
			<label class="control-label" for="_pw">Clave</label>
			<input type="password" class="form-control" id="_pw" name="_login_p" />
		</div>
		</div>
		<div class="form-group col-sm-6 text-left"><!-- <label><input type="checkbox" name="_login_r" value="1" /> Siempre mantenerme logueado</label> --></div>
		<div class="form-group col-sm-6 text-left text-left">
			<div class="col-sm-12"><input type="submit" value="Iniciar Ses&oacute;n" class="btn btn-primary" /></div>
		</div>
	</form>



<span class="clearfix"></span>


<div class="text-center register-section" style="margin-bottom: 20px">
<h2>&oacute; Crea una cuenta gratis!</h2>
<div class="col-sm-8 col-sm-offset-2 text-center">
<div class="help-block">Crea una cuenta usando el m&eacute;todo habitual.</div>
<a href="<?php echo $_smarty_tpl->tpl_vars['register_link']->value;?>
" class="button button-white">Crea una cuenta</a>
</div>
<!-- <div class="col-sm-4 text-left">
<div class="help-block">o Crea una cuenta usando tu perfil de facebook!</div>
<a href="javascript:;" class="btn btn-primary" onclick="checkIfCanLogin();"><i class="fa fa-facebook"></i> &nbsp; facebook login</a>
<div class="_nth">Inicia sesi&oacute;n usando tu cuenta de facebook.</div>
</div> -->
<span class="clearfix"></span>
</div>

</div>
<span class="clearfix"></span>
</div>
<span class="clearfix"></span>
</div>
</div>

EOD;

}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<?php }?>




<?php } else { ?>
<span class="clearfix"></span>
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

/** ********************************************************************************
// show actions
***********************************************************************************/
if($is_action=="true" && $loadowner==true){
echo '
<div class="__intro _affixer affix-top" data-spy="affix" data-offset-top="62" data-offset-bottom="0">
<div class="container">
<div class="row">
<div id="profilecontent" class="compact">
<div id="main" class="main-full profile-container self col-xs-6">
  <div class="profile-head">
    <h1>
      <a href="'.$link.'@'.$sid.'" class="url" rel="contact" title="'.$usera['name'].'">
        <div class="hidden-xs">
          <img alt="'.$usera['name'].'" class="photo" height="80" src="'.$usera['profile_picture'].'" width="80">
        </div>
        '.$usera['name'].'
</a>
<small class="hidden-xs">&nbsp; editar perfil</small>
</h1>
</div>
</div>

<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Editar perfil</a>
<div class="choseoptions"><ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>
	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta/editar">Editar perfil</a></li>
</ul></div>
</div>

<span class="clearfix"></span>
</div>

</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';


if($action=="editar"){

if(isset($_POST) && $_POST!=null){

//print_r($_POST);

if(DB::validateEMAIL($_POST['email'])){


$updateInfo = User::updateUserInfo($_POST);
if($updateInfo!=false){
echo '<div class="alert alert-success _nR" data-reload-timer="1000">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<div class="container">
Perfil actualizado correctamente!
</div>	
</div>';
}else{
echo '<div class="alert alert-danger _nR">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<div class="container">
Tus cambios no pudieron ser guardados.
</div>	
</div>';
}
	
}else{

echo '<div class="alert alert-warning _nR">
<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<div class="container">
El correo electr&oacute;nico proporcionado es inv&aacute;lido! Por favor verificalo. ('.$_POST['email'].')
</div>	
</div>';
	
}


}

echo '<div class="container _p_t hidden-xs">
<h1><a href="'.$link.'@'.$usera['username'].'">Perfil</a> <span>Editar perfil</span></h1>
</div>';

echo '<div class="container"><div class="row">

<div class="col-xs-12 col-sm-4 pull-right text-xs-center">
<div class="user_info">
<div class="btn-group btn-group-vertical col-xs-12 text-left text-xs-left stats">
<a href="'.$link.'@'.$usera['username'].'/editar" class="btn btn-secondary disabled" disabled="disabled">Editar perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarfoto" class="btn btn-cancel">Cambiar foto de perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarclave" class="btn btn-cancel">Cambiar clave</a>
<a href="'.$link.'@'.$usera['username'].'/redessociales" class="btn btn-cancel">Redes sociales</a>
</div>
</div>
<span class="clearfix"></span>
</div>

<div class="col-xs-12 col-sm-8 _wB _aP">


<form id="editprofile" name="editprofile" method="post">
<div class="_hidden">
	<input type="hidden" name="userid" id="userid" value="'.$usera['id'].'" />
</div>

<div class="form-group">
<label>Nombre de usuario</label>
<h3 class="_nM_nP">'.$usera['username'].' <span><a href="javascript:;" class="changeusername btn btn-default openaction" data-action="changeusername" data-id="'.$usera['id'].'">Cambiar</a></span></h3>
</div>

<div class="form-group">
<label for="fullname">Nombre Completo</label>
<input type="text" name="fullname" id="fullname" class="form-control" value="'.$usera['name'].'" />
</div>

<div class="form-group">
<label for="email">Correo electr&oacute;nico</label>
<input type="text" name="email" id="email" class="form-control" value="'.$usera['email'].'" />
</div>

<div class="form-group">
<label for="bio">Biografia</label>
<textarea class="form-control" name="bio" id="bio" rows="5">'.$usera['bio'].'</textarea>
</div>


<div class="form-group">
<label>Contrase&ntilde;a</label>
<h3 class="_nM_nP">********** <span><a href="javascript:;" class="changepassword btn btn-default openaction" data-action="changepassword" data-id="'.$usera['id'].'">Cambiar</a></span></h3>
</div>

<div class="form-group">
<label for="country">Pa&iacute;s</label>
<h3 class="_nM_nP"><i class="ion-android-location"></i> '.$country[$usera['country']].' <span><a href="javascript:;" class="btn btn-default openaction" data-action="changecountry" data-id="'.$usera['id'].'">Cambiar</a></span></h3>
</div>

<br /><br />




<div class="form-group">
<input type="submit" value="Actualizar" class="btn btn-primary" />
<a href="'.$link.'@'.$usera['username'].'" class="btn btn-cancel">volver al perfil</a>
</div>

</form>
</div></div></div>';

}else if($action=="cambiarclave"){


echo '<div class="container _p_t hidden-xs">
<h1><a href="'.$link.'@'.$usera['username'].'">Perfil</a> <span>Cambiar clave</span></h1>
</div>';

echo '<div class="container"><div class="row">

<div class="col-xs-12 col-sm-4 pull-right text-xs-center">
<div class="user_info">
<div class="btn-group btn-group-vertical col-xs-12 text-left text-xs-left stats">
<a href="'.$link.'@'.$usera['username'].'/editar" class="btn btn-cancel">Editar perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarfoto" class="btn btn-cancel">Cambiar foto de perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarclave" class="btn btn-secondary disabled" disabled="disabled">Cambiar clave</a>
<a href="'.$link.'@'.$usera['username'].'/redessociales" class="btn btn-cancel">Redes sociales</a>
</div>
</div>
<span class="clearfix"></span>
</div>

<div class="col-xs-12 col-sm-8 _wB _aP">


<form id="editprofile" name="editprofile" method="post">
<div class="_hidden">
	<input type="hidden" name="userid" id="userid" value="'.$usera['id'].'" />
</div>

<div class="form-group">
<label>Contrase&ntilde;a</label>
<h3 class="_nM_nP">********** <span><a href="javascript:;" class="changepassword btn btn-default openaction" data-action="changepassword" data-id="'.$usera['id'].'">Cambiar</a></span></h3>
</div>

<br />
<br />

<div class="form-group">
<a href="'.$link.'@'.$usera['username'].'" class="btn btn-cancel">volver al perfil</a>
</div>

</form>
</div></div></div>';

}else if($action=="cambiarfoto"){



if(isset($_POST['confirm']) && $_POST['confirm']==true){
//print_r($_POST);

$data=array(
	'picture_id'=> $_POST['_cover'],
	'userid'=> $_POST['userid']
);
$uc=User::updateUserPic($data);
if($uc!=false){
	echo '<div class="container"><span rel="notify" data-notification-message="Tu foto de perfil ha sido cambiada!" data-notification-attributes="true">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta" class="btn btn-default">volver</a>
		</span></div><span class="clearfix"></span>';
		echo '<script>setTimeout(function(){window.location.reload();},1500);</script>';
}else{
	echo '<span style="display: none;" rel="notify" data-notification-message="No se pudieron guardar los cambios."></span>';
}

}

echo '<div class="container _p_t hidden-xs">
<h1><a href="'.$link.'@'.$usera['username'].'">Perfil</a> <span>Cambiar foto</span></h1>
</div>';

echo '<div class="container"><div class="row">

<div class="col-xs-12 col-sm-4 pull-right text-xs-center">
<div class="user_info">
<div class="btn-group btn-group-vertical col-xs-12 text-left text-xs-left stats">
<a href="'.$link.'@'.$usera['username'].'/editar" class="btn btn-cancel">Editar perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarfoto" class="btn btn-secondary disabled" disabled="disabled">Cambiar foto de perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarclave" class="btn btn-cancel">Cambiar clave</a>
<a href="'.$link.'@'.$usera['username'].'/redessociales" class="btn btn-cancel">Redes sociales</a>
</div>
</div>
<span class="clearfix"></span>
</div>

<div class="col-xs-12 col-sm-8 _wB _aP">


<form id="editprofile" name="editprofile" method="post">
<div class="_hidden">
	<input type="hidden" name="userid" id="userid" value="'.$usera['id'].'" />
	<input type="hidden" name="confirm" id="confirm" value="true" />
</div>

<div class="_cover_ch profile_pic col-sm-6" data-image="'.$usera['profile_picture'].'">
<div class="col-sm-12 _cover_ _v_a text-center">
<img src="'.$usera['profile_picture'].'" class="img-rounded profile">
<input type="hidden" name="_cover" id="_cover_value" value="'.$usera['photo_id'].'">
<input type="hidden" name="_cover_name" id="_cover_name_value" value="'.$usera['profile_picture'].'">
</div>

<div class="col-sm-12 _v_a text-center">
<div class="_v_a_c">

<div id="cover_upload" style="position: relative;">
<div class="__file_controls _choose">
<a href="javascript:;" class="btn btn-default" id="pickfiles" style="z-index: 1;">Elegir otra foto</a>
</div>

<div class="progress_handler">
	<div class="progress_bg">
		<div class="progress_percent"></div>
	</div>
</div>
</div>
</div>
</div>

<span class="clearfix"></span>

</div>


<span class="clearfix"></span>

<div class="form-group" style="margin-top: 40px">
<button type="submit" class="btn btn-primary">Guadar</button>
<a href="'.$link.'@'.$usera['username'].'" class="btn btn-cancel pull-right">volver al perfil</a>
</div>

</form>
</div></div></div>';

}else if($action=="redessociales"){


if(isset($_POST['confirm']) && $_POST['confirm']==true){
//print_r($_POST);

$data=array(
	'website_url'=> $_POST['website_url'],
	'facebook_url'=> $_POST['facebook_url'],
	'twitter_url'=> $_POST['twitter_url'],
	'soundcloud_url'=> $_POST['soundcloud_url'],
	'youtube_url'=> $_POST['youtube_url'],
	'vimeo_url'=> $_POST['vimeo_url'],
);
$uc=User::updateUserNetworks($data,$_POST['userid']);
if($uc!=false){
$usera['website_url'] = $_POST['website_url'];
$usera['facebook_url'] = $_POST['facebook_url'];
$usera['twitter_url'] = $_POST['twitter_url'];
$usera['youtube_url'] = $_POST['youtube_url'];
$usera['vimeo_url'] = $_POST['vimeo_url'];
$usera['soundcloud_url'] = $_POST['soundcloud_url'];

	echo '<div class="container"><span rel="notify" data-notification-message="Datos actualizados." data-notification-attributes="true">
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta" class="btn btn-default">volver</a>
		</span></div><span class="clearfix"></span>';
		echo '<script>setTimeout(function(){window.location.reload();},1500);</script>';
}else{
	echo '<span style="display: none;" rel="notify" data-notification-message="No se pudieron guardar los cambios."></span>';
}

}

echo '<div class="container _p_t hidden-xs">
<h1><a href="'.$link.'@'.$usera['username'].'">Perfil</a> <span>Redes sociales</span></h1>
</div>';

echo '<div class="container"><div class="row">

<div class="col-xs-12 col-sm-4 pull-right">
<div class="user_info">
<div class="btn-group btn-group-vertical col-xs-12 text-left text-xs-left stats">
<a href="'.$link.'@'.$usera['username'].'/editar" class="btn btn-cancel">Editar perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarfoto" class="btn btn-cancel">Cambiar foto de perfil</a>
<a href="'.$link.'@'.$usera['username'].'/cambiarclave" class="btn btn-cancel">Cambiar clave</a>
<a href="'.$link.'@'.$usera['username'].'/redessociales" class="btn btn-secondary disabled" disabled="disabled">Redes sociales</a>
</div>
</div>
<span class="clearfix"></span>
</div>

<div class="col-xs-12 col-sm-8 _wB _aP">


<form id="editprofile" name="editprofile" method="post">
<div class="_hidden">
	<input type="hidden" name="userid" id="userid" value="'.$usera['id'].'" />
	<input type="hidden" name="confirm" id="confirm" value="true" />
</div>

<div class="form-group">
<label>Sitio Web</label>
<input type="text" name="website_url" id="website_url" value="'.$usera['website_url'].'" class="form-control" />
</div>

<div class="form-group">
<label>Facebook</label>
<input type="text" name="facebook_url" id="facebook_url" value="'.$usera['facebook_url'].'" class="form-control" />
</div>

<div class="form-group">
<label>Twitter</label>
<input type="text" name="twitter_url" id="twitter_url" value="'.$usera['twitter_url'].'" class="form-control" />
</div>


<div class="form-group">
<label>SoundCloud</label>
<input type="text" name="soundcloud_url" id="soundcloud_url" value="'.$usera['soundcloud_url'].'" class="form-control" />
</div>



<div class="form-group">
<label>Canal de Youtube</label>
<input type="text" name="youtube_url" id="youtube_url" value="'.$usera['youtube_url'].'" class="form-control" />
</div>



<div class="form-group">
<label>Cuenta de Vimeo</label>
<input type="text" name="vimeo_url" id="vimeo_url" value="'.$usera['vimeo_url'].'" class="form-control" />
</div>







<div class="form-group" style="margin-top: 40px">
<button class="btn btn-primary" type="submit">guardar</button>
<a href="'.$link.'@'.$usera['username'].'" class="btn btn-cancel pull-right">volver al perfil</a>
</div>

</form>
</div></div></div>';

}else{

echo '<div class="container"><h3>Nada por aqui.</h3></div>';

}



/** ********************************************************************************
// show actions
***********************************************************************************/
}else{

echo '<div class="__intro _affixer affix-top" data-spy="affix" data-offset-top="62" data-offset-bottom="0">
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
</a> <small class="hidden-xs">&nbsp; perfil</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Perfil</a>
<div class="choseoptions"><ul>
	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta">Perfil</a></li>';
	if($loadowner){ echo '<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
cuenta/editar">Editar perfil</a></li>';}
	echo '
	<?php if (($_smarty_tpl->tpl_vars['is_moderator']->value=="true")) {?>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_my_collections']->value;?>
">Mis colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
filemanager">Archivos</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['collections_link']->value;?>
<?php echo $_smarty_tpl->tpl_vars['collections_link_new_collection']->value;?>
">Crear colecci&oacute;n</a></li>
	<?php }?>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">Lo ultimo</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';

/*
echo '<div class="user_profile_o">
<div class="container">
<ul>
	<li><a href="'.$link.'colecciones/#view/songs/user-'.$usera['id'].'"><span class="count">'.$usera['songs'].'</span> <span class="meta">canciones</span></a></li>
	<li><a href="'.$link.'colecciones/#view/'.$usera['id'].'"><span class="count">'.$usera['collections'].'</span> <span class="meta">colecciones</span></a></li>
</ul>
</div>
</div> <span class="clearfix"></span>';
*/


echo '
<div id="profilecontent" class="container">
<div id="main" class="main-full profile-container self">
  <div class="profile-head">
    <h1>
      <a href="'.$link.'@'.$sid.'" class="url" rel="contact" title="'.$usera['name'].'">
        <div>
          <img alt="'.$usera['name'].'" class="photo" height="80" src="'.$usera['profile_picture'].'" width="80">
        </div>
        '.$usera['name'].'
</a></h1><ul class="profile-details sociallinks">';

if($usera['website_url']!=""){
	$url = filter_var($usera['website_url'], FILTER_VALIDATE_URL) ? $usera['website_url'] : 'http://' . $usera['website_url'];
	echo '<li><a href="'.$url.'" target="_blank"><i class="ion-earth"></i> '.$usera['website_url'].'</a></li>';
}

if($usera['facebook_url']!=""){
	$url = filter_var($usera['facebook_url'], FILTER_VALIDATE_URL) ? $usera['facebook_url'] : 'http://' . $usera['facebook_url'];
	echo '<li><a href="'.$url.'" target="_blank"><i class="ion-social-facebook"></i></a></li>';
}
if($usera['twitter_url']!=""){
	$url = filter_var($usera['twitter_url'], FILTER_VALIDATE_URL) ? $usera['twitter_url'] : 'http://' . $usera['twitter_url'];
	echo '<li><a href="'.$url.'" target="_blank"><i class="ion-social-twitter"></i></a></li>';
}
if($usera['soundcloud_url']!=""){
	$url = filter_var($usera['soundcloud_url'], FILTER_VALIDATE_URL) ? $usera['soundcloud_url'] : 'http://' . $usera['soundcloud_url'];
	echo '<li><a href="'.$url.'" target="_blank"><i class="fa fa-soundcloud"></i></a></li>';
}
if($usera['youtube_url']!=""){
	$url = filter_var($usera['youtube_url'], FILTER_VALIDATE_URL) ? $usera['youtube_url'] : 'http://' . $usera['youtube_url'];
	echo '<li><a href="'.$url.'" target="_blank"><i class="ion-social-youtube"></i></a></li>';
}
if($usera['vimeo_url']!=""){
	$url = filter_var($usera['vimeo_url'], FILTER_VALIDATE_URL) ? $usera['vimeo_url'] : 'http://' . $usera['vimeo_url'];
	echo '<li><a href="'.$url.'" target="_blank"><i class="ion-social-vimeo"></i></a></li>';
}




      echo '</ul><h2 class="bio">'.$usera['bio'].'</h2>

    <ul class="profile-details">
        <li>
          <a class="location"><i class="ion-android-location"></i> '.$country[$usera['country']].'</a>
        </li>';

		if($usera['accounttype']>0){
        if($loadowner){
        	echo '<li><a href="'.$link.'filemanager#tracks"><i class="ion-music-note"></i> <span class="count">'.$usera['songs'].'</span> <span class="meta">canciones</span></a></li>
		<li><a href="'.$link.'filemanager"><i class="ion-folder"></i> <span class="count">'.$usera['collections'].'</span> <span class="meta">colecciones</span></a></li>';
        }else{
        echo '<li><a href="'.$link.'colecciones/#view/songs/user-'.$usera['id'].'"><i class="ion-music-note"></i> <span class="count">'.$usera['songs'].'</span> <span class="meta">canciones</span></a></li>
		<li><a href="'.$link.'colecciones/#view/'.$usera['id'].'"><i class="ion-folder"></i> <span class="count">'.$usera['collections'].'</span> <span class="meta">colecciones</span></a></li>';
        }
        }

    echo '</ul>';

if($loadowner){

echo '
<div class="profile-dash-actions">
<div class="member-actions">
  <a href="#" class="action settings">
  <span class="hidden-xs"><i class="ion-gear-a"></i> <b class="caret"></b></span>
  <span class="visible-xs"><i class="ion-gear-a"></i> Opciones de cuenta</span>
</a>  <ul class="actions-on-user">
    <li>
      <ul>
        <li class="edit-account">
          <a href="'.$link.'@'.$sid.'/editar">Editar cuenta</a>
        </li>
      </ul>
    </li>
  </ul>
</div>
    </div>
';

}

echo '</div>
</div>
</div> <!-- /content -->

<span class="clearfix"></span>
<div class="__feature_feed">

<div class="container _feed_container" style="min-height:50px">';

if($usera['accounttype']>0){
$collections = Collections::getcollections($usera['id'],0,4);
if($collections!=false){
for($i=0;$i<count($collections);$i++){
echo '<div class="col-xs-6 col-md-3 __feature_oi __content_collection"><div class="col-xs-12"><div class="__feature_oi_cover"><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'"><div class="__feature_oi_img"><img src="'.$link.'usercontent/media/'.$collections[$i]['user_id'].'/small_'.$collections[$i]['cover_url'].'"></div></a><div class="__feature_oi_info"><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'" class="__linker"></a><div class="__b_a">'.$collections[$i]['name'].'<br /><small>'.$categorias[$collections[$i]['category']].'</small></div></div></div></div></div>';
}
}

echo '
</div> <!-- container -->
<div class="text-center">
<a href="'.$link.'colecciones/#view/'.$usera['id'].'" class="btn btn-secondary">colecciones de '.$usera['name'].'</a>
</div>
';

}

/** ********************************************************************************
// show actions
***********************************************************************************/
}


}else{
include('inc/dependencies/templates/notfound.tpl');
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>






<?php }?>
<?php }} ?>
