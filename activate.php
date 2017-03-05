<?php
    include("includes/config.php");
    include("includes/db.php");
    if(isset($_GET['token'])){
        $token = $_GET['token'];
        $query = "UPDATE venue_accts SET status = '1' WHERE token='$token'";
        if($db->query($query)){
            header("Location:login.php?success=" . urldecode("Account successfuly activated!!"));
            exit();
        }
    }
?>