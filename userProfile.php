<?php 
  session_start();
  include "./reusable/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" href="css/style.css">

    <script type='text/javascript' src="js/userPage.js" defer></script>
</head>

<body>
    <!-- Get car plate and load carRentPage.php based on car plate -->
    <form id="formToRentCarPage" action="carRentPage.php" method="GET">
        <input type="hidden" name="car_plate" id="hiddenValue">
    </form>
    <?php
        include "./reusable/header.php"; 
        include "procedures/ProcGetAllUserData.php"; 
        // include "ProcCancelRent.php"; //need to do
        // include "save_carplate_in_session.php"; 
    ?>
    <?php
        $currentPage = $_SERVER['SCRIPT_NAME'];
        // echo $currentPage;
        if ($currentPage == "/userProfile/"){
            echo '
            <style>
            .header-area{
                margin-bottom:100px;
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

    <section class="user-data-body">
        <div class="user-account-data">
            <div class="user-account-data-top">
                <div>
                    <h2 class="user-account-wellcome-text">Wellcome,<br> <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ; ?></h2>

                    <div class="user-account-data-container">
                        <div class="user-account-data-item">
                            <span>Phone Number</span>
                            <p>
                                <?php echo $userData["phone"]; ?>
                            </p>
                        </div>
                        <div class="user-account-data-item">
                            <span>Email</span>
                            <p>
                                <?php echo $userData["email"]; ?>
                            </p>
                        </div>

                        <?php echo '<label><a href="../reusable/logout.php">Logout</a></label> <br>';?>

                    </div>
                </div>

                <div>
                    <svg fill="#fefefe" height="28px" width="28px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" stroke="#fefefe">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path d="M498.723,89.435H183.171V76.958c0-18.3-14.888-33.188-33.188-33.188h-51.5c-18.3,0-33.188,14.888-33.188,33.188v12.477 H13.275C5.943,89.435,0,95.38,0,102.711c0,7.331,5.943,13.275,13.275,13.275h52.018v12.473c0,18.3,14.888,33.188,33.188,33.188 h51.501c18.3,0,33.188-14.888,33.188-33.188v-12.473h315.553c7.332,0,13.275-5.945,13.275-13.275 C511.999,95.38,506.055,89.435,498.723,89.435z M156.621,128.459c0,3.66-2.978,6.638-6.638,6.638H98.482 c-3.66,0-6.638-2.978-6.638-6.638V76.958c0-3.66,2.978-6.638,6.638-6.638h51.501c3.66,0,6.638,2.978,6.638,6.638V128.459z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M498.725,237.295h-52.019v-12.481c0-18.3-14.888-33.188-33.188-33.188h-51.501c-18.3,0-33.188,14.888-33.188,33.188 v12.481H13.275C5.943,237.295,0,243.239,0,250.57c0,7.331,5.943,13.275,13.275,13.275h315.553v12.469 c0,18.3,14.888,33.188,33.188,33.188h51.501c18.3,0,33.188-14.888,33.188-33.188v-12.469h52.019 c7.332,0,13.275-5.945,13.275-13.275C512,243.239,506.057,237.295,498.725,237.295z M420.155,276.315 c0,3.66-2.978,6.638-6.638,6.638h-51.501c-3.66,0-6.638-2.978-6.638-6.638v-51.501c0-3.66,2.978-6.638,6.638-6.638h51.501 c3.66,0,6.638,2.978,6.638,6.638V276.315z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M498.725,396.014H276.432v-12.473c0-18.3-14.888-33.188-33.188-33.188h-51.501c-18.3,0-33.188,14.888-33.188,33.188 v12.473H13.275C5.943,396.014,0,401.959,0,409.289c0,7.331,5.943,13.275,13.275,13.275h145.279v12.477 c0,18.3,14.888,33.188,33.188,33.188h51.501c18.3,0,33.188-14.888,33.188-33.188v-12.477h222.293 c7.332,0,13.275-5.945,13.275-13.275C512,401.957,506.057,396.014,498.725,396.014z M249.881,435.042 c0,3.66-2.978,6.638-6.638,6.638h-51.501c-3.66,0-6.638-2.978-6.638-6.638v-51.501c0-3.66,2.978-6.638,6.638-6.638h51.501 c3.66,0,6.638,2.978,6.638,6.638V435.042z"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>

            <hr>

            <div class="user-finances-container">
                <div class="user-finances-item">
                    <span>Cashback available: </span>
                    <p id="userCashbackAvailable">
                        <?php echo $userData["totalCashback"] . " $"; ?>
                    </p>
                </div>
                <div class="user-finances-item">
                    <span>Total spent: </span>
                    <p id="userTotalSpent">
                        <?php echo $userData["totalSpent"] . " $"; ?>
                    </p>
                </div>
                <div class="user-finances-item">
                    <span>Debt: </span>
                    <p id="userTotalSpent">
                        <?php echo $userData["debt"] . " $"; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="rented-car-container">
            <h2>Rented Cars</h2>
            <div id="rentedCarList"></div>
        </div>
    </section>


    <?php include('./reusable/footer.php'); ?>
</body>

</html>