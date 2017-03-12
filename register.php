<?php
    session_start();
    require_once("includes/config.php");
    require_once("includes/db.php");
    require("includes/check.php");

    if(isLoggedIn()){
      header("Location:myaccount.php?viewmode=dashboard");
      exit();
    }
    include("admin/trans_registration.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/travenue.ico">
    <title>Register | TRAVENUE</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body style="background-image: url(img/bgapple.jpg);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;">
<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top animated fadeIn" style="background-color: #3a3a3a; color: #fff">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="img/gravenu.png" width=100px alt="Brand">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="search.php">Search Venue</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Venue Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>
                            <li><a href="register.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Register</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>  
    </nav>
<!-- /Fixed navbar -->

    <div class="container">
        <div class="row">
<!-- Shows the error messages if set-->
            
<!-- The REgistration Form -->
            <div class="col-md-10 col-md-offset-1 bordered" style="background-color: #fff;">
                <form class="form-signin" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='post'>
                    <center>
                        <h3 class="form-signin-heading">Venue Registration</h3>
                        <br>
                        <ul class="nav nav-pills nav-justified">
                            <li role="presentation" class="active"><a href="">Venue Admin</a></li>
                            <li role="presentation"><a href="looker_register.php">Venue Looker</a></li>
                        </ul>
                        <br><br>
                    </center>
                    <!-- Display Error Message -->
                    <?php if(isset($_GET['err'])){ ?>
                        <div class="alert alert-danger animated fadeInDown">
                            <?php echo $_GET['err']; ?>
                        </div>
                    <?php } ?>
                    <!-- Display Success Message -->
                    <?php if(isset($_GET['success'])){ ?>
                        <div class="alert alert-success animated fadeInDown">
                            <?php echo $_GET['success']; ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <!--venue registration-->
                        <div class="col-md-6" style="border-right: 2px dashed #e0e0e0; padding-right: 30px">
                            <center><legend style="color: #2196f3;">Venue Details</legend></center>
                            <!-- venue name-->
                            <label for="inputNamel">Venue name</label>
                            <input type="text" id="inputName" name="vname" class="form-control" placeholder="Venue name / title" value="<?php echo @$_SESSION['vname']; ?>" required autofocus>
                            <br>
                            <!-- email-->
                            <label for="inputVenueEmail">Venue Email address</label>
                            <input type="email" id="inputVenueEmail" name="vemailadd" class="form-control" placeholder="Email address" value="<?php echo @$_SESSION['vemailadd']; ?>" required autofocus>
                            <br>
                            <!-- Contact Number-->
                            <label for="inputCNumber">Venue Contact number</label>
                            <input type="text" id="inputCNumber" name="vcontactnum" class="form-control" placeholder="Contact number" value="<?php echo @$_SESSION['vcontactnum']; ?>" required autofocus>
                            <br>
                            <!-- CITY-->
                            <label for="inputVenueCity">City</label>
                            <input type="text" id="inputVenueCity" name="vcity" class="form-control" placeholder="City" value="<?php echo @$_SESSION['vcity']; ?>" required autofocus>
                            <br>
                            <!-- BRGY-->
                            <label for="inputVenueBarangay">Barangay</label>
                            <input type="text" id="inputVenueBarangay" name="vbrgy" class="form-control" placeholder="Barangay" value="<?php echo @$_SESSION['vbrgy']; ?>" required autofocus>
                            <br>
                            <!-- St Address-->
                            <label for="inputVenueStreetAddress">Street Address</label>
                            <input type="text" id="inputVenueStreetAddress" name="vstadd" class="form-control" placeholder="Street Address" value="<?php echo @$_SESSION['vstadd']; ?>" required autofocus>
                            <br>
                            <!-- Landmark-->
                            <label for="inputVenueLandmark">Landmark</label>
                            <input type="text" id="inputVenueLandmark" name="vlmark" class="form-control" placeholder="Landmark" value="<?php echo @$_SESSION['vlmark']; ?>" required autofocus>
                            <span class="help-block">This will help us to quickly locate your venue.</span>
                            <br>
                        </div>
                        <!--Admin registration-->
                        <div class="col-md-6" style="padding-left: 30px">
                            <center><legend style="color: #2196f3;">Admin Details</legend></center>
                            <!-- Fullname-->
                            <label for="inputFullname">Admin's Fullname</label>
                            <input type="text" id="inputFullname" name="adfn" class="form-control" placeholder="Admin's Fullname" value="<?php echo @$_SESSION['adfn']; ?>" required autofocus>
                            <br>
                            <!-- email-->
                            <label for="inputEmail">Email address</label>
                            <input type="email" id="inputEmail" name="regAdemail" class="form-control" placeholder="Email address" value="<?php echo @$_SESSION['regAdemail']; ?>" required autofocus>
                            <br>
                            <!-- password-->
                            <label for="inputPassword">Password</label>
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                            <br>
                            <!-- password again-->
                            <label for="inputConPassword">Confirm Password</label>
                            <input type="password" id="inputConPassword" name="conpassword" class="form-control" placeholder="Confirm password" required>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <br>
                            <center>
                                <button class="btn btn-lg btn-primary" name="register" type="submit">Register</button>
                                <a href="login.php" class="btn btn-lg btn-default"> Go to Sign In</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <hr class="featurette-divider">
        <?php include("includes/footer.php"); ?>
    </div> <!-- /container -->
  </body>
</html>
