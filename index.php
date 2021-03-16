<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <!-- CSS  -->
    <link rel="stylesheet" href="css/index.css">
    <title>FIND MY SHED</title>
  </head>
  <body>

  <!-- INCLUDES -->
  <?php include "partials/header.php"; ?>
  <?php include "partials/dbconnect.php"; ?>

  <!-- ALERTS -->
  <?php
  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == true){
    echo '<div class="alert alert-success">you are signed up successfully</div>';
  }
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == true){
    echo '<div class="alert alert-success">you are logged in successfully</div>';
  }
  ?>

  <!-- HEADING -->
  <div class="container mb-4">
    <div class="text-center">
        <h1 class="my-4 heading">FIND THE ROOM THAT YOU NEED</h1>
    </div>

<!-- MAIN CODE  -->
<?php 
$sql = "SELECT * FROM owner_room ORDER BY room_id asc";
$result = mysqli_query($conn, $sql);
$data = mysqli_num_rows($result);
if($data != 0){
while($row = mysqli_fetch_assoc($result)){
  $room_id = $row['room_id'];
  $room_owner_name = $row['room_owner_name'];
  $room_set = $row['room_set'];
  $room_price = $row['room_price'];
  $room_kitchen = $row['room_kitchen'];
  $room_toilet = $row['room_toilet'];
  $room_address = $row['room_address'];
  $room_village = $row['room_village'];
  $owner_phone_number = $row['owner_phone_number'];
  $room_publish_date_time = $row['room_publish_date'];
  $room_publish_date = substr($room_publish_date_time,8,2);
  $room_publish_month = substr($room_publish_date_time,5,2);
  $room_publish_year = substr($room_publish_date_time,0,4);


echo '
  <div  class="my-2">
    <div class="card mx-auto px-2 shadow room_list_card" style="width: 65vw;">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 ">
            <p class="card-title"><b>'. $room_owner_name .'</b></p>
            <p class="card-text"> <b>Room: </b>'. $room_set .'</p>
            <p class="card-text">  <b>Price: </b>'. $room_price .'</p>
            <p class="card-text">  <b>Address: </b>'. $room_village .'</p>
            </div>
          <div class="col-md-6 mt-3 d-flex flex-column justify-content-end ">
            <div class="">
              <p class=" text-md-end"> <b>Kitchen: </b> '. $room_kitchen .' </p>
              <p class=" text-md-end"> <b>Toilet: </b> '. $room_toilet .' </p>
            </div>
            <div class="">
              <p class="text-md-end"> <b> Publish Date: </b>'. $room_publish_date .'/'.$room_publish_month.'/'.$room_publish_year.'</p>
            </div>
            </div>
            <div class="col-sm-12 mt-3 me-auto">';
            $payment = true;
            if(isset($_SESSION['userloggedin']) && $payment == true){

              echo '<a href="partials/callhandle.php?room_id='.$room_id.'" class="btn btn-primary">Call</a>
                    <a href="partials/whatsapphandle.php?room_id='.$room_id.'" target="_blank" class="btn btn-success my-2">What\'s App</a>';

              // echo '<form method="get" action="../ab.php?id=457821" id="id">
              // <button class="btn btn-primary call_button" value="'.$owner_phone_number.'">Call <input class="call_number" type="hidden" value="'.$owner_phone_number.'"> </button></form>';

              
              //  echo'<a class="btn btn-primary" href="tel:'. $owner_phone_number .'?id=45784512">Call</a>
              //       <a href="https://api.whatsapp.com/send?phone=91'. $owner_phone_number .'" target="_blank" class="btn btn-success my-2">What\'s App</a>';

              //  echo'<a class="call_number">
              //         <button class="btn btn-primary call_button" name="call_button" value="'. $owner_phone_number .'">Call</button>
              //       </a>
              //       <a target="_blank" class="whatsapp_number my-2">
              //         <button class="btn btn-success whatsapp_button" value="'. $owner_phone_number .'">What\'s App</button>
              //       </a>';

            }elseif (isset($_SESSION['userloggedin']) && $payment != true) {
              echo'<a class="btn btn-primary" href="payment/payment.php" target="_blank">Call</a>
            <a class="btn btn-success my-2" href="payment/payment.php" target="_blank">What\'s App</button>
            </a>';
            }else{
              echo '<a href="login.php?loginbeforecall" class="btn btn-primary me-2">Call</a>';
              echo '<a href="login.php?loginbeforewhatsapp" class="btn btn-success my-2">What\'s App</a>';
            }
          echo '</div>
      </div>
    </div>
  </div>
  </div>';
          }
}else{
  echo '
  <div  class="my-5">
    <div class="card mx-auto px-2 shadow room_list_card" style="width: 45vw; height: 45vh;">
      <div class="card-body my-auto text-center">
            <h1 class="text-primary">NO ROOM AVAILABLE</h1>
            <p class="card-title">Sorry | there is no rooms available at that moment. please try after some time. we will working hard to find some great room for you.</p>
          </div>
      </div>
    </div>
  </div>';
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


    <!-- JAVASCRIPT  -->
    <script>

/*for call to owner - and setting href phonenumber dynamically
      var callButton = document.getElementsByClassName("call_button");

      for (let index = 0; index < callButton.length; index++) {
          var button = callButton[index];
          var callTag = document.getElementsByClassName("call_number");
          button.addEventListener('click', (e)=>{
            console.log('click')


          var buttonValue = e.target.value;
          console.log(buttonValue)
          callNumber = buttonValue;
          callButtonIndex = index

          callTag[callButtonIndex].setAttribute("href", "tel:" + callNumber);
          setTimeout(function(){
              callTag[callButtonIndex].removeAttribute("href");
            }, 1000);
          
        

          });

        }





      var whatsappButton = document.getElementsByClassName("whatsapp_button");
      for (let index = 0; index < whatsappButton.length; index++) {
          var button = whatsappButton[index];
            
          var whatsappTag = document.getElementsByClassName("whatsapp_number");
          
          button.addEventListener('click', (e)=>{

          var whatsappNumber = e.target.value;
          whatsappButtonIndex = index
          whatsappTag[whatsappButtonIndex].setAttribute("href", "https://api.whatsapp.com/send?phone=91" + whatsappNumber);
          setTimeout(function(){
              whatsappTag[whatsappButtonIndex].removeAttribute("href");
            }, 1000);

          });

        }
*/

    </script>
  </body>


</html>









