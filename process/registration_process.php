<?php
include("../config/Connection.php");
$name = $_POST['register_username'];
$email = $_POST['register_email'];
$password = $_POST['register_password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name,email,password) value ('$name','$email','$hashedPassword')";
$result = $conn->query($sql);
if ($result) {
?>
<?php
  header("Location: ../View/index.php");
} ?>