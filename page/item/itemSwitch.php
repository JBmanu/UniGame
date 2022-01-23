<?php 
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'nintendo.svg';
    $myLocation = '../../';
    $gbColorLight = 'bg_light_theme_SWITCH';
    $gbColorOpacity = 'bg_opacity_theme_SWITCH';
    $imgBack = 'backSwitch.svg';

    $backPage = '../listItem/listSwitch.php';

    $item = $dbh->getAllDataItem($_GET["idItem"])[0];

    require_once($myLocation."template/core/coreItem.php");
?>