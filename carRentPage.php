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
        echo '<label style="position:absolute; left:20px; bottom:20px;"><a style="color:gray; position:absolute; bottom:40px;" href="logout.php">Logout</a></label>';
        if(!isset($_SESSION["email"])){  
            echo '<p style="color:white; position:absolute; left:20px; bottom:40px;">Session is not active<p/>' ;
        } else { echo '<p style="color:white; position:absolute; left:20px; bottom:20px;">Session is active <p/>' ; }
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