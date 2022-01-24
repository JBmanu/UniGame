<?php
    require_once("../connection.php");

    $titleUser = 'UniGame';
    $myLocation = '../';
    $hasCart = [true, $myLocation.'template/form/pay.php'];

    $iconTypePage = $myLocation.'img/menu/carrello.svg';

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
        $myLocation.'template/core/coreCart.php' => true,
        $myLocation.'template/core/coreWish.php' => false,
        $myLocation.'template/core/coreSearch.php' => false
    ];

    // $allProducts["items"] = $dbh->getAllItems();

    //Presentazione
    require_once($myLocation."template/basePage.php");
?>