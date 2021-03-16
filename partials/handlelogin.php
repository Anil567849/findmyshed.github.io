

<?php 
$showError = false;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include 'dbconnect.php';
		$user_email = $_POST['loginUserEmailAddress'];
		$user_pass = $_POST['loginUserPassword'];
		echo $user_email;

		$sql = 	"SELECT * FROM user_signup WHERE user_email_address = '$user_email'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_num_rows($result);
		if($row == 1){
			while($data = mysqli_fetch_assoc($result)){
				if(password_verify($user_pass, $data['user_password'])){
					$useremail = $data['user_email_address']; 
					// $userpass = $data['user_password'];
					session_start();
					$_SESSION['userloggedin'] = true;
					$_SESSION['useremail'] = $useremail;
					header("location: ../index.php?loginsuccess=true");
					exit();

				}// else if($user_email == $useremail && $user_pass !== $userpass){
				else{
				header("location: ../login.php?loginpasswordnotexist=true");
				}
			}
			}else{
				$showError = true;
				header("location: ../login.php?loginnotexist=true");
			}
		}

 ?>









<?php
// 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
// 		include "dbconnect.php";
// 		$user_email = $_POST['loginusername'];
// 		$user_pass = $_POST['loginpassword'];

// 		$sql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
// 		$result = mysqli_query($conn, $sql);
// 		$num = mysqli_num_rows($result);
// 		if($num == 1){
// 			$row = mysqli_fetch_assoc($results);
// 			if($user_pass){
// 				session_start();
// 				$_SESSION['loggedin'] = true;
// 				$_SESSION['useremail'] = $user_email;
// 				header('location: ../iDiscuss.php');

// 			}
// 			else{				
// 				header('location: ../login.php?login=true');
// 			}
// 		}
// 	else{
// 		header('location: ../login.php?login=true');
// 	}
// 	}


	?>