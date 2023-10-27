<?php

include 'header.php';

if(isset($_GET["code"]))
{
    //It will Attempt to exchange a code for an valid authentication token.
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if(!isset($token['error']))
    {
        //Set the access token used for requests
        $google_client->setAccessToken($token['access_token']);

        //Store "access_token" value in $_SESSION variable for future use.
        $_SESSION['access_token'] = $token['access_token'];

        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($google_client);

        //Get user profile data from google
        $data = $google_service->userinfo->get();

        
        
       
        
        if(!empty($data['email']))
        {
            //echo " " . $data['email'];
            $email = $data['email'];
            $sql = "select * from user where email = '$email'";
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
            elseif(mysqli_num_rows($result) ==0){
                
                $email = $data['email'];
                //$first_name = explode('@',$email,2)[0];
                $first_name = $data['given_name'];
                $last_name = $data['family_name'];
                $u_type ="Author";
                $create = "INSERT INTO user(first_name, last_name, email, u_type)
                VALUES ('$first_name','$last_name','$email','$u_type')";
                mysqli_query($db, $create);
                $_SESSION['username'] = $email;
                $_SESSION['success'] = "You are now logged in";
                echo $_SESSION['success'];
                header('location: index.php');
            }

            else array_push($errors, 'Wrong credentials');


        }
        /*
        if(!empty($data['gender']))
        {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if(!empty($data['picture']))
        {
            $_SESSION['user_image'] = $data['picture'];
        } */
    }
}

?>
<!-- search box -->
<form action="search_result.php" method="POST">
<div class="wrap">
  <div class="search">
    
     
     <input type="text" name="search" class="searchTerm" placeholder="What are you looking for?">
     <button type="submit" name="submit-search" class="searchButton">
       <i class="fa fa-search"></i>
    </button>
     
     
    
    
  </div>
</div>
</form>

</div>

  </div>

  

<div class="padd" ></div>
  
<div class="card-details">

 
 <button onclick="document.location='review.php'">write a Review</button>
 


  </div>

<?php


    //$search=mysqli_real_escape_string($conn,$result);
    $sql="SELECT * from review where published=1 ";
    $result2 = mysqli_query($db, $sql);
    $row_count=mysqli_num_rows($result2);
    if (mysqli_num_rows($result2) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result2))
         
            {
                
                echo "
                <link rel='stylesheet' href='mystyle.css'>
                <link rel='stylesheet' href='card_style.css'>
                <div class='flex-container'>
                  <div class='left-side'>
                      <div class='avatar-img'>".$row['rev_name']."</div>
                    <div class='student-name'>".$row['rev_name']."<br></div>
                  </div>
                  <div class='right-side'>
                      <div>".$row['uni_name']."</div>
                      <div>".$row['dept_name']."</div>
                      <p>".$row['details']."</P>
                  </div>
                </div>
                ";
               
            }
        }
        

   
?>
<!--Start of Tawk.to Script-->
<?php
include 'footer.php';
?>

</body>
</html>

