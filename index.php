<?php
    
    include_once 'controllers/viewsController.php';
    if (isset($_GET['action'])&&isset($_SESSION['user'])) {
        $rooting = $_GET['action'];
        
        switch ($rooting) {
            case 'registre':
                registreAction();
                break;
            case 'login':
                loginAction();
                break;
            case 'home':
                homeAction();
                break;
            case 'question':
                questionAction();
                break;        
            default:
                loginAction();
                break;
        }
    }else{
        loginAction();
    }
?>