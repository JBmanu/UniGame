<?php
    require_once("connection.php");

    $templateParams["giochi_scontati"] = $dbh->getDiscountedGames();
    var_dump($dbh->getCategorybySub(2));

    require_once("template/base.php")
?>