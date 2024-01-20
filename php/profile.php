<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Manager Account</title>

    <?php
include "config.php";

include "getAllCarsData.php";

if(isset($_POST['submit'])) {  
    // $result = $conn->query('CALL InsertCarAndImages()');
    $make = mysqli_real_escape_string($conn, $_POST["make"]);  
    $model = mysqli_real_escape_string($conn, $_POST["model"]);  
    $transmissionType = mysqli_real_escape_string($conn, $_POST["transmission_type"]);  
    $fuelType = mysqli_real_escape_string($conn, $_POST["fuel_type"]);  
    $bodyType = mysqli_real_escape_string($conn, $_POST["body_type"]);  
    $doorsNumber = mysqli_real_escape_string($conn, $_POST["doors_number"]);  
    $pasangersNumber = mysqli_real_escape_string($conn, $_POST["pasangers_number"]);  
    $engineCapacity = mysqli_real_escape_string($conn, $_POST["engine_capacity"]);  
    $registrationYear = mysqli_real_escape_string($conn, $_POST["registration_year"]);  
    $description = mysqli_real_escape_string($conn, $_POST["description"]);  
    $rentDaysPrice1_2 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_1_2"]);  
    $rentDaysPrice3_7 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_3_7"]);  
    $rentDaysPrice8_20 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_8_20"]);  
    $rentDaysPrice21_4 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_21_4"]);  
    $rentDaysPrice46 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_46"]);  
    $imagePaths = mysqli_real_escape_string($conn, $_POST["image_paths"]);  
    
        // Prepare the statement 16 (17)
        $stmt = $conn->prepare("CALL InsertCarAndImages(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters 16 (17)
        // $stmt->bind_param("ssississiiiiiiiss", $make, $model, $registrationYear, $engineCapacity, $fuelType, $transmissionType, $bodyType, $doorsNumber, $pasangersNumber, $rentDaysPrice1_2, $rentDaysPrice3_7, $rentDaysPrice8_20, $rentDaysPrice21_4, $rentDaysPrice46, $description, $imagePaths);
        // $stmt->bind_param("ssississiiiiiiiss", $make, $model, $registrationYear, $engineCapacity, $fuelType, $transmissionType, $bodyType, $doorsNumber, $pasangersNumber, $rentDaysPrice1_2, $rentDaysPrice3_7, $rentDaysPrice8_20, $rentDaysPrice21_4, $rentDaysPrice46, $description, $imagePaths);
        // Execute the statement
        // $stmt->execute([$make, $model, $registrationYear, $engineCapacity, $fuelType, $transmissionType, $bodyType, $doorsNumber, $pasangersNumber, $rentDaysPrice1_2, $rentDaysPrice3_7, $rentDaysPrice8_20, $rentDaysPrice21_4, $rentDaysPrice46, $description, $imagePaths]);
    if ($stmt->execute([$make, $model, $registrationYear, $engineCapacity, $fuelType, $transmissionType, $bodyType, $doorsNumber, $pasangersNumber, $rentDaysPrice1_2, $rentDaysPrice3_7, $rentDaysPrice8_20, $rentDaysPrice21_4, $rentDaysPrice46, $description, $imagePaths])) {
        echo '<script>alert("New car successfully added to DB")</script>';  
        }
        // Close the statement
        $stmt->close();
};
?>

</head>

<body style="text-align:center">
    <br />
    <div class="container" style="text-align:center">
        <h3 align="center">PHP Login Registration Form with md5() Password Encryption</h3> <br>
        <br />
    </div>

    <form action="" method="post" style="text-align: center; display: flex; justify-content: center; ailgn-items: center;">
        <div class="addNewCar" style="text-align: start; display: flex; justify-content: center; ailgn-items: center; flex-direction: column; max-width:320px;">
            <ul id="makeModelToDb"></ul>
            <ul id="transmissionTypeToDb"></ul>
            <ul id="engineFuelToDb"></ul>
            <ul id="bodyTypeToDb"></ul>
            <ul id="carDoorsNumberToDb"></ul>
            <ul id="pasangersNumberToDb"></ul>
            <input type="number" name="engine_capacity" placeholder="Engine Capacity" minlength="2" maxlength="6" required />
            <input type="number" name="registration_year" placeholder="Registration Year" minlength="3" maxlength="4" required />
            <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
            <input type="number" name="rentDaysPrice_1_2" placeholder="Pret 1-2" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_3_7" placeholder="Pret 3-7" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_8_20" placeholder="Pret 8-20" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_21_4" placeholder="Pret 21-45" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_46" placeholder="Pret 46" minlength="2" maxlength="4" required />
            <input type="text" name="image_paths" placeholder="images" required />

            <input class="button" name="submit" type="submit" value="To DB" />
        </div>

    </form>

    <?php  
        echo '<label><a href="logout.php">Logout</a></label> <br/>';  
        echo '<label><a href="index.php">Main Page</a></label>';  
    ?>

    <script type='text/javascript' src="/js/manager.js"></script>

</body>

</html>