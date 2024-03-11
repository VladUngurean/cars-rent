<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Manager Account</title>


    <script type='text/javascript' src="/js/manager.js" defer></script>
</head>
<?php
    include "ProcGetExistingCarsToShow.php";
    include "ProcGetAllCarsData.php";

    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit;
    }

    // Check if the user has the correct role
    if ($_SESSION['role'] !== 'Manager') {
        header('Location: index.php');
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
        $descriptionRo = mysqli_real_escape_string($conn, $_POST["description_ro"]);  
        $descriptionEn = mysqli_real_escape_string($conn, $_POST["description_en"]);  
        $rentDaysPrice1_2 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_1_2"]);  
        $rentDaysPrice3_7 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_3_7"]);  
        $rentDaysPrice8_20 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_8_20"]);  
        $rentDaysPrice21_4 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_21_4"]);  
        $rentDaysPrice46 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_46"]);  
        $imagePaths = $_FILES['image_paths']['name'];
        $fileCount = count($imagePaths);
        $allImages = '';

        $allowed = array('jpg', 'jpeg', 'png');


        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['image_paths']['name'][$i];
            $fileTmpName = $_FILES['image_paths']['tmp_name'][$i];
            $fileSize = $_FILES['image_paths']['size'][$i];
            $fileError = $_FILES['image_paths']['error'][$i];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

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
            echo '<script>alert("You cannot upload files of this type!")</script>';
            exit();
            echo '<script> window.location.href = "managerProfile.php";</script>';
        } 
        }
        // $allImages = rtrim($allImages, ',');
        // Prepare the statement 16
        $stmt = $conn->prepare("CALL InsertCarAndImages(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Execute the statement
        if ($stmt->execute([$carPlate, $make, $model, $registrationYear, $engineCapacity, $fuelType, $transmissionType, $bodyType, $doorsNumber, $pasangersNumber, $rentDaysPrice1_2, $rentDaysPrice3_7, $rentDaysPrice8_20, $rentDaysPrice21_4, $rentDaysPrice46, $descriptionEn ,$descriptionRo, $allImages])) {
            echo '<script>alert("New car successfully added to DB")</script>'; 
            echo '<script> window.location.href = "managerProfile.php";</script>';
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

    //delete images and car from DB
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
    
    if ($stmt->execute([$carPlate])) {
        echo '<script>alert("Car successfully deleted from DB")</script>'; 
        echo '<script> window.location.href = "managerProfile.php";</script>';
    } else {
        echo '<script>alert("Error deleting car: ' . $stmt->error . '")</script>'; 
    }

    // Close the statement
    $stmt->close();
    }
    }

?>

<body>

    <?php include "headerMini.php"
        ?>

    <?php  
            if(!isset($_SESSION["email"])){  
                echo 'Session is not active<br>' ;
            } else { echo 'Session is active<br>' ; 
                echo $_SESSION['role'];
            }
        ?>

    <br />

    <form action="" method="post" onsubmit="return checkIfImagesSelected()" enctype="multipart/form-data" style="text-align: center; display: flex; justify-content: center; ailgn-items: center;">
        <div class="addNewCar" style="text-align: start; display: flex; justify-content: center; ailgn-items: center; flex-direction: column; max-width:320px;">
            <ul id="makeModelToDb"></ul>
            <ul id="transmissionTypeToDb"></ul>
            <ul id="engineFuelToDb"></ul>
            <ul id="bodyTypeToDb"></ul>
            <input type="text" name="car_plate" placeholder="Car Plate ex. AAA 000" pattern="^[A-Z]{3}\s[0-9]{3}$" title="Please enter a valid Car Plate number ex. (AAA 000)" minlength="7" maxlength="7" required />
            <input type="text" name="doors_number" placeholder="Numarul de usi" pattern="^\d{1}$" title="Please enter a valid Doors Number ex. (5)" inputmode="numeric" maxlength="1" required>
            <input type="text" name="pasangers_number" placeholder="Numarul de pasageri" pattern="^\d{1,2}$" title="Please enter a valid Passangers Number ex. (5)" inputmode="numeric" maxlength="2" required>
            <input type="text" name="engine_capacity" placeholder="Engine Capacity ex. 1.8" pattern="^\d\.\d$" title="Please enter a valid Engine Capacity ex. (1.8)" maxlength="3" required />
            <input type="text" name="registration_year" placeholder="Registration Year ex.2002" pattern="^(198\d|199\d|200\d|201\d|202[0-3])$" title="Please enter a valid Registration Year ex. (2020)" maxlength="4" required />
            <textarea name="description_ro" id="" cols="30" rows="10" placeholder="Description in Romanian" required></textarea>
            <textarea name="description_en" id="" cols="30" rows="10" placeholder="Description in English" required></textarea>
            <input type="number" name="rentDaysPrice_1_2" placeholder="Pret 1-2 Zile" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_3_7" placeholder="Pret 3-7 Zile" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_8_20" placeholder="Pret 8-20 Zile" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_21_4" placeholder="Pret 21-45 Zile" minlength="2" maxlength="4" required />
            <input type="number" name="rentDaysPrice_46" placeholder="Pret 46+ Zile" minlength="2" maxlength="4" required />

            <label for="fileInput" tabindex="0" onkeypress="handleLabelKeyPress(event)" required>Choose at least 6 Images <br> Only jpg, jpeg, png are allowed!!</label>

            <input type="file" id="fileInput" name="image_paths[]" multiple onchange="displaySelectedImages(this)" style="display: none;" />

            <div id="selectedImagesContainer"></div>

            <!-- <input id="sendCarToDataBase" onclick="changeRadioValue()" class="button" name="submit" type="submit" value="To DB" /> -->
            <input id="sendCarToDataBase" class="button" name="sendNewCar" type="submit" value="To DB" />
        </div>

    </form>

    <br>

    <form action="" method="post">
        <style>
        .table-container {
            max-width: 1560px;
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
            color: white;
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
                        <th>Car Description Eng</th>
                        <th>Car Description Ro</th>
                    </tr>
                </thead>
                <tbody id='carInfoTable'>
                    <!-- <input id="tableDeleteCarButton" class="button" name="deleteExistingCar" type="submit" value="" /> -->
                </tbody>
            </table>
        </div>

    </form>


    <form action="" method="post">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Email</th>
                        <th>Nr. telefon</th>
                    </tr>
                </thead>
                <tbody id='usesrInfoTable'>
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