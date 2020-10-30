<?php
    session_start();
    require_once "dbconfig/dbconnect.php";
    
    if(isset($_POST['username'],$_POST['email'],$_POST['subject'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $tbluser = "SELECT id FROM user WHERE username= '".$username."' AND email='".$email."'";
        //echo $tbluser;
        $dataset = mysqli_query($conn,$tbluser);
        $result = mysqli_fetch_array($dataset);
        $id= $result['id'];
        //echo $id;
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if(empty($_SESSION['username']))
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("You does not have permission to do this. You need to login first.");'; 
            echo 'window.location.href = "contactus.php";';
            echo '</script>';
        }
        else{
            if($username != $_SESSION['username']){
                echo '<script type="text/javascript">'; 
                echo 'alert("You have to put your username.");'; 
                echo 'window.location.href = "contactus.php";';
                echo '</script>';
            }
            else{
                $sql = "INSERT INTO contactus(subject,message,id) VALUES('".$subject."','".$message."',$id)";
                //echo $sql;
                //exit();
                mysqli_query($conn,$sql);
                header('location:contactus.php');   
            }
        }
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Question cannot be blank");'; 
        echo 'window.location.href = "contactus.php";';
        echo '</script>';
    }
?>