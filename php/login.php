<?php  
    // include "config.php";
    // session_start();  
    // if(isset($_SESSION["email"])) {  
    //     header("location:index.php");  
    // }   

    

    // if(isset($_POST["login"])) {  
    //     if(empty($_POST["email"]) && empty($_POST["password"]))  
    //     {  
    //         echo '<script>alert("Both Fields are required")</script>';  
    //     }  
    //     else  
    //     {  
    //         $email = mysqli_real_escape_string($conn, $_POST["email"]);  
    //         $password = mysqli_real_escape_string($conn, $_POST["password"]);  
    //         $password = md5($password);  
    //         $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";  
    //         $result = mysqli_query($conn, $query);  
    //         if(mysqli_num_rows($result) > 0)  
    //         {  
    //                 $_SESSION['email'] = $email;  
    //                 header("location:profile.php");  
    //         }  
    //         else  
    //         {  
    //                 echo '<script>alert("Wrong User Details")</script>';  
    //         }  
    //     }  
    // }  

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
                    header("location:user.php");
                } elseif ($userRole === 'Manager') {
                    header("location:manager.php");
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
    
    // Function to get user role using the stored procedure
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

<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | PHP Login Registration Form with md5() Password Encryption</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <br /><br />
    <div class="container" style="width:500px;">
        <h3 align="center">PHP Login Registration Form with md5() Password Encryption</h3>
        <br />
        <h3 align="center">Login</h3>
        <br />
        <form method="post">
            <label>Enter email</label>
            <input type="text" name="email" class="form-control" />
            <br />
            <label>Enter Password</label>
            <input type="password" name="password" class="form-control" />
            <br />
            <input type="submit" name="login" value="Login" class="btn btn-info" />
            <br />
            <p align="center"><a href="register.php">Register</a></p>
        </form>
    </div>
</body>

</html>