<?php /* Smarty version Smarty-3.1.18, created on 2014-08-05 07:09:26
         compiled from "inc\dependencies\templates\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9712536ce55986b073-25607884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd167eed9401e4fafa9f61c2725136880b24a5067' => 
    array (
      0 => 'inc\\dependencies\\templates\\footer.tpl',
      1 => 1407222561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9712536ce55986b073-25607884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_536ce55987aa90_26787387',
  'variables' => 
  array (
    'path' => 0,
    'link' => 0,
    'is_user' => 0,
    'is_action' => 0,
    'action' => 0,
    'is_show' => 0,
    'show' => 0,
    'user_id' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536ce55987aa90_26787387')) {function content_536ce55987aa90_26787387($_smarty_tpl) {?></div></div><div class="home_footer"><div class="container"><div class="row"><div class="text-center text-xs-center left_links">
<p>&copy; <?php echo date('Y');?>
 Label Music Inc. Todos los Derecho Reservados.</p>
<p class="social_links_footer">
<a href="//fb.me/"><i class="ion-social-facebook"></i></a>
<a href="//fb.me/"><i class="ion-social-twitter"></i></a>
</p>
<span class="clearfix"></span></div></div></div><span class="clearfix"></span></div><div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"></div></div></div><div class="loadingNotif" style="display: none">Obteniendo datos...</div><div class="globalValues">
<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

require_once('inc/class.php');
global $user, $user_id, $is_user, $categorias;
echo '<input type="hidden" name="lmi-categories" value="'.implode(',',$categorias).'" />';
echo '<input type="hidden" name="lmi-session" value="'.$is_user.'" />';
echo '<input type="hidden" name="lmi-owner" value="'.$user_id.'" />';
echo '<input type="hidden" name="lmi-owner-name" value="'.$user.'" />';
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div><script src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
js/jquery.min.js"></script><script src="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
res.php?l=assets/js/bootstrap.min|assets/js/jquery.backstretch.min|assets/js/pageslide|assets/js/classie|assets/js/jquery-ui.min|assets/plugins/player/jquery.jplayer.min|assets/js/pace.min|assets/js/jquery.mCustomScrollbar.concat.min|assets/js/carousel.min|assets/plugins/director/director.min|assets/js/app&extend=.js"></script>
<?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true"&&$_smarty_tpl->tpl_vars['is_action']->value&&(($_smarty_tpl->tpl_vars['action']->value=="mycollections"&&$_smarty_tpl->tpl_vars['is_show']->value&&$_smarty_tpl->tpl_vars['show']->value=="create")||($_smarty_tpl->tpl_vars['action']->value=="editar")||($_smarty_tpl->tpl_vars['action']->value=="cambiarfoto")))) {?>
<script src="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
res.php?l=assets/plugins/plupload/plupload.full.min|assets/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue"></script><script src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
js/upload.controller.js"></script>
<?php }?><script>LMI.path=window.location.protocol + '<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
';LMI.link=window.location.protocol+'<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
';LMI.values.session='<?php echo $_smarty_tpl->tpl_vars['is_user']->value;?>
';LMI.values.owner='<?php if (($_smarty_tpl->tpl_vars['is_user']->value!="false")) {?><?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
<?php } else { ?>0<?php }?>';LMI.values.owner_name='<?php if (($_smarty_tpl->tpl_vars['is_user']->value!="false")) {?><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
<?php } else { ?>0<?php }?>';</script>
<?php if (($_smarty_tpl->tpl_vars['is_action']->value&&($_smarty_tpl->tpl_vars['action']->value=="coleccion"||$_smarty_tpl->tpl_vars['action']->value=="song"))) {?>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script><script type="text/javascript">stLight.options({publisher: "25879778-a73e-402c-9bc3-147d3920b22e", doNotHash: false, doNotCopy: true, hashAddressBar: false});</script>
<?php }?>
</body>
</html><?php }} ?>
