<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'xbox';
    $myLocation = '../../';
    $altIcon = "iconXbox";
    $colorPage = 'bg_light_theme_XBOX';
    $iconTypePage = $myLocation.'img/typeGame/xbox.svg';

    $srcPageBase = [ 
        'NavBar' => '../../template/nav/baseNavBar.php', 
        'NavBtn' => '../../template/nav/baseNavBtn.php', 
        'NavSearch' => '../../template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getItemXboxBy();

    //Presentazione
    require_once("../../template/listItem.php");
?>