
  <?php 
  session_start();
  
  echo '<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="room_form.php">FINDMYSHED.COM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">';
    
    if(isset($_SESSION['ownerloggedin']) && $_SESSION['ownerloggedin'] == true){
      echo '<ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-end" href="room_form.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-end" href="manage_room.php">Manage</a>
        </li>
      </ul>';
    }
      echo '<div class="me-auto d-flex"></div>
      <ul class="navbar-nav">
        <div class="d-flex  justify-content-end">
          <li class="nav-item">';

          if(isset($_SESSION['ownerloggedin']) && $_SESSION['ownerloggedin'] == true){
            $ownerEmail = $_SESSION['owneremail'];
          echo '<li class="nav-item"><span class="text-white">'. $ownerEmail .'</span>
                  <a class="btn btn-primary mx-2" href="logout.php">Log Out</a>
                </li>';
          }else{
            echo '<a class="btn btn-primary mx-2" href="signup.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary mx-2" href="login.php">Log In</a>
          </li>';
          }
         echo'</div>
      </ul>
    </div>
  </div>
</nav>';

?>