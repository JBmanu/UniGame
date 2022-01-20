<section class="cntnr_bar_list_card  space_top_margin_small  bg_light_theme_PC">
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
        <img class="icon_theme" src="./img/typeGame/pc.svg" alt="iconPs" />
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

        <section class="card_simple  curve_obj_h20  space_bottom_margin_card">
            <div class="front_card_flip  curve_obj_h20">
                <a href="../item/itemPC.html"><img class="curve_obj_h20" src="<?php echo UPLOAD_DIR_IMGGAME.$item["Url_immagine"]; ?>" alt="The Last of Us 2" /></a>
                <strong class="btn_overlay_top_right  font_secondary  curve_obj_h20  force_flex_center  bg_third  fg_text_primary"> <?php echo $item["Prezzo"]."$"; ?> </strong>
                <img class="btn_overlay_bottom_left  heart_icon  circle_obj " src="./img/item/heart-empty.svg"  alt="heart" />
                <img class="btn_overlay_bottom_right  circle_obj  bg_third" src="./img/item/add.svg" alt="add" />
            </div>
            <form class="back_card_flip  force_flex_center  form_2_by_list  curve_obj_h20  bg_third  fg_text_primary" action="#" method="post">
                <fieldset class="fieldset_form">
                    <legend><?php echo $item["Nome"]; ?></legend>
                    <label class="radio_btn_card " for="usedItem">
                        <input class="circle_obj  radio_circle_card" type="radio" id="usedItem" name="used" value="used"/>
                        <span>Usato</span> 
                    </label>
                    <label class="radio_btn_card " for="newItem">
                        <input class="circle_obj  radio_circle_card" type="radio" id="newItem" name="used" value="new" checked="checked" />
                        <span>Nuovo</span> 
                    </label>
                    <input class="btn_submit_card  space_top_margin_big  curve_obj_h15  bg_primary  font_primary  fg_text_white" type="submit" value="Aggiungi"/>
                </fieldset>
            </form>
        </section>

    <?php endforeach; ?>
    
</main>