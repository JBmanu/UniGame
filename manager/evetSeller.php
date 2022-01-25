<?php
    require_once("../connection.php");
    require_once("serverResponse.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)) { // se esiste

            switch($_POST["action"]) {
                case 'add':
                    $categorie = $dbh->getGameCategoryListSabba(
                        isset($_POST["categoria_1"]) ? $_POST["categoria_1"] : 0,
                        isset($_POST["categoria_2"]) ? $_POST["categoria_2"] : 0,
                        isset($_POST["categoria_3"]) ? $_POST["categoria_3"] : 0,
                        isset($_POST["categoria_4"]) ? $_POST["categoria_4"] : 0,
                        isset($_POST["categoria_5"]) ? $_POST["categoria_5"] : 0,
                        isset($_POST["categoria_6"]) ? $_POST["categoria_6"] : 0,
                    );
        
                    foreach ($categorie as $cat => $value)
                    {
                        $err = $dbh->addGame($_POST["name_product"], $_POST["price_product"], $value, $_POST["description"], $_POST["unità_product"], $_POST["date_product"], $_POST["img_articolo"]);
                    }
        
                    responseLike($err);

                    break;
                
                case 'delete':
                    
                     $err = $dbh->deleteGame($_POST["id_product"]);
                    
        
                    responseLike($err);

                    break;

                case 'offer':

                    $err = $dbh->insertOffer($_POST["id_product_offer"], $_POST["sconto_product"]);

                    responseLike($err);

                    break;
                    
            }
        }
    }

?>