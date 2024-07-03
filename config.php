<?php

  $dbhost ="localhost";
  $dbuser = "root";
  $dbpass="admin";
  $dbname ="ch_dream_cars";

  try {
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
  } catch (mysqli_sql_exception) {
    echo "Can not connect to Data Base";
  }
?>