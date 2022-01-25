<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'ps';
    $myLocation = '../../';
    $altIcon = "iconPlaystation";
    $colorPage = 'bg_light_theme_PS';
    $iconTypePage = $myLocation.'img/typeGame/ps.svg';
    $itemPagePath = 'itemPS.php';
    $specificPage = 'listPS.php';

    $srcPageBase = [
        'NavBar' => $myLocation.'template/nav/baseNavBar.php',
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php',
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php'];

    
    
    if (isUserLoggedIn()) {

        $allProducts["items"] = $dbh->getItemPSBy($_SESSION["Email"]);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST)){
                if($_POST["PS"]){
                    $sotto_categoria = $_POST["PS"];
                    $nameGame = $_GET["idItem"];
                    $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                    $dbh->addItemInCart($_SESSION["Email"], $idItem);
                }
            }
        }
    } else {
        $allProducts["items"] = $dbh->getItemsNoLog(1);
    }

    //Presentazione
    require_once($myLocation."template/listItem.php");
?>