<?php
    require_once("../connection.php");

    if(isUserLoggedIn()){
        $templateParams["notifiche"] =$dbh->getAllNotificationByEmail($_SESSION["Email"]);
    } else{
        $templateParams["erroreNotifica"] = "Effettuare l'accesso !";
    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "notification_div.php";
    $templateParams["categorie"]=$dbh->getAllCategories();
    $templateParams["nome_img_semicerchio"]="notifiche";

    require_once("../template/base_Nav_and_button.php");
?>