<?php
    require_once("../connection.php");

    if(isset($_POST["email"]) && isset($_POST["passw"])){
        var_dump($_POST);
        var_dump($dbh->checkLogin($_POST["email"], $_POST["passw"]));
    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "login-form.php";
    $templateParams["intro"] = "Login";
    $templateParams["categorie"]=$dbh->getAllCategories();

    require_once("../template/base_logAndReg.php");
?>