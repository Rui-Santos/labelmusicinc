<?php session_start();


//index file
require_once("inc/settings.php");
require_once("inc/class.php");

global $link, $path, $is_action, $action, $is_id, $id, $is_user, $is_moderator, $is_show, $show,$country;

if(isset($_GET['offline'])){

$body = '<div class="modal-wrapper"><div class="comment_parent"><div class="modal-wrapper"><h4 class="title">Registrate ya y disfruta de mucho mas!</h4>';
$body.= '<p class="text-muted">Registrate en este momento de forma gratuita y disfruta de todos los contenidos que tenemos para ti! Solo te tomara un instante.</p>';
$body .= '</div><a href="'.$link.'?module=cuenta&registrar" class="btn btn-default">Crear una cuenta</a>
 <a href="javascript:;" class="btn btn-primary pull-right" onclick="$(\'.modal\').modal(\'hide\');LMI.player.set(\'pause\')">Cerrar</a><span class="clearfix"></span></div></div>';
echo $body;



}else if(isset($_GET['comment_actions'])){


if(isset($_GET['exec']) && $_GET['exec']!=""){

$action = $_GET['exec'];

if($is_user!="false"){

if($is_id && $id!=null){
$type = isset($_GET['type']) && $_GET['type']!="" ? $_GET['type'] : 0;


if($action=='flag'){
if(isset($_GET['confirm']) && $_GET['confirm']!=""){
//sending flag

// insertFlag($content_id,$content_type,$comment_body)
$flag = $_GET['confirm'];
$insert = Collections::insertFlag($id,$type,$flag);
if($insert=="true"){

$body = '<div class="modal-wrapper"><div class="comment_parent"><div class="modal-wrapper"><h4 class="title">Reporte de contenidos</h4>';
$body.= '<p class="text-muted">Gracias por habernos ayudado a encontrar contenidos que no son adecuados en nuestro ambiente. Ahora el contenido pasara a revision por nuestro staff y se tratara con minusiocidad dependiendo del tipo de contenido que se refleja. Si te han ofendido, te pedimos disculpas, trabajamos duro para hacer de este un mejor lugar. Gracias.</p>';
$body .= '</div> <a href="javascript:;" class="btn btn-primary pull-right" onclick="$(\'.modal\').modal(\'hide\');">Finalizar</a><span class="clearfix"></span></div></div>';
echo $body;

}else{
	//if fail
$body = '<div class="modal-wrapper"><div class="comment_parent"><div class="modal-wrapper"><h4 class="title">Reporte de contenidos</h4>';
$body.= '<p class="text-muted">Gracias por habernos ayudado a encontrar contenidos que no son adecuados en nuestro ambiente. Ahora el contenido pasara a revision por nuestro staff y se tratara con minusiocidad dependiendo del tipo de contenido que se refleja. Si te han ofendido, te pedimos disculpas, trabajamos duro para hacer de este un mejor lugar. Gracias, aunque tu reporte ha fallado.</p>';
$body .= '</div> <a href="javascript:;" class="btn btn-primary pull-right" onclick="$(\'.modal\').modal(\'hide\');">Finalizar</a><span class="clearfix"></span></div></div>';
echo $body;
}




}else{


$body = '<div class="comment_parent"><div class="modal-wrapper"><h4 class="title">Acciones de contenidos</h4>';
$body.= '<p class="text-muted">Dinos, porque deseas reportar este comentario?</p><div class="form-group"><textarea class="form-control" style="height: 100px" data-comment-id="'.$id.'" data-content-type="'.$type.'" id="flag_c" name="flag_c"></textarea>';
$body .= '</div><a href="javascript:;" class="btn btn-success comment_actions_send_flag" data-action="flag">Aceptar y Continuar</a> <a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Cancelar</a></div></div>';
echo $body;

}






}else if($action=='remove'){

$imAutor = Collections::imAutor($id);
if($is_moderator!="false" || $imAutor){

$delete = Collections::deleteContent($id,$type);
echo '<div class="modal-wrapper" data-success-removing="done"><h4 class="title">Acciones de contenidos</h4><p class="text-muted">Ok, este contenido ha sido eliminado.</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';

}else{
echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';
}


}





}else{
echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';
}


//user
}else{
echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh! No tienes privilegios para ver este contenido.</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span></div>';
}




}else{


$type = isset($_GET['type']) && $_GET['type']!="" ? $_GET['type'] : 0;
$body = '<div class="modal-wrapper"><h4 class="title">Acciones de contenidos</h4><p class="text-muted">Que deseas hacer?</p><div class="list-group comment_actions">';
if($is_id && $id!=null){
	$body .= '<a  class="flag-comment list-group-item" href="javascript:;" data-comment-id="' . $id . '" data-content-type="'.$type.'" data-action="flag">
    <h4 class="list-group-item-heading">Reportar comentario</h4><p class="list-group-item-text">Si este comentario es ofensivo reportalo y nos aseguraremos de que su contenido sea adecuado.</p>
  </a>';
  if($is_user!="false"){
  	$imAutor = Collections::imAutor($id);
  	if($is_moderator!="false" || $imAutor){
	  	$body .= '<a  class="flag-comment list-group-item" href="javascript:;" data-comment-id="' . $id . '" data-content-type="'.$type.'" data-action="remove">
	    <h4 class="list-group-item-heading">Eliminar</h4><p class="list-group-item-text">Deseas eliminar este contenido? Entonces haz click aqui para seleccionar esta opacion. Toma en cuenta que esta accion es permanente y no puede dar marcha atras.</p>
	  </a>';
	  }
  }
}

$body .= '</div><a href="javascript:;" class="btn btn-success comment_actions_choose">Aceptar y Continuar</a> <a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Cancelar</a></div>';

echo $body;



}


}else if(isset($_GET['profile'])){

require_once('inc/dependencies/class/perfil.php');


if($is_action==true){



if($action=="changeusername" && $is_id){
$usera=User::getUserInfo($id,true);
if($usera!=false){


echo '<div class="modal-wrapper"><h4 class="title">Cambiar nombre de usuario</h4>
<p class="text-muted">Escribe el nombre de usuario que deseas usar.</p>

<div class="form-group">
<input type="hidden" value="'.$usera['username'].'" name="ousername" id="ousername" />
<input type="text" value="'.$usera['username'].'" name="nusername" id="nusername" class="form-control" />
</div>

<div class="alert alert-warning" id="uerr" style="display: none;">
Deberias elegir un nombre distinto!
</div>

<span class="clearfix"></span>
<a href="javascript:;" class="btn btn-default changeuname" data-id="'.$id.'">cambiar</a>
<a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">cancelar</a><span class="clearfix"></span</div>';


}else{

echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';

}

}else if($action=="changecollection" && $is_id){
$cu=Collections::getcollections($user_id);
$param=$_REQUEST['param'];
if($cu!=false){

echo '<div class="modal-wrapper"><h4 class="title">Cambiar colecci&oacute;n</h4>
<p class="text-muted">Selecciona una la colecci&oacute;n a la que deseas mover esta canci&oacute;n.</p>

<div class="form-group">
<select id="ncollection" name="ncollection" class="form-control">
<option value="0">Sin colecci&oacute;n</option>';
for($z=0; $z<count($cu); $z++){
	echo '<option value="'.$cu[$z]['id'].'" ';
	echo ($cu[$z]['id']==$param ? ' selected="selected"' : '');
	echo '>'.$cu[$z]['name'].'</option>';
}
echo '</select>
</div>

<span class="clearfix"></span>
<a href="javascript:;" class="btn btn-default changecollectiondo" data-id="'.$id.'">seleccionar</a>
<a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">cancelar</a><span class="clearfix"></span</div>';

}else{
echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';
}

}else if($action=="savencollection" && $is_id){
$data=array(
	'post_collection_id'=>$_GET['show']
	);

$cu=Collections::updateItem($id,$data,false);

if($cu!=false){

echo '<div class="modal-wrapper"><h4 class="title">Cambios realizados!</h4>
<p class="text-muted">Se han realizado los cambios satisfactoriamente.</p>
<span class="clearfix"></span>
<a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">cancelar</a><span class="clearfix"></span</div>';

}else{
echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';
}

}else if($action=="removesong" && $is_id){

$cu=Collections::removeItem($id,false);

if($cu!=false){

echo '{"status": "success"}';

}else{
echo '{"status": "error"}';
}



}else if($action=="changepassword" && $is_id){
$usera=User::getUserInfo($id,true);
if($usera!=false){


echo '<div class="modal-wrapper"><h4 class="title">Cambiar contrase&ntilde;a</h4>
<p class="text-muted">Escribe el nombre de usuario que deseas usar.</p>

<div class="form-group">
<input type="text" value="Clave actual" onfocus="this.type=\'password\'" name="opassword" id="opassword" class="form-control" />
</div>

<div class="form-group">
<input type="text" value="Clave nueva" name="npassword" id="npassword" onfocus="this.type=\'password\'" class="form-control" />
</div>


<div class="alert alert-warning" id="uerr" style="display: none;">
Clave invalida.
</div>

<span class="clearfix"></span>
<a href="javascript:;" class="btn btn-default changeupassword" data-id="'.$id.'">cambiar</a>
<a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">cancelar</a><span class="clearfix"></span</div>';


}else{

echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';

}

}else if($action=="changecountry" && $is_id){
$usera=User::getUserInfo($id,true);
if($usera!=false){


echo '<div class="modal-wrapper"><h4 class="title">Cambiar pais</h4>
<p class="text-muted">A que pais perteneces?</p>

<div class="form-group">
<input type="hidden" name="ocountry" id="ocountry" value="'.$usera['country'].'" />
<select id="ncountry" name="ncountry" class="form-control"><option value="">Selecciona pais</option>';
for($b=0; $b<count($country);$b++){
	echo '<option value="'.$b.'">'.$country[$b].'</option>';
}
echo '</select>
</div>


<div class="alert alert-warning" id="uerr" style="display: none;">
Elije un pais.
</div>

<span class="clearfix"></span>
<a href="javascript:;" class="btn btn-default changeucountry" data-id="'.$id.'">cambiar</a>
<a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">cancelar</a><span class="clearfix"></span</div>';


}else{

echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';

}

} else if($action=="saveuname" && $is_id && $is_show && $_GET['show']!=""){
$usera=User::getUserInfo($id,true);
if($usera!=false){

$changeuname = User::updateUsername($id,$_GET['show']);

if($changeuname!=false){

echo '<div class="modal-wrapper"><h4 class="title">Cambiar nombre de usuario</h4>
<div class="alert alert-success">
Nombre de usuario cambiado correctamente!
</div>
<span class="clearfix"></span>
<a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">salir</a><span class="clearfix"></span</div>';

}else{

echo '<div class="modal-wrapper"><h4 class="title">Cambiar nombre de usuario</h4>
<div class="alert alert-danger">
Algo ocurrio durante el proceso. Tu nombre de usuario no fue cambiado.
</div>
<span class="clearfix"></span>
<a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">salir</a><span class="clearfix"></span</div>';

}


}else{

echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';

}


}else{

echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';

}

}





}else{
	echo '<div class="modal-wrapper"><h4 class="title">Nada por aqui!</h4><p class="text-muted">Parece que no hay nada por aqui eh!</p><span class="clearfix"></span><a href="javascript:;" class="btn btn-cancel pull-right" onclick="$(\'.modal\').modal(\'hide\');">Aceptar y salir</a><span class="clearfix"></span</div>';
}



?>