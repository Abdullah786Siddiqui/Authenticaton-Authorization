<?php
include("../config/Connection.php");
include("../View/navbar.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $current_password = $_POST['curr_password'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];


  if ($new_password !== $confirm_password) {
    header("Location: ../View/password_change.php?matching=false");
    exit();
 
  };


  $email = $_SESSION['email'];
  $sql = "SELECT password FROM users where email = '$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if (!$row || !password_verify($current_password, $row['password'])) {
    header("Location: ../View/password_change.php?current_password=false");
  } else {
    $newhashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = '$newhashed_password' where email = '$email' ";
    $result = $conn->query($sql);
    if ($result) {
      header("Location: ../View/profile.php?setpassword=true");
      exit();
    }
  }
}
