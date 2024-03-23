<?php

  $dbhost ="sql.freedb.tech";
  $dbuser = "freedb_Vladd";
  $dbpass="28wSGgn5FJ*MxtQ";
  $dbname ="freedb_carsrent";

  try {
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
  } catch (mysqli_sql_exception) {
    echo "Can not connect to Data Base";
  }
  // if (!empty($conn)) {
  //   echo "Connected successfully";
  // }
?>