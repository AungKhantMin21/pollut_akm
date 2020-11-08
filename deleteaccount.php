<?php
    session_start();
    if(empty($_SESSION['id'])){
        echo '<script type="text/javascript">'; 
        echo 'alert("You do not have permission to do this. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }else{
        require_once "dbconfig/dbconnect.php";
        $user = "SELECT * FROM user WHERE id=".$_SESSION['id'];
        $userdata = mysqli_query($conn,$user);
        $user_result = mysqli_fetch_array($userdata);
        $id = $_GET['id'];

        if($user_result['status'] == '0' || $user_result['id'] == $id){
            $id = $_GET['id'];
    
            $qsql= "DELETE FROM question WHERE id = '$id';";
            $asql= "DELETE FROM answer WHERE id ='$id';";
            mysqli_query($conn,$qsql);
            mysqli_query($conn,$asql);
            $sql = "DELETE FROM user WHERE id ='$id';";
            mysqli_query($conn,$sql);
            if($user_result['id'] == $id){
                session_start();
                session_destroy();
            }
            header('location:index.php');
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not have permission to do this.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }




    