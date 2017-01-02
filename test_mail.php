<?php
echo "test mail";
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
if (($event['headers']['Return-Path'] == 'pitak.m@egat.co.th') {
  echo "Mail Recieve";
}
?>
