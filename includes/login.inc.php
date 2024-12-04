<?php

if(isset($_POST["submit"])){
    echo "It Works";
}else{
    header("location: ../signup.php");
}

?>