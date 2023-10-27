<?php

session_start();
    $host = "bmlx3df4ma7r1yh4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";  
    $user = "ilsohc2xf1g4umks";  
    $password = 'rbmo0jy4yjyf1n6t';  
    $db_name = "vyuqymg5q58axnli";  
    global $db;
    $db = mysqli_connect($host, $user, $password, $db_name);
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/uniview/');
?>  