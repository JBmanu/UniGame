<?php

    require_once("db/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "UniGameDB", 3306);

    //carica la cartella delle immagini
    define("UPLOAD_DIR_IMGGAME", "./img/game/");
    define("UPLOAD_DIR_CSS", "./css/");


    define("UPLOAD_DIR_INDEX", "./img/game/");
    define("UPLOAD_DIR_TIPO_DEVICE_INDEX", "./img/typeGame/");

?>