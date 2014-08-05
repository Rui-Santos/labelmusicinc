<?php
// $app = new Smarty;
$action = isset($_GET['dump']) ? $_GET['dump'] : "";
if($action!=""){
	switch($action){
		case "temp":
			// $_SESSION['is_user'] = "true";
			if($_SERVER['HTTP_REFERER']!=null){
				header("Location: ".$_SERVER['HTTP_REFERER'] . '&ref&msg=1');
			}else{
				header("Location: ./" . '&ref&msg=1');
			}
			break;
		case "tempr":
			unset($_SESSION['is_user']);
			unset($_SESSION['user']);
			unset($_SESSION['user_id']);
			unset($_COOKIE['username']);
			unset($_SESSION['is_moderator']);
			unset($_SESSION['is_admin']);
			if($_SERVER['HTTP_REFERER']!=null){
				header("Location: ".$_SERVER['HTTP_REFERER'] . '&ref&msg=3');
			}else{
				header("Location: ./" . '&ref&msg=3');
			}
			break;
	}
}


?>