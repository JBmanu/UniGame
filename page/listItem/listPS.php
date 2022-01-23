<?php
    require_once("../../connection.php");

    $titleUser = 'UniGame';
    $typeGame = 'ps';
    $myLocation = '../../';
    $altIcon = "iconPlaystation";
    $colorPage = 'bg_light_theme_PS';
    $iconTypePage = $myLocation.'img/typeGame/ps.svg';
    $itemPagePath = 'itemPS.php';
    $specificPage = 'listPS.php';

    $srcPageBase = [
        'NavBar' => $myLocation.'template/nav/baseNavBar.php',
        'NavBtn' => $myLocation.'template/nav/baseNavBtn.php',
        'NavSearch' => $myLocation.'template/nav/baseNavSearch.php'];

    $allProducts["items"] = $dbh->getItemPSAscBy();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST)) {
    
            switch ($_POST["order"]){
                case 'desc':
                    $allProducts["items"] = $dbh->getItemPSDescBy();
                    header('Refresh: 0');
                    break;
                case 'cres':
                    $allProducts["items"] = $dbh->getItemPSAscBy();
                    header('Refresh: 0');
                    break;
            }
        }
    }

    //<?php echo $myLocation."page/listItem/".$specificPage;

    //Presentazione
    require_once($myLocation."template/listItem.php");
?>