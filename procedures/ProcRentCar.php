<?php
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
    
    // Step 1: Check if the user already exists
$query = "SELECT user_id FROM user WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$user_id = $user ? $user['user_id'] : null;

if ($user_id !== null) {
    // User exists, proceed with inserting data into rented_car
    $query = "INSERT INTO rented_car (car_id, user_id, rent_start_date_time, rent_end_date_time, car_insurance, car_pickup_place)
              VALUES (
                  (SELECT car_id FROM car WHERE car_plate = '$carPlate' LIMIT 1), 
                  $user_id,
                  STR_TO_DATE('$rentPickupDateTime', '%Y-%m-%d %H:%i:%s'), 
                  STR_TO_DATE('$rentReturnDateTime', '%Y-%m-%d %H:%i:%s'), 
                  (SELECT insurance_id FROM rented_car_insurance WHERE insurance_type = '$insurance' LIMIT 1),
                  (SELECT pickup_place_id FROM rented_cars_pickup_place WHERE pickup_place = '$pickupPlace' LIMIT 1)
              )";
    mysqli_query($conn, $query);
    $rented_car_id = mysqli_insert_id($conn);

    // Step 2: Insert the information about the car cost
    $query = "INSERT INTO rented_car_cost (rented_car_id, rented_car_full_cost, rented_car_cashback)
              VALUES ($rented_car_id, $rentFullCost, $cashback)";
    mysqli_query($conn, $query);

    // Step 3: Check if the user finances record exists
    $query = "SELECT user_finances.user_id FROM user_finances 
              LEFT JOIN user USING(user_id) WHERE user.email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $user_finances = mysqli_fetch_assoc($result);

    if ($user_finances) {
        // User finances exist, update the record
        $query = "UPDATE user_finances
                  LEFT JOIN user USING(user_id)
                  SET user_finances.total_cashback = user_finances.total_cashback + $cashback, 
                      user_finances.total_spent = user_finances.total_spent + $rentFullCost
                  WHERE user.email = '$email'";
        mysqli_query($conn, $query);
    } else {
        // User finances don't exist, insert a new record
        $query = "INSERT INTO user_finances (user_id, total_cashback, total_spent)
                  VALUES ($user_id, $cashback, $rentFullCost)";
        mysqli_query($conn, $query);
    }

} else {
    // User does not exist, add user as a guest
    $query = "INSERT INTO user (user_role_id, first_name, last_name, password, email, phone)
              VALUES (
                  (SELECT user_role_id FROM user_roles WHERE user_role = 'Guest' LIMIT 1), 
                  '$firstName', 
                  '$lastName', 
                  '1111', 
                  '$email', 
                  '$phoneNumber'
              )";
    mysqli_query($conn, $query);
    $user_id = mysqli_insert_id($conn);

    // Step 4: Insert info about the rented car inside rented_car
    $query = "INSERT INTO rented_car (car_id, user_id, rent_start_date_time, rent_end_date_time, car_insurance, car_pickup_place)
              VALUES (
                  (SELECT car_id FROM car WHERE car_plate = '$carPlate' LIMIT 1), 
                  $user_id,
                  STR_TO_DATE('$rentPickupDateTime', '%Y-%m-%d %H:%i:%s'), 
                  STR_TO_DATE('$rentReturnDateTime', '%Y-%m-%d %H:%i:%s'), 
                  (SELECT insurance_id FROM rented_car_insurance WHERE insurance_type = '$insurance' LIMIT 1),
                  (SELECT pickup_place_id FROM rented_cars_pickup_place WHERE pickup_place = '$pickupPlace' LIMIT 1)
              )";
    mysqli_query($conn, $query);
    $rented_car_id = mysqli_insert_id($conn);

    // Step 5: Insert info about the rented car cost into rented_car_cost
    $query = "INSERT INTO rented_car_cost (rented_car_id, rented_car_full_cost, rented_car_cashback)
              VALUES ($rented_car_id, $rentFullCost, $cashback)";
    mysqli_query($conn, $query);
}

// Optional: Return success or error messages
if (mysqli_error($conn)) {
    echo '<script>alert("Error renting car: ' . mysqli_error($conn) . '")</script>';
} else {
    echo '<script>alert("Arenda a fost plasata cu succes!<br> Vei fi contactat in scurt timp.");</script>';
    echo "<script> window.location.href = '$currentPage';</script>";
}
}
    ?>
<!-- PHP CODE END -->