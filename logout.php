<?php
    session_start();
    $_SESSION['ademail'] = "";
    setcookie("ademail", "", time()-60*60*24*15);
    session_destroy();
    header("Location:login.php");
    exit();
?>