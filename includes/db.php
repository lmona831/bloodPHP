<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "blood_app_1";

 //  Peocedural
  // create connection 
   $connection = mysqli_connect($servername,$username,$password,$db);

    // check connection

    if (!$connection){
        die("Connection is Failed" . mysqli_connect_error());
    }
    // echo "Connection Successfully";

?>