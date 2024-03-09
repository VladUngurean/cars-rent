<?php

// Retrieve the value from the query parameter
if(isset($_GET['value'])) {
    session_start();
    $value = $_GET['value'];

    // Set the value in the PHP session
    $_SESSION['savedValue'] = $value;

    // Optionally, you can send a response back to JavaScript
    echo "Value saved in session: ".$_SESSION['savedValue'];
    session_destroy();
} else {
    // Handle error if value not received
    echo "Error: Value not received.";
}
?>