<?php
include 'headbot.php';
// Function Return message
function t1($tt1)
{
	$messages = [
		'type' => 'text',
		'text' => $tt1
		];
	return $messages;
}

$name_bk_rps_1_w = $_GET["name_bk_rps_1_w"];
$val_bk_rps_1_w = $_GET["val_bk_rps_1_w"];
$name_bk_rps_1_r = $_GET["name_bk_rps_1_r"];
$val_bk_rps_1_r = $_GET["val_bk_rps_1_r"];

$name_bk_rps_2_w = $_GET["name_bk_rps_2_w"];
$val_bk_rps_2_w = $_GET["val_bk_rps_2_w"];
$name_bk_rps_2_r = $_GET["name_bk_rps_2_r"];
$val_bk_rps_2_r = $_GET["val_bk_rps_2_r"];

$name_bk_on_1_w = $_GET["name_bk_on_1_w"];
$val_bk_on_1_w = $_GET["val_bk_on_1_w"];
$name_bk_on_1_r = $_GET["name_bk_on_1_r"];
$val_bk_on_1_r = $_GET["val_bk_on_1_r"];

$name_bk_on_2_w = $_GET["name_bk_on_2_w"];
$val_bk_on_2_w = $_GET["val_bk_on_2_w"];
$name_bk_on_2_r = $_GET["name_bk_on_2_r"];
$val_bk_on_2_r = $_GET["val_bk_on_2_r"];

$name_bk_on_3_w = $_GET["name_bk_on_3_w"];
$val_bk_on_3_w = $_GET["val_bk_on_3_w"];
$name_bk_on_3_r = $_GET["name_bk_on_3_r"];
$val_bk_on_3_r = $_GET["val_bk_on_3_r"];

$name_bk_on_4_w = $_GET["name_bk_on_4_w"];
$val_bk_on_4_w = $_GET["val_bk_on_4_w"];
$name_bk_on_4_r = $_GET["name_bk_on_4_r"];
$val_bk_on_4_r = $_GET["val_bk_on_4_r"];

$text = $name_bk_rps_1_w." ".$val_bk_rps_1_w."\n";
$text = $text.$name_bk_rps_1_r." ".$val_bk_rps_1_r."\n";
$text = $text.$name_bk_rps_2_w." ".$val_bk_rps_2_w."\n";
$text = $text.$name_bk_rps_2_r." ".$val_bk_rps_2_r."\n";
$text = $text.$name_bk_on_1_w." ".$val_bk_on_1_w."\n";
$text = $text.$name_bk_on_1_r." ".$val_bk_on_1_r."\n";
$text = $text.$name_bk_on_2_w." ".$val_bk_on_2_w."\n";
$text = $text.$name_bk_on_2_r." ".$val_bk_on_2_r."\n";
$text = $text.$name_bk_on_3_w." ".$val_bk_on_3_w."\n";
$text = $text.$name_bk_on_3_r." ".$val_bk_on_3_r."\n";
$text = $text.$name_bk_on_4_w." ".$val_bk_on_4_w."\n";
$text = $text.$name_bk_on_4_r." ".$val_bk_on_4_r;

//$text = "Test";
	
	
if (!is_null($text)) {
//if (!empty($_POST)){
	//$text = "ได้รับ Mail จาก :".$return_path."\nหัวข้อ :".$subject."\nเนื่อหา".$plain;

	$messages = t1($text);
	$url = 'https://api.line.me/v2/bot/message/push';
	$data = [
  		'to' => 'Cff6b78bc839c9f764ffff0f066606681',
		'messages' => [$messages]
		];
	$post = json_encode($data);
	$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result . "\r\n";	
}
?>
