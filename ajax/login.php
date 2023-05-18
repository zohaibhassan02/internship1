<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: homepage.php");
    exit;
}

require_once "mydbCon.php";

$email = $pass = "";
$email_err = $pass_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email address";
    }
    else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["pass"]))){
        $pass_err = "Please enter your password";
    }
    else{
        $pass = trim($_POST["pass"]);
    }

      if(empty($email_err) && empty($pass_err)){
          $sql = mysqli_query($conn, "SELECT id, email, password FROM customers WHERE email = '$email' AND password = '$pass'");
          $numrows = mysqli_num_rows($sql);

                  if($numrows == 1){
                     
                    while($row = mysqli_fetch_assoc($sql)){
                        $dbid = $row['id'];
                        $dbemail = $row['email'];
                    }
                    
                          $_SESSION["loggedin"] = true;
                          $_SESSION["id"] = $dbid;
                          $_SESSION["email"] = $dbemail;

                          $sc = rand(100000, 999999);
                        if(mysqli_query($conn, "UPDATE customers SET sc = '$sc' WHERE email = '$email'")){
                            $to_email = $email;
                            $subject = "Registration";
                            $body = "Thank you for successfully registering with us. Your security code is {$sc}";
                            $headers = "From: zohaibhassan22002@gmail.com";
                            mail($to_email, $subject, $body, $headers);
                        } 
                          
                          header("location: sc.php");
                      }
                     
                   else{
                        $login_err = "Invalid email or password";
                    }
                  
        } 
      
      mysqli_close($conn);
}
?>



<!DOCTYPE html>
<head>
    <title>Form login</title>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Email</label>
        <input type="text" name="email" value="<?= $email; ?>"
        <small><?= $email_err; ?></small>

        <label>Password</label>
        <input type="password" name="pass" value="<?= $pass; ?>"
        <small><?= $pass_err; ?></small>

        <input type="submit" value="login">

        <div>
            <?= $login_err; ?>
        </div>

        <p>Don't have an account? <a href="ajax-form-submit.php">Register here</a></p>