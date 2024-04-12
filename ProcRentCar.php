<?php
include "config.php";

$currentPage = $_SERVER['SCRIPT_NAME'];
// echo $_SESSION['email'];
// echo $_SESSION['global_car_plate'];
// echo "<script> window.location.href = '$currentPage';</script>";

if(isset($_POST['rent_car'])) {
    if (!empty($_SESSION['email'])) {
        $firstName = $_SESSION['first_name'];
        $lastName =  $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $phoneNumber = $_SESSION['phone'];
    } else{
        $firstName = mysqli_real_escape_string($conn, $_POST["first_name"]);  
        $lastName = mysqli_real_escape_string($conn, $_POST["last_name"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST["phone_number"]);  
    };
    $carPlate = mysqli_real_escape_string($conn, $_SESSION['global_car_plate']);

    $rentPickupDateTime = mysqli_real_escape_string($conn, $_POST["rent_pickup_date"]);  

    $rentReturnDateTime = mysqli_real_escape_string($conn, $_POST["rent_return_date"]);  
    
    $insurance = mysqli_real_escape_string($conn, $_POST["insurance"]);  
    $pickupPlace = mysqli_real_escape_string($conn, $_POST["pickup_place"]);  

    $rentFullCost = mysqli_real_escape_string($conn, $_POST["rent_full_cost"]); 
    $rentFullCost = (float)$rentFullCost;
    $cashback = mysqli_real_escape_string($conn, $_POST["cashback"]);  
    $cashback = (float)$cashback;
    
    $stmt = $conn->prepare("CALL RentCar(?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssssssii',$firstName, $lastName, $email, $phoneNumber, $carPlate, $rentPickupDateTime, 
    $rentReturnDateTime, $insurance, $pickupPlace, $rentFullCost, $cashback);
    $stmt->execute();
    // $result = $stmt->get_result();

    $stmt->close();
    $conn->next_result();
    echo '<script>alert("Arenda a fost plasata cu succes!<br> Vei fi contactat in scurt timp.");</script>';
    echo "<script> window.location.href = '$currentPage';</script>";
}
    ?>
<!-- PHP CODE END -->