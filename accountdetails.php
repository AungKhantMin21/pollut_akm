<?php
    require_once "../dbconfig/dbconnect.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id =".$id;
    $dataset = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($dataset);
    // var_dump($result);
?>