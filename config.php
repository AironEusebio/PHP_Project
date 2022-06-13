<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dbproject";
    
    $conn = mysqli_connect($server, $username, $password, $database);
    if(!$conn){
        echo "wrnsd";
    }