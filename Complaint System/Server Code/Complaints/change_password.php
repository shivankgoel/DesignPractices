<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

//session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else{


   $email = $_POST['stdemail'];
   $pwd = $_POST['password'];
   $type = $_POST['stdtype'];


    // $email = "sak@gmail.com";
    // $pwd = "sakk";
    // $type = "teacher";

    //$id = 13;
	 
   //$email = $_SESSION["session_user"];
   //$email = "ankit@gmail.com";
   //  $sqll = "select Hostel from students where Email = '$email'";
   //  $ress = mysqli_query($conn,$sqll);
   //  $empparray = array();
   // // ArrayList<String> result = new Arraylist<String>();
   //  while($row =mysqli_fetch_assoc($ress))
   //  { 
   //      $empparray[] = $row;
   //  }
   //  $hostel =  $empparray[0]["Hostel"];
      //echo ($hostel);
    //var_dump($ress);

    if ($type == "student"){

          $sql = "Update students set Password = '$pwd' where Email = '$email' ";
          $res = mysqli_query($conn,$sql);
          if(isset($res)){
              echo 'Your password was successfully updated';
          }
          else{
            echo 'Request Denied';
          }
    }


    elseif ($type == "warden"){

          $sql = "Update wardens set Password = '$pwd' where Email = '$email' ";
          $res = mysqli_query($conn,$sql);
          if(isset($res)){
              echo 'Your password was successfully updated';
          }
          else{
            echo 'Request Denied';
          }
    }

    elseif ($type == "teacher"){

          $sql = "Update teachers set Password = '$pwd' where Email = '$email' ";
          $res = mysqli_query($conn,$sql);
          if(isset($res)){
              echo 'Your password was successfully updated';
          }
          else{
            echo 'Request Denied';
          }
    }

    elseif ($type == "worker"){

          $sql = "Update workers set Password = '$pwd' where Email = '$email' ";
          $res = mysqli_query($conn,$sql);
          if(isset($res)){
              echo 'Your password was successfully updated';
          }
          else{
            echo 'Request Denied';
          }
    }

    else {        
        
            echo 'Request Denied';
    }

        //$sql = "select * from complaints where Email = '$email' and Level = 'Individual' ";

  	
      //$_SESSION["session_user"] = $email;
      //$_SESSION["session_pass"] = $pass;

  //array_push($result, array('login_response' => $success));
  //echo json_encode(array("result"=>$result));
  
  
    //$result = array();
  	//$emparray = array();
    // while($row =mysqli_fetch_assoc($res))       
    // {
    //     $emparray[] = $row;
    // }
    // echo json_encode($emparray);


//   	while($row = mysqli_fetch_array($res)){
//     	array_push($result,
//     		array('TicketId'=>$row[0],
//     		'Email' => $row[6],
//     		'Date'=>$row[1],
//     		'Category'=>$row[2],
//     		'Level' => $row[3],
//     		'Status' => $row[5],
//     		'Upvotes' => $row[7],
//     		'Downvotes' => $row[8],
//         'Hostel' => $row[9],
//         'Description' => $row[4]

//   ));
// }

//echo json_encode(array("result"=>$result));
 
  mysqli_close($conn);

}


?>