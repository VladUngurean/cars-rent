<?php 
    session_start();
    $_SESSION['role'] = 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">

    <title>Chișinău Dream Cars</title>
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">

</head>
<?php 
    include "save_value.php";
    include "ProcGetExistingCarsToShow.php"; 
?>

<body>
    <p id="top" style="position:absolute; opacity:0;"></p>

    <!-- <button id="sendToSession">Click me</button> -->

    <!-- HTML code -->
    <form id="myForm" action="carRentPage.php" method="GET">
        <input type="hidden" name="car_plate" id="hiddenValue">
    </form>

    <div class="banner__video">
        <video id="bannerVideo" preload="auto" playsinline="" autoplay="" loop="" muted="">
            <source src="/images/backgrounds/videoBanner.mp4" type="video/mp4">
        </video>
    </div>

    <?php include('header.php'); ?>

    <?php  
        echo '<label style="position:absolute; left:20px; bottom:20px;"><a style="color:gray; position:absolute; bottom:40px;" href="logout.php">Logout</a></label>';
        if(!isset($_SESSION["email"])){  
            echo '<p style="color:white; position:absolute; left:20px; bottom:40px;">Session is not active<p/>' ;
        } else { echo '<p style="color:white; position:absolute; bottom:20px;">Session is active <p/>' ; }
    ?>

    <!-- About us secction START -->

    <section class="aboutus-area">
        <div class="aboutus-area-container">
            <div class="aboutus-area-container__el">
                <svg width="283" height="60" viewBox="0 0 283 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M278.901 40.6996H264.921V18.4996H278.901C279.624 18.4996 280.257 18.2306 280.774 17.7132C281.292 17.1957 281.561 16.5631 281.561 15.8396V3.75961C281.561 3.03615 281.292 2.40349 280.774 1.88606C280.257 1.36862 279.624 1.09961 278.901 1.09961H228.181C227.457 1.09961 226.825 1.36861 226.307 1.88606C225.79 2.40351 225.521 3.03617 225.521 3.75961V15.8396C225.521 16.563 225.79 17.1957 226.307 17.7132C226.825 18.2306 227.457 18.4996 228.181 18.4996H242.321V40.6996H228.181C227.457 40.6996 226.825 40.9686 226.307 41.4861C225.79 42.0035 225.521 42.6362 225.521 43.3596V55.4396C225.521 56.163 225.79 56.7957 226.307 57.3132C226.825 57.8306 227.457 58.0996 228.181 58.0996H278.901C279.624 58.0996 280.257 57.8306 280.774 57.3132C281.292 56.7957 281.561 56.1631 281.561 55.4396V43.3596C281.561 42.6362 281.292 42.0035 280.774 41.4861C280.257 40.9686 279.624 40.6996 278.901 40.6996Z" stroke="white" />
                    <path d="M176.537 2.90633L176.537 2.90629L176.532 2.89961C175.642 1.71319 174.457 1.09961 173.012 1.09961H160.052C159.329 1.09961 158.696 1.36862 158.179 1.88606C157.661 2.4035 157.392 3.03616 157.392 3.75961V55.4396C157.392 56.1631 157.661 56.7957 158.179 57.3132C158.696 57.8306 159.329 58.0996 160.052 58.0996H174.932C175.656 58.0996 176.288 57.8306 176.806 57.3132C177.323 56.7957 177.592 56.1631 177.592 55.4396V35.1275L194.135 56.2226C194.135 56.2236 194.136 56.2245 194.137 56.2255C195.073 57.4535 196.28 58.0996 197.732 58.0996H210.612C211.336 58.0996 211.968 57.8306 212.486 57.3132C213.003 56.7957 213.272 56.1631 213.272 55.4396V3.75961C213.272 3.03615 213.003 2.40349 212.486 1.88606C211.968 1.36862 211.336 1.09961 210.612 1.09961H195.732C195.009 1.09961 194.376 1.36861 193.859 1.88606C193.341 2.4035 193.072 3.03616 193.072 3.75961V25.7368L176.537 2.90633Z" stroke="white" />
                    <path d="M106.55 55.0582L106.551 55.0582L106.554 55.0478L108.436 49.7796H127.251L129.133 55.0478L129.132 55.0478L129.136 55.0582C129.507 56.0273 130.028 56.7945 130.722 57.3185C131.42 57.8461 132.257 58.0996 133.203 58.0996H148.323C148.927 58.0996 149.457 57.8931 149.877 57.4732C150.334 57.0164 150.583 56.4661 150.583 55.8396V55.7982L150.577 55.7574L150.497 55.2774L150.49 55.237L150.477 55.1982L133.039 4.08508C132.796 3.30136 132.344 2.61561 131.7 2.02964C130.998 1.39136 130.065 1.09961 128.963 1.09961H106.723C105.621 1.09961 104.689 1.39136 103.987 2.02964L104.317 2.39252L103.987 2.02964C103.343 2.61563 102.891 3.3014 102.648 4.08514L85.2102 55.1982L85.197 55.237L85.1903 55.2774L85.1103 55.7574L85.1035 55.7982V55.8396C85.1035 56.4421 85.3082 56.9835 85.7038 57.445L85.7289 57.4742L85.7581 57.4992C86.2196 57.8948 86.7609 58.0996 87.3634 58.0996H102.483C103.43 58.0996 104.267 57.8461 104.965 57.3185C105.658 56.7945 106.18 56.0273 106.55 55.0582ZM122.824 33.1796H112.862L117.843 18.5874L122.824 33.1796Z" stroke="white" />
                    <path d="M42.1451 56.2173L42.148 56.216C46.2707 54.3716 49.5176 51.8128 51.8687 48.5329C54.2794 45.2446 55.4838 41.4876 55.4838 37.2796C55.4838 32.5051 54.3164 28.5751 51.9389 25.5333C49.5912 22.4764 46.6878 20.3365 43.2332 19.1292C40.2275 18.0147 37.2763 17.4599 34.3826 17.4721L43.6289 4.69271L43.6345 4.68494L43.6398 4.67696C43.9061 4.27745 44.0438 3.83476 44.0438 3.35961C44.0438 2.74239 43.8004 2.21414 43.3382 1.80522C42.9292 1.34298 42.401 1.09961 41.7838 1.09961H25.7038C24.2171 1.09961 23.0252 1.7046 22.1828 2.90053L8.83303 19.7676C8.83282 19.7679 8.8326 19.7682 8.83239 19.7685C3.52005 26.4225 0.803772 32.5311 0.803772 38.0796C0.803772 42.3432 2.03628 46.0794 4.50872 49.2661L4.51133 49.2694C6.97264 52.3871 10.3013 54.7823 14.477 56.4634L14.477 56.4635L14.4843 56.4663C18.7088 58.0911 23.3841 58.8996 28.5038 58.8996C33.5238 58.8996 38.0737 58.0087 42.1451 56.2173ZM32.6948 34.1676L32.6947 34.1677L32.7026 34.1731C33.8949 34.9839 34.4838 36.1068 34.4838 37.5996C34.4838 39.0924 33.8949 40.2154 32.7026 41.0261L32.7026 41.0261L32.6948 41.0316C31.5143 41.8677 30.0471 42.2996 28.2638 42.2996C26.483 42.2996 24.9861 41.8689 23.7489 41.0289C22.6121 40.222 22.0438 39.0994 22.0438 37.5996C22.0438 36.0998 22.6121 34.9773 23.7489 34.1704C24.9861 33.3304 26.483 32.8996 28.2638 32.8996C30.0471 32.8996 31.5143 33.3315 32.6948 34.1676Z" stroke="white" />
                </svg>

                <p>Pe piața de chirie auto din Moldova</p>
            </div>
            <div class="aboutus-area-container__el">
                <svg width="549" height="60" viewBox="0 0 549 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M546.903 42.8857C546.386 42.3682 545.753 42.0992 545.03 42.0992H513.61V38.0592H539.83C540.553 38.0592 541.186 37.7902 541.703 37.2728C542.221 36.7553 542.49 36.1227 542.49 35.3992V24.9992C542.49 24.2758 542.221 23.6431 541.703 23.1257C541.186 22.6082 540.553 22.3392 539.83 22.3392H513.61V18.2992H544.23C544.953 18.2992 545.586 18.0302 546.103 17.5128C546.621 16.9953 546.89 16.3627 546.89 15.6392V4.35922C546.89 3.63576 546.621 3.0031 546.103 2.48567C545.586 1.96822 544.953 1.69922 544.23 1.69922H494.47C493.746 1.69922 493.113 1.96823 492.596 2.48567C492.079 3.0031 491.81 3.63576 491.81 4.35922V56.0392C491.81 56.7627 492.079 57.3953 492.596 57.9128C493.113 58.4302 493.746 58.6992 494.47 58.6992H545.03C545.753 58.6992 546.386 58.4302 546.903 57.9128C547.421 57.3953 547.69 56.7627 547.69 56.0392V44.7592C547.69 44.0358 547.421 43.4031 546.903 42.8857Z" stroke="white" />
                    <path d="M479.094 42.0857C478.577 41.5682 477.944 41.2992 477.221 41.2992H450.441V4.35922C450.441 3.63578 450.172 3.00312 449.654 2.48567C449.137 1.96823 448.504 1.69922 447.781 1.69922H430.501C429.777 1.69922 429.145 1.96822 428.627 2.48567C428.11 3.00312 427.841 3.63578 427.841 4.35922V56.0392C427.841 56.7627 428.11 57.3953 428.627 57.9128C429.145 58.4302 429.777 58.6992 430.501 58.6992H477.221C477.944 58.6992 478.577 58.4302 479.094 57.9128C479.612 57.3953 479.881 56.7627 479.881 56.0392V43.9592C479.881 43.2358 479.612 42.6031 479.094 42.0857Z" stroke="white" />
                    <path d="M372.119 55.6578L372.119 55.6578L372.123 55.6474L374.004 50.3792H392.82L394.701 55.6474L394.701 55.6474L394.705 55.6578C395.076 56.6269 395.597 57.3941 396.291 57.9182C396.989 58.4458 397.825 58.6992 398.772 58.6992H413.892C414.496 58.6992 415.026 58.4927 415.446 58.0728C415.902 57.616 416.152 57.0657 416.152 56.4392V56.3978L416.145 56.357L416.065 55.877L416.059 55.8366L416.045 55.7978L398.608 4.68469C398.365 3.90098 397.913 3.21523 397.268 2.62925C396.566 1.99096 395.634 1.69922 394.532 1.69922H372.292C371.19 1.69922 370.258 1.99096 369.556 2.62925L369.886 2.99213L369.556 2.62925C368.911 3.21523 368.459 3.901 368.217 4.68475L350.779 55.7978L350.766 55.8366L350.759 55.877L350.679 56.357L350.672 56.3978V56.4392C350.672 57.0417 350.877 57.5831 351.273 58.0446L351.298 58.0738L351.327 58.0988C351.788 58.4944 352.33 58.6992 352.932 58.6992H368.052C368.999 58.6992 369.835 58.4458 370.534 57.9182C371.227 57.3941 371.749 56.6269 372.119 55.6578ZM388.393 33.7792H378.431L383.412 19.187L388.393 33.7792Z" stroke="white" />
                    <path d="M340.563 41.2992H326.583V19.0992H340.563C341.287 19.0992 341.919 18.8302 342.437 18.3128C342.954 17.7953 343.223 17.1627 343.223 16.4392V4.35922C343.223 3.63576 342.954 3.0031 342.437 2.48567C341.919 1.96823 341.287 1.69922 340.563 1.69922H289.843C289.12 1.69922 288.487 1.96822 287.97 2.48567C287.452 3.00312 287.183 3.63578 287.183 4.35922V16.4392C287.183 17.1627 287.452 17.7953 287.97 18.3128C288.487 18.8302 289.12 19.0992 289.843 19.0992H303.983V41.2992H289.843C289.12 41.2992 288.487 41.5682 287.97 42.0857C287.452 42.6031 287.183 43.2358 287.183 43.9592V56.0392C287.183 56.7627 287.452 57.3953 287.97 57.9128C288.487 58.4302 289.12 58.6992 289.843 58.6992H340.563C341.287 58.6992 341.919 58.4302 342.437 57.9128C342.954 57.3953 343.223 56.7627 343.223 56.0392V43.9592C343.223 43.2358 342.954 42.6031 342.437 42.0857C341.919 41.5682 341.287 41.2992 340.563 41.2992Z" stroke="white" />
                    <path d="M275.188 42.0857C274.671 41.5682 274.038 41.2992 273.315 41.2992H246.535V4.35922C246.535 3.63578 246.266 3.00312 245.748 2.48567C245.231 1.96823 244.598 1.69922 243.875 1.69922H226.595C225.871 1.69922 225.238 1.96822 224.721 2.48567C224.204 3.00312 223.935 3.63578 223.935 4.35922V56.0392C223.935 56.7627 224.204 57.3953 224.721 57.9128C225.238 58.4302 225.871 58.6992 226.595 58.6992H273.315C274.038 58.6992 274.671 58.4302 275.188 57.9128C275.706 57.3953 275.975 56.7627 275.975 56.0392V43.9592C275.975 43.2358 275.706 42.6031 275.188 42.0857Z" stroke="white" />
                    <path d="M204.626 41.2992H190.646V19.0992H204.626C205.349 19.0992 205.982 18.8302 206.499 18.3128C207.017 17.7953 207.286 17.1627 207.286 16.4392V4.35922C207.286 3.63576 207.017 3.0031 206.499 2.48567C205.982 1.96823 205.349 1.69922 204.626 1.69922H153.906C153.182 1.69922 152.55 1.96822 152.032 2.48567C151.515 3.00311 151.246 3.63577 151.246 4.35922V16.4392C151.246 17.1627 151.515 17.7953 152.032 18.3128C152.55 18.8302 153.182 19.0992 153.906 19.0992H168.046V41.2992H153.906C153.182 41.2992 152.55 41.5682 152.032 42.0857C151.515 42.6031 151.246 43.2358 151.246 43.9592V56.0392C151.246 56.7627 151.515 57.3953 152.032 57.9128C152.55 58.4302 153.182 58.6992 153.906 58.6992H204.626C205.349 58.6992 205.982 58.4302 206.499 57.9128C207.017 57.3953 207.286 56.7627 207.286 56.0392V43.9592C207.286 43.2358 207.017 42.6031 206.499 42.0857C205.982 41.5682 205.349 41.2992 204.626 41.2992Z" stroke="white" />
                    <path d="M140.211 2.48567C139.693 1.96823 139.061 1.69922 138.337 1.69922H87.4571C86.7337 1.69922 86.101 1.96822 85.5836 2.48567C85.0661 3.00311 84.7971 3.63577 84.7971 4.35922V56.0392C84.7971 56.7627 85.0661 57.3953 85.5836 57.9128C86.101 58.4302 86.7337 58.6992 87.4571 58.6992H104.737C105.461 58.6992 106.093 58.4302 106.611 57.9128C107.128 57.3953 107.397 56.7627 107.397 56.0392V40.6992H133.137C133.861 40.6992 134.493 40.4302 135.011 39.9128C135.528 39.3953 135.797 38.7627 135.797 38.0392V25.9592C135.797 25.2358 135.528 24.6031 135.011 24.0857C134.493 23.5682 133.861 23.2992 133.137 23.2992H107.397V19.1792H138.337C139.061 19.1792 139.693 18.9102 140.211 18.3928C140.728 17.8753 140.997 17.2427 140.997 16.5192V4.35922C140.997 3.63577 140.728 3.00311 140.211 2.48567Z" stroke="white" />
                    <path d="M23.1602 28.0002L23.158 28.0019C18.6965 31.4011 11.9391 35.9511 2.87737 41.6547C1.85943 42.2774 1.1605 43.0312 0.900212 43.9423C0.673733 44.7349 0.560974 45.5546 0.560974 46.3996V56.2396C0.560974 56.9631 0.829978 57.5957 1.34742 58.1132C1.86486 58.6306 2.49753 58.8996 3.22097 58.8996H51.461C52.1844 58.8996 52.8171 58.6306 53.3345 58.1132C53.852 57.5957 54.121 56.9631 54.121 56.2396V44.1596C54.121 43.4362 53.852 42.8035 53.3345 42.2861C52.8171 41.7686 52.1844 41.4996 51.461 41.4996H32.0724L32.616 41.1372C32.6162 41.1371 32.6164 41.1369 32.6166 41.1368C36.9938 38.2542 40.446 35.8195 42.9682 33.8341C45.561 31.8352 47.7027 29.6413 49.3875 27.2507C51.1491 24.8274 52.041 22.2202 52.041 19.4396C52.041 13.6008 49.9862 9.04516 45.8468 5.84409C41.7232 2.65513 35.7019 1.09961 27.861 1.09961C22.5844 1.09961 17.9572 1.90716 13.9909 3.53714C10.0237 5.16752 6.92978 7.51505 4.73411 10.589L4.73311 10.5904C2.58731 13.6165 1.52097 17.1599 1.52097 21.1996C1.52097 21.8621 1.75706 22.4573 2.20469 22.9689L2.22664 22.9939L2.25172 23.0159C2.76329 23.4635 3.35848 23.6996 4.02097 23.6996H20.261H20.2616H20.2622H20.2629H20.2635H20.2641H20.2648H20.2654H20.2661H20.2667H20.2673H20.268H20.2687H20.2693H20.27H20.2706H20.2713H20.272H20.2726H20.2733H20.274H20.2746H20.2753H20.276H20.2767H20.2774H20.278H20.2787H20.2794H20.2801H20.2808H20.2815H20.2822H20.2829H20.2836H20.2843H20.2851H20.2858H20.2865H20.2872H20.2879H20.2887H20.2894H20.2901H20.2908H20.2916H20.2923H20.293H20.2938H20.2945H20.2953H20.296H20.2968H20.2975H20.2983H20.299H20.2998H20.3006H20.3013H20.3021H20.3029H20.3036H20.3044H20.3052H20.306H20.3068H20.3075H20.3083H20.3091H20.3099H20.3107H20.3115H20.3123H20.3131H20.3139H20.3147H20.3155H20.3163H20.3172H20.318H20.3188H20.3196H20.3204H20.3213H20.3221H20.3229H20.3238H20.3246H20.3254H20.3263H20.3271H20.328H20.3288H20.3297H20.3305H20.3314H20.3322H20.3331H20.3339H20.3348H20.3357H20.3366H20.3374H20.3383H20.3392H20.3401H20.3409H20.3418H20.3427H20.3436H20.3445H20.3454H20.3463H20.3472H20.3481H20.349H20.3499H20.3508H20.3517H20.3526H20.3536H20.3545H20.3554H20.3563H20.3572H20.3582H20.3591H20.36H20.361H20.3619H20.3629H20.3638H20.3647H20.3657H20.3666H20.3676H20.3686H20.3695H20.3705H20.3714H20.3724H20.3734H20.3743H20.3753H20.3763H20.3773H20.3782H20.3792H20.3802H20.3812H20.3822H20.3832H20.3842H20.3852H20.3862H20.3872H20.3882H20.3892H20.3902H20.3912H20.3922H20.3932H20.3943H20.3953H20.3963H20.3973H20.3984H20.3994H20.4004H20.4015H20.4025H20.4035H20.4046H20.4056H20.4067H20.4077H20.4088H20.4098H20.4109H20.412H20.413H20.4141H20.4152H20.4162H20.4173H20.4184H20.4195H20.4205H20.4216H20.4227H20.4238H20.4249H20.426H20.4271H20.4282H20.4293H20.4304H20.4315H20.4326H20.4337H20.4348H20.4359H20.437H20.4382H20.4393H20.4404H20.4415H20.4427H20.4438H20.4449H20.4461H20.4472H20.4483H20.4495H20.4506H20.4518H20.4529H20.4541H20.4552H20.4564H20.4576H20.4587H20.4599H20.4611H20.4622H20.4634H20.4646H20.4658H20.4669H20.4681H20.4693H20.4705H20.4717H20.4729H20.4741H20.4753H20.4765H20.4777H20.4789H20.4801H20.4813H20.4825H20.4837H20.4849H20.4862H20.4874H20.4886H20.4898H20.4911H20.4923H20.4935H20.4948H20.496H20.4972H20.4985H20.4997H20.501H20.5022H20.5035H20.5047H20.506H20.5073H20.5085H20.5098H20.5111H20.5123H20.5136H20.5149H20.5161H20.5174H20.5187H20.52H20.5213H20.5226H20.5239H20.5252H20.5265H20.5278H20.5291H20.5304H20.5317H20.533H20.5343H20.5356H20.5369H20.5383H20.5396H20.5409H20.5422H20.5436H20.5449H20.5462H20.5476H20.5489H20.5502H20.5516H20.5529H20.5543H20.5556H20.557H20.5583H20.5597H20.5611H20.5624H20.5638H20.5652H20.5665H20.5679H20.5693H20.5707H20.572H20.5734H20.5748H20.5762H20.5776H20.579H20.5804H20.5818H20.5832H20.5846H20.586H20.5874H20.5888H20.5902H20.5916H20.593H20.5945H20.5959H20.5973H20.5987H20.6002H20.6016H20.603H20.6045H20.6059H20.6073H20.6088H20.6102H20.6117H20.6131H20.6146H20.616H20.6175H20.619H20.6204H20.6219H20.6234H20.6248H20.6263H20.6278H20.6293H20.6307H20.6322H20.6337H20.6352H20.6367H20.6382H20.6397H20.6412H20.6427H20.6442H20.6457H20.6472H20.6487H20.6502H20.6517H20.6532H20.6548H20.6563H20.6578H20.6593H20.6609H20.6624H20.6639H20.6655H20.667H20.6686H20.6701H20.6716H20.6732H20.6747H20.6763H20.6779H20.6794H20.681H20.6825H20.6841H20.6857H20.6872H20.6888H20.6904H20.692H20.6936H20.6951H20.6967H20.6983H20.6999H20.7015H20.7031H20.7047H20.7063H20.7079H20.7095H20.7111H20.7127H20.7143H20.7159H20.7176H20.7192H20.7208H20.7224H20.7241H20.7257H20.7273H20.7289H20.7306H20.7322H20.7339H20.7355H20.7372H20.7388H20.7405H20.7421H20.7438H20.7454H20.7471H20.7488H20.7504H20.7521H20.7538H20.7554H20.7571H20.7588H20.7605H20.7622H20.7638H20.7655H20.7672H20.7689H20.7706H20.7723H20.774H20.7757H20.7774H20.7791H20.7808H20.7825H20.7843H20.786H20.7877H20.7894H20.7911H20.7929H20.7946H20.7963H20.7981H20.7998H20.8015H20.8033H20.805H20.8068H20.8085H20.8103H20.812H20.8138H20.8155H20.8173H20.8191H20.8208H20.8226H20.8244H20.8262H20.8279H20.8297H20.8315H20.8333H20.8351H20.8368H20.8386H20.8404H20.8422H20.844H20.8458H20.8476H20.8494H20.8512H20.8531H20.8549H20.8567H20.8585H20.8603H20.8621H20.864H20.8658H20.8676H20.8695H20.8713H20.8731H20.875H20.8768H20.8787H20.8805H20.8823H20.8842H20.8861H20.8879H20.8898H20.8916H20.8935H20.8954H20.8972H20.8991H20.901C21.2483 23.6996 21.575 23.6707 21.879 23.6099L21.9096 23.6038L21.9391 23.594C22.4466 23.4248 22.7738 23.013 22.9672 22.5002C23.0922 22.1854 23.2314 21.6153 23.3881 20.8336C23.5826 20.1132 23.947 19.4049 24.4941 18.7085C24.9422 18.1382 25.7925 17.7796 27.221 17.7796C28.4699 17.7796 29.0534 18.0734 29.2791 18.428L29.285 18.4373L29.2914 18.4463C29.5814 18.8607 29.761 19.5158 29.761 20.4796C29.761 21.2264 29.2963 22.2357 28.1816 23.5339C27.0817 24.8149 25.4137 26.3034 23.1602 28.0002Z" stroke="white" />
                </svg>

                <p>În Chișinău și bălți</p>
            </div>
            <div class="aboutus-area-container__el">
                <svg width="123" height="60" viewBox="0 0 123 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M90.7246 28.0002L90.7223 28.0019C86.2608 31.4011 79.5035 35.9511 70.4417 41.6547C69.4238 42.2774 68.7248 43.0312 68.4645 43.9423C68.2381 44.7349 68.1253 45.5546 68.1253 46.3996V56.2396C68.1253 56.9631 68.3943 57.5957 68.9118 58.1132C69.4292 58.6306 70.0619 58.8996 70.7853 58.8996H119.025C119.749 58.8996 120.381 58.6306 120.899 58.1132C121.416 57.5957 121.685 56.9631 121.685 56.2396V44.1596C121.685 43.4362 121.416 42.8035 120.899 42.2861C120.381 41.7686 119.749 41.4996 119.025 41.4996H99.6367L100.18 41.1372C100.181 41.1371 100.181 41.1369 100.181 41.1368C104.558 38.2542 108.01 35.8195 110.533 33.8341C113.125 31.8352 115.267 29.6413 116.952 27.2507C118.713 24.8274 119.605 22.2202 119.605 19.4396C119.605 13.6008 117.551 9.04516 113.411 5.84409C109.288 2.65513 103.266 1.09961 95.4253 1.09961C90.1487 1.09961 85.5215 1.90716 81.5553 3.53714C77.588 5.16752 74.4941 7.51505 72.2984 10.589L72.2974 10.5904C70.1516 13.6165 69.0853 17.1599 69.0853 21.1996C69.0853 21.8621 69.3214 22.4573 69.769 22.9689L69.791 22.9939L69.8161 23.0159C70.3276 23.4635 70.9228 23.6996 71.5853 23.6996H87.8253H87.8259H87.8266H87.8272H87.8278H87.8285H87.8291H87.8297H87.8304H87.831H87.8317H87.8323H87.833H87.8336H87.8343H87.835H87.8356H87.8363H87.837H87.8376H87.8383H87.839H87.8397H87.8403H87.841H87.8417H87.8424H87.8431H87.8438H87.8445H87.8452H87.8459H87.8466H87.8473H87.848H87.8487H87.8494H87.8501H87.8508H87.8515H87.8523H87.853H87.8537H87.8544H87.8552H87.8559H87.8566H87.8574H87.8581H87.8589H87.8596H87.8604H87.8611H87.8619H87.8626H87.8634H87.8641H87.8649H87.8657H87.8664H87.8672H87.868H87.8688H87.8695H87.8703H87.8711H87.8719H87.8727H87.8735H87.8742H87.875H87.8758H87.8766H87.8774H87.8782H87.8791H87.8799H87.8807H87.8815H87.8823H87.8831H87.8839H87.8848H87.8856H87.8864H87.8873H87.8881H87.8889H87.8898H87.8906H87.8914H87.8923H87.8931H87.894H87.8948H87.8957H87.8966H87.8974H87.8983H87.8991H87.9H87.9009H87.9018H87.9026H87.9035H87.9044H87.9053H87.9062H87.907H87.9079H87.9088H87.9097H87.9106H87.9115H87.9124H87.9133H87.9142H87.9151H87.9161H87.917H87.9179H87.9188H87.9197H87.9207H87.9216H87.9225H87.9234H87.9244H87.9253H87.9262H87.9272H87.9281H87.9291H87.93H87.931H87.9319H87.9329H87.9338H87.9348H87.9358H87.9367H87.9377H87.9387H87.9396H87.9406H87.9416H87.9426H87.9436H87.9445H87.9455H87.9465H87.9475H87.9485H87.9495H87.9505H87.9515H87.9525H87.9535H87.9545H87.9555H87.9566H87.9576H87.9586H87.9596H87.9606H87.9617H87.9627H87.9637H87.9648H87.9658H87.9668H87.9679H87.9689H87.97H87.971H87.9721H87.9731H87.9742H87.9752H87.9763H87.9774H87.9784H87.9795H87.9806H87.9816H87.9827H87.9838H87.9849H87.986H87.987H87.9881H87.9892H87.9903H87.9914H87.9925H87.9936H87.9947H87.9958H87.9969H87.998H87.9991H88.0003H88.0014H88.0025H88.0036H88.0047H88.0059H88.007H88.0081H88.0093H88.0104H88.0115H88.0127H88.0138H88.015H88.0161H88.0173H88.0184H88.0196H88.0207H88.0219H88.0231H88.0242H88.0254H88.0266H88.0277H88.0289H88.0301H88.0313H88.0324H88.0336H88.0348H88.036H88.0372H88.0384H88.0396H88.0408H88.042H88.0432H88.0444H88.0456H88.0468H88.048H88.0493H88.0505H88.0517H88.0529H88.0542H88.0554H88.0566H88.0579H88.0591H88.0603H88.0616H88.0628H88.0641H88.0653H88.0666H88.0678H88.0691H88.0703H88.0716H88.0729H88.0741H88.0754H88.0767H88.0779H88.0792H88.0805H88.0818H88.083H88.0843H88.0856H88.0869H88.0882H88.0895H88.0908H88.0921H88.0934H88.0947H88.096H88.0973H88.0986H88.0999H88.1013H88.1026H88.1039H88.1052H88.1066H88.1079H88.1092H88.1106H88.1119H88.1132H88.1146H88.1159H88.1173H88.1186H88.12H88.1213H88.1227H88.124H88.1254H88.1268H88.1281H88.1295H88.1309H88.1322H88.1336H88.135H88.1364H88.1378H88.1391H88.1405H88.1419H88.1433H88.1447H88.1461H88.1475H88.1489H88.1503H88.1517H88.1531H88.1545H88.156H88.1574H88.1588H88.1602H88.1616H88.1631H88.1645H88.1659H88.1674H88.1688H88.1702H88.1717H88.1731H88.1746H88.176H88.1775H88.1789H88.1804H88.1818H88.1833H88.1848H88.1862H88.1877H88.1892H88.1906H88.1921H88.1936H88.1951H88.1966H88.198H88.1995H88.201H88.2025H88.204H88.2055H88.207H88.2085H88.21H88.2115H88.213H88.2145H88.2161H88.2176H88.2191H88.2206H88.2221H88.2237H88.2252H88.2267H88.2283H88.2298H88.2313H88.2329H88.2344H88.236H88.2375H88.2391H88.2406H88.2422H88.2437H88.2453H88.2469H88.2484H88.25H88.2516H88.2532H88.2547H88.2563H88.2579H88.2595H88.2611H88.2626H88.2642H88.2658H88.2674H88.269H88.2706H88.2722H88.2738H88.2754H88.277H88.2787H88.2803H88.2819H88.2835H88.2851H88.2868H88.2884H88.29H88.2916H88.2933H88.2949H88.2966H88.2982H88.2998H88.3015H88.3031H88.3048H88.3064H88.3081H88.3098H88.3114H88.3131H88.3148H88.3164H88.3181H88.3198H88.3214H88.3231H88.3248H88.3265H88.3282H88.3299H88.3316H88.3332H88.3349H88.3366H88.3383H88.34H88.3417H88.3435H88.3452H88.3469H88.3486H88.3503H88.352H88.3538H88.3555H88.3572H88.3589H88.3607H88.3624H88.3641H88.3659H88.3676H88.3694H88.3711H88.3729H88.3746H88.3764H88.3781H88.3799H88.3816H88.3834H88.3852H88.3869H88.3887H88.3905H88.3923H88.394H88.3958H88.3976H88.3994H88.4012H88.403H88.4048H88.4066H88.4084H88.4102H88.412H88.4138H88.4156H88.4174H88.4192H88.421H88.4228H88.4247H88.4265H88.4283H88.4301H88.432H88.4338H88.4356H88.4375H88.4393H88.4411H88.443H88.4448H88.4467H88.4485H88.4504H88.4522H88.4541H88.456H88.4578H88.4597H88.4616H88.4634H88.4653C88.8126 23.6996 89.1393 23.6707 89.4434 23.6099L89.4739 23.6038L89.5034 23.594C90.011 23.4248 90.3382 23.013 90.5316 22.5002C90.6565 22.1854 90.7957 21.6153 90.9524 20.8336C91.1469 20.1132 91.5113 19.4049 92.0585 18.7085C92.5065 18.1382 93.3568 17.7796 94.7853 17.7796C96.0342 17.7796 96.6178 18.0734 96.8435 18.428L96.8494 18.4373L96.8557 18.4463C97.1457 18.8607 97.3253 19.5158 97.3253 20.4796C97.3253 21.2264 96.8606 22.2357 95.746 23.5339C94.6461 24.8149 92.978 26.3034 90.7246 28.0002Z" stroke="white" />
                    <path d="M32.3719 56.8064L32.372 56.8065L32.377 56.7972L51.8129 20.6447C52.2014 19.9775 52.4859 19.3264 52.659 18.6919C52.8349 18.047 52.9166 17.252 52.9166 16.3204V4.56039C52.9166 3.84236 52.6516 3.21377 52.1417 2.69849C51.6617 2.15729 51.0142 1.90039 50.2566 1.90039H4.09659C3.37314 1.90039 2.74047 2.1694 2.22303 2.68684C1.70559 3.20428 1.43658 3.83694 1.43658 4.56039V16.6404C1.43658 17.3638 1.70559 17.9965 2.22303 18.5139C2.74047 19.0314 3.37314 19.3004 4.09659 19.3004H28.8465L8.61959 55.6774L8.61427 55.687L8.60937 55.6968C8.46407 55.9874 8.39659 56.3054 8.39659 56.6404C8.39659 57.2429 8.60136 57.7843 8.99696 58.2458L9.02199 58.275L9.05119 58.3C9.51272 58.6956 10.0541 58.9004 10.6566 58.9004H28.6566C30.3169 58.9004 31.5835 58.2012 32.3719 56.8064Z" stroke="white" />
                </svg>

                <p>Mașini în atuoparcul nostru</p>
            </div>
        </div>
    </section>
    <!-- About us secction END -->


    <div class="forScrollToTop"></div>
    <a href="#" class="scroll-to-top">

        <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_2058_1288)">
                <path d="M30 60C46.568 60 60 46.568 60 30C60 13.432 46.568 0 30 0C13.432 0 0 13.432 0 30C0 46.568 13.432 60 30 60ZM30 13L46 28.305L35.143 28.305V47H24.858L24.858 28.305L14 28.305L30 13Z" fill="#FEFEFE" fill-opacity="0.1" />
            </g>
        </svg>

    </a>

    <!-- Rent car secction START -->

    <section id="carFilterSelectors" class="search-form-area">
        <main style="width: 100%;">
            <div class="search-form">

                <div class="search-form__text">
                    <h2>Selectează Mașina Potrivtă:</h2>
                </div>

                <div class="search-container">

                    <div class="search__select-options">

                        <div id="renderCarMakeSelect" class="select-options-for-rent"></div>
                        <div id="renderCarTransmissionSelect" class="select-options-for-rent"></div>
                        <div id="renderCarFuelTypeSelect" class="select-options-for-rent"></div>
                        <div id="renderCarBodyTypeSelect" class="select-options-for-rent"></div>
                        <div id="renderCarRentStatusSelect" class="select-options-for-rent"></div>

                    </div>

                </div>
            </div>

            <div class="car-list__container">
                <div class="search-form__text">
                    <h2>Închiriere Mașini</h2>
                </div>
                <div id="car-list-render"></div>
            </div>

            <button class="show-more-cars">
                <p>Vezi mai multe</p>
                <img src="/images/aditionalElements/voidarrow.svg" alt="arrow">
            </button>

        </main>
    </section>
    <!-- Rent car secction END -->

    <!-- Comment secction START -->
    <section class="aditional-info-area">
        <div class="aditional-info-area-container">

            <div class="info-about-bonus-programm">
                <div class="info-about-bonus-programm-container">
                    <p>Card de fidelitate Chișinău Dream Cars</p>
                    <p>Reduceri presonale pâna la 40% doar pentru proprietarii de card</p>
                </div>
            </div>

            <div class="info-about-company">
                <div class="info-about-company-container">
                    <img src="/images/aditionalElements/chisinauDreamCarsText.svg" alt="ChisnauDreamCars">
                    <button class="info-about-company-button"><img src="/images/aditionalElements/bigvoidarrow.svg" alt="arrow">
                        <p>Despre companie</p>
                    </button>
                </div>
            </div>

            <div class="info-about-aditioal-rent-options">
                <div class="info-about-aditioal-rent-options-container">
                    <div class="info-about__aditioal-rent-option">
                        <text>Livrare în raza orașului</text>
                        <img src="/images/icons/mapPointsIcon.svg" alt="mapPoints">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Transport la aeroport</text>
                        <img src="/images/icons/carIcon.svg" alt="aeroport">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Confidențialitate deplină. Nu există înregistrare video sau audio în mașină</text>
                        <img src="/images/icons/confIcon.svg" alt="aeroport">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Livrare extra-program</text>
                        <img src="/images/icons/clockIcon.svg" alt="clock">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Scaunel pentru copil</text>
                        <img src="/images/icons/childIcon.svg" alt="child">
                    </div>

                    <div class="info-about__aditioal-rent-option">
                        <text>Asistență tehnică 24/24</text>
                        <img src="/images/icons/supportIcon.svg" alt="clock">
                    </div>
                </div>
            </div>

            <div class="info-about-contacts">
                <div class="info-about-contacts-container">
                    <h2>Ai întrebări?</h2>
                    <p>Primește consultație telefonică de la expert și ajuor în alegerea aumombilului potrivit:</p>
                    <a href="tel:+37300000000">(+373) 00 000 000</a>
                    <div class="info-about-contacts-buttons">
                        <a class="contacts-button whatsapp" href="https://www.pexels.com/search/cat/" target="_blank">Scrie pe WhatsApp</a>
                        <a class="contacts-button telegram" href="https://www.pexels.com/search/cat/" target="_blank">Scrie pe Telegram</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comment secction END -->

    <?php include('footer.php'); ?>

    <script type='text/javascript' src="/js/filterForCarSelect.js" defer></script>
    <script type='text/javascript' src="/js/main.js" defer></script>
</body>

</html>