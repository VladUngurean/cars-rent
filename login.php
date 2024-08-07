<?php 
    session_start();
?>
<?php  
    include "config.php";

    if (isset($_SESSION['role']) && $_SESSION['role'] != "Guest") {
        header("Location: index.php");
    }
    
    $loginErrorMesage = '';

    if(isset($_POST["login"])) {  
        if(empty($_POST["email"]) && empty($_POST["password"])) {  
            echo '<script>alert("Both Fields are required")</script>';  
        }
        else {
            $email = mysqli_real_escape_string($conn, $_POST["email"]);  
            $password = mysqli_real_escape_string($conn, $_POST["password"]);  
            $password = md5($password);  
            $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $query);  

            if(mysqli_num_rows($result) > 0) {  
                // Store user information in the session
                $_SESSION['email'] = $email;
                
                // If user login is successful, get the user role
                $userRole = getUserRole($email);
                $_SESSION['role'] = $userRole;

                // Redirect to the appropriate dashboard or home page
                if ($userRole === 'User') {
                    header("location:userProfile.php");
                } elseif ($userRole === 'Manager') {
                    header("location:managerProfile.php");
                } elseif ($userRole === 'Admin') {
                    header("location:adminProfile.php");
                } else {
                    echo "Unknown user role!";
                }
            }
            else {  
                $loginErrorMesage = "Wrong User Details";  
                // session_destroy();
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Sign Up/Log in</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">

</head>

<body>

    <?php include "headerMini.php"; ?>

    <section class="login-area">
        <div class="login-area-container">

            <h1>Log in</h1>
            <form id="logInForm" method="post">
                <div class="register-area__input-field">
                    <p>Need an account? <a href="register.php">Sign Up</a></p>
                    <input type="text" name="email" placeholder="E-mail" minlength="5" maxlength="40" required />
                </div>
                <div class="register-area__input-field">
                    <div class="show-password" onclick="togglePassrwordVisability('passwordInput', 'passwordShow', 'passwordHide')">
                        <div id="passwordShow" class="password-show-option" style="display:flex;">
                            <img src="/images/icons/regularEyeIcon.svg" alt="opendedeye">
                            <p>Show</p>
                        </div>
                        <div id="passwordHide" class="password-show-option" style="display:none;">
                            <img src="/images/icons/slashedEyeIcon.svg" alt="opendedeye">
                            <p>Hide</p>
                        </div>
                    </div>
                    <input id="passwordInput" type="password" name="password" placeholder="Password" minlength="5" maxlength="40" required />

                </div>
                <?php
                if (!empty($loginErrorMesage)) echo "<p class='register-error-message'>$loginErrorMesage</p>";
                ?>
                <input class="login-button" type="submit" name="login" value="Login" class="btn btn-info" />
            </form>
        </div>

    </section>
    <script type='text/javascript' src="/js/main.js" defer></script>
</body>

</html>