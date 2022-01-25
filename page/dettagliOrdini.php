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
            $templateParams["prezzo_totale_prodotti_ordine"]+=(floatval($templateParams["prodotti"][$i][0]["prezzo_scontato"])* ($dbh->getQuantityby(intval($templateParams["Id_ordine"]), $templateParams["Numprodotti"][$i]["Id_prodotto"]))[0]["Quantità"]);
        }
        $templateParams["prezzo_totale_prodotti_ordine"]=number_format($templateParams["prezzo_totale_prodotti_ordine"], 2, '.', '');

    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "dettagli_ordini_main.php";

    $templateParams["categorie"]=$dbh->getAllCategories();
    $templateParams["nome_img_semicerchio"]="ordini";

    require_once("../template/base_Nav_and_button.php");

    if(isset($_SESSION["tempo"])){
        $notifica_da_inviare=checkNotifica($dbh);

        if($notifica_da_inviare){
            if(isset($_SESSION["ordine_per_notifica"])){

                $id_ordine=$_SESSION["ordine_per_notifica"]["Id_ordine"];
                $id_status=$_SESSION["ordine_per_notifica"]["Id_status"];
                $stato=$dbh->getNotifybyID($id_status+1);

                $stato=$stato[0]["Testo"];

                echo "<script>
                let stato='$stato';
                let id_ordine='$id_ordine';
                let stringa_finale='Ordine #'+id_ordine+' '+stato;
                toastr.info(stringa_finale);
                </script>";
            }
        }
    }
?>