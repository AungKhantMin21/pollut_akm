<?php
    require_once "dbconfig/dbconnect.php";

    $id = $_GET['qid'];

    $sql = "DELETE FROM question WHERE question_id = ".$id;
    $asql="DELETE FROM answer WHERE question_id = ".$id;
    mysqli_query($conn,$sql);mysqli_query($conn,$asql);
    header('location:account.php');