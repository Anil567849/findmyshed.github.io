

<?php 
	$showAlert = false;
	$showError = 'FALSE';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include 'dbconnect.php';
		$username = $_POST['signupUsername'];
		$user_email = $_POST['signupUserEmail'];
		$user_phone_number = $_POST['signupUserPhoneNumber'];
		$user_pass = $_POST['signupUserpassword'];
		$user_cpass = $_POST['signupUserCPassword'];

		$sql = "SELECT * FROM user_signup WHERE user_email_address = '$user_email'";
		$result = mysqli_query($conn , $sql);
		$row = mysqli_num_rows($result);
		if($row > 0){
			echo $showError;
			// $showError = 'Email is already exist please use another one' ;
			header('location: ../signup.php?userExist=true&Error=$showError');
		}
		else{
			if($user_pass == $user_cpass){
				$user_hash_password = password_hash($user_pass, PASSWORD_DEFAULT);
				$sql = "INSERT INTO user_signup (user_name, user_email_address, user_phone_number, user_password) VALUES ('$username', '$user_email', '$user_phone_number', '$user_hash_password')";
				$result = mysqli_query($conn, $sql);
				// echo $result;
				if($result){
					session_start();
					$_SESSION['userloggedin'] = true;
					$_SESSION['useremail'] = $user_email;
					$showAlert = true;
					// echo 'success';
					header('location: ../index.php?signupsuccess=true');
					exit();
				}
			}else{				
			 // 'Password not match';
			// echo "false " . $showError;
			header('location: ../signup.php?passwordnotmatch=true&Error=$showError');
			}
		}

	}
 ?>





<!-- 
<?php 
// 	$showAlert = false;
// 	$showError = false;
// 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
// 		include "dbconnect.php";
// 		$user_email = $_POST['signupEmail'];
// 		$user_pass = $_POST['password'];
// 		$user_cpass = $_POST['cpassword'];
	
// 		$exist = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
// 		$result = mysqli_query($conn, $exist);
// 		$num = mysqli_num_rows($result);
// 		if($num>0){
// 			$showError = 'Email is already exist please use another one' ;
// 		}
// 		else{
// 			if($user_pass == $user_cpass){
// 				// $hash = password_hash($pass, PASSWORD_DEFAULT);
// 				$sql = "INSERT INTO `users` (`user_email`, `user_pass`) VALUES ('$user_email', '$user_pass')";
// 				$result = mysqli_query($conn, $sql);
// 				if($result){
// 					echo 'success';
// 					$showAlert = true;
// 					header('location: iDiscuss.php?signupsuccess=true');
// 					exit();
// 				}
// 			}
// 			else{
// 				$showError = 'password does not match please check' ;
// 			}
// 		}
// 	}
?>

 -->