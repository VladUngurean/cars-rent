<?php

  $dbhost ="sql.freedb.tech";
  $dbuser = "freedb_vladd";
  $dbpass="ZTCX&G&2&qwYjzW";
  $dbname ="freedb_dream_cars";

  try {
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
  } catch (mysqli_sql_exception) {
    echo "Can not connect to Data Base";
  }
?>