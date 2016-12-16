<?php
$proxy = 'velodrome.usefixie.com:80';
$proxyauth = 'fixie:ncIwXPyhNi4cEWL';

$access_token = 'TuPeAEFb91uGz4kPxjnMeZ6QaAGrLK05ZQcO5P1zdTNr3bYhATznR5S9ef2Xr/7uNFmngRzqMu+xPUsXw3u53QOwzy2SP+RsQsMVxP6G7VxEff/5I7k0t+SrazH97wQpwxIblRSY7FLpoTkwY0l5hQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			$text = trim($text);
			$text = strtolower($text);
			$lentext = strlen($text);
			$cut2headtext = substr($text,0,2);
			
			// Equipment Select tx, ln, sp
			switch ($cut2headtext) {
				case "tx":					
					$cut3midtext = substr($text,3,3);		
					$cut3midtext = trim($cut3midtext);
					if ($lentext > 9) {
						$cut3lastext = substr($text,7,3);
						$cut3lastext = trim($cut3lastext);
					} elseif (strlen($cut3midtext) <3) {
						$cut3lastext = substr($text,6,3);
						$cut3lastext = trim($cut3lastext);					
					} else {
						$cut3lastext = substr($text,7,3);
						$cut3lastext = trim($cut3lastext);
					}
					// Find txt data name
					$dataname = "Tx/".$cut3midtext.$cut3lastext.".txt";
					$gentext = file_get_contents($dataname);
					$lengentext = strlen($gentext);
					if ($lengentext < 1) {
						$gentext = "ไม่มีข้อมูลหม้อแปลงที่ร้องขอ ขอภัยครับ";
					}
					$tempsend = "text";
					break;
				case "ln":
					$gentext = "Line";
					$originalContentUrl = "https://www.dropbox.com/s/y20d4ygkomhytnr/originln.jpg?dl=0";
					$previewImageUrl = "https://www.dropbox.com/s/192tpwbgz15pkfj/previewln.jpg?dl=0";
					$tempsend = "image";
					break;
				case "sp":
					$gentext = file_get_contents("SPP/SPP.txt");
					break;
				default:
					$gentext = "ขออภัย ระบบไม่สามารถหาข้อมูลได้";
			}
			$text = $gentext."\n".$lengentext." By Pitak Mahaman";
			//$text = "First Code : ".$cut2headtext."\n"."Second Code : ".$cut3midtext."\n".$lengentext." By Pitak Mahaman";
			
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			switch ($tempsend) {
				case "text" :
					$messages = [
						'type' => 'text',
						'text' => $text
					];
					break;
				case "image" :
					$messages = [
						'type' => 'image',
						'originalContentUrl' => $originalContentUrl ,
						'previewImageUrl' => $previewImageUrl
					];
					break;					
				default :
					$messages = [
						'type' => 'text',
						'text' => $text
					];					
			}
			//$messages = [
			//	'type' => 'text',
			//	'text' => $text
			//];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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
	}
}
echo "OK";
