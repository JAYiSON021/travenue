<center>
    <?php echo date("Y/m/d"); 
    date_default_timezone_set("US/Central");
    $script_tz = date_default_timezone_get();
    if(strcmp($script_tz, ini_get('date.timezone'))){
        echo " Script timezone differs from ini-set timezone";
    }else{
        echo "Script timezone and from ini-set timexone match";
    }
    echo "<br/>";
    echo $script_tz;
    echo "<br/>";
    echo "The time is " . date("h:i:sa");
    ?>
</center>