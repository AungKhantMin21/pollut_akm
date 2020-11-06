<?php include("layout/header.php");
    if(empty($_SESSION['id'])){
        echo '<script type="text/javascript">'; 
        echo 'alert("You does not have permission to visit this page. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{
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
       
?>

<section>
    <div class="col-md-7 mx-auto">
        <form action="insert_news.php?userid=<?php echo $_SESSION['id'];?>" method="POST" enctype="multipart/form-data">
            <div class="card my-5 shadow-sm">
                <div class="card-body">
                    <h3 class="text-center">Upload news</h3>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Description</label>
                        <textarea type="text" class="form-control" name="description" rows="6" placeholder="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Types of New</label>
                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                            <option value="0">Our news</option>
                            <option value="1">Global news</option>
                            <option value="2">Local news</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">#Tags</label>
                        <input type="text" class="form-control" name="tags" placeholder="tags">
                    </div>            
                    <label>Cover Photo</label>
                    <div class="custom-file">
                        <input type="file" name="photo">
                    </div>
                    <button class="btn btn-dark mt-3" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>

<?php  }
    }
include("layout/footer.php");?>