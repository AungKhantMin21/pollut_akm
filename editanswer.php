<?php
    require_once "dbconfig/dbconnect.php";

    $qid = $_GET['qid'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM question AS q, user AS u, answer as a WHERE q.id=u.id AND q.question_id=a.question_id AND a.answer_id='$id' AND q.question_id =".$qid;
    //echo $sql;
    //exit();
    $dataset = mysqli_query($conn,$sql);
    $qu_result = mysqli_fetch_array($dataset);
    // var_dump($result);
?>

<?php include("layout/header.php");?>

    <section>
        <div class="container">
            <div class="row w-100">
                <div class="col-md-8 mx-auto my-5 text-center">
                    <div class="card">
                        <div class="card-body shadow-sm text-left">
                            <span class="text-muted"><?php echo $qu_result['username'];?></span><br>
                            <span class="text-muted"><?php echo $qu_result['question_date'];?></span><br>
                            <p><?php echo $qu_result['question'];?></p>
                            <hr>
                            <h6>Answer section</h6>
                            <form class="my-3 text-right" action="update_ans.php?id=<?php echo $qu_result['answer_id'];?>" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control text-left" name="answer" placeholder="Your answer" rows="5" required><?php echo $qu_result['answer'];?></textarea>
                                </div>
                                <a href="account.php" class="btn btn-outline-danger px-3 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-dark px-3">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include("layout/footer.php");?>