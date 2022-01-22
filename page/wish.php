<?php
    require_once("../connection.php");

    $titleUser = 'UniGame';
    $myLocation = '../';

    $iconTypePage = $myLocation.'img/menu/wishlist.svg';

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php', 
        'NavCircle' => $myLocation.'template/nav/baseNavCircle.php'];

    $hasNav = [
        'NavBar' => true, 
        'NavBtn' => true, 
        'NavSearch' => false,
        'NavCircle' => true];

       
    $hasCore = [
        $myLocation.'template/core/coreCart.php' => false,
        $myLocation.'template/core/coreWish.php' => true,
        $myLocation.'template/core/coreSearch.php' => false
    ];

    $allProducts["items"] = $dbh->getAllItems();

    //Presentazione
    require_once($myLocation."template/basePage.php");

?>