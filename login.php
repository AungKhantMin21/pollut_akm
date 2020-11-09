<?php
    session_start();
    require_once "dbconfig/dbconnect.php";

    $msg='';
    if(isset($_POST['username'],$_POST['password'])){
        $time=time()-600;
        $ip_address=getIpAddr();
        // Getting total count of hits on the basis of IP
        $query=mysqli_query($conn,"SELECT count(*) as total_count from loginlogs where TryTime > $time and IpAddress='$ip_address'");
        $check_login_row=mysqli_fetch_assoc($query);
        $total_count=$check_login_row['total_count'];
        //Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
        if($total_count==3){
            echo '<script type="text/javascript">'; 
            echo 'alert("You have no attempt left. Please try again after 10 min.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }else{
        //Getting Post Values
            $username = $_POST['username'];
            $password = md5($_POST['password']);

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
                    mysqli_query($conn,"DELETE FROM loginlogs");
                }else{
                    header("location:index.php");
                    mysqli_query($conn,"DELETE FROM loginlogs");
                }
            }else{
                $total_count++;
                $rem_attm=3-$total_count;
                if($rem_attm == 0){
                    echo '<script type="text/javascript">'; 
                    echo "alert('You have no attempt left. Please try again after 10 min.');"; 
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                }else{
                    echo '<script type="text/javascript">'; 
                    echo "alert('The login attempt failed. $rem_attm attempts remaining.');"; 
                    echo 'window.location.href = "index.php";';
                    echo '</script>';
                }
                $try_time=time();
                mysqli_query($conn,"INSERT into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
                }
        }
    }else{
        echo '<script type="text/javascript">'; 
        echo 'alert("Username and password cannot be blank");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    // Getting IP Address
    function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
    return $ipAddr;
    }


    /*if(isset($_POST['username'],$_POST['password'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

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
    }*/
    
?>