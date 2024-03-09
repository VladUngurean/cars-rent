<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chișinău Dream Cars</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">

    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <?php include('header.php'); 
            include('save_value.php'); 
        $currentPage= $_SERVER['SCRIPT_NAME'];
        echo $currentPage;
        if ($currentPage == "/php/carRentPage.php"){
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
    // session_start();
        echo '<label style="position:absolute; left:20px; bottom:20px;"><a style="color:gray; position:absolute; bottom:40px;" href="logout.php">Logout</a></label>';
        if(!isset($_SESSION["email"])){  
            echo '<p style="color:white; position:absolute; left:20px; bottom:40px;">Session is not active<p/>' ;
        } else { echo '<p style="color:white; position:absolute; left:20px; bottom:20px;">Session is active <p/>' ; }
    ?>
    <?php echo "Value saved in session: ".$_SESSION['savedValue']; ?>

    <section calss="selected-car-area">
        <div class="selected-car-container">
            <div class="selected-car-left-side">
                <div class="selected-car-images">

                </div>

                <div class="selected-car-description">

                </div>

            </div>

            <div class="selected-car-right-side">

            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>
</body>

</html>