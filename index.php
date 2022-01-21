<?php
    require_once("connection.php");

    $titleUser = 'UniGame';
    
    // Si possono istanziare variabili gloabli, lo vedranno tutti il file successivi
    $templateParams["giochi_scontati"] = $dbh->getDiscountedGames();
    // var_dump($dbh->getCategorybySub(2));

    // var_dump($allProducts["items"]);
    //Logica


    //Presentazione
    require_once("template/base.php")
    // require_once($srcListItem["PS"]);
?>