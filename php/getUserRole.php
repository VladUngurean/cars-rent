<?php

// include "config.php";

if(mysqli_num_rows($result) > 0) {  
    // If user login is successful, get the user role
    $userRole = getUserRole($email);

    // Store user information in the session
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $userRole;

    // Redirect to the appropriate dashboard or home page
    if ($userRole === 'User') {
        header("location:userProfile.php");
    } elseif ($userRole === 'Manager') {
        header("location:managerProfile.php");
    } else {
        // Handle other roles or scenarios
        echo "Unknown user role!";
    }
}  
else {  
    echo '<script>alert("Wrong User Details")</script>';
}  

function getUserRole($email) {
    global $conn;
    $query = "CALL getUserRole('$email')";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['user_role'];
    }

    return null;
}

?>