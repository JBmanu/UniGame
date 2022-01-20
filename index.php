<?php
    require_once("connection.php");

    $titleUser = 'UniGame';
    $titleSeller = "UniGame Seller";

    $listItem = ['PC' => 'listPC.php', 'PS' => 'listPS.php', 'XBOX' => 'listXbox.php', 'SWITCH' => 'listSwitch.php'];



    // Si possono istanziare variabili gloabli, lo vedranno tutti il file successivi
    $templateParams["giochi_scontati"] = $dbh->getDiscountedGames();
    // var_dump($dbh->getCategorybySub(2));

    $allProducts["items"] = $dbh->getAllItems();
    $allProducts["wish"] = $dbh->getWishlist();
    
    // var_dump($allProducts["items"]);
    //Logica


    //Presentazione
    //require_once("template/base.php")
    require_once("template/listItem/listItem.php")
?>