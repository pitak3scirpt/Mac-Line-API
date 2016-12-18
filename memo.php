<!DOCTYPE html>
<html>
<body>

<?php
  $myfile = fopen("jedicouncil.txt", "r") or die("Unable to open file!");
  echo fgets($myfile);
  fclose($myfile);
  $myfile = file_get_contents("jedicouncil.txt");
  echo "\n";
  echo $myfile;
?>

</body>
</html>
