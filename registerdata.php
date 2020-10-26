<?php


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