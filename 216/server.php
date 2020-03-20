<?php
session_start();

// initializing variables
$username = "";
$role    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'codenair');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']); 
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $role = mysqli_real_escape_string($db, $_POST['role']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push($errors, "Please enter your full name"); }
  if (empty($username)) { array_push($errors, "Please enter your username"); }
  if (empty($password_1)) { array_push($errors, "Please enter your password"); }
  if (empty($address)) { array_push($errors, "Please enter your address"); }
  if (empty($email)) { array_push($errors, "Please enter your email"); }
  if (empty($role)) { array_push($errors, "Please select a role"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or role
  $user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }


  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (fullname, username, password, address, email, role) 
  			  VALUES('$fullname', '$username', '$password','$address',  '$email', '$role')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>
