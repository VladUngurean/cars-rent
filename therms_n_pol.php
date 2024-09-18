<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chișinău Dream Cars - Therms and Poli</title>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/x-icon" href="/images/logo.svg">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script type='text/javascript' src="/js/main.js" defer></script>
</head>

<body>
    <?php include('./reusable/header.php'); ?>

    <section class="tnp">
        <h1>Termeni și condiții</h1>

        <div class="tnp_container">
            <div class="tnp_left">
                <div class="tnp_left_element">

                    <div class="tnp_left_title">Cerințe față de arendator</div>
                    <div class="tnp_left_req">
                        <div>
                            <p>De la 19 ani</p>
                            <hr>
                            <p>Vârasta</p>
                        </div>
                        <div>
                            <p>De la 1 an</p>
                            <hr>
                            <p>Experiență de conducere</p>
                        </div>
                    </div>
                </div>

                <div class="tnp_left_element">
                    <div class="tnp_left_title">Pentru arendă va fi nevoie:</div>
                    <div class="tnp_left_req bottom">
                        <div>
                            <img src="/images/icons/pasport.svg" alt="">
                            <p>Pașaport</p>
                        </div>
                        <div>
                            <img src="/images/icons/driver_licence.svg" alt="">
                            <p>Permis de conducere</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tnp_right">

                <div class="tnp_right_element">
                    <div class="tnp_right_element_title">Depozit de asigurare</div>
                    <div class="tnp_right_element_text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate provident soluta molestiae quasi alias reprehenderit pariatur rem explicabo iusto iure autem quas ipsa, doloribus porro, maxime dignissimos nam ratione nihil. Aliquid ullam id culpa illo eaque voluptatum voluptas, dolorem ex?
                    </div>
                </div>

                <div class="tnp_right_element">
                    <div class="tnp_right_element_title">Cetățeni străini</div>
                    <div class="tnp_right_element_text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate provident soluta molestiae quasi alias reprehenderit pariatur rem explicabo iusto iure autem quas ipsa, doloribus porro, maxime dignissimos nam ratione nihil. Aliquid ullam id culpa illo eaque voluptatum voluptas, dolorem ex?
                    </div>
                </div>

                <div class="tnp_right_element">
                    <div class="tnp_right_element_title">Livrare/ridicare auto</div>
                    <div class="tnp_right_element_text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate provident soluta molestiae quasi alias reprehenderit pariatur rem explicabo iusto iure autem quas ipsa, doloribus porro, maxime dignissimos nam ratione nihil. Aliquid ullam id culpa illo eaque voluptatum voluptas, dolorem ex?
                    </div>
                </div>

                <div class="tnp_right_element">
                    <div class="tnp_right_element_title">Teritoriul de utilizare</div>
                    <div class="tnp_right_element_text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate provident soluta molestiae quasi alias reprehenderit pariatur rem explicabo iusto iure autem quas ipsa, doloribus porro, maxime dignissimos nam ratione nihil. Aliquid ullam id culpa illo eaque voluptatum voluptas, dolorem ex?
                    </div>
                </div>

                <div class="tnp_right_element">
                    <div class="tnp_right_element_title">Cheltuieli suplimentare</div>
                    <div class="tnp_right_element_text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate provident soluta molestiae quasi alias reprehenderit pariatur rem explicabo iusto iure autem quas ipsa, doloribus porro, maxime dignissimos nam ratione nihil. Aliquid ullam id culpa illo eaque voluptatum voluptas, dolorem ex?
                    </div>
                </div>

                <div class="tnp_right_element">
                    <div class="tnp_right_element_title">Rezervare mașină</div>
                    <div class="tnp_right_element_text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate provident soluta molestiae quasi alias reprehenderit pariatur rem explicabo iusto iure autem quas ipsa, doloribus porro, maxime dignissimos nam ratione nihil. Aliquid ullam id culpa illo eaque voluptatum voluptas, dolorem ex?
                    </div>
                </div>

                <div class="tnp_right_element">
                    <div class="tnp_right_element_title">INTERZIS</div>
                    <div class="tnp_right_element_text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate provident soluta molestiae quasi alias reprehenderit pariatur rem explicabo iusto iure autem quas ipsa, doloribus porro, maxime dignissimos nam ratione nihil. Aliquid ullam id culpa illo eaque voluptatum voluptas, dolorem ex?
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
    $(".tnp_right_element_title").click(function() {
        let $currentText = $(this).next(".tnp_right_element_text");

        $('.tnp_right_element_title').removeClass("show_text");
        if ($currentText.is(":visible")) {
            $currentText.hide(500);
        } else {
            $(".tnp_right_element_text").hide(500);
            $currentText.show(500);
            $(this).addClass("show_text");
        }
    })
    </script>

    <?php include('./reusable/footer.php'); ?>

</body>

</html>