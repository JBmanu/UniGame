<?php
    require_once("../../connection.php");

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "seller_main_center.php";
    $templateParams["categorie"]=$dbh->getAllCategories();
    if(isset($_GET["formsg"])){
        $templateParams["formsg"] = $_GET["formsg"];
    }

    $templateParams["guadagno"]=$dbh->getAllGain();
    
    $templateParams["persone_registrate"]=$dbh->getAllRegisteredPeople();
    
    $templateParams["unita_vendute"]=$dbh->NumeroUnitaVendute();

    $templateParams["venditePS"]=$dbh->NumeroVenditePS();
    if(!isset($templateParams["venditePS"][0]["NumVendite"])){
        $templateParams["venditePS"][0]["NumVendite"]=0;
    }
    
    $templateParams["venditePC"]=$dbh->NumeroVenditePC();
    if(!isset($templateParams["venditePC"][0]["NumVendite"])){
        $templateParams["venditePC"][0]["NumVendite"]=0;
    }

    $templateParams["venditeXbox"]=$dbh->NumeroVenditeXbox();
    if(!isset($templateParams["venditeXbox"][0]["NumVendite"])){
        $templateParams["venditeXbox"][0]["NumVendite"]=0;
    }

    $templateParams["venditeNintendo"]=$dbh->NumeroVenditeNintendo();
    if(!isset($templateParams["venditeNintendo"][0]["NumVendite"])){
        $templateParams["venditeNintendo"][0]["NumVendite"]=0;
    }

    $templateParams["prodottiAllerta"]=$dbh->ProdottiInAllerta();
    if(!isset($templateParams["prodottiAllerta"][0]["Id_sottocategoria"])){
        $templateParams["prodottiAllerta"][0]["Id_sottocategoria"]=0;
    }

    require_once("../../template/base_seller.php");
?>