<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> FleetMS </title>
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="pagess.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

     <!-- Fonts Icons -->
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms"; // Enter your Database name in the MySQL

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

//users = enter your table name of the database
$sql = "SELECT * FROM driver WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $lname = $row['lname'];
    $dlno = $row['dlno'];
    $picture = $row['picture']; // Fetch the picture path from the database
    $mobile = $row['mobile'];
    $dob = $row['dob'];
    $email = $row['email'];
    $experience = $row['experience'];
    $vehicle = $row['vehicle'];

    
    
    // Display the picture if available
    /*
    if (!empty($picture)) {
        echo "<img src='$picture' alt='Profile Picture' style='width: 300px; height: 300px;'>";
    } else {
        echo "No profile picture available.";
    }
    */

    ?>
    <!-- ********************************************* -->
    <!-- if correct email or password -->
  <div class="sidebar close">
    <div class="logo-details">
      <img src="assets/logo.png" alt="" style="height: 40px; width: 35px; margin-left: 20px;"/>
      <span class="logo_name">FleetMS</span>
    </div>
    <ul class="nav-links">

    <!--------------- SlideBar Pages ---------------->
    <!----------------- Dashboard -------------------->
      <li>
        <a href="#" onclick="showDash()">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" onclick="showDash()">Dashboard</a></li>
        </ul>
      </li>


      <!----------------- Category -------------------->
      <!-- <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Category</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Category</a></li>
          <li><a href="#">HTML & CSS</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li> -->
      

      <!----------------- Tasks -------------------->
      <li>
        <a href="#" onclick="showTasks()">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
          <span class="link_name">Tasks</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" onclick="showTasks()">Task</a></li>
        </ul>
      </li>



      <!----------------- Notification -------------------->
      <li>
        <a href="#" onclick="showNoti()">
          <i class="fa fa-bell" aria-hidden="true"></i>
          <span class="link_name" >Notification</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" onclick="showNoti()">Notification</a></li>
        </ul>
      </li>
      

      <!----------------- Setting -------------------->
      <li>
        <a href="#" onclick="showSetting()">
          <i class='bx bx-cog' ></i>
          <span class="link_name setting">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name setting" href="#" onclick="showSetting()">Setting</a></li>
        </ul>
      </li>


      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!-- <img src="image/profile.jpg" alt="profileImg"> -->
        <?php echo "<img src='$picture'>"; ?>
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $fname?></div>
        <div class="job">Driver</div>
      </div>
      <a href="driver-login.php"><i class='bx bx-log-out' ></i></a>
    </div>


  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <!-- <span class="text">FleetMS</span> -->
    </div>
    <h2><?php echo "Welcome $fname $lname  <br>"; ?></h2><br>








<!-- **************************************************************** -->
<!----------------------------- Pages ----------------------->
<div class="dashboardCont" id = "dashboard">
    <div class="dashboardBox">Dashboard Container</div>
</div>

<div class="taskCont" id = "tasks">
    <div class="taskBox">Task Container</div>
</div>

<div class="notiCont" id = "notification">
    <div class="notiBox">Notification Container</div>
</div>

<div class="settingCont" id = "setting">
    <div class="settingBox">

      <div class="settingBoxLeft">
        <div class="profile-Img"><?php echo "<img src='$picture' width='250' height='240'>"; ?></div><br>
        <a href="edit.php?email=<?php echo $email; ?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; Edit &nbsp;&nbsp;&nbsp;</a>
      </div>
     
      <div class="settingBoxRight">
        <h3>About Driver</h3><br>
        <h4>Driver Name: <span class = "details"> <?php echo "$fname $lname"; ?></span> </h4><br>
        <h4>Driving Licence No: <span class = "details"> <?php echo "$dlno"; ?> </h4><br>
        <h4>Mobile No: <span class = "details"> <?php echo "$mobile"; ?> </h4><br>
        <h4>Date of Birth: <span class = "details"> <?php echo "$dob"; ?> </h4><br>
        <h4>Email: <span class = "details"> <?php echo "$email"; ?> </h4><br>
        <h4>Experience: <span class = "details"> <?php echo "$experience"; ?> </h4><br>
        <h4>Allow Vehicles: <span class = "details"> <?php echo "$vehicle"; ?> </h4><br>
      </div>

    </div>
</div>





    <script>
    function showDash() {
      document.getElementById('dashboard').style.display = 'block';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
    }

    function showTasks() {
      document.getElementById('tasks').style.display = 'block';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
    }

    function showNoti() {
      document.getElementById('notification').style.display = 'block';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
    }

    function showSetting() {
      document.getElementById('setting').style.display = 'block';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
    }
    </script>

  </section>


  <script src="script.js"></script>




<!-- ********************************************* -->
  <!-- if invalid email or password -->
    <?php
    
} else {
    // echo "Invalid email or password";
}

$conn->close();
?>

<div class="container">
  <div class="invalidBox">

    <div class="invalidImgBox">
      <img src="assets/invalid.png" alt="" class = "invalidImg">
    </div>

    <div class="invalidWords">
      <span class = "invalidMsg">Invalid Email or Password</span>
      <span class = "invalidMsg2">Please Try Again</span>
      <button><a href="driver-login.php">Login</a></button>
    </div>

  </div>
</div>

</body>
</HTML>