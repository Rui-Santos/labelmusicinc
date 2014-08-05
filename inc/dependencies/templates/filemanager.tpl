{if ($is_user=="true")}
{php}
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
</a> <small class="hidden-xs">&nbsp; archivos</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Archivos</a>
<div class="choseoptions"><ul>
	<li><a href="{$link}cuenta">Perfil</a></li>
	<li><a href="{$collections_link}{$collections_link_my_collections}">Mis colecciones</a></li>
	<li class="active"><a href="{$link}filemanager">Archivos</a></li>
	<li><a href="{$collections_link}{$collections_link_new_collection}">Crear colecci&oacute;n</a></li>
	<li><a href="{$link}">Lo ultimo</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';


echo <<<EOD

<!-- <div class="progress">
	<div class="progress-bar progress-bar-secondary" rel="progress" data-progress="tracks" style="width: 95%"></div>
	<div class="progress-bar progress-bar-third" rel="progress" data-progress="other" style="width: 5%"></div>
</div> -->

<div class="container">
<div class="row">
<div class="filelistdata">
	<input type="hidden" name="contenttype" id="contenttype" class="contenttype" value="collections" />
	<input type="hidden" name="contentview" id="contentview" class="contentview" value="0" />
</div>
<div class="col-sm-12 col-md-3">

<div class="stats">
<div class="row">
<div class="btn-group btn-group-vertical col-xs-12">
<a href="#" class="btn btn-secondary scollections">colecciones</a>
<a href="#tracks" class="btn btn-cancel stracks">tracks</a>

<!-- <a href="javascript:;" class="btn btn-cancel">buscar</a> -->
</div>

</div>
</div>

</div> <!-- sidebar -->

<div class="col-sm-12 col-md-9">
<div class="_p_t btn-toolbar">
<div class="btn-group">
	<a href="{$link}colecciones/mycollections/create" class="btn btn-primary"><i class="ion-folder"></i> <span class="hidden-xs">+ colecci&oacute;n</span></a>
	<a href="javascript:;" class="btn btn-primary"><i class="ion-cloud"></i> <span class="hidden-xs">subir track</span></a>
</div><div class="btn-group fileactions">
	<a href="javascript:;" class="btn btn-cancel disabled link-open" disabled="disabled"><i class="ion-document"></i> <span class="hidden-xs">abrir</span></a>
	<a href="javascript:;" class="btn btn-cancel disabled link-edit" disabled="disabled"><i class="ion-compose"></i> <span class="hidden-xs">editar</span></a>
	<a href="javascript:;" class="btn btn-cancel disabled link-remove" disabled="disabled"><i class="ion-trash-b"></i></a>
</div>
</div>

<div class="_wB _aP fullpage">
<div class="filemanager">
<div class="row filelist">

<div style="padding: 0px 20px" class="text-muted">Cargando..</div>



</div>
<a href="javascript:;" class="btn btn-default loadmore col-xs-12">cargar mas</a>
<span class="clearfix"></span>
</div>
</div>
</div>
</div>
</div>

{literal}
<script type="text/html" id="filetemplate">
<div class="file file-item {{type}}" data-id="{{id}}">
	<div class="col-xs-1 text-right hidden-xs">{{icon}}</div>
	<div class="col-xs-9 col-sm-7 col-md-8">{{name}}</div>
	<div class="col-xs-3 col-sm-4 col-md-3 text-xs-right">{{details}}</div>
	<span class="clearfix"></span>
	<div class="col-xs-12 do-more-actions">
		<a href="javascript:;" class="link-open btn btn-primary btn-xs insidefileitem">Abrir</a>
		<a href="javascript:;" class="link-edit btn btn-primary btn-xs insidefileitem">Editar</a>
		<a href="javascript:;" class="link-remove btn btn-danger pull-right btn-xs insidefileitem">Eliminar</a>
	</div>
	<span class="clearfix"></span>
</div>
</script>
{/literal}


EOD;

}else{
include('inc/dependencies/templates/notfound.tpl');
}

{/php}





{*********************** denied ****************************}
{else} 
{php}
include('inc/dependencies/templates/denied.tpl');
{/php}
{/if}