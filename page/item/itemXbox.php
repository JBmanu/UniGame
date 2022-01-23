<?php 
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'xbox.svg';
    $myLocation = '../../';
    $gbColorLight = 'bg_light_theme_XBOX';
    $gbColorOpacity = 'bg_opacity_theme_XBOX';
    $imgBack = 'backXbox.svg';

    $backPage = '../listItem/listXbox.php';

    $item = $dbh->getAllDataItem($_GET["idItem"])[0];

    require_once($myLocation."template/core/coreItem.php");
?>