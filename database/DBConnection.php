<?php
    $server = "phpmyadmin.test";
    $username = "root";
    $password = "root@123";
    $dbName = "quiet_attic_films";

    $DBConnect = mysqli_connect($server, $username, $password, $dbName);

    if(!$DBConnect) {
        die("Database Connection Failed :".mysqli_connect_error());
    }

    //echo "Db connected";
    return $DBConnect;
?>