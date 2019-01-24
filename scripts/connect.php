<?php

   define('DB_SERVER', $DB_SERVER);
   define('DB_USERNAME', $DB_USERNAME);
   define('DB_PASSWORD', $DB_PASSWORD);
   define('DB_DATABASE', $DB_DATABASE);
   $db = mysqli_connect($DB_SERVER,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
 ?>
