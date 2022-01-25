<!DOCTYPE html>
<html lang="it">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title>Uni-videogame</title>
        <link rel="stylesheet" href="../css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/searchStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../css/manuStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/effectStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/toastr.min.css">
        <link rel="icon" href="../img/unigame.jpeg" type="image/jpeg">

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/toastr.min.js"></script>
        <script src="../js/notify.js" type="text/javascript" defer="defer"></script>
        <script src="../js/click.js" type="text/javascript" defer="defer"></script>
        <script src="../js/flipCard.js"  type="text/javascript" defer="defer"></script>
        <script src="../js/cardCart.js"  type="text/javascript" defer="defer"></script>
        <script src="../js/methoWindow.js"  type="text/javascript" defer="defer"></script>
    </head>

    <body>
        <?php
            foreach ($hasNav as $key => $value){
                if ($value) {
                    require($srcPageBase[$key]);
                }
            } ?>
            
            <?php if(!isUserLoggedIn()): ?>
                <h3 class="force_flex_center margin_top_medium"><?php echo "Effettuare l'accesso !"; ?></h3>
            <?php endif;?>

            <?php foreach ($hasCore as $key => $value){
                if ($value) {
                    require($key);
                }
            }
        ?>
    </body>
    
</html>