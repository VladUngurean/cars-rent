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
    <style>
    .register-area__input-field>p {
        display: none;
    }
    </style>

    <?php include "register.php";?>

    <form action="" method="post">

        <div class="table-container">
            <h2>Lista de manageri si Curieri</h2>
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
                <tbody id="managesAndCouriersInfoTable">
                </tbody>
            </table>
        </div>

    </form>

</body>

</html>