<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'xbox';
    $myLocation = '../../';
    $altIcon = "iconXbox";
    $colorPage = 'bg_light_theme_XBOX';
    $iconTypePage = $myLocation.'img/typeGame/xbox.svg';
    $itemPagePath = 'itemXbox.php';
    $specificPage = 'listXbox.php';

    $srcPageBase = [ 
        'NavBar' => '../../template/nav/baseNavBar.php', 
        'NavBtn' => '../../template/nav/baseNavBtn.php', 
        'NavSearch' => '../../template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getItemXboxBy();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)){
            if($_POST["XBOX"]){
                $sotto_categoria = $_POST["PS"];
                $nameGame = $_GET["idItem"];
                $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                $id_utente = "gek5800@gmail.com";
                $dbh->addItemInCart($id_utente, $idItem);
            }
        }

    }

    //Presentazione
    require_once("../../template/listItem.php");
?>