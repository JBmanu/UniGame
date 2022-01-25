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

    if (isUserLoggedIn()) {
        $allProducts["wish"] = $dbh->getWishListBy($_SESSION["Email"]);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST)){
                header("refresh:0");
                $sotto_categoria ="ciao";
                
                if($_POST["PS"]){
                    $sotto_categoria = $_POST["PS"];
                }
                else if($_POST["XBOX"]){
                    $sotto_categoria = $_POST["XBOX"];
                }
    
                else if($_POST["SWITCH"]){
                    $sotto_categoria = $_POST["SWITCH"];
                }
                else{
                    $sotto_categoria = $_POST["PC"];
                }
                
                $nameGame = $_GET["idItem"];
                $idItem = $dbh->pickItemBySottoCategory($nameGame, $sotto_categoria)[0]["Id_prodotto"];
                $dbh->addItemInCart($_SESSION["Email"], $idItem);
            }
        }
    } else {
        $allProducts["wish"] = [];
    } 

    


    

    //Presentazione
    require_once($myLocation."template/basePage.php");

?>