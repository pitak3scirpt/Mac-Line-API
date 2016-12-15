<?php
echo "Hello LINE BOT <br>";
echo "Test Tx BK TEXT <br>";
$buffer = file_get_contents("TxBK.txt");
$buffer = iconv("UTF-8", "ISO-8859-2//TRANSLIT", $buffer), PHP_EOL;
echo $buffer;
?>
