<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'pc';
    $myLocation = '../../';
    $altIcon = "iconPC";
    $colorPage = 'bg_light_theme_PC';
    $iconTypePage = $myLocation.'img/typeGame/pc.svg';
    $itemPagePath = 'itemPC.php';
    $specificPage = 'listPC.php';


    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'/template/nav/baseNavSearch.php'];


    if (isUserLoggedIn()) {

        $allProducts["items"] = $dbh->getItemPCBy($_SESSION["Email"]);
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST)){
                if($_POST["PC"]){
                    $sotto_categoria = $_POST["PC"];
                    $nameGame = $_GET["idItem"];
                    $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                    $dbh->addItemInCart($_SESSION["Email"], $idItem);
                }
            }
        }
    } else {
        $allProducts["items"] = $dbh->getItemsNoLog(4);
    }


    //Presentazione
    require_once("../../template/listItem.php");
?>