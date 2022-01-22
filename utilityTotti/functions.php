<?php

function isUserLoggedIn(){
    return !empty($_SESSION["Email"]);
}

function LoggoUtente($user){
    $_SESSION["Email"] = $user;
}

function checkNotifica(){
    $prova = nice_time($_SESSION["tempo"]);
    return $prova;
}

function nice_time($time) {
    $delta = time() - $time;
    var_dump($delta);
    if($delta > 60 || $delta < 63) {
      return true;
    } 
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
        case "spedito":
            $idNotifica = 4;
            break;
        case "transito":
            $idNotifica = 5;
            break;
        case "stabilimento":
            $idNotifica = 6;
            break;
        case "consegna":
            $idNotifica = 7;
            break;
        case "consegnato":
            $idNotifica = 8;
            break;
        case "login":
            $idNotifica = 9;
            break;
        case "registrazione":
            $idNotifica = 10;
            break;
        case "logout":
            $idNotifica = 11;
            break;
    }
    return $idNotifica;
}

?>