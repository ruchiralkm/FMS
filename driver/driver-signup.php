<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="driversignup.css" />
  </head>
  <body>
    <section class="container">
      <header>Registration</header>
      <form action="driver-signupbe.php" class="form">
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
            <input
              type="file"
              id="real-file"
              name="picture"
              accept="image/*"
              hidden="hidden"
            />
            <button class="gg" id="cutom-botton">Choose Photo</button>

            <script>
              const realFileBtn = document.getElementById("real-file");
              const cutomBtn = document.getElementById("cutom-botton");

              cutomBtn.addEventListener("click", function () {
                realFileBtn.click();
              });
            </script>
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

        <!-- expireance levels  -->
        <div class="input-box">
          <label>Experience</label>
          <input
            type="text"
            placeholder="Enter your expireance"
            name="experience"
          />
          <br /><br /><br />
          <label>Select your Vehicle type</label><br /><br />
        </div>

        <!-- vechicles -->

        <div class="radio-tile-group">
          <!-- bike -->
          <div class="input-container">
            <input id="bike" type="checkbox" name="vehicle[]" value="Bike" />
            <div class="radio-tile">
              <img src="assets/bike.png" alt="" class="vima" />
              <label for="bike">Bike</label>
            </div>
          </div>

          <!-- Threewheeler -->
          <div class="input-container">
            <input
              id="threewheeler"
              type="checkbox"
              name="vehicle[]"
              value="Threewheeler"
            />
            <div class="radio-tile">
              <img src="assets/threew.png" alt="" class="vima" />
              <label for="threewheeler">Threewheeler</label>
            </div>
          </div>

          <!-- car -->
          <div class="input-container">
            <input id="car" type="checkbox" name="vehicle[]" value="Car" />
            <div class="radio-tile">
              <img src="assets/car.png" alt="" class="vima" />
              <label for="car">Car</label>
            </div>
          </div>

          <!-- van -->
          <div class="input-container">
            <input id="van" type="checkbox" name="vehicle[]" value="Van" />
            <div class="radio-tile">
              <img src="assets/van.png" alt="" class="vima" />
              <label for="van">Van</label>
            </div>
          </div>

          <!-- pickup -->
          <div class="input-container">
            <input id="pickup" type="checkbox" name="vehicle[]" value="Pickup" />
            <div class="radio-tile">
              <img src="assets/pickup.png" alt="" class="vima" />
              <label for="pickup">Pickup</label>
            </div>
          </div>

          <!-- lorry -->
          <div class="input-container">
            <input id="lorry" type="checkbox" name="vehicle[]" value="Lorry" />
            <div class="radio-tile">
              <img src="assets/lorry.png" alt="" class="vima" />
              <label for="lorry">Lorry</label>
            </div>
          </div>

          <!-- heavylorry -->
          <div class="input-container">
            <input
              id="heavylorry"
              type="checkbox"
              name="vehicle[]"
              value="Heavy Lorry"
            />
            <div class="radio-tile">
              <img src="assets/heavylorry.png" alt="" class="vima" />
              <label for="heavylorry">Heavy Lorry</label>
            </div>
          </div>

          <!-- Prime Mover -->
          <div class="input-container">
            <input id="pm" type="checkbox" name="vehicle[]" value="Prime Mover" />
            <div class="radio-tile">
              <img src="assets/pm.png" alt="" class="vima" />
              <label for="pm">Prime Mover</label>
            </div>
          </div>
          <!-- end vechicles -->
        </div>

        <!-- button -->
        <br />
        <button type="submit" class="btn">Submit</button>

        <div class="signup-link">
          <p>
            Do you have an account? <a href="driver-login.html">Login now</a>
          </p>
        </div>
      </form>
    </section>
  </body>
</html>
