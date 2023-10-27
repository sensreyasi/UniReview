<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: left;
  font-family: arial;
}
.home {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  
  text-align: center;
  font-family: arial;
  margin: 0;
  position: absolute;
  bottom: 25.5%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  
  
}
.edit {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  
  text-align: center;
  font-family: arial;
  margin: 0;
  position: absolute;
  bottom: 19%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  
  
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">UpdateProfile </h2>


<?php

include 'config.php';

  
    

    //$search=mysqli_real_escape_string($conn,$result);

    $sql3="SELECT * from user,review limit 1 ";
  
    $result3 = mysqli_query($conn, $sql3);
    //$row_count=mysqli_num_rows($result3);
   
    if (mysqli_num_rows($result3) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result3))
         
            {
                
                echo '
                <div class="card">
                <img src="profile.jpg" alt="John" style="width:100%">
                <p>First Name:<input type="text" value="'.$row['first_name'].'"></p>
                <p>Last Name:<input type="text" value="'.$row['last_name'].'"></p>
                <p> Email:<input type="text" value="'.$row['email'].'"></p>
                <p> Institution:<input type="text" value="'.$row['institution'].'"></p>
                <p>Country:<input type="text" value="'.$row['country'].'"></p>
                <p>user type:<input type="text" value="'.$row['u_type'].'"></p>
                <p>Password:<input type="text" value="'.$row['password'].'"></p>
               
               
                
               
               
                
                
              </div>';
               
            }
        }
        
     
   
?>
<!-- <p><button  class="home" onclick="document.location='edit_profile.php'">Update Info</button></p><br>
<p><button  class="edit" onclick="document.location='index.php'">Home</button></p> -->


</body>
</html>
