
<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top animated fadeIn" style="background-color: #3a3a3a; color: #fff">
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
            <li><a href="search.php">Search Venue</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Venue Admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>
                  <li><a href="register.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Register</a></li>
              </ul>
            </li>
            <?php }else{?>
              <li><a href="myaccount.php?viewmode=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
              <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-out"></i> Sign out</a></li>
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