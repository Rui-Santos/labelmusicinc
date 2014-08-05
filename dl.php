<?php
session_start();

//index file
require_once("inc/settings.php");
require_once("inc/class.php");

if(isset($_GET['collection'])){

if($is_id && $id!=null){
	$songs = Collections::fetchSongs($id);
	if($songs!=false){
		// $file = 'usercontent/media/'.$song['folder_id'].'/'.$song['file'];
		$files = array();
		$file_id = array();
		for($i=0; $i<count($songs); $i++){
			array_push($files, 'usercontent/media/'.$songs[$i]['folder_id'].'/'.$songs[$i]['file']);
			array_push($file_id, $songs[$i]['id']);
		}

		if(count($files)){
			$zipname = 'usercontent/media/'.$songs[0]['folder_id'].'/'.$songs[0]["collection"].'.zip';
			if(!file_exists($zipname)){
				$zip = new ZipArchive;
				$zip->open($zipname, ZipArchive::CREATE);
				foreach ($files as $file) {
				  $zip->addFile($file);
				}
				$zip->close();
			}

			$saved = Collections::collectionDownloaded($id);
				if($saved!=false){
					header('Content-Type: application/zip');
					header('Content-disposition: attachment; filename='.$songs[0]["collection"].'.zip');
					readfile($zipname);
				}
		}else{
			die("Nada por aqui.");
		}


	}
}

}else{

if($is_id && $id!=null){
	$song = Collections::fetchSongInfo($id);
	if($song!=false){
		$file = 'usercontent/media/'.$song['folder_id'].'/'.$song['file'];
		if (file_exists($file)) {
			$saved = Collections::songDownloaded($id);
				if($saved!=false){
					header("Content-disposition: attachment; filename=".$song['filename']);
					header("Content-type: ".$song['filetype']);
					readfile($file);
				}
		}
	}
}


}

?>