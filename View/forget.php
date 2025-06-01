<?php
include("../Components/Header.html");



?>


<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4 rounded-4 w-100" style="max-width: 400px;">
    <h2 class="text-center mb-4">Forget Password !</h2>
    <form action="../process/forget_password_process.php" method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="check_email" placeholder="Enter Your Email" required>
        <!-- <div class="error text-danger mt-1"><?= ($current_password === "false") ?  "Current password is Incorrect" : " " ?></div> -->

      </div>
      <button type="submit" class="btn btn-primary w-100 fw-medium">Submit</button>

    </form>
  </div>
</div>




<?php
include("Components/Footer.html");
?>