<?php


$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'labelmusicinc';


$is_user = isset($_SESSION['is_user']) ? true : false;
$is_moderator = isset($_SESSION['is_moderator']) ? $_SESSION['is_moderator'] : "false";
if($is_user){
	$user = $_SESSION['user'];
}


class DB{
	public function connect(){
		global $db_host, $db_user, $db_password, $db_name, $mysql;
		$mysql = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die('Could not connect: '.mysql_error());
	}


	public static function IsNullOrEmptyString($question){
	    return (!isset($question) || trim($question)==='');
	}

	public static function validateEMAIL($EMAIL) {
	    // $v = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
	    return filter_var($EMAIL, FILTER_VALIDATE_EMAIL);
	}

	public static function validUsername($str) 
	{
	    return preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',$str);
	}

}


?>