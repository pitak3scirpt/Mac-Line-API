<?php

  //create a connection string from the PG database URL and then use it to connect
  $url=parse_url(getenv("HEROKU_POSTGRESQL_GREEN_URL"));

  $host = $url["host"];
  $port = $url["port"];
  $user = $url["user"];
  $password = $url["pass"];
  $dbname = substr($url["path"],1);

  $connect_string = "host='" . $host . "' ";
  $connect_string = $connect_string . "port=" . $port . " ";
  $connect_string = $connect_string . "user='" . $user . "' ";
  $connect_string = $connect_string . "password='" . $password . "' ";
  $connect_string = $connect_string . "dbname='" . $dbname . "' ";

  $db = pg_connect($connect_string);

  pg_close($db);

?> 
