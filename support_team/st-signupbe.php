<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Successfully</h1>
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
