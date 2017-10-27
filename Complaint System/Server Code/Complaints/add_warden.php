<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
//session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Hostel = $_POST['Hostel'];	
	//$Password = $_POST['Designation'];	
	$Password = $_POST['Password'];	
	$Room = $_POST['Room'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO wardens (Name, Email, Hostel, Password, Room)
VALUES ('$Email', '$Email', '$Hostel', '$Hostel', '$Room')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    //echo $_SESSION["session_user"];
    //echo $_SESSION["session_pass"];
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>