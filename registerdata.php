<?php

    session_start();
    require_once "dbconfig/dbconnect.php";
    if(isset($_POST['username'],$_POST['email'],$_POST['password'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $status = (isset($_POST['status']))? $_POST['status']:'0';
        $fullname= $_POST['fullname'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $postalcode = $_POST['postalcode'];

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


        $sql="INSERT INTO user(username,email, password,status,fullname,address,postalcode,dob) VALUES('".$username."','".$email."','".$password."','".$status."','".$fullname."','".$address."','".$postalcode."','".$dob."')";
        mysqli_query($conn,$sql);
        

        $sql= "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
        
        $result = mysqli_query($conn,$sql);
        $dataset = mysqli_fetch_array($result);


        $count = mysqli_num_rows($result);
        if($count == 1){
            $_SESSION['id']= $dataset['id'];
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $dataset['status'];
            if($dataset['status'] == "0"){
                header("location:account.php");
            }else{
                header("location:index.php");
            }
        }
        else{
            header("location:index.php");
        }
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Signup form cannot be blank");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }