<?php 
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'pc.svg';
    $myLocation = '../../';
    $gbColorLight = 'bg_light_theme_PC';
    $gbColorOpacity = 'bg_opacity_theme_PC';
    $imgBack = 'backPC.svg';

    $backPage = '../listItem/listPC.php';

    $item = $dbh->getAllDataItem($_GET["idItem"])[0];

    require_once($myLocation."template/core/coreItem.php");
?>