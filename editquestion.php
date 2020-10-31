<?php
    include("layout/header.php");
    require_once "dbconfig/dbconnect.php";
    if(empty($_SESSION['id']))
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("You does not have permission to visit this page. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{
        $id = $_GET['id'];

        $sql = "SELECT * FROM question AS q, user AS u WHERE q.id=u.id AND q.question_id =".$id;
        //echo $sql;
        //exit();
        $dataset = mysqli_query($conn,$sql);
        $qu_result = mysqli_fetch_array($dataset);
        // var_dump($result);
        $tbluser = "SELECT * FROM user WHERE id= '".$_SESSION['id']."'";
        $dataset = mysqli_query($conn,$tbluser);
        $result = mysqli_fetch_array($dataset);
        if($result['id'] == $qu_result['id']){
?>


    <section>
        <div class="container">
            <div class="row w-100">
                <div class="col-md-8 mx-auto my-5 text-center">
                    <div class="card">
                        <div class="card-body shadow-sm text-left">
                            <span class="text-muted"><?php echo $qu_result['username'];?></span><br>
                            <span class="text-muted"><?php echo $qu_result['question_date'];?></span><br>
                            <form class="my-3 text-right" action="update_q.php?id=<?php echo $qu_result['question_id'];?>" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control text-left" name="question" placeholder="Ask a question" rows="5" required><?php echo $qu_result['question'];?></textarea>
                                </div>
                                <button type="reset" class="btn btn-outline-danger px-3 mr-2">Cancel</button>
                                <button type="submit" class="btn btn-dark px-3">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } else{
        echo '<script type="text/javascript">'; 
        echo 'alert("You does not have permission to visit this page. You do not own this question.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';}
    }
    include("layout/footer.php");?>