<?php
    require_once "dbconfig/dbconnect.php";
    if(isset($_POST['answer'])){
        $username = $_GET['user'];
        //echo $username;
        $tbluser = "SELECT * FROM user WHERE id= '".$username."'";
        //echo $tbluser;
        $dataset = mysqli_query($conn,$tbluser);
        $result = mysqli_fetch_array($dataset);
        $id= $result['id'];
        //echo $id;

        $question_id = $_GET['id'];
        //echo $question_id;
        //exit();
        $answer = $_POST['answer'];

        $sql = "INSERT INTO answer(answer,id,question_id) VALUES('$answer',$id,$question_id)";
        //echo $sql;
        //exit();

        mysqli_query($conn,$sql);
        header('location:account.php');  
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Answer cannot be blank");'; 
        echo 'window.location.href = "account.php#question";';
        echo '</script>';
    }
    
?>