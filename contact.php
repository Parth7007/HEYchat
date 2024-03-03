<?php
    include "db_connect.php";


    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `contact` (`sno.`, `Name`, `Email`, `Message`, `stime`) VALUES ('', '$name', '$email', '$message', current_timestamp());";

    mysqli_query($con, $sql);
    mysqli_close($con);






?>