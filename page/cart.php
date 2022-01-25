<?php
    require_once("../connection.php");

    $titleUser = 'UniGame';
    $myLocation = '../';
    $hasCart = [true, $myLocation.'template/form/pay.php'];

    $iconTypePage = $myLocation.'img/menu/carrello.svg';

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
        $myLocation.'template/core/coreCart.php' => true,
        $myLocation.'template/core/coreWish.php' => false,
        $myLocation.'template/core/coreSearch.php' => false
    ];

    if (isUserLoggedIn()) {
        $payMethod = $dbh->payMethod();

        $allProducts["items"] = $dbh->allItemInCartBy($_SESSION["Email"]);
        $cost = $dbh->totalCost($_SESSION["Email"]);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["meno"])) {
                header("refresh:0");
                $idGame = $_POST["meno"];
                $dbh->removeItemInCart($_SESSION["Email"], $idGame);
            }

            if(isset($_POST["piu"])) {
                header("refresh:0");
                $idGame = $_POST["piu"];
                $dbh->addItemInCart($_SESSION["Email"], $idGame);
            }

            if(isset($_POST["methodPay"])){
                header("refresh:0");
                $dbh->removeUnitInWarehouse($_SESSION["Email"]);
                $dbh->createOrder($_SESSION["Email"], $_POST["methodPay"]);
                $idOrder = $dbh->lastOrderCreate()["Id_ordine"];
                $dbh->createDetailOrder($_SESSION["Email"], $idOrder);
                $dbh->resetCart($_SESSION["Email"]);
            }
        }
    } else {
        $allProducts["items"] = [];
        $payMethod = "";
        $cost = "---";
    }


    //Presentazione
    require_once($myLocation."template/basePage.php");
?>