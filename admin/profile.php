
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><?php if(isset($venue_name)){echo $venue_name;}?></h2>
    </div>

    <div class="col-md-8 col-sm-12">
    <!-- Display Error Message -->
    <?php if(isset($_GET['errupd'])){ ?>
        <div class="alert alert-danger animated fadeInDown">
            <?php echo $_GET['errupd']; ?>
            <a href="myaccount.php?viewmode=profile" class="btn btn-default btn-xs">DISMISS</a>
        </div>
    <?php } ?>
    <!-- Display Success Message -->
    <?php if(isset($_GET['successUpdate'])){ ?>
        <div class="alert alert-success animated fadeInDown">
            <?php echo $_GET['successUpdate']; ?>
            <a href="myaccount.php?viewmode=profile" class="btn btn-default btn-xs">OK</a>
        </div>
    <?php } ?>
        <div class="col-md-12 col-sm-12">
        <form class="form-horizontal" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method='post'>
            <fieldset>
<!-- Venue Details -->            
                <legend>Venue Details</legend>
                <div class="form-group">
                    <label for="inputVName" class="col-lg-3 control-label">Venue Name</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="vupdname" id="inputVName" value="<?php if(isset($venue_name)){echo $venue_name;}?>" placeholder="Venue Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputVSAdd" class="col-lg-3 control-label">Street Address</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="vAddSt" id="inputVSAdd" value="<?php if(isset($St_Address)){echo $St_Address;}?>" placeholder="Street Address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputVSAdd" class="col-lg-3 control-label">Barangay</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="vAddBrgy" id="inputVSAdd" value="<?php if(isset($Brgy)){echo $Brgy;}?>" placeholder="Barangay">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCity" class="col-lg-3 control-label">City</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="vAddCity" id="inputCity" value="<?php if(isset($City)){echo $City;}?>" placeholder="City">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputlm" class="col-lg-3 control-label">Landmark</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="vAddLM" id="inputlm" value="<?php if(isset($Landmark)){echo $Landmark;}?>" placeholder="Landmark">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">Venue Email</label>
                    <div class="col-lg-9">
                        <input type="email" class="form-control" name="vupdemail" id="inputEmail" value="<?php if(isset($Venue_email)){echo $Venue_email;}?>" placeholder="Venue Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">Venue Number</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="vupdnum" id="inputEmail" value="<?php if(isset($Number)){echo $Number;}?>" placeholder="Venue Contact Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputweb" class="col-lg-3 control-label">Venue Website</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="vupdweb" id="inputweb" value="<?php if(isset($website)){echo $website;}?>" placeholder="Venue Website">
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-3 control-label">Opening Status</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="vOpenStat" id="select">
                            <option disabled> -- select one -- </option>
                            <option value="Open" <?php if(isset($Open_Status)){if($Open_Status == 'Open'){echo 'selected';}}?> >Open</option>
                            <option value="Openning Soon" <?php if(isset($Open_Status)){if($Open_Status == 'Openning Soon'){echo 'selected';}}?>>Openning Soon</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="selectFood" class="col-lg-3 control-label">Food</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="vFood" id="selectFood">
                            <option disabled> -- select one -- </option>
                            <option <?php if(isset($Food)){if($Food == 'Provided'){echo 'selected';}}?>>Provided</option>
                            <option <?php if(isset($Food)){if($Food == 'Allowed Outside Catering'){echo 'selected';}}?>>Allowed Outside Catering</option>
                            <option <?php if(isset($Food)){if($Food == 'Allowed Outside Catering or Provided'){echo 'selected';}}?>>Allowed Outside Catering or Provided</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="selectBev" class="col-lg-3 control-label">Beverages</label>
                    <div class="col-lg-9">
                        <select class="form-control" name="vBev" id="selectBev">
                            <option disabled> -- select one -- </option>
                            <option <?php if(isset($Beverages)){if($Beverages == 'Provided'){echo 'selected';}}?>>Provided</option>
                            <option <?php if(isset($Beverages)){if($Beverages == 'Allowed Outside Beverages'){echo 'selected';}}?>>Allowed Outside Beverages</option>
                            <option <?php if(isset($Beverages)){if($Beverages == 'Allowed Outside Beverages or Provided'){echo 'selected';}}?>>Allowed Outside Beverages or Provided</option>
                        </select>
                    </div>
                </div>
                <br><br>
<!-- Check All the Applicable Details -->                
                <legend>Check All the Applicable Details</legend>
                <div class="form-group">
            <!-- Venue Type -->
                    <label for="inputweb" class="col-lg-3 control-label">Venue Type</label>
                    <div class="col-lg-9">
                <!-- First Column -->
                        <div class="col-lg-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Bar" <?php if(in_array("Bar",$Venue_type)) { ?> checked="checked" <?php } ?> > Bar
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Cafe" <?php if(in_array("Cafe",$Venue_type)) { ?> checked="checked" <?php } ?>> Cafe
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Conference" <?php if(in_array("Conference",$Venue_type)) { ?> checked="checked" <?php } ?>> Conference
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Event Space" <?php if(in_array("Event Space",$Venue_type)) { ?> checked="checked" <?php } ?>> Event Space
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Gallery" <?php if(in_array("Gallery",$Venue_type)) { ?> checked="checked" <?php } ?>> Gallery
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Hotel" <?php if(in_array("Hotel",$Venue_type)) { ?> checked="checked" <?php } ?>> Hotel
                                </label>
                            </div>
                        </div>
                <!-- Second Column -->
                        <div class="col-lg-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Hall" <?php if(in_array("Hall",$Venue_type)) { ?> checked="checked" <?php } ?>> Hall
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Meeting Space" <?php if(in_array("Meeting Space",$Venue_type)) { ?> checked="checked" <?php } ?>> Meeting Space
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Restaurant" <?php if(in_array("Restaurant",$Venue_type)) { ?> checked="checked" <?php } ?>> Restaurant
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Studio" <?php if(in_array("Studio",$Venue_type)) { ?> checked="checked" <?php } ?>> Studio
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Sports" <?php if(in_array("Sports",$Venue_type)) { ?> checked="checked" <?php } ?>> Sports
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vtype[]" value="Training" <?php if(in_array("Training",$Venue_type)) { ?> checked="checked" <?php } ?>> Training
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
        <!-- Venue Amenities -->
                    <label for="inputweb" class="col-lg-3 control-label">Amenities</label>
                    <div class="col-lg-9">
                <!-- First Column -->
                        <div class="col-lg-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Audio / Visual Equipment" <?php if(in_array("Audio / Visual Equipment",$Amenities)) { ?> checked="checked" <?php } ?>> Audio / Visual Equipment
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Beach" <?php if(in_array("Beach",$Amenities)) { ?> checked="checked" <?php } ?>> Beach
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Fine Views" <?php if(in_array("Fine Views",$Amenities)) { ?> checked="checked" <?php } ?>> Fine Views
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Handicap Accessible" <?php if(in_array("Handicap Accessible",$Amenities)) { ?> checked="checked" <?php } ?>> Handicap Accessible
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Indoor" <?php if(in_array("Indoor",$Amenities)) { ?> checked="checked" <?php } ?>> Indoor
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="No Alcohol" <?php if(in_array("No Alcohol",$Amenities)) { ?> checked="checked" <?php } ?>> No Alcohol
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Non Smoking" <?php if(in_array("Non Smoking",$Amenities)) { ?> checked="checked" <?php } ?>> Non Smoking
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Outdoor" <?php if(in_array("Outdoor",$Amenities)) { ?> checked="checked" <?php } ?>> Outdoor
                                </label>
                            </div>
                        </div>
                <!-- Second Column -->
                        <div class="col-lg-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Pool" <?php if(in_array("Pool",$Amenities)) { ?> checked="checked" <?php } ?>> Pool
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Rooftop" <?php if(in_array("Rooftop",$Amenities)) { ?> checked="checked" <?php } ?>> Rooftop
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Room Accomodation" <?php if(in_array("Room Accomodation",$Amenities)) { ?> checked="checked" <?php } ?>> Room Accomodation
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Smoking" <?php if(in_array("Smoking",$Amenities)) { ?> checked="checked" <?php } ?>> Smoking
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Spa" <?php if(in_array("Spa",$Amenities)) { ?> checked="checked" <?php } ?>> Spa
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Street Parking" <?php if(in_array("Street Parking",$Amenities)) { ?> checked="checked" <?php } ?>> Street Parking
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Theater" <?php if(in_array("Theater",$Amenities)) { ?> checked="checked" <?php } ?>> Theater
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vAmenities[]" value="Wifi" <?php if(in_array("Wifi",$Amenities)) { ?> checked="checked" <?php } ?>> Wifi
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputweb" class="col-lg-3 control-label">Uniformity</label>
    <!-- Uniformity -->                    
                    <div class="col-lg-9">
            <!-- First Column -->
                        <div class="col-lg-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Classic" <?php if(in_array("Classic",$Uniformity)) { ?> checked="checked" <?php } ?>> Classic
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Classy" <?php if(in_array("Classy",$Uniformity)) { ?> checked="checked" <?php } ?>> Classy
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Corporate" <?php if(in_array("Corporate",$Uniformity)) { ?> checked="checked" <?php } ?>> Corporate
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Cozy" <?php if(in_array("Cozy",$Uniformity)) { ?> checked="checked" <?php } ?>> Cozy
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Industrial" <?php if(in_array("Industrial",$Uniformity)) { ?> checked="checked" <?php } ?>> Industrial
                                </label>
                            </div>
                        </div>
            <!-- Second Column -->
                        <div class="col-lg-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Geeks" <?php if(in_array("Geeks",$Uniformity)) { ?> checked="checked" <?php } ?>> Geeks
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Modern" <?php if(in_array("Modern",$Uniformity)) { ?> checked="checked" <?php } ?>> Modern
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Old School" <?php if(in_array("Old School",$Uniformity)) { ?> checked="checked" <?php } ?>> Old School
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Trendy" <?php if(in_array("Trendy",$Uniformity)) { ?> checked="checked" <?php } ?>> Trendy
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="vUniform[]" value="Tech" <?php if(in_array("Tech",$Uniformity)) { ?> checked="checked" <?php } ?>> Tech
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
<!-- By Numbers -->                
                <legend>By Numbers</legend>
                <div class="form-group">
                    <label for="inputAvg" class="col-lg-3 control-label">Average Cost (PHP)</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" name="vAveCost" value="<?php if(isset($avg_cost)){echo $avg_cost;}?>" id="inputAvg" placeholder="Average Cost">
                        <span class="help-block">This will just give the looker an overview about the cost of renting the venue. They can send you an email for a quote request.</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputArea" class="col-lg-3 control-label">Area (sq.ft)</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" name="vArea" value="<?php if(isset($area)){echo $area;}?>" id="inputArea" placeholder="Area in sq.ft">
                    </div>
                </div>
                <br><br>
<!-- Maximum No. of Attendees -->                    
                <legend>Maximum No. of Attendees (Seating & Standing)</legend>
                <div class="form-group">
                    <label for="inputSeating" class="col-lg-3 control-label">Seating Attendees</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" name="vSeat" value="<?php if(isset($max_seating)){echo $max_seating;}?>" id="inputSeating" placeholder="Number of Maximum Seating Attendees">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputStand" class="col-lg-3 control-label">Standing Attendees</label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" name="vStand" value="<?php if(isset($max_standing)){echo $max_standing;}?>" id="inputStand" placeholder="Number of Maximum Standing Attendees">
                    </div>
                </div>

<!-- GGWP Buttons -->
                <br><br>
                <div class="form-group container">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="row">
        <legend>Venue's Profile Image</legend>
        <div class="col-sm-12 col-md-12">
            <!-- Display Error Message -->
        <?php if(isset($_GET['errImgUpld'])){ ?>
            <div class="alert alert-danger animated fadeInDown">
                <?php echo $_GET['errImgUpld']; ?>
                <a href="myaccount.php?viewmode=profile" class="btn btn-default btn-xs"> DISMISS</a>
            </div>
        <?php } ?>
        <!-- Display Success Message -->
        <?php if(isset($_GET['successImgUpld'])){ ?>
            <div class="alert alert-success animated fadeInDown">
                <?php echo $_GET['successImgUpld']; ?>
                <a href="myaccount.php?viewmode=profile" class="btn btn-default btn-xs"> OK</a>
            </div>
        <?php } ?>

            <div class="thumbnail">
            <img <?php if(isset($vProfilePath)){echo "src='images/$vProfilePath'";}else{echo "src='img/default.png'";}?> alt="venue image">
            <div class="caption">

                <h5><?php if(isset($venue_name)){echo $venue_name;}else{echo "Cannot find Venue name :(";}?></h5>

                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                        <div style="margin-bottom: 5px;">
                            <input class="btn btn-primary btn-block btn-sm" type="file" name="vimage">
                        </div>
                    <div>
                        <button class="btn btn-default btn-block btn-sm" type="submit" name="vimageUpload">
                            <i class="fa fa-upload fa-fw"></i> UPLOAD
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>