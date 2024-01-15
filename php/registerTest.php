<?php
  
  // Include database connectivity
  session_start();
  include_once('config.php');
  
  if (isset($_POST['submit'])) {
      
      $errorMsg = "";
      
      $email    = mysqli_real_escape_string($conn, $_POST['email']);
      $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
      $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
      $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $password = password_hash($password, PASSWORD_DEFAULT);
      
      $sql = "SELECT * FROM users WHERE email = '$email'";
      $execute = mysqli_query($conn, $sql);
        
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email is not valid, please try again";
    } else if (strlen($password) < 6) {
        $errorMsg = "Password should be at least six characters";
    } else if ($execute->num_rows == 1) {
        $errorMsg = "This email is already in use";
    } else {
        // Use a different variable to store the hashed password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users(user_role,firstName,lastName,phone,email,password) 
                  VALUES((SELECT user_role_id FROM user_roles WHERE user_role='user'),'$firstName','$lastName','$phoneNumber','$email','$hashedPassword')";
        $result = mysqli_query($conn, $query);
    
        if ($result == true) {
            header("Location:login.php");
        } else {
            $errorMsg = "Registration failed, please try again";
        }
    }
  }

?>
<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP Password hash Registration in PHP Mysql</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top:50px">
        <h1 style="text-align:center;">PHP Password_hash Registration in PHP Mysql</h1><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
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
                        <input type="text" class="form-control" name="firstName" placeholder="first Name" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastName" placeholder="first Name" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phoneNumber" placeholder="phoneNumber" required="">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="">
                    </div>
                    <p>If you have account <a href="login.php">Login</a></p>
                    <input type="submit" class="btn btn-warning btn btn-block" name="submit" value="Sign Up">
                </form>
            </div>
        </div>
    </div>
</body>

</html>