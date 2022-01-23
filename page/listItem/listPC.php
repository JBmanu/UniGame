<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'pc';
    $myLocation = '../../';
    $altIcon = "iconPC";
    $colorPage = 'bg_light_theme_PC';
    $iconTypePage = $myLocation.'img/typeGame/pc.svg';
    $itemPagePath = 'itemPC.php';

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'/template/nav/baseNavSearch.php'];


    $allProducts["items"] = $dbh->getItemPCBy();

    //Presentazione
    require_once("../../template/listItem.php");
?>