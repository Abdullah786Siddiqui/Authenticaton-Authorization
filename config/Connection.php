<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "secure_auth_system";

$conn = new mysqli($host,$username,$password,$database);
if($conn->connect_error){
  die('Connection Failed');
}



?>