<?php
    session_start();
    include("includes/config.php");
    include("includes/db.php");
    include("includes/check.php");
    if(isLoggedIn()){
      header("Location:myaccount.php");
      exit();
    }
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $pass = md5($_POST['password']);
        $query = "SELECT * FROM venue_accts WHERE email='$email' and password='$pass'";
        $result = $db->query($query);
        if($row = $result->fetch_assoc()){
            if($row['status'] == 1){
                $_SESSION['vemail'] = $email;
                if(isset($_POST['remember'])){
                    setcookie("vemail", $email, time()+60*60*24*15);
                }
                header("Location:myaccount.php");
                exit();
            }else{
                header("Location:login.php?err=" . urldecode("Please activate your account first!"));
                exit();
            }
        }else{
            header("Location:login.php?err=" . urldecode("Invalid email or password"));
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
                    <li class="active"><a href="login.php">Sign In</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
<!-- /Fixed navbar -->

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="bordered">
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
                            <hr>
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
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
                        <center>
                            <div class="forg">
                                <a href="forgot_pass.php">forgot password?</a>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
  </body>
</html>
