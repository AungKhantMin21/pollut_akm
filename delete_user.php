<?php
    session_start();
    

    if(empty($_SESSION['id'])){
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not have permission to do this. You need to login first.");'; 
            echo 'window.location.href = "account.php";';
            echo '</script>';
        }
    else{
        require_once "dbconfig/dbconnect.php";
        $user = "SELECT * FROM user WHERE id =".$_SESSION['id'];
        $data = mysqli_query($conn,$user);
        $result= mysqli_fetch_array($data);
        if($result['status'] == "0"){
            $id = $_GET['id'];

            $qsql= "DELETE FROM question WHERE id = '$id';";
            $asql= "DELETE FROM answer WHERE id ='$id';";
            mysqli_query($conn,$qsql);
            mysqli_query($conn,$asql);
            $sql = "DELETE FROM user WHERE id ='$id';";
            mysqli_query($conn,$sql);
            header('location:account.php');
            
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You have no permission to do this.");'; 
            echo 'window.location.href = "account.php";';
            echo '</script>';
        }
    }