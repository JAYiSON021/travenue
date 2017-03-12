<?php
    function isLoggedIn(){
        if(isset($_SESSION['ademail']) || isset($_COOKIE['ademail'])){
            return true;
        }else return false;
    }

    function isLoggedInLooker(){
        if(isset($_SESSION['lookemail']) || isset($_COOKIE['lookemail'])){
            return true;
        }else return false;
    }
?>