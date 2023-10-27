<?php
include 'config.php';
//error_reporting(0);
//global $vuname;


$name=$_POST['cname'];
$email=$_POST['cemail'];
$subject=$_POST['csubject'];
$message=$_POST['cmessage'];

$sql = "INSERT INTO contact (name,email,subject,message) values ('$name','$email','$subject','$message')";
if(mysqli_query($db,$sql)){

    echo 'data inserted...';
   
    header('location:index.php');
    
    
}
else
{

    echo 'error '. $sql . '<br>' . mysqli_error($db);
}