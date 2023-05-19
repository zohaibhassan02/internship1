<?php
require_once "config.php";
$input = "";
$input_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["input"]))){
        $input_err = "Please enter your email address";
    }
    else{
        $input = trim($_POST["input"]);
    }
    
    if(empty($input_err)){
        $sql = "SELECT * FROM users WHERE email = '$input'";
        $stmt = mysqli_query($con, $sql);
        $count = mysqli_num_rows($stmt);
        if($count == 1) {
            $row = mysqli_fetch_assoc($stmt);
            $username = $row['email'];
            $new_password = "qwerty";
            $password = password_hash($new_password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET pass = '$password' WHERE email = '$username'";
            $result = mysqli_query($con, $query);
            if($result){
                echo "<script> alert('Your password has been reset and sent to your email address'); </script>";
                $to_email = $username;
                $subject = "Forgot password";
                $body = "Your new password is qwerty";
                $headers = "From: zohaibhassan22002@gmail.com";
                if(mail($to_email, $subject, $body, $headers)){
                    header("Location: index.php");
                }
                else{
                        echo "Error emailing.";
                }
                
            }
        }
        else{
            $input_err = "no such user exists";
        }
    }
    mysqli_close($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Forget Password</h2>
        <p>Please fill out this form to get access to your account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="input" class="form-control <?php echo (!empty($input_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $input_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <button class="btn btn-warning"><a href="index.php">Cancel</a></button>
            </div>
        </form>
    </div>    
</body>
</html>