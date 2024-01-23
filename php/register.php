    <!-- PHP CODE START -->
    <?php
    include "config.php";
    session_start();

    if(isset($_SESSION["email"])) {  
        header("location:userProfile.php");  
    } 

if(isset($_POST['submit'])) {  
    $email = mysqli_real_escape_string($conn, $_POST["email"]);  
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 
    $passwordCheck = mysqli_real_escape_string($conn, $_POST["passwordCheck"]); 

    function catchValues(){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['firstName'] = $_POST['first_name'];
        $_SESSION['lastName'] = $_POST['last_name'];
        $_SESSION['phoneNumber'] = $_POST['phone'];
        return  array($_SESSION['email'],$_SESSION['firstName'],$_SESSION['lastName'],$_SESSION['phoneNumber']);
    }

    // list($a,$b,$c,$d) = catchValues();
    $registerErrorMesage = '';
    $dataBaseResponse = '';
    
    if (validateEmail($email)) {
        if($password == $passwordCheck){
            $password = md5($password); 
            if (preg_match ("/^[a-zA-z]*$/", $firstName) ) {  
                if (preg_match ("/^[a-zA-z]*$/", $lastName) ) {  
                    if (preg_match ("/^[0-9]*$/", $phoneNumber) ){  
                        $checkEmail = mysqli_query($conn, "select email from users where email = '$email'");
                        $checkPhone = mysqli_query($conn, "select phone from users where phone = '$phoneNumber'");
                        if(mysqli_num_rows($checkEmail) > 0){ 
                            list($a,$b,$c,$d) = catchValues();
                            $dataBaseResponse = 'Email Already exists'; 
                        } elseif(mysqli_num_rows($checkPhone) > 0){
                            list($a,$b,$c,$d) = catchValues();
                            $dataBaseResponse = 'Phone Already exists'; 
                        } else {
                            $query = "INSERT INTO users(user_role,first_name,last_name,phone,email,password) 
                            VALUES((SELECT user_role FROM user_roles WHERE user_role='User'),'$firstName','$lastName','$phoneNumber','$email','$password')";
                        if(mysqli_query($conn, $query))  
                        {  
                            echo '<script>alert("Registration Done")</script>';  
                        }  
                        }
                    } else {  
                        list($a,$b,$c,$d) = catchValues();
                        $registerErrorMesage =  "Phone Number should contain only numbers";
                    }  
                } else {  
                    list($a,$b,$c,$d) = catchValues();
                    $registerErrorMesage =  "Last name should contain only alphabetical characters";
                }  
            } else {  
                list($a,$b,$c,$d) = catchValues();
                $registerErrorMesage =  "First name should contain only alphabetical characters";
            }  
        } else { 
            list($a,$b,$c,$d) = catchValues(); 
            $registerErrorMesage =  "Passwords does not matches";
        }  
    } else {
        list($a,$b,$c,$d) = catchValues();
        $registerErrorMesage =  "Email is not valid";
    }
} 
function validateEmail($email) {
    // Define a regular expression pattern for email validation
    $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    // Use preg_match to perform the validation
    if (preg_match($pattern, $email)) {
        return true; // Valid email
    } else {
        return false; // Invalid email
    }
}
    ?>
    <!-- PHP CODE END -->

    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="/css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body>
        <!-- Register secction START -->
        <div class="register-area">
            <div class="container">
                <div class="register-area__container">
                    <div class="register-area__container-text">
                        <h2>Comanda Masina Online</h2>
                    </div>

                    <form action="" method="post">
                        <div class="register-area__container__input-field">
                            <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input value="<?php if(isset($a)){ echo $a;}?>" type="email" name="email" placeholder="Email" minlength="5" maxlength="40" required />
                        </div>
                        <div class="register-area__container__input-field">
                            <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Parola" minlength="5" maxlength="40" required />
                        </div>
                        <div class="register-area__container__input-field">
                            <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="passwordCheck" placeholder="Repeta Parola" minlength="5" maxlength="40" required />
                        </div>

                        <div class="register-area__container__input-field">
                            <span><i aria-hidden="true" class="fa fa-user"></i></span>
                            <input value="<?php if(isset($b)){ echo $b;}?>" type="text" name="first_name" placeholder="Nume" minlength="3" maxlength="40" required />
                        </div>

                        <div class="register-area__container__input-field">
                            <span><i aria-hidden="true" class="fa fa-user"></i></span>
                            <input value="<?php if(isset($c)){ echo $c;}?>" type="text" name="last_name" placeholder="Prenume" minlength="3" maxlength="40" required />
                        </div>

                        <div class="register-area__container__input-field">
                            <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                            <input value="<?php if(isset($d)){ echo $d;}?>" type="text" name="phone" placeholder="Telefon de Contact" minlength="8" maxlength="10" required />
                        </div>

                        <p><?php if (!empty($registerErrorMesage)) {
                        echo $registerErrorMesage;
                    }?></p>
                        <p><?php if (!empty($dataBaseResponse)) {
                        echo $dataBaseResponse;
                    }?></p>
                        <input class="button" name="submit" type="submit" value="Register" />
                        <p align="center"><a href="login.php">Login</a></p>
                    </form>

                </div>
            </div>
        </div>
        <!-- Register secction END -->



    </body>

    </html>