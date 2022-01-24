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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)){

            if($_POST["XBOX"]){
                $sotto_categoria = $_POST["XBOX"];
                $nameGame = $item["Nome"];
                $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                $id_utente = "gek5800@gmail.com";
                $dbh->addItemInCart($id_utente, $idItem);
            }
        }
    }

    require_once($myLocation."template/core/coreItem.php");
?>