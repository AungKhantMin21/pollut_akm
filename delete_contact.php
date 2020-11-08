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
    
        if($user_result['status'] == '0'){
            $id = $_GET['id'];
    
            $sql = "DELETE FROM contactus WHERE contactus_id = ".$id;
            mysqli_query($conn,$sql);
            header('location:account.php');
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not have permission to do this.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }
    

    