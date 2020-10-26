<?php 
    include("layout/header.php");
    require_once "dbconfig/dbconnect.php";

?>

<section>
    <div class="container-fluid my-5">
        <div class="row mt-4">
            <div class="col-md-3 mr-5">
                <div class="nav flex-column nav-pills mt-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active tabs rounded-0" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">General</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-security-tab" data-toggle="pill" href="#v-pills-security" role="tab" aria-controls="v-pills-security" aria-selected="false">Security</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-question-tab" data-toggle="pill" href="#v-pills-question" role="tab" aria-controls="v-pills-question" aria-selected="false">Question</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-answers-tab" data-toggle="pill" href="#v-pills-answers" role="tab" aria-controls="v-pills-answers" aria-selected="false">Answers</a>
                    <a class="nav-link tabs rounded-0" id="v-pills-news-tab" data-toggle="pill" href="#v-pills-news" role="tab" aria-controls="v-pills-news" aria-selected="false">News</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="alert alert-success" role="alert">
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="w-100 pb-5 mt-3">User Account</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="username" value="" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Fullname</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="fullname" value="" placeholder="Fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="dob" value="" placeholder="Date of birth" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-4 my-3">
                            <label>Email</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="email" value="" placeholder="Email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-4 my-3">
                            <label>Address</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="address" value="" placeholder="Address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-4 my-3">
                            <label>Postal Code</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="postalcode" value="" placeholder="Postal Code" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <button class="btn btn-outline-danger ml-3 mx-2 mt-3 px-4">Delete</button>
                        <button class="btn btn-dark ml-3 mx-2 mt-3 px-4">Edit</button>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="w-100 pb-5 mt-3">Security</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>User Password</label>
                            <div class="p-3 border-bottom">
                                <div class="row">
                                    <div class="col-11 px-0">
                                        <div class="form-control pl-2 rounded-0 border">12345</div>
                                    </div>
                                    <div class="col-1 px-2 text-right">
                                        <button class="btn btn-dark" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Edit</button>
                                    </div>
                                    <small class="mt-2 text-muted">
                                        It's a good idea to use strong password for stronger security.
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>User Role</label>
                            <div class="p-3 border-bottom">
                                <div class="row">
                                    <div class="col-11 px-0">
                                        <div class="form-control pl-2 rounded-0 border">Admin</div>
                                    </div>
                                    <div class="col-1 px-2 text-right">
                                        <button class="btn btn-dark" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Edit</button>
                                    </div>
                                    <small class="mt-2 text-muted">
                                        User Roles can be thought of as "permission groups" that define the access that certain users have in Asset Essentials.
                                    </small>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
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
                    </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>
<br><br><br>
<?php include("layout/footer.php");?>