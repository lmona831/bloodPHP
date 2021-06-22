<?php

session_start();
session_destroy();
header('location: login.php');

function logout_msg(){
   
    $message = "Logout Successfully";
   
}
?>
