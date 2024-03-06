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