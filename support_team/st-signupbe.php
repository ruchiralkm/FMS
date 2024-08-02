<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="pagesxs.css">

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
    <title>FleetMS</title>
</head>
<body style = "background-color:white;">
    <div class="container">
  <div class="invalidBox">

    <div class="invalidImgBox">
      <img src="assets/correct.png" alt="" class = "invalidImg">
    </div>

    <div class="invalidWords">
      <span class = "invalidMsg">Successfully<br>Registered</span>
      <span class = "invalidMsg2">Click here to login</span>
      <button
      style = "margin-top: 20px;
      width: 120px;
      height: 40px;
      font-size: 1.1rem;
      font-weight: bold;
      background-color: black;
      color: #fff;
      border: none;
      border-radius: 9px;
      cursor: pointer;"
      >
      <a href="st-login.php" style = "text-decoration: none; color: #fff;">
        Login</a></button>
    </div>

  </div>
</div>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$address = $_REQUEST['address'];
$dlno = $_REQUEST['dlno'];

$mobile = $_REQUEST['mobile'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

// Handle checkboxes
$position = implode(',', $_REQUEST['position']); // Convert array to comma-separated string

// Handle profile picture upload
$targetDir = "uploads/"; // Directory where the file will be stored
$fileName = basename($_FILES["file"]["name"]); // Get the name of the file
$targetFilePath = $targetDir . $fileName; // Path to store the uploaded file

// Move the uploaded file to the designated directory
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
    // File uploaded successfully, proceed to store its path in the database
    $picture = $targetFilePath;
} else {
    // Error handling if file upload fails
    $picture = ""; // Set picture to empty string or handle error as needed
}

$sql = "INSERT INTO support_team (fname, lname, address, dlno, picture, mobile, dob, gender, email, password, position) 
        VALUES ('$fname', '$lname', '$address', '$dlno', '$picture', '$mobile', '$dob', '$gender', '$email', '$password', '$position')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
