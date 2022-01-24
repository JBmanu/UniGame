<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $templateParams["titolo"]; ?></title>
        <link rel="icon" href="../../img/unigame.jpeg" type="image/jpeg">
        <link rel="stylesheet" href="../../css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/sellerStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/effectStyle.css">
        <link rel="stylesheet" href="../../css/toastr.min.css">

        <script src="../../js/toastr.min.js"></script>
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/notify.js" type="text/javascript"></script>
        <script src="../../js/seller.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <div class="topnav">
                <a href="./sellerMain.php">UniGame seller</a>
            </div>
        </header>


        <?php
            require($templateParams["nome"]);
        ?>

    </body>
</html>