<?php
    require_once("connection.php");

    $templateParams["giochi_scontati"] = $dbh->getDiscountedGames();
    $templateParams["categorie"]=$dbh->getAllCategories();
    $templateParams["css"]=array("css/baseStyle.css", "css/effectStyle.css", "css/fontColorStyle.css", "css/listItemStyle.css", "css/index.css", "css/style.css", "css/toastr.min.css");

    require_once("template/base.php")
?>