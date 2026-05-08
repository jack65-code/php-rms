<?php
  session_start();
if(isset($_SESSION['name'])){
  header("Location:home.php");
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
include("partials/head/head-meta.html")
    ?>
    <title>Sign Up | Dasher - Responsive Bootstrap 5 Admin Dashboard</title>
    
    <?php

include("partials/head/head-links.html")
    ?>
  </head>

  <body>
    <main class="d-flex flex-column justify-content-center vh-100">
      <!--Sign up start-->
      <section>
        <div class="container">
          <div class="row mb-8">
            <div class="col-xl-4 offset-xl-4 col-md-12 col-12">
              <div class="text-center">
                <a href="index.html" class="fs-2 fw-bold d-flex align-items-center gap-2 justify-content-center mb-6">
                  <img src="@@webRoot/assets/images/brand/logo/logo-icon.svg" alt="" />
                  <span>Dasher</span>
                </a>
                <h1 class="mb-1">Create Account</h1>
                <p class="mb-0">Sign up now and get free account instant.</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-12">
              <div class="card shadow-sm mb-4">
                <div class="card-body p-6">
                  <form class="needs-validation mb-6" novalidate method="POST">
                    <div class="mb-3">
                      <label for="signupFullnameInput" class="form-label">Full Name</label>
                      <input type="text" name="username" class="form-control" id="signupFullnameInput" required />
                      <div class="invalid-feedback">Please enter full name</div>
                    </div>

                    <div class="mb-3">
                      <label for="signupEmailInput" class="form-label">
                        Email
                        <span class="text-danger">*</span>
                      </label>
                      <input type="email" name="useremail" class="form-control" id="signupEmailInput" required />
                      <div class="invalid-feedback">Please enter email.</div>
                    </div>
                    <div class="mb-3">
                      <label for="formSignUpPassword" class="form-label">Password</label>
                      <div class="password-field position-relative">
                        <input type="password" class="form-control fakePassword" id="formSignUpPassword" name="pass" required />
                        <span><i class="ti ti-eye-off passwordToggler"></i></span>
                        <div class="invalid-feedback">Please enter password.</div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="formSignUpConfirmPassword" class="form-label">Confirm Password</label>
                      <div class="password-field position-relative">
                        <input type="password" name="cpass" class="form-control fakePassword" id="formSignUpConfirmPassword" required />
                        <span><i class="ti ti-eye-off passwordToggler"></i></span>
                        <div class="invalid-feedback">Please enter password.</div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="formSignUpConfirmPassword" class="form-label">Role ( Admin / Waiter )</label>
                      <div class="password-field position-relative">
                       <select name="role" id="" class="form-control">
                        <option value="0">Admin</option>
                        <option value="1">Waiter</option>
                       </select>
                        <span><i class="ti ti-eye-off passwordToggler"></i></span>
                        <div class="invalid-feedback">Please enter password.</div>
                      </div>
                    </div>
                 

                    <div class="d-grid">
                      <button class="btn btn-primary" name="btn" type="submit">Sign Up</button>
                    </div>
                  </form>

            
                </div>
              </div>
              <span>
                Already have an account?
                <a href="index.php" class="text-primary">Sign in here.</a>
              </span>
            </div>
          </div>
        </div>
      </section>
      <!--Sign up end-->
      <div class="position-absolute end-0 bottom-0 m-4">
        <div class="dropdown">
          <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <i class="bi theme-icon-active lh-1"><i class="bi theme-icon bi-sun-fill"></i></i>
            <span class="visually-hidden bs-theme-text">Toggle theme</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
                <i class="ti theme-icon ti ti-sun"></i>
                <span class="ms-2">Light</span>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <i class="ti theme-icon ti-moon-stars"></i>
                <span class="ms-2">Dark</span>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
                <i class="ti theme-icon ti-circle-half-2"></i>
                <span class="ms-2">Auto</span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </main>

    <?php

include("partials/scripts.html")
    ?>
    <script src="assets/js/vendors/password.js"></script>
  </body>
</html>



<?php

include("config.php");

if(isset($_POST["btn"])){

$name = $_POST["username"];
$email = $_POST["useremail"];
$password = $_POST["pass"];
$cpassword = $_POST["cpass"];
$role = $_POST["role"];



if($password == $cpassword){

  $query = mysqli_query($connection,"INSERT INTO `users`(`username`, `email`, `password`, `role`, `createdAt`) VALUES ('$name','$email','$password','$role',current_timestamp())");

  
}else{
  echo "password doesn't match";
}



}


?>