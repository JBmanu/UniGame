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

    if (isUserLoggedIn()) {
        $allProducts["items"] = $dbh->getItemXboxBy($_SESSION["Email"]);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST)){
                if($_POST["XBOX"]){
                    $sotto_categoria = $_POST["PS"];
                    $nameGame = $_POST["idItem"];
                    $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                    $dbh->addItemInCart($_SESSION["Email"], $idItem);
                }
            }
        }
    } else {
        $allProducts["items"] = $dbh->getItemsNoLog(2);
    }


    //Presentazione
    require_once("../../template/listItem.php");
?>