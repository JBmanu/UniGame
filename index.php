<?php
    require_once("connection.php");

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["giochi_scontati"] = $dbh->getDiscountedGames();
    $templateParams["categorie"]=$dbh->getAllCategories();
    $templateParams["css"]=array("css/baseStyle.css", "css/effectStyle.css", "css/fontColorStyle.css", "css/listItemStyle.css", "css/index.css", "css/style.css", "css/toastr.min.css");

    require_once("template/base_index.php");

    if(isset($_SESSION["login-fatto"]) && $_SESSION["login-fatto"]==1 && $_SESSION["notifica-login-inviata"]==0){
        $_SESSION["notifica-login-inviata"]=1;
        $idNotifica=getIdNotification("login");
        $testo = $dbh -> getNotifybyID($idNotifica);
        $testo=$testo[0]["Testo"];

        echo "<script>
        let stringa='$testo';
        toastr.info(stringa);
        </script>";
    }

    if(isset($_SESSION["logout-fatto"]) && $_SESSION["logout-fatto"]==1 && $_SESSION["notifica-logout-inviata"]==0){
        $_SESSION["notifica-logout-inviata"]=1;
        $idNotifica=getIdNotification("logout");
        $testo = $dbh -> getNotifybyID($idNotifica);
        $testo=$testo[0]["Testo"];

        echo "<script>
        let stringa='$testo';
        toastr.info(stringa);
        </script>";
    }

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

    if(isset($_SESSION["ordine_effettuato"]["Notifica"])){
        if($_SESSION["ordine_effettuato"]["Notifica"]==1){
            $_SESSION["ordine_effettuato"]["Notifica"]=0;
            $idNotifica=getIdNotification("effettuato");
            $stato = $dbh -> getNotifybyID($idNotifica);
            $stato=$stato[0]["Testo"];
    
            $id_ordine=$_SESSION["ordine_effettuato"]["id_ordine"];
            $dbh->insertNotifyinNotifyListOfOrder($_SESSION["Email"], 1, $id_ordine);
    
            echo "<script>
            let stato='$stato';
            let id_ordine='$id_ordine';
            let stringa_finale='Ordine #'+id_ordine+' '+stato;
            toastr.info(stringa_finale);
            </script>";
        }
    }

?>