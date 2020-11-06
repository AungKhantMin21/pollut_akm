<?php include("layout/header.php");
      $news = "SELECT * FROM news as n, user as u WHERE category = 0 AND n.id=u.id;";
      $newsdata = mysqli_query($conn,$news);
      $globalnews = "SELECT * FROM news as n, user as u WHERE category = 1 AND n.id=u.id;";
      $globalnewsdata = mysqli_query($conn,$globalnews);
      $localnews = "SELECT * FROM news as n, user as u WHERE category = 2 AND n.id=u.id;";
      $localnewsdata = mysqli_query($conn,$localnews);
      if(!empty($_SESSION['id'])){ 
        if($result['status'] == 0){
            $user = "SELECT * FROM user WHERE id =".$_SESSION['id'];     
            } else{}
        } else{}
      
      ?>

<section>
    <div class="container-fluid my-5">
        <div class="row mt-5">
            <div class="col-md-4">
                <h3 class="mb-5 text-center">Our News</h3>
                <?php while($result_news = mysqli_fetch_array($newsdata)){ ?>
                    <div class="row mb-4">
                        <div class="col-5">
                            <img src="../images/<?php echo $result_news['photo'];?>" style="height:80px; object-fit:cover;" class="w-100" alt="">
                        </div>
                        <div class="col-7 pl-0">
                            <div class="row">
                                <div class="col-10">
                                    <h6><a href="news.php?id=<?php echo $result_news['news_id'];?>" class="text-dark text-decoration-none"><?php echo $result_news['title'];?></a></h6>
                                    <span class="text-muted"><?php echo $result_news['username'];?> &nbsp;|&nbsp; <?php echo $result_news['date'];?></span>
                                </div>
                                <div class="col-2">
                                    <?php if(!empty($_SESSION['id'])){ 
                                        if($result['status'] == 0){?>
                                            <div class="dropdown">
                                                <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item bg-light" href="edit.php?id=<?php echo $result_news['news_id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item bg-light" href="delete.php?id=<?php echo $result_news['news_id'];?>"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                </div>
                                            </div>
                                        <?php } else{}
                                        } else{}?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="col-md-4">
                <h3 class="mb-5 text-center">Global News</h3>
                <?php while($result_news = mysqli_fetch_array($globalnewsdata)){ ?>
                    <div class="row mb-4">
                        <div class="col-5">
                            <img src="../images/<?php echo $result_news['photo'];?>" style="height:80px; object-fit:cover;" class="w-100" alt="">
                        </div>
                        <div class="col-7 pl-0">
                            <div class="row">
                                <div class="col-10">
                                    <h6><a href="news.php?id=<?php echo $result_news['news_id'];?>" class="text-dark text-decoration-none"><?php echo $result_news['title'];?></a></h6>
                                    <span class="text-muted"><?php echo $result_news['username'];?> &nbsp;|&nbsp; <?php echo $result_news['date'];?></span>
                                </div>
                                <div class="col-2">
                                <?php if(!empty($_SESSION['id'])){ 
                                        if($result['status'] == 0){?>
                                            <div class="dropdown">
                                                <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item bg-light" href="edit.php?id=<?php echo $result_news['news_id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item bg-light" href="delete.php?id=<?php echo $result_news['news_id'];?>"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                </div>
                                            </div>
                                        <?php } else{}
                                        } else{}?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="col-md-4">
                <h3 class="mb-5 text-center">Local News</h3>
                <?php while($result_news = mysqli_fetch_array($localnewsdata)){ ?>
                    <div class="row mb-4">
                        <div class="col-5">
                            <img src="../images/<?php echo $result_news['photo'];?>" style="height:80px; object-fit:cover;" class="w-100" alt="">
                        </div>
                        <div class="col-7 pl-0">
                            <div class="row">
                                <div class="col-10">
                                    <h6><a href="news.php?id=<?php echo $result_news['news_id'];?>" class="text-dark text-decoration-none"><?php echo $result_news['title'];?></a></h6>
                                    <span class="text-muted"><?php echo $result_news['username'];?> &nbsp;|&nbsp; <?php echo $result_news['date'];?></span>
                                </div>
                                <div class="col-2">
                                <?php if(!empty($_SESSION['id'])){ 
                                        if($result['status'] == 0){?>
                                            <div class="dropdown">
                                                <button class="btn btn-sm pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item bg-light" href="edit.php?id=<?php echo $result_news['news_id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item bg-light" href="delete.php?id=<?php echo $result_news['news_id'];?>"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                </div>
                                            </div>
                                        <?php } else{}
                                        } else{}?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>

<?php include("layout/footer.php");?>