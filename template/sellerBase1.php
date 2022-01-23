<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Uni-videogame</title>
        <link rel="icon" href="../../img/unigame.jpeg" type="image/jpeg">
        <link rel="stylesheet" href="css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="css/sellerStyle.css" type="text/css"/>
        <link rel="stylesheet" href="css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="css/effectStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="js/notify.js" type="text/javascript"></script>
        <script src="js/seller.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <div class="topnav">
                <a href="./sellerMain.php">UniGame seller</a>
            </div>
        </header>


        <div class="container_seller  margin_top_big">
            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black"> 
                    <?php
                        
                    ?> 
                </p>
                <p class="force_flex_center  cntnr_text_btn" >Guadagno Giornaliero</p>
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">
                    <?php
                        echo $templateParams["totaleUtenti"][0]["NumeroUtenti"];
                    ?>
                </p>
                <p class="force_flex_center  cntnr_text_btn" >Persone Registrate</p>
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">31</p>
                <p class="force_flex_center  cntnr_text_btn" >Unità vendute oggi</p>
            </div>
        </div>

        <div class="container_seller  margin_top_small">
            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">385</p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite PS</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_PS">
                        <img src="img/typeGame/ps.svg" alt="Playstation" title="Playstation" /> 
                    </div>
                </div>
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">385</p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite Xbox</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_XBOX">
                        <img src="img/typeGame/xbox.svg" alt="Xbox" title="Xbox" /> 
                    </div>
                </div> 
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">385</p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite Switch</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_SWITCH">
                        <img src="img/typeGame/nintendo.svg" alt="Nintendo" title="Nintendo" /> 
                    </div>
                </div>
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">385</p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite PC</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_PC">
                        <img src="img/typeGame/pc.svg" alt="PC" title="PC" /> 
                    </div>
                </div>
            </div>
        </div>

        <div class=" force_flex_center  margin_top_medium">          
            <a href="./sellerList.php" class="cntnr_scritta_lista  force_flex_center  curve_obj_h15  active">
                Lista Prodotti
            </a>
        </div>

        <main class="container_seller accordion  margin_top_medium">

            <section class="cntnr_all_btn  curve_obj_h15   margin_bottom_medium  force_flex_center">

                <section class="cntnr_long_buttons  curve_obj_h15" id="longButtons_1">
                    <div class="left_long_button">
                        <img src="img/menu_seller/add.svg" alt="Add Product" title="Add Product" />
                        <p>Aggiungi un prodotto</p>
                    </div>
                    <div class="expand_button">
                        <img src="img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                    </div>
                </section>
                
                <div class="cntnr_bottom_btn  margin_bottom_medium  margin_top_small ">
                    <form class="" action="add_game" method="post">
                        <div class="insert_name_product">
                            <label class="force_flex_center" for="product_1">Nome prodotto</label>
                            <input name="name_product" id="product_1" type="text" placeholder="Nome" required>
                        </div>

                        <div class="cntnr_checkbox  checkbox_font  margin_top_small">
                            <div class="cntnr_checkbox_family">
                                <label class="check_container" for="1">
                                    <input type="checkbox" id="1" name="categoria_1">PS4
                                </label>
                                <label class="check_container" for="2">
                                    <input type="checkbox" id="2" name="categoria_2">PS5
                                </label>
                            </div>
                            <div class="cntnr_checkbox_family">
                                <label class="check_container" for="3">
                                    <input type="checkbox" id="3" name="categoria_3">Xbox 360
                                </label>
                                <label class="check_container" for="4">
                                    <input type="checkbox" id="4" name="categoria_4">Xbox One
                                </label>
                            </div>
                            <label class="check_container" for="5">
                                <input type="checkbox" id="5" name="categoria_5">Nintendo
                            </label>
                            <label class="check_container" for="6">
                                <input type="checkbox" id="6" name="categoria_6">PC
                            </label>
                        </div>

                        <div class="insert_name_product  margin_top_medium">
                            <label class="force_flex_center" for="product_2">Prezzo</label>
                            <input name="price_product" id="product_2" type="text" placeholder="Inserire prezzo" required>
                        </div>

                        <div class="insert_name_product  margin_top_medium  force_flex_center">
                            <label class="" for="img_articolo">Immagine articolo</label>
                            <input name="img_articolo" id="img_articolo" type="file">
                        </div>
                        <button class="conferma_button  margin_top_medium">Conferma</button>
                    </form>
                </div>
            </section>

            <section class="cntnr_all_btn  curve_obj_h15   margin_bottom_medium  force_flex_center">

            <section class="cntnr_long_buttons  curve_obj_h15" id="longButtons_2">
                <div class="left_long_button">
                    <img src="img/menu_seller/add.svg" alt="Add Product" title="Add Product" />
                    <p>Elimina un prodotto</p>
                </div>
                <div class="expand_button">
                    <img src="img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                </div>
            </section>

            <div class="cntnr_bottom_btn  margin_bottom_medium  margin_top_small">
                <form action="" method="post">
                    <div class="insert_name_product  margin_top_small">
                        <label class="label_name_product  force_flex_center" for="product_3">Id prodotto</label>
                        <input name="id_product" id="product_3" type="text" placeholder="Id" required>
                    </div>

                    <div class="cntnr_checkbox  checkbox_font  margin_top_small">
                        <div class="cntnr_checkbox_family">
                            <label class="check_container" for="1_3">
                                <input type="checkbox" id="1_3" name="categoria_1">PS4
                            </label>
                            <label class="check_container" for="2_3">
                                <input type="checkbox" id="2_3" name="categoria_2">PS5
                            </label>
                        </div>
                        <div class="cntnr_checkbox_family">
                            <label class="check_container" for="3_3">
                                <input type="checkbox" id="3_3" name="categoria_3">Xbox 360
                            </label>
                            <label class="check_container" for="4_3">
                                <input type="checkbox" id="4_3" name="categoria_4">Xbox One
                            </label>
                        </div>
                        <label class="check_container" for="5_3">
                            <input type="checkbox" id="5_3" name="categoria_5">Nintendo
                        </label>
                        <label class="check_container" for="6_3">
                            <input type="checkbox" id="6_3" name="categoria_6">PC
                        </label>
                    </div>
                    <input class="conferma_button  margin_top_medium" type="submit" value="Conferma"></input>
                </form>
            </div>
            </section>

            <section class="cntnr_all_btn  curve_obj_h15   margin_bottom_medium  force_flex_center">
        
            <section class="cntnr_long_buttons  curve_obj_h15" id="longButtons_3">
                <div class="left_long_button">
                    <img src="img/menu_seller/offers.svg" alt="Add Product" title="Add Product" />
                    <p>Inserisci offerta</p>
                </div>
                <div class="expand_button">
                    <img src="img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                </div>
            </section>

            <div class="cntnr_bottom_btn  margin_bottom_medium  margin_top_small">
                <form action="#" method="post">
                    <section class="insert_name_product  margin_top_small">
                        <label class="label_name_product  force_flex_center" for="product_4">Id prodotto</label>
                        <input name="id_product" id="product_4" type="text" placeholder="Id" required>
                    </section>
                    <section class="insert_name_product  margin_top_small">
                        <label class="label_name_product  force_flex_center" for="product_5">Sconto</label>
                        <input name="sconto_product" id="product_5" type="text" placeholder="Sconto" required>
                    </section>
                    
                    <div class="margin_top_small">
                        <input type="radio" id="nuovo" name="type_used" value="Nuovo" checked>
                        <label for="nuovo">Nuovo</label>
                    </div>

                    <div class="cntnr_checkbox  checkbox_font  margin_top_small">
                        <div class="cntnr_checkbox_family">
                            <label class="check_container" for="1_2">
                                <input type="checkbox" id="1_2" name="categoria_1">PS4
                            </label>
                            <label class="check_container" for="2_2">
                                <input type="checkbox" id="2_2" name="categoria_2">PS5
                            </label>
                        </div>
                        <div class="cntnr_checkbox_family">
                            <label class="check_container" for="3_2">
                                <input type="checkbox" id="3_2" name="categoria_3">Xbox 360
                            </label>
                            <label class="check_container" for="4_2">
                                <input type="checkbox" id="4_2" name="categoria_4">Xbox One
                            </label>
                        </div>
                        <label class="check_container" for="5_2">
                            <input type="checkbox" id="5_2" name="categoria_5">Nintendo
                        </label>
                        <label class="check_container" for="6_2">
                            <input type="checkbox" id="6_2" name="categoria_6">PC
                        </label>
                    </div>
                    <button class="conferma_button  margin_top_medium">Conferma</button>
                </form>
            </div>
            </section>

            <section class="cntnr_all_btn  curve_obj_h15   margin_bottom_medium  force_flex_center">

            <section class="cntnr_long_buttons curve_obj_h15 " id="longButtons_4">
                <div class="left_long_button">
                    <img src="img/menu_seller/inventory.svg" alt="Add Product" title="Add Product" />
                    <p>Allerte di inventario</p>
                </div>
                <div class="expand_button">
                    <img src="img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                </div>
            </section>

            <div class="cntn_all_allert cntnr_bottom_btn  margin_bottom_medium  margin_top_small">

                <div class="cntnr_allert  margin_bottom_small  curve_obj_h15">
                    <p class="nameGame">Nome prodotto !!</p>
                    <div class="cntnr_typeIcons"> 
                        <strong  class="cntnr_icon_used bg_new  fg_text_white force_flex_center  curve_obj_h15">Nuovo</strong>
                        <div class="cntnr_icon  force_flex_center  circle_obj">
                            <img class="type_icon" src="../../img/typeGame/ps.svg" alt="">
                        </div>
                        <div class="cntnr_icon  force_flex_center  circle_obj">
                            <img class="type_icon" src="../../img/typeGame/ps.svg" alt="">
                        </div>
                        <div class="cntnr_icon  force_flex_center  circle_obj">
                            <img class="type_icon" src="../../img/typeGame/ps.svg" alt="">
                        </div>
                        <div class="cntnr_icon  force_flex_center  circle_obj">
                            <img class="type_icon" src="../../img/typeGame/ps.svg" alt="">
                        </div>
                    </div>
                </div>

               
                
            </div>
            </section>
        </main>

        <div class="container_seller  margin_top_big  margin_bottom_big">
            <a class="cntnr_btn_footer_exit  seller_footertext  curve_obj_h15" href="../../index.html">
                <div class="icon_big  force_flex_center">
                    <img src="img/menu_seller/exit.svg" alt="Exit" title="Exit" />
                </div>
                <p>Exit</p>
            </a> 
        </div>

    </body>
</html>