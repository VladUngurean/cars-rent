<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Manager Account</title>

    <?php
    // session_start();
    // include "config.php";
include "ProcGetExistingCarsToShow.php";
include "ProcGetAllCarsData.php";

// include 'loginLogic.php';
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    // echo "Unauthorized email!";
    exit;
}

// Check if the user has the correct role
if ($_SESSION['role'] !== 'Manager') {
    // echo "Unauthorized access!";
    header('Location: userProfile.php');
    exit;
}
if ($_SESSION['role'] == 'Manager') {

if(isset($_POST['sendNewCar'])) {  
    $make = mysqli_real_escape_string($conn, $_POST["make"]);  
    $model = mysqli_real_escape_string($conn, $_POST["model"]);  
    $transmissionType = mysqli_real_escape_string($conn, $_POST["transmission_type"]);  
    $fuelType = mysqli_real_escape_string($conn, $_POST["fuel_type"]);  
    $bodyType = mysqli_real_escape_string($conn, $_POST["body_type"]);  
    $carPlate = mysqli_real_escape_string($conn, $_POST["car_plate"]);  
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
    $imagePaths = $_FILES['image_paths']['name'];
    $fileCount = count($imagePaths);
    $allImages = '';

    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $_FILES['image_paths']['name'][$i];
        $fileTmpName = $_FILES['image_paths']['tmp_name'][$i];
        $fileSize = $_FILES['image_paths']['size'][$i];
        $fileError = $_FILES['image_paths']['error'][$i];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            $uniqueFileName = uniqid('', true) . '_' . $fileName;  // Generate a unique filename
            $fileDestination = 'C:\Users\ungur\OneDrive\Рабочий стол\cars-rent\images\carsList/' . $uniqueFileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $allImages .= $uniqueFileName . ',';  // Store the unique filename in the list
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    } 
    }
    // $allImages = rtrim($allImages, ',');
    // Prepare the statement 16
    $stmt = $conn->prepare("CALL InsertCarAndImages(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Execute the statement
    if ($stmt->execute([$carPlate, $make, $model, $registrationYear, $engineCapacity, $fuelType, $transmissionType, $bodyType, $doorsNumber, $pasangersNumber, $rentDaysPrice1_2, $rentDaysPrice3_7, $rentDaysPrice8_20, $rentDaysPrice21_4, $rentDaysPrice46, $description, $allImages])) {
        echo '<script>alert("New car successfully added to DB")</script>'; 
        // var_dump($imagePaths);
        // var_dump($fileDestination);
        header("Location: managerProfile.php");
    }
    // Close the statement
    $stmt->close();

};

//funtion for delete local images
function deleteImage($imageName) {
    $imagePath = 'C:\Users\ungur\OneDrive\Рабочий стол\cars-rent\images\carsList/' . $imageName;

    // Check if the file exists before attempting to delete
    if (file_exists($imagePath)) {
        unlink($imagePath); // Delete the file
        echo "Image $imageName deleted successfully.";
    } else {
        echo "Image $imageName not found.";
    }
}

//delete images in cars from DB
if(isset($_POST["deleteExistingCar"])) {  

    $carPlate = mysqli_real_escape_string($conn, $_POST["deleteExistingCar"]);  

    //delete local images
    $stmt = $conn->prepare("CALL getCarImages(?)");
    $stmt->execute([$carPlate]);
    $stmt->bind_result($imagePaths);
    $stmt->fetch();

    $imagesArray = explode(',', $imagePaths);
    foreach ($imagesArray as $imageName) {
        deleteImage($imageName);
    }
    // Close the statement
    $stmt->close();
    

    //delete cars from db
    $stmt = $conn->prepare("CALL deleteCar(?)");
    
    // Execute the statement
    if ($stmt->execute([$carPlate])) {
        echo '<script>alert("Car successfully deleted from DB")</script>'; 
        header("Location: managerProfile.php");
    } else {
        echo '<script>alert("Error deleting car: ' . $stmt->error . '")</script>'; 
    }

    // Close the statement
    $stmt->close();
}
}

?>

    <script type='text/javascript' src="/js/manager.js" defer></script>
</head>

<body style="text-align:center">
    <?php  
        if(!isset($_SESSION["email"])){  
            echo 'Session is not active<br>' ;
        } else { echo 'Session is active<br>' ; }
        echo $_SESSION['role'];
    ?>

    <br />

    <form action="" method="post" enctype="multipart/form-data" style="text-align: center; display: flex; justify-content: center; ailgn-items: center;">
        <div class="addNewCar" style="text-align: start; display: flex; justify-content: center; ailgn-items: center; flex-direction: column; max-width:320px;">
            <ul id="makeModelToDb"></ul>
            <ul id="transmissionTypeToDb"></ul>
            <ul id="engineFuelToDb"></ul>
            <ul id="bodyTypeToDb"></ul>
            <ul id="carDoorsNumberToDb"></ul>
            <ul id="pasangersNumberToDb"></ul>
            <input type="text" name="car_plate" placeholder="Car Plate" minlength="7" maxlength="7" required />
            <input type="number" name="engine_capacity" placeholder="Engine Capacity" minlength="2" maxlength="6" required />
            <input type="number" name="registration_year" placeholder="Registration Year" minlength="3" maxlength="4" required />
            <textarea name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
            <input type="number" name="rentDaysPrice_1_2" placeholder="Pret 1-2" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_3_7" placeholder="Pret 3-7" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_8_20" placeholder="Pret 8-20" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_21_4" placeholder="Pret 21-45" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_46" placeholder="Pret 46" minlength="2" maxlength="4" required />
            <input type="file" name="image_paths[]" multiple onchange="displaySelectedImages(this)" />

            <div id="selectedImagesContainer"></div>

            <!-- <input id="sendCarToDataBase" onclick="changeRadioValue()" class="button" name="submit" type="submit" value="To DB" /> -->
            <input id="sendCarToDataBase" class="button" name="sendNewCar" type="submit" value="To DB" />
        </div>

    </form>

    <br>

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
                        <th>Car Plate</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Registration Year</th>
                        <th>Transmission Type</th>
                        <th>Engine Fuel</th>
                        <th>Engine Capacity</th>
                        <th>Body Type</th>
                        <th>Doors Number</th>
                        <th>Passenger Number</th>
                        <th>Price 1-2</th>
                        <th>Price 3-7</th>
                        <th>Price 8-20</th>
                        <th>Price 21-45</th>
                        <th>Price 46</th>
                        <th>Rent Status</th>
                        <th>Images</th>
                        <th>Car Description</th>
                    </tr>
                </thead>
                <tbody id='carInfoTable'>
                    <!-- <input id="tableDeleteCarButton" class="button" name="deleteExistingCar" type="submit" value="" /> -->
                </tbody>
            </table>
        </div>

    </form>

    <?php  
        echo '<label><a href="logout.php">Logout</a></label> <br>';  
        echo '<br>';  
        echo '<label style=" margin-bottom:250px" ><a href="index.php">Main Page</a></label> <br><br><br>';  
    ?>

</body>

</html>