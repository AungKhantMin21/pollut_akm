<?php include("layout/header.php");
    $news_id = $_GET['id'];
    require_once "../dbconfig/dbconnect.php";
    $sql = "SELECT * FROM news as n, user as u WHERE n.id=u.id AND news_id = ".$news_id;
    $dataset = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($dataset);
    $current_cate = $result['category'];
    $local = "SELECT * FROM news WHERE category = '".$current_cate."' AND news_id != '$news_id' ORDER BY news_id DESC";
    $data = mysqli_query($conn,$local);
?>

<div class="container-fluid">
    <div class="row my-5">
        <div class="col-md-12">
            <div class="card shadow-sm py-0">
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-md-2 pb-3 pt-5">
                            <div class="sticky-top">
                                <span class="font-weight-bold mt-2 p-1 bg-dark text-white" style="font-size:20px;"># <?php echo $result['tags'];?></span>
                                <br><br>
                                <span>Written by : <b><?php echo $result['username'];?></b></span><br> 
                                <span class="text-muted"><?php echo $result['date'];?></span><br>
                                <hr class="my-1 mt-3"><hr class="my-1"><hr class="my-1 mb-3">
                                <a href="https://web.facebook.com/" class="btn btn-outline-dark btn-sm rounded-circle" style="width:28px; height:28px;"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://instagram.com/?hl=en" class="btn btn-outline-dark btn-sm rounded-circle" style="width:28px; height:28px;"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/" class="btn btn-outline-dark btn-sm rounded-circle" style="width:28px; height:28px;"><i class="fab fa-twitter" aria-hidden="true"></i></a><br><br>
                            </div>
                        </div>
                        <div class="col-md-7 bg-light pb-3 px-0 pt-5">
                            <h4 class="px-3 font-weight-bold" style="font-family: 'Guardian Egyptian Web',Georgia,serif;"><?php echo $result['title'];?></h4>
                            <img src="../images/<?php echo $result['photo'];?>" class="w-100 my-3" style="height:350px; object-fit:cover;" alt="">
                            <p class="px-3" style="font-family: 'Guardian Egyptian Web',Georgia,serif;"><?php echo $result['description'];?></p>
                        </div>          
                        <div class="col-md-3 pb-3 pt-5">
                            <div class="sticky-top">
                                <h5>Related news</h5>
                                <?php $i = 1;
                                    while(($result_news = mysqli_fetch_array($data)) && ($i<=4)){ 
                                    ?>

                                    <div class="row mb-4">
                                        <div class="col-5">
                                            <img src="../images/<?php echo $result_news['photo'];?>" style="height:80px; object-fit:cover;" class="w-100" alt="">
                                        </div>
                                        <div class="col-7 pl-0">
                                            <h6><a href="news.php?id=<?php echo $result_news['news_id'];?>" class="text-dark text-decoration-none"><?php echo $result_news['title'];?></a></h6>
                                        </div>
                                    </div>
                                <?php $i++;
                                }?>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<?php include("layout/footer.php");?>