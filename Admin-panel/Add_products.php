<?php

include("./dashboard.php");
$insert_product = $_GET['add'] ?? " ";
?>


<div class="container ">
  <h2 class="text-center">Adding Product</h2>
  <main>
    <?php if ($insert_product !== null): ?>
      <div id='insert' class="alert <?= ($insert_product === "true") ? "alert-success" : "alert-danger"; ?>">
        <?php
        if ($insert_product && $insert_product === "true") {
          echo "Your product has been Added";
        } else {
          echo "Something went wrong";
        }
        ?>
      </div>
      <script>
        // const url = new URL(window.location);
        // url.searchParams.delete('add');
        // window.history.replaceState({}, document.title, url);
        setTimeout(() => {
          let alert_insert = document.getElementById("insert")
          if (alert_insert) {
            let insert_msg = new bootstrap.Alert(alert_insert);
            insert_msg.close();
          }
        }, 3000)
      </script>
    <?php endif; ?>
    <form method="post" action="../Admin-panel/add_product_process.php" enctype="multipart/form-data">
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
include_once("../Components/Footer.html");
?>