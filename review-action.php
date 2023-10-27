<?php
include 'connect.php';
//error_reporting(0);
//global $vuname;


if(isset($_POST["uname"])||isset($_POST["dname"])||isset($_POST["details"]))
{
$rename=$_POST["rename"];   
$uname = $_POST["uname"];
$dname = $_POST["dname"];
$details = $_POST["details"];
}

$sql = "INSERT INTO review (rev_name,uni_name,dept_name,details) values ('$rename','$uname','$dname','$details')";
if(mysqli_query($conn,$sql)){

    echo 'data inserted...';
   
    echo '<a href="index.php">Home<br></a>';
    
    
}
else
{

    echo 'error '. $sql . '<br>' . mysqli_error($conn);
}

$sql2 = "SELECT id, upper(substring(uni_name,1,1)) as uni_name , dept_name,details FROM review limit 3";
$result = mysqli_query($conn, $sql2);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result))
 
{
    echo "id: " . $row["id"]. " - Name: " . $row["uni_name"]. " " . $row["dept_name"]. "<br>";
}
}

else
 {
    echo "0 results";
 }



?>

