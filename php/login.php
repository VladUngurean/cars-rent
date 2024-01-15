<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mda....</title>
</head>

<body>

    <h2>PLEASE LOG IN</h2>
    <div>
        <form action="" method='post'>

            <input type="text" class='field' name='email' placeholder='Email' required> <br>
            <input type="text" class='field' name='password' placeholder='Password' required> <br>
            <button type="submit" class='field' name='login' value='Login'>Log In</button>

        </form>
    </div>

    <?php

if (isset($_POST['login']) && isset($_POST["email"])) {
    $emailLogin = $_POST['email'];
    $passwordLogin = $_POST['password'];
    include "config.php";
    $select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$emailLogin' AND password = '$passwordLogin' ");
    $row = mysqli_fetch_array($select);
    // $run_qry = mysqli_query($conn, $select);
    // if (mysqli_num_rows($run_qry) > 0) {
    //     while ($row = mysqli_fetch_assoc($run_qry)) {
    //         if (password_verify('passwordLogin', $row['password'])) {
    //             $emailLogin = $row['email'];
    //             header("location:test.php");
    //         } else {
    //             echo '<script type = "text/javascript">';
    //             echo 'alert("Invalid email or password")';
    //             echo '</script>';
    //         }
    //     }
    // } 


    if(is_array($row)){
        $_SESSION['email'] = [$row['email']];
        $_SESSION['password'] = password_verify($_POST[$row['password']], $password);
        header("Location:test.php");
    } else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid email or password")';
        echo '</script>';
    }
}
// $password = md5($password."ushallotPAsss!");
?>

</body>

</html>