<?php
    session_start();
    session_regenerate_id();

    define("UPLOAD_DIR_IMG", "./img/");
    define("UPLOAD_DIR_IMGGAME", "./img/game/");                //UTILIZARE QUESTA
    define("UPLOAD_DIR_IMGHEART", "./img/item/");
    define("UPLOAD_DIR_BASE", "./template/base/");
    
    define("UPLOAD_DIR_INDEX", "./img/game/");
    define("UPLOAD_DIR_DETAILS_ORDINE", "../img/game/");
    define("UPLOAD_DIR_TIPO_DEVICE_INDEX", "./img/typeGame/");
    define("UPLOAD_DIR_TIPO_DEVICE_SELLER", "../img/typeGame/");
    define("UPLOAD_DIR_TIPO_DEVIDE_LOG_REGISTER", "../img/typeGame/");
    define("UPLOAD_DIR_MENU", "../img/menu/");
    require_once("utilityTotti/functions.php");
    require_once("db/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "UniGameDB", 3306);

?>