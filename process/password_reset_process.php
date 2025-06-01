<?php
include("../config/Connection.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $new_password = $_POST['new_reset__password'];
  $confirm_password = $_POST['confirm_reset_password'];
  $token = $_POST['token'];


  if ($new_password !== $confirm_password) {
    header("Location: ../View/password_reset.php?matching=false");
    exit();
  };
  $newhashed_password = password_hash($new_password, PASSWORD_DEFAULT);


  

  $sql = "UPDATE users SET password = '$newhashed_password' where token = '$token'";
  $result = $conn->query($sql);
  if ($result) {
    header("location: ../View/index.php?set=true");
    exit();
  } else {
    header("location: ../View/index.php?set=false");
    exit();
  }
} else {
  header("location: ../View/index.php");
  exit();
}
