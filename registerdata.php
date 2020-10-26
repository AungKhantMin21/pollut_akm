<?php

    session_start();
    require_once "dbconfig/dbconnect.php";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = (isset($_POST['status']))? $_POST['status']:'0';

    //if(isset($_POST['status'])){
    //    $status = $_POST['status'];
    //}
    //else{
    //    $status=0;
    //}
    //echo $username;
    //echo "<br/>";
    //echo $email;
    //echo "<br/>";
    //echo $password;
    //echo "<br/>";
    //echo $status;


    $sql="INSERT INTO user(username,email, password,status) VALUES('".$username."','".$email."','".$password."','".$status."')";
    mysqli_query($conn,$sql);
    

    $sql= "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
    
    $result = mysqli_query($conn,$sql);
    $dataset = mysqli_fetch_array($result);


    $count = mysqli_num_rows($result);
    if($count == 1){
        $_SESSION['username'] = $username;
        $_SESSION['flash'] = "You're successfully signup. You can edit your details here.";
        header("location:account.php");
    }
    else{
        header("location:aboutus.php");
    }