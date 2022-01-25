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

    if (isUserLoggedIn()) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST)){
                if($_POST["PS"]){
                    $sotto_categoria = $_POST["PS"];
                    $nameGame = $item["Nome"];
                    $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                    $dbh->addItemInCart($_SESSION["Email"], $idItem);
                }
            }
        }
    }

    require_once($myLocation."template/core/coreItem.php");
?>