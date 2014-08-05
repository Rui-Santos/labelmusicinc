{php}
if(isset($_REQUEST['do'])){
$action=$_REQUEST['do'];
$actions="stats"||"collections"||"users"||"pages"||"customize"||"settings";
function getActive($action,$compare){
	return $action==$compare ? 'class="active"' : '';
}
echo '<li><a href="{$moderation_link}"><i class="fa fa-home"></i> Estadisticas</a></li>
<li '. getActive($action,'collections') .'><a href="{$moderation_link_collections}"><i class="fa fa-heart"></i> Colecciones</a></li>
<li '. getActive($action,'users') .'><a href="{$moderation_link_users}"><i class="fa fa-user"></i> Usuarios</a></li>
<li '. getActive($action,'pages') .'><a href="{$moderation_link_pages}"><i class="fa fa-file"></i> P&aacute;ginas</a></li>
<li '. getActive($action,'settings') .'><a href="{$moderation_link_settings}"><i class="fa fa-cogs"></i> Configuracion</a></li>';
}else{
echo '<li class="active"><a href="{$moderation_link}"><i class="fa fa-home"></i> Estadisticas</a></li>
<li><a href="{$moderation_link_collections}"><i class="fa fa-heart"></i> Colecciones</a></li>
<li><a href="{$moderation_link_users}"><i class="fa fa-user"></i> Usuarios</a></li>
<li><a href="{$moderation_link_pages}"><i class="fa fa-file"></i> P&aacute;ginas</a></li>
<li><a href="{$moderation_link_settings}"><i class="fa fa-cogs"></i> Configuracion</a></li>';
}
{/php}