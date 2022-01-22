<?php
    require_once("../connection.php");

    if(isset($_GET["Id_ordine"])){
        $templateParams["Id_ordine"]=$_GET["Id_ordine"];
        $templateParams["ordine"]=$dbh->getOrderbyId($templateParams["Id_ordine"]);
        $templateParams["Numprodotti"]=$dbh->getProdottibyIdordine($templateParams["Id_ordine"]);

        for($i = 0; $i < count($templateParams["Numprodotti"]); $i++){
            $templateParams["prodotti"][$i]=$dbh->getProdottibyIdprodotto($templateParams["Numprodotti"][$i]["Id_prodotto"]);
        }

        for($i = 0; $i < count($templateParams["prodotti"]); $i++){
            foreach($templateParams["prodotti"][$i] as $prodotto){
                $templateParams["prezzo_totale_prodotti_ordine"]+=$prodotto["prezzo_scontato"];
            }
        }
        $templateParams["prezzo_totale_prodotti_ordine"]=number_format($templateParams["prezzo_totale_prodotti_ordine"], 2, '.', '');

    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "dettagli_ordini_main.php";

    $templateParams["categorie"]=$dbh->getAllCategories();
    $templateParams["nome_img_semicerchio"]="ordini";

    require_once("../template/base_Nav_and_button.php");
?>