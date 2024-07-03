<?php
include "config.php"; // Ensure your config.php starts the session

// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize the session variable if not set
if (!isset($_SESSION['local_car_plate'])) {
    $_SESSION['local_car_plate'] = "";
}

// Check if 'car_plate' is set in the GET parameters
if (isset($_GET['car_plate'])) {
    $car_plate = filter_input(INPUT_GET, 'car_plate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $decoded_car_plate = urldecode($car_plate);
    echo htmlspecialchars($decoded_car_plate); // Avoid XSS attacks

    // Set the decoded car_plate in the PHP session
    $_SESSION['local_car_plate'] = $decoded_car_plate;
}

// Set the global car plate session variable
$_SESSION['global_car_plate'] = $_SESSION['local_car_plate'];
echo "Global car_plate saved in session: " . htmlspecialchars($_SESSION['global_car_plate']);

// Prepare and execute the stored procedure call
if ($stmt = $conn->prepare("CALL getCar(?)")) {
    $stmt->bind_param("s", $_SESSION['global_car_plate']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the results and store them in the $data array
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'plate' => $row['car_plate'],
                'make' => $row['make'],
                'model' => $row['model'],
                'registrationYear' => $row['registration_year'],
                'transmissionType' => $row['transmission_type'],
                'engineFuel' => $row['engine_fuel'],
                'engineCapacity' => $row['engine_capacity'],
                'bodyType' => $row['body_type'],
                'doorsNumber' => $row['doors_number'],
                'passengersNumber' => $row['passengers_number'],
                'descriptionEn' => $row['description_english'],
                'descriptionRo' => $row['description_romanian'],
                'rentDaysPrice1_2' => $row['rent_days_price_1_2'],
                'rentDaysPrice3_7' => $row['rent_days_price_3_7'],
                'rentDaysPrice8_20' => $row['rent_days_price_8_20'],
                'rentDaysPrice21_45' => $row['rent_days_price_21_45'],
                'rentDaysPrice46' => $row['rent_days_price_46'],
                'rentStatus' => $row['rent_status'],
                'carImage' => $row['images'],
            );
        }

        if (!empty($data)) {
            echo '<script>
                let carToRent = ' . json_encode($data) . ';
                console.log(carToRent);
            </script>
            <script src="/js/carRent.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                configRent = {
                    enableTime: true,
                    time_24hr: true,
                    altInput: true,
                    allowInput: false,
                    altFormat: "F j, Y - Ora(H:i)",
                    minDate: "today",
                    defaultDate: "today",
                    allowInput: true,
                    onChange: function(selectedDates) {
                        if (selectedDates.length > 0) {
                            configReturn.minDate = selectedDates[0];
                            flatpickr("input[name=rent_return_date]", configReturn);
                        }
                    },
                };
                configReturn = {
                    enableTime: true,
                    time_24hr: true,
                    altInput: true,
                    allowInput: true,
                    altFormat: "F j, Y - Ora(H:i)",
                    minDate: "today",
                };
                flatpickr("input[name=rent_pickup_date]", configRent);
                flatpickr("input[name=rent_return_date]", configReturn);
                setTimeout(() => {
                    const swiper = new Swiper(".swiper", {
                        direction: "horizontal",
                        loop: true,
                        spaceBetween: 20,
                        keyboard: { enabled: true },
                        pagination: { el: ".swiper-pagination" },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                    });
                }, 0);
            </script>';
        } else {
            echo '<script>let carToRent = "";</script>';
        }
    } else {
        echo "No results found";
    }

    $stmt->close();
} else {
    echo "Failed to prepare the statement";
}

$conn->next_result();
?>