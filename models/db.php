<?php

// Database Connection
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
function getQuetions() {
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT * FROM `questions` WHERE 1 ORDER BY `id` DESC");
    $requet->execute();
    $questions = $requet->fetchAll(PDO::FETCH_OBJ);
    return $questions;
}
function getReponses($question_id) {
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT * FROM `reponses` WHERE question_id = ?");
    $requet->execute([$question_id]);
    $reponses = $requet->fetchAll(PDO::FETCH_OBJ);
    return $reponses;
}
function getUserNameById($userId){
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT nom FROM `users` WHERE id = ?");
    $requet->execute([$userId]);
    $nom = $requet->fetchAll(PDO::FETCH_OBJ);
    return $nom[0]->nom;
}
function getQuetionById($question_id) {
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT * FROM `questions` WHERE `id`=?");
    $requet->execute([$question_id]);
    $questions = $requet->fetchAll(PDO::FETCH_OBJ);
    return $questions[0];
}
function getNumberOfAnswers($question_id){
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT count(*) FROM `reponses` WHERE question_id = ?");
    $requet->execute([$question_id]);
    $reponses = $requet->fetchColumn();
    return $reponses;
}
function getAnswers($question_id){
    $pdo = databaseConnection();
    $requet = $pdo->prepare("SELECT * FROM `reponses` WHERE question_id = ?  ORDER BY `reponses`.`id` DESC");
    $requet->execute([$question_id]);
    $reponses = $requet->fetchAll();
    return $reponses;
}
function addResponse($user_id, $question_id, $response) {
    $pdo = databaseConnection();
    $date = date("Y-m-d h:m:s");
    $requet = $pdo->prepare("INSERT INTO `reponses`( `user_id`, `question_id`, `response`, `date`) VALUES (?,?,?,?)");
    return $requet->execute([$user_id, $question_id, $response,$date]);
}
function addquestion($user_id, $question) {
    $pdo = databaseConnection();
    $date = date("Y-m-d h:m:s");
    $requet = $pdo->prepare("INSERT INTO `questions`( `user_id`, `question`, `date`) VALUES (?,?,?)");
    return $requet->execute([$user_id,$question,$date]);
}

?>