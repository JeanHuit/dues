<?php


  $DB_DATABASE = getenv('DB_DATABASE');
  $DB_PASSWORD = getenv('DB_PASSWORD');
  $DB_SERVER = getenv('DB_SERVER');
  $DB_USERNAME = getenv('DB_USERNAME');
  $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
 ?>
