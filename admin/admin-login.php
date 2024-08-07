<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="admins.css" />
  </head>
  <body>
    <div class="wrapper">
      <form action="admin-dashboard.php" class="form" method="POST" enctype="multipart/form-data">
        <br />
        <h1>
          <img src="assets/logo.png" alt="" style="height: 80px; width: 70px" />
        </h1>
        <h1 style="color: #fff">Fleet<span style="color: green">MS</span></h1>
        <div class="input-box">
          <i class="fas fa-envelope icon"></i>
          <input type="text" name="username" required />
          <label>Username</label>
        </div>
        <div class="input-box">
          <i class="fas fa-lock icon"></i>
          <input type="password" name="password" required />
          <label>Password</label>
        </div>

        <button type="submit" class="btn">Login</button>

        <div class="signup-link">
          <p>Fleet Management System</p>
        </div>
      </form>
    </div>
  </body>
</html>
