<?php 
session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

//index file
require_once("inc/settings.php");
require_once("inc/class.php");
require_once("inc/dependencies/class/perfil.php");



if(isset($_GET['song'])){
	if($is_id && $id!=null){
		$song = Collections::fetchSongInfo($id, true);
		if($song!=false){
			echo $song;
		}else{
			echo '{"status": "failed", "error": "song not found"}';
		}
	}else{
		echo '{"status": "failed", "error": "song not found bc didnt specify its ID"}';
	}
}else if(isset($_GET['collection'])){
	if($is_id && $id!=null){
		$collection = Collections::fetch($id);
		if($collection!=false){
			$songs = Collections::fetchSongs($id);
			$collection["songs"] = $songs;
			echo json_encode($collection);
		}else{
			echo '{"status": "failed", "error": "collection not found"}';
		}
	}else{
		echo '{"status": "failed", "error": "collection not found bc didnt specify its ID"}';
	}
}else if(isset($_GET['collections'])){
	$user = $is_id && $id!=null ? $id : 'all';
	$from = isset($_GET['from']) && $_GET['from']!=null ? $_GET['from'] : 0;
	$to = isset($_GET['to']) && $_GET['to']!=null ? $_GET['to'] : 10;

		$collection = Collections::getcollections($user,$from,$to);
		if($collection!=false){
			echo json_encode($collection);
		}else{
			echo '{"status": "failed", "error": "collections not found"}';
		}
}else if(isset($_GET['comments'])){
	// getComments($id,$type,$is_json=false,$user='all',$from=0,$to=10)
	$content_id = $is_id && $id!=null ? $id : -1;
	$content_type = isset($_GET['type']) && $_GET['type']!=null ? $_GET['type'] : 0;
	$from = isset($_GET['from']) && $_GET['from']!=null ? $_GET['from'] : 0;
	$to = isset($_GET['to']) && $_GET['to']!=null ? $_GET['to'] : 10;

		$comments= Collections::getComments($content_id,$content_type,false,false,$from,$to);
		if($comments!=false){
			echo json_encode($comments);
		}else{
			echo '{"status": "failed", "error": "no commnets found"}';
		}
}else if(isset($_GET['postComment'])){
	// getComments($id,$type,$is_json=false,$user='all',$from=0,$to=10)
	// echo json_encode($_REQUEST);
	$user_id = isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=null ? $_REQUEST['user_id'] : $user_id;
	$content_id = isset($_REQUEST['content_id']) && $_REQUEST['content_id']!=null ? $_REQUEST['content_id'] : false;
	$content_type = isset($_REQUEST['content_type']) && $_REQUEST['content_type']!=null ? $_REQUEST['content_type'] : 0;
	$comment_body = isset($_REQUEST['comment']) && $_REQUEST['comment']!=null ? $_REQUEST['comment'] : false;
	
	if($content_id!=false && $comment_body!=false){
		$comments= Collections::insertComments($content_id,$content_type,$user_id,$comment_body);
		if($comments!=false){
			echo json_encode($comments);
		}else{
			echo '{"status": "failed", "error": "something occured"}';
		}

	}else{
		echo '{"status": "failed", "error": "content not specified"}';
	}
}else if(isset($_GET['user'])){
	if($is_id && $id!=null){
		$loadbyid = false;

		$sid = is_numeric($id);
		if($sid){
			$loadbyid = true;
		}
		$pass="";
		$postdata="";

		global $is_user, $user_id, $is_moderator, $is_action, $action;


		if($is_action!=false && $action=='checkpass' && (isset($_POST['opassword']) && $_POST!=null)){
			$postdata = $_POST;
			$user = User::getUserInfo($id,$loadbyid,false,'password',$postdata);
		}else if($is_action!=false && $action=='updatecountry' && isset($_POST['ocountry']) && $_POST!=null){
			$postdata = $_POST;
			$user = User::getUserInfo($id,$loadbyid,false,'country',$postdata);
		}else{
			$user = User::getUserInfo($id,$loadbyid);
		}



		if($user!=false){
			$user['range'] = 'publisher';
			$user['post'] = $postdata;
			echo json_encode($user);
			// array_push($_POST, $is_action, $action);
			// echo json_encode($_POST);
			// print_r($_POST);
		}else if($user==1){
			echo '{"status": "nochanged", "error": "something occured"}';
		}else{
			echo '{"status": "failed", "error": "something occured"}';
		}

	}else{
		echo '{"status": "failed", "error": "content not specified"}';
	}
	
	
}



?>