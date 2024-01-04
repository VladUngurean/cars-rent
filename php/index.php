<!DOCTYPE html>
<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Cars Rent</title>

    <?php

include "config.php";

$sql= "SELECT cars.car_image, car_make_title.title, cars.rent_days_price_46, cars.registration_year, car_transmission.transmission_type, car_engine_fuel.engine_fuel 
FROM `cars` 
LEFT JOIN car_make_title
on cars.make_title=car_make_title.make_title_id
LEFT JOIN car_transmission
ON cars.transmission_type=car_transmission.transmission_id
LEFT JOIN car_engine_fuel
ON cars.engine_fuel=car_engine_fuel.engine_fuel_id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    //   echo "imgSrc: " . $row["car_image"]. " - title: " . $row["title"]. " - price: " . $row["rent_days_price_46"]. " - firstRegistration: " . $row["registration_year"]. " - transmission: " . $row["transmission_type"]. " - fuelType: " . $row["engine_fuel"]."<br>";
    // $data[] = $row;
    $carImage = $row['car_image'];
    $makeTitle = $row['title'];
    $rentDaysPrice46 = $row['rent_days_price_46'];
    $registrationYear = $row['registration_year'];
    $engineFuel = $row['engine_fuel'];
    $transmisionType = $row['transmission_type'];
      echo "<img src='$carImage' alt='Image'>";
    }

  } else {
    echo json_encode(["message" => "No data found"]);
  }
  $conn->close();
?>

</head>

<body>

<!-- <img src="" alt="" srcset=""> -->

    <!-- Header TOP secction START -->
    <section class="header-top-area">
        <div class="container">

            <div class="header__top">

                <!-- Language Select START -->
                <div class="language">

                    <button class="language__button" type="button">
                        <img src="/images/ro.svg" alt="ro">
                        Română
                    </button>

                </div>
                <!-- Language Select END -->

            </div>
    </section>
    <!-- Header TOP secction END -->

    <!-- Header MID secction START -->

    <section class="header-mid-area">
        <div class="container">
            <div class="header__mid">

                <!-- Header Logo START -->
                <div class="site__logo">
                    <a href="#">
                        <img src="/images/logo.png" alt="logo">
                    </a>
                </div>
                <!-- Header Logo END -->

            </div>
        </div>
    </section>

    <!-- Header MID secction END -->

    <!-- Header BOT secction START -->
    <section class="header-nav-area">

        <div class="container">
            <div class="header__bot">

                <div class="dropdown">
                    <button onclick="navDropDownMain()" class="dropbtnMain"></button>
                    <div id="dropdownMain" class="dropdown__content-main">
                        <a href="#home">Acasa</a>

                        <button id="secondDropdownBtn" onclick="navDropDownSecond()" class="dropbtnSecond">Alege Masina</button>

                        <div id="dropdownSecond" class="dropdown__content-second">
                            <a href="#about">Chirie SUV</a>
                            <a href="#about">Chirie Hatckback</a>
                            <a href="#about">Chirie Crossovere</a>
                            <a href="#about">Chirie Sedan</a>
                            <a href="#about">Chirie Minivan</a>
                        </div>

                        <a href="#contact">Despre Noi</a>
                        <a href="#contact">Contacte</a>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- Header BOT secction END -->

    <!-- Search car secction START -->
    <section class="search-form-area">
        <div class="container">
            <div class="search-form">
                <div class="search-form-box">

                    <div class="search-form__text">
                        <h2>Cauta Masina Potrivita</h2>
                    </div>

                    <div class="search-form__date">
                        <input type="text" placeholder="Data Inchirierii">
                        <input type="text" placeholder="Ora Inchirierii">
                        <input type="text" placeholder="Data Returnarii">
                        <input type="text" placeholder="Ora Returnarii">
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
    </section>
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


<script type='text/javascript' src="/js/renderCars.js"></script>
<script type='text/javascript' src="/js/main.js"></script>

    <!-- <script src="js/renderCars.js"></script>
    <script src="js/main.js"></script> -->


</body>

</html>