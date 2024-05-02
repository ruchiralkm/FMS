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
$picture = $_REQUEST['picture'];
$mobile = $_REQUEST['mobile'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$experience = $_REQUEST['experience'];

// Handle checkboxes
$vehicles = implode(',', $_REQUEST['vehicle']); // Convert array to comma-separated string

$sql = "INSERT INTO driver (fname, lname, address, dlno, picture, mobile, dob, gender, email, password, experience, vehicle) 
        VALUES ('$fname', '$lname', '$address', '$dlno', '$picture', '$mobile', '$dob', '$gender', '$email', '$password', '$experience', '$vehicles')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>
