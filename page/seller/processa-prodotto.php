<?php
require_once("../../connection.php");

if(!isUserLoggedIn() || !isset($_GET["action"])){
    header("location: login.php");
}

if($_GET["action"]==1){
    //Inserisco
    $nome_prodotto=htmlspecialchars($_POST["name_product"]);
    $prezzo=floatval($_POST["price_product"]);
    $descr=htmlspecialchars($_POST["descr_product"]);
    $unita=intval($_POST["unita_product"]);
    $data=$_POST["data_product"];
    $pegi=intval($_POST["pegi"]);

    $categorie=$dbh->getAllSubCategories();
    $categorie_inserite = array();


    for($i=0; $i<count($categorie); $i++){
        if(isset($_POST["categoria_".$categorie[$i]["Id_sottocategoria"]])){
            array_push($categorie_inserite,$categorie[$i]["Id_sottocategoria"]);
        }
    }


    $imgarticolo = $_FILES["img_articolo"];

    for($i=0; $i<count($categorie_inserite); $i++){
        $result=$dbh->existProduct($nome_prodotto, $categorie_inserite[$i]);
        if(!empty($result)){  //Se il prodotto esiste gia, allora aumento le unità
            $unita_precedenti=$dbh->UnitaProdotto($result[0]["Id_prodotto"]);
            $id = $dbh->addUnitsbyIdproduct($result[0]["Id_prodotto"], $unita_precedenti[0]["Unità"], $unita);

        }  else{       //Altrimenti inserisco il prodotto
            $id = $dbh->insertProduct($nome_prodotto, $imgarticolo["name"], $unita, $prezzo, $categorie_inserite[$i], $pegi, $data, $descr);
        }

        if($id!=false){
            $msg = "Inserimento completato correttamente!";
        }
        else{
            $msg = "Errore in inserimento!";
        }
    }
    header("location: sellerMain.php?formsg=".$msg);
}

if($_GET["action"]==2){
    //Elimina
    $id_prodotto=$_POST["elim_id_product"];
    $id = $dbh->deleteProduct($id_prodotto);
    if($id!=false){
        $msg = "Prodotto eliminato correttamente!";
    }
    else{
        $msg = "Errore durante l'eliminazione!";
    }
    header("location: sellerMain.php?formsg=".$msg);
}

if($_GET["action"]==3){
    //Inserimento sconto di un prodotto
    $id_prodotto=$_POST["sconto_id_product"];
    $sconto=$_POST["sconto_product"];
    $prezzo=$dbh->getPricebyIdProduct($id_prodotto);
    $id = $dbh->updateDiscountProduct($id_prodotto, $sconto, floatval($prezzo[0]["Prezzo"]));
    if($id!=false){
        $msg = "Sconto inserito correttamente!";
    }
    else{
        $msg = "Errore durante l'inserimento dello sconto!";
    }
    header("location: sellerMain.php?formsg=".$msg);
}

?>