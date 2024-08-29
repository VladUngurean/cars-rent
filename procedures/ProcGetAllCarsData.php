<?php
include "../config.php";
// echo isset($_SESSION["email"]) ? 'Session is active' : 'Session is not active';
$result = $conn->query('SELECT car_make.make, GROUP_CONCAT(car_make_models.model) AS models FROM car_make
                        left JOIN 
                        car_make_models ON car_make.make_id=car_make_models.make_id
                        GROUP BY make;');
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $dataMakesModels[] = array(
        'make' => $row['make'],
        'model' => $row['models'],
    );
    }
    if (!empty($dataMakesModels)) {
      echo '<script> let makesModelsFromDb = ' . json_encode($dataMakesModels) . '; </script>';
    } else {
      echo '<script> let makesModelsFromDb =  ""; </script>';
      echo json_encode(["message" => "No make and models found"]);
    }
  } 
  $result->close();
  $conn->next_result();
//    else {
// }
  // get transmissions 

$result = $conn->query("SELECT car_transmission_type.transmission_type  FROM car_transmission_type;");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $dataTransmissions[] = array(
        'transmissionType' => $row['transmission_type'],
    );
    }
    if (!empty($dataTransmissions)) {
      echo '<script> const transmissionsFromDb = ' . json_encode($dataTransmissions) . '; </script>';
    } else {
      echo '<script> const transmissionsFromDb = ""; </script>';
      echo json_encode(["message" => "No trsnsmission type found"]);
    }
  }
$result->close();
$conn->next_result();
// getEngineFuels 
$result = $conn->query("SELECT car_engine_fuel.engine_fuel FROM car_engine_fuel;");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $dataEngineFuel[] = array(
      'engineFuel' => $row['engine_fuel'],
    );
    }
    if (!empty($dataEngineFuel)) {
      echo '<script> const engineFuelsFromDb = ' . json_encode($dataEngineFuel) . '; </script>';
    } else {
      echo '<script> const engineFuelsFromDb = ""; </script>';
      echo json_encode(["message" => "No engine Fuel found"]);
    }
  }
  $result->close();
  $conn->next_result();
  // getBodyTypes 
$result = $conn->query("SELECT car_body_type.body_type FROM car_body_type;");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $dataBodyType[] = array(
        'bodyType' => $row['body_type'],
    );
    }
    if (!empty($dataEngineFuel)) {
      echo '<script> const bodyTypesFromDb = ' . json_encode($dataBodyType) . '; </script>';
    } else {
      echo '<script> const bodyTypesFromDb = ""; </script>';
      echo json_encode(["message" => "No body Type found"]);
    }
  }
  $result->close();
  $conn->next_result();
  // $conn->close();
?>