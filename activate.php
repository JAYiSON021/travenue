<?php
    include("includes/config.php");
    include("includes/db.php");
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $query = "UPDATE admins SET isActivated = '1' WHERE Act_Token='$token'";
        if($db->query($query)){
            header("Location:login.php?success=" . urldecode("Account successfuly activated!<br>Plese sign in to continue"));
            exit();
        }
    }
?>