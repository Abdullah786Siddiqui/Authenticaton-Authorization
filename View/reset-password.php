<?php
include("../Components/Header.html");
$match = $_GET['matching'] ?? " ";
$token = $_GET['token'] ?? '';

?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4 rounded-4 w-100" style="max-width: 400px;">
    <h2 class="text-center mb-4">Reset Password!</h2>
    <form action="../process/password_reset_process.php" method="post">

      <input type="hidden" name="token" value="<?= $token ?>">

      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" class="form-control" name="new_reset__password" placeholder="Enter Your New password" required>

      </div>
      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_reset_password" placeholder="Enter Your Confirm password" required>
        <div class="error text-danger mt-1"><?= ($match === "false") ?  "Password not match" : " " ?></div>



      </div>
      <button type="submit" class="btn btn-primary w-100 fw-medium">Submit</button>

    </form>
  </div>
</div>






<?php
include("../Components/Footer.html");
?>