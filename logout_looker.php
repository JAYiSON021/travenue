<?php
    session_start();
    $_SESSION['lookemail'] = "";
    setcookie("lookemail", "", time()-60*60*24*15);
    session_destroy();
    header("Location:search.php");
    exit();
?>