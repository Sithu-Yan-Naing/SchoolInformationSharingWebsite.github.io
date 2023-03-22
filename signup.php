<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
  header("Location: login.php");
}


if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);


  if ($password == $cpassword) {
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO users (username, email, password)
    
            VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
             echo "<script>alert('Wow! User Registration Successfully Completed.')</script>";  
             $username = "";
             $email = "";
             $_POST['password'] = "";
             $_POST['cpassword'] = "";
      } else {
        echo "<script>alert('Woops! Something Went Wrong.')</script>"; 
         
      }
    } else {
            
      echo "<script>alert('Woops! Email Already Exists.')</script>";
    }


    

  } else {
    echo "<script>alert('Password not Matched.')</script>";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
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
            <p class="login-text">Sign Up with Email</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Sign Up</button>
            </div>
            <p class="login-register-text">Have an account? <a href="login.html">Login Here</a></p>
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