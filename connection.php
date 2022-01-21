<?php

    require_once("db/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "UniGameDB", 3306);

    //carica la cartella 

    define("UPLOAD_DIR_IMG", "./img/");
    define("UPLOAD_DIR_IMGGAME", "./img/game/");
    define("UPLOAD_DIR_IMGHEART", "./img/item/");
    define("UPLOAD_DIR_BASE", "./template/base/");

    define("UPLOAD_DIR_INDEX", "./img/game/");
    define("UPLOAD_DIR_TIPO_DEVICE_INDEX", "./img/typeGame/");

?>