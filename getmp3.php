<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

require_once('inc/mp3.inc.php');

if(isset($_GET['file']) && $_GET['file'] && file_exists($_GET['file'])){

$f = $_GET['file'];
$m = new mp3file($f);
$a = $m->get_metadata();
 
if ($a['Encoding']=='Unknown')
    echo '{"status": "0"}';
else if ($a['Encoding']=='VBR')
    echo json_encode($a);
else if ($a['Encoding']=='CBR')
    echo json_encode($a);
unset($a);

}else{
	echo '{"status": "0", "error": "File not found"}';
}

?>