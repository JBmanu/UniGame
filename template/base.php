<!DOCTYPE html>
<html lang="it">
    <head>
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title>Uni-videogame</title>
        <link rel="stylesheet" href="css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="css/effectStyle.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="css/listItemStyle.css" type="text/css"/>
        <link rel="stylesheet" href="css/index.css" type="text/css"/>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="icon" href="./img/unigame.jpeg" type="image/jpeg">
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="./js/notify.js" type="text/javascript"></script>
        <script src="./js/click.js" type="text/javascript"></script>
        <script src="./js/autoScroll.js" type="text/javascript" defer="defer"></script>
    </head>
    <body class="body-home">
        <header>
            <div class="topnav" id="myTopnav">
                <a href="./index.html" class="active">UniGame</a>
                <a href="./page/login.html"><img src="./img/menu/user.svg" alt="Login" /> Login</a>
                <a href="./page/listCart.html"><img src="./img/menu/carrello.svg" alt="Carrello" /> Carrello</a>
                <a href="./page/listWish.html"><img src="./img/menu/wishlist.svg" alt="Wishlist" /> Wishlist</a>
                <a href="./page/Ordini.html"><img src="./img/menu/ordini.svg" alt="Ordini" /> Ordini</a>
                <a href="./page/notification.html"><img src="./img/menu/notifiche.svg" alt="Notifiche" /> Notifiche</a>
                <a href="./index.html"><img src="./img/menu/logout.svg" alt="Logout" /> Logout</a>
                <a href="#" class="icon">
                    <img src="./img/menu/menu.svg" alt="Menu" />
                </a>
            </div>
        </header>

        <section class="cntnr_search  curve_obj_h50  bg_color_third margin_top_big">
            <input class="input_search" id="Search" type="text" placeholder="Search"/>
            <label class="label_search" for="Search">
                <img class="icon_big" src="./img/menu/search.svg" alt="search" />
            </label>
        </section>

        <div class="cntnr_scroll_horizontal_item margin_top_medium">
          
            <?php foreach($templateParams["giochi_scontati"] as $gioco_scontato): ?>

                <div class="cntnr_item_scroll">
                    <a href="./page/item.html"><img class="img_item_scroll  curve_obj_h20" src="<?php echo UPLOAD_DIR_INDEX.$gioco_scontato["Url_immagine"]; ?>" alt="TLOU2" /></a>
                    <p class="real_price_item  force_flex_center  font_secondary  curve_obj_h20  force_flex_center  bg_third  fg_text_primary"><?php echo $gioco_scontato["Prezzo"]; ?>€</p>
                    <strong class="discount_price_item  force_flex_center  font_secondary  curve_obj_h20  force_flex_center  bg_third  fg_text_primary"><?php echo $gioco_scontato["Prezzo_scontato"]; ?>€</strong>
            
                    <div class="cntnr_info_used curve_obj_h15  bg_new  force_flex_center">
                        <p class="fg_text_white  font_primary"><?php 
                        if($gioco_scontato["Nuovo"]==1){
                            echo "Nuovo";
                        } else{
                            echo "Usato";
                        } 
                        ?></p>
                    </div>

                    <div class="cntnr_info_type  circle_obj  bg_light_theme_PS  force_flex_center">
                        <img class="icon_info_type" src="<?php 
                            $array=$dbh->getCategorybySub($gioco_scontato["Id_sottocategoria"]);
                            foreach($array as $array_gioco):
                                var_dump($array_gioco);
                            endforeach;
                        ?>" alt="Playstation">
                    </div>
                </div>
                    
            <?php endforeach; ?>

        </div>

        <nav class="nav-home">
            <ul>
                <li class="playstation"><a href="./page/listItem/listItemPS.html"><img src="./img/typeGame/ps.svg" alt="Playstation"/></a></li>
                <li class="xbox"><a href="./page/listItem/listItemXbox.html"><img src="./img/typeGame/xbox.svg" alt="Xbox"/></a></li>
                <li class="nintendo"><a href="./page/listItem/listItemSwitch.html"><img src="./img/typeGame/nintendo.svg" alt="Nintendo"/></a></li>
                <li class="pc"><a href="./page/listItem/listItemPC.html"><img src="./img/typeGame/pc.svg" alt="PC"/></a></li>
            </ul>
        </nav>
        
    </body>
</html>