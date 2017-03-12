<?php
    if(isset($_SESSION['ademail'])){
        $email = $_SESSION['ademail'];
        $query = "SELECT * FROM admins WHERE email='$email'";
        $result = $db->query($query);
        if($row = $result->fetch_assoc()){
            if($row['isActivated'] == 1){
                $aid = $row['admin_id'];
                $vid = $row['venue_id'];
                $fn = $row['Fullname'];
                $mail = $row['email'];
                include("admin/getVenuedetails.php");
            }else{
                header("Location:login.php?err=" . urldecode("Please activate your account first before logging in"));
                exit();
            }
        }else{
            header("Location:login.php?err=" . urldecode("Invalid Data Access"));
            exit();
        }
    }else if(isset($_COOKIE['ademail'])){
        $_SESSION['ademail'] = $_COOKIE['ademail'];
        $email = $_SESSION['ademail'];
        $query = "SELECT * FROM admins WHERE email='$email'";
        $result = $db->query($query);
        if($row = $result->fetch_assoc()){
            if($row['isActivated'] == 1){
                $aid = $row['admin_id'];
                $vid = $row['venue_id'];
                $fn = $row['Fullname'];
                $mail = $row['email'];
                include("admin/getVenuedetails.php");
            }else{
                header("Location:login.php?err=" . urldecode("Please activate your account first before logging in"));
                exit();
            }
        }else{
            header("Location:login.php?err=" . urldecode("Invalid Data Access"));
            exit();
        }
    }else{
        header("Location:login.php?err=" . urldecode("Invalid Access"));
        exit();
    }
    
?>