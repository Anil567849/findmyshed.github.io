
  
  <?php
    session_start();
  
  echo '<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">FINDMYSHED.COM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-end" id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link mx-2" href="index.php">Home</a>
        </li>
      </ul>
      <div class="me-auto d-flex"></div>
      <ul class="navbar-nav">
        <div class="d-flex justify-content-end">';

        if(isset($_SESSION['userloggedin']) && $_SESSION['userloggedin'] == true){
          $userEmail = $_SESSION['useremail'];
        echo '<li class="nav-item"><span class="text-white">'. $userEmail .'</span>
                 <a class="btn btn-primary mx-2 text-end" href="logout.php">Log Out</a>
              </li>';
        }
        else{
          echo'<li class="nav-item">
            <a class="btn btn-primary mx-2" href="signup.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary mx-2" href="login.php">Log In</a>
          </li>';
        }
         echo' </div>
    </div>
  </div>
</nav>';

?>