{php}
require_once 'inc/libs/Mobile_Detect.php';
$detect = new Mobile_Detect;
global $is_user, $action;
$place = isset($_GET["module"]) ? ( $_GET["module"]=="" || $_GET["module"]=="home" ? "index" : $_GET["module"] ) : "index";
if($place=="cuenta" || $place=="filemanager" || $detect->isMobile() || $detect->isTablet() || $is_user=="false" || ($place=="colecciones" && $action=="mycollections")){
  echo '<div style="visibility:hidden;opacity:0;filter:alpha(opacity=0);position: fixed; bottom: -999px;" class="noshowplayer">';
}
{/php}

<div class="player-footer-clone {php}
if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  //echo 'open '.$_COOKIE['LMI_playerVisible'];
  }
{/php}open active"></div>
<div class="navbar navbar-static-bottom player-footer {php}
if (isset($_COOKIE['LMI_playerVisible']) && $_COOKIE['LMI_playerVisible']!='false'){
  //echo 'open';
  }
{/php}open playlistopen" id="bottom" role="banner">
<div id="playerWrapper"></div>
<!-- <div class="horizontal-divider"></div> -->
<div class="container_">


<div class="col-sm-3 _controls- text-center col-xs-7 text-xs-left">
<a href="javascript:;"><i class="ion-skip-backward _control _control_prev"></i></a>
<a href="javascript:;"><i class="ion-play _control _control_play"></i></a>
<a href="javascript:;"><i class="ion-pause _control _control_pause"></i></a>
<a href="javascript:;"><i class="ion-skip-forward _control _control_next"></i></a>
</div>

<div class="col-sm-6 _controls- text-center hidden-xs">
<div class="__player_song_title">
	<span class="durationcurrent pull-left songstats text-muted"></span>
  <span class="durationtotal pull-right songstats text-muted"></span>
   <a href="javascript:;"><p class="songtitle text-center"></p></a>
	<!-- <p class="pull-right songstats text-muted"><span class="durationcurrent"></span>
    <span class="durationtotal"></span></p> -->
</div>
<span class="clearfix"></span>

</div>

<div class="col-sm-3 col-md-2 _controls- col-xs-5 right_controls">

<a href="javascript:;" class="tooltip-t toggle-playlist pull-right" title="Lista de reproducci&oacute;n" data-placement="left"><i class="ion-navicon-round _control"></i></a>

<div class="volume-controller dropup">
<a href="javascript:;" data-placement="left" class="dropdown-toggle" data-toggle="dropdown"><i class="ion-volume-medium _control"></i></a>
<ul class="dropdown-menu volumecontrollerdrop" role="menu">
    <div class="col-xs-12">
    	<span class="tooltip"></span> <!-- Tooltip -->
		<div id="volumeslider"></div> <!-- the Slider -->
		<span class="volume"></span> <!-- Volume -->
    </div>

	<span class="clearfix"></span>
  </ul>
</div>

<!-- <a href="javascript:;" class="tooltip-t" title="Mutear" data-placement="left"><i class="ion-volume-medium _mute _control"></i></a>
<a href="javascript:;" class="tooltip-t" title="Volumen" data-placement="left"><i class="ion-volume-mute _unmute _control"></i></a> -->
</div>

<span class="clearfix"></span>

<div class="__player_progress">
<div class="__player_progress_seek"></div>
<div class="__player_progress_knob"><div class="_knob"></div></div>
<div class="__player_progress_bg"></div>
<div class="__player_progress_bg_progress"></div>
</div>


</div>

<div class="__playerplaylist __scrollable_wx">
<ul id="playlistplayer" class="playlistplayer">



</ul>
<span class="clearfix"></span>
</div>

</div>
</div>

{php}
require_once 'inc/libs/Mobile_Detect.php';
$detect = new Mobile_Detect;
global $is_user, $action;
$place = isset($_GET["module"]) ? ( $_GET["module"]=="" || $_GET["module"]=="home" ? "index" : $_GET["module"] ) : "index";
if($place=="cuenta" || $place=="filemanager" || $detect->isMobile() || $detect->isTablet() || $is_user=="false" || ($place=="colecciones" && $action=="mycollections")){
  echo '</div>';
}
{/php}