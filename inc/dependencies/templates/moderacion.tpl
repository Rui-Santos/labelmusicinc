{if ($is_user=="true" && $is_moderator=="true" && $is_admin=="true")}

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
</a> <small class="hidden-xs">&nbsp; moderacion</small></h1>
</div>
</div>
</div> <!-- main-col -->
<div class="chose col-sm-3 pull-right col-xs-6">
<a href="" class="curchoice">Secciones</a>
<div class="choseoptions"><ul>
	<li class="active"><a href="{$link}moderacion/">Escritorio</a></li>
	<li><a href="{$link}moderacion/">Usuarios</a></li>
	<li><a href="{$link}moderacion/">Colecciones</a></li>
	<li><a href="{$link}moderacion/">Canciones</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';

}else{
include("denied.tpl");
}

{/php}

{else}
{include file="denied.tpl"}
{/if}
