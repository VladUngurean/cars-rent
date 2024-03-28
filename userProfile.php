<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="/css/style.css">


</head>

<body>
    <?php include "header.php"; ?>

    <?php

        $currentPage = $_SERVER['SCRIPT_NAME'];
        // echo $currentPage;
        if ($currentPage == "/userProfile.php"){
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
            </style>';
        }
    ?>

    <h1 style="margin-top:450px; color:white;">Hello, User</h1>
</body>

</html>