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
function im1($originalContentUrl,$previewImageUrl)
{
	$messages = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl ,
		'previewImageUrl' => $previewImageUrl
		];
	return $messages;
}
// Function Return data
function im2($replyToken,$originalContentUrl1,$previewImageUrl1,$originalContentUrl2,$previewImageUrl2)
{
	$image1 = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl1 ,
		'previewImageUrl' => $previewImageUrl1
		];
	$image2 = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl2 ,
		'previewImageUrl' => $previewImageUrl2
		];
	$data = [
		'replyToken' => $replyToken,
		'messages' => [$image1,$image2]
		];	
	return $data;
}
function im3($replyToken,$originalContentUrl1,$previewImageUrl1,$originalContentUrl2,$previewImageUrl2,$originalContentUrl3,$previewImageUrl3)
{
	$image1 = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl1 ,
		'previewImageUrl' => $previewImageUrl1
		];
	$image2 = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl2 ,
		'previewImageUrl' => $previewImageUrl2
		];
	$image3 = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl3 ,
		'previewImageUrl' => $previewImageUrl3
		];
	$data = [
		'replyToken' => $replyToken,
		'messages' => [$image1,$image2,$image3]
		];	
	return $data;
}
function t1im2($replyToken,$tt1,$originalContentUrl1,$previewImageUrl1,$originalContentUrl2,$previewImageUrl2)
{
	$messages = [
		'type' => 'text',
		'text' => $tt1
		];
	$image1 = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl1 ,
		'previewImageUrl' => $previewImageUrl1
		];
	$image2 = [
		'type' => 'image',
		'originalContentUrl' => $originalContentUrl2 ,
		'previewImageUrl' => $previewImageUrl2
		];
	$data = [
		'replyToken' => $replyToken,
		'messages' => [$messages,$image1,$image2]
		];	
	return $data;
}
// Function Return data
function data1($replyToken,$messages)
{
	$data = [
		'replyToken' => $replyToken,
		'messages' => [$messages]
		];
	return $data;
}
// Get POST body content
$content = file_get_contents('php://input');
//$content = iconv(mb_detect_encoding($content, mb_detect_order(), true), "UTF-8", $content);
//$content = mb_convert_encoding($content, 'UTF-8');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when Follow me.
		if (($event['type'] == 'follow') or ($event['type'] == 'join')) {
			// Get user follow or join me
			$touserid = $event['source']['userId'];
			// Gen Text Reply
			$gentext = "ขอบคุณที่ติดตามเรา";
			// Get Replytoken
			$replyToken = $event['replyToken'];
			//Make a POST Request to Messaging API to reply to follower
			$messages = t1($gentext);
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = data1($replyToken,$messages);
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
			
			// Find User Data
			$url = 'https://api.line.me/v2/bot/profile/'.$touserid;
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
                        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);
			//echo $result . "\r\n";
			$events = json_decode($result, true);
			// Make Push Messageing
			$displayName = $events['displayName'];
			$userId = $events['userId'];
			$text = $displayName."\n".$userId;
			$messages = [
				'type' => 'text',
				'text' => $text
				//.'\nRequest '.$reqtext
			];
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
			
		// Reply only  message sent is in 'text' format, 'image' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$touserid = $event['source']['userId'];
			$text = $event['message']['text'];
			//$text = mb_convert_encoding($text, "UTF-8");
			//$text = utf8_encode($text);
			$reqtext = $text;
			$text = trim($text);
			$text = strtolower($text);
			$lentext = strlen($text);
			$cut2headtext = substr($text,0,2);
			
			// Equipment Select sb, tx, ln, sp			
			switch ($cut2headtext) {
				case "sb":
					$cut3midtext = substr($text,3,3);		
					$cut3midtext = trim($cut3midtext);
					$bsubname = false;
					if (($cut3midtext == "bk") or ($cut3midtext == "bn") or ($cut3midtext == "bpl") or ($cut3midtext == "chw") or ($cut3midtext == "lpr") or ($cut3midtext == "lla") or ($cut3midtext == "nb") or ($cut3midtext == "nco") or ($cut3midtext == "nv") or ($cut3midtext == "on") or ($cut3midtext == "rps") or ($cut3midtext == "rs") or ($cut3midtext == "sb") or ($cut3midtext == "sno") or ($cut3midtext == "stb") or ($cut3midtext == "tpr")) {
						$bsubname = true;
						$cut3midtext = "bk";
					}
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
					$bcode = false;
					if (($cut3lastext == "inf") or ($cut3lastext == "con")) {
						$bcode = true;
					}
					// Find txt data name
					if (($bsubname) and ($bcode)) {
						$gentext = "Switching & Single Line Diagram สฟ ".$cut3midtext;
						//$gentext = "Switching และ Single Line Diagram สฟ ";
						$originalContentUrl1 = $originalUrl."sub/".$cut3midtext."/swd.jpg";
						$previewImageUrl1 = $originalUrl."sub/".$cut3midtext."/swd.jpg";
						$originalContentUrl2 = $originalUrl."sub/".$cut3midtext."/sld.jpg";
						$previewImageUrl2 = $originalUrl."sub/".$cut3midtext."/sld.jpg";	
						$lengentext = "1 ข้อความ, 2 ภาพ";
						$tempsend = "t1im2";
					} else {
						$gentext = "คำขอของท่านไม่ถูกต้อง";
						$tempsend = "t1";
					}
					//$gentext = "คำขอของท่านไม่ถูกต้อง";
					//$tempsend = "t1";
					break;
				case "pr":					
					$cut3midtext = substr($text,3,3);		
					$cut3midtext = trim($cut3midtext);
					$bpriEq = false;					
					if (($cut3midtext == "ln") or ($cut3midtext == "tx") or ($cut3midtext == "cb")) {
						$bpriEq = true;
					}					
					// Find txt data name
					if ($bpriEq) {
						switch $cut3midtext {
							case "ln":
								$originalContentUrl1 = $priorityEqUrl."Line_Page_1.jpg";
								$previewImageUrl1 = $priorityEqUrl."Line_Page_1.jpg";
								$originalContentUrl2 = $priorityEqUrl."Line_Page_2.jpg";
								$previewImageUrl2 = $priorityEqUrl."Line_Page_2.jpg";
								$lengentext = "2 ภาพ";
								$tempsend = "im2";
								break;
							case "tx":
								$originalContentUrl1 = $priorityEqUrl."Tx_Page_1.jpg";
								$previewImageUrl1 = $priorityEqUrl."Tx_Page_1.jpg";
								$originalContentUrl2 = $priorityEqUrl."Tx_Page_2.jpg";
								$previewImageUrl2 = $priorityEqUrl."Tx_Page_2.jpg";
								$originalContentUrl3 = $priorityEqUrl."Tx_Page_3.jpg";
								$previewImageUrl3 = $priorityEqUrl."Tx_Page_3.jpg";
								$lengentext = "3 ภาพ";
								$tempsend = "im3";
								break;
							case "cb":
								$originalContentUrl1 = $priorityEqUrl."C_Page_1.jpg";
								$previewImageUrl1 = $priorityEqUrl."C_Page_1.jpg";
								$originalContentUrl2 = $priorityEqUrl."C_Page_2.jpg";
								$previewImageUrl2 = $priorityEqUrl."C_Page_2.jpg";
								$originalContentUrl3 = $priorityEqUrl."C_Page_3.jpg";
								$previewImageUrl3 = $priorityEqUrl."C_Page_3.jpg";
								$lengentext = "3 ภาพ";
								$tempsend = "im3";
								break;																
							default :
								$gentext = "คำขอของท่านไม่ถูกต้อง";
								$tempsend = "t1";
						}
					} else {
						$gentext = "คำขอของท่านไม่ถูกต้อง";
						$tempsend = "t1";
					}
					break;
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
					$lengentext = strlen($gentext)." ตัวอักษร";
					if ($lengentext < 1) {
						$gentext = "ไม่มีข้อมูลหม้อแปลงที่ร้องขอ ขอภัยครับ";
					}
					$tempsend = "t1";
					break;
				case "ln":
					$gentext = "Line";
					$originalContentUrl = $originalUrl."ln/originln.jpg";
					//$previewImageUrl = "https://pacific-scrubland-67443.herokuapp.com/ln/previewln.jpg";
					$previewImageUrl = $originalUrl."ln/originln.jpg";
					$lengentext = "1 ภาพ";
					$tempsend = "im1";
					//$tempsend = "t1im2";
					break;
				case "cn":
					$adminuser = file_get_contents("userId/admin.txt");
					$ttouserid = trim($touserid);
					$tadminuser = trim($adminuser);
					//$gentext = strrpos($tadminuser,$ttouserid);
					if ($ttouserid == $tadminuser) {
						//$gentext = $tadminuser;
						//$gentext = $gentext."\n"."Thank you, Admin."."\n".$ttouserid."\n".$tadminuser;
						$gentext = "Thank you, Admin.";
						$cut3midtext = substr($text,3,3);		
						$cut3midtext = trim($cut3midtext);
						$gentext = $gentext."\n".$cut3midtext;
						$lengentext = strlen($gentext)." ตัวอักษร";
					} else {
						//$gentext = strpos($ttouserid,$tadminuser);
						$gentext = $gentext."\n"."คุณไม่ใช่ Admin การใช้คำสั่งนี้ จะทำให้คุณถูก Block"."\n".$ttouserid."\n".$tadminuser;
						$lengentext = strlen($gentext)." ตัวอักษร";
					}
					$tempsend = "t1";
					break;
				default:
					$gentext = "ขออภัย ระบบไม่สามารถหาข้อมูลได้";
					$lengentext = strlen($gentext)." ตัวอักษร";
					$tempsend = "t1";
			}
			//$text = $gentext."\n".$lengentext." By Pitak Mahaman";
			//$text = $gentext."\n".$lengentext." Solfware By Pitak Mahaman"."\n";
			//$text = "First Code : ".$cut2headtext."\n"."Second Code : ".$cut3midtext."\n".$lengentext." By Pitak Mahaman";
			
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			switch ($tempsend) {
				case "t1" :
					$text = $gentext."\nPlatform By Line Application";
					$messages = t1($text);
					$data = data1($replyToken,$messages);
					break;
				case "im1" :
					$messages = im1($originalContentUrl,$previewImageUrl);
					$data = data1($replyToken,$messages);
					break;	
				case "im2" :
					$data = im2($replyToken,$originalContentUrl1,$previewImageUrl1,$originalContentUrl2,$previewImageUrl2);
					break;	
				case "im3" :
					$data = im3($replyToken,$originalContentUrl1,$previewImageUrl1,$originalContentUrl2,$previewImageUrl2,$originalContentUrl3,$previewImageUrl3);
					break;	
				case "t1im2" :
					$text = $gentext."\nPlatform By Line Application";	
					//$messages = t1($text);	
					//$data = data1($replyToken,$messages);
					//$originalContentUrl1 = $originalContentUrl;
					//$originalContentUrl2 = $originalContentUrl;
					//$previewImageUrl1 = $previewImageUrl;
					//$previewImageUrl2 = $previewImageUrl;
					$data = t1im2($replyToken,$text,$originalContentUrl1,$previewImageUrl1,$originalContentUrl2,$previewImageUrl2);
					break;	
				default :
					$text = $gentext."\n".$lengentext." Platform By Line Application";
					$messages = t1($text);	
					$data = data1($replyToken,$messages);
			}
			//$messages = [
			//	'type' => 'text',
			//	'text' => "ส่งข้อความ++"
			//];
			//$images = [
			//	'type' => 'image',
			//	'originalContentUrl' => "https://pacific-scrubland-67443.herokuapp.com/ln/originln.jpg" ,
			//	'previewImageUrl' => "https://pacific-scrubland-67443.herokuapp.com/ln/originln.jpg"
			//];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			//$data = data1($replyToken,$messages);
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
			
			// Find User Data
			$url = 'https://api.line.me/v2/bot/profile/'.$touserid;
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
                        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
			$result = curl_exec($ch);
			curl_close($ch);
			//echo $result . "\r\n";
			$events = json_decode($result, true);
			// Make Push Messageing
			$displayName = $events['displayName'];
			$userId = $events['userId'];
			$text = $displayName."\n".$userId."\nส่งข้อความRequestคือ\n".$reqtext."\nตอบกลับไป ".$lengentext;
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
	}
}
echo "OK";
