<?php



  $dbhost ="sql7.freesqldatabase.com";

  $dbuser = "sql7724574";

  $dbpass="b7EJTdnrvx";

  $dbname ="sql7724574";



  try {

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);

  } catch (mysqli_sql_exception) {

    echo "Can not connect to Data Base";

  }

?>