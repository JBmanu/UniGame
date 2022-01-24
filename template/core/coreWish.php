<main class="cntnr_list_card  space_top_margin_medium">

    <?php foreach($allProducts["wish"] as $item) : ?>
        <section class="card_simple  curve_obj_h20  space_bottom_margin_card" id="<?php echo $item["Id_prodotto"];?>">
            <div class="front_card_flip  curve_obj_h20">
                <a href="<?php echo "item/item".$item["icon"].".php"; ?>?idItem=<?php echo $item["Id_prodotto"] ?>"><img class="curve_obj_h20" src="<?php echo $myLocation."img/game/".$item["Url_immagine"]; ?>" alt="<?php echo $item["Nome"]; ?>"/></a>
                <strong class="btn_overlay_top_right  font_secondary  curve_obj_h20  force_flex_center  bg_third  fg_text_primary">55.00$</strong>
                <img class="btn_overlay_bottom_left  heart_icon  circle_obj " src="../img/item/heart-full.svg"  alt="heart" />
                <img class="btn_overlay_bottom_right  circle_obj  bg_third" src="../img/item/add.svg" alt="add" />
            </div>
            <form class="back_card_flip  force_flex_center  form_2_by_list  curve_obj_h20  bg_third  fg_text_primary" 
            action="../page/wish.php?idItem=<?php echo $item["Nome"]; ?>" method="post">
                <fieldset class="fieldset_form">
                    <legend><?php echo $item["Nome"]; ?></legend>
                    <?php require($myLocation."template/form/double.php"); ?>
                    <input class="btn_submit_card  space_top_margin_big  curve_obj_h15  bg_primary  font_primary  fg_text_white" type="submit" value="Aggiungi"/>
                </fieldset>
            </form>
        </section>

    <?php endforeach; ?>

</main>