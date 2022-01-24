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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)){

            if($_POST["SWITCH"]){
                $sotto_categoria = $_POST["SWITCH"];
                $nameGame = $item["Nome"];
                $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                $id_utente = "gek5800@gmail.com";
                $dbh->addItemInCart($id_utente, $idItem);
            }
        }
    }

    require_once($myLocation."template/core/coreItem.php");
?>