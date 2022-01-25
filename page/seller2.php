<div class="list_nav  margin_top_big">

    <form action="#" method="post">
        <div class="force_flex_center">
            <div class="searchbox">
                <label class="force_flex_center  font_primary  fg_text_accent" for="search">Cerca prodotto</label>
                <input name="search" id="search" type="text" placeholder="Search" required>
            </div>
            <section class="search_button  force_flex_center  curve_obj_h8">
                <label for="submit">Cerca</label>
                <input id="submit" type="image" src="../img/menu_seller/search.svg" alt="Cerca"/>
            </section>
        </div>
    </form>
    <?php foreach($templateParams["id_ricercato"] as $id_cerc): ?>
        <div class="force_flex_center cntnr_ID  curve_obj_h15  bg_primary">
            <p class="center_content_flex  ID_text_1">ID</p>
            <p class="center_content_flex  ID_text_2">
                <?php echo $id_cerc["Id_prodotto"]; ?>
            </p>
            <strong class="cntnr_icon_used_list bg_new  fg_text_white force_flex_center  curve_obj_h15">
            <?php 
                if(count($dbh->getSottocategoriaId($id_cerc["Id_sottocategoria"])) > 0){
                    echo $dbh->getSottocategoriaId($id_cerc["Id_sottocategoria"])[0]["Descrizione"];
                }

                ?>
            </strong>
        </div>
    <?php endforeach; ?>
</div>


<div class="cntnr_scritta_prodotti1  force_flex_center  margin_top_medium">
    <p>Lista dei Prodotti</p>
</div>

<div class="cntnr_scritta_prodotti2">
    <div class="cntnr_column_type">
        <p>Nome Prodotto</p>
        <p>Console</p>
        <p>Sconto</p>
    </div>
    <div class="cntnr_column_type">
        <p>Prezzo</p>
        <p>Categoria</p>
        <p>ID</p>
    </div>
</div>

<main class="cntnr_lista">
    <?php foreach($templateParams["prodotti_totali"] as $prodotti): ?>
        <section class="cntnr_prodotti  curve_obj_h8">
            <section class="cntnr_column_type  font_primary">
                <p class="force_flex_center fg_text_accent"><?php echo $prodotti["Nome"]; ?></p>
                <strong class="cntnr_icon_used_list bg_new  fg_text_white force_flex_center  curve_obj_h15">
                    <?php echo $dbh->getSottocategoriaId($prodotti["Id_sottocategoria"])[0]["Descrizione"];  ?>
                </strong>
                <p class="force_flex_center fg_text_primary">
                    <?php echo ($prodotti["Sconto"]*100);?>%
                </p>
            </section>
            <section class="cntnr_column_type">
                <p class="force_flex_center  font_primary">
                    <?php echo $prodotti["prezzo_scontato"];?></p>
                <section class="cntnr_typegame  force_flex_center circle_obj  bg_light_theme_<?php echo $dbh->getCategorybySub($prodotti["Id_sottocategoria"])[0]["Nome"]; ?>">
                    <img src="<?php echo UPLOAD_DIR_TIPO_DEVICE_SELLER.$dbh->getCategorybySub($prodotti["Id_sottocategoria"])[0]["Icona"]; ?>" alt="<?php echo $dbh->getCategorybySub($prodotti["Id_sottocategoria"])[0]["Nome"]; ?>" title="<?php echo $dbh->getCategorybySub($prodotti["Id_sottocategoria"])[0]["Nome"]; ?>">
                </section>
                <p class="force_flex_center  font_primary  fg_text_accent"><?php echo $prodotti["Id_prodotto"];?></p>
            </section>
        </section>
    <?php endforeach; ?>

</main>

<div class=" force_flex_center  margin_top_medium">
    <a class=" cntnr_btn_footer_lista  force_flex_center  curve_obj_h15" href="./sellerMain.php">
        <img class="" src="../img/back/backSeller.svg" alt="Go Back" title="Go Back" />
    </a> 
</div>