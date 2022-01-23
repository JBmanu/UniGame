<main class="cntnr_all_order  force_flex_center  margin_top_medium  margin_bottom_medium">  
    <?php if(isset($templateParams["erroreOrdini"])): ?>
        <h4><?php echo $templateParams["erroreOrdini"]; ?></h4>
    <?php else: ?>
        <?php foreach($templateParams["ordini"] as $ordine): ?>
            <article class="cntnr_order  curve_obj_h8">
                <strong class="top_row  top_row_text" >Ordine #<?php echo $ordine["Id_ordine"]; ?> | <?php echo $dbh->getNumProductbyIdOrdine($ordine["Id_ordine"])[0]["NumProduct"]; ?> oggetti</strong>
                <p class="top_row  middle_row_text">Consegna</p>
                <div class="lower_row  lower_row_text">
                    <div class="force_flex_center">
                        <img src="../img/ordini/clock.png" alt="Data" title="Data">
                        <p><?php echo $ordine["Data_consegna"]; ?> </p>
                    </div>
                    <a href="./dettagliOrdini.php?Id_ordine=<?php echo $ordine["Id_ordine"]; ?>" class="button_order curve_obj_h8" id="buttonOrder">Visualizza</a>
                </div>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</main>