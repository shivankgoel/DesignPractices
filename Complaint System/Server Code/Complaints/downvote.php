<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

//session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

$email = $_POST['stdemail'];
$id = $_POST['id'];

//$email = "aniket@gmail.com";
//$id = 13;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else{


    //$id = $_POST['id'];

    //$pwd = 'batman';
    //$id = 17;  
   //$email = $_SESSION["session_user"];
   //$email = "ankit@gmail.com";

    $sqll = "select UpvoteStatus from upvotes where ID = '$id' and Email = '$email' ";
    $ress = mysqli_query($conn,$sqll);
    $empparray = array();
   // // ArrayList<String> result = new Arraylist<String>();
    while($row =mysqli_fetch_assoc($ress))
    { 
       $empparray[] = $row;
    }

    if (empty($empparray)){
          //echo "Hi buddy";
          $sql = "Update complaints set Downvotes = Downvotes + 1 where TicketID = '$id' ";
          $res = mysqli_query($conn,$sql);
          if(isset($res)){  
            $sqll = "INSERT INTO upvotes (Email, ID, UpvoteStatus)
                      VALUES ('$email', '$id', 2)";
            $ress = mysqli_query($conn,$sqll);   
            echo 'You have downvoted the complaint';
          }
          else echo 'Failure';
          mysqli_close($conn);
    }

    else {

           $status =  $empparray[0]["UpvoteStatus"];
           //echo ($status);
           if ($status == 1 or $status == 2){
              echo "Your vote has already been registered";
           }
           else {

              $sql = "Update complaints set Downvotes = Downvotes + 1 where TicketID = '$id' ";
              $res = mysqli_query($conn,$sql);
              if(isset($res)){
                $sqll = "INSERT INTO upvotes (Email, ID, UpvoteStatus)
                  VALUES ('$email', '$id', 2)";
                $ress = mysqli_query($conn,$sqll);      
                echo 'You have downvoted the complaint';
              }
              else echo 'Failure';
              //mysqli_close($conn);
          }
    //var_dump($ress);

    //$sql = "Update complaints set Upvotes = Upvotes + 1 where TicketID = '$id' ";

        //$sql = "select * from complaints where Email = '$email' and Level = 'Individual' ";

    //$res = mysqli_query($conn,$sql);
    //$check = mysqli_fetch_array($res);
    //if(isset($res)){
      //$_SESSION["session_user"] = $email;
      //$_SESSION["session_pass"] = $pass;

  //array_push($result, array('login_response' => $success));
  //echo json_encode(array("result"=>$result));  //}

  // else{
  //   echo 'Request Denied';
  // }
    //$result = array();
    //$emparray = array();
    // while($row =mysqli_fetch_assoc($res))       
    // {
    //     $emparray[] = $row;
    // }
    // echo json_encode($emparray);


//    while($row = mysqli_fetch_array($res)){
//      array_push($result,
//        array('TicketId'=>$row[0],
//        'Email' => $row[6],
//        'Date'=>$row[1],
//        'Category'=>$row[2],
//        'Level' => $row[3],
//        'Status' => $row[5],
//        'Upvotes' => $row[7],
//        'Downvotes' => $row[8],
//         'Hostel' => $row[9],
//         'Description' => $row[4]

//   ));
// }

//echo json_encode(array("result"=>$result));
 
  mysqli_close($conn);

}

}


?>