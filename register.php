<?php
    session_start();
    include("includes/config.php");
    include("includes/db.php");
    include("includes/check.php");
    if(isLoggedIn()){
      header("Location:myaccount.php");
      exit();
    }
    function isUnique($vemail){
        $query = "SELECT * FROM  venue_accts WHERE email ='$vemail'";
        global $db;
        $result = $db->query($query);
        if($result->num_rows > 0){
            return false;
        }else return true;
    } 

    if(isset($_POST['register'])){
        $_SESSION['vname'] = $_POST['vname'];
        $_SESSION['vemail'] = $_POST['vemail'];

        if(strlen($_POST['vname']) < 6){
            header("Location:register.php?err=" . urldecode("The venue name must be atleast 6 characters long"));
            exit();
        }else if($_POST['password'] != $_POST['conpassword']){
            header("Location:register.php?err=" . urldecode("Passwords dot not match"));
            exit();
        }else if(strlen($_POST['password']) < 6 || strlen($_POST['conpassword'] < 6)){
            header("Location:register.php?err=" . urldecode("Passwords must be atleast 6 characters long"));
            exit();
        }else if(!isUnique($_POST['vemail'])){
            header("Location:register.php?err=" . urldecode("Email is already in use."));
            exit();
        }else{
            $vname = mysqli_real_escape_string($db, $_POST['vname']);
            $vmail = mysqli_real_escape_string($db, $_POST['vemail']);
            $pass = md5($_POST['conpassword']);
            $token = bin2hex(openssl_random_pseudo_bytes(32));
            $query = "INSERT INTO venue_accts (venue_name, email, password, token) VALUES ('$vname','$vmail','$pass','$token')";
            $result = mysqli_query($db,$query);
            if($result){
                $_SESSION['vname'] = "";
                $_SESSION['vemail'] = "";
                $message = "Complete your registration by activating your account. Please click this link: http://localhost/travenue/activate.php?token=$token";
                mail($vmail, 'Activate Venue Account', $message, 'From sanagustinjaysson@gmail.com');
                header("Location:login.php?success=" . urldecode("Venue registration Successful! please check your email for activation."));
                exit();
            }else{
                header("Location:register.php?err=" . urldecode("Failed to register the user."));
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
    <script src="js/jquery-3.1.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>
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
                <a class="navbar-brand" href="index.php">TRAVENUE</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Sign In</a></li>
                    <li class="active"><a href="register.php">Register</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>  
    </nav>
<!-- /Fixed navbar -->

    <div class="container">
        <div class="row">
<!-- Shows the error messages if set-->
            
<!-- The REgistration Form -->
            <div class="col-md-4 col-md-offset-4 bordered">
                <form class="form-signin" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='post'>
                    <center>
                        <h3 class="form-signin-heading">Register</h3>
                        <hr>
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
<!-- name-->        <label for="inputNamel" class="sr-only">Venue name</label>
                    <input type="text" id="inputName" name="vname" class="form-control" placeholder="Venue name" value="<?php echo @$_SESSION['vname']; ?>" required autofocus>
                    <br>
<!-- email-->       <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="vemail" class="form-control" placeholder="Email address" value="<?php echo @$_SESSION['vemail']; ?>" required autofocus>
                    <br>
<!-- password-->    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <br>
<!-- password again--><label for="inputConPassword" class="sr-only">Password</label>
                    <input type="password" id="inputConPassword" name="conpassword" class="form-control" placeholder="Confirm password" required>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">Register</button>
                </form>
            </div>
        </div>
        <br><br><br><br>
    </div> <!-- /container -->
  </body>
</html>
