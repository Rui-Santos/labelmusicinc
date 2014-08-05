<?php
//perfil


if (is_file('inc/class.php'))
{
    require_once('inc/class.php');
}else{
	require_once('../../inc/class.php');
}

global $link;

$login_link = $link . "cuenta";
$register_link = $link . "?module=cuenta&registrar";
$profile_link = $link . "@";
$GLOBALS['profile_link'] = $profile_link;

$is_user = isset($_SESSION['is_user']) ? true : false;
$is_moderator = isset($_SESSION['is_moderator']) ? true : false;
$user=null;$username=null;
$GLOBALS['user'] = null;
if($is_user){
$GLOBALS['user'] = $_SESSION['user'];
$GLOBALS['username'] = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$GLOBALS['user_id'] = $user_id;
}

$GLOBALS['is_user'] = $is_user;
$GLOBALS['is_moderator'] = $is_moderator;


class User{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public static function getUserInfo($user,$byid=true,$is_json=false,$checkpassword=false,$passwordString=array()){
		global $is_user,$mysql,$link, $is_moderator, $is_user, $user_id;
		$c=new DB;$c->connect();
		$userInfo = false;
		$password = "";
		$q="";
		$byid=is_numeric($user);
		// if($byid){
			$q=mysqli_query($mysql,"SELECT user_id as uid, user_password, user_email, user_fullname, user_range, user_username, user_country_id, user_bio, (select uploads.upload_file_unique from uploads INNER JOIN user ON uploads.upload_id=user.user_profile_photo_id WHERE uploads.upload_user_id=user_id) as upload_file_unique, (select count(*) from posts where post_user_id=uid) as songs, (select count(*) from collections where collection_user_id=uid) as collections, user_profile_photo_id, youtube_url, website_url, facebook_url, twitter_url, soundcloud_url, vimeo_url FROM user WHERE user.user_id='{$user}' OR user.user_username='{$user}'");
		// }else{
		// 	$q=mysqli_query($mysql,"SELECT user_id as uid, user_password, user_email, user_fullname, user_range, user_username, user_country_id, user_bio, (select uploads.upload_file_unique from uploads INNER JOIN user ON uploads.upload_id=user. WHERE uploads.upload_user_id=uid) as upload_file_unique, (select count(*) from posts where post_user_id=uid) as songs, (select count(*) from collections where collection_user_id=uid) as collections, user_profile_photo_id FROM user WHERE user.user_username='{$user}'");
		// }
	

		if($q && count(mysqli_num_rows($q))>0){
			while($row=mysqli_fetch_array($q)){
				$password = $row['user_password'];
				$userInfo = array(
					'id'=>				$row['uid'],
					'email'=>			$row['user_email'],
					'name'=>			$row['user_fullname'],
					'range'=>			$row['user_range'],
					'username'=>		$row['user_username'],
					'country'=>			$row['user_country_id'],
					'songs'=>			$row['songs'],
					'collections'=>		$row['collections'],
					'photo_id'=>		$row['user_profile_photo_id'],
					'website_url'=>		$row['website_url'],
					'facebook_url'=>	$row['facebook_url'],
					'twitter_url'=>		$row['twitter_url'],
					'soundcloud_url'=>	$row['soundcloud_url'],
					'youtube_url'=>		$row['youtube_url'],
					'vimeo_url'=>		$row['vimeo_url'],
					'bio'=>				($row['user_bio']!=null ? $row['user_bio'] : ""),
					'profile_picture'=>	($row['user_profile_photo_id']!=null && $row['user_profile_photo_id']!=0 ? ($row['upload_file_unique']!=null ? $link.'usercontent/media/'.$row['uid'].'/thumb_'.$row['upload_file_unique'] : $link.'assets/image/_usr_pc.jpg') : $link.'assets/image/_usr_pc.jpg')
					);
			}
			mysqli_free_result($q);
			

			if($checkpassword!=false && $checkpassword=='password' && count($passwordString>0) && $is_user!=false && ($user_id==$userInfo['id'] || $is_moderator!="false")){
				// md5($vars["password"].$sqlvars[0])
				$cpw = md5($passwordString['opassword'].$userInfo['email']);
				if($cpw==$password){
					$npw=md5($passwordString['npassword'].$userInfo['email']);
					if ($byid) {
						$s=mysqli_query($mysql,"UPDATE user SET user_password='{$npw}' WHERE user.user_id='{$user}'");
					}else{
						$s=mysqli_query($mysql,"UPDATE user SET user_password='{$npw}' WHERE user.user_username='{$user}'");
					}
					mysqli_close($mysql);

					if($s){
						$userInfo=$userInfo;
					}else{
						$userInfo==1;
					}
				}else{
					$userInfo = false;
				}
			}else if($checkpassword!=false && $checkpassword=='country' && count($passwordString>0) && $is_user!=false && ($user_id==$userInfo['id'] || $is_moderator!="false")){
					$q="";
					$sc=$passwordString['ncountry'];
				
					$s=mysqli_query($mysql,"UPDATE user SET user_country_id='{$sc}' WHERE user_id='{$userInfo['id']}'");
					
					mysqli_close($mysql);

					if($s){
						$userInfo=$userInfo;
					}else{
						$userInfo=false;
					}
				
			}else{
				//
				mysqli_close($mysql);
			}

			if($is_json){
				$userInfo = json_encode($userInfo);
			}
		return $userInfo;
		}else{
			// return array('byid'=>$byid);
			// return mysqli_error();
			return false;
		}
	}







	public static function updateUserInfo($vars){
		global $mysql, $db_rows, $profile_link;
		$c=new DB;$c->connect();
		$bio = DB::sanitise($vars['bio']);
		$email=$vars['email'];
		$fullname=$vars['fullname'];
		$userid=$vars['userid'];
		$q = mysqli_query($mysql, "UPDATE user SET user_email='{$email}', user_fullname='{$fullname}', user_bio='{$bio}' WHERE user_id='{$userid}'");
		if($q){

			mysqli_close($mysql);

			return true;

		}else{
			return false;
		}
	}

	public static function updateUserPic($vars){
		global $mysql, $db_rows, $profile_link;
		$c=new DB;$c->connect();
		$picture=$vars['picture_id'];
		$userid=$vars['userid'];
		$q = mysqli_query($mysql, "UPDATE user SET user_profile_photo_id='{$picture}' WHERE user_id='{$userid}'");
		if($q){

			mysqli_close($mysql);

			return true;

		}else{
			return false;
		}
	}

	public static function updateUserNetworks($data,$userid){
		global $mysql, $db_rows, $profile_link;
		$c=new DB;$c->connect();
		$data_contructor = "";
		foreach ($data as $clave => $valor) {
		    $data_contructor .= "$clave='$valor',";
		}
		$data_contructor = substr($data_contructor, 0, (strlen($data_contructor)-1));
		$q = mysqli_query($mysql, "UPDATE user SET {$data_contructor} WHERE user_id='{$userid}'");
		if($q){

			mysqli_close($mysql);

			return true;

		}else{
			return false;
		}
	}






	public static function updateUsername($uid,$nuname){
		global $mysql, $db_rows, $profile_link,$is_user;
		$c=new DB;$c->connect();
		if(DB::validUsername($nuname)){
			$q = mysqli_query($mysql, "UPDATE user SET user_username='{$nuname}' WHERE user_id='{$uid}'");
			if($q){
				$_SESSION['user'] = $nuname;
				mysqli_close($mysql);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

	}







	public static function isOnlineAdmin(){
		global $is_user, $user, $is_moderator, $path;
		if($is_user && $is_moderator){
			$profile = $user;
			return $profile;
		}else{
			return false;
		}
	}


	public static function Perfil($username){
		global $is_user, $user, $is_moderator, $path;
		$c=new DB;$c->connect();
		$profile = array(
				"picture"	=> $path.'image/_usr_pc.jpg',
				"nick"		=> $user
				);
		return $profile;
	}



















	public static function insert($vars){
		global $mysql, $db_rows, $profile_link;
		DB::connect();
		$_birth = $vars['birthday']['year'].'-'.$vars['birthday']['month'].'-'.$vars['birthday']['day'];
		$q = mysqli_query($mysql, "INSERT INTO user(user_username, user_email, user_password, user_fullname, user_range, user_genre, user_country_id, user_address, user_birth, user_is_fb_account) VALUES('{$vars['username']}', '{$vars['email']}', '{$vars['password_']}', '{$vars['fullname']}', '0', '{$vars['gender']}', '{$vars['country']}', '{$vars['address']}', '{$_birth}', '{$vars['is_facebook']}')");
		if($q){
			$u_id = mysqli_insert_id($mysql);
			mysqli_free_result($q);
			mysqli_close($mysql);

			$_SESSION['is_user'] = "true";
			$_SESSION['user'] = $vars['username'];
			$_SESSION['user_id'] = $u_id;
			$_SESSION['username'] = $vars['fullname'];
			header("Location: ".$profile_link.$vars['username'] . '&ref&msg=2');
		}else{
			echo mysql_error();
		}
	}


	public static function getVars($vars){
		global $mysql, $db_rows, $profile_link;
		// DB::connect();
		$dbc=new DB;
		$dbc->connect();
		$errors = 0;
		$errors_labels = "";
		$sqlvars = array();
		$q = mysqli_query($mysql, "SELECT * FROM user WHERE user_username='{$vars['name']}'");
		if($q){
			$num = mysqli_num_rows($q);
			if($num>0){
				while ($row=mysqli_fetch_row($q))
			    {
			    $sqlvars[0]=$row[2]; //email
			    $sqlvars[1]=$row[3]; //bd password
			    $sqlvars[3]=(int) $row[6]; //range
			    $sqlvars[4]=$row[0]; //range
			    $sqlvars[5]=$row[5]; //range
			    }
			    $sqlvars[2] = md5($vars["password"].$sqlvars[0]);
			    //compare local password with bd password
			    if($sqlvars[2]==$sqlvars[1]){
			    	$_SESSION['is_user'] = "true";
			    	$_SESSION['is_admin'] = "false";
			    	if($sqlvars[3]>0){
			    		$_SESSION['is_moderator'] = "true";
			    		if($sqlvars[3]>1){
				    		$_SESSION['is_admin'] = "true";
			    		}
			    	}else{
			    		$_SESSION['is_moderator'] = "false";
			    	}
					$_SESSION['user'] = $vars['name'];
					$_SESSION['user_id'] = $sqlvars[4];
					$_SESSION['username'] = $sqlvars[5];
					if($vars['remember']=="true" || $vars['remember']==true){
						$expire=time()+60*60*24*30;
						setcookie("is_user", "true", $expire);
						setcookie("user", $vars['name'], $expire);
					}else{
						if(isset($_COOKIE['is_user'])){
							unset($_COOKIE['is_user']);
						}
					}

					if($_SERVER['HTTP_REFERER']!=null){
						header("Location: ".$_SERVER['HTTP_REFERER'] . '&ref&msg=1');
					}else{
						header("Location: ".$profile_link.$vars['name'] . '&ref&msg=1');
					}
					return true;
			    }else{
		    	return '<div class="alert alert-danger text-left alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Algo esta mal!</h4> <ol><li>La clave de usuario es incorrecta :(. Intenta nuevamente!</li></ol></div>';

			    }
			}else{
				$errors = $errors + 1;
				return '<div class="alert alert-danger text-left alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Algo esta mal!</h4> <ol><li>El nombre de usuario o la contrase&ntilde;a son inv&aacute;lidos! porfavor intenta nuevamente.</li></ol></div>';
			}
			mysqli_free_result($q);
			mysqli_close($mysql);
		}else{
			return '<div class="alert alert-danger text-left alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Algo esta mal!</h4> <ol><li>El nombre de usuario o la contrase&ntilde;a son inv&aacute;lidos! porfavor intenta nuevamente.</li></ol></div>';
		}
	}









	public static function LoginCheck(){
		$__db=new DB;
		$errors_labels = "";
		$errors = 0;

		$login_vars = array(
				"name"=> "_login_n",
				"password"=>"_login_p",
				"remember"=>"_login_r"
			);

		$login_vars_ = array(
				"name"=> "",
				"password"=>"",
				"remember"=>"false"
			);



		if($__db->IsNullOrEmptyString($_POST[$login_vars["name"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Nombre de usuario inv&aacute;lido</li>";	
		}


		if(isset($_POST[$login_vars["remember"]])){
			$login_vars["remember"]="true";
		}else{
			$login_vars["remember"]="false";
		}




		//check password valid
		if($__db->IsNullOrEmptyString($_POST[$login_vars["password"]]) || (strlen($_POST[$login_vars["password"]])<6)){
			$errors = $errors + 1;
			$errors_labels .= "<li>Contrase&ntilde;a incorrecta</li>";	
		}




		if($errors>0){
			return '<div class="alert alert-danger _nR"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="container"><h4>Algo esta mal!</h4> <ol>' . $errors_labels . '</ol></div></div>';
		}else{
			$login_vars_["name"]=$_POST[$login_vars["name"]];
			$login_vars_["password"]=$_POST[$login_vars["password"]];
			$login_vars_["remember"]=$login_vars["remember"];
			return User::getVars($login_vars_);
		}
	}







	public static function check(){
		$__db=new DB;

		$vars = array(
		"fullname"=> "_usr_fn",
		"email"=> "_usr_em",
		"password"=> "_usr_pw",
		"passwordConfirmation"=> "_usr_pwc",
		"username"=> "_usr_un",
		"gender"=> "_usr_ge",
		"country"=> "_usr_ci",
		"address"=> "_usr_ad",
		"birthday"=> array(
					"day"=> "_usr_bi-bi_day",
					"month"=> "_usr_bi-bi_month",
					"year"=> "_usr_bi-bi_year",
						),
		"is_facebook"=>"_usr_is_fb"
		);

		$r_vars = array(
			"fullname"=> "",
			"email"=> "",
			"password"=> "",
			"username"=> "",
			"gender"=> "",
			"country"=> "",
			"address"=> "",
			"birthday"=> array(
						"day"=> "",
						"month"=> "",
						"year"=> "",
							),
			"is_facebook"=>"false"
			);


		$errors = 0;
		$errors_labels = "";

		//check if full name is valid or set
		if($__db->IsNullOrEmptyString($_POST[$vars["fullname"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Escribe tu nombre.</li>";	
		}else{
			$r_vars["fullname"] = $_POST[$vars["fullname"]];
		}

		//check if email is valid
		if($__db->IsNullOrEmptyString($_POST[$vars["email"]]) || ($__db->validateEMAIL($_POST[$vars["email"]])==false)){
			$errors = $errors + 1;
			$errors_labels .= "<li>Correo no v&aacute;lido</li>";	
		}else{
			$r_vars["email"] = $_POST[$vars["email"]];
		}

		//check password valid
		if($__db->IsNullOrEmptyString($_POST[$vars["password"]]) || (strlen($_POST[$vars["password"]])<6)){
			$errors = $errors + 1;
			$errors_labels .= "<li>Clave de usuario no valida (debe ser de almenos 6 caracteres)</li>";	
		}
		//check password valid confirmation
		if($__db->IsNullOrEmptyString($_POST[$vars["passwordConfirmation"]]) || ($_POST[$vars["password"]]!=$_POST[$vars["passwordConfirmation"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Confirmacion de clave no coincide.</li>";	
		}else{
			$r_vars["password"] = $_POST[$vars["password"]];
		}

		//check valid username
		if($__db->IsNullOrEmptyString($_POST[$vars["username"]]) || (!$__db->validUsername($_POST[$vars["username"]]))){
			$errors = $errors + 1;
			$errors_labels .= "<li>Nombre de usuario no valido. No se permiten caracteres especiales.</li>";	
		}else{
			$r_vars["username"] = $_POST[$vars["username"]];
		}
		
		// //check valid gender
		// if($__db->IsNullOrEmptyString($_POST[$vars["gender"]])){
		// 	$errors = $errors + 1;
		// 	$errors_labels .= "<li>Choose your Gender</li>";	
		// }else{
		// 	$r_vars["gender"] = $_POST[$vars["gender"]];
		// }

		//check valid country
		if($__db->IsNullOrEmptyString($_POST[$vars["country"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Elije un pais de origen.</li>";	
		}else{
			$r_vars["country"] = $_POST[$vars["country"]];
		}

		// //check valid gender
		// if($__db->IsNullOrEmptyString($_POST[$vars["birthday"]["day"]]) || $_POST[$vars["birthday"]["day"]]>31){
		// 	$errors = $errors + 1;
		// 	$errors_labels .= "<li>Choose day of birth</li>";	
		// }else{
		// 	$r_vars["birthday"]["day"] = $_POST[$vars["birthday"]["day"]];
		// }
		
		// //check valid gender
		// if($__db->IsNullOrEmptyString($_POST[$vars["birthday"]["month"]]) || $_POST[$vars["birthday"]["month"]]>12){
		// 	$errors = $errors + 1;
		// 	$errors_labels .= "<li>Choose month of birth</li>";	
		// }else{
		// 	$r_vars["birthday"]["month"] = $_POST[$vars["birthday"]["month"]];
		// }
		
		// //check valid gender
		// if($__db->IsNullOrEmptyString($_POST[$vars["birthday"]["year"]]) || $_POST[$vars["birthday"]["year"]]>2014){
		// 	$errors = $errors + 1;
		// 	$errors_labels .= "<li>Choose year of birth</li>";	
		// }else{
		// 	$r_vars["birthday"]["year"] = $_POST[$vars["birthday"]["year"]];
		// }

		
		// //check valid gender
		// if($__db->IsNullOrEmptyString($_POST[$vars["is_facebook"]])){
		// 	$r_vars["is_facebook"] = "false";
		// }else{
		// 	$r_vars["is_facebook"] = $_POST[$vars["is_facebook"]];
		// }


		if($errors>0){
			return '<div class="alert alert-danger _nR"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><div class="container"><h4>Something is Wrong!</h4> <ol>' . $errors_labels . '</ol></div></div>';
		}else{
			$r_vars["password_"] = md5($r_vars["password"].$r_vars["email"]);
			User::insert($r_vars);
			return true;
		}




	}



	public static function getModCollections($filter='all'){
		global $app,$mysql;
		$__db=new DB;$__db->connect();
		$rows = array();
		$sql = 'select * from user';
		$q = mysqli_query($mysql, $sql);
		while($row=mysqli_fetch_array($q)){
			array_push($rows, $row);
		}
		mysqli_free_result($q);
		mysqli_close($mysql);
		return $rows;
	}






}

?>