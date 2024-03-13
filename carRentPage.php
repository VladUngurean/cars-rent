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
            .header_container {
                flex-direction: flex-start;
            }
            .header__bottom {
                display: none;
            }
            </style>';
        }
    ?>

    <?php  
        echo '<label style="position:absolute; left:20px; bottom:20px;"><a style="color:gray; position:absolute; bottom:40px;" href="logout.php">Logout</a></label>';
        if(!isset($_SESSION["email"])){  
            echo '<p style="color:white; position:absolute; left:20px; bottom:40px;">Session is not active<p/>' ;
        } else { echo '<p style="color:white; position:absolute; left:20px; bottom:20px;">Session is active <p/>' ; }
    ?>

    <div id="here" class="swiper">

    </div>
    <!-- <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>
        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <div class="swiper-scrollbar"></div>
    </div> -->

    <section calss="selected-car-area">
        <div class="selected-car-container">
            <div class="selected-car-top-side">
                <div id="selected-car-images">

                </div>

                <div class="selected-car-description">

                </div>

            </div>

            <div class="selected-car-bottom-side">

            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <script type='text/javascript' src="/js/carRent.js" defer></script>

    <style>
    .swiper {
        width: 626px;
        height: 425px;
    }

    .swiper-slide>img {
        width: 626px;
        height: 425px;
    }
    </style>

    <script>
    setTimeout(() => {

        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    }, 0);
    </script>
</body>

</html>