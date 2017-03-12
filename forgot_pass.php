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
    <title>Forgot Password | TRAVENUE</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body style="background-image: url(img/bgapple.jpg);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;">
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
                    <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>
                    <li><a href="register.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Register</a></li>
                    <li><p class="navbar-btn"><a href="#" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Venue Search</a></p></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>  
    </nav>
<!-- /Fixed navbar -->

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 bordered">
                <form class="form-signin" method='post'>
                    <center>
                        <h4 class="form-signin-heading">Forgot Password</h4>
                        <hr>
                    </center>
<!-- email-->       <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div> <!-- /container -->
    <br><br>
    <?php include("includes/footer.php"); ?>
  </body>
</html>
