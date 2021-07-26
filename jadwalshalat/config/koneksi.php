<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "jadwalshalat";

$kon = mysqli_connect($host, $user, $password, $database);

if(mysqli_connect_errno()){
    echo "Connected ". mysqli_connect_error();
}

?>