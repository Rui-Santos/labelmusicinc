<?php
session_start();

include('inc/settings.php');
include('inc/class.php');
include('crp.php');
include('inc/dependencies/class/perfil.php');
require_once('inc/mp3.inc.php');


global $user, $user_id;

$userInfo = User::getUserInfo($user_id);


class UploadException extends Exception 
{ 
    public function __construct($code) { 
        $message = $this->codeToMessage($code); 
        parent::__construct($message, $code); 
    } 

    private function codeToMessage($code) 
    { 
        switch ($code) { 
            case UPLOAD_ERR_INI_SIZE: 
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break; 
            case UPLOAD_ERR_FORM_SIZE: 
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"; 
                break; 
            case UPLOAD_ERR_PARTIAL: 
                $message = "The uploaded file was only partially uploaded"; 
                break; 
            case UPLOAD_ERR_NO_FILE: 
                $message = "No file was uploaded"; 
                break; 
            case UPLOAD_ERR_NO_TMP_DIR: 
                $message = "Missing a temporary folder"; 
                break; 
            case UPLOAD_ERR_CANT_WRITE: 
                $message = "Failed to write file to disk"; 
                break; 
            case UPLOAD_ERR_EXTENSION: 
                $message = "File upload stopped by extension"; 
                break; 

            default: 
                $message = "Unknown upload error"; 
                break; 
        } 
        return $message; 
    } 
} 


// Uncomment this one to fake upload time
// usleep(5000);



// Make sure file is not cached (as it happens for example on iOS devices)
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

 
// Support CORS
header("Access-Control-Allow-Origin: *");
// other CORS headers if any...
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	exit; // finish preflight CORS requests here
}


// @set_time_limit(5 * 60);


// Settings
$targetDir = "usercontent/media/".$userInfo["id"];




// Create target dir
if (!file_exists($targetDir)) {
	@mkdir($targetDir);
}


$fileNameO = "";
$fileType = "";
$fileSize = "";
// Get a file name
if (isset($_REQUEST["name"])) {
	$fileName = $_REQUEST["name"];
	$fileNameO = $_REQUEST["name"];
	$fileType = $_FILES["file"]["type"];
	$fileSize = $_FILES["file"]["size"];
} elseif (!empty($_FILES)) {
	$fileName = $_FILES["file"]["name"];
	$fileNameO = $_FILES["file"]["name"];
	$fileType = $_FILES["file"]["type"];
	$fileSize = $_FILES["file"]["size"];
} else {
	$fileName = uniqid("_");
}

$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;



// Open temp file
if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
	die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
}

if (!empty($_FILES)) {
	if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
		$error = new UploadException($_FILES['file']['error']);
		die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id", "server-error": "'.$error.'"}');
		
	}

	// Read binary input stream and append it to temp file
	if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
} else {	
	if (!$in = @fopen("php://input", "rb")) {
		die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
	}
}

while ($buff = fread($in, 4096)) {
	fwrite($out, $buff);
}

@fclose($out);
@fclose($in);

// Check if file has been uploaded
if (!$chunks || $chunk == $chunks - 1) {
	// Strip the temp .part suffix off 
	rename("{$filePath}.part", $filePath);
}


$imageTypes = array("gif", "jpeg", "jpg", "png");
$audioTypes = array("waw", "mp3", "mpeg");
$temp = explode(".", $fileName);
$extension = strtolower(end($temp));

if (!empty($_FILES)) {
$c=new DB;$c->connect();
$n=htmlentities($_FILES["file"]["name"]);
$q = mysqli_query($mysql, "INSERT INTO uploads(upload_user_id, upload_file_type, upload_file_size, upload_file_name, upload_file_unique) VALUES('{$userInfo['id']}', '{$fileType}', '{$fileSize}', '{$n}', '{$fileName}')");
if($q){
	$last_id = mysqli_insert_id($mysql);


		if ((($fileType == "image/gif")
		|| ($fileType == "image/jpeg")
		|| ($fileType == "image/jpg")
		|| ($fileType == "image/pjpeg")
		|| ($fileType == "image/x-png")
		|| ($fileType == "image/png"))
		&& in_array($extension, $imageTypes)){
			mysqli_close($mysql);
			image::crop($fileName,$targetDir);
			die('{"url": "'.$targetDir.'/small_'.$fileName.'", "name": "'.$fileName.'", "id": "'.$last_id.'"}');
		}else{

			if ((($fileType == "audio/vnd.wav")
			|| ($fileType == "audio/mp3")
			|| ($fileType == "audio/mpeg"))
			&& in_array($extension, $audioTypes)){


				$f = $filePath;
				$m = new mp3file($f);
				$a = $m->get_metadata();
				$a = json_encode($a);

				$n = htmlentities($n);	
				$q2 = mysqli_query($mysql, "INSERT INTO posts(post_title, post_user_id, post_upload_id, post_audio_info) VALUES('{$n}', '{$userInfo['id']}', '{$last_id}', '{$a}')");
				if($q2){
					$post_id = mysqli_insert_id($mysql);
					mysqli_close($mysql);
					// print_r($_POST);
					die('{"upload_id": "'.$last_id.'", "upload_file_status": "done", "post_id": "'.$post_id.'", "post_status": "done"}');
				}else{
					die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to inject database."}, "id" : "'.$last_id.'"}');
				}


			}else{
				mysqli_close($mysql);
				unlink($filePath);
				die('{"fileType": "'.$fileType.'", "error": "unknow file"}');
			}


		}

}else{
// Return Success JSON-RPC response
unlink($filePath);
die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to inject database."}, "id" : "id"}');
}

}else{
	unlink($filePath);
	// print_r($_POST);
	die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "No files selected or max file size reached."}, "id" : "id"}');
}