<?php
  // $dbhost ="sql310.infinityfree.com";
  // $dbuser = "if0_36986938";
  // $dbpass="53S9Q6NyOIa1Dhr";
  // $dbname ="if0_36986938_dream_cars";

  $dbhost ="localhost";
  $dbuser = "root";
  $dbpass="Admin112233";
  $dbname ="ch_dream_cars";

  try {
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
  } catch (mysqli_sql_exception) {
    echo "Can not connect to Data Base";
  }
?>