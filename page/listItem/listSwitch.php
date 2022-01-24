<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'switch';
    $myLocation = '../../';
    $altIcon = "iconSwitch";
    $colorPage = 'bg_light_theme_SWITCH';
    $iconTypePage = $myLocation.'img/typeGame/nintendo.svg';
    $itemPagePath = 'itemSwitch.php';
    $specificPage = 'listSwitch.php';

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getItemSwitchBy();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)){
            if($_POST["SWITCH"]){
                $sotto_categoria = $_POST["SWITCH"];
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