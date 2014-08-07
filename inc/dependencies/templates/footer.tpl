</div></div><div class="home_footer"><div class="container"><div class="row"><div class="text-center text-xs-center left_links">
<p>&copy; {'Y'|date} Label Music Inc. Todos los Derecho Reservados.</p>
<p class="social_links_footer">
<a href="//fb.me/"><i class="ion-social-facebook"></i></a>
<a href="//fb.me/"><i class="ion-social-twitter"></i></a>
</p>
<span class="clearfix"></span></div></div></div><span class="clearfix"></span></div><div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"></div></div></div><div class="loadingNotif" style="display: none">Obteniendo datos...</div><div class="globalValues">
{php}
require_once('inc/class.php');
global $user, $user_id, $is_user, $categorias;
echo '<input type="hidden" name="lmi-categories" value="'.implode(',',$categorias).'" />';
echo '<input type="hidden" name="lmi-session" value="'.$is_user.'" />';
echo '<input type="hidden" name="lmi-owner" value="'.$user_id.'" />';
echo '<input type="hidden" name="lmi-owner-name" value="'.$user.'" />';
{/php}
</div><script src="{$path}js/jquery.min.js"></script><script src="{$link}res.php?l=assets/js/bootstrap.min|assets/js/jquery.backstretch.min|assets/js/pageslide|assets/js/classie|assets/js/jquery-ui.min|assets/plugins/player/jquery.jplayer.min|assets/js/pace.min|assets/js/jquery.mCustomScrollbar.concat.min|assets/js/carousel.min|assets/plugins/director/director.min|assets/js/app&extend=.js"></script>
{if ($is_user=="true" && $is_action && ( ($action=="mycollections" && $is_show && $show=="create") || ($action=="editar")  || ($action=="cambiarfoto") ))}
<script src="{$link}res.php?l=assets/plugins/plupload/plupload.full.min|assets/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue"></script><script src="{$path}js/upload.controller.js"></script>
{/if}{literal}<script>LMI.path=window.location.protocol + '{/literal}{$path}{literal}';LMI.link=window.location.protocol+'{/literal}{$link}{literal}';LMI.values.session='{/literal}{$is_user}{literal}';LMI.values.owner='{/literal}{if ($is_user!="false")}{$user_id}{else}0{/if}{literal}';LMI.values.owner_name='{/literal}{if ($is_user!="false")}{$user}{else}0{/if}{literal}';</script>{/literal}
{if ($is_action && ($action=="coleccion" || $action=="song"))}
{literal}<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher: "25879778-a73e-402c-9bc3-147d3920b22e", doNotHash: false, doNotCopy: true, hashAddressBar: false});</script>{/literal}
{/if}
</body>
</html>