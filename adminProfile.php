<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <?php
include "ProcGetManagersAndCouriers.php";

//delete images in cars from DB
if(isset($_POST["deleteUser"])) {  

    $emailToDelete = mysqli_real_escape_string($conn, $_POST["deleteUser"]);  

    //delete cars from db
    $stmt = $conn->prepare("CALL deleteManagerORCourier(?)");
    
    if ($stmt->execute([$emailToDelete])) {
        echo '<script>alert("User successfully deleted from DB")</script>'; 
        echo '<script> window.location.href = "adminProfile.php";</script>';
    } else {
        echo '<script>alert("Error deleting car: ' . $stmt->error . '")</script>'; 
    }

    // Close the statement
    $stmt->close();
}
?>

    <script type='text/javascript' src="/js/admin.js" defer></script>
</head>

<body>
    <?php
    include "register.php";
    ?>

    <form action="" method="post">

        <style>
        .table-container {
            min-height: 300px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        </style>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Nr. telefon</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody id='managesAndCouriersInfoTable'>
                </tbody>
            </table>
        </div>

    </form>

    <?php  
        echo '<label><a href="logout.php">Logout</a></label><br>';  
        if(!isset($_SESSION["email"])){  
            echo 'Session is not active<br>' ;
        } else { echo 'Session is active<br>' ; }
        echo $_SESSION['role']
    ?>


</body>

</html>