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
    $tbluser = "SELECT * FROM user WHERE username= '".$result['username']."'";
    $dataset = mysqli_query($conn,$tbluser);
    $result = mysqli_fetch_array($dataset);
    $tblquestion = "SELECT * FROM question AS q, user AS u WHERE q.id = u.id ORDER BY q.question_id DESC;";
    $q_dataset = mysqli_query($conn,$tblquestion);
    $userquestion = "SELECT * FROM question as q, user AS u WHERE q.id = u.id AND u.username= '".$result['username']."' ORDER BY q.question_id DESC";
    $tblcontactus = "SELECT * FROM contactus ORDER BY contactus_id DESC";
    $c_dataset = mysqli_query($conn,$tblcontactus);
    //echo $userquestion;
    //exit();
    $qu_dataset= mysqli_query($conn,$userquestion);
    $user = "SELECT * FROM user";
    $u_dataset = mysqli_query($conn,$user);
    
?>

<section>
    <div class="container-fluid my-5">
        <div class="row mt-4">
            <div class="col-md-3 mr-5">
                <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php if($result['status'] == 0){ ?>
                    <a class="nav-link active tabs rounded-0" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">General</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Security</a>
                    <a class="nav-link tabs rounded-0" id="question-tab" data-toggle="pill" href="#question" role="tab" aria-controls="question" aria-selected="false">Question</a>
                    <a class="nav-link tabs rounded-0" id="contactus-tab" data-toggle="pill" href="#contactus" role="tab" aria-controls="contactus" aria-selected="false">Contact</a>
                    <a class="nav-link tabs rounded-0" id="userlist-tab" data-toggle="pill" href="#userlist" role="tab" aria-controls="userlist" aria-selected="false">User list</a>
                    <?php } else{?>
                        <a class="nav-link active tabs rounded-0" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">General</a>
                        <a class="nav-link tabs rounded-0" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Security</a>
                        <a class="nav-link tabs rounded-0" id="question-tab" data-toggle="pill" href="#question" role="tab" aria-controls="question" aria-selected="false">Question</a>
                    <?php }?>
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

                    <div class="tab-pane fade show" id="contactus" role="tabpanel" aria-labelledby="contactus-tab">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w-100 pb-5 mt-3">Users Messages</h3>
                            </div>
                        </div>
                        <?php while($c_result = mysqli_fetch_array($c_dataset)){?>
                        <div class="card mb-3">
                            <div class="card-body shadow-sm">
                                <div class="row">
                                    <div class="col-9">
                                        <span class="text-muted"><?php echo $c_result['name']." ( ".$c_result['email']." )";?></span><br>
                                        <span class="text-muted"><?php echo $c_result['contact_date'];?></span><br>
                                    </div>
                                    <div class="col-3 text-right">
                                        <a href="delete_contact.php?id=<?php echo $c_result['contactus_id'];?>" class="btn btn-outline-danger rounded-circle btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <h4 class="my-2"><?php echo $c_result['subject'];?></h4>
                                <p><?php echo $c_result['message'];?></p>
                            </div>
                        </div>
                        <?php }?>
                    </div>

                    <div class="tab-pane fade show" id="userlist" role="tabpanel" aria-labelledby="userlist-tab">
                        <div class="row">
                            <div class="col-md-12 px-0 w-100 text-center">
                                <h3 class="w-100 pb-5 mt-3">Users Lists</h3>
                            </div>
                        </div>
                        <button class="float-right mb-3 btn btn-outline-success rounded-0" id="create_user-tab" data-toggle="pill" href="#create_user" role="tab" aria-controls="create_user" aria-selected="true">Create new user</button>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                    <tr class=" text-center bg-light">
                                        <th scope="col">ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Birthday</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Postal Code</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                <?php while($u_result = mysqli_fetch_array($u_dataset)){?>
                                    <tr>
                                        <td class="text-center"><?php echo $u_result['id'];?></td>
                                        <td class="text-center"><?php echo $u_result['username'];?></td>
                                        <td class="text-center"><?php echo $u_result['fullname'];?></td>
                                        <td class="text-center"><?php echo $u_result['email'];?></td>
                                        <td class="text-center"><?php echo $u_result['dob'];?></td>
                                        <td class="text-center"><?php echo $u_result['address'];?></td>
                                        <td class="text-center"><?php echo $u_result['postalcode'];?></td>
                                        <td class="text-center"><?php if($u_result['status'] == '0'){
                                                echo "Admin";
                                            }else{
                                                echo "User";
                                            }?></td>
                                        <td class="text-center"><a href="delete_user.php?id=<?php echo $u_result['id'];?>" class="btn text-danger rounded-circle align-middle"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade show" id="create_user" role="tabpanel" aria-labelledby="create_user-tab">
                        <div class="row">
                            <div class="col-md-12 px-0 w-100 text-center">
                                <h3 class="w-100 pb-5 mt-3">Create New User</h3>
                            </div>
                        </div>
                        <form action="create_user.php" method="POST">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Username</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Date of Birth</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="dob" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <label>Address</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control pl-2 rounded-0" name="postalcode" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4 mx-auto my-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control pl-2 rounded-0" name="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="col-md-4 mx-auto my-3">
                                    <label>Role</label>
                                    <select name="status" class="custom-select rounded-0" id="inputGroupSelect01">
                                        <option value="0">Admin</option>
                                        <option selected value="1">User</option>
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                                <button type="reset" class="btn btn-outline-danger ml-3 mr-2 mt-3 px-3" id="userlist-tab" data-toggle="pill" href="#userlist" role="tab" aria-controls="userlist" aria-selected="true">Back</button>
                                <button type="submit" class="btn btn-dark mt-3 px-4">Create</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w-100 pb-5 mt-3">Security</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label>Change Password</label>
                            <form action="editsecurity.php?id=<?php echo $result['id'];?>" method="POST">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-12 px-0">
                                            <input class="form-control pl-2 rounded-0 mb-4 border" placeholder="Old password" name="oldpassword">
                                            <input class="form-control pl-2 rounded-0 mb-4 border" placeholder="New password" name="newpassword">
                                            <input class="form-control pl-2 rounded-0 border" placeholder="Confirm password" name="confirmpw">
                                        
                                    </div>
                                    <small class="mt-2 text-muted">
                                        It's a good idea to use long password for stronger security.
                                    </small>
                                </div>
                            </div>
                            <button class="btn btn-dark mb-4 px-4" type="submit">Update password</button>
                            </form>
                        </div>
                        <div class="col-md-8">
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
                                    <?php
                                        if( $result['status'] == 0){ ?>
                                            <button type="button" class="btn btn-dark mr-2 mt-3 px-3" id="editsecurity-tab" data-toggle="pill" href="#editsecurity" role="tab" aria-controls="editsecurity" aria-selected="true">Edit user role</button>
                                        <?php }else{ ?>
                                            
                                        <?php }?>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="editsecurity" role="tabpanel" aria-labelledby="editsecurity-tab">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="w-100 pb-5 mt-3">Security</h3>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label>Change Password</label>
                                    <form action="editsecurity.php?id=<?php echo $result['id'];?>" method="POST">
                                        <div class="p-3">
                                            <div class="row">
                                                <div class="col-12 px-0">
                                                        <input class="form-control pl-2 rounded-0 mb-4 border" placeholder="Old password" name="oldpassword">
                                                        <input class="form-control pl-2 rounded-0 mb-4 border" placeholder="New password" name="newpassword">
                                                        <input class="form-control pl-2 rounded-0 border" placeholder="Confirm password" name="confirmpw">
                                                    
                                                </div>
                                                <small class="mt-2 text-muted">
                                                    It's a good idea to use long password for stronger security.
                                                </small>
                                            </div>
                                        </div>
                                        <button class="btn btn-dark mb-4 px-4" type="submit">Update password</button>
                                    </form>
                                </div>
                                <div class="col-md-8">
                                    <label>User Role</label>
                                    <form action="editsecurity.php?id=<?php echo $result['id'];?>" method="POST">
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
                                <button type="reset" class="btn btn-outline-danger px-3" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Back</button>
                                <button type="submit" class="btn btn-dark ml-2 px-4">Edit</button>
                                </form>
                            </div>
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
                                                                    <a class="dropdown-item bg-light" href="delete_question.php?qid=<?php echo $q_result['question_id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                    <a class="dropdown-item bg-light" href="#"><i class="fas fa-upload"></i> Post to FAQs</a>
                                                                </div>
                                                            </div>
                                                        <?php } else{}?>
                                                        </div>
                                                    </div>
                                                    <p><?php echo $q_result['question'];?></p>
                                                    <hr>
                                                    <h6>Answer section</h6>
                                                    <?php if($result['status'] == 0){ 
                                                        $tblanswer = "SELECT * FROM answer AS a, question AS q, user AS u WHERE a.question_id = q.question_id AND a.id = u.id AND a.question_id='$question_id';";
                                                        $a_dataset = mysqli_query($conn,$tblanswer);
                                                        while($a_result = mysqli_fetch_array($a_dataset)){?>
                                                        
                                                        <div class="card mb-3">
                                                            <div class="card-body bg-light p-2 border-0">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <span class="text-muted"><?php echo $a_result['username'];?> (admin)</span> 
                                                                    </div>
                                                                    <div class="col-6 text-right">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                                            <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item bg-light" href="editanswer.php?id=<?php echo $a_result['answer_id'];?>&qid=<?php echo $q_result['question_id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                                                                <a class="dropdown-item bg-light" href="delete_answer.php?id=<?php echo $a_result['answer_id'];?>&qid=<?php echo $q_result['id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                 
                                                                <?php echo $a_result['answer'];?>
                                                            </div>
                                                        </div>
                                                        <?php }?>
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
                                                                        <a class="dropdown-item bg-light" href="delete_question.php?qid=<?php echo $q_result['question_id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
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
                                                                        <a href="editquestion.php?id=<?php echo $qu_result['question_id'];?>"  class="btn dropdown-item bg-light"><i class="fas fa-edit"></i> Edit</a>
                                                                        <a class="dropdown-item bg-light" href="delete_question.php?qid=<?php echo $qu_result['question_id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            <?php } else{}?>
                                                            </div>
                                                        </div>
                                                        <p><?php echo $qu_result['question'];?></p>
                                                        <hr>
                                                        <h6>Answer section</h6>
                                                        <?php if($result['status'] == 0){ 
                                                            $tblanswer = "SELECT * FROM answer AS a, question AS q, user AS u WHERE a.question_id = q.question_id AND a.id = u.id AND a.question_id='$question_id';";
                                                            $a_dataset = mysqli_query($conn,$tblanswer);
                                                            while($a_result = mysqli_fetch_array($a_dataset)){?>
                                                        
                                                                <div class="card mb-3">
                                                                    <div class="card-body bg-light p-2 border-0">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <span class="text-muted"><?php echo $a_result['username'];?> (admin)</span> 
                                                                            </div>
                                                                            <div class="col-6 text-right">
                                                                                <div class="dropdown">
                                                                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                                                    <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                                                        <a class="dropdown-item bg-light" href="delete_answer.php?id=<?php echo $a_result['answer_id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                                 
                                                                        <p><?php echo $a_result['answer'];?></p>
                                                                    </div>
                                                                </div>
                                                                <?php }?>
                                                            <form action="insert_ans.php" method="POST">
                                                                <textarea class="form-control mb-2" name="answer" placeholder="Your answer" rows="3" required></textarea>
                                                                <button type="submit" class="btn btn-dark">Submit</button>
                                                            </form>
                                                        <?php }else{
                                                            $tblanswer = "SELECT * FROM answer AS a, question AS q, user AS u WHERE a.question_id = q.question_id AND a.id = u.id AND a.question_id='$question_id';";
                                                            $a_dataset = mysqli_query($conn,$tblanswer);
                                                            while($a_result = mysqli_fetch_array($a_dataset)){?>
                                                        
                                                                <div class="card mb-3">
                                                                    <div class="card-body bg-light p-2 border-0">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <span class="text-muted"><?php echo $a_result['username'];?> (admin)</span> 
                                                                            </div>
                                                                            <div class="col-6 text-right">
                                                                                <div class="dropdown">
                                                                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                                                                                    <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="dropdownMenuButton">
                                                                                        <a class="dropdown-item bg-light" href="delete_answer.php?id=<?php echo $a_result['answer_id'];?>&qid=<?php echo  $qu_result['question_id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>                                                 
                                                                        <p><?php echo $a_result['answer'];?></p>
                                                                    </div>
                                                                </div>
                                                                <?php }?>
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
                                                                            <a href="editquestion.php?id=<?php echo $qu_result['question_id'];?>" class="btn dropdown-item bg-light"><i class="fas fa-edit"></i> Edit</a>
                                                                            <a class="dropdown-item bg-light" href="delete_question.php?qid=<?php echo $qu_result['question_id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
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