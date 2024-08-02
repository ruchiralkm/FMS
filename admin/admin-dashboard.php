<!-- Same driver-dashbord.php --- not edited -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> FleetMS </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="pages.css">

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

$username = $_POST['username'];
$password = $_POST['password'];

//users = enter your table name of the database
$sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $username = $row['username'];
    //$picture = $row['picture']; // Fetch the picture path from the database
    ?>

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


      <!----------------- Drivers -------------------->
      <li>
        <a href="#" onclick="showDriver()">
        <i class="fa fa-user" aria-hidden="true"></i>
          <span class="link_name">Driver</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" onclick="showDriver()">Driver</a></li>
        </ul>
      </li>

      <!----------------- Support Team -------------------->
      <li>
        <a href="#" onclick="showST()">
        <i class="fa fa-users" aria-hidden="true"></i>
          <span class="link_name">Support Team</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" onclick="showST()">Support Team</a></li>
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

      <!----------------- Vehicle -------------------->
      <li>
        <a href="#" onclick="showVehicles()">
        <i class="fa fa-car" aria-hidden="true"></i>
          <span class="link_name">Vehicles</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" onclick="showTasks()">Vehicles</a></li>
        </ul>
      </li>
      

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


      <!----------------- Issues -------------------->
      <li>
        <a href="#" onclick="showIssue()">
        <i class="fa fa-ambulance" aria-hidden="true"></i>
          <span class="link_name">Issue</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#" onclick="showIssue()">Issue</a></li>
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
        <img src="assets/admi.png" alt="profileImg">
        <!-- <?php echo "<img src='$picture'>"; ?> -->
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo $username?></div>
        <div class="job">Admin</div>
      </div>
      <a href="admin-login.php"><i class='bx bx-log-out' ></i></a>
    </div>


  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <!-- <span class="text">FleetMS</span> -->
    </div>
    <h2 style = "font-size: 1.1rem;"><?php echo "Hello, $username  <br>"; ?></h2><br>








<!-- **************************************************************** -->
<!----------------------------- Pages ----------------------->
<!----------------------------- Dashboard ----------------------->
<div class="dashboardCont" id = "dashboard">
    <div class="dashboardBox"><h1>Dashboard</h1></div>
</div>

<!----------------------------- Driver ----------------------->
      <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="fms";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Connection Erro".mysqli_connect_error());
}else{
	
}
?>

<?php

$sql="SELECT * FROM driver";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

?>
<div class="driverCont" id = "driver">
    <div class="driverBox">


    <div class="table">
        <div class="table_header">
            <p>Drivers Informations</p>
            <div>
                <input type="text" placeholder="Seach by driver name" class = "searchBoxx">
                <button class="add_new">Search</button>
            </div>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Driving License NO</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Experience(Years)</th>
                        <th>Vehicle</th>
                    </tr>
                </thead>
                <?php

                $i=0;
                while($row=mysqli_fetch_array($result)){

                ?>

                <tbody>
                    <tr>
                        <td> <img src="../driver/<?php echo htmlspecialchars($row['picture']); ?>"></td>
                        <td> <?php echo $row["fname"];  ?> <?php echo $row["lname"];  ?> </td>
                        <td> <?php echo $row["address"];  ?> </td>
                        <td> <?php echo $row["dlno"];  ?> </td>
                        <td> <?php echo $row["mobile"];  ?> </td>
                        <td> <?php echo $row["email"];  ?> </td>
                        <td> <?php echo $row["experience"];  ?> </td>
                        <td> <?php echo $row["vehicle"];  ?> </td>
                    </tr>

                      <?php
                      $i++;
                      }
                      ?>

                    
                </tbody>
            </table>
        </div>
    </div>


    </div>
</div>
<?php
}

else{
  ?>
  <h5 style = "margin-left:-600px;"><?php echo "No drivers at this movement"; ?></h5>

  <?php
}

?>

<!----------------------------- Support Team ----------------------->
      <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="fms";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Connection Erro".mysqli_connect_error());
}else{
	
}
?>

<?php

$sql="SELECT * FROM support_team";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

?>


<div class="supportteamCont" id = "supportteam">
    <div class="supportteamBox">


    <div class="table">
        <div class="table_header">
            <p>Support Team Informations</p>
            <div>
                <input type="text" placeholder="Seach by member name" class = "searchBoxx">
                <button class="add_new">Search</button>
            </div>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>NIC No</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Position</th>
                    </tr>
                </thead>
                <?php

                $i=0;
                while($row=mysqli_fetch_array($result)){

                ?>

                <tbody>
                    <tr>
                        <td> <img src="../support_team/<?php echo htmlspecialchars($row['picture']); ?>"></td>
                        <td> <?php echo $row["fname"];  ?> <?php echo $row["lname"];  ?> </td>
                        <td> <?php echo $row["address"];  ?> </td>
                        <td> <?php echo $row["dlno"];  ?> </td>
                        <td> <?php echo $row["mobile"];  ?> </td>
                        <td> <?php echo $row["email"];  ?> </td>
                        <td> <?php echo $row["position"];  ?> </td>
                    </tr>

                      <?php
                      $i++;
                      }
                      ?>

                    
                </tbody>
            </table>
        </div>
    </div>
    
    </div>
</div>
<?php
}

else{
  ?>
  <h5 style = "margin-left:-600px;"><?php echo "No suppot team member at this movement"; ?></h5>

  <?php
}

?>



<!----------------------------- Vehicles ----------------------->
      <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="fms";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Connection Erro".mysqli_connect_error());
}else{
	
}
?>

<?php

$sql="SELECT * FROM vehicles";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

?>

<!------------ Add Vehicles ------------>
<div class="vehiclesCont" id = "vehicles">

    <div class="vehiclesBox1">
      <section class="container2">
      <form action="vehiclebe.php" class="form" method="POST" enctype="multipart/form-data">
        <!-- Vehicle -->
        <div class="column">
          <!-- 1 -->
          <div class="input-box">
            <label>Vehicle No</label>
            <input type="text" name="vno" placeholder = "Enter Vehicle No"  required/>
          </div>
          <!-- 2 -->
          <div class="input-box">
            <label>Vehicle Brand</label>
            <input type="text" name="vbrand" placeholder = "Enter Vehicle Brand" required/>
          </div>

          <!-- 3 -->
          <div class="input-box">
            <label>Vehicle Model</label>
            <input type="text" name="vmodel" placeholder = "Enter Vehicle Model" required/>
          </div>

          <!-- Upload Picture -->
          <div class="input-box">
            <label>Vehicle Picture</label><br>
            
            <label class="custom-file-upload">
              <input type="file" name="file">
              Choose File
            </label>
          </div>
            <!-- button -->
          <button type="submit" class="btn">Add Vehicle</button>
        </div>

        
      </form>
      </section>
    </div>

<!------------ Show Vehicles Table ------------>
    <div class="vehiclesBox2">
      <div class="table">
        <div class="table_header">
            <p>Vehicles Informations</p>
            <div>
                <input type="text" placeholder="Seach by Vehicle No" class = "searchBoxx">
                <button class="add_new">Search</button>
            </div>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>Vehicle Picture</th>
                        <th>Vehicle No</th>
                        <th>Vehicle Brand</th>
                        <th>Vehicle Model</th>
                    </tr>
                </thead>
                <?php

                $i=0;
                while($row=mysqli_fetch_array($result)){

                ?>

                <tbody>
                    <tr>
                        <td> <img src="<?php echo htmlspecialchars($row['vpicture']); ?>" style = "border-radius: 10%; height: 100px; width: 100px;"></td> 
                        <td> <?php echo $row["vno"];  ?> </td>
                        <td> <?php echo $row["vbrand"];  ?> </td>
                        <td> <?php echo $row["vmodel"];  ?> </td>
                    </tr>

                      <?php
                      $i++;
                      }
                      ?>

                    
                </tbody>
            </table>
        </div>
    </div>
    
    </div>
</div>
<?php
}

else{
  ?>
  <h5 style = "margin-left:-600px;"><?php echo "No suppot team member at this movement"; ?></h5>

  <?php
}

?>


<!----------------------------- Task ----------------------->
<div class="taskCont" id = "tasks">
    <div class="taskBox"><h1>Tasks</h1></div>
</div>

<!----------------------------- Issue ----------------------->
      <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="fms";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	die("Connection Erro".mysqli_connect_error());
}else{
	
}
?>

<?php

$sql="SELECT * FROM issue";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

?>


<div class="issueCont" id = "issue">
    <div class="issueBox">


        <div class="table">
        <div class="table_header">
            <p>Issues Informations</p>
            <div>
                <input type="text" placeholder="Seach by issue" class = "searchBoxx">
                <button class="add_new">Search</button>
            </div>
        </div>

        <div class="table_section">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Driving License No</th>
                        <th>Issue</th>
                        <th>Support Team</th>
                        <th>Issue Photo</th>
                    </tr>
                </thead>
                <?php

                $i=0;
                while($row=mysqli_fetch_array($result)){

                ?>

                <tbody>
                    <tr>
                        <td> <?php echo $row["fname"];  ?> </td>
                        <td> <?php echo $row["dlno"];  ?> </td>
                        <td> <?php echo $row["issue"];  ?> </td>
                        <td> <?php echo $row["supportteam"];  ?> </td>
                        <td> <img src="../driver/<?php echo htmlspecialchars($row['issuepic']); ?>" style = "border-radius: 10%; height: 140px; width: 140px;"></td>
                    </tr>

                      <?php
                      $i++;
                      }
                      ?>

                    
                </tbody>
            </table>
        </div>
    </div>


    </div>
</div>


<?php
}

else{
  ?>
  <h5 style = "margin-left:-600px;"><?php echo "No drivers at this movement"; ?></h5>

  <?php
}

?>

<!----------------------------- Notification ----------------------->
<div class="notiCont" id = "notification">
    <div class="notiBox"><h1>Notification</h1></div>
</div>



<!----------------------------- Setting ----------------------->
<div class="settingCont" id = "setting">
    <div class="settingBox"><h1>Setting</h1></div>
</div>





    <script>
    function showDash() {
      document.getElementById('dashboard').style.display = 'block';
      document.getElementById('driver').style.display = 'none';
      document.getElementById('supportteam').style.display = 'none';
      document.getElementById('vehicles').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('issue').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
      
    }

    function showDriver() {
      document.getElementById('driver').style.display = 'block';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('supportteam').style.display = 'none';
      document.getElementById('vehicles').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('issue').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
      
    }

    function showST() {
      document.getElementById('supportteam').style.display = 'block';
      document.getElementById('driver').style.display = 'none';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('vehicles').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('issue').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
      
    }

    function showVehicles() {
      document.getElementById('vehicles').style.display = 'block';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('driver').style.display = 'none';
      document.getElementById('supportteam').style.display = 'none';
      document.getElementById('issue').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
    }

    function showTasks() {
      document.getElementById('tasks').style.display = 'block';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('driver').style.display = 'none';
      document.getElementById('supportteam').style.display = 'none';
      document.getElementById('vehicles').style.display = 'none';
      document.getElementById('issue').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
    }

    function showNoti() {
      document.getElementById('notification').style.display = 'block';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('driver').style.display = 'none';
      document.getElementById('supportteam').style.display = 'none';
      document.getElementById('vehicles').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('issue').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
    }

    function showIssue() {
      document.getElementById('issue').style.display = 'block';
      document.getElementById('notification').style.display = 'none';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('driver').style.display = 'none';
      document.getElementById('supportteam').style.display = 'none';
      document.getElementById('vehicles').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('setting').style.display = 'none';
    }

    function showSetting() {
      document.getElementById('setting').style.display = 'block';
      document.getElementById('dashboard').style.display = 'none';
      document.getElementById('driver').style.display = 'none';
      document.getElementById('supportteam').style.display = 'none';
      document.getElementById('vehicles').style.display = 'none';
      document.getElementById('tasks').style.display = 'none';
      document.getElementById('issue').style.display = 'none';
      document.getElementById('notification').style.display = 'none';
    }
    </script>

  </section>


  <script src="script.js"></script>


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
      <button><a href="admin-login.php">Login</a></button>
    </div>

  </div>
</div>

