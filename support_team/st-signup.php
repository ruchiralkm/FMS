<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="st-signup.css" />
  </head>
  <body>
    <section class="container">
      <header>Registration</header>
      <form action="st-signupbe.php" class="form" method="POST" enctype="multipart/form-data">
        <!-- Name -->
        <div class="column">
          <!-- 1 -->
          <div class="input-box">
            <label>Frist Name</label>
            <input type="text" placeholder="Enter Frist Name" name="fname" />
          </div>
          <!-- 2 -->
          <div class="input-box">
            <label>Last Name</label>
            <input type="text" placeholder="Enter Last Name" name="lname" />
          </div>
        </div>

        <!-- Address -->
        <div class="input-box">
          <label>Address</label>
          <input type="text" placeholder="Enter Address" name="address" />
        </div>

        <!--Licence & Profile Picture-->
        <div class="column">
          <!-- Licence -->
          <div class="input-box">
            <label>Driving Licence Number</label>
            <input
              type="number"
              placeholder="Enter Licence Number"
              name="dlno"
            />
          </div>

          <!-- Profile Picture -->
          <div class="input-box">
            <label>Profile Picture</label>
            <input type="file" name="file">

          
          </div>
        </div>

        <!--Mobile Number & Birthday-->
        <div class="column">
          <!-- 1 -->
          <div class="input-box">
            <label>Mobile Number</label>
            <input
              type="number"
              placeholder="Enter Mobile Number"
              name="mobile"
            />
          </div>
          <!-- 2 -->
          <div class="input-box">
            <label>Birthday</label>
            <input type="date" placeholder="Enter Name" name="dob" />
          </div>
        </div>

        <!-----gender------>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <!-- Male -->
            <div class="gender">
              <input
                type="radio"
                id="check-male"
                name="gender"
                value="Male"
                checked
              />
              <label for="check-male">Male</label>
            </div>

            <!-- FeMale -->
            <div class="gender">
              <input
                type="radio"
                id="check-female"
                name="gender"
                value="Female"
              />
              <label for="check-female">Female</label>
            </div>

            <!-- Other -->
            <div class="gender">
              <input type="radio" id="other" name="gender" value="Other" />
              <label for="other">Other</label>
            </div>
          </div>
        </div>

        <!--Email & Password-->
        <div class="column">
          <!-- 1 -->
          <div class="input-box">
            <label>Email</label>
            <input type="email" placeholder="Enter Email" name="email" />
          </div>
          <!-- 2 -->
          <div class="input-box">
            <label>Password</label>
            <input
              type="password"
              placeholder="Enter Password"
              name="password"
            />
          </div>
          
        </div>
        <br />
          <label>Select your Position</label><br /><br />

        <!--Support -->

        <div class="radio-tile-group">
          <!-- bike -->
          <div class="input-container">
            <input id="bike" type="radio" name="position[]" value="Hardware Support" />
            <div class="radio-tile">
              <img src="assets/hardware.png" alt="" class="vima" style = "width:60px; height:60px"/>
              <br>
              <label for="Technical Support">Hardware</label>
            </div>
          </div>

          <!-- Technical Support -->
          <div class="input-container">
            <input
              id="threewheeler"
              type="radio"
              name="position[]"
              value="Technical Support"
            />
            <div class="radio-tile">
              <img src="assets/technical.png" alt="" class="vima" style = "width:60px; height:60px"/>
              <br>
              <label for="Technical">Technical</label>
            </div>
          </div>

          <!-- Customer Support -->
          <div class="input-container">
            <input id="car" type="radio" name="position[]" value="Management Support" />
            <div class="radio-tile">
              <img src="assets/customer.png" alt="" class="vima" style = "width:60px; height:60px" />
              <br>
              <label for="Management">Management</label>
            </div>
          </div>

         
          <!-- end support -->
        </div>

        <!-- button -->
        <br />
        <button type="submit" class="btn">Submit</button>

        <div class="signup-link">
          <p>
            Do you have an account? <a href="st-login.php">Login now</a>
          </p>
        </div>
      </form>
    </section>
  </body>
</html>
