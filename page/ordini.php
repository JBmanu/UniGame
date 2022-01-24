<?php
    require_once("../connection.php");
    
    if(isUserLoggedIn()){
        $templateParams["ordini"] =$dbh->getAllOrdersByEmail($_SESSION["Email"]);
    } else{
        $templateParams["erroreOrdini"] = "Effettuare l'accesso !";
    }

    $templateParams["titolo"] = "Uni-videogame";
    $templateParams["nome"] = "ordini_main.php";
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