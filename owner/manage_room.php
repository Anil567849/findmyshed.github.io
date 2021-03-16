
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- CSS  -->
    <link rel="stylesheet" href="css/manage_room.css">
    <title>MANAGE ROOM</title>
  </head>
  <body>
    
  <!-- INCLUDES  -->
  <?php include "partials/header.php"; ?>
  <?php include "partials/dbconnect.php"; ?>

  <!-- ALERTS -->
  <?php
    if(isset($_GET['deletedsuccessfully']) && $_GET['deletedsuccessfully'] == true){
      echo '<div class="alert alert-success">Your Room Has Been Deleted Successfully</div>';
    }


    if(isset($_GET['roomformupdatedsuccessfully'])){
      echo '<div class="alert alert-success">Your Room Has Been Updated Successfully</div>';
    }

    if(isset($_GET['roomformnotupdated'])){
      echo '<div class="alert alert-danger">Sorry | Your Room Has Not Been Updated</div>';
    }
  ?>



<!-- MAIN CODES  -->
  <div class="text-center heading">
    <h1>MY CATALOG</h1>
  </div>

  <?php
  if(isset($_SESSION['ownerloggedin']) && $_SESSION['ownerloggedin'] == true){
    $owner_email = $_SESSION['owneremail'];
  }else{
    header("location: login.php");
  }
  
  $sql = "SELECT * FROM owner_signup WHERE owner_email_address = '$owner_email'";
    $result = mysqli_query($conn, $sql);
    if($result){
    $row = mysqli_fetch_assoc($result);
    }else{
        echo 'sorry';
    }
    $owner_id = $row['owner_id'];

    $sql = "SELECT * FROM owner_room WHERE owner_id = '$owner_id'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
    $room_id = $row['room_id'];
    $room_owner_name = $row['room_owner_name'];
    $room_set = $row['room_set'];
    $room_price = $row['room_price'];
    $room_address = $row['room_address'];
    $room_village = $row['room_village'];
    $room_kitchen = $row['room_kitchen'];
    $room_toilet = $row['room_toilet'];
    $owner_phone_nubmer = $row['owner_phone_number'];
    $room_publish_date_time = $row['room_publish_date'];
    $room_publish_date = substr($room_publish_date_time,8,2);
    $room_publish_month = substr($room_publish_date_time,5,2);
    $room_publish_year = substr($room_publish_date_time,0,4);
    

if(isset($_SESSION['ownerloggedin']) && $_SESSION['ownerloggedin'] == true){
echo '<div class="mt-2 mb-5">
<div class="card mx-auto" style="width: 65vw">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <h6 class="card-title"><b>Owner Name</b> : '. $room_owner_name .'</h6>
        <p class="card-text"><b>Room Set</b> : '. $room_set .'</p>
        <p class="card-text"><b>Room Price</b> : '. $room_price .'</p>
        <p class="card-text"><b>Room Address</b> : '. $room_address .'</p>
        <p class="card-text"><b>Room Village</b> : '. $room_village .'</p>
        <p class="align-self-end"><b>Owner Tel</b> : '. $owner_phone_nubmer .'</p>
      </div>
      <div class="col-md-6 col-sm-12 text-md-end">
        <p class="align-self-end"><b>Kitchen</b> : '. $room_kitchen .'</p>
        <p class="align-self-end"><b>Toilet</b> : '. $room_toilet .' </p>
        <p class="align-self-end"> <b> Publish Date: </b>'. $room_publish_date .'/'.$room_publish_month.'/'.$room_publish_year.'</p>
      </div>
      <div class="col-md-6 col-sm-12 my-2">
      <a href="room_form.php?update_room_id='.$room_id.'" class="btn btn-success">UPDATE REQUEST</a>
      </div>
      <div class="col-md-6 col-sm-12 text-md-end my-2">
      <a href="delete_room.php?delete_id='.$room_id.'" class="btn btn-danger align-self-end"" style="width: fit-content;">DELETE REQUEST</a>
      </div>

    </div>
  </div>
</div>
</div>';}else{
  header("location: login.php");
}
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