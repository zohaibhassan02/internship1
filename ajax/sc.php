<?php 
session_start();
require_once "mydbCon.php"; 
$email = $_SESSION["email"];
$sc = "";
$sc_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["sc"]))){
        $sc_err = "Please enter your security code. It was emailed to you.";
    }
    else{
        $sc = trim($_POST["sc"]);
    }
    
    if(empty($sc_err)){ 
        $sql = "SELECT * FROM customers WHERE email = '$email' AND sc = '$sc'";
        if(mysqli_query($conn, $sql)){
            $row = mysqli_query($conn, $sql);
            if(mysqli_num_rows($row) > 0){
                header("Location: homepage.php");
            }
            else{
                echo "incorrect sn number";
            }
        }
        else{
            echo "error occured";
        }
    }
}
?>
<!DOCTYPE html>
<head>
<title> Validation </title>
</head>

<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<label>Security Code</label>
        <input type="text" name="sc" value="<?= $sc; ?>">
        <small><?= $sc_err; ?></small>

<input type="submit">
</form<
</body>
</html>