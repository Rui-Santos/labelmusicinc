<?php
//cuenta nueva
require_once("inc/class.php");

$login_link = "?module=cuenta";
$register_link = "?module=cuenta&registrar";
$profile_link = "?module=cuenta&usuario=";
$GLOBALS['profile_link'] = $profile_link;


class User{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }


	public static function insert($vars){
		global $mysql, $db_rows, $profile_link;
		DB::connect();
		$_birth = $vars['birthday']['year'].'-'.$vars['birthday']['month'].'-'.$vars['birthday']['day'];
		$q = mysqli_query($mysql, "INSERT INTO user(user_username, user_email, user_password, user_fullname, user_range, user_genre, user_country_id, user_address, user_birth, user_is_fb_account) VALUES('{$vars['username']}', '{$vars['email']}', '{$vars['password_']}', '{$vars['fullname']}', '0', '{$vars['gender']}', '{$vars['country']}', '{$vars['address']}', '{$_birth}', '{$vars['is_facebook']}')");
		if($q){
			mysqli_free_result($q);
			mysqli_close($mysql);

			$_SESSION['is_user'] = "true";
			$_SESSION['user'] = $vars['username'];
			header("Location: ".$profile_link.$vars['username']);
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
			    }
			    $sqlvars[2] = md5($vars["password"].$sqlvars[0]);
			    //compare local password with bd password
			    if($sqlvars[2]==$sqlvars[1]){
			    	$_SESSION['is_user'] = "true";
			    	if($sqlvars[3]>0){
			    		$_SESSION['is_moderator'] = "true";
			    	}else{
			    		$_SESSION['is_moderator'] = "false";
			    	}
					$_SESSION['user'] = $vars['name'];
					if($vars['remember']=="true" || $vars['remember']==true){
						$expire=time()+60*60*24*30;
						setcookie("is_user", "true", $expire);
						setcookie("user", $vars['name'], $expire);
					}else{
						if(isset($_COOKIE['is_user'])){
							unset($_COOKIE['is_user']);
						}
					}

					header("Location: ".$profile_link.$vars['name']);
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



		if(IsNullOrEmptyString($_POST[$login_vars["name"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Nombre de usuario inv&aacute;lido</li>";	
		}


		if(isset($_POST[$login_vars["remember"]])){
			$login_vars["remember"]="true";
		}else{
			$login_vars["remember"]="false";
		}




		//check password valid
		if(IsNullOrEmptyString($_POST[$login_vars["password"]]) || (strlen($_POST[$login_vars["password"]])<6)){
			$errors = $errors + 1;
			$errors_labels .= "<li>Contrase&ntilde;a inv&aacute;lida</li>";	
		}




		if($errors>0){
			return '<div class="alert alert-info text-left alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Algo esta mal!</h4> <ol>' . $errors_labels . '</ol></div>';
		}else{
			$login_vars_["name"]=$_POST[$login_vars["name"]];
			$login_vars_["password"]=$_POST[$login_vars["password"]];
			$login_vars_["remember"]=$login_vars["remember"];
			return User::getVars($login_vars_);
		}
	}







	public static function check(){

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
		if(IsNullOrEmptyString($_POST[$vars["fullname"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Invalid Full Name</li>";	
		}else{
			$r_vars["fullname"] = $_POST[$vars["fullname"]];
		}

		//check if email is valid
		if(IsNullOrEmptyString($_POST[$vars["email"]]) || (validateEMAIL($_POST[$vars["email"]])==false)){
			$errors = $errors + 1;
			$errors_labels .= "<li>Invalid Email Address</li>";	
		}else{
			$r_vars["email"] = $_POST[$vars["email"]];
		}

		//check password valid
		if(IsNullOrEmptyString($_POST[$vars["password"]]) || (strlen($_POST[$vars["password"]])<6)){
			$errors = $errors + 1;
			$errors_labels .= "<li>Invalid Password (must be at least 6 characters)</li>";	
		}
		//check password valid confirmation
		if(IsNullOrEmptyString($_POST[$vars["passwordConfirmation"]]) || ($_POST[$vars["password"]]!=$_POST[$vars["passwordConfirmation"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Invalid Password Confirmation (paswword does not match)</li>";	
		}else{
			$r_vars["password"] = $_POST[$vars["password"]];
		}

		//check valid username
		if(IsNullOrEmptyString($_POST[$vars["username"]]) || (!validUsername($_POST[$vars["username"]]))){
			$errors = $errors + 1;
			$errors_labels .= "<li>Invalid Username (no special characters allowed)</li>";	
		}else{
			$r_vars["username"] = $_POST[$vars["username"]];
		}
		
		//check valid gender
		if(IsNullOrEmptyString($_POST[$vars["gender"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Choose your Gender</li>";	
		}else{
			$r_vars["gender"] = $_POST[$vars["gender"]];
		}

		//check valid country
		if(IsNullOrEmptyString($_POST[$vars["country"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Choose your Country</li>";	
		}else{
			$r_vars["country"] = $_POST[$vars["country"]];
		}

		//check valid gender
		if(IsNullOrEmptyString($_POST[$vars["birthday"]["day"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Choose day of birth</li>";	
		}else{
			$r_vars["birthday"]["day"] = $_POST[$vars["birthday"]["day"]];
		}
		
		//check valid gender
		if(IsNullOrEmptyString($_POST[$vars["birthday"]["month"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Choose month of birth</li>";	
		}else{
			$r_vars["birthday"]["month"] = $_POST[$vars["birthday"]["month"]];
		}
		
		//check valid gender
		if(IsNullOrEmptyString($_POST[$vars["birthday"]["year"]])){
			$errors = $errors + 1;
			$errors_labels .= "<li>Choose year of birth</li>";	
		}else{
			$r_vars["birthday"]["year"] = $_POST[$vars["birthday"]["year"]];
		}

		
		//check valid gender
		if(IsNullOrEmptyString($_POST[$vars["is_facebook"]])){
			$r_vars["is_facebook"] = "false";
		}else{
			$r_vars["is_facebook"] = $_POST[$vars["is_facebook"]];
		}


		if($errors>0){
			return '<div class="alert alert-warning text-left alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4>Something is Wrong!</h4> <ol>' . $errors_labels . '<li>..check that.</li></ol></div>';
		}else{
			$r_vars["password_"] = md5($r_vars["password"].$r_vars["email"]);
			User::insert($r_vars);
			return true;
		}




	}
}


?>