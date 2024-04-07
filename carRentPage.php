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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <!-- datetime picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">

    <script type='text/javascript' src="/js/carRent.js" defer></script>
</head>

<?php
include "save_carplate_in_session.php"; 
include "ProcGetCarByCarPlate.php"; 
include "ProcRentCar.php"; 
?>

<body>
    <?php
        include('header.php'); 
        $currentPage = $_SERVER['SCRIPT_NAME'];
        
        if ($currentPage != "/index.php"){
            echo '
            <style>
            .header-area{
                margin-bottom:100px;
            }
            .header__container {
                height: 65px;
                margin-bottom: 75px;
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

    <?php  
        echo '<label style="position:absolute; left:20px; bottom:800px;"><a style="color:gray; position:absolute; bottom:40px;" href="logout.php">Logout</a></label>';
        if(!isset($_SESSION["email"])){  
            echo '<p style="color:white; position:absolute; left:20px; bottom:820px;">Session is not active<p/>' ;
        } else { echo '<p style="color:white; position:absolute; left:20px; bottom:800px;">Session is active <p/>' ; }
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

                <form action="" method="post">
                    <h2>Prețuri chirie auto</h2>

                    <div class="selected-car-table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>1-1 Zile</th>
                                    <th>3-7 Zile</th>
                                    <th>8-20 Zile</th>
                                    <th>21-45 Zile</th>
                                    <th>46+ Zile</th>
                                </tr>
                            </thead>
                            <tbody id='carRentPriceTable'></tbody>
                        </table>
                    </div>

                    <h2>Calculează prețul închirierii mașinii</h2>
                    <div class="selected-car-rent-date">
                        <div class="rent-pickup-datetime">
                            <input type="date" name="rent_pickup_date" required>
                            <input type="time" name="rent_pickup_time" required>
                        </div>

                        <div class="rent-pickup-datetime">
                            <input type="date" name="rent_return_date" placeholder="Data Returnarii Masinii" required>
                            <input type="time" name="rent_return_time" placeholder="Ora Returnarii Masinii" required>
                        </div>
                    </div>

                    <h2>Alege tipul de asisgurare</h2>
                    <div class="selected-car-insurace-type">
                        <input type="radio" name="insurance" value="RCA" id="insuraceRCA">
                        <label for="insuraceRCA">insuraceRCA</label>
                        <input type="radio" name="insurance" value="Casco" id="insuraceCasco">
                        <label for="insuraceCasco">insuraceCasco</label>
                    </div>

                    <h2>Locul preluării mașinii:</h2>
                    <div class="selected-car-pickup-place">
                        <input type="radio" name="pickup_place" value="Aeroport" id="pickup_place_airoprt_ch">
                        <label for="pickup_place_airoprt_ch">airport ch</label>
                        <input type="radio" name="pickup_place" value="Aeroport" id="pickup_place_our_office">
                        <label for="pickup_place_our_office">our office</label>
                        <input type="radio" name="pickup_place" id="pickup_place_balti">
                        <label for="pickup_place_balti">balti</label>
                    </div>

                    <h2>Date de contact:</h2>
                    <div class="selected-car-guest-info">
                        <input type="text" name="first_name" placeholder="Nume"> <br>
                        <input type="text" name="last_name" placeholder="Prenume"> <br>
                        <input type="email" name="email" placeholder="Email"> <br>
                        <input type="tel" name="phone_number" placeholder="Telefon"> <br>
                    </div>

                    <input type="number" name="rent_full_cost" placeholder="rent full cost"> <br>
                    <input type="tel" name="cashback" placeholder="cashback"> <br>
                    <br>

                    <input name="rent_car" type="submit" value="Submit">
                </form>

                <div class="selected-car-final-price-container">
                    <h3>Prețul final:</h3>
                    <div class="selected-car-final-price-element">
                        <p>Preț pe zi:</p>
                        <span id="carPricePreDay">7</span>
                    </div>
                    <div class="selected-car-final-price-element">
                        <p>Total zile:</p>
                        <span id="carRentDays">19</span>
                    </div>
                    <div class="selected-car-final-price-element">
                        <p>Prețul total:</p>
                        <span id="carFinalPrice">30</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
    config = {
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "F j, Y",
        minDate: "today",
        allowInput: true,
    }
    configTime = {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        allowInput: true,
    }
    flatpickr("input[name=rent_pickup_date]", config)
    flatpickr("input[name=rent_pickup_time]", configTime)
    flatpickr("input[name=rent_return_date]", config)
    flatpickr("input[name=rent_return_time]", configTime)


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
    </script>
</body>

</html>