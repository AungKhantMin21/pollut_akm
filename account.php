<?php 
    include("layout/header.php");
    if(empty($_SESSION['username']))
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("You does not have permission to visit this page. You need to login first.");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
    else{

    require_once "dbconfig/dbconnect.php";
    $tbluser = "SELECT * FROM user WHERE username= '".$_SESSION['username']."'";
    $dataset = mysqli_query($conn,$tbluser);
    $result = mysqli_fetch_array($dataset);
    $tblquestion = "SELECT * FROM question AS q, user AS u WHERE q.id = u.id ORDER BY q.question_id DESC;";
    $q_dataset = mysqli_query($conn,$tblquestion);
    $userquestion = "SELECT * FROM question as q, user AS u WHERE q.id = u.id AND u.username= '".$_SESSION['username']."' ORDER BY q.question_id DESC";
    //echo $userquestion;
    //exit();
    $qu_dataset= mysqli_query($conn,$userquestion);
    
?>

<section>
    <div class="container-fluid my-5">
        <div class="row mt-4">
            <div class="col-md-3 mr-5">
                <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active tabs rounded-0" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">General</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Security</a>
                    <a class="nav-link tabs rounded-0" id="question-tab" data-toggle="pill" href="#question" role="tab" aria-controls="question" aria-selected="false">Question</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-answers-tab" data-toggle="pill" href="#v-pills-answers" role="tab" aria-controls="v-pills-answers" aria-selected="false">Answers</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-news-tab" data-toggle="pill" href="#v-pills-news" role="tab" aria-controls="v-pills-news" aria-selected="false">News</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w-100 pb-5 mt-3"><?php echo $result['username']?>'s Account</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label>Username</label>
                                <div class="form-control pl-2 rounded-0 border"><?php echo $result['username'];?></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Fullname</label>
                                <div class="form-control pl-2 rounded-0 border"><?php echo $result['fullname'];?></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Date of Birth</label>
                                <div class="form-control pl-2 rounded-0 border"><?php echo $result['dob'];?></div>
                            </div>
                            <div class="col-md-4 my-3">
                                <label>Email</label>
                                <div class="form-control pl-2 rounded-0 border"><?php echo $result['email'];?></div>
                            </div>
                            <div class="col-md-4 my-3">
                                <label>Address</label>
                                <div class="form-control pl-2 rounded-0 border"><?php echo $result['address'];?></div>
                            </div>
                            <div class="col-md-4 my-3">
                                <label>Postal Code</label>
                                <div class="form-control pl-2 rounded-0 border"><?php echo $result['postalcode'];?></div>
                            </div>
                            <a class="btn btn-outline-danger ml-3 mr-2 mt-3 px-3" data-toggle="modal" data-target="#deleteaccModal">Delete</a>
                            <a class="btn btn-dark mt-3 px-4" id="editprofile-tab" data-toggle="pill" href="#editprofile" role="tab" aria-controls="editprofile" aria-selected="true">Edit</a>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w-100 pb-5 mt-3">Edit <?php echo $result['username'];?>'s Account</h3>
                            </div>
                        </div>
                        <form action="editprofile.php?id=<?php echo $result['id'];?>" method="POST">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Username</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="username" value="<?php echo $result['username'];?>" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="fullname" value="<?php echo $result['fullname'];?>" placeholder="Fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Date of Birth</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="dob" value="<?php echo $result['dob'];?>" placeholder="Date of birth" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="email" value="<?php echo $result['email'];?>" placeholder="Email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <label>Address</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="address" value="<?php echo $result['address'];?>" placeholder="Address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="postalcode" value="<?php echo $result['postalcode'];?>" placeholder="Postal Code" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <button type="reset" class="btn btn-outline-danger ml-3 mr-2 mt-3 px-3" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Back</button>
                                <button type="submit" class="btn btn-dark mt-3 px-4">Edit</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w-100 pb-5 mt-3">Security</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>User Password</label>
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-12 px-0">
                                            <div class="form-control pl-2 rounded-0 border"><?php echo $result['password'];?></div>
                                        </div>
                                        <small class="mt-2 text-muted">
                                            It's a good idea to use strong password for stronger security.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>User Role</label>
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-12 px-0">
                                            <div class="form-control pl-2 rounded-0 border"><?php 
                                            if( $result['status'] == 0){
                                                echo "Admin";
                                            }else{
                                                echo "User";
                                            }?></div>
                                        </div>
                                        <small class="mt-2 text-muted">
                                            User Roles can be thought of as "permission groups" that define the access that certain users have in Asset Essentials.
                                        </small>
                                    </div>
                                </div>

                            </div>
                            <a class="btn btn-dark ml-3 px-4" id="editsecurity-tab" data-toggle="pill" href="#editsecurity" role="tab" aria-controls="editsecurity" aria-selected="true">Edit</a>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="editsecurity" role="tabpanel" aria-labelledby="editsecurity-tab">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w-100 pb-5 mt-3">Security</h3>
                            </div>
                        </div>
                        <form action="editsecurity.php?id=<?php echo $result['id'];?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Password</label>
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="col-12 px-0">
                                                <input type="text" class="form-control pl-2 rounded-0" name="password" value="<?php echo $result['password'];?>" placeholder="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                            </div>
                                            <small class="mt-2 text-muted">
                                                It's a good idea to use strong password for stronger security.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>User Role</label>
                                    <div class="p-3">
                                        <div class="row">
                                            <div class="col-12 px-0">
                                            <select name="status" class="custom-select rounded-0" id="inputGroupSelect01">
                                                <?php if($result['status'] == 0){ ?>
                                                    <option selected value="0">Admin</option>
                                                    <option value="1">User</option>
                                                <?php } else{?>
                                                    <option value="0">Admin</option>
                                                    <option selected value="1">User</option>
                                                <?php }?>
                                            </select>
                                            </div>
                                            <small class="mt-2 text-muted">
                                                User Roles can be thought of as "permission groups" that define the access that certain users have in Asset Essentials.
                                            </small>
                                        </div>
                                    </div>

                                </div>
                                <button type="reset" class="btn btn-outline-danger ml-3 px-3" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Back</button>
                                <button type="submit" class="btn btn-dark ml-2 px-4">Edit</button>

                            </div>
                        </form>
                    </div>
                    <!--<div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Manage Access</label>
                            <div class="p-3 border-bottom">
                                <div class="row">
                                    <div class="col-12 px-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Fullname</th>
                                            <th scope="col">Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>Admin</td>
                                            </tr>
                                            <tr>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>Admin</td>
                                            </tr>
                                            <tr>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>Admin</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    <small class="mt-2 text-muted">
                                        User Roles can be thought of as "permission groups" that define the access that certain users have in Asset Essentials.
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <div class="tab-pane fade show" id="question" role="tabpanel" aria-labelledby="question-tab">
                        <div class="col-md-12"> 
                            <?php if($result['status'] == 0){?>
                                <h3 class="w-100 text-center pb-5 mt-3">All questions asked by users</h3>
                                    <?php while($q_result = mysqli_fetch_array($q_dataset)){
                                        $question_id= $q_result['question_id'];
                                        $tblanswer = "SELECT * FROM answer AS a, question AS q, user AS u WHERE a.question_id = q.question_id AND a.id = u.id AND a.question_id='$question_id';";
                                        $a_dataset = mysqli_query($conn,$tblanswer);
                                        if( $a_result = mysqli_fetch_array($a_dataset)){ ?>
                                            <div class="card mb-3">
                                                <div class="card-body shadow-sm">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span class="text-muted"><?php echo $q_result['username'];?></span><br>
                                                            <span class="text-muted"><?php echo $q_result['question_date'];?></span><br>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                        <?php if($result['status'] == 0){?>
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                                    <button class="dropdown-item bg-light" href="#" data-toggle="modal" data-target="#editquestion"><i class="fas fa-edit"></i> Edit</button>
                                                                    <a class="dropdown-item bg-light" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                    <a class="dropdown-item bg-light" href="#"><i class="fas fa-upload"></i> Post to FAQs</a>
                                                                </div>
                                                            </div>
                                                        <?php } else{}?>
                                                        </div>
                                                    </div>
                                                    <p><?php echo $q_result['question'];?></p>
                                                    <hr>
                                                    <h6>Answer section</h6>
                                                    <?php if($result['status'] == 0){ ?>
                                                        <div class="card mb-3">
                                                            <div class="card-body bg-light p-2 border-0">
                                                                <span class="text-muted"><?php echo $a_result['username'];?> (admin)</span><br>                                                              
                                                                <p><?php echo $a_result['answer'];?></p>
                                                            </div>
                                                        </div>
                                                        <form action="insert_ans.php?id=<?php echo $q_result['question_id'];?>&user=<?php echo $result['id'];?>" method="POST">
                                                            <textarea class="form-control mb-2" name="answer" placeholder="Your answer" rows="3" required></textarea>
                                                            <button type="submit" class="btn btn-dark">Submit</button>
                                                        </form>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="card mb-3">
                                                <div class="card-body shadow-sm">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span class="text-muted"><?php echo $q_result['username'];?></span><br>
                                                            <span class="text-muted"><?php echo $q_result['question_date'];?></span><br>
                                                        </div>
                                                        <div class="col-6 text-right">
                                                            <?php if($result['status'] == 0){?>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                                    <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item bg-light" href="#"><i class="fas fa-edit"></i> Edit</a>
                                                                        <a class="dropdown-item bg-light" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                        <a class="dropdown-item bg-light" href="#"><i class="fas fa-upload"></i> Post to FAQs</a>
                                                                    </div>
                                                                </div>
                                                            <?php } else{}?>
                                                        </div>
                                                    </div>
                                                    <p><?php echo $q_result['question'];?></p>
                                                    <hr>
                                                    <h6>Answer section</h6>
                                                    <?php if($result['status'] == 0){ ?>
                                                        <form action="insert_ans.php?id=<?php echo $q_result['question_id'];?>&user=<?php echo $result['id'];?>" method="POST">
                                                            <textarea class="form-control mb-2" name="answer" placeholder="Your answer" rows="3" required></textarea>
                                                            <button type="submit" class="btn btn-dark">Submit</button>
                                                        </form>
                                                    <?php }?>
                                                </div>
                                            </div>
                                    <?php }
                                    }}else{ ?>
                                        <h3 class="w-100 text-center pb-5 mt-3">Your questions</h3>
                                        <?php while($qu_result = mysqli_fetch_array($qu_dataset)){
                                            $question_id= $qu_result['question_id'];
                                            $tblanswer = "SELECT * FROM answer AS a, question AS q, user AS u WHERE a.question_id = q.question_id AND a.id = u.id AND a.question_id='$question_id';";
                                            $a_dataset = mysqli_query($conn,$tblanswer);
                                            if( $a_result = mysqli_fetch_array($a_dataset)){?>
                                                <div class="card mb-3">
                                                    <div class="card-body shadow-sm">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <span class="text-muted"><?php echo $qu_result['username'];?></span><br>
                                                                <span class="text-muted"><?php echo $qu_result['question_date'];?></span><br>
                                                            </div>
                                                            <div class="col-6 text-right">
                                                            <?php if($result['id'] = $qu_result['id']){?>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                                    <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item bg-light" href="#"><i class="fas fa-edit"></i> Edit</a>
                                                                        <a class="dropdown-item bg-light" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            <?php } else{}?>
                                                            </div>
                                                        </div>
                                                        <p><?php echo $qu_result['question'];?></p>
                                                        <hr>
                                                        <h6>Answer section</h6>
                                                        <?php if($result['status'] == 0){ ?>
                                                            <p><?php echo $qu_result['answer'];?></p>
                                                            <form action="insert_ans.php" method="POST">
                                                                <textarea class="form-control mb-2" name="answer" placeholder="Your answer" rows="3" required></textarea>
                                                                <button type="submit" class="btn btn-dark">Submit</button>
                                                            </form>
                                                        <?php }else{?>
                                                            <div class="card">
                                                                <div class="card-body bg-light p-2 border-0">
                                                                    <span class="text-muted"><?php echo $a_result['username'];?> (admin)</span><br>                                                              
                                                                    <p><?php echo $a_result['answer'];?></p>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="card mb-3">
                                                    <div class="card-body shadow-sm">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <span class="text-muted"><?php echo $qu_result['username'];?></span><br>
                                                                <span class="text-muted"><?php echo $qu_result['question_date'];?></span><br>
                                                            </div>
                                                            <div class="col-6 text-right">
                                                                <?php if($result['id'] = $qu_result['id']){?>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                                        <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                                            <a class="dropdown-item bg-light" href="#"><i class="fas fa-edit"></i> Edit</a>
                                                                            <a class="dropdown-item bg-light" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                <?php } else{}?>
                                                            </div>
                                                        </div>
                                                        <p><?php echo $qu_result['question'];?></p>
                                                        <hr>
                                                        <h6>Answer section</h6>
                                                        <p>There's no answers yet.</p>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        <?php }
                                    }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- delete account confirm modal-->
    <div class="modal fade" id="deleteaccModal" tabindex="-1" aria-labelledby="deleteaccModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body px-5 py-4" style="height:250px;">
            <br>
                <h4 class="text-center">Are you sure?</h4>
                <p class="text-center mb-4">Do you really want to delete the account? This process cannot be undone</p>
                <div class="col-md-6 mx-auto">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancel</button>
                    <a href="deleteaccount.php?id=<?php echo $result['id']?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
            </div>
        </div>
    </div>

</section>
<br><br><br>
<?php }
include("layout/footer.php");?>