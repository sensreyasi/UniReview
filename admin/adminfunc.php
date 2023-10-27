<?php
// user user variables
include_once '../config.php';
$isEditingUser = false;
$firstname = "";
$u_type = "";
$email = "";
// general variables
$errors = [];

/* - - - - - - - - - -
-  user users actions
- - - - - - - - - - -*/
// if user clicks the create user button
if (isset($_POST['create_user'])) {
    createuser($_POST);
}
// if user clicks the Edit user button
if (isset($_GET['edit_user'])) {
    $isEditingUser = true;
    $user = $_GET['edit_user'];
    edituser($email);
}
// if user clicks the update user button
if (isset($_POST['update_user'])) {
    updateuser($_POST);
}
// if user clicks the Delete user button
if (isset($_GET['delete_user'])) {
    $email = $_GET['delete_user'];
    deleteuser($email);
}


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* - Returns all user users and their corresponding roles
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function getUsers(){
    global $db;
    $sql = "SELECT * FROM user ";
    $result = mysqli_query($db, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $users;
}
/* * * * * * * * * * * * * * * * * * * * *
* - Escapes form submitted value, hence, preventing SQL injection
* * * * * * * * * * * * * * * * * * * * * */
function esc(String $value){
    // bring the global db connect object into function
    global $db;
    // remove empty space sorrounding string
    $val = trim($value);
    $val = mysqli_real_escape_string($db, $value);
    return $val;
}
// Receives a string like 'Some Sample String'
// and returns 'some-sample-string'


function createuser($request_values){
global $db, $errors, $u_type, $fname,$lname,$country,$inst, $email, $password, $passwordConfirmation;
$fname = esc($request_values['fname']);
$lname = esc($request_values['lname']);
$country = esc($request_values['country']);
$inst = esc($request_values['inst']);
$email = esc($request_values['email']);
$password = esc($request_values['password']);
$passwordConfirmation = esc($request_values['passwordConf']);
$u_type = esc($request_values['u_type']);

// form validation: ensure that the form is correctly filled
/*if (empty($username)) { array_push($errors, "Uhmm...We gonna need the username"); }
if (empty($email)) { array_push($errors, "Oops.. Email is missing"); }
if (empty($role)) { array_push($errors, "Role is required for user users");}
if (empty($password)) { array_push($errors, "uh-oh you forgot the password"); }
if ($password != $passwordConfirmation) { array_push($errors, "The two passwords do not match"); }
*/
// Ensure that no user is registered twice.
// the email and usernames should be unique
$user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
if ($user) { // if user exists


if ($user['email'] === $email) {
array_push($errors, "Email already exists");
}
}
    echo count($errors);
    foreach( $errors as $error){
        echo $error;
    }
// register user if there are no errors in the form
if (count($errors) == 0) {
//encrypt the password before saving in the database
$query = "INSERT INTO user (first_name, last_name, u_type, email, country, institution, password)
VALUES('$fname', '$lname', '$u_type', '$email', '$country', '$inst', '$password')";
if(mysqli_query($db, $query)) {

    $_SESSION['message'] = "user created successfully";
    header('location: index.php');
    echo $_SESSION['message'];
    exit(0);
}
}
}
/* * * * * * * * * * * * * * * * * * * * *
* - Takes user id as parameter
* - Fetches the user from database
* - sets user fields on form for editing
* * * * * * * * * * * * * * * * * * * * * */
function edituser($email)
{
global $db, $u_type, $isEditingUser, $user, $fname, $lname, $country, $institution;

$sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
$result = mysqli_query($db, $sql);
$user = mysqli_fetch_assoc($result);
return $user;
// set form values ($username and $email) on the form to be updated
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* - Receives user request from form and updates in database
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
function updateuser($request_values){
    global $db, $errors, $u_type, $fname,$lname,$country,$inst, $email, $isEditingUser;
// get id of the user to be updated

// set edit state to false

    $fname = esc($request_values['fname']);
    $lname = esc($request_values['lname']);
    $country = esc($request_values['country']);
    $inst = esc($request_values['inst']);
    $email = esc($request_values['email']);
    $password = esc($request_values['password']);
    $u_type = esc($request_values['u_type']);
// register user if there are no errors in the fo
//encrypt the password (security purposes)

$query = "UPDATE user SET first_name='$fname', last_name='$lname', u_type='$u_type', country='$country', institution='$inst', password='$password' WHERE email='$email'";
if(mysqli_query($db, $query)) {

    $_SESSION['message'] = "user updated successfully";
header('location: index.php');
 //   exit(0);
}

}
// delete user
function deleteuser($email) {
    global $db;
$sql = "DELETE FROM user WHERE email='$email'";
    if (mysqli_query($db, $sql)) {
        $_SESSION['message'] = "User successfully deleted";
        header("location: index.php");
        exit(0);
    }

}
?>