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

$result = $conn->query('CALL getTransmissionTypes();');

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

$result = $conn->query('CALL getEngineFuelTypes();');

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

  // $conn->close();
?>