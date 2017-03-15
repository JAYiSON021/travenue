<?php
    session_start();
    include("includes/config.php");
    include("includes/db.php");
    include("includes/check.php");
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

    <title>GRAVENUE | Admin Home</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
  </head>

  <body style="background-image: url(img/bgapple.jpg);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;">
    <?php include("includes/nav.php") ?>
     <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
      <div class="item active">
          <img class="second-slide" style="background-image: url(img/4.png);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
            <div class="row">
                <div class="col-md-6 col-sm-6 animated fadeIn">
                  <h2>Bookings in Calendar</h2>
                  <p>Easily manage and view your bookings with your own venue calendar</p>
                  <?php if(!isLoggedIn()){?>
                    <p><a class="btn btn-lg btn-primary" href="register.php" role="button">Register Now!</a></p>
                  <?php }else{?>
                    <p><a class="btn btn-lg btn-primary" href="myaccount.php?viewmode=calendar" role="button">Go to Calendar</a></p>
                  <?php }?>
                </div>
                <div class="col-md-6 col-sm-6 animated fadeIn">
                  <img src="img/index-calendar.png" alt="calendar" width="90%" style="border-radius: 5%;">
                </div>
            </div>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="first-slide" style="background-image: url(img/3.png);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
            <div class="row">
              <div class="col-md-8 col-sm-6" style="margin-top: 50px;">
                <h2>Easy venue management</h2>
                <p>Built on top of latest and innovative technology, booking has its advance features to keep track of the bookings in your venues.</p>
                <?php if(!isLoggedIn()){?>
                  <p><a class="btn btn-lg btn-primary" href="register.php" role="button">Register Now!</a></p>
                <?php }else{?>
                  <p><a class="btn btn-lg btn-primary" href="myaccount.php?viewmode=dashboard" role="button">Go to Dashboard</a></p>
                <?php }?>
              </div>
              <div class="col-md-4 col-sm-6">
                <img src="img/manage.png" width="100%" style="margin-top: 80px;">
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" style="background-image: url(img/2.png);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
            <div class="row">
              <div class="col-md-4 col-sm-6 animated fadeIn">
                <h2>Cross Platform Solution</h2>
                <p>Access your venue on all types of devices Anytime, Anywhere.</p>
              </div>
              <div class="col-md-8 col-sm-6 animated fadeIn">
                <img src="img/cross-platform.png" alt="calendar" width="95%" style="border-radius: 5%;">
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control" style="left: auto; right: 0;" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
      <center><h1>How it works?</h1></center>
      <br>
      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
      <?php include("includes/footer.php"); ?>
    </div><!-- /.container -->
    <script src="js/jquery-3.1.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
