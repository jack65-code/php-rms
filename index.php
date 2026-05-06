
<?php
    session_start();


    if(isset($_SESSION['name'])){
  header("Location:home.php");
}



include("config.php");

if(isset($_POST["btn"])){

$email = $_POST["useremail"];
$password = $_POST["pass"];

$query = mysqli_query($connection,"SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}' ");

if($query){
$row = mysqli_fetch_assoc($query);
    $_SESSION["name"] = $row['username'];
    $_SESSION["email"] = $row['email'];
  
    header("Location:home.php");
    }else{
      echo "login failed";
    }



}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
 
    <title>Sign In | Dasher - Responsive Bootstrap 5 Admin Dashboard</title>
    <?php
include("partials/head/head-links.html");
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
                  <img src="assets/images/brand/logo/logo-icon.svg" alt="" />
                  <span>Dasher</span>
                </a>
                <h1 class="mb-1">Welcome Back</h1>
                <p class="mb-0">
                  Don’t have an account yet?
                  <a href="register.php" class="text-primary">Register here</a>
                </p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-12">
              <div class="card card-lg mb-6">
                <div class="card-body p-6">
                  <form class="needs-validation mb-6" novalidate method="POST">
                    <div class="mb-3">
                      <label for="signinEmailInput" class="form-label">
                        Email
                        <span class="text-danger">*</span>
                      </label>
                      <input type="email" name="useremail" class="form-control" id="signinEmailInput" required />
                      <div class="invalid-feedback">Please enter email.</div>
                    </div>
                    <div class="mb-3">
                      <label for="formSignUpPassword" class="form-label">Password</label>
                      <div class="password-field position-relative">
                        <input type="password" name="pass" class="form-control fakePassword" id="formSignUpPassword" required />
                        <span><i class="ti ti-eye-off passwordToggler"></i></span>
                        <div class="invalid-feedback">Please enter password.</div>
                      </div>
                    </div>

                    <div class="mb-4 d-flex align-items-center justify-content-between">
                     

                      <div><a href="forget-password.html" class="text-primary">Forgot Password</a></div>
                    </div>

                    <div class="d-grid">
                      <button name="btn" class="btn btn-primary" type="submit">Sign In</button>
                    </div>
                  </form>
              
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
   
    </main>

    <?php

include("partials/scripts.html");
    ?>
    <script src="assets/js/vendors/password.js"></script>
  </body>
</html>


