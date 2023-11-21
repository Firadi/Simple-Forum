<?php
    
    include_once 'controllers/viewsController.php';

    if (isset($_GET['action'])) {
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
            default:
                echo 'root';
                break;
        }
    }
?>