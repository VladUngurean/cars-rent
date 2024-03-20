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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<?php
include "save_value.php"; 
include "ProcGetCarByCarPlate.php"; 
?>

<body>
    <?php
        include('header.php'); 

        $currentPage = $_SERVER['SCRIPT_NAME'];
        echo $currentPage;
        if ($currentPage == "/carRentPage.php"){
            echo '
            <style>
            .header-area{
                margin-bottom:100px;
            }
            .header__container {
                height: 65px;
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

                <form action="">
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
                        <input type="date" name="" id="">
                        <input type="time" name="" id="">
                    </div>

                    <h2>Alege tipul de asisgurare</h2>
                    <div class="selected-car-insurace-type">
                        <input type="radio" name="insurance" id="insuraceRCA">
                        <label for="insuraceRCA">insuraceRCA</label>
                        <input type="radio" name="insurance" id="insuraceCasco">
                        <label for="insuraceCasco">insuraceCasco</label>
                    </div>

                    <h2>Locul preluării mașinii:</h2>
                    <div class="selected-car-pickup-place">
                        <input type="radio" name="pickup_place" id="pickup_place_airoprt_ch">
                        <label for="pickup_place_airoprt_ch">airport ch</label>
                        <input type="radio" name="pickup_place" id="pickup_place_our_office">
                        <label for="pickup_place_our_office">our office</label>
                        <input type="radio" name="pickup_place" id="pickup_place_balti">
                        <label for="pickup_place_balti">balti</label>
                    </div>

                    <h2>Date de contact:</h2>
                    <div class="selected-car-guest-info">
                        <input type="text" name="first_name_last_name" palceholder="Nume Prenume">
                        <input type="tel" name="first_name_last_name" palceholder="Telefon">
                        <input type="tel" name="first_name_last_name" palceholder="Vârsta șofer">
                    </div>

                    <h2>Cum preferați să vă contactăm:</h2>
                    <div class="selected-car-contact-guest-type">
                        <input type="checkbox" name="contact-guest-type" id="contact-option-viber">
                        <label for="contact-option-viber">Viber</label>
                        <input type="checkbox" name="contact-guest-type" id="contact-option-telegram">
                        <label for="contact-option-telegram">Telegram</label>
                        <input type="checkbox" name="contact-guest-type" id="contact-option-whatsapp">
                        <label for="contact-option-whatsapp">Whats App</label>
                    </div>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <script type='text/javascript' src="/js/carRent.js" defer></script>

    <script>
    setTimeout(() => {
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            spaceBetween: 20,
            keyboard: {
                enabled: true,
            },
            // autoplay: {
            //     delay: 4000,
            //     disableOnInteraction: false,
            // },
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