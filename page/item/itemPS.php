<?php 
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'ps.svg';
    $myLocation = '../../';
    $gbColorLight = 'bg_light_theme_PS';
    $gbColorOpacity = 'bg_opacity_theme_PS';
    $imgBack = 'backPS.svg';
    $backPage = '../listItem/listPS.php';

    $item = $dbh->getAllDataItem($_GET["idItem"])[0];

    require_once($myLocation."template/core/coreItem.php");
?>