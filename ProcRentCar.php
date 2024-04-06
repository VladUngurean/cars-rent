<?php
include "config.php";

// echo $_SESSION['email'];
echo $_SESSION['global_car_plate'];

if(isset($_POST['rent_car'])) {  
    $firstName = mysqli_real_escape_string($conn, $_POST["first_name"]);  
    $lastName = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    !empty($_SESSION['email'])? $email = $_SESSION['email'] : $email;
    $phoneNumber = mysqli_real_escape_string($conn, $_POST["phone_number"]);  

    $carPlate = mysqli_real_escape_string($conn, $_SESSION['global_car_plate']);
    $rentPickupDate = mysqli_real_escape_string($conn, $_POST["rent_pickup_date"]);  
    $rentPickupTime = mysqli_real_escape_string($conn, $_POST["rent_pickup_time"]);  
    
    $rentPickupDateTime = $rentPickupDate . " " . $rentPickupTime;

    $rentReturnDate = mysqli_real_escape_string($conn, $_POST["rent_return_date"]);  
    $rentReturnTime = mysqli_real_escape_string($conn, $_POST["rent_return_time"]);  

    $rentReturnDateTime = $rentReturnDate . " " . $rentReturnTime;
    
    $insurance = mysqli_real_escape_string($conn, $_POST["insurance"]);  
    $pickupPlace = mysqli_real_escape_string($conn, $_POST["pickup_place"]);  
    $rentFullCost = mysqli_real_escape_string($conn, $_POST["rent_full_cost"]);  
    $cashback = mysqli_real_escape_string($conn, $_POST["cashback"]);  
    
$stmt = $conn->prepare("CALL RentCar(?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssssii',$firstName, $lastName, $email, $phoneNumber, $carPlate, $rentPickupDateTime, 
$rentReturnDateTime, $insurance, $pickupPlace, $rentFullCost, $cashback);
$stmt->execute();
// $result = $stmt->get_result();

$stmt->close();
$conn->next_result();
}
    ?>
<!-- PHP CODE END -->