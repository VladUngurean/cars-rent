<?php
include "config.php";

session_start();
// echo isset($_SESSION["email"]) ? 'Session is active' : 'Session is not active';

$sql = 'CALL GetCarInformation()';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $data[] = array(
        'carImage' => $row['images'],
        'make' => $row['make'],
        'model' => $row['model'],
        'registrationYear' => $row['registration_year'],
        'transmissionType' => $row['transmission_type'],
        'engineFuel' => $row['engine_fuel'],
        'engineCapacity' => $row['engine_capacity'],
        'bodyType' => $row['body_type'],
        'dorsNumber' => $row['doors_number'],
        'passengersNumber' => $row['passengers_number'],
        'description' => $row['car_description'],
        'rentDaysPrice1_2' => $row['rent_days_price_1_2'],
        'rentDaysPrice3_7' => $row['rent_days_price_3_7'],
        'rentDaysPrice8_20' => $row['rent_days_price_8_20'],
        'rentDaysPrice21_45' => $row['rent_days_price_21_45'],
        'rentDaysPrice46' => $row['rent_days_price_46'],
        'rentStatus' => $row['rent_status']
    );
    }
    echo '<script>';
    echo 'let carData = ' . json_encode($data) . ';';
    // echo 'console.log(carData);';
    echo '</script>';

  } else {
    echo json_encode(["message" => "No data found"]);
  }

  $conn->close();
?>