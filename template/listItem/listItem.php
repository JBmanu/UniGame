<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title>Uni-videogame</title>
        <link rel="stylesheet" href="./css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="./css/listItemStyle.css" type="text/css"/>
        <link rel="icon" href="./img/unigame.jpeg" type="image/jpeg">
        <link rel="stylesheet" href="./css/style.css" type="text/css"/>
        <link rel="stylesheet" href="./css/manuStyle.css" type="text/css"/>
        <link rel="stylesheet" href="./css/effectStyle.css" type="text/css"/>
        <link rel="stylesheet" href="./css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="./js/notify.js" type="text/javascript"></script>
        <script src="./js/click.js" type="text/javascript"></script>
        <script src="./js/flipCard.js"  type="text/javascript" defer="defer"></script>
    </head>


    <body> 
        <?php require('template/baseNavBarSearch.php'); ?>

        <?php require($listItem["PS"]); ?>

    </body> 

</html>