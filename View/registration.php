<?php 
include("../Components/Header.html");
?>
    <div
      class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh"
    >
      <div class="register-box">
        <h2 class="text-center mb-4">Create Your Account</h2>
        <form action="../process/registration_process.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input
              type="text"
              class="form-control"
              id="username"
              name="register_username"
              required
              placeholder="Enter Your Username"
            />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="register_email"
              required
              placeholder="Enter Your Email"
            />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="register_password"
              required
              placeholder="Enter Your Password"
            />
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
          <p class="text-center mt-3">
            Already have an account? <a href="../process/login.php">Login here</a>
          </p>
        </form>
      </div>
    </div>
  <?php 
include("../Components/Footer.html");
?>
