<?php
    require_once("../connection.php");
    
    if(isUserLoggedIn()){
        $templateParams["ordini"] =$dbh->getAllOrdersByEmail($_SESSION["Email"]);
    } else{
        $templateParams["erroreOrdini"] = "Effettuare l'accesso !";
    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "ordini_main.php";
    $templateParams["categorie"]=$dbh->getAllCategories();
    $templateParams["nome_img_semicerchio"]="ordini";

    require_once("../template/base_Nav_and_button.php");
?>