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

$pName = $_GET["test_msg"];
$vName = $_GET["test_value"];
$text = $pName." ".$vName;
//$text = "Test";
	
	
if (!is_null($text)) {
//if (!empty($_POST)){
	//$text = "ได้รับ Mail จาก :".$return_path."\nหัวข้อ :".$subject."\nเนื่อหา".$plain;

	$messages = t1($text);
	$url = 'https://api.line.me/v2/bot/message/push';
	$data = [
  		'to' => 'Uf95ee3607bc3d6696b2116de202f97d3',
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
