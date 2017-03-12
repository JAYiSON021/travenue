<?php
    session_start();
    require_once("includes/config.php");
    require_once("includes/db.php");
    require_once("includes/check.php");
    if(!isLoggedIn()){
      header("Location:login.php?err=" . urldecode("Please login to view your account"));
      exit();
    }else{
        require_once("admin/getAdmindetails.php");
    }
    require("admin/trans_myaccount.php");
?>
<!DOCTYPE php>
<php lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/travenue.ico">

    <title><?php if(isset($venue_name)){echo $venue_name;}else{echo "Not set";}?> | Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
    <!-- php5 Shim and Respond.js IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:#fff">
    <div id="wrapper">
        <!-- Navigation -->
        <!-- Fixed navbar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #3a3a3a; color: #fff">
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
                    <?php if(!isLoggedIn()){?>
                      <li><a href="login.php">Sign In</a></li>
                      <li><a href="register.php">Register</a></li>
                      <li><p class="navbar-btn"><a href="#" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</a></p></li>
                    <?php }else{?>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if(isset($fn)){echo $fn;}else{echo "User";}?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                            <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-out"></i> Sign out</a></li>
                        </ul>
                        </li>
                    <?php }?>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>

            <!--modal-->
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-sign-out"></i> Sign out</h5>
                  </div>
                    <div class="modal-body">
                      <p>Are you sure you want to sign out?</p>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-default" href="logout.php" data-dismiss="modal" role="button">Cancel</a>
                      <a class="btn btn-primary" href="logout.php" role="button">Sign out</a>
                    </div>
                </div>
              </div>
            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li style="background-image: url(img/profile-bg.png);background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;">
                            <br>
                              <center>
                                <img <?php if(isset($vProfilePath)){echo "src='images/$vProfilePath'";}else{echo "src='img/default.png'";}?> width="60px" height="60px" class="img-thumbnail" alt="Venue Image">
                                <h6 ><i class="fa fa-map-marker"></i> <?php if(isset($venue_name)){echo $venue_name;}?></h6>
                              </center>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker"></i>  Venue<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="myaccount.php?viewmode=profile"><i class="fa fa-eye" aria-hidden="true"></i> View Profile</a>
                                </li>
                                <li>
                                    <a href="myaccount.php?viewmode=gallery"><i class="fa fa-image" aria-hidden="true"></i> Venue Gallery</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-out"></i> Sign out</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="myaccount.php?viewmode=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="myaccount.php?viewmode=calendar"><i class="fa fa-table fa-fw"></i> Venue Calendar</a>
                        </li>
                        <li>
                            <a href="myaccount.php?viewmode=bookings"><i class="fa fa-book" aria-hidden="true"></i>  Bookings</a>
                        </li>
                        <li>
                            <a href="myaccount.php?viewmode=alerts"><i class="fa fa-bell" aria-hidden="true"></i>  Alerts</a>
                        </li>
                        <li>
                            <a href="myaccount.php?viewmode=bookreqs"><i class="fa fa-bolt" aria-hidden="true"></i>  Booking Requests</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->

        <br><br>
        <div id="page-wrapper">
        <?php
            if(isset($_GET['viewmode'])){
                $mode = $_GET['viewmode'];
                if($mode == "dashboard"){
                    include("admin/dashboard.php");
                }else if($mode == "calendar"){
                    include("admin/calendar.php");
                }else if($mode == "profile"){
                    include("admin/profile.php");
                }else if($mode == "bookings"){
                    include("admin/bookings.php");
                }else if($mode == "bookreqs"){
                    include("admin/bookreq.php");
                }else if($mode == "alerts"){
                    include("admin/alerts.php");
                }else if($mode == "gallery"){
                    include("admin/gallery.php");
                }else{
                    include("admin/dashboard.php");
                }
            }else{
                include("admin/profile.php");
            }
        ?>
        </div>
        
        </div>
        <br><hr>
        <?php include("includes/footer.php"); ?>
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

</body>

</php>
