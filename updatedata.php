<?php
    require_once "dbconfig/dbconnect.php";
    
    $id = $_GET['id'];

    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];

    $sql = "UPDATE student SET fullname='$fullname',dob='$dob',address='$student_address', postalcode='$postalcode' WHERE id=".$id;
    // echo $sql;
    // exit();
    mysqli_query($conn,$sql);
    header('location:index.php');