<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Uni-videogame</title>
        <link rel="icon" href="img/unigame.jpeg" type="image/jpeg">
        <link rel="stylesheet" href="../css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/fontColorStyle.css" type="text/css">
        <link rel="stylesheet" href="../css/listItemStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/sellerStyle.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="../js/notify.js" type="text/javascript"></script>
        <script src="../js/click.js" type="text/javascript"></script>
        <script src="../js/seller.js" type="text/javascript"></script>
    </head>

    <body>
        <header>
            <div class="topnav">
                <a href="./sellerMain.php">UniGame seller</a>
            </div>
        </header>

        <div class="list_nav  margin_top_big">

            <div class="force_flex_center">
                <div class="searchbox">
                    <label class="force_flex_center  font_primary  fg_text_accent" for="search">Cerca prodotto</label>
                    <input name="search" id="search" type="text" placeholder="Search" required>
                </div>
                <section class="search_button  force_flex_center  curve_obj_h8">
                    <label for="submit">Cerca</label>
                    <input id="submit" type="image" src="../img/menu_seller/search.svg" alt="Cerca"/>
                </section>
            </div>
            
            <div class="force_flex_center cntnr_ID  curve_obj_h15  bg_primary">
                <p class="center_content_flex  ID_text_1">ID</p>
                <p class="center_content_flex  ID_text_2">32233</p>
            </div>
        </div>


        <div class="cntnr_scritta_prodotti1  force_flex_center  margin_top_medium">
            <p>Lista dei Prodotti</p>
        </div>

        <div class="cntnr_scritta_prodotti2">
            <div class="cntnr_column_type">
                <p>Nome Prodotto</p>
                <p>Tipo</p>
                <p>Sconto</p>
            </div>
            <div class="cntnr_column_type">
                <p>Prezzo<p>
                <p>Categoria</p>
                <p>ID</p>
            </div>
        </div>


        <main class="cntnr_lista">

            <?php foreach($templateParams["prodotti_totali"] as $prodotti_totali): ?>

                <section class="cntnr_prodotti  curve_obj_h8">
                    <section class="cntnr_column_type  font_primary">
                        <p class="force_flex_center fg_text_accent">
                            <?php
                                echo $prodotti_totali["Nome"];
                            ?>
                        </p>
                        <strong  class="cntnr_icon_used bg_new  fg_text_white force_flex_center  curve_obj_h15">
                            <?php
                                echo $prodotti_totali["Sconto"];
                            ?>
                        </strong>
                        <p class="force_flex_center fg_text_primary">
                            <?php
                                echo $prodotti_totali["Sconto"];
                            ?>
                        </p>
                    </section>
                    <section class="cntnr_column_type">
                        <p class="force_flex_center font_primary"> 
                            <?php
                                echo $prodotti_totali["Prezzo"];
                            ?>
                        </p>
                        <section class="cntnr_typegame  force_flex_center circle_obj  bg_light_theme_SWITCH">
                            <img src="../img/typeGame/nintendo.svg" alt="Nintendo" title="Nintendo">
                        </section>
                        <p class="force_flex_center  font_primary  fg_text_accent">
                            <?php
                                echo $prodotti_totali["Id_prodotto"];
                            ?>
                        </p>
                    </section>
                </section>

            <?php endforeach; ?>

        </main>

        <div class=" force_flex_center  margin_top_medium">
            <a class=" cntnr_btn_footer_lista  force_flex_center  curve_obj_h15" href="./sellerMain.php">
                <img class="" src="../img/back/backSeller.svg" alt="Go Back" title="Go Back" />
            </a> 
        </div>
    
    </body>

</html>