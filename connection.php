<?php
    $db_name = "mydb";
    $mysql_user = "root";
    $mysql_pass = "";
    $server_name = "localhost";

    $con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
    if(!$con)
    {
        //echo"Connection Error...".mysqli_connect_error();
    }
    else
    {
        //echo 'header('location: contactus.html')';
        //echo"<h3>Database connection Success...</h3>";
    }
?>