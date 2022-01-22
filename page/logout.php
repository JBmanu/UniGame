<?php
    require_once("../connection.php");
    $_SESSION["logout-fatto"]=0;

    if(isset($_SESSION["Email"])){
        unset($_SESSION["Email"]);
        unset($_SESSION["tempo"]);

        $_SESSION["login-fatto"]=0;
        $_SESSION["notifica-login-inviata"]=0;

        $_SESSION["logout-fatto"]=1;
    }

    header("Location: ../index.php");
?>