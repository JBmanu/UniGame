<?php
    require_once("../connection.php");

    $titleUser = 'UniGame';
    $myLocation = '../';
    $hasCart = [true, $myLocation.'template/form/pay.php'];

    $iconTypePage = $myLocation.'img/menu/carrello.svg';

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavCircle' => $myLocation.'template/nav/baseNavCircle.php'];

    $hasNav = [
        'NavBar' => true, 
        'NavBtn' => true, 
        'NavCircle' => true];

    
    $hasCore = [
        $myLocation.'template/core/coreCart.php' => true,
        $myLocation.'template/core/coreWish.php' => false,
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

                $numProductZero=$dbh->checkZeroUnits();
                if(count($numProductZero) > 0){
                    for($i=0; $i<count($numProductZero); $i++){
                        $nome_prodotto=$numProductZero[$i]["Nome"];


                        $mail_headers = "From: Server <server@unigame.it>\r\n";
                        $mail_headers .= "Reply-To: server@unigame.it \r\n";
                        $mail_headers .= "X-Mailer: PHP/" . phpversion();

                        mail('info@unigame.it', 'Prodotto terminato !', $nome_prodotto.' è terminato !!', $mail_headers);
                    }
                }
            }
        } else {
            $allProducts["items"] = [];
            $payMethod = "";
            $cost = "---";
        }
    }

    //Presentazione
    require_once($myLocation."template/basePage.php");
?>