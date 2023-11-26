<?php
include_once 'models/db.php';
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
function nameById($id){
    return getUserNameById($id);
}
function homeAction(){
    $questions = getQuetions();
    require_once 'views/home.php';
}
function alertAction(){
    require_once 'views/parties/alert.php';
}
function questionAction(){
    $id=$_GET['id'];
    $question = getQuetionById($id);
    $answers= getAnswers($id);
    require_once 'views/question.php';
}
function getNumOfResponse($id){
    return getNumberOfAnswers($id);
}
function logoutAction(){
    include_once 'logout.php';
    header('Location: index.php?action=login');
}
?>