<?php
    require_once("connection.php");

    $templateParams["giochi_scontati"] = $dbh->getDiscountedGames();

    require_once("template/base.php")
?>