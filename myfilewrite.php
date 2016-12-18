<?php
$myfile = fopen("jedicouncil.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
$myfile = file_get_contents("jedicouncil.txt");

echo $myfile;

?>
