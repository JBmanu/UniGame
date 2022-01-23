<?php
    require_once("../connection.php");
    require_once("serverResponse.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)) { // se esiste
            switch ($_POST["action"]) {
                case 'like':

                    foreach ($dbh->getAllItemsWithLikeBy() as $item) {
                        if($item["Id_prodotto"] == $_POST["idGame"]) {
                            if ($item["piace"] == 1) {
                                $err = $dbh->removeItemInWishList("gek5800@gmail.com" , $_POST["idGame"]);
                                responseLike($err);
                            } else {
                                $err = $dbh->addItemInWishList("gek5800@gmail.com" , $_POST["idGame"]);
                                responseLike($err);
                            }
                        }
                    }
                    break;
            }

        }
    }

?>