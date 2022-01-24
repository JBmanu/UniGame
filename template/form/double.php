<?php 
    $specific = $dbh->getSpecificDataItemByName($item["Nome"]);
    foreach ($specific as $data): ?>
    <label class="radio_btn_card force_flex_center" for="<?php echo $item["Id_prodotto"].$data["tipo"]; ?>">
        <input class="circle_obj  radio_circle_card" type="radio" id="<?php echo $item["Id_prodotto"].$data["tipo"]; ?>" name="<?php echo $data["categoria"]; ?>" value="<?php echo $data["chooseIdSottoCat"]; ?>" checked/>
        <span><?php echo $data["tipo"]; ?></span> 
    </label>
<?php endforeach; ?>


