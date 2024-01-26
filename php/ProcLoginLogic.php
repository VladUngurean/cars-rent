<?php  
    include "config.php";

    session_start();  
    if(isset($_SESSION["email"])) {  
        header("location:index.php");  
    } 

    if(isset($_POST["login"])) {  
        if(empty($_POST["email"]) && empty($_POST["password"])) {  
            echo '<script>alert("Both Fields are required")</script>';  
        }
        else {
            $email = mysqli_real_escape_string($conn, $_POST["email"]);  
            $password = mysqli_real_escape_string($conn, $_POST["password"]);  
            $password = md5($password);  
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $query);  

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
                } elseif ($userRole === 'Admin') {
                    header("location:adminProfile.php");
                } else {
                    // Handle other roles or scenarios
                    echo "Unknown user role!";
                }
            }
            else {  
                echo '<script>alert("Wrong User Details")</script>';  
            }
        }
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