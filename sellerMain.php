<?php
    require_once("connection.php");
    require("manager/evetSeller.php");

    $templateParams["totaleUtenti"] = $dbh->getTotaleUtenti();




    // Presentazione
    require_once("template/sellerBase1.php")
?>