
<?php
    if(isset($_GET['room_id'])){
        $activity_room_id = $_GET['room_id'];
        // echo 'yes id is ' . $activity_room_id;
        session_start();
        include "dbconnect.php";
        $activity_user_email = $_SESSION['useremail'];
        // echo $activity_user_email;

        $sql = "SELECT * FROM user_signup WHERE user_email_address = '$activity_user_email'";
        $result = mysqli_query($conn, $sql);
        if($result){
          // echo 'yes';
          while($activity_user_data = mysqli_fetch_assoc($result)){
      
            $activity_user_id = $activity_user_data['user_id'];
            $activity_user_name = $activity_user_data['user_name'];
            $activity_user_number = $activity_user_data['user_phone_number'];
          //   $activity_room_id = $_POST['room_id'];
          } 
            $method = "Call";
        
            $sql = "SELECT * FROM owner_room WHERE room_id = '$activity_room_id'";
            $result = mysqli_query($conn, $sql);
            while($activity_owner_data = mysqli_fetch_assoc($result)){
              $activity_owner_id = $activity_owner_data['owner_id'];
              $activity_room_owner_name = $activity_owner_data['room_owner_name'];
              $activity_room_set = $activity_owner_data['room_set'];
              $activity_owner_phone_number = $activity_owner_data['owner_phone_number'];
            }
            echo '<input type="hidden" id="phone_number" value="'. $activity_owner_phone_number .'">'; 
        
            // echo "$activity_user_email + $activity_user_id + $activity_owner_phone_number + $method + $activity_room_id + owner + $activity_room_owner_name + $activity_room_set + $activity_owner_phone_number";
            $sql = "INSERT INTO activity (`room_id`, `owner_id`, `owner_name`, `owner_phone_number`, `user_id`, `user_name`, `user_phone_number`, `method`) VALUES ('$activity_room_id', '$activity_owner_id', '$activity_room_owner_name', '$activity_owner_phone_number', '$activity_user_id', '$activity_user_name', '$activity_user_number', '$method');";
            $result = mysqli_query($conn, $sql);
          
        }else{
          echo 'no';
        }
 
      }else{
        echo 'no';
    }
?>
<script>

      var phoneNumber = document.getElementById('phone_number').value;
    // setTimeout(() => {
        document.location.href = 'tel:'+phoneNumber;
        // document.getElementById('id').submit();
        // document.write("ok")
    // }, 100);
    setTimeout(() => {
        window.location.href = "../index.php";
    }, 100);
</script>