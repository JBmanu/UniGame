<div class="container_seller  margin_top_big">
            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black"> 
                    <?php
                        echo $templateParams["TotaleGuadagno"][0]["Result"];
                    ?> 
                </p>
                <p class="seller_bigtext_black">
                    €
                </p>
                <p class="force_flex_center  cntnr_text_btn" >Guadagno Totale</p>
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
                <p class="force_flex_center  seller_bigtext_black">
                    <?php
                        echo $templateParams["TotaleVenditeALL"][0]["Result"];
                    ?>
                </p>
                <p class="force_flex_center  cntnr_text_btn" >Unità Totali</p>
            </div>
        </div>

        <div class="container_seller  margin_top_small">
            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">
                    <?php
                        echo $templateParams["TotaleVenditePS"][0]["Result"];
                    ?>
                </p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite PS</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_PS">
                        <img src="../img/typeGame/ps.svg" alt="Playstation" title="Playstation" /> 
                    </div>
                </div>
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">
                    <?php
                        echo $templateParams["TotaleVenditeXBOX"][0]["Result"];
                    ?>
                </p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite Xbox</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_XBOX">
                        <img src="../img/typeGame/xbox.svg" alt="Xbox" title="Xbox" /> 
                    </div>
                </div> 
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">
                    <?php
                        echo $templateParams["TotaleVenditeNINTENDO"][0]["Result"];
                    ?>
                </p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite Switch</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_SWITCH">
                        <img src="../img/typeGame/nintendo.svg" alt="Nintendo" title="Nintendo" /> 
                    </div>
                </div>
            </div>

            <div class="cntnr_whole  curve_obj_h15">
                <p class="force_flex_center  seller_bigtext_black">
                    <?php
                        echo $templateParams["TotaleVenditePC"][0]["Result"];
                    ?>
                </p>
                <div class="cntnr_seller  seller_undertext_green  force_flex_center">
                    <p class="force_flex_center">Vendite PC</p>
                    <div class="cntnr_icon_theme force_flex_center  bg_light_theme_PC">
                        <img src="../img/typeGame/pc.svg" alt="PC" title="PC" /> 
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
                        <img src="../img/menu_seller/add.svg" alt="Add Product" title="Add Product" />
                        <p>Aggiungi un prodotto</p>
                    </div>
                    <div class="expand_button">
                        <img src="../img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                    </div>
                </section>
                
                <div class="cntnr_bottom_btn  margin_bottom_medium  margin_top_small ">
                    <form class="" action="operazioniProdotto.php?action=1" method="post" enctype="multipart/form-data">
                        <div class="insert_name_product">
                            <label class="force_flex_center" for="name_product">Nome prodotto</label>
                            <input name="name_product" id="name_product" type="text" placeholder="Nome" required>
                        </div>

                        <div class="cntnr_checkbox  checkbox_font  margin_top_small">
                            <div class="cntnr_checkbox_family">
                                <label class="check_container" for="categoria_1">
                                    <input type="checkbox" id="categoria_1" name="categoria_1">PS4
                                </label>
                                <label class="check_container" for="categoria_2">
                                    <input type="checkbox" id="categoria_2" name="categoria_2">PS5
                                </label>
                            </div>
                            <div class="cntnr_checkbox_family">
                                <label class="check_container" for="categoria_4">
                                    <input type="checkbox" id="categoria_4" name="categoria_4">Xbox 360
                                </label>
                                <label class="check_container" for="categoria_3">
                                    <input type="checkbox" id="categoria_3" name="categoria_3">Xbox One
                                </label>
                            </div>
                            <label class="check_container" for="categoria_6">
                                <input type="checkbox" id="categoria_6" name="categoria_6">Nintendo
                            </label>
                            <label class="check_container" for="categoria_5">
                                <input type="checkbox" id="categoria_5" name="categoria_5">PC
                            </label>
                        </div>

                        <div class="insert_name_product  margin_top_medium">
                            <label class="force_flex_center" for="price_product">Prezzo</label>
                            <input name="price_product" id="price_product" type="text" placeholder="Inserire prezzo(.)" required/>
                        </div>
                        <div class="insert_name_product  margin_top_medium">
                            <label class="force_flex_center" for="description">Descrizione</label>
                            <textarea rows="4" cols="35" name="description" id="description" placeholder="Inserire Descrizione"></textarea>
                        </div>

                        <div class="insert_name_product  margin_top_medium">
                            <label class="force_flex_center" for="unita_product">Unità</label>
                            <input name="unita_product" id="unita_product" type="text" placeholder="Inserire Unità (numero)" required/>
                        </div>

                        <div class="insert_name_product  margin_top_medium">
                            <label class="force_flex_center" for="data_product">Data rilascio</label>
                            <input name="date_product" id="date_product" type="date"/>
                        </div>

                        <div class="insert_name_product  margin_top_medium  force_flex_center">
                            <label class="" for="img_articolo">Immagine articolo</label>
                            <input name="img_articolo" id="img_articolo" type="file">
                        </div>
                        
                        <button type="submit" class="conferma_button  margin_top_medium">Conferma</button>
                    </form>
                </div>
            </section>

            <section class="cntnr_all_btn  curve_obj_h15   margin_bottom_medium  force_flex_center">

            <section class="cntnr_long_buttons  curve_obj_h15" id="longButtons_2">
                <div class="left_long_button">
                    <img src="../img/menu_seller/add.svg" alt="Add Product" title="Add Product" />
                    <p>Elimina un prodotto</p>
                </div>
                <div class="expand_button">
                    <img src="../img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                </div>
            </section>

            <div class="cntnr_bottom_btn  margin_bottom_medium  margin_top_small">
                <form class="" action="operazioniProdotto.php?action=2" method="post" enctype="multipart/form-data">
                    <div class="insert_name_product  margin_top_small">
                        <label class="label_name_product  force_flex_center" for="id_product_delete">Id prodotto</label>
                        <input name="id_product_delete" id="id_product_delete" type="text" placeholder="Id" required>
                    </div>
                    <button type="submit" class="conferma_button  margin_top_medium">Elimina</button>
                </form>
            </div>
            </section>

            <section class="cntnr_all_btn  curve_obj_h15   margin_bottom_medium  force_flex_center">
        
            <section class="cntnr_long_buttons  curve_obj_h15" id="longButtons_3">
                <div class="left_long_button">
                    <img src="../img/menu_seller/offers.svg" alt="Add Product" title="Add Product" />
                    <p>Inserisci offerta</p>
                </div>
                <div class="expand_button">
                    <img src="../img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                </div>
            </section>

            <div class="cntnr_bottom_btn  margin_bottom_medium  margin_top_small">
                <form class="" action="operazioniProdotto.php?action=3" method="post" enctype="multipart/form-data">
                    <section class="insert_name_product  margin_top_small">
                        <label class="label_name_product  force_flex_center" for="sconto_id_product">Id prodotto</label>
                        <input name="sconto_id_product" id="sconto_id_product" type="text" placeholder="Id" required>
                    </section>
                    <section class="insert_name_product  margin_top_small">
                        <label class="label_name_product  force_flex_center" for="sconto_product">Sconto</label>
                        <input name="sconto_product" id="sconto_product" type="text" placeholder="Sconto (es 50% = 0.50)" required>
                    </section>

                    <button type="submit" class="conferma_button  margin_top_medium">Conferma</button>
                </form>
            </div>
            </section>

            <section class="cntnr_all_btn  curve_obj_h15   margin_bottom_medium  force_flex_center">

            <section class="cntnr_long_buttons curve_obj_h15 " id="longButtons_4">
                <div class="left_long_button">
                    <img src="../img/menu_seller/inventory.svg" alt="Add Product" title="Add Product" />
                    <p>Allerte di inventario</p>
                </div>
                <div class="expand_button">
                    <img src="../img/menu_seller/vector.svg" alt="Expand Element" title="Expand Element" />
                </div>
            </section>

            <div class="cntn_all_allert cntnr_bottom_btn  margin_bottom_medium  margin_top_small">

                <?php foreach($templateParams["prodotti_allerta"] as $prodotti_allerta): ?>

                    <div class="cntnr_allert  margin_bottom_small  curve_obj_h15">
                        <p class="nameGame">
                            <?php 
                                if (isset ($prodotti_allerta["Nome"])){
                                    echo $prodotti_allerta["Nome"];
                                } 
                            ?>
                        </p>
                        <div class="cntnr_typeIcons"> 
                        <strong  class="cntnr_icon_used bg_new  fg_text_white force_flex_center  curve_obj_h15">
                            <?php 
                                if(count($dbh->getSottocategoriaId($prodotti_allerta["Id_sottocategoria"])) > 0){
                                    $baby = $dbh->getSottocategoriaId($prodotti_allerta["Id_sottocategoria"])[0]["Descrizione"];
                                    if (isset ($baby))
                                    echo $baby; 
                                }
                            ?>
                        </strong>
                            <div class="cntnr_icon  force_flex_center  circle_obj bg_light_theme_
                                <?php echo $prodotti_allerta["Id_sottocategoria"]; ?>">
                                <img class="type_icon" src="<?php 
                                    if(count($dbh->getCategorybySub($prodotti_allerta["Id_sottocategoria"])) > 0){
                                        echo UPLOAD_DIR_TIPO_DEVICE_SELLER.$dbh->getCategorybySub($prodotti_allerta["Id_sottocategoria"])[0]["Icona"]; 
                                    }
                                ?>"
                                <?php
                                    if(count($dbh->getCategorybySub($prodotti_allerta["Id_sottocategoria"])) > 0){
                                        echo"alt=\"";
                                        echo $dbh->getCategorybySub($prodotti_allerta["Id_sottocategoria"])[0]["Nome"];
                                        echo"\"";
                                     } ?>
                                >
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            </section>
        </main>

        <div class="container_seller  margin_top_big  margin_bottom_big">
            <a class="cntnr_btn_footer_exit  seller_footertext  curve_obj_h15">
                <div class="icon_big  force_flex_center">
                    <img src="../img/menu_seller/exit.svg" alt="Exit" title="Exit" />
                </div>
                <p>Exit</p>
            </a> 
        </div>