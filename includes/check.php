<?php
function isLoggedIn(){
    if(isset($_SESSION['vemail']) || isset($_COOKIE['vemail'])){
        return true;
    }else return false;
}
?>