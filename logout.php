<?php
    session_start();
    $_SESSION['vemail'] = "";
    setcookie("vemail", "", time()-60*60*24*15);
    session_destroy();
    header("Location:login.php");
    exit();
?>