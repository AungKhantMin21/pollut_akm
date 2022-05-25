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
        $target = "../images/".basename($_FILES['photo']['name']);


        $photo = $_FILES['photo']['name'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $tags = $_POST['tags'];
        $id = $_GET['userid'];
        $date = date('F jS Y');

        $sql = "INSERT INTO news(title,description,photo,date,category,tags,id) VALUES (\"".$title."\",\"".$description."\",\"".$date."\",\"".$photo."\",'$category',\"".$tags."\",'$id');";
        mysqli_query($conn,$sql);
        echo $sql;

        if(move_uploaded_file($_FILES['photo']['tmp_name'],$target)){
            echo "Success";
        }
        else{
            echo "fail";
        }
        header("location:index.php");
        }
    }