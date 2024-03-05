<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <title>Chișinău Dream Cars</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">
    <?php include "ProcGetExistingCarsToShow.php"; ?>

</head>

<body>
    <p id="top" style="position:absolute; opacity:0;"></p>

    <div class="banner__video">
        <video id="bannerVideo" preload="auto" playsinline="" autoplay="" loop="" muted="">
            <source src="/images/backgrounds/videoBanner.mp4" type="video/mp4">
        </video>
    </div>

    <?php include('header.php'); ?>

    <?php  
        echo '<label style="position:absolute; left:20px; bottom:20px;"><a style="color:gray; position:absolute; bottom:40px;" href="logout.php">Logout</a></label>';
        if(!isset($_SESSION["email"])){  
            echo '<p style="color:white; position:absolute; left:20px; bottom:40px;">Session is not active<p/>' ;
        } else { echo '<p style="color:white; position:absolute; bottom:20px;">Session is active <p/>' ; }
    ?>

    <!-- About us secction START -->

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
    <!-- About us secction END -->


    <div class="forScrollToTop"></div>
    <a href="#" class="scroll-to-top">

        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2058_1288)">
                <path d="M30 60C46.568 60 60 46.568 60 30C60 13.432 46.568 0 30 0C13.432 0 0 13.432 0 30C0 46.568 13.432 60 30 60ZM30 13L46 28.305L35.143 28.305V47H24.858L24.858 28.305L14 28.305L30 13Z" fill="#FEFEFE" fill-opacity="0.1" />
            </g>
        </svg>

    </a>

    <!-- Rent car secction START -->

    <section id="carFilterSelectors" class="search-form-area">
        <main style="width: 100%;">
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

        </main>
    </section>
    <!-- Rent car secction END -->

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
                <div class="info-about-contacts-container">
                    <h2>Ai întrebări?</h2>
                    <p>Primește consultație telefonică de la expert și ajuor în alegerea aumombilului potrivit:</p>
                    <a href="tel:+37300000000">(+373) 00 000 000</a>
                    <div class="info-about-contacts-buttons">
                        <a class="contacts-button whatsapp" href="https://www.pexels.com/search/cat/" target="_blank">Scrie pe WhatsApp</a>
                        <a class="contacts-button telegram" href="https://www.pexels.com/search/cat/" target="_blank">Scrie pe Telegram</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comment secction END -->

    <?php include('footer.php'); ?>

    <script type='text/javascript' src="/js/filterForCarSelect.js" defer></script>
    <script type='text/javascript' src="/js/main.js" defer></script>
    <script type='text/javascript' src="/js/rentCar.js" defer></script>

</body>

</html>