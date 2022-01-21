<?php
    require_once("../connection.php");
    $_SESSION["Login-fatto"]=0;
    $user=0;
    $venditore=0;

    if(isset($_POST["email"]) && isset($_POST["passw"])){
        $login_result_user=$dbh->checkLoginUserCRIPTATO($_POST["email"], $_POST["passw"]);
        $login_result_seller=$dbh->checkLoginSellerCRIPTATO($_POST["email"], $_POST["passw"]);

        if($login_result_user == false && $login_result_seller == false ){
            $templateParams["erroreLogin"] = "Errore! Controllare username o password";
        } else if($login_result_user != false && $login_result_seller == false){
            LoggoUtente($_POST["email"]);
            $user=1;
        } else{
            LoggoUtente($_POST["email"]);
            $venditore=1;
        }
    }

    if(isUserLoggedIn()){
        if($venditore==1){
            header("location: seller/sellerMain.php");
        } else{
            $_SESSION["login-fatto"]=1;
            header("location: ../index.php");
        }

    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "login-form.php";
    $templateParams["intro"] = "Login";
    $templateParams["categorie"]=$dbh->getAllCategories();

    require_once("../template/base_logAndReg.php");
?>