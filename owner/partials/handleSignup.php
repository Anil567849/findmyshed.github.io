

<?php 
	$showAlert = false;
	$showError = 'FALSE';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		include 'dbconnect.php';
		$owner_username = $_POST['signupOwnerName'];
		echo $owner_username;
		$owner_email = $_POST['signupOwnerEmail'];
		$owner_phone = $_POST['signupOwnerPhoneNumber'];
		$owner_pass = $_POST['signupOwnerPassword'];
		$owner_cpass = $_POST['signupOwnerCPassword'];
		$owner_state = $_POST['signupOwnerState'];
		$owner_district = $_POST['signupOwnerDistrict'];
		$owner_city = $_POST['signupOwnerCity'];
		$owner_pincode = $_POST['signupOwnerPincode'];
		// $owner_homeaddress = $_POST['signupOwnerHomeAddress'];
		// $owner_landmark = $_POST['signupOwnerLandmark'];

		$sql = "SELECT * FROM owner_signup WHERE owner_email_address = '$owner_email'";
		$result = mysqli_query($conn , $sql);
		$row = mysqli_num_rows($result);
		if($row > 0){
			// echo $showError . "user already exist";
			$showError = 'Email is already exist please use another one' ;
			header('location: ../signup.php?userExist=true&Error=$showError');
		}
		else{
			if($owner_pass == $owner_cpass){
				// $owner_hash_password = password_hash($owner_pass, PASSWORD_DEFAULT);
				// $sql = "INSERT INTO `owner_signup` (`owner_name`, `owner_email_address`, `owner_phone_number`, `owner_password`, `owner_state`, `owner_district`, `owner_city`, `owner_pincode`, `onwer_home_address`, `owner_landmark`) VALUES ('$owner_username', '$owner_email', '$owner_phone', '$owner_hash_password', '$owner_state', '$owner_district', '$owner_city', '$owner_pincode', '$owner_homeaddress', '$owner_landmark')";
				
				$owner_hash_password = password_hash($owner_pass, PASSWORD_DEFAULT);
				$sql = "INSERT INTO `owner_signup` (`owner_name`, `owner_email_address`, `owner_phone_number`, `owner_password`, `owner_state`, `owner_district`, `owner_city`, `owner_pincode`) VALUES ('$owner_username', '$owner_email', '$owner_phone', '$owner_hash_password', '$owner_state', '$owner_district', '$owner_city', '$owner_pincode')";

				$result = mysqli_query($conn, $sql);
				echo 'fine';
				// echo $result;
				if($result){
					session_start();
					$_SESSION['ownerloggedin'] = true;
					$_SESSION['owneremail'] = $owner_email;
					$showAlert = true;
					// echo 'success';
					header('location: ../room_form.php?signupsuccess=true');
					// exit();
				}
			}else{
			 // Password not match;
			// echo "false " . $showError;
			header('location: ../signup.php?passwordnotmatch=true&Error=$showError');
			}
		}

	}
 ?>