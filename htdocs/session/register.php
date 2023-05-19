<?php
require_once "config.php";

$email = $pass = $pass2 = $age = $state = "";
$email_err = $pass_err = $pass2_err = $age_err = $state_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email address";
    }
    elseif(!preg_match('/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/', trim($_POST["email"]))){
            $email_err = "Please enter a valid email address.";
    }
    else{
        $sql = "SELECT sn FROM users WHERE email = ?";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered.";
                }
                else{
                    $email = trim($_POST["email"]);
                }
            }    
            
            else{
                echo "Oops! Something went wrong.";
            }
            mysqli_stmt_close($stmt);

        }
    }

if(empty(trim($_POST["pass"]))){
    $pass_err = "Please enter a password";
}
else{
    $pass = trim($_POST["pass"]);
}

if(empty(trim($_POST["pass2"]))){
    $pass2_err = "Please confirm password.";
}
elseif(trim($_POST["pass2"]) != $pass){
    $pass2_err = "Passwords do not match.";
} 
else{
    $pass2 = trim($_POST["pass2"]);
}

if(empty(trim($_POST["age"]))){
    $age_err = "Please enter your age";
}
elseif(!is_numeric($_POST["age"])){
    $age_err = "Only digits are allowed";
}
elseif($_POST["age"] < 18){
    $age_err = "User must be atleast 18 years old";
}
else{
    $age = trim($_POST["age"]);
}

if(empty($_POST["state"])){
    $state_err = "Please enter the state you live in.";
}
else{
    $state = $_POST["state"];
}

if(empty($email_err) && empty($pass_err) && empty($pass2_err) && empty($age_err) && empty($state_err)){
    $sql = "INSERT INTO users (email, pass, age) VALUES (?, ?, ?)";

    if($stmt = mysqli_prepare($con, $sql)){
        mysqli_stmt_bind_param($stmt, "ssi", $param_email, $param_pass, $param_age);

        $param_email = $email;
        $param_pass = password_hash($pass, PASSWORD_DEFAULT);
        $param_age = $age;

        if(mysqli_stmt_execute($stmt)){
            $query = "INSERT INTO state (name, email) VALUES (?, ?)";
            if($st = mysqli_prepare($con, $query)){
                mysqli_stmt_bind_param($st, "ss", $param_state, $param_email);
                $param_state = $state;
                if(mysqli_stmt_execute($st)){
                    $to_email = $email;
                    $subject = "Registration";
                    $body = "Thank you for successfully registering with us.";
                    $headers = "From: zohaibhassan22002@gmail.com";
                    mail($to_email, $subject, $body, $headers);
                        
                    header("location: index.php");
                }
            }
            else{
                echo "error";
            }
        }
        else{
            echo "Oops! Something went wrong";
        }
        mysqli_stmt_close($stmt);
    }
}
        
mysqli_close($con);

}
?>

<!DOCTYPE html>
<head>
    <title>Form registeration</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <label>Email</label>
        <input type="text" name="email" value="<?= $email; ?>"
        <small><?= $email_err; ?></small>
        <br><br>

        <label>Password</label>
        <input type="password" name="pass" value="<?= $pass; ?>"
        <small><?= $pass_err; ?></small>
        <br><br>

        <label>Confirm Password</label>
        <input type="password" name="pass2" value="<?= $pass2; ?>"
        <small><?= $pass2_err; ?></small>
        <br><br>

        <label>Age</label>
        <input type="text" name="age" value="<?= $age; ?>"
        <small><?= $age_err; ?></small>
        <br><br>

        <p>Which of these topics best describe your post</p>
        <input type="radio" value="sindh" name="state" id="type1">
        <label for="type1">Sindh</label><br>

        
        <input type="radio" value="punjab" name="state" id="type2">
        <label for="type2">Punjab</label><br>

        
        <input type="radio" value="balochistan" name="state" id="type3">
        <label for="type3">Balochistan</label><br>

        
        <input type="radio" value="kpk" name="state" id="type4">
        <label for="type4">KPK</label><br>

        <div>
            <?= $state_err; ?>
        </div><br>


        <input type="submit" value="Submit">
        <input type="reset" value="Reset">

        <p>Already have an account? <a href="index.php">Login here</a></p>

    </form>
</body>
</html>