<?php
session_start();
include "./reusable/config.php";
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
</head>

<?php

include "procedures/ProcGetExistingCarsToShow.php";
include "procedures/ProcGetAllCarsData.php";
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

    if (isset($_POST['sendNewCar'])) {
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
        $rentDaysPrice21_45 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_21_4"]);
        $rentDaysPrice46 = mysqli_real_escape_string($conn, $_POST["rentDaysPrice_46"]);
        $imagePaths = $_FILES['image_paths']['name'];
        $fileCount = count($imagePaths);
        $allImages = '';

        $allowed = array('jpg', 'jpeg', 'png', 'webp');
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['image_paths']['name'][$i];
            $fileTmpName = $_FILES['image_paths']['tmp_name'][$i];
            $fileSize = $_FILES['image_paths']['size'][$i];
            $fileError = $_FILES['image_paths']['error'][$i];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    // $uniqueFileName = uniqid('', true) . '_' . $fileName;  // Generate a unique filename
                    // $fileDestination = 'C:\Users\ungur\OneDrive\Рабочий стол\cars-rent\images\carsList/' . $uniqueFileName;
                    // move_uploaded_file($fileTmpName, $fileDestination);
                    // $allImages .= $uniqueFileName . ',';  // Store the unique filename in the list
                    $uniqueFileName = uniqid('', true) . '_' . $fileName;  // Generate a unique filename
                    $fileDestination = 'C:\Users\ungur\OneDrive\Рабочий стол\cars-rent\images\carsList/' . $fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $allImages .= $fileName . ',';  // Store the unique filename in the list
                } else {
                    echo "There was an error uploading your file!";
                }
            } else {
                echo '<script>
                    alert("You cannot upload files of this type!")
                    window.location.href = "pages/managerProfile.php";
                </script>';
                exit();
            }
        }
        // $allImages = rtrim($allImages, ',');
        // Prepare the statement 16

        // Step 1: Find or insert the car make
        $query = "SELECT make_id FROM car_make WHERE make = '$make'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $v_make_id = $row ? $row['make_id'] : null;

        if (!$v_make_id) {
            $query = "INSERT INTO car_make(make) VALUES ('$make')";
            mysqli_query($conn, $query);
            $v_make_id = mysqli_insert_id($conn);
        }

        // Step 2: Find or insert the car model
        $query = "SELECT model_id FROM car_make_models WHERE model = '$model'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $v_model_id = $row ? $row['model_id'] : null;

        if (!$v_model_id) {
            $query = "INSERT INTO car_make_models(make_id, model) VALUES ($v_make_id, '$model')";
            mysqli_query($conn, $query);
            $v_model_id = mysqli_insert_id($conn);
        } else {
            // Check if the existing model is related to the specified make
            $query = "SELECT make_id FROM car_make_models WHERE model = '$model'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $existing_make_id = $row['make_id'];

            if ($existing_make_id != $v_make_id) {
                die("Model already exists and is related to another make.");
            }
        }

        // Step 3: Insert into car table
        $query = "INSERT INTO car (
    car_plate, model_id, registration_year, engine_capacity, engine_fuel_id, transmission_type_id, body_type_id, doors_number, passengers_number
) VALUES (
    '$carPlate',
    $v_model_id,
    '$registrationYear',
    '$engineCapacity',
    (SELECT engine_fuel_id FROM car_engine_fuel WHERE engine_fuel = '$fuelType'),
    (SELECT transmission_type_id FROM car_transmission_type WHERE transmission_type = '$transmissionType'),
    (SELECT body_type_id FROM car_body_type WHERE body_type = '$bodyType'),
    $doorsNumber,
    $pasangersNumber
)";
        mysqli_query($conn, $query);
        $last_id = mysqli_insert_id($conn);

        // Step 4: Insert into car_rent_cost table
        $query = "INSERT INTO car_rent_cost (
    car_id, rent_days_price_1_2, rent_days_price_3_7, rent_days_price_8_20, rent_days_price_21_45, rent_days_price_46
) VALUES (
    $last_id, '$rentDaysPrice1_2', '$rentDaysPrice3_7', '$rentDaysPrice8_20', '$rentDaysPrice21_45', '$rentDaysPrice46'
)";
        mysqli_query($conn, $query);

        // Step 5: Insert into car_description table
        $query = "INSERT INTO car_description (car_id, description_english, description_romanian)
VALUES ($last_id, '$descriptionEn', '$descriptionRo')";
        mysqli_query($conn, $query);

        // Step 6: Handle the image paths
        $imagePathsArray = explode(',', $allImages);

        foreach ($imagePathsArray as $imagePath) {
            $imagePath = trim($imagePath);  // Remove any spaces around the image path
            $query = "INSERT INTO car_images (car_id, image_path) VALUES ($last_id, '$imagePath')";
            mysqli_query($conn, $query);
        }

        if (mysqli_query($conn, $query)) {
            echo '<script>alert("New car successfully added to DB")</script>';
            echo '<script> window.location.href = "managerProfile.php";</script>';
        }
    };
    //funtion for delete local images
    function deleteImage($imageName)
    {
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
    if (isset($_POST["deleteExistingCar"])) {
        $carPlate = mysqli_real_escape_string($conn, $_POST["deleteExistingCar"]);
        //delete local images
        $stmt = $conn->prepare("SELECT GROUP_CONCAT(car_images.image_path) images
                                FROM car_images
                                RIGHT JOIN car ON car_images.car_id=car.car_id
                                WHERE car.car_plate=?;");
        $stmt->bind_param("s", $carPlate);
        $stmt->execute();
        $stmt->bind_result($imagePaths);
        $stmt->fetch();
        $imagesArray = explode(',', $imagePaths);
        foreach ($imagesArray as $imageName) {
            deleteImage($imageName);
        }
        // Close the statement
        $stmt->close();
        //delete cars from db

        // Step 1: Get the model_id related to the car_plate
$query = "SELECT model_id FROM car WHERE car_plate = '$carPlate' LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$v_model_id = $row ? $row['model_id'] : null;

if ($v_model_id !== null) {
    // Step 2: Get the make_id related to the model_id
    $query = "SELECT make_id FROM car_make_models WHERE model_id = $v_model_id LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $v_make_id = $row ? $row['make_id'] : null;

    // Step 3: Delete the car from the car table
    $query = "DELETE FROM car WHERE car_plate = '$carPlate'";
    mysqli_query($conn, $query);

    // Step 4: Check if there are any other cars with the same model_id
    $query = "SELECT car_id FROM car WHERE model_id = $v_model_id LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $v_car_id = $row ? $row['car_id'] : null;

    // Step 5: If no other car uses the model, delete the model from car_make_models
    if ($v_car_id === null) {
        $query = "DELETE FROM car_make_models WHERE model_id = $v_model_id";
        mysqli_query($conn, $query);
    }

    // Step 6: Check if there are any other models with the same make_id
    $query = "SELECT make_id FROM car_make_models WHERE make_id = $v_make_id LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $v_make_id2 = $row ? $row['make_id'] : null;

    // Step 7: If no other model uses the make, delete the make from car_make
    if ($v_make_id2 === null) {
        $query = "DELETE FROM car_make WHERE make_id = $v_make_id";
        mysqli_query($conn, $query);
    }

    echo '<script>alert("Car successfully deleted from DB")</script>';
} else {
    echo '<script>alert("Car not found.")</script>';
}

// Redirect back to managerProfile.php
echo '<script> window.location.href = "managerProfile.php";</script>';
    }
}
// get all users from DB
$result = $conn->query('SELECT user_roles.user_role, user.first_name, user.last_name, user.email, user.phone
                            FROM user_roles
                            RIGHT JOIN user ON user.user_role_id = user_roles.user_role_id
                            WHERE user_roles.user_role="Guest" OR user_roles.user_role="User"
                            ORDER BY user_roles.user_role_id;');

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $allUsersData[] = array(
            'allUsersRole' => $row['user_role'],
            'allUsersfirstName' => $row['first_name'],
            'allUserslastName' => $row['last_name'],
            'allUsersemail' => $row['email'],
            'allUsersphone' => $row['phone'],
        );
    }
    if (!empty($allUsersData)) {
    }
} else {
    echo '<script> let allUsersData =  ""; </script>';
    echo json_encode(["message" => "No data found"]);
}
$result->close();
$conn->next_result();
?>

<body>

    <?php include "./reusable/headerMini.php"
    ?>

    <?php
    if (!isset($_SESSION["email"])) {
        echo 'Session is not active<br>';
    } else {
        echo 'Session is active<br>';
        echo $_SESSION['role'];
    }
    ?>

    <br />

    <form id="manager-form-add-new-car" action="" method="post" onsubmit="return checkIfImagesSelected()" enctype="multipart/form-data">
        <div class="addNewCar">
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

    <form id="manager-form-table" action="" method="post">
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
            max-height: 30px;
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
                <tbody id='carInfoTable'></tbody>
            </table>
        </div>

    </form>

    <form action="" method="post">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Email</th>
                        <th>Nr. telefon</th>
                    </tr>
                </thead>
                <tbody id='allUsersInfoTable'>
                </tbody>
            </table>
        </div>
    </form>

    <?php
    echo '<label><a href="../reusable/logout.php">Logout</a></label> <br>';
    ?>

    <script type='text/javascript' src="/js/manager.js" defer></script>
</body>

</html>