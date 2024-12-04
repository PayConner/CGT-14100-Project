<?php

$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "14100project";

$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());

}

?>