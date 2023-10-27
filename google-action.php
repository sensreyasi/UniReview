<?php      
    include('config.php');
	//Include Google Client Library for PHP autoload file


	//$google_client->addScope('profile');

	//start session on web page
	//session_start();



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

		//Below you can find Get profile data and store into $_SESSION variable
		/* if(!empty($data['given_name']))
		{
			$_SESSION['user_first_name'] = $data['given_name'];
		}

		if(!empty($data['family_name']))
		{
			$_SESSION['user_last_name'] = $data['family_name'];
		} */

		if(!empty($data['email']))
		{

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

	if(!isset($_SESSION['access_token']))
	{
		//Create a URL to obtain user authorization
		$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
	}










	?>


