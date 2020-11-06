<?php
    require_once "dbconfig/dbconnect.php";
    
    $id = $_GET['id'];

    $password = md5($_POST['password']);
    $status = $_POST['status'];

    $sql = "UPDATE user SET password = '$password', status = '$status' WHERE id=".$id;
    //echo $sql;
    //exit();
    mysqli_query($conn,$sql);
    header('location:account.php');