<?php
    require_once "dbconfig/dbconnect.php";
    
    $id = $_GET['id'];

    $question = $_POST['question'];

    $sql = "UPDATE question SET question='".$question."' WHERE question_id=".$id;
    // echo $sql;
    // exit();
    mysqli_query($conn,$sql);
    header('location:account.php');