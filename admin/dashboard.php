    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
            <?php if($is_approved == "0"){ ?>
            <h5>Venue Search Status : <a tabindex="0" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" title="Venue Search Status" data-content="Your Venue Search Status indicates that your venue profile is current NOT SEARCAHBLE through GRAVENUE SEARCH. Our awesome content team will check your Venue Profile once your it is submitted for approval then make it searchable online. (Click the button below to make an approval request)"><span class="label label-warning">OFFLINE</span></a></h5>
                <a class="btn btn-primary" href="" role="button">Request for venue profile approval</a>  
            <?php }elseif($is_approved == "1"){ ?>
                <h5>Venue Search Status : <a tabindex="0" role="button" data-toggle="popover" data-placement="right" data-trigger="focus" title="Venue Search Status" data-content="Your Venue Search Status indicates that your venue profile is currently SEARCAHBLE through GRAVENUE SEARCH."><span class="label label-success">ONLINE</span></a></h5>
            <?php } ?>
            <hr>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">0</div>
                            <div>Bookings</div>
                        </div>
                    </div>
                </div>
                <a href="myaccount.php?viewmode=bookings">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bolt fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">0</div>
                            <div>Book Requests</div>
                        </div>
                    </div>
                </div>
                <a href="myaccount.php?viewmode=bookreqs">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-eye fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">0</div>
                            <div>Views</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-bell fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">0</div>
                            <div>Alerts</div>
                        </div>
                    </div>
                </div>
                <a href="myaccount.php?viewmode=alerts">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    
</div>
<!-- /#page-wrapper -->