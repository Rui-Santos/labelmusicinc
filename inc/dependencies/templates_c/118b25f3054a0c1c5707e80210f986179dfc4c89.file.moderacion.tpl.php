<?php /* Smarty version Smarty-3.1.18, created on 2014-08-05 09:02:55
         compiled from "inc\dependencies\templates\moderacion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:290635379782f46d134-74929404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '118b25f3054a0c1c5707e80210f986179dfc4c89' => 
    array (
      0 => 'inc\\dependencies\\templates\\moderacion.tpl',
      1 => 1407229195,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '290635379782f46d134-74929404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5379782f4aebf6_60997969',
  'variables' => 
  array (
    'is_user' => 0,
    'is_moderator' => 0,
    'is_admin' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5379782f4aebf6_60997969')) {function content_5379782f4aebf6_60997969($_smarty_tpl) {?><?php if (($_smarty_tpl->tpl_vars['is_user']->value=="true"&&$_smarty_tpl->tpl_vars['is_moderator']->value=="true"&&$_smarty_tpl->tpl_vars['is_admin']->value=="true")) {?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

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
	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Escritorio</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Usuarios</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Colecciones</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/">Canciones</a></li>
</ul></div>
</div>
</div>
</div>
</div><div class="_affixer_clone" style="height: 70px"></div><span class="clearfix"></span>';


echo '

<div class="container" style="padding-top: 50px">

<div class="row">

<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
	<div class="panel panel-default info-box">
		<div class="backgroundColor blue">
		<div class="clearfix">
			<span class="title">USUARIOS</span>
			<span class="value">ULTIMO</span>
		</div><div class="clearfix">
			<span class="date">389k</span>
			<span class="change"><a href="#">@demo</a></span>
		</div><div class="chart-info-box text-center" style="height: 50px; margin-top: 20px; padding: 0px;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/usuarios" class="btn btn-default">ver todo</a>
		</div>
		</div><div class="quarters">
		<div class="quarter q1">
			<div>1 nuevo(s) <span>Este dia</span></div>
		</div><div class="quarter q2"><div class="verticalChart"><div class="singleBar"><div class="bar">
		<div class="value" style="height: 10%;"><span>10%</span></div></div>
		<div class="title"><i class="ion-star"></i></div></div><div class="singleBar"><div class="bar">
		<div class="value" style="height: 90%;"><span>90%</span></div></div>
		<div class="title"><i class="ion-plus-circled"></i></div></div></div><div class="clearfix"></div></div>
		<div class="quarter q3"> 13 <span>Staff</span></div>
		<div class="quarter q4"> 378 <span>Ordinarios</span></div>
		<span class="clearfix"></span>
		</div>	
	</div>
</div><!--/col-->




<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
	<div class="panel panel-default info-box">
		<div class="backgroundColor orange">
		<div class="clearfix">
			<span class="title">COLECCIONES</span>
			<span class="value">ULTIMO</span>
		</div><div class="clearfix">
			<span class="date">389k</span>
			<span class="change"><a href="#">@demo</a></span>
		</div><div class="chart-info-box text-center" style="height: 50px; margin-top: 20px; padding: 0px;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/usuarios" class="btn btn-default">ver todo</a>
		</div>
		</div><div class="quarters">
		<div class="quarter q1">
			<div>1 nuevo(s) <span>Este dia</span></div>
		</div><div class="quarter q2"><div class="verticalChart"><div class="singleBar"><div class="bar">
		<div class="value" style="height: 10%;"><span>10%</span></div></div>
		<div class="title"><i class="ion-star"></i></div></div><div class="singleBar"><div class="bar">
		<div class="value" style="height: 90%;"><span>90%</span></div></div>
		<div class="title"><i class="ion-plus-circled"></i></div></div></div><div class="clearfix"></div></div>
		<div class="quarter q3"> 13 <span>Staff</span></div>
		<div class="quarter q4"> 378 <span>Ordinarios</span></div>
		<span class="clearfix"></span>
		</div>	
	</div>
</div><!--/col-->




<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
	<div class="panel panel-default info-box">
		<div class="backgroundColor red">
		<div class="clearfix">
			<span class="title">CANCIONES</span>
			<span class="value">ULTIMO</span>
		</div><div class="clearfix">
			<span class="date">389k</span>
			<span class="change"><a href="#">@demo</a></span>
		</div><div class="chart-info-box text-center" style="height: 50px; margin-top: 20px; padding: 0px;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/usuarios" class="btn btn-default">ver todo</a>
		</div>
		</div><div class="quarters">
		<div class="quarter q1">
			<div>1 nuevo(s) <span>Este dia</span></div>
		</div><div class="quarter q2"><div class="verticalChart"><div class="singleBar"><div class="bar">
		<div class="value" style="height: 10%;"><span>10%</span></div></div>
		<div class="title"><i class="ion-star"></i></div></div><div class="singleBar"><div class="bar">
		<div class="value" style="height: 90%;"><span>90%</span></div></div>
		<div class="title"><i class="ion-plus-circled"></i></div></div></div><div class="clearfix"></div></div>
		<div class="quarter q3"> 13 <span>Staff</span></div>
		<div class="quarter q4"> 378 <span>Ordinarios</span></div>
		<span class="clearfix"></span>
		</div>	
	</div>
</div><!--/col-->




<div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
	<div class="panel panel-default info-box">
		<div class="backgroundColor pink">
		<div class="clearfix">
			<span class="title">COMENTARIOS</span>
			<span class="value">ULTIMO</span>
		</div><div class="clearfix">
			<span class="date">389k</span>
			<span class="change"><a href="#">@demo</a></span>
		</div><div class="chart-info-box text-center" style="height: 50px; margin-top: 20px; padding: 0px;">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
moderacion/usuarios" class="btn btn-default">ver todo</a>
		</div>
		</div><div class="quarters">
		<div class="quarter q1">
			<div>1 nuevo(s) <span>Este dia</span></div>
		</div><div class="quarter q2"><div class="verticalChart"><div class="singleBar"><div class="bar">
		<div class="value" style="height: 10%;"><span>10%</span></div></div>
		<div class="title"><i class="ion-star"></i></div></div><div class="singleBar"><div class="bar">
		<div class="value" style="height: 90%;"><span>90%</span></div></div>
		<div class="title"><i class="ion-plus-circled"></i></div></div></div><div class="clearfix"></div></div>
		<div class="quarter q3"> 13 <span>Staff</span></div>
		<div class="quarter q4"> 378 <span>Ordinarios</span></div>
		<span class="clearfix"></span>
		</div>	
	</div>
</div><!--/col-->








</div>







<div class="row">		
				
				<div class="col-lg-4 col-md-4">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-check"></i>To Do List</h2>
							<div class="panel-actions">
								<a href="index.html#" class="btn-setting"><i class="fa fa-wrench"></i></a>
								<a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
							<span class="clearfix"></span>
						</div>
						<div class="panel-body" style="display: block;">
							<div class="todo">
								<ul class="todo-list ui-sortable">
									<li style="display: none;">
										<span class="todo-actions" style="opacity: 0.25;">
											<a href="index.html#"><i class="fa fa-check done"></i></a>
										</span>
										<span class="desc" style="opacity: 0.25; text-decoration: line-through;">Windows Phone 8 App</span> 
										<span class="label label-danger" style="opacity: 0.25;">today</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>					
									</li>
									<li style="display: none;">
										<span class="todo-actions" style="opacity: 0.25;">
											<a href="index.html#"><i class="fa fa-check done"></i></a>
										</span>
										<span class="desc" style="opacity: 0.25; text-decoration: line-through;">New frontend layout</span>
										<span class="label label-danger" style="opacity: 0.25;">today</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>	
									</li>
									<li>
										<span class="todo-actions">
											<a href="index.html#"><i class="fa fa-check"></i></a>
										</span>
										<span class="desc">Hire developers</span>
										<span class="label label-warning">tommorow</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>	
									</li>
									<li>
										<span class="todo-actions">
											<a href="index.html#"><i class="fa fa-check"></i></a>
										</span>
										<span class="desc">Windows Phone 8 App</span>
										<span class="label label-warning">tommorow</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>	
									</li>
									<li>
										<span class="todo-actions">
											<a href="index.html#"><i class="fa fa-check"></i></a>
										</span>
										<span class="desc">New frontend layout</span>
										<span class="label label-success">this week</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>	
									</li>
									<li>
										<span class="todo-actions">
											<a href="index.html#"><i class="fa fa-check"></i></a>
										</span>
										<span class="desc">Hire developers</span>
										<span class="label label-success">this week</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>	
									</li>
									<li>
										<span class="todo-actions">
											<a href="index.html#"><i class="fa fa-check"></i></a>
										</span>
										<span class="desc">New frontend layout</span>
										<span class="label label-info">this month</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>	
									</li>
									<li>
										<span class="todo-actions">
											<a href="index.html#"><i class="fa fa-check"></i></a>
										</span>
										<span class="desc">Hire developers</span>
										<span class="label label-info">this month</span>
										<a class="remove" href="index.html#"><i class="fa fa-times"></i></a>	
									</li>
								</ul>
							</div>	
						</div>
					</div>

				</div><!--/col-->
				
				<div class="col-lg-8 col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-list"></i>Recent</h2>
							<div class="panel-actions">
								<a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
							<ul class="nav nav-tabs" id="recent">
							  	<li class=""><a href="index.html#tickets">Tickets</a></li>
							  	<li class="active"><a href="index.html#users">Users</a></li>
							  	<li class=""><a href="index.html#comments">Comments</a></li>
							</ul>
						<span class="clearfix"></span>
						</div>
						<div class="panel-body no-padding">
							
							<div class="tab-content">
							  	<div class="tab-pane" id="tickets">
									<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-lg-6"></div><div class="col-lg-6"></div></div><table class="table bootstrap-datatable datatable small-font dataTable" id="DataTables_Table_1">
										<thead>
											<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Status: activate to sort column descending" style="width: 101px;">Status</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 148px;">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 161px;">Description</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 120px;">User</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Number: activate to sort column ascending" style="width: 87px;">Number</th></tr>
										</thead>   
										
									<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
												<td class=" sorting_1"><span class="label label-success">Complete</span></td>
												<td class=" ">Jul 25, 2012 11:09</td>
												<td class=" ">Server problem</td>
												<td class=" ">Ashley Tan</td>
												<td class=" "><b>[#199278]</b></td>
											</tr><tr class="even">
												<td class=" sorting_1"><span class="label label-success">Complete</span></td>
												<td class=" ">Jul 25, 2012 11:09</td>
												<td class=" ">Mobile App Problem</td>
												<td class=" ">Agnes Young</td>
												<td class=" "><b>[#199274]</b></td>
											</tr><tr class="odd">
												<td class=" sorting_1"><span class="label label-info">In progress</span></td>
												<td class=" ">Jul 25, 2012 11:09</td>
												<td class=" ">Paypal Issue</td>
												<td class=" ">Chris Dan</td>
												<td class=" "><b>[#199276]</b></td>
											</tr><tr class="even">
												<td class=" sorting_1"><span class="label label-info">In progress</span></td>
												<td class=" ">Jul 25, 2012 11:09</td>
												<td class=" ">Mobile App Problem</td>
												<td class=" ">Melanie Brown</td>
												<td class=" "><b>[#199272]</b></td>
											</tr><tr class="odd">
												<td class=" sorting_1"><span class="label label-danger">Rejected</span></td>
												<td class=" ">Jul 25, 2012 11:09</td>
												<td class=" ">IE7 Problem</td>
												<td class=" ">John Grand</td>
												<td class=" "><b>[#199275]</b></td>
											</tr><tr class="even">
												<td class=" sorting_1"><span class="label label-warning">Suspended</span></td>
												<td class=" ">Jul 25, 2012 11:09</td>
												<td class=" ">Mobile App Problem</td>
												<td class=" ">Ann Kovalsky</td>
												<td class=" "><b>[#199277]</b></td>
											</tr><tr class="odd">
												<td class=" sorting_1"><span class="label label-warning">Suspended</span></td>
												<td class=" ">Jul 25, 2012 11:09</td>
												<td class=" ">Mobile App Problem</td>
												<td class=" ">Patricia Doyle</td>
												<td class=" "><b>[#199273]</b></td>
											</tr></tbody></table><div class="row"><div class="col-lg-12"></div><div class="col-lg-12 center"></div></div></div>
							  	</div>
							  	<div class="tab-pane active" id="users">
									<ul class="users-list">
										<li>
											<a href="index.html#">
												<img class="avatar" alt="Lucas" src="assets/img/avatar.jpg">
											</a>
											<div class="name">Łukasz Holeczek 
												<div class="dropdown pull-right">
													<a class="fa fa-cogs" data-toggle="dropdown" href="index.html#"></a>
													<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
														<li><a href="index.html#"><i class="fa fa-check"></i> Accept</a></li>
														<li><a href="index.html#"><i class="fa fa-times"></i>Reject</a></li>
														<li><a href="index.html#"><i class="fa fa-minus-square-o"></i>Block</a></li>
														<li><a href="index.html#"><i class="fa fa-trash-o"></i>Delete</a></li>
													</ul>
												</div>
											</div>
											<span class="place"><i class="fa fa-map-marker"></i>Mikolow, POLAND</span>                                 
										</li>
										
									</ul>
							  	</div>
							  	<div class="tab-pane" id="comments">
							  		<ul class="comments-list">
										<li>
											<a href="index.html#">
												<img class="avatar" alt="Lucas" src="assets/img/avatar.jpg">
											</a>
											<div>
												<strong>Łukasz Holeczek</strong> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
											</div>
											<div class="date">4 minutes ago</div>
										</li>
										<li>
											<a href="index.html#">
												<img class="avatar" alt="Bill" src="assets/img/avatar9.jpg">
											</a>
											<div>
												<strong>Bill Cole</strong> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
											</div>
											<div class="date">22 hours ago</div>	                                
										</li>
										<li>
											<a href="index.html#">
												<img class="avatar" alt="Jane" src="assets/img/avatar5.jpg">
											</a>
											<div>
												<strong>Jane Sanchez</strong> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
											</div>
											<div class="date">2 days ago</div>		                                  
										</li>
										<li>
											<a href="index.html#">
												<img class="avatar" alt="Kate" src="assets/img/avatar6.jpg">
											</a>
											<div>
												<strong>Kate Presley</strong> - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
											</div>
											<div class="date">10 days ago</div>	                                  
										</li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>	
				</div><!--/col-->
				
			</div>










</div>

';




}else{
include("denied.tpl");
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ("denied.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php }} ?>
