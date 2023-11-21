<?php
    include_once '../models/db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['name'] ) && isset($_POST['password'] ) && isset($_POST['repassword'] ) && isset($_POST['email'] )) {
            $error=registreController($_POST['name'],$_POST['email'],$_POST['password'],$_POST['repassword']);
            if(!empty($error)){
                session_start();
                $_SESSION['errorRegister'] = $error;
                header('Location: ../index.php?action=registre');
            }
            else header('Location: ../index.php?action=login');
        }
    }
function passwordController($password, $repassword) {
    if ($password === $repassword) {
        return $hashedPass = password_hash($password,PASSWORD_DEFAULT);
    }
    else return false;
}
function registreController($nom, $email, $password, $repassword) {
    $hashedPass = passwordController($password, $repassword);
    if ($hashedPass) {
        $isAdd = addUser($nom, $email, $hashedPass);
        if($isAdd === "Email already exist"){
            return $isAdd;
        }
        else if(!$isAdd){
            return "Error at insertion";
        }
            
    }
    else {
        return "passwords incomapatable";
    }
    return "";
}

?>