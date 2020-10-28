<?php
    require_once "dbconfig/dbconnect.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id = ".$id;
    mysqli_query($conn,$sql);
    session_start();
    session_destroy();
    header('location:index.php');