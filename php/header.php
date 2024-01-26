<!-- Header TOP secction START -->

<section class="header-top-area">
    <div class="container">

        <div class="header__top">

            <!-- Language Select START -->
            <div class="language__container">

                <button class="language__button" type="button">
                    <img src="/images/ro.svg" alt="ro">
                    Română
                </button>

            </div>
            <!-- Language Select END -->

            <div id='user__container'>
                <div class="user__icon__container">

                    <!-- <a href="register.php"> -->
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

                        if(!isset($_SESSION["email"])){  
                            echo '<label><a href="login.php">Login</a></label>';  
                            echo '<label><a href="register.php">Register</a></label>';  
                        } 
                        
                        if(isset($_SESSION["email"])) {
                            // echo $_SESSION["email"];
                            
                            if(mysqli_num_rows($result) > 0) {
                                // If user login is successful, get the user role
                                $userRole = getUserRole($_SESSION["email"]);
                
                                // Store user information in the session
                                $_SESSION['email'] = $_SESSION["email"];
                                $_SESSION['role'] = $userRole;
                
                                // Redirect to the appropriate dashboard or home page
                                if ($userRole === 'User') {
                                    echo '<a href="userProfile.php"> <i class="fa-solid fa-user" style="color: #000000;"></i> </a>';
                                } elseif ($userRole === 'Manager') {
                                    if(!isset($_SESSION["email"])){  
                                        echo 'Session is not active<br>' ;
                                    } else { echo 'Session is active<br>' ; }
                                    echo $userRole.'<a href="managerProfile.php"> <i class="fa-solid fa-user manager" style="color: #000000;"></i> </a>';
                                } elseif ($userRole === 'Courier'){
                                    echo '<a href="courierProfile.php"> <i class="fa-solid fa-user" style="color: #000000;"></i> </a>';
                                } elseif ($userRole === 'Admin'){
                                    echo '<a href="adminProfile.php"> <i class="fa-solid fa-user" style="color: #000000;"></i> </a>';
                                }
                            } else {  
                                    echo '<script>alert("Wrong User Details")</script>';  
                                }

                        }
                    ?>
                    <!-- </a> -->
                </div>
            </div>

        </div>
</section>
<!-- Header TOP secction END -->

<!-- Header MID secction START -->

<section class="header-mid-area">
    <div class="container">
        <div class="header__mid">

            <!-- Header Logo START -->
            <div class="site__logo">
                <a href="#">
                    <img src="/images/logo.png" alt="logo">
                </a>
            </div>
            <!-- Header Logo END -->

        </div>
    </div>
</section>

<!-- Header MID secction END -->

<!-- Header BOT secction START -->
<section class="header-nav-area">

    <div class="container">
        <div class="header__bot">

            <div class="dropdown">
                <button onclick="navDropDownMain()" class="dropbtnMain"></button>
                <div id="dropdownMain" class="dropdown__content-main">
                    <a href="#home">Acasa</a>

                    <button id="secondDropdownBtn" onclick="navDropDownSecond()" class="dropbtnSecond">Alege Masina</button>

                    <div id="dropdownSecond" class="dropdown__content-second">
                        <a href="#about">Chirie SUV</a>
                        <a href="#about">Chirie Hatckback</a>
                        <a href="#about">Chirie Crossovere</a>
                        <a href="#about">Chirie Sedan</a>
                        <a href="#about">Chirie Minivan</a>
                    </div>

                    <a href="#contact">Despre Noi</a>
                    <a href="#contact">Contacte</a>
                </div>
            </div>

        </div>
    </div>

</section>

<!-- Header BOT secction END -->