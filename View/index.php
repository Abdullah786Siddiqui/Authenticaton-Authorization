<?php
include("../Components/Header.html");
$validity_email = $_GET['email'] ?? " ";
$validity_password = $_GET['password'] ?? " ";
$forget_password = isset($_GET['reset']) ? $_GET['reset'] : null;
$forget_set_password = isset($_GET['set']) ? $_GET['set'] : null;

?>
<?php if ($forget_password !== null || $forget_set_password !== null): ?>
  <div id='reset' class="alert <?= ($forget_password === "true" || $forget_set_password === "true") ? "alert-success" : "alert-danger"; ?>"> 
    <?php
      if ($forget_password === "true") {
        echo "Check your Email to reset password";
      } elseif ($forget_set_password === "true") {
        echo "Your Password has been Changed";
      } else {
        echo "Something went wrong";
      }
    ?>
  </div>
  <script>
    setTimeout(() => {
      let alert_reset = document.getElementById("reset")
      if (alert_reset) {
        let reset_msg = new bootstrap.Alert(alert_reset);
        reset_msg.close();
      }
    }, 3000)
  </script>
<?php endif; ?>

<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4 rounded-4 w-100" style="max-width: 400px;">
    <h2 class="text-center mb-4">Login here!</h2>
    <form action="../process/login.php" method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="login_email" placeholder="Enter Your Email" required>
        <div class="error text-danger mt-1"><?= ($validity_email === "invalid") ?  "Invalid Email" : " " ?></div>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="login_password" placeholder="Enter Your password" required>
        <div class="error text-danger mt-1"><?= ($validity_password === "invalid") ? "Invalid Password" : " " ?></div>

      </div>
      <button type="submit" class="btn btn-primary w-100 fw-medium">Login</button>
      <div class=" text-center mt-1">
        <p>Create a new <a href="../View/registration.php">Create Account</a></p>


      </div>
    </form>
    </p><a href="../View/forget.php">forget Password</a>

  </div>

</div>

<?php
include("../Components/Footer.html");
?>