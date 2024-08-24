<?php

include "config.php";

if (!empty($conn)) {

  $result = $conn->query('
    SELECT car.car_plate, 
    car_make.make, 
    car_make_models.model, 
    car.registration_year,
    car_transmission_type.transmission_type,
    car_engine_fuel.engine_fuel,
    car.engine_capacity,
    car_body_type.body_type,
    car.doors_number,
    car.passengers_number,
    car_description.description_english,
    car_description.description_romanian,
    car_rent_cost.rent_days_price_1_2,
    car_rent_cost.rent_days_price_3_7,
    car_rent_cost.rent_days_price_8_20,
    car_rent_cost.rent_days_price_21_45,
    car_rent_cost.rent_days_price_46,
    car.rent_status,
    GROUP_CONCAT(car_images.image_path SEPARATOR ',') AS images 
    FROM car
    LEFT JOIN car_make_models ON car.model_id=car_make_models.model_id
    LEFT JOIN car_make ON car_make_models.make_id=car_make.make_id
    LEFT JOIN car_transmission_type ON car.transmission_type_id=car_transmission_type.transmission_type_id
    LEFT JOIN car_engine_fuel ON car.engine_fuel_id=car_engine_fuel.engine_fuel_id
    LEFT JOIN car_body_type ON car.body_type_id=car_body_type.body_type_id
    LEFT JOIN car_description ON car.car_id=car_description.car_id
    LEFT JOIN car_rent_cost ON car.car_id=car_rent_cost.car_id
    LEFT JOIN car_images ON car.car_id=car_images.car_id
    GROUP BY car.car_id;
  ');



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

      echo '<script> let carData = ' . json_encode($data) . '; </script>';

    }

  } else {

    echo '<script> let carData = ""; </script>';

  }

  $conn->next_result();



}



?>