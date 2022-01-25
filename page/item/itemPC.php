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

    if (isUserLoggedIn()) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST)){

                if($_POST["PC"]){
                    $sotto_categoria = $_POST["PC"];
                    $nameGame = $item["Nome"];
                    $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                    $dbh->addItemInCart($_SESSION["Email"], $idItem);
                }
            }
        }
    }

    require_once($myLocation."template/core/coreItem.php");
?>