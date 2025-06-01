<?php
include("../Components/Header.html");
include("../config/Connection.php");
require "../config/auth_check.php";


$username = $_SESSION['username'];



?>

<nav class="navbar navbar-expand-lg navbar-info bg-success text-white">
  <div class="container-fluid">
    <a class="navbar-brand fw-bolder text-white" href="#">Wolkbox</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <?php 
        
        
        ?>
        <li class="nav-item">
          <a class="nav-link  fw-bold text-white" href="../View/products.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white" href="../View/profile.php">Profile</a>
        </li>
        

      </ul>

      <ul class="navbar-nav">
        <li class="nav-item">
          <span class="navbar-text text-white me-3">
            👋 Welcome back , <p class="text-white fw-bolder d-inline"><?= $username ?></p>
          </span>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light btn-sm" href="../process/logout.php">Logout</a>
        </li>

      </ul>
    </div>
  </div>
</nav>






<?php
include("../Components/Footer.html")
?>