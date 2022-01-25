<?php
    require_once("../connection.php");

    $templateParams["nome"] = "search_center.php";
    $templateParams["categorie"]=$dbh->getAllCategories();
    $counter=0;

    if(isset($_POST["Search"])){
        $templateParams["prodotti_totali"] = $dbh->getAllProductForSearch();
        for($i=0; $i<count($templateParams["prodotti_totali"]); $i++){

            $templateParams["prodotti_totali"][$i]["Nome"]=strtolower($templateParams["prodotti_totali"][$i]["Nome"]);
            $search=strtolower($_POST["Search"]);

            if(preg_match("/{$search}/i", $templateParams["prodotti_totali"][$i]["Nome"])){
                $templateParams["prodotti_search"][$counter]=$templateParams["prodotti_totali"][$i];
                $counter++;
            }
        }
    }
    if(empty($templateParams["prodotti_search"])){
        $templateParams["prodotti_search"]=0;
    }

    require_once("../template/base_search.php");
?>