<?php
    session_start();
    if(empty($_SESSION['id'])){
        echo '<script type="text/javascript">'; 
        echo 'alert("You do not have permission to visit this page. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{
        require_once "dbconfig/dbconnect.php";
        $current_user = "SELECT * FROM user WHERE id =".$_SESSION['id'];
        $current_data = mysqli_query($conn,$current_user);
        $current_result = mysqli_fetch_array($current_data);
        if($current_result['status'] == '0'){
            if(isset($_POST['answer'])){
                $id = $_GET['id'];
                $ans = "SELECT * FROM answer WHERE answer_id=".$id;
                $ans_data = mysqli_query($conn,$ans);
                $ans_result = mysqli_fetch_array($ans_data);
                if($current_result['id'] != $ans_result['id']){
                    echo '<script type="text/javascript">'; 
                    echo 'alert("You do not own this answer.");'; 
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                }else{
                    $answer = $_POST['answer'];

                    $sql = "UPDATE answer SET answer='".$answer."' WHERE answer_id=".$id;
                    // echo $sql;
                    // exit();
                    mysqli_query($conn,$sql);
                    header('location:account.php');
                }
            }
            else{
                echo '<script type="text/javascript">'; 
                echo 'alert("Answer cannot be blank");'; 
                echo 'window.location.href = "account.php#question";';
                echo '</script>';
            }
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not have admin role to do this.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
        
    } 