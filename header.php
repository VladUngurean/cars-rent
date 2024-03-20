<!-- Header secction START -->

<section class="header-area">

    <div id="headerArea" class="header__container">

        <div class="header__top">
            <div class="header__left">
                <!-- Logo START -->
                <div class="logo__container">
                    <a href="index.php" class="header-register-close-button">
                        <img src="/images/logo.svg" alt="icon">
                    </a>
                </div>
                <!-- Logo END -->

                <!-- Nav START -->
                <nav>
                    <ul class="nav__ul">
                        <li class="nav__li"><a href="#">Despre noi</a></li>
                        <li class="nav__li"><a href="#">Contacte</a></li>
                        <li class="nav__li"><a href="#">Termeni și condiții</a></li>
                        <li class="nav__li"><a href="#">Recenzii</a></li>
                        <li class="nav__li" style="pointer-events:none; border-bottom: 1px solid white;"><a href="#">Mașini</a></li>
                    </ul>
                </nav>
                <!-- nav END -->
            </div>

            <div class="header__right">
                <!-- language start -->
                <div class="language__container">
                    <p class="language-active">Rom</p>
                    <p class="">Eng</p>
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
                            mysqli_next_result($conn);
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
                            mysqli_next_result($conn);
                            return array('first_name' => $row['first_name'], 'last_name' => $row['last_name']);
                        }
                        return null;
                    }

                    if(isset($_SESSION["email"])){
                        $userData = getUserData($_SESSION["email"]);
                        if ($userData) {
                            $_SESSION['first_name'] = $userData['first_name'];
                            $_SESSION['last_name'] = $userData['last_name'];
                        }
                    }

                    if(!isset($_SESSION["email"])){  
                        echo '
                        <div class="login-register-container">
                            <a href="register.php">Sign Up</a>
                            <span style="pointer-events:none; color:#FEFEFE; font-size: 18px; margin:0 2px; font-weight: 600;"> / </span>
                            <a href="login.php">Log in</a>
                        </div>
                        ';  

                    } elseif(isset($_SESSION["email"])) {

                        $userRole = getUserRole($_SESSION["email"]);
                        $conn->next_result();
                        $conn->next_result();
                        // Store user information in the session
                        $_SESSION['email'] = $_SESSION["email"];
                        $_SESSION['role'] = $userRole;
                        $firstName = substr($_SESSION['first_name'], 0, 1);
                        $lastName = substr($_SESSION['last_name'], 0, 1);
                        // Redirect to user role page or home page
                        if ($_SESSION['role'] == 'User' && !empty($_SESSION['first_name'])){
                            echo '<div class="logged-user">
                                    <a href="userProfile.php">
                                        <svg width="24" height="24" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M30 0C13.431 0 0 13.431 0 30C0 46.569 13.431 60 30 60C46.569 60 60 46.569 60 30C60 13.431 46.569 0 30 0ZM19.5 22.5C19.5 21.1211 19.7716 19.7557 20.2993 18.4818C20.8269 17.2079 21.6004 16.0504 22.5754 15.0754C23.5504 14.1004 24.7079 13.3269 25.9818 12.7993C27.2557 12.2716 28.6211 12 30 12C31.3789 12 32.7443 12.2716 34.0182 12.7993C35.2921 13.3269 36.4496 14.1004 37.4246 15.0754C38.3996 16.0504 39.1731 17.2079 39.7007 18.4818C40.2284 19.7557 40.5 21.1211 40.5 22.5C40.5 25.2848 39.3938 27.9555 37.4246 29.9246C35.4555 31.8938 32.7848 33 30 33C27.2152 33 24.5445 31.8938 22.5754 29.9246C20.6062 27.9555 19.5 25.2848 19.5 22.5ZM48.774 44.952C46.5283 47.7769 43.6734 50.0579 40.4225 51.6246C37.1716 53.1914 33.6087 54.0034 30 54C26.3913 54.0034 22.8284 53.1914 19.5775 51.6246C16.3266 50.0579 13.4717 47.7769 11.226 44.952C16.089 41.463 22.725 39 30 39C37.275 39 43.911 41.463 48.774 44.952Z" fill="#FEFEFE" fill-opacity="0.6"/>
                                        </svg>' . $lastName. '.' . $firstName . '.
                                    </a>
                                </div>'; 
                        } elseif ($_SESSION['role'] == 'Manager' && !empty($_SESSION['first_name'])){
                            echo '<div class="logged-user">
                                    <a href="managerProfile.php"> 
                                        <svg width="24" height="24" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M30 0C13.431 0 0 13.431 0 30C0 46.569 13.431 60 30 60C46.569 60 60 46.569 60 30C60 13.431 46.569 0 30 0ZM19.5 22.5C19.5 21.1211 19.7716 19.7557 20.2993 18.4818C20.8269 17.2079 21.6004 16.0504 22.5754 15.0754C23.5504 14.1004 24.7079 13.3269 25.9818 12.7993C27.2557 12.2716 28.6211 12 30 12C31.3789 12 32.7443 12.2716 34.0182 12.7993C35.2921 13.3269 36.4496 14.1004 37.4246 15.0754C38.3996 16.0504 39.1731 17.2079 39.7007 18.4818C40.2284 19.7557 40.5 21.1211 40.5 22.5C40.5 25.2848 39.3938 27.9555 37.4246 29.9246C35.4555 31.8938 32.7848 33 30 33C27.2152 33 24.5445 31.8938 22.5754 29.9246C20.6062 27.9555 19.5 25.2848 19.5 22.5ZM48.774 44.952C46.5283 47.7769 43.6734 50.0579 40.4225 51.6246C37.1716 53.1914 33.6087 54.0034 30 54C26.3913 54.0034 22.8284 53.1914 19.5775 51.6246C16.3266 50.0579 13.4717 47.7769 11.226 44.952C16.089 41.463 22.725 39 30 39C37.275 39 43.911 41.463 48.774 44.952Z" fill="#FEFEFE" fill-opacity="0.6"/>
                                        </svg>'. 'Manager ' . $lastName. '.' . $firstName . '.
                                    </a>
                                </div>'; 
                        } elseif ($_SESSION['role'] === 'Courier' && !empty($_SESSION['first_name'])){
                            echo '<div class="logged-user">
                                    <a href="courierProfile.php">
                                        <svg width="24" height="24" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M30 0C13.431 0 0 13.431 0 30C0 46.569 13.431 60 30 60C46.569 60 60 46.569 60 30C60 13.431 46.569 0 30 0ZM19.5 22.5C19.5 21.1211 19.7716 19.7557 20.2993 18.4818C20.8269 17.2079 21.6004 16.0504 22.5754 15.0754C23.5504 14.1004 24.7079 13.3269 25.9818 12.7993C27.2557 12.2716 28.6211 12 30 12C31.3789 12 32.7443 12.2716 34.0182 12.7993C35.2921 13.3269 36.4496 14.1004 37.4246 15.0754C38.3996 16.0504 39.1731 17.2079 39.7007 18.4818C40.2284 19.7557 40.5 21.1211 40.5 22.5C40.5 25.2848 39.3938 27.9555 37.4246 29.9246C35.4555 31.8938 32.7848 33 30 33C27.2152 33 24.5445 31.8938 22.5754 29.9246C20.6062 27.9555 19.5 25.2848 19.5 22.5ZM48.774 44.952C46.5283 47.7769 43.6734 50.0579 40.4225 51.6246C37.1716 53.1914 33.6087 54.0034 30 54C26.3913 54.0034 22.8284 53.1914 19.5775 51.6246C16.3266 50.0579 13.4717 47.7769 11.226 44.952C16.089 41.463 22.725 39 30 39C37.275 39 43.911 41.463 48.774 44.952Z" fill="#FEFEFE" fill-opacity="0.6"/>
                                        </svg>'. 'Courier ' . $lastName. '.' . $firstName . '.
                                    </a>
                                </div>';
                        } elseif ($_SESSION['role'] === 'Admin' && !empty($_SESSION['first_name'])){
                            echo '<div class="logged-user">
                                    <a href="adminProfile.php">
                                        <svg width="24" height="24" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M30 0C13.431 0 0 13.431 0 30C0 46.569 13.431 60 30 60C46.569 60 60 46.569 60 30C60 13.431 46.569 0 30 0ZM19.5 22.5C19.5 21.1211 19.7716 19.7557 20.2993 18.4818C20.8269 17.2079 21.6004 16.0504 22.5754 15.0754C23.5504 14.1004 24.7079 13.3269 25.9818 12.7993C27.2557 12.2716 28.6211 12 30 12C31.3789 12 32.7443 12.2716 34.0182 12.7993C35.2921 13.3269 36.4496 14.1004 37.4246 15.0754C38.3996 16.0504 39.1731 17.2079 39.7007 18.4818C40.2284 19.7557 40.5 21.1211 40.5 22.5C40.5 25.2848 39.3938 27.9555 37.4246 29.9246C35.4555 31.8938 32.7848 33 30 33C27.2152 33 24.5445 31.8938 22.5754 29.9246C20.6062 27.9555 19.5 25.2848 19.5 22.5ZM48.774 44.952C46.5283 47.7769 43.6734 50.0579 40.4225 51.6246C37.1716 53.1914 33.6087 54.0034 30 54C26.3913 54.0034 22.8284 53.1914 19.5775 51.6246C16.3266 50.0579 13.4717 47.7769 11.226 44.952C16.089 41.463 22.725 39 30 39C37.275 39 43.911 41.463 48.774 44.952Z" fill="#FEFEFE" fill-opacity="0.6"/>
                                        </svg>'. 'Admin ' . $lastName. '.' . $firstName . '.
                                    </a>
                                </div>'; 
                        }

                    } else {  
                        echo '<script>alert("Wrong User Details")</script>';  
                    }
                ?>

                </div>
                <!-- user login, register end -->

                <!-- phone start -->
                <div class="phone__number-container">
                    <a href="tel:+37300000000">
                        <img src="/images/icons/phone.svg" alt="" srcset="">
                        <p> (+373) 00 000 000</p>
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

        <!-- // accounts start -->
        <style>
        .accounts {
            width: 505px;
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 150px;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 15px;
            border-radius: 5px;

            color: black;
            font-family: white, sans-serif;
            font-weight: 500;
            font-size: 18px;
        }

        .accounts-header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }

        .accounts-header>h5 {
            font-family: "Jura", sans-serif;
            font-weight: 600;
            font-size: 22px;
        }

        tr {
            text-align: left;
            font-family: "Jura", sans-serif;
            /* font-weight: 600; */
            font-size: 22px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px
        }

        .accounts-table {
            display: none;
            border-collapse: collapse;
        }

        .show-accounts-table {
            display: block;
        }

        .textToCopy {
            cursor: pointer;
        }
        </style>
        <!-- /* // accounts end */ -->

        <div class="accounts">
            <div class="accounts-header">
                <h5>Accounts:</h5>
                <svg width="31" height="33" viewBox="0 0 31 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.9917 5.12635L22.1864 16.1667L7.9917 27.207" stroke="black" stroke-width="2.36579" />
                </svg>

            </div>
            <table class="accounts-table">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th>Email (click to copy)</th>
                        <th>Password</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Admin</td>
                        <td class="textToCopy">admin@gmail.com</td>
                        <td>112233</td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td class="textToCopy">manager@gmail.com</td>
                        <td>112233</td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td class="textToCopy">user@gmail.com</td>
                        <td>112233</td>
                    </tr>
                </tbody>
            </table>
            <?php
                echo '<label style="position:absolute; left:20px; bottom:-65px;"><a style="color:#fa2f2f; position:absolute; bottom:40px;" href="logout.php">Logout</a></label>';

                if(!isset($_SESSION["email"])){
                    echo '<p style="color:white; position:absolute; left:20px; bottom:-45px;">Session is not active<p/>';
                } else { echo '<p style="color:white; position:absolute; left:20px; bottom:-47px;">Session is active as '. $_SESSION["role"].'<p/>'; }
            ?>
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

    <style>
    .show-accounts-table {
        display: block;
    }
    </style>
    <script>
    let getAccountsTable = document.querySelector(".accounts-table");
    document.querySelector(".accounts-header").onclick = function() {
        getAccountsTable.classList.toggle("show-accounts-table");
    };
    </script>

    <!-- when click on email from table , email will be copied -->
    <script>
    var allInputs = document.querySelectorAll(".textToCopy");
    allInputs.forEach(e => e.addEventListener("click", function() {
        navigator.clipboard.writeText(e.innerHTML);
    }))
    </script>
</section>

<!-- Header secction END -->