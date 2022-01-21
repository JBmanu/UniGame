<?php

function isUserLoggedIn(){
    return !empty($_SESSION["Email"]);
}

function LoggoUtente($user){
    $_SESSION["Email"] = $user;
}

?>