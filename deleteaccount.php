<?php
    require_once "dbconfig/dbconnect.php";

    $id = $_GET['id'];

    $qsql= "DELETE FROM question WHERE id = '$id';";
    $asql= "DELETE FROM answer WHERE id ='$id';";
    mysqli_query($conn,$qsql);
    mysqli_query($conn,$asql);
    $sql = "DELETE FROM user WHERE id ='$id';";
    mysqli_query($conn,$sql);
    session_start();
    session_destroy();
    header('location:index.php');