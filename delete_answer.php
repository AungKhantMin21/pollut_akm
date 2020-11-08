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

        $id = $_GET['id'];
        $qid= $_GET['qid'];
        //echo $id; echo $qid;
        $ans_ques = "SELECT * FROM answer as a, question as q WHERE a.question_id=q.question_id AND a.question_id= $qid";
        $ans_ques_data = mysqli_query($conn,$ans_ques);
        $ans_ques_result = mysqli_fetch_array($ans_ques_data);

        //echo $ans_ques;
        //exit();
        $user = "SELECT * FROM user WHERE id ='".$_SESSION['id']."';";
        $data = mysqli_query($conn,$user);
        $result= mysqli_fetch_array($data);

        $ques = "SELECT * FROM question AS q, user AS u WHERE q.id = u.id AND q.id=".$result['id'];
        //echo $ques;
        //exit();
        $ques_data = mysqli_query($conn,$ques);
        $ques_result = mysqli_fetch_array($ques_data);

        if($result['status'] == '0' || $result['id'] == $ques_result['id'] || $result['id'] == $ans_ques_result['id']){
            $asql="DELETE FROM answer WHERE answer_id = ".$id;
            mysqli_query($conn,$sql);mysqli_query($conn,$asql);
            header('location:account.php');
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not have permission to do this.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
        
    }