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

    $allProducts["items"] = $dbh->getItemPSBy();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)){

            if($_POST["PS"]){
                $sotto_categoria = $_POST["PS"];
                $nameGame = $_GET["idItem"];
                $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                $id_utente = "gek5800@gmail.com";
                $dbh->addItemInCart($id_utente, $idItem);
            }
        }

    }

    //Presentazione
    require_once($myLocation."template/listItem.php");
?>