<?php
    require_once("../connection.php");
    unset($_SESSION["Email"]);
    $_SESSION["notifica-login-inviata"]=0;
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time()-42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    header("Location: ../index.php");
?>