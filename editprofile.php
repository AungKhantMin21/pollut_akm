<?php
    require_once "dbconfig/dbconnect.php";
    
    $id = $_GET['id'];

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];

    $sql = "UPDATE user SET username='$username',fullname='$fullname',email='$email', dob='$dob', address='$address', postalcode='$postalcode'  WHERE id=".$id;
    //echo $sql;
    //exit();
    mysqli_query($conn,$sql);
    header('location:account.php');