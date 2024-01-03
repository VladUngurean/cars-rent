<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Cars Rent</title>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Rubik:wght@300;400&display=swap");
html {
  box-sizing: border-box;
}

*,
*::after,
*::before {
  box-sizing: inherit;
  padding: 0;
  margin: 0;
}

body {
  max-width: 100vw;
  min-width: 320px;
  overflow-x: hidden;
}

a,
li,
div {
  text-decoration: none;
  font-family: "Rubik", sans-serif;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

.header-top-area {
  min-height: 47px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-bottom: 1px solid #ccc;
}
.header-top-area .language__button {
  border: none;
  background-color: transparent;
  display: flex;
  position: relative;
  font-size: 14px;
  font-family: "Rubik", sans-serif;
}
.header-top-area .language__button::after {
  content: "";
  position: absolute;
  right: -10px;
  top: 7px;
  display: inline-block;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  border-top: 0.3em solid;
  border-right: 0.3em solid transparent;
  border-bottom: 0;
  border-left: 0.3em solid transparent;
}
.header-top-area .language__button img {
  width: 16px;
  height: 16px;
  margin: 0 3px 0 0;
}

.header-mid-area {
  margin: 15px 0;
}
.header-mid-area .site__logo {
  width: 75%;
  margin: 0 auto;
}
.header-mid-area .site__logo a img {
  width: 100%;
}

.header-nav-area {
  height: 50px;
  background: #020202 none repeat scroll 0 0;
}

.header__bot {
  width: 100%;
  height: 100%;
  padding: 0 10px;
  display: flex;
  justify-content: start;
  align-items: center;
}

.dropdown {
  width: 100%;
  position: relative;
  display: flex;
  justify-content: start;
  align-items: center;
}
.dropdown a:hover {
  background-color: #ddd;
}

.dropbtnMain {
  position: relative;
  width: 30px;
  height: 20px;
  background-color: transparent;
  border: none;
  cursor: pointer;
}
.dropbtnMain::after {
  content: "";
  width: 30px;
  height: 3px;
  border-radius: 1px;
  background-color: white;
  position: absolute;
  top: 0;
  left: 0;
  box-shadow: 0 8px 0 0 white, 0 16px 0 0 white;
  transition: all ease-in-out 0.3s;
}
.dropbtnMain:hover::after {
  background-color: #8a8a8a;
  box-shadow: 0 8px 0 0 #8a8a8a, 0 16px 0 0 #8a8a8a;
  transition: all ease-in-out 0.3s;
}

.dropdown__content-main {
  display: none;
  position: absolute;
  top: 36px;
  left: 0;
  background-color: #f1f1f1;
  width: 100%;
  overflow: auto;
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.19);
  z-index: 1;
}
.dropdown__content-main > a:first-child {
  border-top: 1px solid #8a8a8a;
}
.dropdown__content-main > a:last-child {
  border-bottom: 1px solid #8a8a8a;
}
.dropdown__content-main > a {
  font-family: "Rubik", sans-serif;
  color: #020202;
  border-top: 1px solid #b9b9b9;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown__content-main > a:hover {
  background-color: #8a8a8a;
  color: white;
  transition: 0.3s ease-in-out;
}

.dropbtnSecond {
  position: relative;
  font-size: medium;
  font-family: "Rubik", sans-serif;
  text-align: start;
  width: 100%;
  display: block;
  background-color: transparent;
  border: none;
  padding: 12px 16px;
  border-top: 1px solid #b9b9b9;
}
.dropbtnSecond::after {
  content: "";
  color: #8a8a8a;
  position: relative;
  float: right;
  right: 0;
  top: 3px;
  padding: 0 0;
  margin-left: 0.255em;
  vertical-align: 0.255em;
  border-top: 0.3em solid transparent;
  border-right: 0.3em solid transparent;
  border-bottom: 0.3em solid transparent;
  border-left: 0.3em solid;
  z-index: 999;
  transition: 0.3s ease-in-out;
}
.dropbtnSecond:hover, .dropbtnSecond:focus {
  transition: 0.3s ease-in-out;
  background-color: #8a8a8a;
  color: white;
}
.dropbtnSecond:hover::after, .dropbtnSecond:focus::after {
  content: "";
  color: #020202;
}

.dropdown__content-second {
  display: none;
  position: relative;
  max-width: calc(100% - 20px);
  left: 20px;
  background-color: #f1f1f1;
  overflow: hidden;
  z-index: 1;
  transition: 0.3s ease-in-out;
}
.dropdown__content-second > a {
  font-family: "Rubik", sans-serif;
  color: #020202;
  border-top: 1px solid #b9b9b9;
  padding: 12px 30px;
  text-decoration: none;
  display: block;
}
.dropdown__content-second > a:hover {
  transition: 0.3s ease-in-out;
  background-color: #8a8a8a;
  color: white;
}

.show {
  display: block;
}

.search-form {
  margin: 70px 0 0 0;
  padding: 0 20px;
}
.search-form-box {
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.39);
  margin-top: 20px;
  padding: 15px 20px;
}
.search-form__text > h2 {
  text-align: center;
  font-size: 30px;
  font-family: "Rubik", sans-serif;
}
.search-form__date {
  text-align: center;
}
.search-form__date > input {
  width: 100%;
  height: 45px;
  border: 2px solid #f0f0ff;
  margin-top: 15px;
  padding: 5px 10px;
}
.search-form__date > input:focus {
  outline: none;
  border: 2px solid #8a8a8a;
}
.search-form__insurance {
  margin-top: 10px;
  text-align: start;
}
.search-form__insurance > p {
  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  font-size: large;
}
.search-form__insurance__labels {
  display: flex;
  flex-direction: column;
}
.search-form__insurance__labels > label {
  margin-top: 10px;
  font-size: medium;
  font-family: "Rubik", sans-serif;
}
.search-form__button {
  margin: 15px 0;
}
.search-form__button > button {
  color: black;
  background: 0 0;
  width: 100%;
  margin: 0;
  border-width: 2px;
  border-style: solid;
  border-color: #8a8a8a;
  position: relative;
  display: block;
  padding: 20px 15px;
  font-family: "Rubik", sans-serif;
  font-weight: 600;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 7px;
  cursor: pointer;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.search-form__button > button::before {
  content: "";
  display: block;
  position: absolute;
  z-index: 999;
  top: -6px;
  left: -6px;
  border-width: 2px 0 0 2px;
  border-color: #8a8a8a;
  box-sizing: border-box;
  border-style: solid;
  width: 10px;
  height: 10px;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.search-form__button > button:hover::before, .search-form__button > button:focus::before {
  height: calc(100% + 12px);
  width: calc(100% + 12px);
}
.search-form__button > button::after {
  content: "";
  display: block;
  position: absolute;
  bottom: -6px;
  right: -6px;
  border-width: 0 2px 2px 0;
  border-color: #8a8a8a;
  box-sizing: border-box;
  border-style: solid;
  width: 10px;
  height: 10px;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.search-form__button > button:hover::after, .search-form__button > button:focus::after {
  height: calc(100% + 12px);
  width: calc(100% + 12px);
}
.search-form__button > button:hover {
  background-color: #8a8a8a;
  color: white;
}

.car-list-area {
  margin-top: 50px;
}
.car-list-area .car-list__container {
  width: 100%;
}
.car-list-area .car-list__container-text {
  width: 100%;
  padding: 0 15px 0 15px;
}
.car-list-area .car-list__container-text > h2 {
  font-weight: 600;
  line-height: 1.2;
  font-size: 2.5rem;
  text-align: center;
  color: #6b6b6b;
}
.car-list-area #car-list-render {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding: 0 20px;
}
.car-list-area #car-list-render .car-list__box {
  text-align: center;
  padding: 10px 10px;
  border: 3px solid #f0f0ff;
  margin-top: 30px;
}
.car-list-area #car-list-render .car-list__box > img {
  max-width: 100%;
  width: 315px;
}
.car-list-area #car-list-render .car-list__box > h4 {
  font-size: 20px;
  color: #001238;
  letter-spacing: 1px;
  margin-top: 10px;
  -webkit-transition: all 0.4s ease 0s;
  transition: all 0.4s ease 0s;
  display: inline-block;
  text-transform: capitalize;
  font-family: Poppins, sans-serif;
  font-weight: 600;
}
.car-list-area #car-list-render .car-list__box-details {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.car-list-area #car-list-render .car-list__box-details__price {
  margin: 15px 0;
  color: #8a8a8a;
}
.car-list-area #car-list-render .car-list__box-details__price > span {
  color: #020202;
  font-weight: 600;
}
.car-list-area #car-list-render .car-list__box-details-tech {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
}
.car-list-area #car-list-render .car-list__box-details-tech__item {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
}
.car-list-area #car-list-render .car-list__box-details-tech__item > img {
  width: 16px;
  height: 16px;
  margin: 0 2px 0 8px;
}
.car-list-area #car-list-render .car-list__box-link {
  position: relative;
  text-align: center;
  background: #020202 none repeat scroll 0 0;
  position: relative;
  z-index: 1;
  overflow: hidden;
  width: 100%;
  margin: 25px auto 0;
  -webkit-transition: all 0.4s ease 0s;
  transition: all 0.4s ease 0s;
}
.car-list-area #car-list-render .car-list__box-link > a {
  display: inline-block;
  text-transform: uppercase;
  height: 40px;
  font-weight: 500;
  color: #fff;
  font-size: 14px;
  line-height: 40px;
  width: 100%;
}
.car-list-area #car-list-render .car-list__box-link > a::after {
  position: absolute;
  content: "";
  width: 58%;
  height: 100%;
  background: #8a8a8a none repeat scroll 0 0;
  right: -36px;
  z-index: -1;
  -webkit-transform: skewX(40deg);
  transform: skewX(40deg);
  -webkit-transition: all 0.4s ease 0s;
  transition: all 0.4s ease 0s;
}

.comment-area__container {
  width: 100%;
  height: 500px;
  padding: 15px 20px;
  background-position: center;
  background-size: cover;
  background-image: url("/api/images/carsList/merc_gle.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  display: flex;
  justify-content: center;
  align-items: flex-start;
}
.comment-area__container-text {
  text-align: center;
  color: white;
  font-size: 27px;
  font-family: "Rubik", sans-serif;
}

.register-area__container {
  background: #fff;
  min-width: 320px;
  max-width: 100%;
  box-sizing: border-box;
  padding: 25px;
  margin: 8% auto 0;
  position: relative;
  z-index: 1;
  border-top: 5px solid #f5ba1a;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
  transform-origin: 50% 0%;
  transform: scale3d(1, 1, 1);
  transition: none;
}
.register-area__container h2 {
  font-size: 1.5em;
  line-height: 1.5em;
  margin: 0;
}
.register-area__container-text {
  text-align: center;
  padding-bottom: 15px;
}
.register-area__container label {
  font-size: 12px;
}
.register-area__container .row {
  margin: 10px -15px;
}
.register-area__container .row > div {
  padding: 0 15px;
  box-sizing: border-box;
}
.register-area__container__input-field {
  position: relative;
  margin-bottom: 15px;
}
.register-area__container__input-field > span {
  position: absolute;
  left: 0;
  top: 0;
  color: #333;
  height: 100%;
  border-right: 1px solid #cccccc;
  text-align: center;
  width: 30px;
}
.register-area__container__input-field > span > i {
  padding-top: 10px;
}
.register-area__container input[type=text], .register-area__container input[type=email], .register-area__container input[type=password] {
  width: 100%;
  padding: 8px 10px 9px 35px;
  height: 35px;
  border: 1px solid #cccccc;
  box-sizing: border-box;
  outline: none;
  transition: all 0.3s ease-in-out;
}
.register-area__container input[type=text]:hover, .register-area__container input[type=email]:hover, .register-area__container input[type=password]:hover {
  background: #fafafa;
}
.register-area__container input[type=text]:focus, .register-area__container input[type=email]:focus, .register-area__container input[type=password]:focus {
  box-shadow: 0 0 2px 1px rgba(255, 0, 0, 0.5);
  border: 1px solid #f5ba1a;
  background: #fafafa;
}
.register-area__container input[type=submit] {
  background: #f5ba1a;
  height: 35px;
  line-height: 35px;
  width: 100%;
  border: none;
  outline: none;
  cursor: pointer;
  color: #fff;
  font-size: 1.1em;
  margin-bottom: 10px;
  transition: all 0.3s ease-in-out;
}
.register-area__container input[type=submit]:hover {
  background: #e1a70a;
}
.register-area__container input[type=submit]:focus {
  background: #e1a70a;
}
.register-area__container input[type=checkbox], .register-area__container input[type=radio] {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}/*# sourceMappingURL=style.css.map */
</style>

</head>

<body>

<?php
    include 'config.php';
    include 'render.php'
?>

    <!-- Header TOP secction START -->
    <section class="header-top-area">
        <div class="container">

            <div class="header__top">

                <!-- Language Select START -->
                <div class="language">

                    <button class="language__button" type="button">
                        <img src="/api/images/ro.svg" alt="ro">
                        Română
                    </button>

                </div>
                <!-- Language Select END -->

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
                        <img src="/api/images/logo.png" alt="logo">
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

    <!-- Search car secction START -->
    <section class="search-form-area">
        <div class="container">
            <div class="search-form">
                <div class="search-form-box">

                    <div class="search-form__text">
                        <h2>Cauta Masina Potrivita</h2>
                    </div>

                    <div class="search-form__date">
                        <input type="text" placeholder="Data Inchirierii">
                        <input type="text" placeholder="Ora Inchirierii">
                        <input type="text" placeholder="Data Returnarii">
                        <input type="text" placeholder="Ora Returnarii">
                    </div>

                    <div class="search-form__insurance">
                        <p>Alege timpul de asigurare</p>
                        <div class="search-form__insurance__labels">

                            <label>
                                <input name="insurance" type="radio">
                                Asigurare simpla RCA
                            </label>
                            <label>
                                <input name="insurance" type="radio">
                                Asigurare Casco
                            </label>
                        </div>

                    </div>

                    <div class="search-form__button">

                        <button type="submit" class="check2">Caută</button>

                    </div>

                </div>
            </div>
    </section>
    <!-- Search car secction END -->

    <!-- Car list secction START -->
    <section class="car-list-area">
        <div class="container">
            <div class="car-list__container">
                <div class="car-list__container-text">
                    <h2>Inchiriere Masini</h2>
                </div>
                <div id="car-list-render"></div>
            </div>
        </div>
    </section>
    <!-- Car list secction END -->

    <!-- Comment secction START -->
    <section class="comment-area">
        <div class="container">
            <div class="comment-area__container">
                <div class="comment-area__container-text">
                    <h3>Recomandarile Clientilor Nostri</h3>
                </div>

                <div class="comment-area__container-comment-carousel">

                </div>
            </div>
        </div>
    </section>
    <!-- Comment secction END -->
    <!-- Register secction START -->

    <div class="register-area">
        <div class="container">
            <div class="register-area__container">
                <div class="register-area__container-text">
                    <h2>Comanda Masina Online</h2>
                </div>
                <form action="php/connect.php" method="post">
                    <div class="register-area__container__input-field">
                        <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="register-area__container__input-field">
                        <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Parola" required />
                    </div>
                    <div class="register-area__container__input-field">
                        <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="Repeta Parola" required />
                    </div>

                    <div class="register-area__container__input-field">
                        <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="firstName" placeholder="Nume" />
                    </div>

                    <div class="register-area__container__input-field">
                        <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="lastName" placeholder="Prenume" required />
                    </div>

                    <div class="register-area__container__input-field">
                        <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                        <input type="text" name="phoneNumber" placeholder="Telefon de Contact" required />
                    </div>

                    <input class="button" type="submit" value="Register" />
                </form>

            </div>
        </div>
    </div>





    <!-- Register secction END -->

    <!-- <script src="/api/js/renderCars.js"></script>
    <script src="/api/js/main.js"></script> -->
</body>

</html>