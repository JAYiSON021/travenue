<?php
    session_start();
    require_once("includes/config.php");
    require_once("includes/db.php");
    require("includes/check.php");
    if(isLoggedInLooker()){
      header("Location:search.php");
      exit();
    }
    function isUniqueLooker($mail){
        $query = "SELECT * FROM  lookers WHERE email ='$mail'";
        global $db;
        $result = $db->query($query);
        if($result->num_rows > 0){
            return false;
        }else return true;
    } 

    if(isset($_POST['register'])){
        $_SESSION['lookRegfn']         = $_POST['lookfn'];
        $_SESSION['lookRegemail']      = $_POST['lookemail'];
        
        if($_POST['password'] != $_POST['conpassword']){
            header("Location:looker_register.php?err=" . urldecode("Your Passwords do not match"));
            exit();
        }else if(strlen($_POST['conpassword']) < 6){
            header("Location:looker_register.php?err=" . urldecode("Your password should be atleast 6 characters"));
            exit();
        }else if(!isUniqueLooker($_POST['lookemail'])){
            header("Location:looker_register.php?err=" . urldecode("Looker's Email is already in use."));
            $_SESSION['regAdemail'] = "";
            exit();
        }else{
            date_default_timezone_set("Asia/Manila");
            $curr =  date("Ahisymd");         
            $lid = "LK-" . $curr;
            $dc = date("y/m/d h/i/s A");

            $lookfn     = mysqli_real_escape_string($db, $_POST['lookfn']);
            $lookemail  = mysqli_real_escape_string($db, $_POST['lookemail']);
            $pass       = md5($_POST['conpassword']);

            $vnquery = "INSERT INTO lookers (looker_id,Fullname,email,password,date_created) VALUES ('$lid','$lookfn','$lookemail','$pass','$dc')";
            $result = mysqli_query($db,$vnquery);
            if($result){
                header("Location:looker_register.php?success=" . urldecode("Registration successful!."));
                $_SESSION['lookRegfn']     = "";
                $_SESSION['lookRegemail']  = "";
                exit();
            }else{
                header("Location:looker_register.php?err=" . urldecode("Registration failed."));
                exit();
            }
        }
    }

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

  <body style="background-image: url(img/22.png);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;">
<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top animated fadeIn">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="search.php">
                    <img src="img/gravenu2.png" width=100px alt="Brand">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Venue Admin</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Venue looker <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="looker_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>
                            <li><a href="looker_register.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Register</a></li>
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
            <div class="col-md-4 col-md-offset-4 bordered" style="background-color: #fff;">
                <form class="form-signin" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='post'>
                    <center>
                        <h3 class="form-signin-heading">Looker Registration</h3>
                        <br>
                        <ul class="nav nav-pills nav-justified">
                            <li role="presentation"><a href="register.php">Venue Admin</a></li>
                            <li role="presentation" class="active"><a href="">Venue Looker</a></li>
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
                        <!--Admin registration-->
                        <div class="col-md-12" style="padding-left: 30px">
                            <center><legend style="color: #2196f3;">Looker's Details</legend></center>
                            <!-- Fullname-->
                            <label for="inputFullname">Fullname</label>
                            <input type="text" id="inputFullname" name="lookfn" class="form-control" placeholder="Fullname" value="<?php echo @$_SESSION['lookRegfn']; ?>" required autofocus>
                            <br>
                            <!-- email-->
                            <label for="inputEmail">Email address</label>
                            <input type="email" id="inputEmail" name="lookemail" class="form-control" placeholder="Email address" value="<?php echo @$_SESSION['lookRegemail']; ?>" required autofocus>
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
                                <button class="btn btn-block btn-primary" name="register" type="submit">Register</button>
                                <a href="looker_login.php" class="btn btn-block btn-default"> Sign In</a>
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
