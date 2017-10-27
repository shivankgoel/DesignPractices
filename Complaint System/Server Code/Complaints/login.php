<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

$student = "student";
$teacher = "teacher";
$warden = "warden";
$special = "special";
$worker = "worker";


$success = "success";

//session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	

	$email = $_POST['email'];
	$pass = $_POST['password'];

	//$email = "sk@gmail.com";0
	//$pass =  "sdk";

	//$email = "vnr@gmail.com";
	//$pass =  "vinay";

	//$email = "shiva@gmail.com";
	//$pass = "shiva";

	//$email = "";
	//$pass = "";



	$sql = "select * from students where Email='$email' and Password='$pass'";
	$res = mysqli_query($conn,$sql);
	$check = mysqli_fetch_array($res);

	if(isset($check)){
	//$_SESSION["session_user"] = $email;
	//$_SESSION["session_pass"] = $pass;
	//$_SESSION["session_type"] = $student;
	//array_push($result, array('login_response' => $success));
	//echo json_encode(array("result"=>$result));

	//echo $_SESSION["session_user"];
	//echo $_SESSION["session_type"];
	echo 'success_student';
	}

	else{

		$sql = "select * from wardens where Email='$email' and Password='$pass'";
		$res = mysqli_query($conn,$sql);
		$check = mysqli_fetch_array($res);

		if(isset($check)){
			//$_SESSION["session_user"] = $email;
			//$_SESSION["session_pass"] = $pass;
			//$_SESSION["session_type"] = $warden;
			echo 'success_warden';
			//echo $_SESSION["session_type"];
		}

		else{
			$sql = "select * from teachers where Email='$email' and Password='$pass'";
			$res = mysqli_query($conn,$sql);
			$check = mysqli_fetch_array($res);

			if(isset($check)){
				//$_SESSION["session_user"] = $email;
				//$_SESSION["session_pass"] = $pass;
				//$_SESSION["session_type"] = $teacher;
				echo 'success_teacher';
				//echo $_SESSION["session_type"];
			}

			else{
				$sql = "select * from workers where Email='$email' and Password='$pass'";
				$res = mysqli_query($conn,$sql);
				$check = mysqli_fetch_array($res);

				if(isset($check)){
					//$_SESSION["session_user"] = $email;
					//$_SESSION["session_pass"] = $pass;
					//$_SESSION["session_type"] = $worker;
					echo 'success_worker';
					//echo $_SESSION["session_type"];
				}

				else{		
						//$sql = "select * from special where Email='$email' and Password='$pass'";
						//$res = mysqli_query($conn,$sql);
						//$check = mysqli_fetch_array($res);

						// if (!isset($check)){
						// 	echo 'failure';
						// 	//exit();
						// }

						if( $email == 'admin' and $pass == 'admin') {	
							//$_SESSION["session_user"] = $email;
							//$_SESSION["session_pass"] = $pass;
							//$_SESSION["session_type"] = $special;
							echo 'success_special';
							//echo $_SESSION["session_type"];
						}
						else{
							echo 'failure';
						}
				}
			}
 
		}
	}
	mysqli_close($conn);
}
?>



 
 
 
 
