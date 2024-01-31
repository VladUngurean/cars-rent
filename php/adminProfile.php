<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    // include "login.php";
    include "register.php";
    
    ?>
    <?php  
        echo '<label><a href="logout.php">Logout</a></label><br>';  
        if(!isset($_SESSION["email"])){  
            echo 'Session is not active<br>' ;
        } else { echo 'Session is active<br>' ; }
        echo $_SESSION['role']
    ?>


</body>

</html>