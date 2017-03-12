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

    <title>TRAVENUE | Home</title>

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

  <body style="background-color: #fff;">
    <div id="wrapper">
    <!-- Navigation -->
    <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
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
                <?php if(!isLoggedInLooker()){?>
                    <li><a href="index.php">Venue Admin</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Venue Looker <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="looker_login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>
                            <li><a href="looker_register.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Register</a></li>
                        </ul>
                    </li>
                <?php }else{?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if(isset($_SESSION['lookemail'])){echo $_SESSION['lookemail'];}else if(isset($_COOKIE['lookemail'])){$_SESSION['lookemail'] = $_COOKIE['lookemail'];echo $_COOKIE['lookemail'];}else{echo "User";}?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="logout_looker.php"><i class="fa fa-sign-out"></i> Sign out</a></li>
                        </ul>
                    </li>
                <?php }?>
                </ul>
                <div style="margin-left:220px;">
                <form class="navbar-form navbar-left" style="margin-left:60px;" action="">
                    <div class="form-group">
                    <input type="text" class="form-control" name="place" placeholder="Search places">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
                </div>
            </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
        <div class="row">
            <div class="col-md-3">
                <br><br><br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Filter</h3>
                    </div>
                    <div class="panel-body" style="background-color: #dddddd;">
                    <a href="" class="btn btn-primary btn-block btn-sm"><i class="fa fa-refresh"></i> Reset Filter</a>
                    <br>

                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <h6>Event Budget</h6>
                                <div class="row" style="border-top: 1px solid #dddddd;">
                                    <div class="col-md-12 col-sm-12">
                                        <br>
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="budget" placeholder="Enter Budget">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary btn-sm" type="submit" name="search">GO</button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    </div><!-- /col-md-6 col-sm-6 -->
                                </div><!-- /Row -->
                            </div>
                        </div>


                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <h6>Venue type <a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" title="Venue types" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-info-circle"></i></a></h6>
                                <div class="row" style="border-top: 1px solid #dddddd;">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Bar" > Bar
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Cafe" > Cafe
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Conference"> Conference
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Event Space"> Event Space
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Gallery"> Gallery
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Hotel"> Hotel
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Hall"> Hall
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Meeting Space"> Meeting Space
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Restaurant"> Restaurant
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Studio"> Studio
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Sports"> Sports
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vtype[]" value="Training"> Training
                                            </label>
                                        </div>
                                    </div><!-- /col-md-6 col-sm-6 -->
                                </div><!-- /Row -->
                            </div>
                        </div>


                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <h6>Amenities <a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" title="Amenities" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-info-circle"></i></a></h6>
                                <div class="row" style="border-top: 1px solid lightgrey;">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Audio / Visual Equipment"> Audio / Visual Equipment
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Beach"> Beach
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Fine Views"> Fine Views
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Handicap Accessible"> Handicap Accessible
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Indoor"> Indoor
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="No Alcohol"> No Alcohol
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Non Smoking"> Non Smoking
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Outdoor"> Outdoor
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Pool"> Pool
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Rooftop"> Rooftop
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Room Accomodation"> Room Accomodation
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Smoking"> Smoking
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Spa"> Spa
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Street Parking"> Street Parking
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Theater"> Theater
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="vAmenities[]" value="Wifi"> Wifi
                                        </label>
                                    </div>
                                    </div><!-- /col-md-6 col-sm-6 -->
                                </div><!-- /Row -->
                            </div>
                        </div>


                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <h6>Look &amp; Feel <a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" title="Look &amp; Feel" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-info-circle"></i></a></h6>
                                <div class="row" style="border-top: 1px solid lightgrey;">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Classic"> Classic
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Classy"> Classy
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Corporate"> Corporate
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Cozy"> Cozy
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Industrial"> Industrial
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Geeks"> Geeks
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Modern"> Modern
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Old School"> Old School
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Trendy"> Trendy
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="vUniform[]" value="Tech"> Tech
                                            </label>
                                        </div>
                                    </div><!-- /col-md-6 col-sm-6 -->
                                </div><!-- /Row -->
                            </div>
                        </div>
                        <a href="" class="btn btn-primary btn-block btn-sm"><i class="fa fa-refresh"></i> Reset Filter</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <br><br><br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Featured Venues</h3>
                    </div>
                    <div class="panel-body" style="height:235px !important;">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"  style="height:200px !important;">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox" style="height:200px !important;">
                                    <div class="item active">
                                    <img src="..." alt="...">
                                    <div class="carousel-caption">
                                        ...
                                    </div>
                                    </div>
                                    <div class="item">
                                    <img src="..." alt="...">
                                    <div class="carousel-caption">
                                        ...
                                    </div>
                                    </div>
                                    ...
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </div>
                            </div>
                            <!--Place Search-->
                            <div class="col-md-12 col-sm-12">
                                <h2>Search "<?php if(isset($_GET['place'])){echo $_GET['place'];}?>"</h2>
                                <hr>
                            </div>
                            <!--Search Result-->
                            <div class="col-md-12 col-sm-12">
                                <center>
                                    Loading results...
                                </center>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>

        <br><hr>
        <?php include("includes/footer.php"); ?>
    </div> <!-- /container -->
    <!-- jQuery -->
    <script src="js/jquery-3.1.1.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
  </body>
</html>
