<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chișinău Dream Cars - About Us</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">

    <script type='text/javascript' src="/js/main.js" defer></script>
</head>

<body>

    <?php include('./reusable/header.php');
        
        $currentPage = $_SERVER['SCRIPT_NAME'];
        
        if ($currentPage != "/index.php"){
            echo '
            <style>
            .header-area{
                margin-bottom:100px;
            }
            .header__bottom {
                display: none;
            }
            </style>';
        }
    ?>

    <h1 style="margin:450px 0; color:white; font-size:60px">404</h1>

    <?php include('./reusable/footer.php'); ?>
</body>