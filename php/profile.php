<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Manager Account</title>

    <?php
        include "getCarsFromDb.php";
    ?>
</head>

<body style="text-align:center">
    <br />
    <div class="container" style="text-align:center">
        <h3 align="center">PHP Login Registration Form with md5() Password Encryption</h3> <br>
        <br />
    </div>

    <form action="" method="post" style="text-align: center; display: flex; justify-content: center; ailgn-items: center;">
        <div class="addNewCar" style="text-align: start; display: flex; justify-content: center; ailgn-items: center; flex-direction: column; max-width:320px;">

            <ul id="makeModelToDb"></ul>
            <!-- <ul id="makeModelToDb"></ul> -->
            <ul id="transmissionTypeToDb"></ul>
            <!-- <div id="registrationYearToDb"></div> -->
            <ul id="engineFuelToDb"></ul>
            <ul id="bodyTypeToDb"></ul>
            <ul id="carNumberToDb">carNumberToDb</ul>
            <ul id="pasangersNumberToDb">pasangersNumberToDb</ul>
            <input type="number" name="engineCapacityToDb" placeholder="engineCapacity" minlength="2" maxlength="10" required />
            <input type="number" name="registrationYear" placeholder="registrationYear" minlength="4" maxlength="4" required />
            <!-- <div id="engineCapacityToDb"></div> -->
            <ul id="doorsToDb"></ul>
            <ul id="passengerNumberToDb"></ul>
            <input id="descriptionToDb" type="text" name="description" placeholder="Description" minlength="100" maxlength="700" required></input>
            <input type="number" name="rentDaysPrice1_2" placeholder="Pret 1-2" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice3_7" placeholder="Pret 3-7" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice8_20" placeholder="Pret 8-20" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice21_4" placeholder="Pret 21-45" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice46" placeholder="Pret 46" minlength="2" maxlength="4" required />

            <input class="button" name="submit" type="submit" value="To DB" />
        </div>

    </form>

    <?php  
        echo '<label><a href="logout.php">Logout</a></label> <br/>';  
        echo '<label><a href="index.php">Main Page</a></label>';  
    ?>

    <script type='text/javascript' src="/js/manager.js"></script>

</body>

</html>