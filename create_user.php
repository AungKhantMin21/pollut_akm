<?php
    session_start();
    

    if(empty($_SESSION['id'])){
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not have permission to do this. You need to login first.");'; 
            echo 'window.location.href = "account.php";';
            echo '</script>';
        }
    else{
        require_once "dbconfig/dbconnect.php";
        $user = "SELECT * FROM user WHERE id =".$_SESSION['id'];
        $data = mysqli_query($conn,$user);
        $result= mysqli_fetch_array($data);
        if($result['status'] == "0"){
            if(isset($_POST['username'])){
                $username = $_POST['username'];
                $fullname = $_POST['fullname'];
                $dob = $_POST['dob'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $postalcode = $_POST['postalcode'];
                $password = md5($_POST['password']);
                $status = $_POST['status'];
                $sql = "INSERT INTO user(username,fullname,dob,email,address,postalcode,password,status) VALUES('$username','$fullname','$dob','$email','$address','$postalcode','$password','$status')";

                mysqli_query($conn,$sql);
                header("location:account.php"); 
            }else{
                echo '<script type="text/javascript">'; 
                echo 'alert("Data cannot be blank.");'; 
                echo 'window.location.href = "account.php";';
                echo '</script>';
            }
            
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You have no permission to do this.");'; 
            echo 'window.location.href = "account.php";';
            echo '</script>';
        }
    }
    
?>