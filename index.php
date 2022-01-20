<?php
    require_once("connection.php");

    $templateParams["giochi_scontati"] = $dbh->getDiscountedGames();
    $array=$dbh->getCategorybySub(2);

    foreach($array as $array_gioco):
        $prova=$array_gioco["Icona"];
    endforeach;
    var_dump($prova);


    require_once("template/base.php")
?>