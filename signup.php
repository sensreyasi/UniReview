<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="login_signup_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
  function validform(){
    var fname = document.getElementById("fname").value;
          var lname = document.getElementById("lname").value;
          var pass = document.getElementById("psw").value;
          var repass = document.getElementById("repsw").value;
          




          if( fname==""){
              alert("Firstname cannot be empty");
              return false;
          }

          

          if( lname==""){
              alert("Last name cannot be empty");
              return false;
          }

          

          if(pass!=repass){
              alert( "passwords donot match. please retry");
              return false;

          }else{
              if(pass.length>=8 && pass.length <=32){
                  ;
              }else{
                  alert("Password length must be between 8-32 chars");
                  return false;
              }
          }

          return true;

  }
</script>
</head>
<body>

  <div class="header">
    <a href="index.php" class="logo">UniView</a>
    <div class="header-right">
      <a  href="index.php">Home</a>
      <a  href="gallery.php">Gallery</a>
      <a href="contact.php">Contact</a>
      <a href="about.php">About us</a>
      <button onclick="document.location='login.php'" class="btn login">log in</button>
  <button onclick="document.location='signup.php'"  class="btn signup">sign up</button>
</div>
</div>
<div class="main">
  <h1> Sign Up</h1>
  <form class="example" action="signup-action.php" method="POST" onsubmit="return validform()">



    <p>First Name</p>
    <input type="text" placeholder="Enter First Name" name="fname" id="fname" required><br>

   <p>Last Name</p>
    <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>

    <p>Email</p>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>


    <p>Institute</p>
    <input type="text" placeholder="Enter Profession" name="institution" required><br>

    <p>Country</p>
    <input type="text" placeholder="Enter Country" name="country" required><br>
   

    <p>Password</p>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <p>Retype Password</p>
    <input type="password" placeholder="Enter Password" name="repsw" id="repsw" required>


    <input type="checkbox" name="check"><label for="check" requred> I agree to the <a href="#">terms and conditions</a> and <a href="#">privacy policy</a>, <br> and to become a member of this community</label>
    <br>
    <button type="submit"name="reg_user">Register</button>
    <p> Already a member? <a href="login.php"> Sign in </a></p>




  </form>
</div>

  

<div class="footer">
  <p>Footer</p>
</div>

</body>
</html>
