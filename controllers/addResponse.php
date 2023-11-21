<?php
    include_once '../models/db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['response'] ) && isset($_POST['btnresponse'] )) {
            $user_id=$_SESSION['user']['id'];
            $question_id=$_GET['question'];
            addResponse($user_id,$question_id,$_POST['response']);
        }
    }

    header("Location: ../index.php?action=question&id=".$user_id);
?>