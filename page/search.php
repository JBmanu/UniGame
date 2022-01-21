<?php
    require_once("../connection.php");

    $titleUser = 'UniGame';
    $myLocation = '../';

    
    $hasCart = [false, $myLocation.'template/form/pay.php'];

    $srcPageBase = [ 
        'NavBar' => $myLocation.'template/nav/baseNavBar.php', 
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php', 
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php', 
        'NavCircle' => $myLocation.'template/nav/baseNavCircle.php'];

    $hasNav = [
        'NavBar' => true, 
        'NavBtn' => true, 
        'NavSearch' => true,
        'NavCircle' => false];


       
    $hasCore = [
        $myLocation.'template/core/coreCart.php' => false,
        $myLocation.'template/core/coreWish.php' => false,
        $myLocation.'template/core/coreSearch.php' => true
    ];


    $allProducts["items"] = $dbh->getAllItems();

    //Presentazione
    require_once($myLocation."template/basePage.php");

?>