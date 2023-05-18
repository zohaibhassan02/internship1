<?php 

session_start();

$_SESSION = array();

session_destroy();

header("location: ajax-form-submit.php");
exit;
?>