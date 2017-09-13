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

function temp2butt($tt1)
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
		'altText' => 'MAC Share Menu',
		'template' => [
			'type' => 'buttons',
			'thumbnailImageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FMac_Share_Menu.jpg',
			//'title' => 'Menu',
			'text' => 'กรุณาเลือกหัวข้อด้านควบคุมระบบ',
			'actions' => [$act1,$act2]
			]
		];
	return $messages;
}

function temp2comf($tt1)
{
	$act1 = [
		'type' => 'message',
		'label' => 'Yes',
		'text' => 'yes'	
		];
	$act2 = [
		'type' => 'message',
		'label' => 'No',
		'text' => 'no'	
		];	
	$messages = [
		'type' => 'template',
		'altText' => 'MAC Share Comfirm',
		'template' => [
			'type' => 'confirm',
			'text' => 'คุณต้องการลบข้อมูล',
			'actions' => [$act1,$act2]
			]
		];
	return $messages;
}

function temp2caro($tt1)
{
	//Column 1
	$col1_1 = [
		'type' => 'postback',
		'label' => 'BK',
		'data' => 'action=buy&itemid=111'	
		];
	$col1_2 = [
		'type' => 'postback',
		'label' => 'BN',
		'data' => 'action=buy&itemid=111'	
		];
	$col1_3 = [
		'type' => 'postback',
		'label' => 'BPL',
		'data' => 'action=buy&itemid=111'	
		];
	$col1 = [
		'thumbnailImageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FMac_Share_Menu.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'actions' => [$col1_1,$col1_2,$col1_3]
		];
	
	//Column 2
	$col2_1 = [
		'type' => 'postback',
		'label' => 'CHW',
		'data' => 'action=buy&itemid=111'	
		];
	$col2_2 = [
		'type' => 'postback',
		'label' => 'LPR',
		'data' => 'action=buy&itemid=111'	
		];
	$col2_3 = [
		'type' => 'postback',
		'label' => 'LLA',
		'data' => 'action=buy&itemid=111'	
		];
	$col2 = [
		'thumbnailImageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FMac_Share_Menu.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'actions' => [$col2_1,$col2_2,$col2_3]
		];
	
	//Column 3
	$col3_1 = [
		'type' => 'postback',
		'label' => 'NB',
		'data' => 'action=buy&itemid=111'	
		];
	$col3_2 = [
		'type' => 'postback',
		'label' => 'NCO',
		'data' => 'action=buy&itemid=111'	
		];
	$col3_3 = [
		'type' => 'postback',
		'label' => 'NV',
		'data' => 'action=buy&itemid=111'	
		];
	$col3 = [
		'thumbnailImageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FMac_Share_Menu.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'actions' => [$col3_1,$col3_2,$col3_3]
		];
	
	//Column 4
	$col4_1 = [
		'type' => 'postback',
		'label' => 'ON',
		'data' => 'action=buy&itemid=111'	
		];
	$col4_2 = [
		'type' => 'postback',
		'label' => 'RPS',
		'data' => 'action=buy&itemid=111'	
		];
	$col4_3 = [
		'type' => 'postback',
		'label' => 'RS',
		'data' => 'action=buy&itemid=111'	
		];
	$col4 = [
		'thumbnailImageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FMac_Share_Menu.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'actions' => [$col4_1,$col4_2,$col4_3]
		];
	
	//Column 5
	$col5_1 = [
		'type' => 'postback',
		'label' => 'SB',
		'data' => 'action=buy&itemid=111'	
		];
	$col5_2 = [
		'type' => 'postback',
		'label' => 'SNO',
		'data' => 'action=buy&itemid=111'	
		];
	$col5_3 = [
		'type' => 'postback',
		'label' => 'STB',
		'data' => 'action=buy&itemid=111'	
		];
	$col5 = [
		'thumbnailImageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FMac_Share_Menu.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'actions' => [$col5_1,$col5_2,$col5_3]
		];
	
	$messages = [
		'type' => 'template',
		'altText' => 'MAC Substation',
		'template' => [
			'type' => 'carousel',
			'columns' => [$col1,$col2,$col3,$col4,$col5]
			]
		];
	return $messages;
}

function temp2imgcol($tt1)
{
	$col1_act = [
		'type' => 'postback',
		'label' => 'Power Flow',
		'data' => 'action=buy&itemid=111'	
		];
	$col1 = [
		'imageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FColMenu_1.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'action' => $col1_act
		];
		
	$col2_act = [
		'type' => 'postback',
		'label' => 'Walk Around',
		'data' => 'action=buy&itemid=111'	
		];
	$col2 = [
		'imageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FColMenu_2.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'action' => $col2_act
		];	

	$col3_act = [
		'type' => 'postback',
		'label' => 'Contigency',
		'data' => 'action=buy&itemid=111'	
		];
	$col3 = [
		'imageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FColMenu_3.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'action' => $col3_act
		];		
	
	$col4_act = [
		'type' => 'postback',
		'label' => 'Record',
		'data' => 'action=buy&itemid=111'	
		];
	$col4 = [
		'imageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FColMenu_4.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'action' => $col4_act
		];
	
	$col5_act = [
		'type' => 'postback',
		'label' => 'Record',
		'data' => 'action=buy&itemid=111'	
		];
	$col5 = [
		'imageUrl' => 'https://ecs.egat.co.th/index.php/apps/gallery/ajax/image.php?file=fd20b4335410e38c017713bd6d458deb%2F%2FColMenu_5.jpg',
		'title' => 'This is menu.',
		'text' => 'Discription',
		'action' => $col5_act
		];	
	
	$messages = [
		'type' => 'template',
		'altText' => 'MAC Share Menu',
		'template' => [
			'type' => 'image_carousel',
			'columns' => [$col1,$col2,$col3,$col4,$col5]
			]
		];
	return $messages;
}

$text = "TestTest";
	
	
if (!is_null($text)) {
//if (!empty($_POST)){
	//$text = "ได้รับ Mail จาก :".$return_path."\nหัวข้อ :".$subject."\nเนื่อหา".$plain;
	//$messages = t1($text);
	//$messages = temp2butt($text);
	//$messages = temp2comf($text);
	//$messages = temp2caro($text);
	$messages = temp2imgcol($text);
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
