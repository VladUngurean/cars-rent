<?php
include "config.php";

$result = $conn->query('CALL GetCarInformation()');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $data[] = array(
      'plate' => $row['car_plate'],
      'make' => $row['make'],
      'model' => $row['model'],
      'registrationYear' => $row['registration_year'],
      'transmissionType' => $row['transmission_type'],
      'engineFuel' => $row['engine_fuel'],
      'engineCapacity' => $row['engine_capacity'],
      'bodyType' => $row['body_type'],
      'dorsNumber' => $row['doors_number'],
      'passengersNumber' => $row['passengers_number'],
      'descriptionEn' => $row['description_english'],
      'descriptionRo' => $row['description_romanian'],
      'rentDaysPrice1_2' => $row['rent_days_price_1_2'],
      'rentDaysPrice3_7' => $row['rent_days_price_3_7'],
      'rentDaysPrice8_20' => $row['rent_days_price_8_20'],
      'rentDaysPrice21_45' => $row['rent_days_price_21_45'],
      'rentDaysPrice46' => $row['rent_days_price_46'],
      'rentStatus' => $row['rent_status'],
      'carImage' => $row['images'],
    );
    }
    if (!empty($data)) {
      echo '<script>';
      echo 'let carData = ' . json_encode($data) . ';';
      echo '</script>';
  }
} else {
    echo '<script>';
    echo 'let carData = "";';
    echo '</script>';
}
  $conn->next_result();
?>