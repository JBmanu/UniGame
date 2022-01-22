<!DOCTYPE html>
<html lang="it">
    <head>
        <meta name="viewport" content="width=devide-width, initial-scale=1.0" />
        <title><?php echo $templateParams["nome"]; ?></title>
        <link rel="stylesheet" href="../css/baseStyle.css" type="text/css"/>
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>
        <link rel="stylesheet" href="../css/toastr.min.css">
        <link rel="icon" href="../img/unigame.jpeg" type="image/jpeg">

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/toastr.min.js"></script>
        <script src="../js/notify.js" type="text/javascript"></script>
        <script src="../js/click.js" type="text/javascript"></script>
    </head>
    <body class="body-login">
        <header>
            <div class="topnav" id="myTopnav">
                <a href="../index.php" class="active">UniGame</a>
                <a href="../page/login.php"><img src="../img/menu/user.svg" alt="Login" /> Login</a>
                <a href="../page/listCart.php"><img src="../img/menu/carrello.svg" alt="Carrello" /> Carrello</a>
                <a href="../page/listWish.php"><img src="../img/menu/wishlist.svg" alt="Wishlist" /> Wishlist</a>
                <a href="./Ordini.php"><img src="../img/menu/ordini.svg" alt="Ordini" /> Ordini</a>
                <a href="../page/notification.php"><img src="../img/menu/notifiche.svg" alt="Notifiche" /> Notifiche</a>
                <a href="../index.php"><img src="../img/menu/logout.svg" alt="Logout" /> Logout</a>
                <a href="#" class="icon">
                    <img src="../img/menu/menu.svg" alt="Menu" />
                </a>
            </div>
        </header>
        <div class="div-login">
            <p><?php echo $templateParams["intro"]; ?></p>
        </div>
        <nav class = "nav-rotondo">
            <ul>
                <?php foreach($templateParams["categorie"] as $categoria): ?>
                <li class="<?php echo $categoria["Nome_esteso"]; ?>">
                    <a class="force_flex_center" href="./listItem/listItem<?php 
                    if($categoria["Nome"] == "PS" || $categoria["Nome"] == "PC"):
                        echo $categoria["Nome"]; 
                    else: 
                        echo ucfirst(strtolower($categoria["Nome"])); 
                    endif; ?>.php">
                        <img src="<?php echo UPLOAD_DIR_TIPO_DEVIDE_LOG_REGISTER.$categoria["Icona"]; ?>" alt="<?php echo $categoria["Nome_esteso"]; ?>" title="<?php echo $categoria["Nome_esteso"]; ?>" />
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="card">
            <div class="card-imgcontainer">
                <img src="../img/menu/user.svg" alt="Foto Utente" class="avatar-login"/>
            </div>
            <?php
                require($templateParams["nome"]);
            ?>

        </div>
    </body>
</html>