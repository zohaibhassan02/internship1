<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'oop_db');

class DB_con{
    protected function db(){
        $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        $this->dbh=$con;
// Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
}

class operations extends DB_con{

    public function __construct(){
        $this->db();
// or use __construct instead of db in function and then use parent::__construct() in child construct
    }

    public function usernameavailability($uname){
        $result = mysqli_query($this->dbh,"SELECT Username FROM users WHERE Username='$uname'");
        return $result;
    }

    public function register($fname,$uname,$uemail,$password, $phone){
        $ret = mysqli_query($this->dbh,"insert into users(FullName,Username,UserEmail,Password,Phone) values('$fname','$uname','$uemail','$password', '$phone')");
        return $ret;
    }

    public function signin($uname,$password){
        $res = mysqli_query($this->dbh,"select id,FullName from users where Username='$uname' and Password='$password'");
        return $res;
    }

    public function phpmail($uemail){
    $to_email = $uemail;
    $subject = "Registration";
    $body = "Thank you for successfully registering with us.";
    $headers = "From: zohaibhassan22002@gmail.com";
    $rm = mail($to_email, $subject, $body, $headers);
    return $rm;
    }
}

?>