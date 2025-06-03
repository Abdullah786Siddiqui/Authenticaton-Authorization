<?php
// include("./dashboard.php");
include("../Components/Header.html");
include("./sidebar.php");
require "../config/Connection.php";

?>


<div class="container mt-4">
  <h2 class="text-center">Show User Information</h2>
  <div class="main ">
    <table class="table table-bordered table-striped text-center">
      <thead class="table-info text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
          <th scope="col">Delete</th>



        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM users ORDER BY id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {

        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['role'] ?></td>
            <td><a href="./delete_users.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>


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