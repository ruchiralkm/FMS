<!DOCTYPE html>
<html lang="en">
  <!--Created by Tivotal-->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form Design</title>

    <!--font awesome(for icons)-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    <!--css file-->
    <link rel="stylesheet" href="driverlogin.css" />
  </head>
  <body>
    <div class="wrapper">
      <form action="driver-dashboard.php" class="form" method="post" enctype="multipart/form-data">
        <br />
        <h1>
          <img src="assets/logo.png" alt="" style="height: 80px; width: 70px" />
        </h1>
        <h1 style="color: black">Fleet<span style="color: green">MS</span></h1>
        <div class="input-box">
          <i class="fas fa-envelope icon"></i>
          <input type="email" id="email" name="email" required />
          <label>Email Address</label>
        </div>
        <div class="input-box">
          <i class="fas fa-lock icon"></i>
          <input type="password" id="password" name="password" required />
          <label>Password</label>
        </div>

        <div class="row">
          <label><input type="checkbox" />Remember me</label>

          <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="btn">Login</button>

        <div class="signup-link">
          <p>
            Don't have an account? <a href="driver-signup.php">Signup now</a>
          </p>
        </div>
      </form>
    </div>
  </body>
</html>
