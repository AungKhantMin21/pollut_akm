<?php
    session_start();
    if(empty($_SESSION['id'])){
        echo '<script type="text/javascript">'; 
        echo 'alert("You do not have permission to do this. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{
        require_once "dbconfig/dbconnect.php";

        $id = $_GET['qid'];
        $user = "SELECT * FROM user WHERE id ='".$_SESSION['id']."';";
        $data = mysqli_query($conn,$user);
        $result= mysqli_fetch_array($data);

        $ques = "SELECT * FROM question AS q, user AS u WHERE q.id = u.id AND q.question_id=".$id;
        //echo $ques;
        //exit();
        $ques_data = mysqli_query($conn,$ques);
        $ques_result = mysqli_fetch_array($ques_data);

        if($result['status'] == '0' || $result['id'] == $ques_result['id']){
            $sql = "DELETE FROM question WHERE question_id = ".$id;
            $asql="DELETE FROM answer WHERE question_id = ".$id;
            mysqli_query($conn,$asql); mysqli_query($conn,$sql);
            header('location:account.php');
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not have permission to do this.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
        
    }
