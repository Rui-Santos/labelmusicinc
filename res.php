<?php

header("Content-type: application/x-javascript; charset: UTF-8");

$bucket = 'LABELMUSICINC';
// these can be found on your Account page, under Security Credentials > Access Keys
$accessKeyId = 'jadher.11x2@gmail.com';
$secret = 'sisswide+dccolorweb';

// prepare policy
$policy = base64_encode(json_encode(array(
	// ISO 8601 - date('c'); generates uncompatible date, so better do it manually
	'expiration' => date('Y-m-d\TH:i:s.000\Z', strtotime('+1 day')),  
	'conditions' => array(
		array('bucket' => $bucket),
		array('acl' => 'public-read'),
		array('starts-with', '$key', ''),
		// for demo purposes we are accepting only images
	)
)));

// sign policy
$signature = base64_encode(hash_hmac('sha1', $policy, $secret, true));


echo <<<EOD
/* *********************************************** *
* ** (c) Adiel Hercules jadher.11x2@gmail.com **** *
* ************************************************ */
\n
EOD;

$js = array();
$is_file = false;
if(isset($_REQUEST["l"]) && ($_REQUEST["l"]!="")){
	$is_file = true;
}

if($is_file){
$f = $_REQUEST["l"];
$js = explode("|",$f);

for($i=0;$i<count($js);$i++){

echo <<<EOD
\n// file loaded successfully. {$signature}_{$js[$i]} \n
EOD;

$js[$i] = file_get_contents($js[$i].".js");
echo $js[$i];
}

}
?>