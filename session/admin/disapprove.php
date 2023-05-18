<?php 

session_start();

require_once "/laragon/www/session/config.php";
$postid = $_GET['postid'];
$sql = "DELETE FROM approval WHERE postid = $postid";
if(mysqli_query($con, $sql)){
    mysqli_close($con);
    $_SESSION["message"] = "Postid {$postid} deleted from records.";
    header('Location: approval.php');
    exit;
}
else{
    echo "Error deleting record";
}

?> 