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

    if (isUserLoggedIn()) {
        $allProducts["items"] = $dbh->getItemSwitchBy($_SESSION["Email"]);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST)){
                if($_POST["SWITCH"]){
                    $sotto_categoria = $_POST["SWITCH"];
                    $nameGame = $_POST["idItem"];
                    $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                    $dbh->addItemInCart($_SESSION["Email"], $idItem);
                }
            }
        }
    } else {
        $allProducts["items"] = $dbh->getItemsNoLog(3);
    }

    //Presentazione
    require_once("../../template/listItem.php");
?>