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
        // include "getCarDetails.php";
        // include "getAllCarsData.php";
        include "ProcGetExistingCarsToShow.php";
    ?>

</head>


<body>

    <?php 
    include('header.php'); 
    ?>

    <?php  
        echo '<label><a href="logout.php">Logout</a></label><br>';  
        if(!isset($_SESSION["email"])){  
            echo 'Session is not active<br>' ;
        } else { echo 'Session is active<br>' ; }
        echo $_SESSION['role']
    ?>
    <!-- Search car secction START -->
    <!-- NEW SECCTION  -->

    <section class="search-form-area">
        <div class="container">
            <div class="search-form">
                <div class="search-form-box">

                    <div class="search-form__text">
                        <h2>Cauta Masina Potrivita</h2>
                    </div>

                    <section class="search-test">

                        <div class="container">
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

                    </section>

                    <div class="search-form__button">

                        <button id="tessst" type="submit" class="check2">Caută</button>

                    </div>

                </div>
            </div>
    </section>

    <!-- OLD SECCTION START -->
    <!-- <section class="search-form-area">
        <div class="container">
            <div class="search-form">
                <div class="search-form-box">

                    <div class="search-form__text">
                        <h2>Cauta Masina Potrivita</h2>
                    </div>

                    <div class="search-form__date">
                        <input type="date" id="datePicker" placeholder="Data Inchirierii">
                        <input type="time" id="timePicker" placeholder="Ora Inchirierii">
                        <input type="date" id="datePickerReturn" placeholder="Data Returnarii">
                        <input type="time" id="timePickerReturn" placeholder="Ora Returnarii">
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
    </section> -->
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

    <script type='text/javascript' src="/js/filterForCarSelect.js" defer></script>

    <script type='text/javascript' src="/js/main.js" defer></script>

</body>

</html>