<?php 
require_once "config.php";
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$email = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
        $param_email = $email;
        $param_password = $password;
        if(mysqli_stmt_execute($stmt)){
            $to_email = $email;
            $subject = "Registration";
            $body = "Thank you for successfully registering with us.";
            $headers = "From: zohaibhassan22002@gmail.com";
            mail($to_email, $subject, $body, $headers);    
            header("Location: welcome.php");
        }
        else{
        echo "ERROR";
        }
    }
}
?>
<!DOCTYPE html>
<head>
    <title>DEMO</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label>Email</label>
    <input type="text" name="email">
    <br><br>

    <label>Password</label>
    <input type="password" name="password">
    <br><br>

    <input type="submit" value="Submit">
    </form>
</body>
</html>
