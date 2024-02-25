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
        include "ProcGetExistingCarsToShow.php";
    ?>

</head>

<body>

    <div class="banner__video">
        <video id="bannerVideo" preload="auto" playsinline="" autoplay="" loop="" muted="">
            <source src="/images/backgrounds/videoBanner.mp4" type="video/mp4">
        </video>
    </div>


    <?php 
            include('header.php'); 
        ?>

    <?php  
            echo '<label style="position:absolute; left:20px; bottom:20px;"><a style="color:white;" href="logout.php">Logout</a></label><br>';  
            if(!isset($_SESSION["email"])){  
                echo '<p style="color:white; position:absolute; left:20px; bottom:40px;">Session is not active<p/><br>' ;
            } else { echo '<p style="color:white; position:absolute; bottom:20px;">Session is active<p/><br>' ; }
        ?>
    <!-- Search car secction START -->
    <!-- NEW SECCTION  -->

    <section class="aboutus-area">
        <div class="aboutus-area-container">
            <div class="aboutus-area-container__el">
                <img src="/images/aditionalElements/6ani.svg" alt="">
                <p>Pe piața de chirie auto din Moldova</p>
            </div>
            <div class="aboutus-area-container__el">
                <img src="/images/aditionalElements/2filiale.svg" alt="">
                <p>În Chișinău și bălți</p>
            </div>
            <div class="aboutus-area-container__el">
                <img src="/images/aditionalElements/72.svg" alt="">
                <p>Mașini în atuoparcul nostru</p>
            </div>
        </div>
    </section>

    <section id="carFilterSelectors" class="search-form-area">

        <div class="search-form">

            <div class="search-form__text">
                <h2>Selectează Mașina Potrivtă:</h2>
            </div>

            <div class="search-container">

                <div class="search__select-options">

                    <div id="renderCarMakeSelect" class="select-options-for-rent"></div>
                    <div id="renderCarTransmissionSelect" class="select-options-for-rent"></div>
                    <div id="renderCarFuelTypeSelect" class="select-options-for-rent"></div>
                    <div id="renderCarBodyTypeSelect" class="select-options-for-rent"></div>
                    <div id="renderCarRentStatusSelect" class="select-options-for-rent"></div>

                </div>

            </div>
        </div>

        <div class="car-list__container">
            <div class="search-form__text">
                <h2>Închiriere Mașini</h2>
            </div>
            <div id="car-list-render"></div>
        </div>

        <button class="show-more-cars">
            <p>Vezi mai multe</p>
            <img src="/images/aditionalElements/voidarrow.svg" alt="arrow">
        </button>

    </section>

    <!-- Comment secction START -->
    <section class="aditional-info-area">
        <div class="aditional-info-area-container">

            <div class="info-about-bonus-programm">
                <div class="info-about-bonus-programm-container">
                    <p>Card de fidelitate Chișinău Dream Cars</p>
                    <p>Reduceri presonale pâna la 40% doar pentru proprietarii de card</p>
                </div>
            </div>

            <div class="info-about-company">
                <div class="info-about-company-container">
                    <img src="/images/aditionalElements/chisinauDreamCarsText.svg" alt="ChisnauDreamCars">
                    <button class="info-about-company-button"><img src="/images/aditionalElements/bigvoidarrow.svg" alt="arrow">
                        <p>Despre companie</p>
                    </button>
                </div>
            </div>

            <div class="info-about-aditioal-rent-options">
                <div class="info-about-aditioal-rent-options-container">
                    <div class="info-about__aditioal-rent-option">
                        <text>Livrare în raza orașului</text>
                        <img src="/images/icons/mapPointsIcon.svg" alt="mapPoints">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Transport la aeroport</text>
                        <img src="/images/icons/carIcon.svg" alt="aeroport">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Confidențialitate deplină. Nu există înregistrare video sau audio în mașină</text>
                        <img src="/images/icons/confIcon.svg" alt="aeroport">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Livrare extra-program</text>
                        <img src="/images/icons/clockIcon.svg" alt="clock">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Scaunel pentru copil</text>
                        <img src="/images/icons/childIcon.svg" alt="child">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Asistență tehnică 24/24</text>
                        <img src="/images/icons/supportIcon.svg" alt="clock">
                    </div>
                </div>
            </div>

            <div class="info-about-contacts">

            </div>
        </div>
    </section>
    <!-- Comment secction END -->



    <script type='text/javascript' src="/js/filterForCarSelect.js" defer></script>
    <!-- <script type='text/javascript' src="/js/main.js" defer></script> -->
    <script type='text/javascript' src="/js/rentCar.js" defer></script>

</body>

</html>