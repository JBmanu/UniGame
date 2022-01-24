<?php
    require_once("../../connection.php");

    if(isset($_POST["search"])){
        $result=$dbh->searchIdProduct($_POST["search"]);
        if(!empty($result)){
            $templateParams["id_prodotto_cercato"]=$result;
        } else{
            $templateParams["id_prodotto_cercato"][0]["Id_prodotto"]=0;
            $templateParams["id_prodotto_cercato"][0]["Id_sottocategoria"]=0;
        }
    }


    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "seller_list_center.php";

    $templateParams["lista_prodotti"]=$dbh->getAllProduct();

    require_once("../../template/base_seller.php");
?>