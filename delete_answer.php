<?php
    require_once "dbconfig/dbconnect.php";

    $id = $_GET['id'];

    $asql="DELETE FROM answer WHERE answer_id = ".$id;
    mysqli_query($conn,$sql);mysqli_query($conn,$asql);
    header('location:account.php');