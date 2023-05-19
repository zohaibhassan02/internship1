<?php

define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', 'password');
define('NAME', 'sessiondb');

$con = mysqli_connect(SERVER, USERNAME, PASSWORD, NAME);

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_err());
}

?>