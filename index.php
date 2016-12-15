<?php
echo "Hello LINE BOT <br>";
echo "Test Tx BK TEXT <br>";
$handle = fopen("TxBK.txt", "r");
while (!feof($handle)) {
    $buffer = fgets($handle, 4096);
    echo $buffer;
}
fclose($handle);
?>
