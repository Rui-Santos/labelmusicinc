<?php


function isint( $mixed ){
    return ( preg_match( '/^\d*$/'  , $mixed) == 1 );
}

/**
* 
*/
class showPart
{
	
	public static function __showIndex($index)
	{
		global $site_name,$app,$path;
		$app->display($index.'.tpl');
	}


	public static function __showHeader($meta){
		global $site_name,$app;
		$metaInfo = strlen($meta)>0 ? $meta : "<title>".$site_name."</title>";
		$app->assign("metaInfo",$metaInfo);
		$app->display('header.tpl');
	}
	public static function __showFooter(){
		global $app;
		$app->display('footer.tpl');
	}



}



/**
* 
*/

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


	public static function counterStyle($input){
		    $input = number_format($input);
		    $input_count = substr_count($input, ',');
		    if($input_count != '0'){
		        if($input_count == '1'){
		            return '+'.substr($input, 0, -4).'k';
		        } else if($input_count == '2'){
		            return '+'.substr($input, 0, -8).'mil';
		        } else if($input_count == '3'){
		            return '+'.substr($input, 0,  -12).'bil';
		        } else {
		            return;
		        }
		    } else {
		        return $input;
		    }

	}

	public static function sanitise($string){
	  $string = htmlspecialchars($string); // Convert characters
	  $string = trim(rtrim(ltrim($string))); // Remove spaces
	  $string = mysql_real_escape_string($string); // Prevent SQL Injection
	  return $string;
	}

	public static function timeConverter($UNIX_timestamp){
		 	 $a = strtotime($UNIX_timestamp);
		     $year = date("Y", $a);
		     $month = date("m", $a);

		     $date = date("d", $a);
		     $hour = date("H", $a);
		     $min = date("i", $a);
		     $sec = date("s", $a);
	        $curMonth = date("m");
	        $curYear = date("Y");
	        $curDay = date("d");
		    $time = $UNIX_timestamp;
		    if($year==$curYear && $month==$curMonth && $date==$curDay){
		      $time = 'Hoy';
		    }else{
		      if($year==$curYear && $month==$curMonth && $curDay>1 && $date==($curDay-1)){
		        $time = 'Ayer';
		      }else{
		        if($year==$curYear && $month==$curMonth && $curDay>2 && $date<($curDay-1)){
		          $time = 'Este mes';
		        }else{
		          if($year==$curYear && $curMonth>1 && $month==($curMonth-1)){
		            $time = 'El mes pasado';
		          }else{
		            $time = $month . ' ' . $date . ', ' . $year;
		          }
		        }
		      }
		    }
		     return $time;
		 }



		public static function FosMerge($arr1, $arr2) {
		    $res=array();
		    $arr1=array_reverse($arr1);
		    $arr2=array_reverse($arr2);
		    foreach ($arr1 as $a1) {
		        if (count($arr1)==0) {
		            break;
		        }
		        array_push($res, array_pop($arr1));
		        if (count($arr2)!=0) {
		            array_push($res, array_pop($arr2));
		        }
		    }
		    return array_merge($res, $arr2);
		}


}

class Collections{
	public static function insert($title, $cover, $songs, $songs_id, $songs_id_im, $category){
	global $mysql, $user, $user_id, $collections_link, $collections_link_id;
	$c=new DB;$c->connect();
		$title=htmlentities($title);
		$q=mysqli_query($mysql, "INSERT INTO collections(collection_name, collection_user_id, collection_cover_id, collection_category) VALUES('{$title}', '{$user_id}', '$cover', '{$category}')");
		if($q){
			$collection_ = mysqli_insert_id($mysql);
			$q_ = "";
			$sep = '';
			foreach($songs_id as $key=>$value) {
			    $q_ .= $sep."post_id".' = "'.$value.'"';
			    $sep = ' OR ';
			  }
			$qu=mysqli_query($mysql, "UPDATE posts SET post_collection_id='{$collection_}', post_category_id='{$category}' WHERE {$q_}");
			if($qu){
			echo 'Tu colecc&oacute;n ha sido guardada!';
				header('Location: '.$link.$collections_link.$collections_link_id.$collection_);
				echo '<script>setTimeout(function(){window.location='.$collections_link.$collections_link_id.$collection_.';},1000)</script>';
			}else{
			echo 'Lo sentimos pero tu coleccion no puede ser procesada en este momento. Por favor vuelve a intentarlo mas tarde.';
			}
		}else{
			echo 'Lo sentimos pero tu coleccion no puede ser procesada en este momento. Por favor vuelve a intentarlo mas tarde.';
		}
		mysqli_close($mysql);
	}





	public static function getcollections($user,$from=0,$to=3, $is_json=false){
		global $mysql, $collections_link, $collections_link_id;
		$c=new DB;$c->connect();
		$collections = array();
		$collections2 = array();
		$cond = "";
		$song=false; $activity = false; $songCategory=0; $isSongCategory = false; $isSongbyUser = false; $songsbyUser = 0; $search = false;
		if($user!="all"){
			if(strpos($user,'filter')>-1){
				$filter = explode(':', $user);
				if(count($filter)>0 && strpos($filter[1], 'category')>-1){
					$category = explode('.', $filter[1]);
					if(count($category)>0){
						$cond = "WHERE c.collection_category='{$category[1]}'";
					}
				} else if (count($filter)>0 && strpos($filter[1], 'songs')>-1) {
					$song = true;
					if(strpos($filter[1], '.user')>-1){
						$isSongbyUser = true;
						$songsbyUser = explode('.user-', $filter[1]);
						$songsbyUser = $songsbyUser[1];
					}else{
						if(strpos($filter[1], 'songs.')>-1){
							$isSongCategory = true;
							$songCategory = explode('.', $filter[1]);
							$songCategory = $songCategory[1];
						}
					}
					
				} else if (count($filter)>0 && strpos($filter[1], 'activity')>-1) {
					$activity = true;
				} else if (count($filter)>0 && strpos($filter[1], 'buscar')>-1) {
					$search = explode('buscar.',$filter[1]);
					$search = $search[1];
				}
			}else{
				$cond = "WHERE c.collection_user_id='{$user}'";
			}
		}else{
			$cond = "";
		}

		if($song){
			$songfilter = "";
			if($isSongCategory && $songCategory!="all"){
				$songfilter = " where p.post_category_id='{$songCategory}' ";
			} else if ($isSongbyUser && $songsbyUser!=0) {
				$songfilter = " where p.post_user_id='{$songsbyUser}' ";
			}
			$q=mysqli_query($mysql, "Select u.upload_file_type as filetype, u.upload_file_size as filesize, u.upload_file_unique as file, u.upload_user_id as folder_id, (Select user_fullname from user where user_id=folder_id) as user_fullname, p.post_title as filename, p.post_id as pid,(select collection_name from collections where collection_id=p.post_collection_id) as collection,(select collection_id from collections where collection_id=p.post_collection_id) as collection_id, p.post_audio_info as song_info, p.published as published, p.post_category_id as category from posts as p INNER JOIN uploads as u ON p.post_upload_id = u.upload_id {$songfilter} ORDER BY p.post_id DESC LIMIT {$from},{$to}");
			if(mysqli_num_rows($q)>0){
			while($row=mysqli_fetch_array($q)){
				$n_collection = array(
						"id"=> 				$row['pid'],
						"filetype"=> 		$row["filetype"],
						"filesize"=> 		$row["filesize"],
						"file"=> 			$row["file"],
						"user_id"=> 		$row["folder_id"],
						"user_fullname"=> 	$row["user_fullname"],
						"filename"=> 		html_entity_decode($row["filename"]),
						"collection"=> 		$row["collection"],
						"collection_id"=> 	$row["collection_id"],
						"category"=> 		$row["category"],
						"audio_info"=> 		$row["song_info"],
						"published"=> 		$row["published"],
						"contenttype"=>		"song"
					);
				array_push($collections, $n_collection);
			}
			mysqli_close($mysql);
			if($is_json){
				$collections = json_encode($collections);
			}
			return $collections;
		}else{
			return false;
		}

	}else if($activity){
			$q=mysqli_query($mysql, "SELECT *,(select user_fullname from user where comment_user_id=user_id) as user_fullname, (select user_username from user where comment_user_id=user_id) as user_username, (select user_profile_photo_id from user where user_id=comment_user_id) as user_photo_id, (select upload_file_unique from uploads where upload_id=user_photo_id) as user_photo FROM `comments` ORDER BY comment_id DESC LIMIT {$from},{$to}");
			if(mysqli_num_rows($q)>0){
			while($row=mysqli_fetch_array($q)){
				$n_collection = array(
						"id"=> 					$row['comment_id'],
						"comment_user_id"=> 	$row["comment_user_id"],
						"published"=> 			$row["published"],
						"comment_content_id"=>	$row["comment_content_id"],
						"comment_content_type"=>$row["comment_content_type"],
						"comment_body"=>		$row["comment_body"],
						"user_photo_id"=>		$row["user_photo_id"],
						"user_photo"=> 			$row["user_photo"],
						"user_fullname"=>		$row["user_fullname"],
						"user_username"=>		$row["user_username"],
						"contenttype"=>			"comment"
					);
				array_push($collections, $n_collection);
			}
			// mysqli_close($mysql);
			

			// $q=mysqli_query($mysql, "Select u.upload_file_type as filetype, u.upload_file_size as filesize, u.upload_file_unique as file, u.upload_user_id as folder_id, (Select user_fullname from user where user_id=folder_id) as user_fullname, p.post_title as filename, p.post_id as pid,(select collection_name from collections where collection_id=p.post_collection_id) as collection,(select collection_id from collections where collection_id=p.post_collection_id) as collection_id, p.post_audio_info as song_info, p.published as published, p.post_category_id as category from posts as p INNER JOIN uploads as u ON p.post_upload_id = u.upload_id ORDER BY p.post_id DESC LIMIT {$from},{$to}");
					// if(mysqli_num_rows($q)>0){
					// while($row=mysqli_fetch_array($q)){
					// 	$n_collection = array(
					// 			"id"=> 				$row['pid'],
					// 			"filetype"=> 		$row["filetype"],
					// 			"filesize"=> 		$row["filesize"],
					// 			"file"=> 			$row["file"],
					// 			"user_id"=> 		$row["folder_id"],
					// 			"user_fullname"=> 	$row["user_fullname"],
					// 			"filename"=> 		$row["filename"],
					// 			"collection"=> 		$row["collection"],
					// 			"collection_id"=> 	$row["collection_id"],
					// 			"category"=> 		$row["category"],
					// 			"audio_info"=> 		$row["song_info"],
					// 			"published"=> 		$row["published"],
					// 			"contenttype"=>		"song"
					// 		);
					// 	array_push($collections2, $n_collection);
					// }
					mysqli_close($mysql);

					// $collections = DB::FosMerge($collections,$collections2);

					if($is_json){
						$collections = json_encode($collections);
					}
					return $collections;
				// }else{
				// 	return false;
				// }
			



		}else{
			return false;
		}






			//end of activity
		}else{
			$cond2 = "";
			if($search!=false){
				$cond2 = " WHERE c.collection_name like '%".$search."%'";
			}
			$q=mysqli_query($mysql, "SELECT c.collection_id as cid, c.published as published, c.collection_name as cname, c.collection_cover_id as cCoverId, c.collection_category as category, u.upload_file_unique as uCoverUrl ,(Select count(*) from posts as p where c.collection_id = p.post_collection_id) as conteo, (select uploads.upload_file_unique from uploads INNER JOIN user ON uploads.upload_id=user.user_profile_photo_id WHERE user.user_id=c.collection_user_id) as profile_picture, (select user.user_username from user where user.user_id=c.collection_user_id) as user_username, (select user.user_id from user where user.user_id=c.collection_user_id) as user_id, (select user.user_fullname from user where user.user_id=c.collection_user_id) as user_fullname FROM collections as c INNER JOIN uploads as u ON u.upload_id=c.collection_cover_id ".$cond." ".$cond2." ORDER BY c.collection_id DESC LIMIT {$from},{$to}");
			if(mysqli_num_rows($q)>0){
			while($row=mysqli_fetch_array($q)){
				$n_collection = array(
						"id"=> 				$row['cid'],
						"name"=> 			html_entity_decode($row["cname"]),
						"published"=> 		$row["published"],
						"cover_id"=> 		$row["cCoverId"],
						"cover_url"=> 		$row["uCoverUrl"],
						"numb"=> 			$row["conteo"],
						"username"=> 		$row["user_username"],
						"user_id"=> 		$row["user_id"],
						"category"=> 		$row["category"],
						"fullname"=> 		$row["user_fullname"],
						"profile_picture"=> $row["profile_picture"],
						"contenttype"=>		"collection"
					);
				array_push($collections, $n_collection);
			}
			mysqli_close($mysql);
			if($is_json){
				$collections = json_encode($collections);
			}
			return $collections;
		}else{
			return false;
		}


		//end of collections
		}
		
	}



	public static function fetch($id){
		global $mysql, $collections_link, $collections_link_id, $link;
		$c=new DB;$c->connect();
		$collection = array();
		$q=mysqli_query($mysql, "SELECT c.collection_id as cid, c.published as published, c.collection_category as category, c.collection_name as cname, c.collection_cover_id as cCoverId, u.upload_file_unique as uCoverUrl ,(Select count(*) from posts as p where c.collection_id = p.post_collection_id) as conteo, (select uploads.upload_file_unique from uploads INNER JOIN user ON uploads.upload_id=user.user_profile_photo_id WHERE user.user_id=c.collection_user_id) as profile_picture, (select user.user_username from user where user.user_id=c.collection_user_id) as user_username,  (Select count(*) from downloads where download_content_id=c.collection_id and download_content_type='0') as downloads, (select user.user_fullname from user where user.user_id=c.collection_user_id) as user_fullname, (select user.user_id from user where user.user_id=c.collection_user_id) as user_id FROM collections as c INNER JOIN uploads as u ON u.upload_id=c.collection_cover_id WHERE c.collection_id='{$id}'");
		if(mysqli_num_rows($q)>0){
			while($row=mysqli_fetch_array($q)){
				$collection = array(
						"id"=> 				$row['cid'],
						"name"=> 			$row["cname"],
						"published"=> 		$row["published"],
						"cover_id"=> 		$row["cCoverId"],
						"cover_url"=> 		$row["uCoverUrl"],
						"numb"=> 			$row["conteo"],
						"username"=> 		$row["user_username"],
						"fullname"=> 		$row["user_fullname"],
						"user_id"=> 		$row["user_id"],
						"downloads"=> 		$row["downloads"],
						"category"=> 		$row["category"],
						"profile_picture"=> ($row['profile_picture']!=null ? $link.'/usercontent/media/'.$row['user_id'].'/'.$row['profile_picture'] : $link.'assets/image/_usr_pc.jpg')
					);
			}
			mysqli_close($mysql);
			return $collection;
		}else{
			return false;
		}
	}


	public static function removeItem($id,$is_collection=true){
		global $mysql, $collections_link, $collections_link_id, $link;
		$c=new DB;$c->connect();
		$id = str_replace('coleccion-', '', $id);
		$id = str_replace('cancion-', '', $id);

		if($is_collection){
			$q=mysqli_query($mysql, "DELETE FROM collections WHERE collection_id='{$id}'");
			$q2=mysqli_query($mysql, "UPDATE posts SET post_collection_id='0' WHERE post_collection_id='{$id}'");
		}else{
			$q=mysqli_query($mysql, "DELETE FROM posts WHERE post_id='{$id}'");
		}

			mysqli_close($mysql);
		// if($q){
		// 	echo 'success';
		// }else{
		// 	echo mysqli_error();
		// }

			// if($_SERVER['HTTP_REFERER']!=null){
			// 	header("Location: ".$_SERVER['HTTP_REFERER']);
			// }else{
				if($is_collection){
					header("Location: ".$link."filemanager");
				}else{
					header("Location: ".$link."filemanager#tracks");
				}
			// }
	}

	public static function updateItem($id,$data=array(),$is_collection=true){
		global $mysql, $collections_link, $collections_link_id, $link;
		$c=new DB;$c->connect();
		$id = str_replace('coleccion-', '', $id);
		$id = str_replace('cancion-', '', $id);
		$data_contructor = "";
		if(count($data)>0){
			foreach ($data as $clave => $valor) {
				if($clave=="collection_name") $valor = htmlentities($valor);
			    $data_contructor .= "$clave='$valor',";
			}
			$data_contructor = substr($data_contructor, 0, (strlen($data_contructor)-1));
			
			if($is_collection){
			$q=mysqli_query($mysql, "UPDATE collections SET {$data_contructor} WHERE collection_id='{$id}'");
			}else{
			$q=mysqli_query($mysql, "UPDATE posts SET {$data_contructor} WHERE post_id='{$id}'");
			}

				mysqli_close($mysql);

				if($q){
					return $data;
				}else{
					return false;
				}
		}

		// if($q){
		// 	echo 'success';
		// }else{
		// 	echo mysqli_error();
		// }

			// if($_SERVER['HTTP_REFERER']!=null){
			// 	header("Location: ".$_SERVER['HTTP_REFERER']);
			// }else{
				// if($is_collection){
				// 	header("Location: ".$link."filemanager");
				// }else{
				// 	header("Location: ".$link."filemanager#tracks");
				// }
			// }
	}



	public static function fetchSongs($id,$is_json=false){
		global $mysql, $collections_link, $collections_link_id;
		$c=new DB;$c->connect();
		$collection = array();
		$q=mysqli_query($mysql, "Select u.upload_file_type as filetype, u.upload_file_size as filesize, u.upload_file_unique as file, u.upload_user_id as folder_id, (select user_fullname from user where user_id=folder_id) as user_fullname, p.post_title as filename, p.post_id as pid,(select collection_name from collections where collection_id=p.post_collection_id) as collection, p.post_audio_info as audio_info from posts as p INNER JOIN uploads as u ON p.post_upload_id = u.upload_id where p.post_collection_id = '{$id}' ORDER BY p.post_id");
		if(mysqli_num_rows($q)>0){
			while($row=mysqli_fetch_array($q)){
				$collection_n = array(
						"id"=> 				$row['pid'],
						"filename"=> 		html_entity_decode($row["filename"]),
						"filesize"=> 		$row["filesize"],
						"filetype"=> 		$row["filetype"],
						"file"=> 			$row["file"],
						"collection"=> 		$row["collection"],
						"folder_id"=> 		$row["folder_id"],
						"user_fullname"=> 	$row["user_fullname"],
						"audioinfo"=> 		$row["audio_info"]
				);
				array_push($collection, $collection_n);
			}
			mysqli_close($mysql);
			if($is_json){
				$collection = json_encode($collection);
			}
			return $collection;
		}
	}



	
	public static function fetchSongInfo($id,$is_json=false){
		global $mysql, $collections_link, $collections_link_id, $link;
		$c=new DB;$c->connect();
		$collection = array();
		$q=mysqli_query($mysql, "Select u.upload_file_type as filetype, u.upload_file_size as filesize, u.upload_file_unique as file, u.upload_user_id as folder_id, p.post_title as filename, p.post_audio_info as audioinfo, p.post_id as pid, (Select count(*) from downloads where download_content_id=p.post_id and download_content_type='1') as downloads, (select play_count from plays where play_content_id=p.post_id) as plays, (select uploads.upload_file_unique from uploads INNER JOIN user ON uploads.upload_id=user.user_profile_photo_id WHERE user.user_id=p.post_user_id) as profile_picture, (select user.user_username from user where user.user_id=post_user_id) as user_username, (select user.user_fullname from user where user.user_id=p.post_user_id) as user_fullname, p.post_category_id as category, p.post_collection_id as collection_id, (select collection_name from collections where collection_id=p.post_collection_id) as collection, p.published as published from posts as p INNER JOIN uploads as u ON p.post_upload_id = u.upload_id where p.post_id = '{$id}'");
		if(mysqli_num_rows($q)>0){
			while($row=mysqli_fetch_array($q)){
				$collection = array(
						"id"=> 				$row['pid'],
						"published"=> 		$row["published"],
						"filename"=> 		html_entity_decode($row["filename"]),
						"filesize"=> 		$row["filesize"],
						"filetype"=> 		$row["filetype"],
						"file"=> 			$row["file"],
						"folder_id"=> 		$row["folder_id"],
						"user_id"=> 		$row["folder_id"],
						"downloads"=> 		$row["downloads"],
						"plays"=> 			$row["plays"],
						"category"=> 		$row["category"],
						"collection_id"=> 	$row["collection_id"],
						"collection"=> 		$row["collection"],
						"profile_picture"=> ($row['profile_picture']!=null ? $link.'/usercontent/media/'.$row['folder_id'].'/'.$row['profile_picture'] : $link.'assets/image/_usr_pc.jpg'),
						"user_username"=> 	$row["user_username"],
						"audioinfo"=> 		$row["audioinfo"],
						"user_fullname"=> 	$row["user_fullname"]
				);
			}
			mysqli_close($mysql);
			if($is_json){
				$collection = json_encode($collection);
			}
			return $collection;
		}else{
			return false;
		}
	}


	public static function songDownloaded($id){
		global $mysql, $collections_link, $collections_link_id, $user_id;
		$c=new DB;$c->connect();
		$q=mysqli_query($mysql, "INSERT INTO `downloads`(`download_content_id`,`download_content_type`) VALUES('{$id}','1')");
		if($q){
			return true;
		}else{
			return mysql_error();
		}
		mysqli_close($mysql);
	}

	public static function collectionDownloaded($id){
		global $mysql, $collections_link, $collections_link_id, $user_id;
		$c=new DB;$c->connect();
		$q=mysqli_query($mysql, "INSERT INTO `downloads`(`download_content_id`,`download_content_type`) VALUES('{$id}','0')");
		if($q){
			return true;
		}else{
			return mysql_error();
		}
		mysqli_close($mysql);
	}




// SELECT *, (Select upload_file_unique FROM uploads WHERE user.user_profile_photo_id=uploads.upload_id) as user_profile_picture FROM `comments` INNER JOIN user ON comment_user_id = user.user_id WHERE `comment_content_type` = '{$type}' AND `comment_content_id` = '{$id}' {$cond} ORDER BY `comment_id` DESC LIMIT {$from},{$to}

	public static function getComments($id,$type,$is_json=false,$user=false,$from=0,$to=10){
		global $mysql, $collections_link, $collections_link_id, $link;
		$c=new DB;$c->connect();
		$type = $type == "1" ? 1 : 0;
		$cond = $user!=false ? " AND `comment_user_id`='{$user}' " : " ";
		$q=mysqli_query($mysql, "SELECT *, (Select upload_file_unique FROM uploads WHERE user.user_profile_photo_id=uploads.upload_id) as user_profile_picture FROM `comments` INNER JOIN user ON comment_user_id = user.user_id WHERE `comment_content_type` = '{$type}' AND `comment_content_id` = '{$id}' {$cond} ORDER BY `comment_id` DESC LIMIT {$from},{$to}");
		if(mysqli_num_rows($q)>0){
			$comment = array();
				while($row=mysqli_fetch_array($q)){
					$comment_n = array(
						"comment_id"=> $row["comment_id"],
						"comment_content_id"=> $row["comment_content_id"],
						"comment_content_type"=> $row["comment_content_type"],
						"comment_user_id"=> $row["comment_user_id"],
						"comment_body"=> $row["comment_body"],
						"user_username"=> $row["user_username"],
						"user_fullname"=> $row["user_fullname"],
						"user_profile_picture"=> ($row['user_profile_picture']!=null ? $link.'/usercontent/media/'.$row['comment_user_id'].'/'.$row['user_profile_picture'] : $link.'assets/image/_usr_pc.jpg')
						);
					array_push($comment, $comment_n);
				}
				return $comment;
		}else{
			return false;
		}
	}


	
	public static function imAutor($id,$type="comment"){
		global $mysql, $collections_link, $collections_link_id, $is_user, $user_id;
		$c=new DB;$c->connect();
		$type = $type == "comment" ? $type : ($type == "collection" ? $collection : ($type == "song" ? $type : "comment") );
		if($is_user!="false"){
			$q=mysqli_query($mysql, "SELECT * FROM `comments` WHERE `comment_id` = '{$id}' AND `comment_user_id` = '{$user_id}'");
			if(mysqli_num_rows($q)>0){
				return true;
			}else{
				return false;
			}
			mysqli_close($mysql);
		}else{
			return false;
		}
	}




	public static function insertComments($content_id,$content_type,$user_id,$comment_body){
		global $mysql, $collections_link, $collections_link_id, $link;
		$c=new DB;$c->connect();
		$content_type = $content_type == "1" ? 1 : 0;

		$q=mysqli_query($mysql, "INSERT INTO `comments` (`comment_content_type`, `comment_content_id`, `comment_user_id`, `comment_body`) VALUES('{$content_type}', '{$content_id}', '{$user_id}', '{$comment_body}')");
		if($q){
			$id = mysqli_insert_id($mysql);
			$s = mysqli_query($mysql, "SELECT *, (Select upload_file_unique FROM uploads WHERE user.user_profile_photo_id=uploads.upload_id) as user_profile_picture FROM `comments` INNER JOIN user ON comment_user_id = user.user_id WHERE comment_id='{$id}'");
			if($s){
				$comment = array();
				while($row=mysqli_fetch_array($s)){
					$comment = array(
						"comment_id"=> $row["comment_id"],
						"comment_content_id"=> $row["comment_content_id"],
						"comment_content_type"=> $row["comment_content_type"],
						"comment_user_id"=> $row["comment_user_id"],
						"comment_body"=> $row["comment_body"],
						"user_username"=> $row["user_username"],
						"user_fullname"=> $row["user_fullname"],
						"user_profile_picture"=> ($row['user_profile_picture']!=null ? $link.'/usercontent/media/'.$row['comment_user_id'].'/'.$row['user_profile_picture'] : $link.'assets/image/_usr_pc.jpg')
						);
				}
				return $comment;
			}else{
				return false;
			}

		}else{
			return false;
		}
		mysqli_close($mysql);
	}




	public static function insertFlag($content_id,$content_type,$comment_body){
		global $mysql, $collections_link, $collections_link_id, $user_id;
		$c=new DB;$c->connect();
		$content_type = $content_type == "1" ? 1 : 0;
		$q=mysqli_query($mysql, "INSERT INTO `flags` (`flag_content_type`, `flag_content_id`, `flag_user_id`, `flag_comment`) VALUES('{$content_type}', '{$content_id}', '{$user_id}', '{$comment_body}')");
		if($q){
			return "true";

		}else{
			return "false";
		}
		mysqli_close($mysql);
	}


	public static function deleteContent($content_id,$content_type){
		global $mysql, $collections_link, $collections_link_id, $user_id;
		$c=new DB;$c->connect();
		$content_type = $content_type == "1" ? 1 : 0;
		$q=mysqli_query($mysql, "DELETE FROM `comments` WHERE comment_content_type='{$content_type}' AND comment_id='{$content_id}'");
		if($q){
			return "true";

		}else{
			return "false";
		}
		mysqli_close($mysql);
	}





}


?>