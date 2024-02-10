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

    <?php 
    include('header.php'); 
    ?>

    <?php  
        echo '<label><a style="color:white;" href="logout.php">Logout</a></label><br>';  
        if(!isset($_SESSION["email"])){  
            echo '<p style="color:white;">Session is not active<p/><br>' ;
        } else { echo '<p style="color:white;">Session is active<p/><br>' ; }

    ?>
    <!-- Search car secction START -->
    <!-- NEW SECCTION  -->

    <section id="carFilterSelectors" class="search-form-area">
        <!-- Car list secction START -->
        <div class="car-list__container">
            <div class="car-list__container-text">
                <h2>Închiriere Mașini</h2>
            </div>
            <div id="car-list-render"></div>
        </div>
        <!-- Car list secction END -->


        <div class="search-form">
            <div class="search-form-box">

                <div class="search-form__text">
                    <h2>Selectează Mașina Potrivtă:</h2>
                </div>

                <div class="search-container">

                    <div class="search__select-options">

                        <ul id="renderCarMakeSelect"></ul>
                        <ul id="renderCarTransmissionSelect"></ul>
                        <ul id="renderCarFuelTypeSelect"></ul>
                        <ul id="renderCarBodyTypeSelect"></ul>
                        <ul id="renderCarRentStatusSelect"></ul>

                    </div>

                </div>
            </div>
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
    <!-- <script type='text/javascript' src="/js/main.js" defer></script> -->
    <script type='text/javascript' src="/js/rentCar.js" defer></script>

</body>

</html>