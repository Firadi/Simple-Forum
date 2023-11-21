<?php
session_start();
function registreAction(){
    $error="";
    if(isset($_SESSION['errorRegister'])){
        $errors = $_SESSION['errorRegister'];
    }
    require_once 'views/registre.php';
}
function loginAction(){
    $error="";
    if(isset($_SESSION['errorAuth'])){
        $errors = $_SESSION['errorAuth'];
    }
    require_once 'views/login.php';
}
function homeAction(){
    require_once 'views/home.php';
}
function alertAction(){
    require_once 'views/parties/alert.php';
}
?>