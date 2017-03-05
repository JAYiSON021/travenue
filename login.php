<?php
    session_start();
    include("includes/config.php");
    include("includes/db.php");
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
    <script src="js/jquery-3.1.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>
<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
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
            <div class="col-md-4 col-md-offset-4 bordered">
                <!-- Display Success Message -->
                <?php if(isset($_GET['success'])){ ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php } ?>
                <form class="form-signin" method='post'>
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
                        <input type="checkbox"> Remember me
                    </label>
                    </div>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <center>
                        <div class="forg">
                            <a href="forgot_pass.php">forgot password?</a>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div> <!-- /container -->
  </body>
</html>
