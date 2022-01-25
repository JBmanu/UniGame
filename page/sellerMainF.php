<?php
    require_once("../connection.php");


    $templateParams["type_page"] ="seller1.php";

    // Funzioni

    $templateParams["categorie"]=$dbh->getAllCategories();

    $templateParams["TotaleGuadagno"] = $dbh->GetTotalEarnings();

    $templateParams["totaleUtenti"] = $dbh->getTotaleUtenti();

    $templateParams["TotaleVenditePS"] = $dbh->getTotalSellCountForPSsabba();

    $templateParams["TotaleVenditeXBOX"] = $dbh->getTotalSellCountForXBOXsabba();

    $templateParams["TotaleVenditeNINTENDO"] = $dbh->getTotalSellCountForNINTENDOsabba();

    $templateParams["TotaleVenditePC"] = $dbh->getTotalSellCountForPCsabba();

    $templateParams["TotaleVenditeALL"] = $dbh->getTotalSellCountAllsabba();
    
    $templateParams["prodotti_allerta"] = $dbh->getAllertProducts();
    if(!isset($templateParams["prodotti_allerta"][0]["Id_sottocategoria"])){
        $templateParams["prodotti_allerta"][0]["Id_sottocategoria"]=0;}
 

    // Presentazione
    require_once("../template/sellerBase.php");
?>