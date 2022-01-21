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
?>