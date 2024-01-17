<?php

// include "config.php";

// $sql= "SELECT cars.car_image, car_make_title.title, cars.rent_days_price_46, cars.registration_year, car_transmission.transmission_type, car_engine_fuel.engine_fuel 
// FROM `cars` 
// LEFT JOIN car_make_title
// on cars.make_title=car_make_title.make_title_id
// LEFT JOIN car_transmission
// ON cars.transmission_type=car_transmission.transmission_id
// LEFT JOIN car_engine_fuel
// ON cars.engine_fuel=car_engine_fuel.engine_fuel_id";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "imgSrc: " . $row["car_image"]. " - title: " . $row["title"]. " - price: " . $row["rent_days_price_46"]. " - firstRegistration: " . $row["registration_year"]. " - transmission: " . $row["transmission_type"]. " - fuelType: " . $row["engine_fuel"]."<br>";
//     }
//   } else {
//     echo "0 results";
//   }
?>