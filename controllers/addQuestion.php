<?php
    include_once '../models/db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['question'] )) {
            $user_id=$_SESSION['user']['id'];
            addquestion($user_id,$_POST['question']);
        }
    }

    header("Location: ../index.php?action=home");
?>