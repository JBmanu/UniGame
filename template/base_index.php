<!DOCTYPE html>
<html lang="it">
    <head>
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title><?php echo $templateParams["titolo"]; ?></title>

        <?php
        if(isset($templateParams["css"])):
        foreach($templateParams["css"] as $css):
        ?>
        <link rel="stylesheet" href="./<?php echo $css; ?>" type="text/css"/>
        <?php
        endforeach;
        endif;
        ?>
        <link rel="icon" href="./img/unigame.jpeg" type="image/jpeg">
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/toastr.min.js"></script>
        <script src="./js/notify.js"></script>
        <script src="./js/click.js" type="text/javascript"></script>
        <script src="./js/autoScroll.js" type="text/javascript" defer="defer"></script>
    </head>
    <body class="body-home">
        <header>
            <div class="topnav" id="myTopnav">
                <a href="./index.php" class="active">UniGame</a>
                <a href="./page/login.php"><img src="./img/menu/user.svg" alt="Login" /> Login</a>
                <a href="./page/cart.php"><img src="./img/menu/carrello.svg" alt="Carrello" /> Carrello</a>
                <a href="./page/wish.php"><img src="./img/menu/wishlist.svg" alt="Wishlist" /> Wishlist</a>
                <a href="./page/Ordini.php"><img src="./img/menu/ordini.svg" alt="Ordini" /> Ordini</a>
                <a href="./page/notification.php"><img src="./img/menu/notifiche.svg" alt="Notifiche" /> Notifiche</a>
                <a href="./page/logout.php"><img src="./img/menu/logout.svg" alt="Logout" /> Logout</a>
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
                <?php  
                        $array=$dbh->getCategorybySub($gioco_scontato["Id_sottocategoria"]);
                    ?>
                <div class="cntnr_item_scroll">
                    <a href="./page/item/item<?php 
                    if($array[0]["Nome"] == "PS" || $array[0]["Nome"] == "PC"):
                        echo $array[0]["Nome"]; 
                    else: 
                        echo ucfirst(strtolower($array[0]["Nome"])); 
                    endif; ?>.php?Id_prodotto=<?php echo $gioco_scontato["Id_prodotto"]; ?>"><img class="img_item_scroll  curve_obj_h20" src="<?php echo UPLOAD_DIR_INDEX.$gioco_scontato["Url_immagine"]; ?>" alt="TLOU2" /></a>
                    <p class="real_price_item  force_flex_center  font_secondary  curve_obj_h20  force_flex_center  bg_third  fg_text_primary"><?php echo $gioco_scontato["Prezzo"]; ?>€</p>
                    <strong class="discount_price_item  force_flex_center  font_secondary  curve_obj_h20  force_flex_center  bg_third  fg_text_primary"><?php echo $gioco_scontato["Prezzo_scontato"]; ?>€</strong>
                    <div class="cntnr_info_used curve_obj_h15  bg_new force_flex_center">
                        <p class="fg_text_white  font_primary">
                            <?php 
                                if($gioco_scontato["Nuovo"]==1):
                                    echo "Nuovo";
                                else:
                                    echo "Usato";
                                endif;
                            ?>
                        </p>
                    </div>
                    <div class="cntnr_info_type  circle_obj bg_light_theme_<?php echo $array[0]["Nome"] ?> force_flex_center">
                        <img class="icon_info_type" src="
                        <?php
                                echo UPLOAD_DIR_TIPO_DEVICE_INDEX.$array[0]["Icona"];
                        ?>" alt="Playstation">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <nav class="nav-home">
            <ul>
            <?php foreach($templateParams["categorie"] as $categoria): ?>
                <li class="<?php echo $categoria["Nome_esteso"]; ?>"><a href="./page/listItem/list<?php 
                    if($categoria["Nome"] == "PS" || $categoria["Nome"] == "PC"):
                        echo $categoria["Nome"]; 
                    else: 
                        echo ucfirst(strtolower($categoria["Nome"])); 
                    endif; ?>.php"><img src="<?php echo UPLOAD_DIR_TIPO_DEVICE_INDEX.$categoria["Icona"]; ?>" alt="<?php echo $categoria["Nome_esteso"]; ?>"/></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        
    </body>
</html>