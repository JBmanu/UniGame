<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'ps';
    $myLocation = '../../';
    $altIcon = "iconPlaystation";
    $colorPage = 'bg_light_theme_PS';
    $iconTypePage = $myLocation.'img/typeGame/ps.svg';

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getAllItems();

    //Presentazione
    require_once("../../template/listItem.php");
?>