<?php include("layout/header.php"); ?>

<section>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="w-100 border-bottom pb-4">User Details</h3>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 border-right mr-5">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active bg-grenn" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Home</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    
                    <div class="row">
                        <div class="col-md-4 my-3">
                            <label>Username</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="username" value="" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-4 my-3">
                            <label>Fullname</label>
                            <input type="text" class="form-control pl-2 rounded-0" name="fullname" value="" placeholder="Fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="col-md-4 my-3">
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
                    </div>
                    
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                    
                </div>
            </div>
        </div>
    </div>

</section>

<?php include("layout/footer.php");?>