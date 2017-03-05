<?php
    include("includes/check.php");
?>
<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top animated fadeInDown">
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
            <?php if(!isLoggedIn()){?>
              <li><a href="login.php">Sign In</a></li>
              <li><a href="register.php">Register</a></li>
            <?php }else{?>
              <li><a href="myaccount.php">Dashboard</a></li>
            <?php }?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>