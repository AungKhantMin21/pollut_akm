<?php
    require_once "dbconfig/dbconnect.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM contactus WHERE contactus_id = ".$id;
    mysqli_query($conn,$sql);
    header('location:account.php');