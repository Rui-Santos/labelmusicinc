{if ($is_user!="true")}

<div class="_coverflow" style="display: none">

<div class="container">
<ul>
{php}
require_once('inc/class.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user;
$collections = Collections::getcollections('all',0,5);


if($collections!=false){

if(count($collections)>5){
$limit = 5;
}else{
$limit = count($collections);
}

for($i=0;$i<$limit;$i++){
$published = DB::timeConverter($collections[$i]['published']);
$pic=file_exists('usercontent/media/'.$collections[$i]['user_id'].'/medium_'.$collections[$i]['cover_url']) ? 'usercontent/media/'.$collections[$i]['user_id'].'/medium_'.$collections[$i]['cover_url'] : 'usercontent/media/'.$collections[$i]['user_id'].'/small_'.$collections[$i]['cover_url'];
echo '<li><a href="'.$collections_link.$collections_link_id.$collections[$i]['id'].'/"><div class="_wr"><div class="_coverflow_info">'.$collections[$i]['name'].'<br /><small> Por <strong>'.$collections[$i]['fullname'].'</strong> &nbsp; <i class="ion-music-note"></i> '.$collections[$i]["numb"].' &nbsp; <i class="ion-calendar"></i> '.$published.'</small></div><img src="'.$pic.'"></div><div class="overlay"></div></a></li>';	
}

}
{/php}
</ul>
</div>
</div>

<div class="__intro">
<div class="container">

<div class="row text-center">

<div class="col-sm-4">
<h4 class="text-info">Encuentra tus favoritos</h4>
<p class="text-muted"><i class="ion-ios7-box-outline"></i> Encuentra la m&uacute;sica que te gusta de quien mas te gusta entre decenas y decenas de contenidos y seguimos creciendo cada instante!</p>
</div>
<div class="col-sm-4">
<h4 class="text-info">Escucha gratis!</h4>
<p class="text-muted"><i class="ion-headphone"></i> Desde cualquier dispositivo, a cualquier lugar que vayas y en cualquier momento, nuestras colecciones estan siempre disponibles y accesibles.</p>
</div>
<div class="col-sm-4">
<h4 class="text-info">Descarga mp3</h4>
<p class="text-muted"><i class="ion-ios7-cloud-download-outline"></i> Quieres escuchar las colecciones sin conexion? Entonces no dudes en descargar tus mp3 favoritos!</p>
</div>

<span class="clearfix"></span>
</div>
</div>

<div class="container">
<div class="_pager">
<div class="row">
	<div class="_pager_tabs _feed_listener small">
		<h3>Lo m&aacute;s nuevo</h3>
			<span class="clearfix"></span>
	</div>
</div>
</div>
</div>

</div>







<div class="__feature_feed">

<div class="container _feed_container">



</div> <!-- container -->
<span class="clearfix"></span>

</div>


<script type="text/javascript">
if(window.location.href.indexOf('#')<0) window.location.href = '#view/all';
</script>

{else}

{php}
require_once('inc/class.php');
require_once('inc/dependencies/class/perfil.php');
global $path, $user, $user_id, $collections_link, $collections_link_id, $id, $collections_song_link_id, $is_moderator, $is_user, $categorias, $link, $is_id, $is_action, $action, $country, $bi_day, $bi_month, $bi_year, $is_ajax;
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
</a> <small class="hidden-xs">&nbsp; Lo ultimo</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Lo ultimo</a>
<div class="choseoptions"><ul>
	<li><a href="{$link}cuenta">Perfil</a></li>
	{if ($is_moderator=="true")}
	<li><a href="{$collections_link}{$collections_link_my_collections}">Mis colecciones</a></li>
	<li><a href="{$link}filemanager">Archivos</a></li>
	<li><a href="{$collections_link}{$collections_link_new_collection}">Crear colecci&oacute;n</a></li>
	{/if}
	<li class="active"><a href="{$link}">Lo ultimo</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>

<div class="container">
<div class="row">
<div class="col-sm-12 col-md-3 hidden-sm hidden-xs">

<div class="small_profile">
<h4><a href="'.$link.'@'.$usera['username'].'" class="username">'.$usera['name'].'</a> 
<a href="'.$link.'cuenta/editar" class="editlink"><small>Editar perfil</small></a></h4>
{if ($is_moderator=="true")}
<div class="btn-group btn-group-vertical col-xs-12">
<a href="'.$link.'" class="btn btn-secondary active"> <span class="meta">inicio</span></a>
<a href="'.$link.'colecciones/#view/songs/user-'.$usera['id'].'" class="btn btn-secondary"> <span class="meta">canciones</span> <span class="badge">'.$usera['songs'].'</span></a>
<a href="'.$link.'colecciones/#view/'.$usera['id'].'" class="btn btn-secondary"> <span class="meta">colecciones</span> <span class="badge">'.$usera['collections'].'</span></a>
<a href="'.$link.'filemanager" class="btn btn-secondary"> <span class="meta">mis archivos</span></a>
</div>
{/if}
</div>';

}else{

echo '<div class="container">
<div class="row">
<div class="col-sm-4 col-md-3">

<div class="small_profile">
<h4>Error de comunicacion</h4>
</div>';

}





{/php}
<span class="clearfix"></span>
</div>

<div class="col-sm-12 col-md-9">
<div class="__intro homepage">
<div class="chose col-sm-4 col-md-3 col-xs-6" data-attach="true">
<a href="" class="curchoice">Actividad <b class="caret text-muted"></b></a>
<div class="choseoptions"><ul>
	<li><a href="#view/feed">Actividad</a></li>
	<li><a href="#view/activity">Comentarios</a></li>
	<li><a href="#view/songs">Canciones</a></li>
	<li><a href="#view/collections">Colecciones</a></li>
</ul></div>
</div>
{if ($is_moderator=="true")}
<div class="chose col-sm-4 col-md-3 col-xs-6">
<a href="" class="curchoice">Publicar <b class="caret text-muted"></b></a>
<div class="choseoptions"><ul>
	<li><a href="{$link}colecciones/mycollections/create">Crear colecci&oacute;n</a></li>
	<li><a href="{$link}addsong">Subir canci&oacute;n</a></li>
	<!-- <li><a href="#view/cosllectionss">Subir video</a></li> -->
</ul></div>
</div>
{/if}
<span class="clearfix"></span>
</div>

<div class="__feature_feed">

<div class="_feed_container homepage">



</div> <!-- container -->
<span class="clearfix"></span>

<div class="text-center text-xs-center d-more-btn" style="display:none;">
	<a href="javascript:;" class="btn btn-default">cargar mas</a>
</div>

</div>
</div>
</div>


{if ($is_moderator=="true")}
<script type="text/javascript">
if(window.location.href.indexOf('#')<0) window.location.href = '#view/activity';
</script>
{else}
<script type="text/javascript">
if(window.location.href.indexOf('#')<0) window.location.href = '#view/songs';
</script>
{/if}

{/if}