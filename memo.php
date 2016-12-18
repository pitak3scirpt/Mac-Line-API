<!DOCTYPE html>
<html>
<body>

<?php
$myfile = fopen("masteryoda.txt", "r") or die("Unable to open file!");
echo fgets($myfile);
fclose($myfile);
?>

</body>
</html>
