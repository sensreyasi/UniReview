<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="login_signup_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="header">
  <a href="index.php" class="logo">UniView</a>
  <div class="header-right">
    <a  href="index.php">Home</a>
    <a href="gallery.html">Gallery</a>
    <a href="contact.html">Contact</a>
    <a href="about.html">About us</a>
    <button class="btn login">log in</button>
<button onclick="document.location='signup.php'"  class="btn signup">sign up</button>
    
  </div>
</div>


<div class="main">
  <h1> Login </h1>
  <form action="login-action.php" method="POST" class="example">
    <p>Email</p>
    <input type="text" placeholder="Enter your Email" name="email">
    <p>password</p>
    <input type="password" placeholder="Enter your password" name="password">

      <button type="submit"> Submit</button> <br>


      <p><a href="#"> forgot password? </a></p>



      <p> No Account? <a href="signup.php"> Create one</a></p>



  </form>

    <?php
    include('config.php');
    echo '<a href="'.$google_client->createAuthUrl().'"> <i class="fa fa-google" aria-hidden="true"></i> Log in with Google</a>';
    ?>


</div>


<?php
include 'footer.php';
?>

</body>
</html>
