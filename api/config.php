<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "carsrent";

$dbhost ="sql.freedb.tech";
$dbuser = "freedb_Vladd";
$dbpass="28wSGgn5FJ*MxtQ";
$dbname ="freedb_carsrent";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
// Create connection
//$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>