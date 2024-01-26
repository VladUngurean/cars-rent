<?php
include "config.php";

// echo isset($_SESSION["email"]) ? 'Session is active' : 'Session is not active';

$result = $conn->query('CALL getMakeModels()');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataMakesModels[] = array(
        'make' => $row['make'],
        'model' => $row['models'],
    );
    }
    echo '<script>';
    echo 'let makesModelsFromDb = ' . json_encode($dataMakesModels) . ';';
    echo '</script>';

    $result->close();
    $conn->next_result();
  } else {
    echo json_encode(["message" => "No data found"]);
  }
  // get transmissions 

$result = $conn->query('CALL getTransmissions();');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataTransmissions[] = array(
        'transmissionType' => $row['transmission_type'],
    );
    }
    echo '<script>';
    echo 'const transmissionsFromDb = ' . json_encode($dataTransmissions) . ';';
    echo '</script>';
 $result->close();
 $conn->next_result();
  } else {
    echo json_encode(["message" => "No data found"]);
  }
  // getEngineFuels 

$result = $conn->query('CALL getEngineFuels();');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataEngineFuel[] = array(
        'engineFuel' => $row['engine_fuel'],
    );
    }
    echo '<script>';
    echo 'const engineFuelsFromDb = ' . json_encode($dataEngineFuel) . ';';
    echo '</script>';
 $result->close();
 $conn->next_result();
  } else {
    echo json_encode(["message" => "No data found"]);
  }
  // getBodyTypes 

$result = $conn->query('CALL getBodyTypes();');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataBodyType[] = array(
        'bodyType' => $row['body_type'],
    );
    }
    echo '<script>';
    echo 'const bodyTypesFromDb = ' . json_encode($dataBodyType) . ';';
    echo '</script>';
 $result->close();
 $conn->next_result();
  } else {
    echo json_encode(["message" => "No data found"]);
  }
  // getDoorsNumber 

$result = $conn->query('CALL getDoorsNumber();');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataDoorsNumber[] = array(
        'doorsNumber' => $row['doors_number'],
    );
    }
    echo '<script>';
    echo 'const doorsNumberFromDb = ' . json_encode($dataDoorsNumber) . ';';
    echo '</script>';
 $result->close();
 $conn->next_result();
  } else {
    echo json_encode(["message" => "No data found"]);
  }
  // getPassengersNumber 

$result = $conn->query('CALL getPassengersNumber();');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $dataPassengersNumber[] = array(
        'passengersNumber' => $row['passengers_number'],
    );
    }
    echo '<script>';
    echo 'const passengersNumberFromDb = ' . json_encode($dataPassengersNumber) . ';';
    echo '</script>';
 $result->close();
 $conn->next_result();
  } else {
    echo json_encode(["message" => "No data found"]);
  }

  // $conn->close();
?>