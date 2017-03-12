<?php
    $query = "SELECT * FROM venue_profiles WHERE venue_id='$vid'";
    $result = $db->query($query);
    if($row = $result->fetch_assoc()){
        $venue_name     = $row['venue_name'];
        $City           = $row['City'];
        $St_Address     = $row['St_Address'];
        $Brgy           = $row['Brgy'];
        $Landmark       = $row['Landmark'];
        $Venue_email    = $row['Venue_email'];
        $Number         = $row['Number'];
        $website        = $row['website'];
        $Open_Status    = $row['Open_Status'];
        $Food           = $row['Food'];
        $Beverages      = $row['Beverages'];
        $avg_cost       = $row['avg_cost'];
        $area           = $row['area'];
        $max_seating    = $row['max_seating'];
        $max_standing   = $row['max_standing'];
        $Venue_type     = explode(",",$row['Venue_type']);
        $Amenities      = explode(",",$row['Amenities']);
        $Uniformity     = explode(",",$row['Uniformity']);
        // get the Profile image
        $query = "SELECT * FROM venue_imgs WHERE venue_id='$vid'";
        $result = $db->query($query);
        if($row = $result->fetch_assoc()){
            $vProfilePath = $row['img_path'];
        }
    }else{
        header("Location:login.php?err=" . urldecode("Invalid Access"));
        exit();
    }
?>