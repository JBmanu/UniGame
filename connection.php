<?php

    require_once("db/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "UniGameDB", 3306);

    define("UPLOAD_DIR_INDEX", "./img/game/");
    define("UPLOAD_DIR_TIPO_DEVICE_INDEX", "./img/typeGame/");

    

?>