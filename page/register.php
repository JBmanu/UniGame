<?php
    require_once("../connection.php");

    if(isset($_POST["email"]) && isset($_POST["passw"]) && isset($_POST["nome"]) && isset($_POST["cognome"])){
        $email = htmlspecialchars($_POST["email"]);
        $passw = $_POST["passw"];
        $nome = htmlspecialchars($_POST["nome"]);
        $cognome = htmlspecialchars($_POST["cognome"]);

        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true)); //Crea chiave casuale
        $passw = hash('sha512', $passw.$random_salt); //Creao una password usando la chiave creata sopra
        
        $result=$dbh->insertUser($email, $passw, $nome, $cognome, $random_salt);

        if(!$result){
            $templateParams["erroreRegister"] = "Errore! Email già utilizzata.";
        }
        else{
            header("location: ./login.php");
        }
    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "register-form.php";
    $templateParams["intro"] = "Register";
    $templateParams["categorie"]=$dbh->getAllCategories();

    require_once("../template/base_logAndReg.php");
?>