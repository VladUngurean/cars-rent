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
        <div class="user-account-data">
            <div class="user-account-wellcome-text">Wellcome,<br> <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ; ?></div>
            <div class="user-account-phone">
                <p>Phone Number</p>
                2342442
            </div>

            <hr>

            <div class="user-finances-container">
                <div class="user-finances-item">
                    Cashback available: <p id="userCashbackAvailable">1202 </p> $
                </div>
                <div class="user-finances-item">
                    Total spent: <p id="userTotalSpent">1231</p> $
                </div>
            </div>
        </div>

        <div id="rentedCarContainer"></div>
    </section>


    <?php include('footer.php'); ?>
</body>

</html>