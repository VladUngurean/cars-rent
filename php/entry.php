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
        include "config.php";
        // include 'index.php';
// echo $var;
    ?>
</head>

<body style="text-align:center">
    <br />
    <div class="container" style="text-align:center width:500px;">
        <h3 align="center">PHP Login Registration Form with md5() Password Encryption</h3> <br>
        <br />
    </div>


    <form action="" method="post">
        <div class="register-area__container__input-field">
            <input type="email" name="carMake" placeholder="Car Make" />
        </div>
        <div class="register-area__container__input-field">
            <input type="text" name="carModel" placeholder="Car Model" />
        </div>
        <div class="register-area__container__input-field">
            <input type="text" name="registrationYear" placeholder="Registration Year" />
        </div>

        <div class="register-area__container__input-field">
            <input type="text" name="firstName" placeholder="Nume" />
        </div>

        <div class="register-area__container__input-field">
            <input type="text" name="lastName" placeholder="Prenume" />
        </div>

        <div class="register-area__container__input-field">
            <input type="text" name="phoneNumber" placeholder="Telefon de Contact" />
        </div>

        <!-- <input class="button" name="submit" type="submit" value="Register" /> -->
        <!-- <p align="center"><a href="login.php">Login</a></p> -->
    </form>

    <?php  
        echo '<label><a href="logout.php">Logout</a></label> <br/>';  
        echo '<label><a href="index.php">Main Page</a></label>';  
    ?>


    <script type='text/javascript' src="/js/manager.js"></script>

</body>

</html>