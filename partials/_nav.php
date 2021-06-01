<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin = true;
}
else{
    $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        
      </ul>
      <div class="d-flex">
      ';
      if(!$loggedin){
        echo '<a href="login.php"><button class="btn btn-outline-success" style="margin-right:5px;">LogIn</button> </a>
        <a href="signup.php"><button class="btn btn-success">SignUp</button></a>';}
      if($loggedin){
        echo '<a href="logout.php"><button class="btn btn-danger">Log Out</button> </a>';}
      echo '</div>
    </div>
  </div>
</nav>';

?>