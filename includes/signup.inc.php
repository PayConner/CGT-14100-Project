<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $name = $_POST["name"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(uidExists($conn, $uid, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $uid, $pwd);

}else{
    header("location: ../signup.php");
    exit();
}