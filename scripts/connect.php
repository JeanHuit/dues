<?php


  // $DB_DATABASE = getenv('DB_DATABASE');
  // $DB_PASSWORD = getenv('DB_PASSWORD');
  // $DB_SERVER = getenv('DB_SERVER');
  // $DB_USERNAME = getenv('DB_USERNAME');
  // $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);



$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$dbase = substr($url["path"], 1);

$db = new mysqli($server, $username, $password, $dbase);
 ?>
