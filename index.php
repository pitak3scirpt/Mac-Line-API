<?php
echo "Hello LINE BOT \n";
echo "Test Tx BK TEXT \n";
$handle = fopen("TxBK.txt", "r");
while (!feof($handle)) {
    $buffer = fgets($handle, 4096);
    echo $buffer;
}
fclose($handle);
?>
