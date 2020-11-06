<?php
    session_start();
    require_once "../dbconfig/dbconnect.php";
    if(!empty($_SESSION['username'])){
        $sql="SELECT * FROM user WHERE id ='".$_SESSION['id']."'";
        $dataset = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($dataset);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css'/>
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
    <style>
            .nav-pills .nav-link.active,
            .nav-pills .show > .nav-link {
            color: #343a40;
            background:white;
            border-left:5px solid #343a40;
            border-radius:0px;
            }

            .tabs{
                border-radius:0px;
                border:1px solid #dee2e6;
                color:#343a40;
            }

            .tabs:hover{
                color:rgb(26, 26, 26);
            }
    </style>
</head>
<body>
<!-- navbar for desktop version-->
<div class="col-md-12 d-lg-block d-none" style="background-color: rgba(245, 245, 245, 0.966); border-bottom: 1px solid rgb(216, 216, 216);">
    <div class="container pr-4">
        <div class="row py-3">
            <div class="col-md-4 pr-0">
                <button data-trigger="#my_offcanvas1" class="btn btn-sm pt-1 mb-2"><i class="fas fa-bars align-middle" style="font-size: 22px;"></i></button>
            </div>
            <div class="col-md-4 text-center px-0">
                <h2 class='font-weight-bold text-dark' style="font-family: serif; font-style: oblique;">Pollut</h2>
            </div>
            <div class="col-md-4 text-right px-0">
                <?php
                
                if(!empty($_SESSION['username']))
                {   
                    ?>
                    <a href='../account.php?id=<?php echo $result['id'];?>' class='btn btn-dark btn-sm rounded-pill mr-2 px-3 py-2'><i class='fa fa-user'></i> &nbsp;Welcome, <?php echo $result['username'];?></a>
                    <a href='../logout.php' class='btn btn-outline-dark btn-sm rounded-pill px-3 py-2'><i class="fas fa-sign-out-alt"></i>&nbsp;LOGOUT</a>
                <?php } else {?>
                <button class="btn btn-outline-dark btn-sm rounded-pill px-3 py-2" data-toggle="modal" data-target="#login"><i class="fa fa-user"></i> &nbsp;LOGIN</button>
                <?php }?>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6 px-0" style="font-size: 13.5px;">
                <nav class="nav">
                    <span class="nav-link text-cad py-1"><i class="fas fa-location-arrow align-baseline"></i> &nbsp;New York, USA</span>
                    <span class="nav-link text-cad py-1"><i class="fa fa-envelope-open align-baseline" aria-hidden="true"></i> &nbsp;info@pollut.com</span>
                    <span class="nav-link text-cad py-1"><i class="fas fa-phone align-baseline"></i>+1-202-555-987</span>
                </nav>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3 text-cad" style="font-size: 13.5px;">
                <div class="row pt-1 float-right pl-3">
                    <span class="text-uppercase mr-2" style="font-weight: 500;">follow us on</span>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link px-1 text-dark py-0" href="https://www.facebook.com/"><i class="fab fa-facebook-square align-middle" style="font-size:17px;"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1 text-dark py-0" href="https://www.instagram.com/?hl=en"><i class="fab fa-instagram align-middle" style="font-size:17px; "></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1 text-dark py-0" href="https://twitter.com/?lang=en"><i class="fab fa-twitter-square align-middle" style="font-size: 17px; "></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-1 text-dark py-0" href="https://www.youtube.com/"><i class="fab fa-youtube align-middle" style="font-size: 17px; "></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas panel for desktop version -->
<b class="screen-overlay"></b>
<aside class="offcanvas" id="my_offcanvas1">
    <button class="btn text-white mx-1 float-right btn-close"> <i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="p-4 bg-dark">
    </div>
    <nav class="list-group list-group-flush">
        <a href="../index.php" class="list-group-item border-0 text-dark text-decoration-none">Home</a>
        <a href="../aboutus.php" class="list-group-item border-0 text-dark text-decoration-none">About</a>
        <a href="index.php" class="list-group-item border-0 text-dark text-decoration-none">News</a>
        <?php if(!empty($_SESSION['id'])){
            if($result['status'] == "0"){ ?>
                <a href="upload.php" class="list-group-item border-0 text-dark text-decoration-none">Upload News</a>
            <?php }else{}
        }else{}?>
        <a href="../contactus.php" class="list-group-item border-0 text-dark text-decoration-none">Contact Us</a>
        <a href="../faq.php" class="list-group-item border-0 text-dark text-decoration-none">FAQ</a>
    </nav>
</aside>
<!-- navbar for mobile version -->
<nav class="navbar navbar-expand-lg navbar-light d-lg-none d-xl-none shadow-sm sticky-top" style="border-bottom: 0.1px solid rgba(167, 167, 167, 0.349); background-color: rgba(245, 245, 245, 0.966);">
    <div class="container">
        <a class="navbar-brand font-weight-bold py-0" style="font-size:24px;" href="#">Pollut</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark mr-2" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark mr-2" href="../aboutus.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark mr-2" href="index.php">News</a>
                </li>
                <?php if(!empty($_SESSION['id'])){
                        if($result['status'] == "0"){ ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark mr-2" href="upload.php">News</a>
                        </li>
                    <?php }else{}
                }else{}?>
                <li class="nav-item">
                    <a class="nav-link text-dark mr-2" href="../contactus.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark mr-2" href="../faq.php">FAQ</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if(!empty($_SESSION['id']))
                {?>
                <li class="nav-item">
                    <button class="nav-link btn text-dark font-weight-bold mr-2" href="#"> <?php echo $result['username'];?></button>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark py-1 mt-1 rounded-pill" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </li>
                <?php } else{?>
                <li class="nav-item">
                    <button class="nav-link btn text-dark mr-2" href="#" data-toggle="modal" data-target="#login"><i class="fas fa-sign-in-alt align-middle"></i> Login</button>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark py-1 mt-1 rounded-pill" href="#" data-toggle="modal" data-target="#signup"><i class="fas fa-user" style="font-size: small;"></i> Signup</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!-- modal for login-->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-0">
            <div class="modal-body p-0">
                <div class="container fluid">
                    <div class="row">
                        <div class="col-sm-6 px-0">
                            <img src="https://us.123rf.com/450wm/oceloti/oceloti1502/oceloti150200019/37205728-industrial-plant-landscape-flat-style.jpg?ver=6" class="w-100 h-100" alt="">
                        </div>
                        <div class="col-sm-6">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button><br><br>
                        <div class="row px-2 mb-4 mt-3">
                        <div class="col-12 text-center">
                        <h4 class="w-100 font-weight-bold text-uppercase">Welcome back</h4>
                        </div>
                    </div>
                    <form action="../login.php" method="POST">
                    <div class="row px-2">
                        <div class="col-12">
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="username" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fa fa-key" aria-hidden="true"></i></span>
                                </div>
                                <input type="password" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="password" placeholder="Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                        </div>
                    </div>
                    <div class="row px-2 mt-2 mb-4">
                        <div class="col-12">
                            <button class="btn btn-dark btn-block mb-2">Login</button>
                            <small class="text-muted">Don't have an account?</small>
                            <a href="#" class="text-info" style="font-size:12px;" data-toggle="modal" data-target="#signup" data-dismiss="modal" aria-label="Close">Sign Up</a>
                        </div>
                    </div>
                    </form>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for signup -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-0">
        <div class="modal-body p-0">
                <div class="container fluid">
                    <div class="row">
                        <div class="col-sm-6 px-0">
                            <img src="https://img.freepik.com/free-vector/air-pollution-problem-big-city-two-children-silhouette-modern-city-with-skyscrapers-factories-garbage-pollution-cities-concept-urban-landscape-illustration_313242-19.jpg?size=626&ext=jpg&ga=GA1.2.1474196149.1603190938" class="w-100 h-100" alt="" style="filter:grayscale(100%); object-fit:cover;">
                        </div>
                        <div class="col-sm-6 pb-3">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row px-2 mb-4 mt-5">
                        <div class="col-12 text-center">
                        <h4 class="w-100 font-weight-bold text-uppercase">Create account</h4>
                        </div>
                    </div>
                    <form id="regForm" action="../registerdata.php" method="POST">
                    <div class="row px-2">
                        <div class="col-12">
                            <div class="tab">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    </div>  
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="username" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="email" placeholder="Email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fa fa-key" aria-hidden="true" ></i></span>
                                    </div>
                                    <input type="password" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="password" placeholder="Password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text  bg-white border-top-0 border-left-0 border-right-0 rounded-0" for="inputGroupSelect01">
                                            <i class="fas fa-user-cog"></i>
                                        </label>
                                    </div>
                                    <select name="status" class="custom-select border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroupSelect01">
                                        <option value="0">Admin</option>
                                        <option selected value="1">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fas fa-address-card"></i></span>
                                    </div>  
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="fullname" placeholder="Fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="dob" placeholder="Date of Birth (DD/MM/YY)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fas fa-location-arrow"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="postalcode" placeholder="Postal code" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-white border-top-0 border-left-0 border-right-0 rounded-0">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="address" placeholder="Address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" class="btn btn-outline-dark" onclick="nextPrev(-1)">Back</button>
                            <button type="button" id="nextBtn" class="btn btn-dark px-4" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <div class="row px-2 mt-2">
                        <div class="col-12">
                            <small class="text-muted">Already have an account?</small>
                            <a href="#" class="text-info" style="font-size:12px;" data-toggle="modal" data-target="#login" data-dismiss="modal" aria-label="Close">Login</a>
                        </div>
                    </div>
                    </form>
                    </div>
                    </div>
                    
            </div>
        </div>
    </div>
  </div>
</div>
<!-- modal for account details -->
<div class="modal fade" id="accdetails" tabindex="-1" aria-labelledby="accdetailsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-0">
        <div class="modal-body p-0">
                <div class="container fluid">
                    <div class="row">
                        <div class="col-sm-6 px-0">
                            <img src="https://img.freepik.com/free-vector/air-pollution-problem-big-city-two-children-silhouette-modern-city-with-skyscrapers-factories-garbage-pollution-cities-concept-urban-landscape-illustration_313242-19.jpg?size=626&ext=jpg&ga=GA1.2.1474196149.1603190938" class="w-100 h-100" alt="" style="filter:grayscale(100%); object-fit:cover;">
                        </div>
                        <div class="col-sm-6 pb-3">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row px-2 mb-4 mt-5">
                        <div class="col-12 text-center">
                        <h4 class="w-100 font-weight-bold text-uppercase">Account Details</h4>
                        </div>
                    </div>
                    <form action="./updatedata.php?id=<?php echo $result['id'];?>" method="POST">
                    <div class="row px-2">
                    <div class="tab">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fas fa-address-card"></i></span>
                                    </div>  
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="fullname" placeholder="Fullname" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="dob" placeholder="Date of Birth (DD/MM/YY)" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"  required>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-top-0 border-left-0 border-right-0 rounded-0" id="inputGroup-sizing-sm"><i class="fas fa-location-arrow"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="postalcode" placeholder="Postal code" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-white border-top-0 border-left-0 border-right-0 rounded-0">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" name="address" placeholder="Address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" class="btn btn-outline-dark" onclick="nextPrev(-1)">Back</button>
                            <button type="button" id="nextBtn" class="btn btn-dark px-4" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <div class="row px-2 mt-2">
                        <div class="col-12">
                            <small class="text-muted">Something wrong?</small>
                            <a href="#" class="text-info" style="font-size:12px;" data-toggle="modal" data-target="#signup" data-dismiss="modal" aria-label="Close">Go Back</a>
                        </div>
                    </div>
                    </form>
                    </div>
                    </div>
                    
            </div>
        </div>
    </div>
  </div>
</div>