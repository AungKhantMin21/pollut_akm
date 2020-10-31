<?php
    session_start();
    require_once "dbconfig/dbconnect.php";

    if(isset($_POST['username'],$_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql= "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
        
        $result = mysqli_query($conn,$sql);
        $dataset = mysqli_fetch_array($result);

        $count = mysqli_num_rows($result);
        if($count == 1){
            $_SESSION['id']= $dataset['id'];
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $dataset['status'];
            if($dataset['status'] == "0"){
                header("location:account.php");
            }else{
                header("location:faq.php");
            }
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("The username or password are incorrect! Please try again.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }
    else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Username and password cannot be blank");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    
?>