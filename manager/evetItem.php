<?php 
    require_once("../connection.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)) { // se esiste
            switch ($_POST["action"]) {
                case 'like': 

                    foreach ($dbh->getAllItemsWithLikeBy() as $key => $value) {
                        if($item["Id_prodotto"] == $_POST["idGame"]) {
                            // if ($item["piace"] != null) {
                            //     $err = $dbh->addItemInWishList("gek5800@gmail.com" , $_POST["idGame"]);
                            //     print json_encode($err . "inserito nella wish list");
                            //     exit();
                            //     // echo $myLocation."img/item/heart-full.svg";
                            // } else {
                            //     $err = $dbh->removeItemInWishList("gek5800@gmail.com" , $_POST["idGame"]);
                            //     print json_encode($err."eliminato dalla wish list");
                            //     exit();
                            //     // echo $myLocation."img/item/heart-empty.svg";
                            // }
                            print json_encode("trovato");
                            exit();
                        }
                        print json_encode("trovato");
                    exit();
                    }
                    
                    break;
            }
    
        }
    }

?>