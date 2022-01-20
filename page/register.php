<?php
    require_once("../connection.php");
    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "register-form.php";
    $templateParams["intro"] = "Register";
    $templateParams["categorie"]=$dbh->getAllCategories();

    require_once("../template/base_logAndReg.php");
?>