<?php

function isUserLoggedIn(){
    return !empty($_SESSION["Email"]);
}

function LoggoUtente($user){
    $_SESSION["Email"] = $user;
}

function checkNotifica($dbh){
    $prova = nice_time($_SESSION["tempo"], $dbh);
    return $prova;
}

function nice_time($time, $dbh) {
    $delta = time() - $time;
    unset($_SESSION["ordine_per_notifica"]);
    if($delta > 60 && $delta < 300) {
        $_SESSION["tempo"]=time();
        $ordini_cliente = $dbh->getAllOrdersByEmail($_SESSION["Email"]);

        foreach($ordini_cliente as $ordine){
            if($ordine["Id_status"] < 8){
                //aggiorna stato ordine nel db
                $dbh->updateStateOrderbyIdorder($ordine["Id_status"] + 1, $ordine["Id_ordine"]);
                $_SESSION["ordine_per_notifica"]=$ordine;
                //aggiunge notifica alla lista Notifiche_utente
                $dbh->insertNotifyinNotifyListOfOrder($_SESSION["Email"], $ordine["Id_status"] + 1, $ordine["Id_ordine"]);
                break;
            }
        }
        return true;
    } 
    return false;
}

function getIdNotification($text){
    $idNotifica = 0;
    switch($text){
        case "effettuato":
            $idNotifica = 1;
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

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;

    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

?>