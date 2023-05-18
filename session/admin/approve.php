<?php 

session_start();

require_once "/laragon/www/session/config.php";
$postid = $_GET['postid'];

$query = "INSERT INTO posts (post, topic, email, sn, time) SELECT post, topic, email, sn, time FROM approval WHERE postid = $postid";
if(mysqli_query($con, $query)){
    $sql = "DELETE FROM approval WHERE postid = $postid";
    if(!mysqli_query($con, $sql)){
        echo "Error deleting record";
    }
    mysqli_close($con);
    $_SESSION["message"] = "Postid {$postid} from approvals table successfully approved. You will be redirected in a few seconds.";
    print $_SESSION["message"];
    unset($_SESSION["message"]);


    header('Refresh:7; url=approval.php');
    exit;
}
else{
    echo "Error inserting record";
}
?>