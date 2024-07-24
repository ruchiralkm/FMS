<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="success.css">
</head>
<body>
<div class="container">
  <div class="invalidBox">

    <div class="invalidImgBox">
      <img src="assets/correct.png" alt="" class = "invalidImg">
    </div>

    <div class="invalidWords">
      <span class = "invalidMsg">Successfully Completed</span>
      <span class = "invalidMsg2">Your isuue is recorded</span>
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
$fname = $_REQUEST['fname'];
$dlno = $_REQUEST['dlno'];
$issue = $_REQUEST['issue'];
$supportteam = $_REQUEST['supportteam'];

// Handle profile picture upload
$targetDir = "issueuploads/"; // Directory where the file will be stored
$fileName = basename($_FILES["file"]["name"]); // Get the name of the file
$targetFilePath = $targetDir . $fileName; // Path to store the uploaded file

// Move the uploaded file to the designated directory
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
    // File uploaded successfully, proceed to store its path in the database
    $issuepic = $targetFilePath;
} else {
    // Error handling if file upload fails
    $issuepic = ""; // Set picture to empty string or handle error as needed
}

$sql = "INSERT INTO issue (fname, dlno, issue, supportteam, issuepic) 
        VALUES ('$fname', '$dlno', '$issue', '$supportteam', '$issuepic')";


if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
