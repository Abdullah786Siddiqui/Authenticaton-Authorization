<?php
include("../Components/Header.html");
include("../View/navbar.php");

$reset_password = isset($_GET['reset']) ? $_GET['reset'] : null;


$setpassword = $_GET['setpassword'] ?? " ";


$sql = "SELECT * FROM users where name = '$username' ";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
  $emails = $row['email'];
  $role = $row['role'];
} else {
  echo "User not found";
}

?>


<main>




  <div class="container mt-4">
    <?php if ($setpassword === "true" || $reset_password === "true") : ?>

      <div class="alert alert-success " id="alert"><?= $username ?> You password has been change</div>
      <script>
        setTimeout(() => {
          let alert = document.getElementById("alert")
          if (alert) {
            let alertbox = new bootstrap.Alert(alert);
            alertbox.close();
          }
        }, 3000)
      </script>
    <?php endif; ?>
    <div class="card">
      <div class="card-header bg-primary fw-bold text-white">
        <h2>
          Your profile here !
        </h2>
      </div>
      <div class="card-body">
        <h5 class="card-title">Name : <strong class=""> <?= $username ?> </strong></h5>
        <h5 class="card-title">Email : <strong class=""> <?= $emails ?> </strong></h5>
        <h5 class="card-title">Role : <strong class="badge text-bg-success"> <?= $role ?> </strong></h5>
        <a href="../View/password_change.php" class="btn btn-primary fw-bold">Change Password</a>
      </div>
    </div>
  </div>
</main>



<?php
include("../Components/Footer.html");
?>