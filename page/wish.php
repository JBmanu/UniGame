<?php
    require_once("../connection.php");
    require("../manager/evetItem.php");

    $titleUser = 'UniGame';
    $myLocation = '../';

    $iconTypePage = $myLocation.'img/menu/wishlist.svg';

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php', 
        'NavCircle' => $myLocation.'template/nav/baseNavCircle.php'];

    $hasNav = [
        'NavBar' => true, 
        'NavBtn' => true, 
        'NavSearch' => false,
        'NavCircle' => true];

       
    $hasCore = [
        $myLocation.'template/core/coreCart.php' => false,
        $myLocation.'template/core/coreWish.php' => true,
        $myLocation.'template/core/coreSearch.php' => false
    ];

    $allProducts["wish"] = $dbh->getWishListBy();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)){
            $sotto_categoria ="ciao";
            
            if($_POST["PS"]){
                $sotto_categoria = $_POST["PS"];
            }
            if($_POST["XBOX"]){
                $sotto_categoria = $_POST["XBOX"];
            }

            if($_POST["SWITCH"]){
                $sotto_categoria = $_POST["SWITCH"];
            }

            if($_POST["PC"]){
                $sotto_categoria = $_POST["PC"];
            }

            $nameGame = $_GET["idItem"];
            $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
            $id_utente = "gek5800@gmail.com";
            $dbh->addItemInCart($id_utente, $idItem);
        }

    }

    //Presentazione
    require_once($myLocation."template/basePage.php");

?>