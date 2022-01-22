<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'ps';
    $myLocation = '../../';
    $altIcon = "iconPlaystation";
    $colorPage = 'bg_light_theme_PS';
    $iconTypePage = $myLocation.'img/typeGame/ps.svg';

    $json = json_encode($altIcon);

    $srcPageBase = [
        'NavBar' => $myLocation.'template/nav/baseNavBar.php',
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php',
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getAllItems();

    $_SESSION["items"] = array(array());

    foreach ($dbh->getAllItems() as $item) {
        array_push($_SESSION["items"], array(
            $item["Id_prodotto"],
            $item["Nome"],
            $item["Url_immagine"],
            $item["Sconto"],
            $item["Id_sottocategoria"],
            $item["Id_pegi"],
            $item["Data_rilascio"],
            $item["Nuovo"],
            $item["prezzo_scontato"],
            $item["Prezzo"],
            false));
    }
    array_shift($_SESSION["items"]);
    $json = json_encode($_SESSION["items"]);
    $bytes = file_put_contents($myLocation."json/items.json", $json);



    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)) { // se esiste
            // var_dump($_POST);
    
            switch ($_POST["action"]) {
                case 'like': 
                    $_POST["idGame"] ;
                        
                    //ritorna le cose al js
                    print json_encode("ciao");
                    exit();
            }
    
            // ritorna dati al js pe rla richiesta ajax
        }
    }





    //Presentazione
    require_once($myLocation."template/listItem.php");
?>