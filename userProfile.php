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

    <script type='text/javascript' src="js/userPage.js" defer></script>
</head>

<body>
    <?php
        include "header.php"; 
        include "ProcGetAllUserData.php"; 
    ?>

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
            .accounts{
                display:none;
            }
            </style>';
        }
    ?>

    <section>
        <div id="rentedCarContainer"></div>
    </section>

    <h1 style="margin:450px 0; color:white;">Hello, User</h1>

    <?php include('footer.php'); ?>
</body>

</html>