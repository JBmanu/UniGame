<main class="cntnr_list_card  space_top_margin_medium">
    
    <?php foreach($allProducts["items"] as $item) : ?>

        <section class="card_composed  curve_obj_h20  space_bottom_margin_card">
            <div class="cntnr_left_card_composed">
                <p class="info_game_left_card_composed  curve_obj_h20  bg_opacity_theme_<?php echo $item["categoria"]; ?>  font_secondary  fg_text_white"><?php echo $item["tipo"]; ?></p>
                <img class="curve_obj_h20" src="<?php echo $myLocation."img/game/".$item["Url_immagine"]; ?>" alt="<?php echo $item["Nome"]; ?>" />
            </div>
            <div class="cntnr_right_card_composed">
                <h2 class="title_right_card_composed  force_flex_center  font_primary  fg_text_primary"><strong><?php echo $item["Nome"]?></strong></h2>
                <strong class="price_right_card_composed  curve_obj_h15  font_secondary  bg_third  fg_text_primary"><?php echo $item["prezzo_scontato"]."€";?></strong>
                <form action="#" method="post" class="cntnr_cmd_card_cart"> 
                    <button type="submit" name="meno" value="<?php echo $item["Id_prodotto"]?>" class="less_cmd_card_composed  force_flex_center  curve_obj_h20  fg_text_accent" >-</button>
                    <p class="quantity_card_composed  force_flex_center  curve_obj_h20  bg_third  fg_text_primary"><?php echo $item["Quantità"]; ?></p>
                    <button type="submit" name="piu" value="<?php echo $item["Id_prodotto"]?>" class="plus_cmd_card_composed  force_flex_center  curve_obj_h20  bg_primary  fg_text_white">+</button>
                </form>
            </div>
        </section>
    <?php endforeach; ?>

</main>


<div class="cntnr_pay  bg_third  curve_obj_h50">
    <strong class="title_pay  font_secondary  fg_text_accent ">Metodo Di Pagamento</strong>
    <form class="cntnr_form_method_pay  space_top_margin_big  font_secondary  fg_text_primary" action="#" method="post">
        <fieldset  class="">
            <legend>Pagamento:</legend>
            
            <?php foreach($payMethod as $method) : ?>
                <label class="radio_btn_pay " for="<?php echo $method["Descrizione"]; ?>">
                    <input class="circle_obj  space_bottom_margin_card  radio_circle" type="radio" id="<?php echo $method["Descrizione"]; ?>" name="methodPay" value="<?php echo $method["Id_metodo"]; ?>" checked/>
                    <span><?php echo $method["Descrizione"]; ?></span> 
                </label>
            <?php endforeach; ?>
            <input class="submit_method_pay  space_top_margin_big  curve_obj_h15  font_primary  fg_text_white" type="submit" value="Conferma"/>
        </fieldset>
    </form>
</div>


<button name="pay" value="<?php echo $cost." €"; ?>" class="cntnr_down_btn  curve_obj_h20  font_primary  fg_text_white">
    <p>Paga ora</p>
    <strong><?php echo $cost." €"; ?> </strong>
</button>