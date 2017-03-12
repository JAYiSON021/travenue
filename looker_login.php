<?php
    session_start();
    require_once("includes/config.php");
    require_once("includes/db.php");
    require("includes/check.php");
    if(isLoggedInLooker()){
      header("Location:search.php");
      exit();
    }

    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $pass = md5($_POST['password']);
        $query = "SELECT * FROM lookers WHERE email='$email' and password='$pass'";
        $result = $db->query($query);
        if($row = $result->fetch_assoc()){
            $_SESSION['lookemail'] = $email;
            if(isset($_POST['remember'])){
                setcookie("lookemail", $email, time()+60*60*24*15);
            }
            header("Location:search.php");
            exit();
        }else{
            header("Location:looker_login.php?err=" . urldecode("Invalid email or password"));
            exit();
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
    <title>Signin | TRAVENUE</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
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
            <div class="col-md-4 col-md-offset-4">
                <div class="bordered" style="background-color: #fff;">
                    <!-- Display Success Message -->
                    <?php if(isset($_GET['success'])){ ?>
                        <div class="alert alert-success animated fadeInDown">
                            <?php echo $_GET['success']; ?>
                        </div>
                    <?php } ?>
                    <!-- Display Error Message -->
                    <?php if(isset($_GET['err'])){ ?>
                        <div class="alert alert-danger animated fadeInDown">
                            <?php echo $_GET['err']; ?>
                        </div>
                    <?php } ?>
                    <form class="form-signin" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='post'>
                        <center>
                            <h3 class="form-signin-heading">Sign In</h3>
                            <br>
                                <ul class="nav nav-pills nav-justified">
                                    <li role="presentation"><a href="login.php">Venue Admin</a></li>
                                    <li role="presentation" class="active"><a href="">Venue Looker</a></li>
                                </ul>
                            <br>
                        </center>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                        <br>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                        <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox"> Remember me
                        </label>
                        </div>
                        <button class="btn btn-primary btn-block"  name="login" type="submit">Sign In</button>
                        <a href="looker_register.php" class="btn btn-default btn-block"> REGISTER</a>
                        <center>
                            <div class="forg">
                                <a href="forgot_pass.php">forgot password?</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
         <br>
        <hr class="featurette-divider">
        <?php include("includes/footer.php"); ?>
    </div> <!-- /container -->
  </body>
</html>
