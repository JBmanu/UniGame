<?php foreach($templateParams["prodotti_search"] as $prodotto): $array=$dbh->getCategorybySub($prodotto["Id_sottocategoria"]);?>
    <section class="card_simple  space_bottom_margin_card">
        <a href="./item/item<?php 
                    if($array[0]["Nome"] == "PS" || $array[0]["Nome"] == "PC"):
                        echo $array[0]["Nome"]; 
                    else: 
                        echo ucfirst(strtolower($array[0]["Nome"])); 
                    endif; ?>.php?idItem=<?php echo $prodotto["Id_prodotto"]; ?> "><img class="img_item_scroll  curve_obj_h20" src="<?php echo UPLOAD_DIR_DETAILS_ORDINE.$prodotto["Url_immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" /></a>
        <div class="cntnr_info_type  circle_obj  bg_light_theme_<?php echo $array[0]["Nome"] ?>  force_flex_center">
            <img class="icon_info_type" src="<?php
                                echo UPLOAD_DIR_TIPO_DEVIDE_LOG_REGISTER.$array[0]["Icona"];
                        ?>" alt="Playstation" />
        </div>
        <img class="btn_overlay_bottom_left  heart_icon  circle_obj " src="../img/item/heart-empty.svg"  alt="heart" />
    </section>
<?php endforeach; ?>