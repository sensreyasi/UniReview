<?php


include_once 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Uniview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" href="card_style.css">
    <link rel="stylesheet" href="review_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
<a href="#default" class="logo" >UniView</a>
<div class="header-right">
    <a class="active" href="#home">Home</a>
    <a  href="gallery.php">Gallery</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About us</a>
    <?php if (isset($_SESSION['user']['first_name'])) { ?>
    <a href="logout.php">logout (<?php echo $_SESSION['user']['first_name'];?>)</a>
    <?php }
    else{ ?>
    <button onclick="document . location = 'login.php'" class="btn login">log in</button>
    <button onclick="document . location = 'signup.php'"  class="btn signup">sign up</button>
<?php } ?>
</div>
</div>
