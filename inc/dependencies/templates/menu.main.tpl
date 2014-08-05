<div class="menu-area">
<div class="navbar navbar-static-top {php}
if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  echo 'open '.$_COOKIE['LMI_playerVisible'];
  }
{/php}" id="top" role="banner">
<div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle pull-right" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <i class="ion-ios7-keypad"></i>
      </button>
      <button class="navbar-toggle pull-left" type="button" onclick="{literal}$.pageslide({href:'#playlistplayer', modal: true});{/literal}">
        <i class="ion-play"></i>
      </button>
   <a href="{$link}" class="navbar-brand"><img src="{$path}image/logo.png" /></a>       
    </div>



<div class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

<ul class="nav navbar-nav navbar-left">
<li class="vertical-divider"></li>
<li class="loading _st_load {php}
if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  echo 'open active';
  }
{/php}"><a href="javascript:;" class="player-toggl{php}
if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  echo ' ui-orange';
  }
{/php}" style="display: none">
<span class="mini-loader"><img src="{$path}image/preloader.gif" /></span>
<i class="ion-play"></i></a></li>


<li class="search-box search-dialog"><form id="searchform" action="{$link}colecciones/buscar">
{php}

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
{/php}
</form></li>
<!-- <li class="visible-sm"><a href="javascript:;" class="search-dialog"><i class="fa fa-search"></i></a></li> -->
</ul>

<ul class="nav navbar-nav navbar-right text-left">
<li class=" hidden-sm"><a href="{$link}">inicio</a></li>


<li class="navbar-left"><a href="{$collections_link}">descubre</a></li>


<li class="hidden-sm"><a href="{$link}">acerca</a></li>


{if ($is_user=="true")}

{if ($is_moderator=="true")}

<li class="hidden-sm"><a href="{$profile_link}{$user}"><span class="hidden-sm hidden-md hidden-lg">Mi perfil: </span> {php}
global $username;$usershortname = "";
if(strpos($username, ' ')>-1){
  $usershortname = explode(' ', $username);
  $usershortname = $usershortname[0];
}else{
  $usershortname = $username;
}
echo $usershortname;
{/php}</a></li>

<li class="vertical-divider"></li>

{if ($is_admin=="true")}
<li class="user-links hidden-xs"><a href="{$moderation_link}" class="tooltip-t" title="Moderaci&oacute;n" data-placement="bottom"><i class="ion-ios7-bell"></i></a></li>
<li class="visible-xs"><a href="{$moderation_link}">Centro de moderacion</a></li>
{/if}



{php}
require_once 'inc/libs/Mobile_Detect.php';
$detect = new Mobile_Detect;
global $is_user, $action;
$place = isset($_GET["module"]) ? ( $_GET["module"]=="" || $_GET["module"]=="home" ? "index" : $_GET["module"] ) : "index";
if($place=="filemanager" || $detect->isMobile() || $detect->isTablet()){

echo <<<EOD
<li class="navbar-left user-links upload-links hidden-xs filemanager"><a href="{$link}filemanager/" class="tooltip-t" title="mis&nbsp;archivos" data-placement="bottom"><i class="ion-folder"></i> archivos</a></li>
EOD;


}else{

echo <<<EOD

<li class="dropdown navbar-left user-links upload-links hidden-xs filemanager"><a href="{$link}filemanager/" class="tooltip-t dropdown-toggle " title="mis&nbsp;archivos" data-placement="bottom" data-toggle="dropdown"><i class="ion-folder"></i> archivos</a>
<ul class="dropdown-menu notifications-dropdown filelist filecompact">
<div style="padding: 0px 20px" class="text-muted">Cargando..</div>

<div class="divider"></div>
<li><a href="javascript:;" class="loadmore">cargar mas</a></li>
</ul>
{literal}
<script type="text/html" id="filetemplate">
<li class="file file-item {{type}}" data-id="{{id}}">
  <a href="{{link}}colecciones/{{link.type}}/{{id}}" class="{{type}}" data-id="{{id}}">
  {{icon}} {{name}}
  </a>
</li>
</script>
{/literal}
</li>

EOD;

}
{/php}

<li class="dropdown navbar-left user-links hidden-xs"><a href="{$link}" class="dropdown-toggle tooltip-t" data-placement="bottom" title="Publicar" data-toggle="dropdown"><i class="ion-more"></i></a>
<ul class="dropdown-menu notifications-dropdown">
  <li class="dropdown-header">Publicar</li>
  <li><a href="{$collections_link}{$collections_link_new_collection}">Crear nueva colecci&oacute;n</a></li>
  <li><a href="{$link}addsong">Subir una cancion</a></li>
  <!-- <li><a href="{$collections_link}{$collections_link_new_collection}">Subir video</a></li> -->
<!--   <li class="notifications-container" style="display: none">
    <div class="notification-contents">
      <ul>
        <li><a href="{$link}">Somebody posted in your profile</a></li>
      </ul>
    </div>
  </li> -->
<!--   <li class="white_link_dropdown"><a href="{$link}">Ver todo</a></li> -->
</ul>
</li>


<li class="visible-xs"><a href="{$collections_link}{$collections_link_new_collection}">Crear nueva coleccion</a></li>
<li class="visible-xs"><a href="{$collections_link}{$collections_link_new_collection}">Subir una cancion</a></li>
<li class="visible-xs"><a href="{$collections_link}{$collections_link_new_collection}">Subir video</a></li>

{else}
<li class="vertical-divider"></li>
{/if}

<li class="dropdown navbar-left user-links hidden-xs"><a href="{$link}" class="dropdown-toggle tooltip-t" data-placement="bottom" title="Configuracion" data-toggle="dropdown"><b class="ion-gear-a"></b></a>
<ul class="dropdown-menu">
  <li><a href="{$link}cuenta">Perfil</a></li>
  {if ($is_moderator=="true")}
  <li><a href="{$link}filemanager/">Mis archivos</a></li>
  {/if}
  <li class="divider"></li>
  <li><a href="{$link}cuenta/editar">Configuracion</a></li>
  <li><a href="{$link}?module=cuenta&dump=tempr">Cerrar Sesion</a></li>
</ul>
</li>
<li class="visible-xs"><a href="{$link}filemanager/">Mis archivos</a></li>
<li class="visible-xs"><a href="{$link}cuenta/editar">Configuracion</a></li>
<li class="visible-xs"><a href="{$link}?module=cuenta&dump=tempr">Cerrar Sesion</a></li>
{else}
<li class="visible-xs"><a href="{$link}?module=cuenta">acceder</a></li>
<li class="visible-xs"><a href="{$link}?module=cuenta&registrar">crear cuenta</a></li>
<li class="hidden-xs"><a href="{$link}?module=cuenta" class="btn btn-default btn-access btn-new-modal">acceder</a>
<ul class="dropdown-menu login-drop">
<div class="col-xs-12">

<form role="form" action="{$link}?module=cuenta" method="post">
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
<a href="{$link}?module=cuenta&registrar">Crea una cuenta</a>
</div>

</form>

</div>
</ul>
</li>
{/if}

</ul>
    </div>
  </div>
</div>