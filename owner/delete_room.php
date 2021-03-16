
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<!-- CSS  -->
	<link rel="stylesheet" href="css/delete_room.css">
    <title>DELETE FORM</title>
  </head>
  <body>


<div class="main-div">
	<div class="card container shadow">
		<div class="mx-auto my-auto">
				<div class="text-center">
					<h3 class="mb-5">Do you really want to delete your room</h3>
				</div>
				<form class="text-center" method="post"  enctype="multipart\form-data">
					<div class="form-group">
						<input type="submit" class="btn btn-danger my-2 mx-2" name="yes_delete" value="Yes, i want to delete" required>

						<input type="submit" class="btn btn-success my-2 mx-2" name="no_delete" value="no, i don't want to delete" required>
					</div>
				</form>
		</div>
	</div>
</div>

<?php 
	session_start();
	include "partials/dbconnect.php";
	$owner_email = $_SESSION['owneremail'];
	if(isset($_POST['yes_delete'])){
		$room_id = $_GET['delete_id'];
		$delete_room = "DELETE FROM owner_room WHERE room_id = '$room_id'";
		$rundelete_room = mysqli_query($conn, $delete_room);
		if($rundelete_room){
			header("location: manage_room.php?deletedsuccessfully=true");
		}else{
			echo 'sorry';
		}
	}


	if(isset($_POST['no_delete'])){
		header("location: manage_room.php");
	}
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