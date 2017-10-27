<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
//session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	//$stdemail = $_POST['stdemail'];
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Category = $_POST['Category'];	
	$Office = $_POST['Office'];	
	//$Room = $_POST['Room'];
	$Password = $_POST['Password'];	
	//$Hostel = $_POST['Hostel'];	




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO workers (Name, Email, Category, Office, Password)
VALUES ('$Name', '$Email', '$Category', '$Office', '$Password' )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    //echo $_SESSION["session_user"];
    //echo $_SESSION["session_pass"];
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>