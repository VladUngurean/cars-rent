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

    if (!empty($dataMakesModels)) {
      echo '<script>';
      echo 'let makesModelsFromDb = ' . json_encode($dataMakesModels) . ';';
      echo '</script>';
    } 

  } else {
    echo '<script>';
    echo 'let makesModelsFromDb =  "";';
    echo '</script>';
    echo json_encode(["message" => "No make and models found"]);
  }
  $result->close();
  $conn->next_result();
//    else {
// }
  // get transmissions 

$result = $conn->query('CALL getTransmissionTypes();');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataTransmissions[] = array(
        'transmissionType' => $row['transmission_type'],
    );
    }
    if (!empty($dataTransmissions)) {
      echo '<script>';
      echo 'const transmissionsFromDb = ' . json_encode($dataTransmissions) . ';';
      echo '</script>';
    }
  } else {
    echo '<script>';
    echo 'const transmissionsFromDb = "";';
    echo '</script>';
    echo json_encode(["message" => "No trsnsmission type found"]);
  }
$result->close();
$conn->next_result();
// getEngineFuels 

$result = $conn->query('CALL getEngineFuelTypes();');

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataEngineFuel[] = array(
        'engineFuel' => $row['engine_fuel'],
    );
    }
    if (!empty($dataEngineFuel)) {
      echo '<script>';
      echo 'const engineFuelsFromDb = ' . json_encode($dataEngineFuel) . ';';
      echo '</script>';
    }

  } else {
    echo '<script>';
    echo 'const engineFuelsFromDb = "";';
    echo '</script>';
    echo json_encode(["message" => "No engine Fuel found"]);
  }
  $result->close();
  $conn->next_result();
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
  } else {
    echo '<script>';
    echo 'const bodyTypesFromDb = "";';
    echo '</script>';
    echo json_encode(["message" => "No body Type found"]);
  }
  $result->close();
  $conn->next_result();

  // $conn->close();
?>