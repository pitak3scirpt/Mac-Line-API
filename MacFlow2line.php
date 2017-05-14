<?php
include 'headbot.php';
// Function Return message
function im1($originalContentUrl,$previewImageUrl)
{
	$messages = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl ,
		'previewImageUrl' => $previewImageUrl
		];
	return $messages;
}

$originalContentUrl = $ecsURL;
$previewImageUrl = $ecsPreviewURL;
$text = $_GET["password"];
$text = "passwordd";

if (!is_null($text)) {

	$messages = im1($originalContentUrl,$previewImageUrl);
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
