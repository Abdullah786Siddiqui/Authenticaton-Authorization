<?php

session_start();
if (!isset($_SESSION['admin_Username'])) {
  header("Location: ../View/index.php");
  exit();
}


$username = $_SESSION['admin_Username'];

$requestUri = $_SERVER['REQUEST_URI'];

$path = parse_url($requestUri, PHP_URL_PATH);

$fileName = basename($path);


?>

<div class="d-flex" style="min-height: 100vh;">

  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; min-height: 100vh;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi pe-none me-2" width="40" height="32" aria-hidden="true">
        <use xlink:href="#bootstrap"></use>
      </svg> <span class="fs-4">Admin Panel</span> </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto ">
      <li class="nav-item "> <a href="./dashboard.php" class="nav-link text-white cursor <?php echo ($fileName  === "dashboard.php" || $fileName === "View_products.php" ||  $fileName === "Add_products.php") ? "active" : " " ?> " aria-current="page"> <svg class="bi pe-none me-2 " width="16" height="16" aria-hidden="true">
            <use xlink:href="#home"></use>
          </svg>
          Products
        </a> </li>
      <li class="nav-item"> <a href="./View_Users.php" class="nav-link text-white cursor  <?php echo ($fileName  === "users.php" || $fileName  === "View_Users.php") ? "active" : " " ?>" aria-current="page"> <svg class="bi pe-none me-2" width="16" height="16" aria-hidden="true">
            <use xlink:href="#home"></use>
          </svg>
          Users
        </a> </li>

    </ul>
    <hr>
    <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong><?= $username ?></strong> </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">

        <li><a class="dropdown-item" href="../process/logout.php">Log out</a></li>
      </ul>
    </div>

  </div>