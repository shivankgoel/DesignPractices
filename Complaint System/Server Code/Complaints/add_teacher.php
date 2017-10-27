<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
//session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

	$stdemail = $_POST['stdemail'];
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Department = $_POST['Department'];	
	$Designation = $_POST['Designation'];	
	$Room = $_POST['Room'];
	$Password = $_POST['Password'];	
	//$Hostel = $_POST['Hostel'];
	// $Name = "Naveen Garg";
	// $Email = "ngarg@gmail.com";
	// $Department = "Computer Science";	
	// $Designation = "Professor";	
	// $Room = "Bharti 404";
	// $Password = "ngarg";	


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "INSERT INTO teachers (Name, Email, Department, Designation, Room, Password)
//VALUES ('Vinay Riberio', 'vnr@gmail.com', 'Computer Science', 'Associate Professor', 'IIA 506', 'vinay')";

$sql = "INSERT INTO teachers (Name, Email, Department, Designation, Room, Password)
VALUES ('$Name', '$Email', '$Department', '$Designation', '$Room', '$Password')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    //echo $_SESSION["session_user"];
    //echo $_SESSION["session_pass"];
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>