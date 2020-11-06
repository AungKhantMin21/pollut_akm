<?php
    session_start();
    if(empty($_SESSION['id'])){
        echo '<script type="text/javascript">'; 
        echo 'alert("You does not have permission to visit this page. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{
        require_once "../dbconfig/dbconnect.php";
        $user = "SELECT status FROM user WHERE id = ".$_SESSION['id'];
        $dataset = mysqli_query($conn,$user);
        $result = mysqli_fetch_array($dataset);
        if($result['status'] !='0'){
            echo '<script type="text/javascript">'; 
            echo 'alert("You does not have permission to visit this page.");'; 
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
        else{
    require_once "../dbconfig/dbconnect.php";

    $id = $_GET['id'];

    $asql="DELETE FROM news WHERE news_id = ".$id;
    mysqli_query($conn,$sql);mysqli_query($conn,$asql);
    header('location:index.php');

            }
    }