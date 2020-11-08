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
        $id = $_GET['id'];

        if($user_result['id'] == $id){
    
            if(empty($_POST['username'])){
                echo '<script type="text/javascript">'; 
                echo 'alert("Data cannot be blank");'; 
                echo 'window.location.href = "index.php";';
                echo '</script>';
            }else{
                $username = $_POST['username'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $dob = $_POST['dob'];
                $address = $_POST['address'];
                $postalcode = $_POST['postalcode'];
    
                
                $sql = "UPDATE user SET username='$username',fullname='$fullname',email='$email', dob='$dob', address='$address', postalcode='$postalcode'  WHERE id=".$id;
                //echo $sql;
                //exit();
                mysqli_query($conn,$sql);
                header('location:account.php');
            }
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not own this account.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }
    
    

    