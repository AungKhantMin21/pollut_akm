<?php include("layout/header.php");
require_once "dbconfig/dbconnect.php";
if(empty($_SESSION['id']))
{
    echo '<script type="text/javascript">'; 
    echo 'alert("You does not have permission to visit this page. You need to login first.");'; 
    echo 'window.location.href = "index.php";';
    echo '</script>';
}
else{


$tbluser = "SELECT * FROM user WHERE id= '".$_SESSION['id']."'";
$dataset = mysqli_query($conn,$tbluser);
$result = mysqli_fetch_array($dataset);
$tblquestion = "SELECT * FROM question AS q, user AS u WHERE q.id = u.id ORDER BY q.question_id DESC;";
$q_dataset = mysqli_query($conn,$tblquestion);
?>

<section>
        <div class="container">
            <div class="row w-100">
                <div class="col-md-10 mx-auto mt-5">
                    <h4 class=" font-weight-normal">Frequantly asked questions</h4>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-10 mx-auto mb-5 pr-0">
                    <a href="askquestion.php" class="text-info">Do you have any question to ask?</a><br><br>
                    <?php while($q_result = mysqli_fetch_array($q_dataset)){
                            $question_id= $q_result['question_id'];
                            $tblanswer = "SELECT * FROM answer AS a, question AS q, user AS u WHERE a.question_id = q.question_id AND a.id = u.id AND a.question_id='$question_id';";
                            $a_dataset = mysqli_query($conn,$tblanswer);
                            if( $a_result = mysqli_fetch_array($a_dataset)){ ?>
                    <div class="accordion" id="accordionExample">
                        <div class="card w-100 m-0 rounded-0 m-0">
                            <div class="card-header px-0 py-0 rounded-0" style="border-left:5px solid #17a2b8;" id="headingOne">
                                <button class="btn btn-block pb-2 pt-3 m-0 text-left rounded-0" type="button" style="background-color: rgb(245, 245, 245);" data-toggle="collapse" data-target="#collapase<?php echo $question_id;?>" aria-expanded="false" aria-controls="collapase<?php echo $question_id;?>">
                                    <h6><span class="text-info" style="font-size:25px;">Q.</span>&nbsp; <?php echo $q_result['question'];?></h6>
                                </button>
                            </div>
                            <div id="collapase<?php echo $question_id;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <?php $tblanswer = "SELECT * FROM answer AS a, question AS q, user AS u WHERE a.question_id = q.question_id AND a.id = u.id AND a.question_id='$question_id';";
                                $a_dataset = mysqli_query($conn,$tblanswer);
                                while($a_result = mysqli_fetch_array($a_dataset)){?>
                                <div class="card-body" style="border-left: 5px solid ##6c757d;">
                                    <span class="text-secondary" style="font-size:25px; border-left: 5px solid ##6c757d;">Ans.</span>&nbsp; <?php echo $a_result['answer'];?> 
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </section>

<?php }
include("layout/footer.php");?>