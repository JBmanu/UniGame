<?php

function isUserLoggedIn(){
    return !empty($_SESSION["Email"]);
}

function LoggoUtente($user){
    $_SESSION["Email"] = $user;
}

function getIdNotification($text){
    $idNotifica = 0;
    switch($text){
        case "effettuato":
            $idNotifica = 1;
            break;
        case "lavorazione":
            $idNotifica = 2;
            break;
        case "arrivo":
            $idNotifica = 3;
            break;
        case "ricevuto":
            $idNotifica = 4;
            break;
        case "spedito":
            $idNotifica = 5;
            break;
        case "transito":
            $idNotifica = 6;
            break;
        case "stabilimento":
            $idNotifica = 7;
            break;
        case "login":
            $idNotifica = 8;
            break;
        case "registrazione":
            $idNotifica = 9;
            break;
        case "logout":
            $idNotifica = 10;
            break;
    }

    return $idNotifica;
}

?>