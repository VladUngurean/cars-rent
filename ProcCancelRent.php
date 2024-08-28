<?php

    $stmt = $conn->prepare("
                            -- Define variables to store the user ID, cashback, and total spent
                            SET @userId := (SELECT user_id 
                                            FROM rented_car 
                                            JOIN car USING(car_id) 
                                            WHERE car.car_plate = 'ABC123' 
                                            AND rented_car.rent_start_date_time = '2023-08-01 10:00:00' 
                                            AND rented_car.rent_end_date_time = '2023-08-10 10:00:00');

                            SET @cashback := (SELECT rented_car_cost.rented_car_cashback 
                                            FROM rented_car_cost 
                                            JOIN rented_car USING (rented_car_id)
                                            JOIN car USING (car_id)
                                            WHERE car.car_plate = 'ABC123' 
                                            AND rented_car.rent_start_date_time = '2023-08-01 10:00:00' 
                                            AND rented_car.rent_end_date_time = '2023-08-10 10:00:00');

                            SET @totalSpent := (SELECT rented_car_cost.rented_car_full_cost 
                                                FROM rented_car_cost 
                                                JOIN rented_car USING (rented_car_id)
                                                JOIN car USING (car_id)
                                                WHERE car.car_plate = 'ABC123' 
                                                AND rented_car.rent_start_date_time = '2023-08-01 10:00:00' 
                                                AND rented_car.rent_end_date_time = '2023-08-10 10:00:00');

                            -- Update the user finances
                            UPDATE user_finances
                            JOIN rented_car USING (user_id)
                            SET user_finances.total_cashback = user_finances.total_cashback - @cashback, 
                                user_finances.total_spent = user_finances.total_spent - @totalSpent
                            WHERE user_finances.user_id = @userId;

                            -- Delete the user finances record if total cashback and total spent are zero
                            DELETE FROM user_finances 
                            WHERE user_id = @userId AND total_cashback = 0 AND total_spent = 0;

                            -- Delete the rented car record
                            DELETE FROM rented_car 
                            WHERE car_id = (SELECT car_id FROM car WHERE car_plate = 'ABC123') 
                            AND rent_start_date_time = '2023-08-01 10:00:00' 
                            AND rent_end_date_time = '2023-08-10 10:00:00';

                            ");

    

    if ($stmt->execute([$carPlate,$rentStartDatetime,$rentEndDatetime])) {

        echo '<script>alert("Car rent canceled.")</script>'; 

        echo '<script>window.location.href = "userProfile.php";</script>';

    } else {

        echo '<script>alert("Error deleting car: ' . $stmt->error . '")</script>'; 

    }



    // Close the statement

    $stmt->close();



?>