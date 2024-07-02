<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Edit Driver Information</title>
    <!-- <link rel="stylesheet" href="styless.css"> -->
    <link rel="stylesheet" href="pagess.css">
    <link rel="stylesheet" href="edit.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style = "background-color:#E4E9F7;">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $dlno = $_POST['dlno'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $experience = $_POST['experience'];
    $vehicle = $_POST['vehicle'];
    
    if (!empty($_FILES['picture']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['picture']['name']);
        move_uploaded_file($_FILES['picture']['tmp_name'], $target_file);
        $picture = $target_file;
        $sql = "UPDATE driver SET fname='$fname', lname='$lname', address ='$address', dlno='$dlno', mobile='$mobile', dob='$dob', email='$email', password='$password', experience='$experience', vehicle='$vehicle', picture='$picture' WHERE email='$email'";
    } else {
        $sql = "UPDATE driver SET fname='$fname', lname='$lname', address ='$address', dlno='$dlno', mobile='$mobile', dob='$dob', email='$email', password='$password', experience='$experience', vehicle='$vehicle' WHERE email='$email'";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM driver WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $lname = $row['lname'];
    $address = $row['address'];
    $dlno = $row['dlno'];
    $mobile = $row['mobile'];
    $dob = $row['dob'];
    $email = $row['email'];
    $password = $row['password'];
    $experience = $row['experience'];
    $vehicle = $row['vehicle'];
    $picture = $row['picture'];
?>

<div class="editContainer">
    <header class = "header">Update Driver Information</header>
    
    <form class = "form" action="edit.php?email=<?php echo $email; ?>" method="post" enctype="multipart/form-data">

        <!-- Name -->
        <div class="column">
          <!-- 1 -->
          <div class="input-box">
            <label>Frist Name</label>
            <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required/>
          </div>
          <!-- 2 -->
          <div class="input-box">
            <label>Last Name</label>
            <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required />
          </div>
        </div>

        <!-- Address -->
        <div class="input-box">
          <label>Address</label>
          <input type="text" id="address" name="address" value="<?php echo $address; ?>" required/>
        </div>


        <!--Licence-->
        <div class="column">

          <!-- Licence -->
          <div class="input-box">
            <label>Driving Licence Number</label>
            <input type="number" id="dlno" name="dlno" value="<?php echo $dlno; ?>" style = "background-color:#e5e4e2 ;" readonly required/>
          </div>

        </div>


        <!--Mobile Number & Birthday-->
        <div class="column">

          <!-- 1 -->
          <div class="input-box">
            <label>Mobile Number</label>
            <input type="number" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required />
          </div>
          <!-- 2 -->
          <div class="input-box">
            <label>Birthday</label>
            <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required />
          </div>

        </div>


         <!--Email & Password-->
        <div class="column">

          <!-- 1 -->
          <div class="input-box">
            <label>Email</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required />
          </div>
          <!-- 2 -->
          <div class="input-box">
            <label>Password</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required />
          </div>
        </div>

        <!-- expireance levels  -->
        <div class="input-box">
          <label>Experience</label>
          <input type="text" id="experience" name="experience" value="<?php echo $experience; ?>" required />
          
        </div>



        <div class="input-box">
            <label for="vehicle">Vehicles</label>
            <input type="text" class="form-control" id="vehicle" name="vehicle" value="<?php echo $vehicle; ?>" required><br>
        </div>
        <div class="form-group">
            <label for="picture">Profile Picture:</label>
            <input type="file" class="form-control" id="picture" name="picture">
            <?php if (!empty($picture)) { ?>
                <img src="<?php echo $picture; ?>" alt="Profile Picture" style="width: 100px; height: 100px;">
            <?php } ?>
        </div>
        <button type="submit" class="btn1">Update</button>
        <button type="button" class="btn2" onclick="window.history.back();">Cancel</button>
    </form>
</div>

<?php
} else {
    echo "No driver found with the given email.";
}
$conn->close();
?>

</body>
</html>
