<?php
    session_start();
    require_once "dbconfig/dbconnect.php";
    if(empty($_SESSION['id']))
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("You do not have permission to visit this page. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{
        $id = $_GET['id'];

        $sql = "SELECT * FROM question AS q, user AS u WHERE q.id=u.id AND q.question_id =".$id;
        //echo $sql;
        //exit();
        $dataset = mysqli_query($conn,$sql);
        $qu_result = mysqli_fetch_array($dataset);
        // var_dump($result);
        $tbluser = "SELECT * FROM user WHERE id= '".$_SESSION['id']."'";
        $dataset = mysqli_query($conn,$tbluser);
        $result = mysqli_fetch_array($dataset);
        if($result['id'] == $qu_result['id']){
            if(empty($_POST['question'])){
                echo '<script type="text/javascript">'; 
                echo 'alert("Question cannot be blank.");'; 
                echo 'window.location.href = "index.php";';
                echo '</script>';
            }else{
                $id = $_GET['id'];

                $question = $_POST['question'];
            
                $sql = "UPDATE question SET question='".$question."' WHERE question_id=".$id;
                // echo $sql;
                // exit();
                mysqli_query($conn,$sql);
                header('location:account.php');
            }
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not own this question.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }