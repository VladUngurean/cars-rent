<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Cars Rent</title>

    <?php

include "config.php";

$sql= "SELECT cars.car_image, car_make.make, car_make_title.title, cars.registration_year, car_transmission.transmission_type,car_engine_fuel.engine_fuel, 
car_engine_capacity.engine_capacity, car_body_type.body_type, car_doors.doors_number, car_passengers_number.passengers_number,cars.description, 
cars.rent_days_price_1_2, cars.rent_days_price_3_7, cars.rent_days_price_8_20, cars.rent_days_price_21_45, cars.rent_days_price_46, car_rent_status.rent_status
FROM `cars`
LEFT JOIN car_make_title 
on cars.make_title=car_make_title.make_title_id 
LEFT JOIN car_make
on car_make_title.make=car_make.make_id
LEFT JOIN car_transmission 
ON cars.transmission_type=car_transmission.transmission_id 
LEFT JOIN car_engine_fuel 
ON cars.engine_fuel=car_engine_fuel.engine_fuel_id
LEFT JOIN car_engine_capacity
ON cars.engine_capacity=car_engine_capacity.engine_capacity_id
LEFT JOIN car_body_type
ON cars.body_type=car_body_type.body_type_id
LEFT JOIN car_doors
ON cars.doors=car_doors.doors_id
LEFT JOIN car_passengers_number
ON cars.passengers_number=car_passengers_number.passengers_number_id
LEFT JOIN car_rent_status
ON cars.rent_status=car_rent_status.rent_status_id;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    $data[] = array(
        'carImage' => $row['car_image'],
        'make' => $row['make'],
        'model' => $row['title'],
        'registrationYear' => $row['registration_year'],
        'transmissionType' => $row['transmission_type'],
        'engineFuel' => $row['engine_fuel'],
        'engineCapacity' => $row['engine_capacity'],
        'bodyType' => $row['body_type'],
        'dorsNumber' => $row['doors_number'],
        'passengersNumber' => $row['passengers_number'],
        'description' => $row['description'],
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
    echo '</script>';

  } else {
    echo json_encode(["message" => "No data found"]);
  }
  $conn->close();
?>

</head>

<body>

    <?php include('header.php'); ?>

    <!-- Search car secction START -->
    <!-- NEW SECCTION  -->

    <section class="search-form-area">
        <div class="container">
            <div class="search-form">
                <div class="search-form-box">

                    <div class="search-form__text">
                        <h2>Cauta Masina Potrivita</h2>
                    </div>

                    <section class="search-test">

                        <div class="container">
                            <div class="search-container">

                                <div class="dropdown__select-options">
                                    <div id="dropDownCarMake" class="dropdown__content-main__select-options">

                                        <ul id="renderCarMakeSelect"></ul>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>

                    <div class="search-form__button">

                        <button id="tessst" type="submit" class="check2">Caută</button>

                    </div>

                </div>
            </div>
    </section>

    <!-- OLD SECCTION START -->
    <!-- <section class="search-form-area">
        <div class="container">
            <div class="search-form">
                <div class="search-form-box">

                    <div class="search-form__text">
                        <h2>Cauta Masina Potrivita</h2>
                    </div>

                    <div class="search-form__date">
                        <input type="date" id="datePicker" placeholder="Data Inchirierii">
                        <input type="time" id="timePicker" placeholder="Ora Inchirierii">
                        <input type="date" id="datePickerReturn" placeholder="Data Returnarii">
                        <input type="time" id="timePickerReturn" placeholder="Ora Returnarii">
                    </div>

                    <div class="search-form__insurance">
                        <p>Alege timpul de asigurare</p>
                        <div class="search-form__insurance__labels">

                            <label>
                                <input name="insurance" type="radio">
                                Asigurare simpla RCA
                            </label>
                            <label>
                                <input name="insurance" type="radio">
                                Asigurare Casco
                            </label>
                        </div>

                    </div>

                    <div class="search-form__button">

                        <button type="submit" class="check2">Caută</button>

                    </div>

                </div>
            </div>
    </section> -->
    <!-- Search car secction END -->

    <!-- Car list secction START -->
    <section class="car-list-area">
        <div class="container">
            <div class="car-list__container">
                <div class="car-list__container-text">
                    <h2>Inchiriere Masini</h2>
                </div>
                <div id="car-list-render"></div>
            </div>
        </div>
    </section>
    <!-- Car list secction END -->

    <!-- Comment secction START -->
    <section class="comment-area">
        <div class="container">
            <div class="comment-area__container">
                <div class="comment-area__container-text">
                    <h3>Recomandarile Clientilor Nostri</h3>
                </div>

                <div class="comment-area__container-comment-carousel">

                </div>
            </div>
        </div>
    </section>
    <!-- Comment secction END -->

    <!-- <script type='text/javascript' src="/js/filterTest.js"></script> -->
    <script type='text/javascript' src="/js/filter.js"></script>
    <!-- <script type='text/javascript' src="/js/renderCars.js"></script> -->
    <script type='text/javascript' src="/js/main.js"></script>

    <!-- <script src="js/renderCars.js"></script>
    <script src="js/main.js"></script> -->

</body>

</html>