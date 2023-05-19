<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: homepage.php");
    exit;
}

require_once "config.php";

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
          $sql = "SELECT sn, email, pass FROM users WHERE email = ?";
          if($stmt = mysqli_prepare($con, $sql)){
              mysqli_stmt_bind_param($stmt, "s", $param_email);
              
              $param_email = $email;
            
              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);

                  if(mysqli_stmt_num_rows($stmt) == 1){
                      mysqli_stmt_bind_result($stmt, $sn, $email, $dbpass);
                      if(mysqli_stmt_fetch($stmt)){
                          if(password_verify($pass, $dbpass)){
                    
                          $_SESSION["loggedin"] = true;
                          $_SESSION["sn"] = $sn;
                          $_SESSION["email"] = $email;
                          
                          header("location: homepage.php");
                          }
                      else{
                          $login_err = "Invalid email or password";
                      }
                    }
                  } 
                   else{
                        $login_err = "Invalid email or password";
                    }
                  
              }
              else{
                  echo "Something went wrong.";
              }
              mysqli_stmt_close($stmt);  
          } 
      }
      
      mysqli_close($con);
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

        <p>Don't have an account? <a href="register.php">Register here</a></p>
        <p>Forgot your password? <a href="forget-password.php">Click here</a></p>

        <p>Are you an admin?<a href="admin/index.php">Click here to login</a></p>
   
    </form>
</body>
</html>