<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
  header("Location: ../View/index.php");
  exit();
};
?>