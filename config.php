<?php

require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('655940624927-5k30bhv4bcfn48r5c5aqb870c40spmq7.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('EgvUr3f_7ZRKiwkLhKbPCi0U');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://test-unid.herokuapp.com/');

//
$google_client->addScope('email');
$google_client->addScope('profile');



session_start();
    $host = "bmlx3df4ma7r1yh4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";  
    $user = "ilsohc2xf1g4umks";  
    $password = 'rbmo0jy4yjyf1n6t';  
    $db_name = "vyuqymg5q58axnli";  
      
    $db = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }



define ('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost/uniview/');
?>  