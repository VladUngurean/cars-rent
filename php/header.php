<!-- Header secction START -->

<section class="header-area">

    <div id="headerArea" class="header__container">

        <div class="header__top">
            <div class="header__left">
                <!-- Logo START -->
                <div class="logo__container">
                    <img src="/images/logo.svg" alt="logo">
                </div>
                <!-- Logo END -->

                <!-- Nav START -->
                <div class="nav__container">
                    <nav>
                        <ul class="nav__ul">
                            <li class="nav__li"><a href="#">Despre noi</a></li>
                            <li class="nav__li"><a href="#">Contacte</a></li>
                            <li class="nav__li"><a href="#">Termeni și condiții</a></li>
                            <li class="nav__li"><a href="#">Recenzii</a></li>
                            <li class="nav__li"><a href="#">Mașini</a></li>
                        </ul>
                    </nav>

                </div>
                <!-- nav END -->
            </div>

            <div class="header__right">
                <!-- language start -->
                <div class="language__container">
                    <p>Rom</p>
                    <p>Eng</p>
                </div>
                <!-- language end -->

                <!-- user login, register start -->
                <div id='user__container'>

                    <?php  
                    include "config.php";
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
                    function getUserData($email) {
                        global $conn;
                        $query = "CALL getUserData('$email')";
                        $result = mysqli_query($conn, $query);
                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            return $row['first_name'];
                        }
                        return null;
                        }

                    if(!isset($_SESSION["email"])){  
                        echo '<div class="login-register-container">';  
                        echo '<a href="login.php">Log in</a>';  
                        echo '<span style="pointer-events:none; color:#FEFEFE; font-size: 18px; margin:0 2px; font-weight: 600;"> / </span>';  
                        echo '<a href="register.php">Register</a>';  
                        echo '</div>';  

                    } elseif(isset($_SESSION["email"])) {

                            $userRole = getUserRole($_SESSION["email"]);
                            $conn->next_result();
                            $firstName = getUserData($_SESSION["email"]);
                            $conn->next_result();
                            // Store user information in the session
                            $_SESSION['email'] = $_SESSION["email"];
                            $_SESSION['role'] = $userRole;
                            $_SESSION['first_name'] = $firstName;
            
                            // Redirect to the appropriate dashboard or home page
                            if ($_SESSION['role'] == 'User' && !empty($_SESSION['first_name'])) {
                                echo '<div class="logged-user">'; 
                                echo '<a href="userProfile.php">' .  $firstName . '<i class="fa-solid fa-user" style="color: #000000; margin-left: 5px"></i> </a>';
                                echo '</div>';  
                            } elseif ($_SESSION['role'] == 'Manager' && !empty($_SESSION['first_name'])) {
                                // else { echo 'Session is active<br>' ; }
                                echo '<div class="logged-user">'; 
                                echo '<a href="managerProfile.php">' .  $firstName . ' <i class="fa-solid fa-user" style="color: #000000;"></i> </a>';
                                echo '</div>';  
                            } elseif ($_SESSION['role'] === 'Courier' && !empty($_SESSION['first_name'])){
                                echo '<div class="logged-user">'; 
                                echo '<a href="courierProfile.php">' .  $firstName . ' <i class="fa-solid fa-user" style="color: #000000;"></i> </a>';
                                echo '</div>';  
                            } elseif ($_SESSION['role'] === 'Admin' && !empty($_SESSION['first_name'])){
                                echo '<div class="logged-user">'; 
                                echo '<a href="adminProfile.php">' .  $firstName . ' <i class="fa-solid fa-user" style="color: #000000;"></i> </a>';
                                echo '</div>';  
                            }

                    } else {  
                        echo '<script>alert("Wrong User Details")</script>';  
                    }
                ?>

                </div>
                <!-- user login, register end -->

                <!-- phone start -->
                <div class="phone__number-container">
                    <a href="tel:+373 00 000 000">
                        <img src="/images/icons/phone.svg" alt="" srcset="">
                        <p>+373 00 000 000</p>
                    </a>
                </div>
                <!-- phone end -->

                <!-- theme switch start -->
                <div class="theme__switch-container">
                    <div class="theme__switch-circle"></div>
                </div>
                <!-- theme switch end -->
            </div>
        </div>

        <div class="header__bottom">
            <h1>Închiriere mașini 24/7 în Chișinău</h1>
            <p>Alege autopacul:</p>
            <div class="park__links">
                <a href="#">Chișinău</a>
                <a href="#">Bălți</a>
            </div>
        </div>

    </div>

</section>

<!-- Header secction END -->