<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
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

<h2 style="text-align:center">User Profile </h2>


<?php

include 'connect.php';

  
    

    //$search=mysqli_real_escape_string($conn,$result);

    $sql3="SELECT first_name,last_name, email,institution,country,dept_name,uni_name from user,review limit 1 ";
  
    $result3 = mysqli_query($conn, $sql3);
    //$row_count=mysqli_num_rows($result3);
   
    if (mysqli_num_rows($result3) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result3))
         
            {
                
                echo '
                <div class="card">
                <img src="profile.jpg" alt="John" style="width:100%">
                <h1>'.$row['first_name'].'</h1>
                <p class="title">Department:'.$row['dept_name'].'</p>
                <p class="title">Email: '.$row['email'].'</p>
                <p>'.$row['uni_name'].'</p>
               
               
                
                
              </div>';
               
            }
        }
        
     
   
?>
<p><button  class="home" onclick="document.location='edit_profile.php'">Edit</button></p><br>
<p><button  class="edit" onclick="document.location='index.php'">Home</button></p>


</body>
</html>
