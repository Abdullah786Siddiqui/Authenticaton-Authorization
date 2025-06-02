<?php
include("../config/Connection.php");

session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $email = $_POST['login_email'];
  $password = $_POST['login_password'];


  $sql = "SELECT * FROM users where email = '$email'";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    $hashed_Password = $row['password'];

    if (password_verify($password, $hashed_Password)) {
      $_SESSION['email'] = $row['email'];
      $_SESSION['username'] = $row['name'];
      $_SESSION['role'] = $row['role'];

      if ($row['role'] === "admin") {
        header("Location: ../Admin-panel/dashboard.php");     
        exit();
      } else {
        header("Location: ../View/profile.php");
        exit();
      }
    } else {
      header("Location: ../View/index.php?password=invalid");
      exit();
    }
  } else {
    header("Location: ../View/index.php?email=invalid");
    exit;
  }
} else {
  header("Location: ../View/index.php");
  exit;
}
