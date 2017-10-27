<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else{

	  //$email = $_SESSION["session_user"];
    $email = "ankit@gmail.com";
    $sqll = "select Hostel from students where Email = '$email'";
    $ress = mysqli_query($conn,$sqll);
    $empparray = array();
   // ArrayList<String> result = new Arraylist<String>();
    while($row =mysqli_fetch_assoc($ress))
    { 
        $empparray[] = $row;
    }
    $hostel =  $empparray[0]["Hostel"];
      //echo ($hostel);
    //var_dump($ress);

  	$sql = "select * From complaints where Level = 'Hostel' and Hostel = '$hostel' and Status = 'Resolved'";

    //$sql = "select * from complaints where Email = '$email' and Level = 'Individual' ";

  	$res = mysqli_query($conn,$sql);
    $result = array();
  	//$emparray = array();
    // while($row =mysqli_fetch_assoc($res))       
    // {
    //     $emparray[] = $row;
    // }
    // echo json_encode($emparray);


  	while($row = mysqli_fetch_array($res)){
    	array_push($result,
    		array('TicketId'=>$row[0],
    		'Email' => $row[6],
    		'Date'=>$row[1],
    		'Category'=>$row[2],
    		'Level' => $row[3],
    		'Status' => $row[5],
    		'Upvotes' => $row[7],
    		'Downvotes' => $row[8],
        'Hostel' => $row[9],
        'Description' => $row[4]

  ));
}

echo json_encode(array("result"=>$result));
 
  mysqli_close($conn);






}


?>