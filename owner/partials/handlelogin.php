

<?php 
$showError = false;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include 'dbconnect.php';
		$owner_email = $_POST['loginOwnerEmailAddress'];
		$owner_pass = $_POST['loginOwnerPassword'];
		echo $owner_email;

		$sql = 	"SELECT * FROM owner_signup WHERE owner_email_address = '$owner_email'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_num_rows($result);
		echo $row;
		if($row == 1){
			while($data = mysqli_fetch_assoc($result)){
				if(password_verify($owner_pass, $data['owner_password'])){
					$sign_up_email = $data['owner_email_address']; 
				// 	$sign_up_password = $data['owner_password'];
					session_start();
					$_SESSION['ownerloggedin'] = true;
					$_SESSION['owneremail'] = $sign_up_email;
					header("location: ../room_form.php?loginsuccess=true");
					exit();

				// }else($sign_up_email == $owner_email && $sign_up_password != $owner_pass){
				}else{
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