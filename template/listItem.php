<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title>Uni-videogame</title>
        <link rel="stylesheet" href="../../css/baseStyle.css" type="text/css"/>
        <link rel="icon" href="../../img/unigame.jpeg" type="image/jpeg">
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/manuStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/effectStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/toastr.min.css">

        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/toastr.min.js"></script>
        <script src="../../js/notify.js" type="text/javascript" defer="defer"></script>
        <script src="../../js/click.js" type="text/javascript" defer="defer"></script>
        <script src="../../js/flipCard.js"  type="text/javascript" defer="defer"></script>
    </head>


    <body> 
        <?php 
            require($srcPageBase["NavBar"]); 
            require($srcPageBase["NavBtn"]);
            require($srcPageBase["NavSearch"]);
        ?>

        <section class="cntnr_bar_list_card  space_top_margin_small <?php echo $colorPage; ?>">
            <div class="bar_obj_left  curve_obj_h15 ">
                <form action="#" method="post">
                    <label for="order">
                        <select class="minimal" name="order" id="order">
                            <option value="crescente">Prezzo Crescente</option>
                            <option value="decrescente">Prezzo Decrescente</option>
                        </select>
                    </label>
                </form>
            </div>

            <div class="bar_obj_center  force_flex_center  curve_obj_h15">
                <img class="icon_theme" src=" <?php echo $iconTypePage; ?>" alt=" <?php echo $altIcon; ?>"/>
            </div>

            <div class="bar_obj_right  force_flex_center  curve_obj_h15">
                <form action="#" method="post">
                    <label for="order1">
                        <select class="minimal" name="order" id="order1">
                            <option value="crescente">Tutti</option>
                            <option value="crescente">Da €10 a €50</option>
                            <option value="decrescente">Da €50 a €100</option>
                        </select>
                    </label>
                </form>
            </div>
        </section>

        <main class="cntnr_list_card  space_top_margin_medium">
            <?php foreach($allProducts["items"] as $item) : ?>
                
                <section class="card_simple  curve_obj_h20  space_bottom_margin_card"  id="<?php echo $item["Id_prodotto"];?>">
                    <div class="front_card_flip  curve_obj_h20">
                        <a href="../item/itemPC.html"><img class="curve_obj_h20" src="<?php echo $myLocation."img/game/".$item["Url_immagine"]; ?>" alt="<?php echo $item["Nome"]; ?>" /></a>
                        <strong class="btn_overlay_top_right  font_secondary  curve_obj_h20  force_flex_center  bg_third  fg_text_primary"> <?php echo $item["Prezzo"]."$"; ?> </strong>
                        <img class="btn_overlay_bottom_left  heart_icon  circle_obj " src="
                        <?php
                            if ($item["piace"] != null) {
                                echo $myLocation."img/item/heart-full.svg";
                            } else {
                                echo $myLocation."img/item/heart-empty.svg";
                            }?>" alt="heart" />
                        <img class="btn_overlay_bottom_right  circle_obj  bg_third" src="<?php echo $myLocation?>img/item/add.svg" alt="add" />
                    </div>

                    <form class="back_card_flip  force_flex_center  form_2_by_list  curve_obj_h20  bg_third  fg_text_primary" action="#" method="post">
                        <fieldset class="fieldset_form">
                            <legend><?php echo $item["Nome"]; ?></legend>

                            <?php

                                if( $typeGame == 'xbox' || $typeGame == 'ps') {
                                    require($myLocation."template/form/listItem/double.php");
                                } else {
                                    require($myLocation."template/form/listItem/simple.php");
                                }
                            ?>
                            <input class="btn_submit_card  space_top_margin_big  curve_obj_h15  bg_primary  font_primary  fg_text_white" type="submit" value="Aggiungi"/>
                        </fieldset>
                    </form>
                </section>

            <?php endforeach; ?>
        </main>

    </body> 

</html>