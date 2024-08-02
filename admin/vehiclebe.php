<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FleetMS</title>
    
    <link rel="stylesheet" href="success.css">
</head>
<body>
<div class="container">
  <div class="invalidBox">

    <div class="invalidImgBox">
      <img src="assets/correct.png" alt="" class = "invalidImg">
    </div>

    <div class="invalidWords">
      <span class = "invalidMsg">Successfully Added</span>
      <span class = "invalidMsg2">Your vehicle is recorded</span>
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
      <a onclick="window.history.back();"
      style = "text-decoration: none; color: #fff;">
        Back</a></button>
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
$vno = $_REQUEST['vno'];
$vbrand = $_REQUEST['vbrand'];
$vmodel = $_REQUEST['vmodel'];

// Handle profile picture upload
$targetDir = "vuploads/"; // Directory where the file will be stored
$fileName = basename($_FILES["file"]["name"]); // Get the name of the file
$targetFilePath = $targetDir . $fileName; // Path to store the uploaded file

// Move the uploaded file to the designated directory
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
    // File uploaded successfully, proceed to store its path in the database
    $vpicture = $targetFilePath;
} else {
    // Error handling if file upload fails
    $vpicture = ""; // Set picture to empty string or handle error as needed
}

$sql = "INSERT INTO vehicles (vno, vbrand, vmodel, vpicture) 
        VALUES ('$vno', '$vbrand', '$vmodel', '$vpicture')";


if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
