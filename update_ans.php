<?php
    require_once "dbconfig/dbconnect.php";
    
    $id = $_GET['id'];

    $answer = $_POST['answer'];

    $sql = "UPDATE answer SET answer='".$answer."' WHERE answer_id=".$id;
    // echo $sql;
    // exit();
    mysqli_query($conn,$sql);
    header('location:account.php');