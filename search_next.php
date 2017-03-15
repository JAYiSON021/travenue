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

    <title>GRAVENUE | <?php if(isset($_GET['place'])){echo $_GET['place'];}?></title>

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

  <body style="background-color: #eee;">
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
            </div><!--/.nav-collapse -->
            </div>
        </nav>
        
        <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3">
                <br><br><br><br>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Filter</h3>
                    </div>
                    <div class="panel-body">
                    <a href="" class="btn btn-default btn-block btn-sm"><i class="fa fa-refresh"></i> Reset Filter</a>
                    <br>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Event Info</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" id="inputevtName" class="form-control" name="evtName" placeholder="e.g Birthday, etc.">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary btn-sm" type="submit" name="search">GO</button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                        <br>
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="budget" placeholder="Budget">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary btn-sm" type="submit" name="search">GO</button>
                                                </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    </div><!-- /col-md-6 col-sm-6 -->
                                </div><!-- /Row -->
                            </div>
                        </div>
                        

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">    
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Venue type <a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" title="Venue types" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-info-circle"></i></a>
                                    </a>
                                </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
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
                                </div>
                                </div>
                            </div>
                        </div>



                        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    Amenities <a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" title="Amenities" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-info-circle"></i></a>
                                </a>
                            </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
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
                            </div>
                            </div>
                        </div>
                        </div>


                        <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                    Look &amp; Feel <a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" title="Look &amp; Feel" data-content="And here's some amazing content. It's very engaging. Right?"><i class="fa fa-info-circle"></i></a>
                                </a>
                            </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
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
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-lg-9">
                <br><br><br><br>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="search_next.php">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="place" placeholder="Search places for your event... " value="<?php if(isset($_GET['place'])){echo $_GET['place'];}?>" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" name="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->
                            <!--Search Result-->
                            <div class="col-md-12 col-sm-12">
                                <?php
                                    if(isset($_GET['place'])){
                                        $place = $_GET['place'];
                                        $query = "SELECT * FROM venue_profiles INNER JOIN venue_imgs WHERE (venue_profiles.City LIKE '%$place%' OR venue_profiles.Brgy LIKE '%$place%' OR venue_profiles.St_Address LIKE '%$place%') AND venue_imgs.img_type='profile' AND venue_imgs.venue_id = venue_profiles.venue_id AND venue_profiles.is_approved = '1'";
                                        $result = mysqli_query($db,$query);
                                        $r_count = mysqli_num_rows($result);
                                        if($r_count >= 1 ){
                                            echo $r_count . " result(s) for <em>'".$place."'</em> <br><br>";
                                            while($row = $result->fetch_array()){
                                                    echo "<div class='panel panel-default'>
                                                        <div class='panel-body'>
                                                            <div class='media'>
                                                                <div class='media-left media-top'>
                                                                    <a href=''><img src='images/".$row['img_path']."' width=150 alt=''></a>
                                                                </div>
                                                                <div class='media-body'>
                                                                    <div class='row'>
                                                                        <div class='container-fluid col-md-7 col-sm-7 col-lg-7'>
                                                                            <a href=''><h4 style='margin-bottom: 5px !important; padding-bottom 0px !important;'>".$row['venue_name']."</h4></a>
                                                                            <h6>".$row['St_Address']." ".$row['Brgy'].", <strong>".$row['City']."</strong></h6>
                                                                        </div>
                                                                        <div class='container-fluid col-md-5 col-sm-5 col-lg-5' style='margin-top: 15px;'>
                                                                            <div class='col-md-6 col-sm-12 col-lg-6' style='padding-left: 0px; padding-right: 2px; margin-bottom: 5px;'>
                                                                                <a href='' class='btn btn-success btn-block'><i class='fa fa-book'></i> Book</a>
                                                                            </div>
                                                                            <div class='col-md-6 col-sm-12 col-lg-6' style='padding-left: 2px; padding-right: 0px;'>
                                                                                <a href='' class='btn btn-primary btn-block'><i class='fa fa-eye'></i> View</a>
                                                                            </div>                                                                                                                                                 
                                                                        </div>
                                                                    </div>
                                                                    <div class='row' style='border-top: 1px solid #dddddd; padding-top: 10px;'>
                                                                        <div class='col-md-6 col-sm-12' style='border-right: 1px solid #dddddd;'>
                                                                            <strong>Max Standing Attendees: <span class='badge' style='background-color:#333'>".$row['max_standing']."</span></strong><br>
                                                                            <strong>Max Seating Attendees: <span class='badge' style='background-color:#333'>".$row['max_seating']."</span></strong><br>
                                                                            <strong>Status: <span class='badge' style='background-color:#4caf50'>".$row['Open_Status']."</span></strong>
                                                                        </div>
                                                                        <div class='col-md-6 col-sm-12'>
                                                                            <strong>Average Cost: <span class='badge' style='background-color:#333'>PHP ".$row['avg_cost']."</span></strong><br>
                                                                            <strong>Area: <span class='badge' style='background-color:#333'>".$row['area']." sq.m</span></strong><br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
                                        }else{
                                            echo "<center>No Results Found for <strong><em>'".$_GET['place']."'</em></strong><br>
                                            try to Enter a new Search Parameters <br>or<br> <a href='' class='btn btn-primary btn-sm'><i class='fa fa-refresh'></i> Reset the Filter</a>
                                            </center>";   
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div> <!-- /container -->
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
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
  </body>
</html>
