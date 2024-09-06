<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chișinău Dream Cars - Contacte</title>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">

    <script type='text/javascript' src="/js/main.js" defer></script>
</head>

<body>
    <style>
    body {
        justify-content: space-between;
    }
    </style>
    <?php include('./reusable/header.php'); ?>

    <section class="contacts_container">
        <h1 class="contacts_title">Contacte</h1>

        <div class="contacts_card_container">
            <div class="contacts_card">
                <div class="contacts_card_title">Număr de telefon</div>
                <a href="tel:+373 00 000 000">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.63913 0.549061L5.63934 0.549003C6.28262 0.373262 6.95311 0.683345 7.23722 1.27772L7.26781 1.35113L9.14272 5.85093L9.14281 5.85113C9.37636 6.41098 9.21523 7.05655 8.74407 7.44173L6.43325 9.3307L6.13053 9.57816L6.29772 9.93161C7.90804 13.336 10.664 16.092 14.0684 17.7023L14.4214 17.8693L14.6689 17.5672L16.5626 15.2564L16.5643 15.2542C16.9437 14.786 17.5925 14.6231 18.1536 14.8572L18.1538 14.8573L22.6536 16.7322L22.6546 16.7326C23.2929 16.9968 23.6333 17.6934 23.451 18.3607L23.4509 18.3609L22.3264 22.4843C22.3263 22.4845 22.3263 22.4847 22.3262 22.4849C22.1604 23.0849 21.616 23.5 20.9991 23.5C9.67885 23.5 0.5 14.3211 0.5 3.00092C0.5 2.38407 0.915015 1.83965 1.51506 1.67381C1.51528 1.67375 1.5155 1.67369 1.51572 1.67363L5.63913 0.549061Z" stroke="white" stroke-opacity="0.8" />
                    </svg>
                    +373 00 000 000
                </a>
            </div>

            <div class="contacts_card">
                <div class="contacts_card_title">E-mail</div>
                <a href="mailto:">Loremipumdolor@gmail.com</a>
            </div>

            <div class="contacts_card">
                <div class="contacts_card_title">Adresa în Chișinău</div>
                <a href="https://maps.app.goo.gl/sJXQF2b6v2kJZpLy6">Chișinău, Lorem ipsum dolor</a>
            </div>

            <div class="contacts_card">
                <div class="contacts_card_title">Adresa în Bălți</div>
                <a href="https://maps.app.goo.gl/sJXQF2b6v2kJZpLy6">Bălți, Lorem ipsum dolor, 13A</a>
            </div>
        </div>

        <div class="contacts_map">
            <div class="contacts_map_buttons">
                <div class="contacts_map_ch">Adresa în Chișinău</div>
                <div class="contacts_map_ch">Adresa în Bălți</div>
            </div>
            <iframe style="width:100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52764.087305644236!2d28.82340750833593!3d47.01690483484894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97c3470a2d9b5%3A0xc74f4ac8ebc6b645!2z0KLRgNC40YPQvNGE0LDQu9GM0L3QsNGPINCQ0YDQutCw!5e0!3m2!1sru!2s!4v1725637372301!5m2!1sru!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <?php include('./reusable/footer.php'); ?>

</body>

</html