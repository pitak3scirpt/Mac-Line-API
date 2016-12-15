<?php
echo "Hello LINE BOT <br>";
echo "Test Tx BK TEXT <br>";
$buffer = file_get_contents("TxBK.txt");
$buffer = utf8_decode($buffer);
echo $buffer;
?>
