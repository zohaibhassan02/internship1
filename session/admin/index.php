<?php

session_start();

if(isset($_SESSION["signedin"]) && $_SESSION["signedin"] === true){
    header("location: homepage.php");
    exit;
}

require_once "/laragon/www/session/config.php";

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
          $sql = "SELECT id, email, pass FROM admins WHERE email = ? AND pass = ?";
          if($stmt = mysqli_prepare($con, $sql)){
              mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_pass);
              
              $param_email = $email;
              $param_pass = $pass;
            
              if(mysqli_stmt_execute($stmt)){
                  mysqli_stmt_store_result($stmt);

                  if(mysqli_stmt_num_rows($stmt) == 1){
                         
                          $_SESSION["signedin"] = true;
                          $_SESSION["id"] = $id;
                          $_SESSION["emailid"] = $email;
                          
                          
                          header("location: homepage.php");
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
   
    </form>
</body>
</html>