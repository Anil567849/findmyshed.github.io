<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/signup_login_media_query.css">

	<!-- TITLE -->
    <title>FINDMYSHED - login</title>
  </head>
  <body>



	<!-- INCLUDES -->
	<?php include "partials/header.php"; ?>
	<?php include "partials/dbconnect.php"; ?>




	<!-- ALERTS -->
<?php
	if(isset($_GET['loginnotexist'])){
		echo '<div class="alert alert-danger">Sorry ! dear your account is not exist on this ID</div>';
	}

	if(isset($_GET['loginpasswordnotexist'])){
		echo '<div class="alert alert-danger">Sorry ! dear your account password is wrong</div>';
	}
	if(isset($_GET['loginemailnotexist'])){
		echo '<div class="alert alert-danger">Sorry ! dear your account email is wrong</div>';
	}
	
	if(isset($_GET['loginbeforecall'])){
		echo '<div class="alert alert-danger">sorry! dear your are not logged in</div>';
	}

	if(isset($_GET['loginbeforewhatsapp'])){
		echo '<div class="alert alert-danger">sorry! dear your are not logged in</div>';
	}
	echo '<div>';
?>



	<!-- FORM -->
	<?php
	 echo'
	 <div class="container form-container">
		<div class="container">
			<H1 class="text-center mb-3">log in</H1>
			<form method="post" action="partials/handlelogin.php" class="card p-2 shadow">
				<div class="form-group">
					<label for="loginUserEmailAddress">Email Address</label>
					<input class="form-control" type="text" id="loginUserEmailAddress" name="loginUserEmailAddress" required>
				</div>

				<div class="form-group">
					<label for="loginUserPassword">Password</label>
					<input type="password" class="form-control" type="text" id="loginUserPassword" name="loginUserPassword" required>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="d-grid my-2 col-md-4 col-xs-12">
							<button type="submit" class="btn btn-primary py-2">Log in</button>
						</div>
						<div class="d-grid my-2 col-md-8 col-xs-12">
							<a href="signup.php" class="btn btn-dark text-white py-2">don\'t have account</a>
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