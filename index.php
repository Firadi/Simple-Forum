<?php
    
    include_once 'controllers/viewsController.php';

    // Router of the site
    if (isset($_GET['action']) ) {

        $rooting = $_GET['action'];
        
        if(isset($_SESSION['user'])){
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
                case 'logout':
                    logoutAction();
                    break;                    
                default:
                    loginAction();
                    break;
            }
    }else{
        switch ($rooting) {
            case 'registre':
                registreAction();
                break;                   
            default:
                loginAction();
                break;
        }
    }
}else loginAction();
?>