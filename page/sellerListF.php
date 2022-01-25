<?php
    require_once("../connection.php");

    if(isset($_POST["search"])){
        $result=$dbh->ricercaId($_POST["search"]);
        if(!empty($result)){
            $templateParams["id_ricercato"]=$result;
        } else{
            $templateParams["id_ricercato"][0]["Id_prodotto"]=0;
            $templateParams["id_ricercato"][0]["Id_sottocategoria"]=0;
        }
    }


    $templateParams["type_page"] = "seller2.php";


    //Funzioni

    $templateParams["prodotti_totali"]=$dbh->GetEveryProduct();



    //Presentazione
    require_once("../template/sellerBase.php");
?>