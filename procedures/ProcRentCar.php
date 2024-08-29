<?php
include "../config.php";

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
    
    $conn->query("IF EXISTS (SELECT user_id FROM user WHERE email = ".$email.") THEN
        INSERT INTO rented_car (car_id,user_id,rent_start_date_time,rent_end_date_time, car_insurance,car_pickup_place)
        VALUES (
            (SELECT car_id FROM car WHERE car_plate = ".$carPlate."), 
            (SELECT user_id FROM user WHERE email = ".$email."),
            STR_TO_DATE(".$rentPickupDateTime.", '%Y-%m-%d %H:%i:%s'), 
            STR_TO_DATE(".$rentReturnDateTime.", '%Y-%m-%d %H:%i:%s'), 
            (SELECT insurance_id FROM rented_car_insurance WHERE insurance_type = ".$insurance."),
            (SELECT pickup_place_id FROM rented_cars_pickup_place WHERE pickup_place = ".$pickupPlace.")
        );
        SET @rented_car_id = LAST_INSERT_ID();
# inserting the infromation about car cost
        INSERT INTO rented_car_cost (rented_car_id, rented_car_full_cost, rented_car_cashback)
        VALUES (@rented_car_id, ".$rentFullCost.", ".$cashback.");
        
			#inserting or updating the user finances data 
				if EXISTS (SELECT user_finances.user_id FROM user_finances LEFT JOIN user USING(user_id) WHERE user.email=".$email.") then
					# updating the user finances data 
			        UPDATE user_finances
			        LEFT JOIN user USING(user_id)
			        SET user_finances.total_cashback =user_finances.total_cashback+".$cashback.", 
						 user_finances.total_spent=user_finances.total_spent+".$rentFullCost."
					  WHERE user.email=".$email.";
				else
				INSERT INTO user_finances (user_id,user_finances.total_cashback, user_finances.total_spent)
				VALUES ((SELECT user_id FROM user WHERE email=".$email."),".$cashback.", ".$rentFullCost.");
				END if;
	
       
# if user does not exists add user as a guest 
    ELSE
        INSERT INTO user (user_role_id, first_name,last_name, password,email,phone)
        VALUES (
            (SELECT user_role_id FROM user_roles WHERE user_role = 'Guest'), 
            ".$firstName.", 
            ".$lastName.", 
            '1111', 
            ".$email.", 
            ".$phoneNumber."
        );
        SET @user_id = LAST_INSERT_ID();
# insert info about the rented car inside rented_cars
        INSERT INTO rented_car (car_id,user_id,rent_start_date_time,rent_end_date_time, car_insurance,car_pickup_place)
        VALUES (
            (SELECT car_id FROM car WHERE car_plate = ".$carPlate."), 
            @user_id,
            STR_TO_DATE(".$rentPickupDateTime.", '%Y-%m-%d %H:%i:%s'), 
            STR_TO_DATE(".$rentReturnDateTime.", '%Y-%m-%d %H:%i:%s'), 
            (SELECT insurance_id FROM rented_car_insurance WHERE insurance_type = ".$insurance."),
            (SELECT pickup_place_id FROM rented_cars_pickup_place WHERE pickup_place = ".$pickupPlace.")
        );
        SET @rented_car_id = LAST_INSERT_ID();
#insert info about the rented car cost into rented_car_cost
        INSERT INTO rented_car_cost (rented_car_id, rented_car_full_cost, rented_car_cashback)
        VALUES (@rented_car_id, ".$rentFullCost.", ".$cashback.");
    END IF;");

    $conn->next_result();
    echo '<script>alert("Arenda a fost plasata cu succes!<br> Vei fi contactat in scurt timp.");</script>';
    echo "<script> window.location.href = '$currentPage';</script>";
}
    ?>
<!-- PHP CODE END -->