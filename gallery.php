<?php


include 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="gallery_style.css">
<link rel="stylesheet" href="mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="header">
  <a href="#default" class="logo">UniView</a>
  <div class="header-right">
    <a  href="index.php">Home</a>
    <a class="active" href="gallery.php">Gallery</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About us</a>
      <?php if (isset($_SESSION['user']['first_name'])) { ?>
          <a href="logout.php">logout</a>
      <?php }
      else{ ?>
          <button onclick="document . location = 'login.php'" class="btn login">log in</button>
          <button onclick="document . location = 'signup.php'"  class="btn signup">sign up</button>
      <?php } ?>
  </div>
  </div>
  <div class="slidershow middle">

    <div class="slides">
      <input type="radio" name="r" id="r1" checked>
      <input type="radio" name="r" id="r2">
      <input type="radio" name="r" id="r3">
      <input type="radio" name="r" id="r4">
      <input type="radio" name="r" id="r5">
      <div class="slide s1">
        <img src="1.jpg" alt="">
      </div>
      <div class="slide">
        <img src="2.jpg" alt="">
      </div>
      <div class="slide">
        <img src="3.jpg" alt="">
      </div>
      <div class="slide">
        <img src="4.jpg" alt="">
      </div>
      <div class="slide">
        <img src="5.jpg" alt="">
      </div>
    </div>

    <div class="navigation">
      <label for="r1" class="bar"></label>
      <label for="r2" class="bar"></label>
      <label for="r3" class="bar"></label>
      <label for="r4" class="bar"></label>
      <label for="r5" class="bar"></label>
    </div>
  </div>
  <div class="footer">
    <p>Footer</p>
  </div>
</body>
</html>
