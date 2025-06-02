<?php
include("../Components/Header.html");
include("../View/navbar.php");
require "../config/Connection.php";




$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<div class="container mt-4">
  <h1 class="text-center">Shopping Products</h1>


  <div class="row mt-5">
    <?php while ($row = $result->fetch_assoc()) : ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100 shadow-sm rounded-4 overflow-hidden">
          <div class="card-img-wrapper" style="height: 220px; overflow: hidden;">
            <img
              src="../Admin-panel/uploads/<?= $row['image'] ?>"
              class="card-img-top w-100 h-100"
              style="object-fit: cover;"
              alt="<?= $row['title'] ?>">
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $row['title'] ?></h5>
            <p class="card-text text-muted small flex-grow-1"><?= $row['description'] ?></p>
            <a href="#" class="btn btn-success w-100 mt-auto">Buy</a>
          </div>

        </div>
      </div>
    <?php endwhile; ?>
  </div>

</div>



<?php
include("../Components/Footer.html");
?>