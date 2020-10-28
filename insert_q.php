<?php
    require_once "dbconfig/dbconnect.php";
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tbluser = "SELECT id FROM user WHERE username= '".$username."' AND email='".$email."'";
    //echo $tbluser;
    $dataset = mysqli_query($conn,$tbluser);
    $result = mysqli_fetch_array($dataset);
    $id= $result['id'];
    //echo $id;
    $question = $_POST['question'];

    $sql = "INSERT INTO question(question,id) VALUES('$question',$id)";
    //echo $sql;
    //exit();
    mysqli_query($conn,$sql);
    header('location:contactus.php');
?>