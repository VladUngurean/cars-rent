<?php

  $dbhost ="localhost";
  $dbuser = "id21984908_vlad";
  $dbpass="112233Vl!";
  $dbname ="id21984908_dreamcars";

  try {
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
  } catch (mysqli_sql_exception) {
    echo "Can not connect to Data Base";
  }
?>