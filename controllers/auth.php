<?php 
include_once '../models/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['password'] ) &&  isset($_POST['email'] )) {
        $error = auth($_POST['email'],$_POST['password']);
        if(!empty($error)){
            session_start();
            $_SESSION['errorAuth'] = $error;
            header('Location: ../index.php?action=login'); 
        }
    }
    
}

function auth($email,$password){
    $user = getUserByEmail($email);
    if($user){
        var_dump($user[0]->password);
        var_dump($password);
        var_dump(password_verify($password,$user[0]->password));
        if(password_verify($password,$user[0]->password)){
            session_start();
            $_SESSION['user']['email']=$user[0]->email;
            $_SESSION['user']['nom']=$user[0]->nom;
            header('Location: ../index.php?action=home');
        }else return "password incorrect";
    }else return "user does not existe";
}
?>