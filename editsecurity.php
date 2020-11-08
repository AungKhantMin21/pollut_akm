<?php
    session_start();
    require_once "dbconfig/dbconnect.php";
    $id = $_GET['id'];

    if(empty($_SESSION['id'])){
            echo '<script type="text/javascript">'; 
            echo 'alert("You have to login first to do this.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
    }
    else{
        $user = "SELECT * FROM user WHERE id=".$id;
        $data = mysqli_query($conn,$user);
        $result = mysqli_fetch_array($data);
        if($_SESSION['id']!= $result['id']){
            echo '<script type="text/javascript">'; 
            echo 'alert("You do not own this account.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }else{
            if(isset($_POST['status'])){
                $status = $_POST['status'];
                $sql = "UPDATE user SET status ='$status' WHERE id=".$id;
                //echo $sql;
                //exit();
                mysqli_query($conn,$sql);
                echo '<script type="text/javascript">'; 
                echo 'alert("User role update success.");'; 
                echo 'window.location.href = "account.php#v-pills-security";';
                echo '</script>';
                        
            }
            $oldpassword = md5($_POST['oldpassword']);
            $newpassword = md5($_POST['newpassword']);
            $confirmpw = md5($_POST['confirmpw']);
            if($result['password'] == $oldpassword){
                if($newpassword == $confirmpw){
                    $sql = "UPDATE user SET password = '$confirmpw' WHERE id=".$id;
                    //echo $sql;
                    //exit();
                    mysqli_query($conn,$sql);
                    echo '<script type="text/javascript">'; 
                    echo 'alert("Password update success.");'; 
                    echo 'window.location.href = "account.php#v-pills-security";';
                    echo '</script>';
                }else{
                    echo '<script type="text/javascript">'; 
                    echo 'alert("New password is not equal to confirm password.");'; 
                    echo 'window.location.href = "account.php";';
                    echo '</script>';
                }
            } else{
                echo '<script type="text/javascript">'; 
                echo 'alert("Your old password is wrong.");'; 
                echo 'window.location.href = "account.php";';
                echo '</script>';
            }  
        }
    }
    
