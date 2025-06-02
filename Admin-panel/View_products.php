<?php
include("./dashboard.php");
require "../config/Connection.php";
?>


<div class="container">
  <h2 class="text-center">Show Product</h2>
  <div class="main ">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-info text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Desciption</th>
          <th scope="col">price</th>
          <th scope="col">Image</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>



        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM products ORDER BY id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {

        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><img style="border-radius: 50% ; object-fit: cover;" src="./uploads/<?= $row['image']; ?>" width="50" height="50" alt="Product_Image"></td>
            <td><a href="./update_product.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a></td>
            <td><a href="./delete_product.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>


          </tr>
        <?php


        }
        ?>
      </tbody>
    </table>



  </div>


</div>
</div>
</div>
</main>

<?php
include_once("../Components/Footer.html");
?>