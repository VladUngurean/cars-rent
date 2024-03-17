<?php

// Initialize the session variable if not set
if (!isset($_SESSION['local_car_plate'])) {
    $_SESSION['local_car_plate'] = "";
}

// Check if 'car_plate' is set in the GET parameters
if(isset($_GET['car_plate'])) {
    $car_plate = $_GET['car_plate'];

    $decoded_car_plate = urldecode($car_plate);

    // Set the decoded car_plate in the PHP session
    $_SESSION['local_car_plate'] = $decoded_car_plate;

    // Redirect to another page
    // header("Location: carRentPage.php");
    // exit; // Ensure that further execution stops after redirection
} else {
    // Handle error if car_plate not received
    echo "Did not select car yet";
}

$_SESSION['global_car_plate'] = $_SESSION['local_car_plate'];
echo " Global car_plate saved in session: ".$_SESSION['global_car_plate'];

?>