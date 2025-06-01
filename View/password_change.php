<?php
include("../Components/Header.html");
include("../View/navbar.php");

$match = $_GET['matching'] ?? " ";
$current_password = $_GET['current_password'] ?? " ";


?>

<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4 rounded-4 w-100" style="max-width: 400px;">
    <h2 class="text-center mb-4">Change Password!</h2>
    <form action="../process/password_change_process.php" method="post">
      <div class="mb-3">
        <label class="form-label">Current Password</label>
        <input type="password" class="form-control" name="curr_password" placeholder="Enter Your Current Password" required>
        <div class="error text-danger mt-1"><?= ($current_password === "false") ?  "Current password is Incorrect" : " " ?></div>

      </div>
      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" class="form-control" name="new_password" placeholder="Enter Your New password" required>

      </div>
      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Enter Your Confirm password" required>
        <div class="error text-danger mt-1"><?= ($match === "false") ?  "Password not match" : " " ?></div>



      </div>
      <button type="submit" class="btn btn-primary w-100 fw-medium">Submit</button>

    </form>
    </div>
    </div>


    <?php
    include("../Components/Footer.html");
    ?>