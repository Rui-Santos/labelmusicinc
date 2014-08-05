{if ($is_user=="true" && $is_moderator=="true")}


<div class="container _p">
<div class="_p_t">
<div class="col-xs-8">
	<h1><a href="#">Moderacion</a> <span>Centro de moderacion</span></h1>
</div>
<div class="col-xs-4 text-right">
{php}
require_once('inc/dependencies/class/perfil.php');
if(User::isOnlineAdmin()!=false){
$perfil = User::Perfil(User::isOnlineAdmin());
	if($perfil!="false" || $perfil!=false){
		echo '<a href="'.$profile_link.$perfil["nick"].'" class="tooltip-t _user_pic_small" title="'.$perfil["nick"].'"><img src="'.$perfil["picture"].'" /></a>';
	}
}else{
	header("Location ./?module=index");
}
{/php}
</div>
<span class="clearfix"></span>
</div>

<div class="_p_b">
<div class="_pager">
<div class="row">
	<div class="_pager_tabs small">
		<ul>
			{include file="menu.moderation.tpl"}
		</ul>
			<span class="clearfix"></span>
	</div>
</div>
</div>
</div>

<span class="clearfix"></span>






{* moderation actions *}
<div class="col-sm-9 col-md-10">
{if ($is_action)}

{* check what action *}
{if ($action=='users')}
<h2 class="_t_M">Usuarios <small>Control de usuarios</small></h2>
<span class="clearfix"></span>
<div class="_t_M_m">
<ul>
<li class="active"><a href="{$moderation_link_collections}">Todos</a></li>
<li><a href="{$moderation_link_collections_published}">Nuevos</a></li>
<li><a href="{$moderation_link_collections_drafted}">Activos</a></li>
<li><a href="{$moderation_link_collections_deleted}">Baneados</a></li>
</ul>
<span class="clearfix"></span>
</div>

<span class="clearfix"></span>

<div class="_i_l">


</div>



{elseif ($action=='collections')}
<h2 class="_t_M">Colecciones <small>Colecciones y albums por los creadores</small></h2>
<span class="clearfix"></span>
<div class="_t_M_m">
<ul>
<li class="active"><a href="{$moderation_link_collections}">Todo</a></li>
<li><a href="{$moderation_link_collections_published}">Publicadas</a></li>
<li><a href="{$moderation_link_collections_drafted}">Borradores</a></li>
<li><a href="{$moderation_link_collections_deleted}">Eliminadas</a></li>
<span class="clearfix"></span>
</ul>
</div>

<div class="row _i_l">
{php}
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
{/php}
</div>



{/if}


{* check what action *}

{else}

<h2 class="_t_M">Estadisticas <small>Informe de usuarios y publicaciones</small></h2>
<span class="clearfix"></span>
<div class="_t_M_m">
<ul>
<li class="active"><a href="{$moderation_link_collections}">Todo</a></li>
<li><a href="">Usuarios</a></li>
<li><a href="">Colecciones</a></li>
<li><a href="">Canciones</a></li>
<span class="clearfix"></span>
</ul>
</div>
<div class="_i_l">
</div>
{/if}

</div>
</div>
</div>

<span class="clearfix"></span>


{* moderation actions *}


{else}
{include file="denied.tpl"}
{/if}
