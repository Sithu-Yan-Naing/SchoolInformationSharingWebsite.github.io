<?php
include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
  header("Location: welcome.php");
}

if (isset($_POST['submit']))  {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: welcome.php");
  }  else {
    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
  }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- font awesome -->

  <link rel="stylesheet" href="css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">


</head>

<body>
<header>
  
  <!-- banner -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/Slider//slider1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Slider/slider2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Slider/slider3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <!-- navbar -->
  <nav class="navbar">
    <div class="logo"><a href="index.html"><img src="/img/logo.png" alt=""></div></a>

    <ul class="navbar-menu">
      <li><a href="index.html">Home</a></li>
      <li><a href="aboutus.html">About Us</a></li>
      <li class="dropdown">
        <a href="course.html">Courses</a>
        <ul class="dropdown-menu">
          <li><a href="primary.html">Primary</a></li>
          <li><a href="secondary.html">Secondary</a></li>
          <li><a href="summer.html">Summer Programmes</a></li>
        </ul>
      </li>
      <li><a href="activity.html">Activities</a></li>
      <li><a href="contact.html">Contact Us</a></li>
      <li><a href="login.php">login</a></li>
      <li><a href="signup.php">Sign Up</a></li>

    </ul>

  </nav>
</header>

    <div class="container-login">
        
        
        <form action="" method="POST" class="login-email">
            <p class="login-text">Log In</p>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>


    
        <!-- footer -->
        <footer>

          <div class="footer row-cols-1 row-cols-sm-2 row-cols-md-5 bg">
            <div class="col">
        
              <img src="img/logo.png" alt="">
        
            </div>
            <div class="col">
        
              <!-- 2 -->
        
              <h5 align="center">Contact Information</h5>
              <span>
               Address : No ( 3 ), Chan Mya Yate Mon Street, Bahan Township, Yangon, Myanmar.
  Phone	: +95 9742110221, 01 211 4321
  Mail	: info@educaremm.com
  
                <br>
                
                Email: example@gmail.com
                <br>
                <br>
                <br>
                Phone: +00 112323980
                <br>
                <br>
                <br>
        
              </span>
        
            </div>
        
            <div class="col">
        
              <!-- 3 -->
        
        
              <span>Newsletter
                <br>
                
                  <div class="container-fluid">
                    <form class="d-flex">
        
                      <!-- 4 -->
        
                      <input class="form-control me-2" type="search" placeholder="Enter Your Email">
        
                      <button class="btn btn-outline-success rounded-pill" type="submit">Submit</button>
                    </form>
                  </div>
                
              </span>
        
            </div>
        
          </div>
          </div>
        
        </footer>
    <script src="js/bootstrap.min.js"></script>


</body>


</html>