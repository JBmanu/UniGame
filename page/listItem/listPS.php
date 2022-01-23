<?php
    require_once("../../connection.php");
    
    $titleUser = 'UniGame';
    $typeGame = 'ps';
    $myLocation = '../../';
    $altIcon = "iconPlaystation";
    $colorPage = 'bg_light_theme_PS';
    $iconTypePage = $myLocation.'img/typeGame/ps.svg';

    $json = json_encode($altIcon);

    $srcPageBase = [
        'NavBar' => $myLocation.'template/nav/baseNavBar.php',
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php',
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getItemPSBy();

    //Presentazione
    require_once($myLocation."template/listItem.php");
?>