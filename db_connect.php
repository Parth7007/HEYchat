<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "room";
    $port = 4306;

    $con = mysqli_connect($servername, $username, $password, $database, $port);


    if (!$con) {
        
        die("Failed to connect". mysqli_connect_error());
    }

   
?>

