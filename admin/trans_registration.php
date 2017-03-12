<?php

    function isUniqueVenue($mail){
        $query = "SELECT * FROM  venue_profiles WHERE Venue_email ='$mail'";
        global $db;
        $result = $db->query($query);
        if($result->num_rows > 0){
            return false;
        }else return true;
    } 
    function isUniqueAdmin($mail){
        $query = "SELECT * FROM  admins WHERE email ='$mail'";
        global $db;
        $result = $db->query($query);
        if($result->num_rows > 0){
            return false;
        }else return true;
    }  

    if(isset($_POST['register'])){
        $_SESSION['vname']          = $_POST['vname'];
        $_SESSION['vemailadd']      = $_POST['vemailadd'];
        $_SESSION['vcontactnum']    = $_POST['vcontactnum'];
        $_SESSION['vcity']          = $_POST['vcity'];
        $_SESSION['vstadd']         = $_POST['vstadd'];
        $_SESSION['vbrgy']          = $_POST['vbrgy'];
        $_SESSION['vlmark']         = $_POST['vlmark'];

        $_SESSION['regAdemail'] = $_POST['regAdemail'];
        $_SESSION['adfn'] = $_POST['adfn'];

        if(strlen($_POST['vname']) < 6){
            header("Location:register.php?err=" . urldecode("The Venue Name / title must be atleast 6 characters long"));
            exit();
        }else if($_POST['password'] != $_POST['conpassword']){
            header("Location:register.php?err=" . urldecode("Admin's Passwords do not match"));
            exit();
        }else if(strlen($_POST['password']) < 6 || strlen($_POST['conpassword'] < 6)){
            header("Location:register.php?err=" . urldecode("Admin's Passwords must be atleast 6 characters long"));
            exit();
        }else if(!isUniqueVenue($_POST['vemailadd'])){
            header("Location:register.php?err=" . urldecode("Venue Email is already in use."));
            exit();
        }else if(!isUniqueAdmin($_POST['regAdemail'])){
            header("Location:register.php?err=" . urldecode("Admin's Email is already in use."));
            $_SESSION['regAdemail'] = "";
            exit();
        }else{
            date_default_timezone_set("Asia/Manila");
            $curr =  date("Ahisymd");         
            $vid = "VN-" . $curr;
            $aid = "AD-". $curr;
            $dc = date("y/m/d h/i/s A");

            $vname = mysqli_real_escape_string($db, $_POST['vname']);
            $vmail = mysqli_real_escape_string($db, $_POST['vemailadd']);
            $vcontactnum = mysqli_real_escape_string($db, $_POST['vcontactnum']);
            $vcity = mysqli_real_escape_string($db, $_POST['vcity']);
            $vstadd = mysqli_real_escape_string($db, $_POST['vstadd']);
            $vbrgy = mysqli_real_escape_string($db, $_POST['vbrgy']);
            $vlmark = mysqli_real_escape_string($db, $_POST['vlmark']);
            
            $adfn = mysqli_real_escape_string($db, $_POST['adfn']);
            $ademail = mysqli_real_escape_string($db, $_POST['regAdemail']);
            $pass = md5($_POST['conpassword']);
            $token = bin2hex(openssl_random_pseudo_bytes(32));

            $vnquery = "INSERT INTO venue_profiles (venue_id,admin_id,venue_name,City,St_Address,Brgy,Landmark,Venue_email,Number,date_created) VALUES ('$vid','$aid','$vname','$vcity','$vstadd','$vbrgy','$vlmark','$vmail','$vcontactnum','$dc')";
            $result = mysqli_query($db,$vnquery);
            if($result){
                $adquery = "INSERT INTO admins (admin_id,venue_id,Fullname,email,password,Act_Token,date_created) VALUES ('$aid','$vid','$adfn','$ademail','$pass','$token','$dc')";
                $result = mysqli_query($db,$adquery);
                if($result){
                    $imgquery ="INSERT INTO venue_imgs (venue_id,img_type,img_path) VALUES ('$vid','profile','img/default')";
                    $result = mysqli_query($db,$imgquery);
                    if($result){
                        $message = "Thank you For your Registration! Please Complete your registration by activating your account. Please click this link: http://localhost/travenue/activate.php?token=$token";
                        mail($ademail, 'Activate Venue Account', $message, 'From sanagustinjaysson@gmail.com');
                        header("Location:login.php?success=" . urldecode("Venue registration Successful! please check your email for activation."));
                        $_SESSION['vname'] = "";
                        $_SESSION['vemailadd'] = "";
                        $_SESSION['vcontactnum'] = "";
                        $_SESSION['vcity'] = "";
                        $_SESSION['vstadd'] = "";
                        $_SESSION['vbrgy'] = "";
                        $_SESSION['vlmark'] = "";
                        $_SESSION['ademail'] = "";
                        $_SESSION['adfn'] = "";
                        exit();
                    }else{
                        $delqeury = "DELETE FROM venue_profiles WHERE venue_id='$vid'";
                        $result = mysqli_query($db,$adquery);
                        header("Location:register.php?err=" . urldecode("Something went wrong :("));
                        exit();
                    }
                }else{
                    $delqeury = "DELETE FROM venue_profiles WHERE venue_id='$vid'";
                    $result = mysqli_query($db,$adquery);
                    header("Location:register.php?err=" . urldecode("Something went wrong :("));
                    exit();
                }
            }else{
                header("Location:register.php?err=" . urldecode("Failed to register."));
                exit();
            } 
        }
    }

?>