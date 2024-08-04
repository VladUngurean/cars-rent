<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chișinău Dream Cars</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">

    <link rel="stylesheet" href="/css/style.css">

    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->

    <!-- datetime picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">

</head>


<body>
    <?php
        include('header.php'); 
        $currentPage = $_SERVER['SCRIPT_NAME'];
        if ($currentPage != "/index.php"){
            echo '
            <style>
            .header-area{
                margin-bottom:50px;
            }
            .header__bottom {
                display: none;
            }
            .accounts{
                display: none;
            }
            </style>';
        }
    ?>

    <section class="selected-car-area">
        <div class="selected-car-container">
            <div class="selected-car-top-side">
                <div id="selected-car-images">
                    <div id="here" class="swiper"></div>
                </div>

                <div id="selected-car-description"></div>

            </div>
            <div class="selected-car-bottom-side">

                <form id="carRentForm" style="width: 100%; display:flex; justify-content:space-between; flex-direction:row; align-items: flex-end;" action="" method="post">
                    <div class="selected-car-rent-details">
                        <h2>Prețuri chirie auto:</h2>

                        <div class="selected-car-table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>1-2 Zile</th>
                                        <th>3-7 Zile</th>
                                        <th>8-20 Zile</th>
                                        <th>21-45 Zile</th>
                                        <th>46+ Zile</th>
                                    </tr>
                                </thead>
                                <tbody id='carRentPriceTable'></tbody>
                            </table>
                        </div>

                        <h2>Calculează prețul închirierii mașinii:</h2>
                        <div class="selected-car-rent-date">
                            <div class="rent-pickup-datetime">
                                <input id="rentPickupDate" type="date" name="rent_pickup_date" placeholder="Data - Ora Închirierii" required>
                                <input id="rentReturnDate" type="date" name="rent_return_date" placeholder="Data - Ora Returnarii Masinii" required>
                            </div>
                        </div>

                        <h2>Alege tipul de asisgurare:</h2>
                        <div class="selected-car-insurace-type">
                            <label for="insuraceRCA">
                                <input id="insuraceRCA" class="insurance-for-car" type="radio" name="insurance" value="RCA" checked required>
                                Asigurare RCA
                            </label>
                            <label for="insuraceCasco">
                                <input id="insuraceCasco" class="insurance-for-car" type="radio" name="insurance" value="Casco" required>
                                Asigurare Casco
                            </label>
                        </div>

                        <h2>Locul preluării mașinii:</h2>
                        <div class="selected-car-pickup-place">
                            <label for="pickup_place_airoprt_ch">
                                <input type="radio" name="pickup_place" value="Aeroport" id="pickup_place_airoprt_ch" required>
                                Aeroportul Chișinău
                            </label>
                            <label for="pickup_place_our_office">
                                <input type="radio" name="pickup_place" value="Office Chisinau" id="pickup_place_our_office" required>
                                Oficiul nostru Chișinău
                            </label>
                            <label for="pickup_place_balti">
                                <input type="radio" name="pickup_place" value="Office Balti" id="pickup_place_balti" required>
                                Oficiul nostru Bălti
                            </label>
                        </div>

                        <?php
                        if (empty($_SESSION['email'])) {
                            echo '                            
                            <h2>Date de contact:</h2>
                            <div class="selected-car-guest-info">
                                <input type="text" name="first_name" placeholder="Nume" required>
                                <input type="text" name="last_name" placeholder="Prenume" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="tel" name="phone_number" placeholder="Telefon" required>
                            </div>
                            ';
                        }
                        ?>

                        <hr style="margin:20px 0; opacity:0.5;">

                        <div style="width:100%; text-align:center;">
                            <input class="login-button" name="rent_car" type="submit" value="Arendeaza">
                        </div>
                    </div>

                    <span class="selected-car-final-price-container">
                        <h3>Prețul final:</h3>
                        <div class="selected-car-final-price-element">
                            <p>Preț pe zi:</p>
                            <input id="carPricePerDay" class="input-to-hide" type="text" name="rent_daily_cost" />
                            <label class="car-price-per-day" for="carPricePerDay"></label>
                        </div>
                        <div class="selected-car-final-price-element">
                            <p>Total zile:</p>
                            <input id="carRentDays" class="input-to-hide" type="text" name="rent_days_count" />
                            <label class="car-rent-days" for="carRentDays"></label>
                        </div>
                        <div class="selected-car-final-price-element">
                            <p>Prețul total:</p>
                            <input id="carFinalPrice" class="input-to-hide" type="text" name="rent_full_cost" />
                            <label class="car-final-price" for="carFinalPrice"></label>
                        </div>
                        <div class="selected-car-final-price-element">
                            <text>Folosesete de cashback,<br>
                                <a href="register.php">Registreazate</a>
                                acum.
                            </text>
                            <input id="carCashback" class="input-to-hide" type="text" name="cashback" />
                            <label class="car-cashback" for="carCashback">5.5%</label>
                        </div>
                    </span>
                </form>

            </div>
        </div>
    </section>

    <?php
include "ProcGetCarByCarPlate.php"; 
include "ProcRentCar.php"; 
?>

    <?php include('footer.php'); ?>
    <!-- 
    <script>
    configRent = {
        // dateFormat: "Y-m-d",
        // dateFormat: "YYYY-MM-DD HH:MM",
        enableTime: true,
        time_24hr: true,

        altInput: true,
        allowInput: false,
        altFormat: "F j, Y - Ora(H:i)",

        minDate: "today",
        defaultDate: "today",
        allowInput: true,
        onChange: function(selectedDates) {
            if (selectedDates.length > 0) {
                configReturn.minDate = selectedDates[0];
                flatpickr("input[name=rent_return_date]", configReturn);
            }
        },
    }
    configReturn = {
        enableTime: true,
        time_24hr: true,

        altInput: true,
        allowInput: true,
        altFormat: "F j, Y - Ora(H:i)",
        minDate: "today",
    }
    flatpickr("input[name=rent_pickup_date]", configRent)

    flatpickr("input[name=rent_return_date]", configReturn)


    setTimeout(() => {
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            spaceBetween: 20,
            keyboard: {
                enabled: true,
            },
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }, 0);
    </script> -->

    <!-- <script type='text/javascript' src="/js/carRent.js"></script> -->
</body>

</html>