<?php      
    include 'config.php';
    echo 'inside sign-up action';
    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
  
        
        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $country = mysqli_real_escape_string($db, $_POST['country']);
        $institution = mysqli_real_escape_string($db, $_POST['institution']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $repassword = mysqli_real_escape_string($db, $_POST['repsw']);
        
     
        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
       
      
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        $errors = array();
        if ($user) { // if user exists
      
          
          if ($user['email'] == $email) {
            array_push($errors, "email already exists");
          }
        }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
           //encrypt the password before saving in the database
      
            $query = "INSERT INTO user (first_name, last_name, email, country, institution, password) 
                      VALUES('$fname', '$lname', '$email', '$country', '$institution', '$password')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $email;
            $_SESSION['success'] = "You are now logged in";
            echo $_SESSION['success'];
            header('location: index.php');
        
      }
    }
         
?>  