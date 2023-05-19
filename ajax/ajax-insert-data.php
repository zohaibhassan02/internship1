<?php
    include "mydbCon.php";
 $fname = $email = $lname = "";
 if(isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['lname']) && isset($_POST['password'])){
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM customers WHERE email = '$email'";
$row = mysqli_query($conn, $sql);
if(mysqli_num_rows($row) > 0){
  echo '0';
  exit;
}
else{

 
    if(mysqli_query($conn, "INSERT INTO customers(fname, lname, email, password) VALUES('" . $fname . "', '" . $lname . "', '" . $email . "','" . $password . "')")) {
        echo '1';   
       }
       else{
        echo "Error: " . $sql . "" . mysqli_error($conn);
       }

    }
} 


?>