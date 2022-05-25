<?php
    session_start();
    require_once "dbconfig/dbconnect.php";
    
    if(isset($_POST['name'],$_POST['email'],$_POST['subject'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $date = date('F jS Y');
        $sql = "INSERT INTO contactus(name,email,subject,message,contact_date) VALUES('".$name."','".$email."','".$subject."','".$message."','".$date."')";
        //echo $sql;
        //exit();
        mysqli_query($conn,$sql);
        header('location:contactus.php');   
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Question cannot be blank");'; 
        echo 'window.location.href = "contactus.php";';
        echo '</script>';
    }
?>