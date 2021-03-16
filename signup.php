<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/signup_login_media_query.css">
	<link rel="stylesheet" href="css/signup.css">

	<!-- TITLE -->
    <title>FINDMYSHED - signup</title>
  </head>
  <body>

	<!-- INCLUDES -->
	 <?php include "partials/header.php"; ?> 


	<!-- ALERTS -->
	<?php 
		if(isset($_GET['userExist'])){
			echo '<div class="alert alert-danger">sorry dear | user already exist | try another one</div>';
		}

		if(isset($_GET['passwordnotmatch'])){
			echo '<div class="alert alert-danger">sorry dear | password not match | try again</div>';
		}

	?>


 
	<!-- FORM -->
	<?php 
	 echo'<div class="container form-container">
			<h1 class="text-center">Sign Up Form</h1>
			<form  method="POST" action="partials/handleSignup.php" class="mb-5 card p-2">
				<div class="form-group">
					<label for="signupUsername">Username</label>
					<input class="form-control" type="text" id="signupUsername" name="signupUsername" required>
				</div>

				<div class="form-group">
					<label for="signupUserEmail">Email Address</label>
					<input class="form-control" type="text" id="signupUserEmail" name="signupUserEmail" required>
				</div>

				<div class="form-group">
					<label for="signupUserPhoneNumber">Phone Number</label>
					<input class="form-control" type="text" id="signupUserPhoneNumber" name="signupUserPhoneNumber" required>
				</div>

				<div class="form-group">
					<label for="signupUserpassword">Password</label>
					<input class="form-control" type="text" id="signupUserpassword" name="signupUserpassword" required>
				</div>

				<div class="form-group">
					<label for="signupUserCPassword">Confirm pssword</label>
					<input class="form-control" type="text" id="signupUserCPassword" name="signupUserCPassword" required>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-4 col-sm-12 my-2 d-grid">
							<button type="submit" class="btn btn-primary py-2">sign up</button>
						</div>
						<div class="col-md-8 col-sm-12  my-2 d-grid">
							<a href="login.php" class="btn btn-dark text-white already_have_account py-2">already have account</a>
						</div>
					</div>
				</div>
			</form>
		</div>';
 ?>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>