<?php

$dbhost ="sql.freedb.tech";
$dbuser = "freedb_Vladd";
$dbpass="28wSGgn5FJ*MxtQ";
$dbname ="freedb_carsrent";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
// Create connection
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>