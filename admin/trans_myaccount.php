<?php

if(isset($_POST['vGalUpload'])){
        //target Path to store Image
        if(empty($_FILES['vgal']['name'])){
           header("Location:myaccount.php?viewmode=gallery&errImgUpld=" . urldecode("Choose your picture first!"));
           exit(); 
        }
        $target = "image_gallery/".basename($_FILES['vgal']['name']);
        if(move_uploaded_file($_FILES['vgal']['tmp_name'], $target)){
            $vUpGal = $_FILES['vgal']['name'];
            $insertvGalImgquery = "INSERT INTO venue_imgs (venue_id,img_type,img_path) VALUES('$vid','gallery','$vUpGal')";
            mysqli_query($db,$insertvGalImgquery); 
            header("Location:myaccount.php?viewmode=gallery&successImgUpld=" . urldecode("We successfully updated your venue profile image!"));
            exit();
        }else{
            header("Location:myaccount.php?viewmode=gallery&errImgUpld=" . urldecode("Failed to upload image"));
            exit();
        }
    }

    if(isset($_POST['vimageUpload'])){
        //target Path to store Image
        if(empty($_FILES['vimage']['name'])){
           header("Location:myaccount.php?errImgUpld=" . urldecode("Choose your picture first!"));
           exit(); 
        }
        $target = "images/".basename($_FILES['vimage']['name']);
        if(move_uploaded_file($_FILES['vimage']['tmp_name'], $target)){
            $vUpImg = $_FILES['vimage']['name'];
            $updatevUpImgquery = "UPDATE venue_imgs SET img_path='$vUpImg' WHERE venue_id='$vid'";
            mysqli_query($db,$updatevUpImgquery); 
            header("Location:myaccount.php?successImgUpld=" . urldecode("We successfully updated your venue profile image!"));
            exit();
        }else{
            header("Location:myaccount.php?errImgUpld=" . urldecode("Failed to upload image"));
            exit();
        }
    }

    if(isset($_POST['update'])){
        if(strlen($_POST['vupdname']) < 6){
            header("Location:myaccount.php?errupd=" . urldecode("The Entered Venue Name / title must be atleast 6 characters long"));
            exit();
        }else{
           //Get Form Data
            $vupdname    = mysqli_real_escape_string($db, $_POST['vupdname']);
            $vAddSt      = mysqli_real_escape_string($db, $_POST['vAddSt']);
            $vAddBrgy    = mysqli_real_escape_string($db, $_POST['vAddBrgy']);
            $vAddCity    = mysqli_real_escape_string($db, $_POST['vAddCity']);
            $vAddLM      = mysqli_real_escape_string($db, $_POST['vAddLM']);
            $vupdemail   = mysqli_real_escape_string($db, $_POST['vupdemail']);
            $vupdnum     = mysqli_real_escape_string($db, $_POST['vupdnum']);
            $vupdweb     = mysqli_real_escape_string($db, $_POST['vupdweb']);
            $vOpenStat   = mysqli_real_escape_string($db, $_POST['vOpenStat']);
            $vFood       = mysqli_real_escape_string($db, $_POST['vFood']);
            $vBev        = mysqli_real_escape_string($db, $_POST['vBev']);
            $vAveCost    = mysqli_real_escape_string($db, $_POST['vAveCost']);
            $vArea       = mysqli_real_escape_string($db, $_POST['vArea']);
            $vSeat       = mysqli_real_escape_string($db, $_POST['vSeat']);
            $vStand      = mysqli_real_escape_string($db, $_POST['vStand']);
            $vOverview   = mysqli_real_escape_string($db, $_POST['vOverview']);
            $vEvents     = mysqli_real_escape_string($db, $_POST['vEvents']);
            $vtype       = mysqli_real_escape_string($db, implode( ',' , $_POST['vtype'] ));
            $vAmenities  = mysqli_real_escape_string($db, implode( ',' , $_POST['vAmenities'] ));
            $vUniform    = mysqli_real_escape_string($db, implode( ',' , $_POST['vUniform'] ));

            $updatequery = "UPDATE venue_profiles SET venue_name='$vupdname', City='$vAddCity', St_Address='$vAddSt', Brgy='$vAddBrgy', Landmark='$vAddLM', Venue_email='$vupdemail', Number='$vupdnum', website='$vupdweb', Open_Status='$vOpenStat', Food='$vFood', Beverages='$vBev', avg_cost='$vAveCost', area='$vArea', max_seating='$vSeat', max_standing='$vStand', Venue_type='$vtype', Amenities='$vAmenities', Uniformity='$vUniform', overview='$vOverview', events='$vEvents' WHERE venue_id='$vid'";
            $result = mysqli_query($db,$updatequery); 
            if($result){
                header("Location:myaccount.php?successUpdate=" . urldecode("Venue details successfully updated!"));
                exit();
            }else{
                header("Location:myaccount.php?errupd=" . urldecode("Failed to update the Venue details"));
            exit();
            }
        }
        
    }

?>