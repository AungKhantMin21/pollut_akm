<?php
    session_start();
    require_once "dbconfig/dbconnect.php";
    
    if(empty($_SESSION['id'])){
        echo '<script type="text/javascript">'; 
        echo 'alert("You do not have permission to visit this page.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{
        if(isset($_POST['question'])){
            $id = $_SESSION['id'];
            $tbluser = "SELECT id FROM user WHERE id= '".$id."'";
            //echo $tbluser;
            $dataset = mysqli_query($conn,$tbluser);
            $result = mysqli_fetch_array($dataset);
            $id= $result['id'];
            //echo $id;
            $question = $_POST['question'];
            $sql = "INSERT INTO question(question,id) VALUES('$question',$id)";
            //echo $sql;
            //exit();
            mysqli_query($conn,$sql);
            header('location:faq.php');
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("Question cannot be blank");'; 
            echo 'window.location.href = "askquestion.php";';
            echo '</script>';
        }
    }
?>