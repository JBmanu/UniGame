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

    $payMethod = $dbh->payMethod();

    $allProducts["items"] = $dbh->allItemInCartBy('gek5800@gmail.com');
    $cost = $dbh->totalCost('gek5800@gmail.com');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["meno"])) {
            $idGame = $_POST["meno"];
            $dbh->removeItemInCart('gek5800@gmail.com', $idGame);
        }

        if(isset($_POST["piu"])) {
            $idGame = $_POST["piu"];
            $dbh->addItemInCart('gek5800@gmail.com', $idGame);
        }

        if(isset($_POST["methodPay"])){
            $dbh->removeUnitInWarehouse('gek5800@gmail.com');


            $numProductZero=$dbh->checkZeroUnits();
            if($numProductZero->num_rows>0){
                for($i=0; $i<count($numProductZero); $i++){
                    $nome_prodotto=$numProductZero[$i]["Nome"];
                    mail('info@unigame.it', 'Prodotto terminato !', $nome_prodotto.' è terminato !!');
                    $id=$dbh->deleteProduct($numProductZero[$i]["Id_prodotto"]);
                }
            }



            $dbh->createOrder('gek5800@gmail.com', $_POST["methodPay"]);
            $idOrder = $dbh->lastOrderCreate()["Id_ordine"];
            $dbh->createDetailOrder('gek5800@gmail.com', $idOrder);
            $dbh->resetCart();
            header("refresh:0");
        }

    }

    //Presentazione
    require_once($myLocation."template/basePage.php");
?>