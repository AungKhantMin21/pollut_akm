<?php
    session_start();
    require_once "dbconfig/dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql= "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
    
    $result = mysqli_query($conn,$sql);
    $dataset = mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    if($count == 1){
        $_SESSION['username'] = $username;
        header("location:index.php");
    }
    else{
        header("location:aboutus.php");
    }
?>