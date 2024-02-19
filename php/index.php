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
            <source src="/images/videoBanner.mp4" type="video/mp4">
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
                <img src="/images/6ani.svg" alt="">
                <p>Pe piața de chirie auto din Moldova</p>
            </div>
            <div class="aboutus-area-container__el">
                <img src="/images/72.svg" alt="">
                <p>Mașini în atuoparcul nostru</p>
            </div>
            <div class="aboutus-area-container__el">
                <img src="/images/2filiale.svg" alt="">
                <p>În Chișinău și bălți</p>
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
            <div class="car-list__container-text">
                <h2>Închiriere Mașini</h2>
            </div>
            <div id="car-list-render"></div>
        </div>

    </section>

    <!-- Comment secction START -->
    <section class="comment-area">
        <div class="comment-area__container">
            <div class="comment-area__container-text">
                <h3>Recomandarile Clientilor Nostri</h3>
            </div>

            <div class="comment-area__container-comment-carousel">

            </div>
        </div>
    </section>
    <!-- Comment secction END -->



    <script type='text/javascript' src="/js/filterForCarSelect.js" defer></script>
    <script type='text/javascript' src="/js/main.js" defer></script>
    <script type='text/javascript' src="/js/rentCar.js" defer></script>

</body>

</html>