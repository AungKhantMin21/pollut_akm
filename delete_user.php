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
        $user = "SELECT * FROM user WHERE id ='".$_SESSION['id']."';";
        $data = mysqli_query($conn,$user);
        $result= mysqli_fetch_array($data);
        if($result['status'] == "0"){
            $id = $_GET['id'];

            $question = "SELECT * FROM question WHERE id='".$id."';";
            $q_data = mysqli_query($conn,$question);
            $q_result = mysqli_fetch_array($q_data);
            $q_count = mysqli_num_rows($q_data);
            echo $question;
            echo "<br>".$q_count."<br>";
            if($q_count != 0){
                $qsql= "DELETE FROM question WHERE id ='$id';";
                echo $qsql."<br>";
                mysqli_query($conn,$qsql);
                $ansq = "SELECT * FROM answer as a, question as q WHERE a.question_id=q.question_id AND q.id= '$id';";
                $ansq_data = mysqli_query($conn,$ansq);
                $ansq_result = mysqli_fetch_array($ansq_data);
                $ansq_count = mysqli_num_rows($ansq_data);
                if($ansq_count != 0){
                    $qasql = "DELETE FROM answer WHERE question_id='".$ansq_result['question_id']."';";
                    echo $qasql."<br>";
                    
                    mysqli_query($conn,$qasql);
                    $qsql= "DELETE FROM question WHERE id ='$id';";
                    echo $qsql."<br>";
                    mysqli_query($conn,$qsql);
                    $sql = "DELETE FROM user WHERE id ='$id';";
                    echo $sql."<br>";
                    mysqli_query($conn,$sql);
                    header("location:account.php");
                }
                $sql = "DELETE FROM user WHERE id ='$id';";
                echo $sql."<br>";
                mysqli_query($conn,$sql);
                header("location:account.php");
                
            }
            $answer = "SELECT * FROM answer WHERE id='$id';";
            echo $answer;
            $a_data = mysqli_query($conn,$answer);
            $a_result = mysqli_fetch_array($a_data);
            $a_count = mysqli_num_rows($a_data);
            if($a_count != 0){
                $asql= "DELETE FROM answer WHERE id ='$id';";
                mysqli_query($conn,$asql);
                $sql = "DELETE FROM user WHERE id ='$id';";
                echo $sql."<br>";
                mysqli_query($conn,$sql);
                header("location:account.php");
            }
            $sql = "DELETE FROM user WHERE id ='$id';";
            echo $sql."<br>";
            mysqli_query($conn,$sql);
            header("location:account.php");
            
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You have no permission to do this.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }