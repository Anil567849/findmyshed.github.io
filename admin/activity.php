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
    <title>Room Activity</title>
  </head>
  <body style="background-color: #f0f2f5;">

    <?php
        include "partials/dbconnect.php";
        $sql = "SELECT * FROM activity";
        $result = mysqli_query($conn, $sql);


echo '<div class="container mb-5">

        <div class="text-center my-3">
            <h1 class="">
                Activities
            </h1>
        </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Serial No.</th>
                <th scope="col">User Id</th>
                <th scope="col">User Name</th>
                <th scope="col">User P No.</th>
                <th scope="col">Owner Id</th>
                <th scope="col">Owner Name</th>
                <th scope="col">Owner P No.</th>
                <th scope="col">Room Id</th>
                <th scope="col">Method</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>';
        if($result){
            while($activity_data = mysqli_fetch_assoc($result)){
                $sno = $activity_data['s_no'];
                $room_id = $activity_data['room_id'];
                $owner_id = $activity_data['owner_id'];
                $owner_name = $activity_data['owner_name'];
                $owner_phone_number = $activity_data['owner_phone_number'];
                $user_id = $activity_data['user_id'];
                $user_name = $activity_data['user_name'];
                $user_phone_number = $activity_data['user_phone_number'];
                $method = $activity_data['method'];
                $date = $activity_data['date'];

            echo '<tr>
                <td scope="row">'.$sno.'</td>
                <td>'.$user_id.'</td>
                <td>'.$user_name.'</td>
                <td>'.$user_phone_number.'</td>
                <td>'.$owner_id.'</td>
                <td>'.$owner_name.'</td>
                <td>'.$owner_phone_number.'</td>
                <td>'.$room_id.'</td>
                <td>'.$method.'</td>
                <td>'.$date.'</td>
            </tr>';
        }
    }
        echo '</tbody>
    </table>
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


    <!-- JAVASCRIPT  -->
    <script>

  </body>


</html>