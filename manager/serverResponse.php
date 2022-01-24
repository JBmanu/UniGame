<?php 

    function responseLike($err) {
        print json_encode("Action like complite: ".$err);
        exit();
    }

    function responseTEST($msg) {
        print json_encode("Messaggio di test: ".$msg);
        exit();
    }


?>