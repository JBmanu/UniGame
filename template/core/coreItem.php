<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title><?php echo $titleUser; ?></title>
        <link rel="stylesheet" href="../../css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/listItemStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/manuStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/effectStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/toastr.min.css">
        <link rel="icon" href="../../img/unigame.jpeg" type="image/jpeg">

        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/toastr.min.js"></script>
        <script src="../../js/notify.js" type="text/javascript"></script>
        <script src="../../js/click.js" type="text/javascript"></script>
        <script src="../../js/item.js" type="text/javascript" defer="defer"></script>
    </head>

    <body>
        <?php 
            require($myLocation."template/nav/baseNavBar.php"); 
            require($myLocation."template/nav/BaseNavBtn.php");
        ?>


        <section class="cntnr_2card  margin_top_big">

            <div class="ctnr_top_card">
                <img class="" src="<?php echo $myLocation."img/game/".$item["Url_immagine"]; ?>" alt="<?php echo $item["Nome"]; ?>" />
                <p class="price_singol_item  curve_obj_h20  font_secondary  bg_third  fg_text_primary"><strong><?php echo $item["prezzo_scontato"]; ?></strong></p>
            </div>

            <div class="ctnr_down_card  <?php echo $gbColorOpacity; ?>">
                <div class="ctnr_btn_item  space_top_margin_medium">
                    <a class="circle_obj  force_flex_center  btn_item_back  bg_third" href="<?php echo $backPage; ?>">
                        <img class="item_icon_secondary" src="../../img/back/<?php echo $imgBack; ?>" alt="back" />
                    </a>
                    <div class="circle_obj  force_flex_center  btn_item_primary  <?php echo $gbColorLight; ?>">
                        <img class="item_icon_primary" src="../../img/typeGame/<?php echo $typeGame; ?>" alt="typeGame" />
                    </div>
                    <div class="force_flex_center  item_pegi">
                        <img src="<?php echo $myLocation."img/pegi/".$item["pegi"];?>" alt="<?php echo $item["pegi"];?>" />
                    </div>
                </div>

                <form class="cntnr_form  force_flex_center  space_top_margin_big  fg_text_white" 
                    action="#" method="post">
                    <fieldset class="fieldset_radio_form">
                        <legend class="legend_fieldset font_legend"><?php echo $item["Nome"]; ?></legend>
                        <?php require($myLocation."template/form/formItem.php"); ?>
                    </fieldset>

                    <button class="btn_submit_item  margin_top_medium curve_obj_h15  bg_primary  font_legend  fg_text_white  force_flex_center">
                        <img class="icon_max" src="../../img/menu/cart.svg" alt="" />
                        <span>Aggiungi</span>
                    </button>
                </form>

                <div class="cntnr_description  font_secondary  fg_text_white">
                    <p class="text_description"><?php echo $item["Descrizione"]; ?></p>
                    <div class="cntnr_footer_description  space_top_margin_big">
                        <p>Data rilascio: <?php echo $item["Data_rilascio"]; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>