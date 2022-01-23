<?php
    require_once("connection.php");
    require_once("serverResponse.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)) { // se esiste
            switch ($_POST["action"]) {
                case 'add_game':
                    $err = $dbh->addGame($_POST["name_product"]);
                    responseLike($err);

                    break;
            }
        }
    }

?>