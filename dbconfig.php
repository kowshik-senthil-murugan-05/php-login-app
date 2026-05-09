<?php

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "php_login";

    $conn = new mysqli($serverName, $username, $password, $dbName);

    if($conn->connect_error){
        die("Database connection failed!!");
    }
?>