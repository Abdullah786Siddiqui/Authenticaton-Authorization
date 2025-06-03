<?php

include("./dashboard.php");
require "../config/Connection.php";


?>


<div class="container ">
  <h2 class="text-center">Adding Product</h2>
  <main>
    <!-- <?php if ($insert_product !== null): ?>
      <div id='insert' class="alert <?= ($insert_product === "true") ? "alert-success" : "alert-danger"; ?>">
        <?php
        if ($insert_product && $insert_product === "true") {
          echo "Your product has been Added";
        } else {
          echo "Something went wrong";
        }
        ?>
      
    <?php endif; ?> -->
    <form method="post" action="../Admin-panel/Add_products.php" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter a Product Title" required>
      </div>

      <div class="form-floating mb-3">
        <textarea class="form-control" name="description" placeholder="Enter a Product Description" id="floatingTextarea2" style="height: 100px" required></textarea>
        <label for="floatingTextarea2">Description</label>
      </div>
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Enter a Product Price" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Select Image:</label>
        <input class="form-control" type="file" name="image" accept=".jpg, .jpeg, .png" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">ADD PRODUCT</button>
    </form>

  </main>
</div>
</div>
</div>
</main>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];


  $imageName = $_FILES['image']['name'];
  $tmpImage = $_FILES['image']['tmp_name'];
  $uploadsDir = "./uploads/";
  if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir);
  }
  $new_file = time() . "-" . basename($imageName);
  $destination = $uploadsDir . $new_file;
  if (move_uploaded_file($tmpImage, $destination)) {
    $sql = "INSERT INTO  products(title,description,price,image) values ('$title','$description','$price','$new_file')";
    $result = $conn->query($sql);
    if ($result) {
      echo "
    <script>
      alert('Your Product has been Added')
    </script>";
    } else {

      echo "Error";
    }
  }
}  ?>


<?php
include_once("../Components/Footer.html");
?>