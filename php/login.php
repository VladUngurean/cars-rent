<?php
session_start();

include_once('config.php');

if (isset($_POST['submit'])) {

    $errorMsg = "";

    $email    = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    var_dump($email, $password); // Add this line for debugging
    

    if (!empty($email) || !empty($password)) {
        $query  = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            echo `$row[password]`;
            echo "Stored Password: " . $row['password'] . "<br>";
            echo "Entered Password: " . $password . "<br>";
            if (password_verify($password, $row['password'])) {
                // $_SESSION['id'] = $row['id'];
                // $_SESSION['firstName'] = $row['firstName'];
                header("Location: profile.php");
                exit();
            } else {
                $errorMsg = "Email or Password is invalid";
            }
        } else {
            $errorMsg = "No user found with this email";
        }
    } else {
        $errorMsg = "Email and Password are required";
    }
}
?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP Password hash Login in PHP Mysql</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top:50px">
        <h1 style="text-align: center;">PHP Password_hash Login in PHP Mysql</h1><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="margin-top:20px">
                <?php
            if (isset($errorMsg)) {
                echo "<div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        $errorMsg
                      </div>";
            }
        ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="password" placeholder="Password">
                    </div>
                    <p>Are you new user? <a href="index.php">Sign Up</a></p>
                    <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>

</html>