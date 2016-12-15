<?php
echo "Hello LINE BOT";
echo "Test Tx BK TEXT";
$handle = fopen("TxBK.txt", "r");
while (!feof($handle)) {
    $buffer = fgets($handle, 4096);
    echo $buffer;
}
fclose($handle);
?>
