<?php
function databaseConnection(){
    return $pdo = new PDO("mysql: host=localhost; dbname=forum;","root", '');
}

function isEmailExist($email) {
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT count(*) FROM `users` WHERE email = ?");
    $requet->execute([$email]);
    $count= $requet->fetchColumn();
    return $count > 0;

}
function addUser($nom, $email, $password) {

    if (isEmailExist($email)) {
        return "Email already exist";
    }
    $pdo = databaseConnection();
    $requet = $pdo->prepare("INSERT INTO `users`(`nom`, `email`, `password`) VALUES ( ?, ?, ?)");
    return $requet->execute([$nom, $email, $password]);
}

function getUserByEmail($email){
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT * FROM `users` WHERE email = ?");
    $requet->execute([$email]);
    $user = $requet->fetchAll(PDO::FETCH_OBJ);
    return $user;
} 

?>