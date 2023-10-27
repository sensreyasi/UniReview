<?php      
    include('config.php');  
    $email = mysqli_real_escape_string($db, $_POST['email']);  
    $password = mysqli_real_escape_string($db, $_POST['password']);  
      
       
      
        $sql = "select * from user where email = '$email' and password = '$password'";
        
        $result = mysqli_query($db, $sql);  
          
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  


			if (mysqli_num_rows($result) > 0) {
				// get id of created user

				// put logged in user into session array
				$_SESSION['user'] = $row;

				// if user is admin, redirect to admin area
				if ( in_array($_SESSION['user']['u_type'], ["Admin"])) {
					$_SESSION['message'] = "You are now logged in";
					// redirect to admin area
					header('location:' . BASE_URL . 'admin/users/');
					exit(0);
				} else {
					$_SESSION['message'] = "You are now logged in";
					// redirect to public area
					header('location: index.php');
					exit(0);
				}
			}
			else array_push($errors, 'Wrong credentials');


	?>


