<?php
require_once("../connection.php");

if($_GET["action"]=='1'){
    $nome_prodotto=htmlspecialchars($_POST["name_product"]);
    $prezzo=floatval($_POST["price_product"]);
    $descrizione=htmlspecialchars($_POST["description"]);
    $unita=intval($_POST["unita_product"]);
    $data=$_POST["date_product"];

    $categorie=$dbh->getAllSubCategories();
    $categorie_inserite = array();

    for($i=0; $i<count($categorie); $i++){
        if(isset($_POST["categoria_".$categorie[$i]["Id_sottocategoria"]])){
            array_push($categorie_inserite,$categorie[$i]["Id_sottocategoria"]);
        }
    }

    $imgarticolo = $_FILES["img_articolo"];
    for($i=0; $i<count($categorie_inserite); $i++){
        $result=$dbh->productExists($nome_prodotto, $categorie_inserite[$i]);
        if(!empty($result)){
            $unita_before=$dbh->getProductUnits($result[0]["Id_prodotto"]);
            $id = $dbh->incrementUnits($result[0]["Id_prodotto"], $unita_before[0]["Unità"], $unita);

        }  else{ 
            $id = $dbh->addGame($nome_prodotto, $imgarticolo["name"], $unita, $prezzo, $categorie_inserite[$i], $data, $descrizione);
        }
    }
}

if($_GET["action"]=='2'){
    $id_prodotto=$_POST["id_product_delete"];
    $id = $dbh->deleteGame($id_prodotto);
}

if($_GET["action"]=='3'){
    $id_prodotto=$_POST["sconto_id_product"];
    $sconto = floatval($_POST["sconto_product"]);
    $prezzo = $dbh->getProductPrice($id_prodotto);
    if(count($prezzo) > 0)
    $id = $dbh->insertOffer($id_prodotto, $sconto, floatval($prezzo[0]["Prezzo"]));
}
?>