<?php

define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('NAME', 'demodb');

$con = mysqli_connect(SERVER, USERNAME, PASSWORD, NAME);

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_err());
}

?>
