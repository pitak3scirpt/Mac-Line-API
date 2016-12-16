<?php

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('token');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('to', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
