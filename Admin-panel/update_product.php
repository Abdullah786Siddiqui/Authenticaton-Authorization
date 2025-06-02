<?php

include("./dashboard.php");
require "../config/Connection.php";


$product_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $oldimage = $_POST['old_image'];

  if (!empty($_FILES['image']['name'])) {
    $imageName = $_FILES['image']['name'];
    $tmpImage = $_FILES['image']['tmp_name'];
    $uploadsDir = "./uploads/";
    $new_file = time() . "-" . basename($imageName);
    $destination = $uploadsDir . $new_file;
    move_uploaded_file($tmpImage, $destination);
  } else {
    $new_file = $oldimage;
  }
  $sql =  "UPDATE products  SET title = '$title', description = '$description', price = '$price' ,image = '$new_file'  WHERE id = $product_id ";
  $result = $conn->query($sql);
  if ($result) {
    echo "
    <script>
      alert('Your Product has been Updated')
      window.location.href = './View_products.php'
    </script>";
  } else {
    echo "Error";
  }
} else {
  $result = $conn->query("SELECT * FROM products where id = $product_id");
  $row = $result->fetch_assoc();
}

?>


<div class="container ">
  <h2 class="text-center">Update Product Detail</h2>
  <main>


    <form method="post"  enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" value="<?= $row['title'] ?>" class="form-control" name="title" placeholder="Enter a Product Title" required>
      </div>

      <div class="form-floating mb-3">
        <textarea class="form-control" name="description" placeholder="Enter a Product Description" id="floatingTextarea2" style="height: 100px" required><?= htmlspecialchars($row['description']) ?></textarea>
        <label for="floatingTextarea2">Description</label>
      </div>

      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" value="<?= $row['price'] ?>" name="price" placeholder="Enter a Product Price" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Select Image:</label>
        <input class="form-control" type="file" name="image" accept=".jpg, .jpeg, .png" >
        <p>Currently Uploaded file is : <?= $row['image'] ?></p>
        <img src="./uploads/<?= $row['image'] ?>" height="100px" alt="">
      </div>
      <input type="hidden" name="old_image" value="<?= $row['image'] ?>">

      <button type="submit" class="btn btn-primary w-100">ADD PRODUCT</button>
    </form>

  </main>
</div>
</div>
</div>
</main>

<?php
include_once("../Components/Footer.html");
?>