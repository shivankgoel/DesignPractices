<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$dt = date('Y-m-d');

//echo $dt;

// Create connection
//session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

	$email = $_POST['stdemail'];
	$Category = $_POST['Category'];
    $Level = $_POST['Level'];
    $Description = $_POST['Description'];
	// $Name = $_POST['Name'];
 //    $email = $_POST['stdemail'];
	// $Entry = $_POST['Entry'];	
	// $Phone = $_POST['Phone'];	
	// $Room = $_POST['Room'];
	// $Password = $_POST['Password'];	
	// $Hostel = $_POST['Hostel'];	
// Check connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else{

	//$email = $_SESSION["session_user"];
	//echo $email;
	$sqll = "select Hostel from students where Email = '$email'";
    $ress = mysqli_query($conn,$sqll);
    $empparray = array();
   // ArrayList<String> result = new Arraylist<String>();
    while($row =mysqli_fetch_assoc($ress))
    { 
        $empparray[] = $row;
    }
    $hostel =  $empparray[0]["Hostel"];


    

	$sql = "INSERT INTO complaints (Email, Date, Category, Level, Status, Description,Hostel)
	VALUES ('$email', CURDATE(), '$Category', '$Level', 'Unresolved', '$Description','$hostel' )";

	if ($conn->query($sql) === TRUE) {
	    echo "Your complaint has been posted successfully";
	    //echo $_SESSION["session_user"];
	    //echo $_SESSION["session_pass"];
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

}
?>