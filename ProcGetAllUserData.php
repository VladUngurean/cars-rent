<?php
include "config.php";

$email = $_SESSION['email'];
$query = "CALL getUserData('$email');";
$result = mysqli_query($conn, $query);
// $result = $conn->query("CALL getUserAccountData($email);");


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $userData = [
        'firstName' => $row['first_name'],
        'lastName' => $row['last_name'],
        'email' => $row['email'],
        'phone' => $row['phone'],
        'totalSpent' => $row['total_spent'],
        'totalCashback' => $row['total_cashback'],
        'debt' => $row['debt'],
      ];
    }
    if (!empty($userData)) {
      echo '<script> const userData = ' . json_encode($userData) . '; </script>';
      echo '<script> console.log(userData); </script>';
    }

  } else {
    echo '<script> const userData = ""; </script>';
    echo json_encode(["message" => "No engine Fuel found"]);
  }
  $result->close();
  $conn->next_result();

  
  $query = "CALL getUserRentedCars('$email');";
  $result = mysqli_query($conn, $query);
  // $result = $conn->query("CALL getUserAccountData($email);");

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $rentedCarData[] = [
      'imagePath' => $row['images'],
      'carPlate' => $row['car_plate'],
      'make' => $row['make'],
      'model' => $row['model'],
      'registrationYear' => $row['registration_year'],
      'engineCapacity' => $row['engine_capacity'],
      'engineFuel' => $row['engine_fuel'],
      'transmissionType' => $row['transmission_type'],
      'bodyType' => $row['body_type'],
      'doorsNumber' => $row['doors_number'],
      'passengersNumber' => $row['passengers_number'],
      
      'rentStartDateTime' => $row['rent_start_date_time'],
      'rentEndDateTime' => $row['rent_end_date_time'],
      
      'insuranceType' => $row['insurance_type'],
      'pickupPlace' => $row['pickup_place'],
      'rentedCarFullCost' => $row['rented_car_full_cost'],
      'rentedCarCashback' => $row['rented_car_cashback'],
      ];
    }
    // echo $rentedCarData[0]["rentStartDateTime"];
    foreach($rentedCarData as &$car){
      $rent_start_datetime = $car["rentStartDateTime"];
      $rent_end_datetime = $car["rentEndDateTime"];
      $new_rent_start_datetime = new DateTime($rent_start_datetime);
      $new_rent_end_datetime = new DateTime($rent_end_datetime);
      $car["rentStartDateTime"] = $new_rent_start_datetime->format('Y-m-d H:i');
      $car["rentEndDateTime"] = $new_rent_end_datetime->format('Y-m-d H:i');
    }
    unset($car);
    
    if (!empty($rentedCarData)) {
      echo '<script> const rentedCarData = ' . json_encode($rentedCarData) . '; </script>';
      echo '<script> console.log(rentedCarData); </script>';
    } else {
      echo '<script> const rentedCarData = []; </script>';
      // echo json_encode(["message" => "No rented cars"]);
    }

  } 
  $result->close();
  $conn->next_result();
?>