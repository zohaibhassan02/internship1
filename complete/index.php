<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $birthday = $phone = $email = $father_name = $age = "";
$username_err = $password_err = $confirm_password_err = $birthday_err = $phone_err = $email_err = $father_name_err = $age_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    $date = str_replace("/", "-", $_POST["birthday"]);
    $d = explode("-"  , $date);
    if(empty(trim($_POST["birthday"]))){
        $birthday_err = "Please enter your date of birth.";
    } elseif(!checkdate($d[0], $d[1], $d[2])){
        $birthday_err = "Invalid date format";
    } else{
        $birthday = $_POST["birthday"];
    }


    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your phone number";
    } elseif(!preg_match('/^(?:(([+]|00)92)|0)((3[0-6][0-9]))(\d{7})$/', $_POST["phone"])){
        $phone_err = "Please enter valid phone number";
    } else {
        $phone = $_POST["phone"];
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email address";
    } elseif(!preg_match('/^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/', $_POST["email"])){
        $email_err = "Please enter a valid email address.";
    } else{
        $email = $_POST["email"];
    }

    if(empty(trim($_POST["father_name"]))){
        $father_name_err = "Please enter your father's name.";
    } else{
        $father_name = $_POST["father_name"];
    }

    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter your age.";
    } elseif(!is_numeric($_POST["age"]))  {
        $age_err = "Only digits are allowed.";
    } elseif(strlen($_POST["age"]) > 3){
        $age_err = "Impossible age";
    } else{    
        $age = $_POST["age"];
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($birthday_err) && empty($phone_err) && empty($email_err) && empty($father_name_err) && empty($age_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, birthday, phone, email, father_name, age) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_username, $param_password, $param_birthday, $param_phone, $param_email, $param_father_name, $param_age);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_birthday = $birthday;
            $param_phone = $phone;
            $param_email = $email;
            $param_father_name = $father_name;
            $param_age = $age;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Birthday</label>
                <input type="text" name="birthday" placeholder="mm/dd/yyyy" class="form-control <?php echo (!empty($birthday_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday; ?>">
                <span class="invalid-feedback"><?php echo $birthday_err; ?></span>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Father's name</label>
                <input type="text" name="father_name" class="form-control <?php echo (!empty($father_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $father_name; ?>">
                <span class="invalid-feedback"><?php echo $father_name_err; ?></span>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                <span class="invalid-feedback"><?php echo $age_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>