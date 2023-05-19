<?php

  if($_POST){
    $username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$birthday = $_POST['birthday'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('localhost','root','password','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO reg(username, password, birthday, phone, email) VALUES(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $username, $password, $birthday, $phone, $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
  }
?>


