<?php
include 'headbot.php';
// Function Return message
// Function Return message
function t1($tt1)
{
	$messages = [
		'type' => 'text',
		'text' => $tt1
		];
	return $messages;
}

function temp2op($tt1)
{
	$act1 = [
		'type' => 'postback',
		'label' => 'Power Flow',
		'data' => 'action=buy&itemid=123'	
		];
	$act2 = [
		'type' => 'postback',
		'label' => 'Walk Around - Sub',
		'data' => 'action=buy&itemid=123'	
		];	
	$messages = [
		'type' => 'template',
		'altText' => 'this is a buttons template',
		'template' => [
			'type' => 'buttons',
			'thumbnailImageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FMac_Share_Menu.jpg',
			'title' => 'Menu',
			'text' => 'Please Select',
			'actions' => [$act1,$act2]
			]
		];
	return $messages;
}

$text = "TestTest";
	
	
if (!is_null($text)) {
//if (!empty($_POST)){
	//$text = "ได้รับ Mail จาก :".$return_path."\nหัวข้อ :".$subject."\nเนื่อหา".$plain;
	//$messages = t1($text);
	$messages = temp2op($text);
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
