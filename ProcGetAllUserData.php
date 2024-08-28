<?php
include "config.php";
$email = $_SESSION['email'];
$query = "SELECT user.first_name, user.last_name, user.email, 
          user.phone,
          user_finances.total_spent, 
          user_finances.total_cashback,
          user_finances.debt
          FROM user 
          LEFT JOIN user_finances USING(user_id)
          WHERE user.email=$email;";

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


  $query = "SELECT
            GROUP_CONCAT(car_images.image_path SEPARATOR ',') AS images,
            car.car_plate,
            car_make.make,
            car_make_models.model,
            car.registration_year,
            car.engine_capacity,
            car_engine_fuel.engine_fuel, 
            car_transmission_type.transmission_type,
            car_body_type.body_type,
            car.doors_number,
            car.passengers_number,
            rented_car.rent_start_date_time,
            rented_car.rent_end_date_time,
            rented_car_insurance.insurance_type,
            rented_cars_pickup_place.pickup_place,
            rented_car_cost.rented_car_full_cost,
            rented_car_cost.rented_car_cashback

            FROM user 
            LEFT JOIN rented_car USING (user_id)
            LEFT JOIN car USING(car_id)
            LEFT JOIN car_images USING(car_id)
            LEFT JOIN car_make_models USING (model_id)
            LEFT JOIN car_make USING(make_id)
            LEFT JOIN car_engine_fuel USING(engine_fuel_id)
            LEFT JOIN car_transmission_type USING(transmission_type_id)
            LEFT JOIN car_body_type USING(body_type_id)
            LEFT JOIN rented_car_insurance ON rented_car.car_insurance=rented_car_insurance.insurance_id
            LEFT JOIN rented_cars_pickup_place ON rented_car.car_pickup_place=rented_cars_pickup_place.pickup_place_id
            LEFT JOIN rented_car_cost USING(rented_car_id)
            WHERE user.email=$email
            GROUP BY car.car_plate,
            car_make.make,
            car_make_models.model,
            car.registration_year,
            car.engine_capacity,
            car_engine_fuel.engine_fuel, 
            car_transmission_type.transmission_type,
            car_body_type.body_type,
            car.doors_number,
            car.passengers_number,
            rented_car.rent_start_date_time,
            rented_car.rent_end_date_time,
            rented_car_insurance.insurance_type,
            rented_cars_pickup_place.pickup_place,
            rented_car_cost.rented_car_full_cost,
            rented_car_cost.rented_car_cashback;";

  $result = mysqli_query($conn, $query);

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