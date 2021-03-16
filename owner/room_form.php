
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- CSS  -->
    <link rel="stylesheet" href="css/room_form.css">
    <title>ROOM FORM</title>
  </head>
  <body>

  <!-- INCLUDES  -->
  <?php include "partials/header.php"; ?>
  
  <!-- ALERTS -->
  <?php
    if(isset($_GET['room_form_submitted'])){
      echo '<div class="alert alert-success">Your Room Have Been Submitted Successfully</div>';
    }

  if(isset($_GET['loginsuccess'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           dear owner | you are logged in successfully
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
  }

  if(isset($_GET['signupsuccess'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           dear owner | you are signed up successfully
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>';
  }
  ?>



   <!-- MAIN CODES  -->
<div class="container form-container">
<?php
ob_start();
    if(isset($_GET['update_room_id'])){


      include "partials/dbconnect.php";


      $room_id = $_GET['update_room_id'];

      $sql = "SELECT * FROM owner_room WHERE room_id = '$room_id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $owner_name = $row['room_owner_name'];
      $room_set = $row['room_set'];
      $room_price = $row['room_price'];
      $room_address = $row['room_address'];
      $room_village = $row['room_village'];
      $room_kitchen = $row['room_kitchen'];
      $room_toilet = $row['room_toilet'];
      $owner_phone_number = $row['owner_phone_number'];

  echo '
  <div class="text-center mt-4">
    <h1>UPDATE ROOM DELTAILS</h1>
  </div>
  
  
  <form action="" method="POST">
  <div class="form-group ">
    <label for="room_owner_name"><b>Owner Name</b></label>
    <input required type="text" class="form-control" id="room_owner_name" name="update_room_owner_name" value="'.$owner_name.'" placeholder="Enter Owner\'s Namesss">
  </div>

  <div class="form-group mt-4">
    <label for="room_set" ><b>Room</b></label>&emsp;&emsp;
    <select name="update_room_set" id="room_set" value="double">
      <option value="single">Single</option>
      <option value="double">Double</option>
      <option value="thriple">Thirple</option>
      <option value="four">Four</option>
    </select>
  </div>

  

  <div class="form-group mt-4">
    <label for="room_kitchen"><b>kitchen</b></label>&emsp;
    <input required type="radio" name="update_room_kitchen" value="yes" checked>Yes &emsp; </span>
    <input required type="radio" name="update_room_kitchen" value="no">No
  </div>
  

  <div class="form-group mt-4">
    <label for="room_toilet"><b>Toilet</b></label>&emsp;&emsp;
    <select name="update_room_toilet" id="update_room_toilet" value="outside">
      <option value="inside">Inside</option>
      <option value="outside">Outside</option>
    </select>
  </div>

  <div class="form-group mt-4">
    <label for="room_price"><b>Price</b></label>
    <input required type="number" class="form-control" id="room_price" name="update_room_price" minlength="3" maxlength="4" value="'.$room_price.'" placeholder="Enter Your Room Price">
  </div>
  
  <div class="form-group mt-4">
    <label for="owner_phone_number"><b>Phone Number</b></label>
    <input required type="number" class="form-control" id="owner_phone_number" name="update_owner_phone_number" minlength="10" maxlength="10" value="'.$owner_phone_number.'" placeholder="Enter Your Phone Number">
  </div>

  <div class="form-group mt-4">
    <label for="room_address"><b>Address</b></label>
    <input required type="text" class="form-control" id="room_address" name="update_room_address" value="'.$room_address.'" placeholder="Enter Your Room Address">
  </div>

  <div class="form-group mt-4">
    <label for="room_address_village"><b>Village</b></label>
    <input type="text" class="form-control" id="room_address_village" name="update_room_address_village" value="'.$room_village.'" placeholder="Enter Your Room Village" required>
  </div>

  <div class="form-group d-grid">
  <button type="submit" name="update_room" class="btn btn-primary mb-5 py-2">Update</button>
  </div>

</form>';


if($_SERVER["REQUEST_METHOD"] == 'POST'){
  if(isset($_POST['update_room'])){
  include "partials/dbconnect.php";

  $update_room_owner_name = $_POST["update_room_owner_name"];
  $update_room_set = $_POST["update_room_set"];
  $update_room_kitchen = $_POST["update_room_kitchen"];
  $update_room_toilet = $_POST["update_room_toilet"];
  $update_room_price = $_POST["update_room_price"];
  $update_room_address = $_POST["update_room_address"];
  $update_room_village = $_POST["update_room_address_village"];
  $update_owner_phone_number = $_POST["update_owner_phone_number"];

  $update_room_id = $_GET['update_room_id'];



      //koi hack na kre isliye hmne tag wale button ko replace kr diya taki javascript code na likh paye.
      $update_room_owner_name = str_replace("<", "&lt;", $update_room_owner_name);
      $update_room_owner_name = str_replace(">", "&gt;", $update_room_owner_name);

      $update_room_address = str_replace("<", "&lt;", $update_room_address);
      $update_room_address = str_replace(">", "&gt;", $update_room_address);

      $update_room_village = str_replace("<", "&lt;", $update_room_village);
      $update_room_village = str_replace(">", "&gt;", $update_room_village);

  $sql = "UPDATE owner_room SET room_owner_name='$update_room_owner_name', room_set='$update_room_set', room_price='$update_room_price', room_kitchen='$update_room_kitchen', room_toilet='$update_room_toilet', room_address='$update_room_address', room_village='$update_room_village', owner_phone_number='$update_owner_phone_number' WHERE room_id='$update_room_id'";
  $request = mysqli_query($conn, $sql);
  if($result){
      header("location: manage_room.php?roomformupdatedsuccessfully");
    }  
  }
}

}else{

if(isset($_SESSION['ownerloggedin']) && $_SESSION['ownerloggedin'] == true){
echo '<div class="text-center mt-4">
  <h1>ROOM DETAILS</h1>
</div>

<form action="" method="POST" class="">
  <div class="form-group ">
    <label for="room_owner_name"><b>Owner Name</b></label>
    <input required type="text" class="form-control" id="room_owner_name" name="room_owner_name" placeholder="Enter Owner\'s Name">
  </div>


  <div class="form-group mt-4">
    <label for="room_set" ><b>Room</b></label>&emsp;&emsp;
    <select name="room_set" id="room_set">
      <option value="single" selected>Single</option>
      <option value="double">Double</option>
      <option value="thriple">Thirple</option>
      <option value="four">Four</option>
    </select>
  </div>

  

  <div class="form-group mt-4">
    <label for="room_kitchen"><b>kitchen</b></label>&emsp;
    <input required type="radio" name="room_kitchen" value="yes" checked>Yes &emsp; </span>
    <input required type="radio" name="room_kitchen" value="no">No
  </div>
  

  <div class="form-group mt-4">
    <label for="room_toilet"><b>Toilet</b></label>&emsp;&emsp;
    <select name="room_toilet" id="room_toilet">
      <option value="inside" selected>Inside</option>
      <option value="outside">Outside</option>
    </select>
  </div>

  <div class="form-group mt-4">
    <label for="room_price"><b>Price</b></label>
    <input required type="number" class="form-control" id="room_price" name="room_price" placeholder="Enter Your Room Price">
  </div>
  
  <div class="form-group mt-4">
    <label for="owner_phone_number"><b>Phone Number</b></label>
    <input required type="number" class="form-control" id="owner_phone_number" name="owner_phone_number" placeholder="Enter Your Phone Number">
  </div>

  <div class="form-group mt-4">
    <label for="room_address"><b>Address</b></label>
    <input required type="text" class="form-control" id="room_address" name="room_address" placeholder="Enter Your Room Address">
  </div>

  <div class="form-group mt-4">
    <label for="room_address_village"><b>Village</b></label>
    <input required type="text" class="form-control" id="room_address_village" name="room_address_village" placeholder="Enter Your Room Village">
  </div>

  <div class="form-group d-grid">
  
  <button type="submit" href="room_form.php?room_form_submitted=true" name="room_form_submitted" class="btn btn-primary mb-5 py-2">Submit</button>
  </div>

</form>';
  }else{
    header("location: login.php");
  }
}

?>






<?php 

if($_SERVER["REQUEST_METHOD"] == 'POST'){
  if(isset($_POST['room_form_submitted'])){
  include "partials/dbconnect.php";

  $room_owner_name = $_POST["room_owner_name"];
  $room_set = $_POST["room_set"];
  $room_kitchen = $_POST["room_kitchen"];
  $room_toilet = $_POST["room_toilet"];
  $room_price = $_POST["room_price"];
  $room_address = $_POST["room_address"];
  $room_village = $_POST["room_address_village"];
  $owner_phone_number = $_POST["owner_phone_number"];



  $room_owner_name = str_replace("<", "&lt;", $room_owner_name);
  $room_owner_name = str_replace(">", "&gt;", $room_owner_name);

  $room_address = str_replace("<", "&lt;", $room_address);
  $room_address = str_replace(">", "&gt;", $room_address);

  $room_village = str_replace("<", "&lt;", $room_village);
  $room_village = str_replace(">", "&gt;", $room_village);


  $owner_email = $_SESSION['owneremail'];

  $sql = "SELECT * FROM owner_signup WHERE owner_email_address = '$owner_email'";
  $result = mysqli_query($conn, $sql);
  if($result){
  $row = mysqli_fetch_assoc($result);
  $owner_id = $row['owner_id'];
  }else{
      echo 'sorry';
  }


  $sql1 = "INSERT INTO owner_room (`owner_id` ,`room_owner_name` ,`room_set`, `room_price`, `room_address`, `room_village`, `room_kitchen`, `room_toilet`, `owner_phone_number`) VALUES ('$owner_id', '$room_owner_name','$room_set', '$room_price', '$room_address', '$room_village', '$room_kitchen', '$room_toilet', '$owner_phone_number')";
  $result = mysqli_query($conn, $sql1);


  if($result){
    header("location: manage_room.php");
  }
  } 
}

ob_end_flush();

?>


</div><!-- form div end -->






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


