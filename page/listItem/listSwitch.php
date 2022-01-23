<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'switch';
    $myLocation = '../../';
    $altIcon = "iconSwitch";
    $colorPage = 'bg_light_theme_SWITCH';
    $iconTypePage = $myLocation.'img/typeGame/nintendo.svg';

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getItemSwitchBy();

    //Presentazione
    require_once("../../template/listItem.php");
?>