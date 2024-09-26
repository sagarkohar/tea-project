<?php
require_once 'loginvalid.php';
include 'header.php';

$contactValue = isset($_POST['contact']) ? $_POST['contact'] : '';
$passwordValue = isset($_POST['password']) ? $_POST['password'] : '';
$sendActive = false;
$doneVerify = false;

?>
<style>
  <?php include 'style.css' ?>

  .container {
    background: transparent;
  }

  .btn a {
    text-decoration: none;
  }

  .error {
    color: red;
  }
</style>
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <?php
  


  ?>
  <div class="container p-5 my-5 bg-white text-dark shadow-lg bg-body rounded w-100  ">
    <div class="row">
      <div class="col-sm-12  text-center">
        <img src="image/logo.jpg" alt="">
        <h3 class="text-dark text-capitalize">Login now</h3>
        <p class="text-success">Log in to your existing accounts to purchase the products</p>
      </div>
    </div>
    <div class=" d-flex row justify-content-center">
      <div class="col-12 col-sm-12 col-md-6 col-lg-6  p-3 bg-white shadow-lg bg-body rounded">
        <form action="" method="post" id="f1" class="login-form">
          <div class="row">
            <div class="form mb-3 mt-3 col-12 col-md-12">
              <label for="contact" class="text-dark">Email or Phone Number</label>
              <input type="text" class="form-control shadow-lg border-success" id="contact" placeholder=""
                name="contact" value="<?php echo htmlspecialchars($contactValue); ?>">
              <span id="contact_error"></span>
            </div>
            <div class="form mb-3 mt-3 col-md-12">
              <label for="pwd1" class="text-dark">Password</label>
              <input type="password" class="form-control shadow-lg border-success" id="pwd1" placeholder=""
                name="password" value="<?php echo htmlspecialchars($passwordValue); ?>">
              <span id="pwd_error"></span>
            </div>
          </div>
          <div class="reg d-flex">
            <a href="forget.php">Forget Password?</a>
          </div>
          <div class="reg d-flex justify-content-center my-2">
            <button type="submit" class="btn btn-success shadow border-success text-white" name="loginBtn">Log
              in</button>
          </div>

          <div class="reg text-center my-3">
            <p class="text-success">Don't have an account?<a href="register.php">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <?php
  include 'footer.php'
    ?>
</body>

</html>