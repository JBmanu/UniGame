<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title><?php echo $titleUser; ?></title>
        <link rel="stylesheet" href="../../css/baseStyle.css" type="text/css"/>
        <link rel="icon" href="../../img/unigame.jpeg" type="image/jpeg">
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/manuStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/effectStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/fontColorStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../../css/toastr.min.css">

        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/toastr.min.js"></script>
        <script src="../../js/notify.js" type="text/javascript" defer="defer"></script>
        <script src="../../js/click.js" type="text/javascript" defer="defer"></script>
        <script src="../../js/flipCard.js"  type="text/javascript" defer="defer"></script>
        <script src="../../js/selctionList.js"  type="text/javascript" defer="defer"></script>
    </head>


    <body> 
        <?php 
            require($srcPageBase["NavBar"]); 
            require($srcPageBase["NavBtn"]);
            require($srcPageBase["NavSearch"]);
        ?>

        <section class="cntnr_bar_list_card  space_top_margin_small <?php echo $colorPage; ?>">
            <div class="bar_obj_left  curve_obj_h15 ">
                <form action="listPS.php" method="post" id="formOrder">
                    <select class="minimal" name="order" id="order">
                        <option id="cres" value="cres">Prezzo Crescente</option>
                        <option id="desc" value="desc">Prezzo Decrescente</option>
                    </select>
                </form>
            </div>

            <div class="bar_obj_center  force_flex_center  curve_obj_h15">
                <img class="icon_theme" src=" <?php echo $iconTypePage; ?>" alt=" <?php echo $altIcon; ?>"/>
            </div>

            <div class="bar_obj_right  force_flex_center  curve_obj_h15">
                <form action="listPS.php" method="post" id="formFilter">
                    <label for="filter">
                        <select class="minimal" name="filter" id="filter">
                            <option value="crescente">Tutti</option>
                            <option value="crescente">Da €10 a €50</option>
                            <option value="decrescente">Da €50 a €100</option>
                        </select>
                    </label>
                </form>
            </div>
        </section>

        <main class="cntnr_list_card  space_top_margin_medium">
            
            <?php 
                require($myLocation."template/core/coreItemList.php");
            ?>
        </main>

    </body> 

</html>