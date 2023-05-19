<?php 
session_start();
  $username = "";
  $email = "";
  $birthday = "";
  $phone = "";
  $errors = array();

//connect to the database
$db = mysqli_connect('localhost', 'root', 'password', 'form');

//if submit button is clicked
if(isset($_POST['register'])){
    $username = mysqli_real_escape_string($db, $_POST['Username']);
    $password = mysqli_real_escape_string($db, $_POST['Password']);
    $password2 = mysqli_real_escape_string($db, $_POST['Password2']);
    $birthday = mysqli_real_escape_string($db, $_POST['Birthday']);
    $phone = mysqli_real_escape_string($db, $_POST['Phone']);
    $email = mysqli_real_escape_string($db, $_POST['Email']);

//ensure none of the fields are empty
  if(empty($username)){
    array_push(errors, "Username is required");
  }
  if(empty($password)){
    array_push(errors, "Password is required");
  }
  if($password != password2){
    array_push(errors, "Passwords do not match");
  }
  if(empty($birthday)){
    array_push(errors, "Date of Birth is required");
  }
  if(empty($phone)){
    array_push(errors, "Phone number is required");
  }
  if(empty($email)){
    array_push(errors, "Email is required");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }



//if there are no errors, save user to database
  if(count($errors == 0){
    $query = "INSERT INTO user info (username, password, birthday, phone, email) VALUES('$username', '$password', '$birthday', '$phone', '$email')";
    mysqli_query($db, $query);
    $_SESSION['Username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }
}

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
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
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
  
    