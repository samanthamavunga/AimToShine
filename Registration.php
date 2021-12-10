<?php
// start session so that the errors can be available in this file
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aim To Shine</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Syle CSS-->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/inner.css" rel="stylesheet">
  

</head>                                                                         

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">aim.shine@gmail.com</a>
        <i class="bi bi-phone"></i> +233 20924 6382
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Aim To Shine</a></h1>
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <!--nav-->
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
          <li><a class="nav-link scrollto" href="index.php #services">Our Mentorship</a></li>
          <li><a class="nav-link scrollto" href="contact.php">Contact Us</a></li>
        </ul>
      </nav><!-- end.navbar -->

      <a href="Registration.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Register</a>
    </div>
  </header><!-- End Header -->


  <center>
    <main id="main">
      <!--Breadcrumbs-->
      <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Mentee/Parent</h2>
            <ol>
              <li><a href="loginselector.php">Login</a></li>
              <li>Register</li>
            </ol>
          </div>
          <h2 style="color: #3498db">NOTE: Parents can login/Register for their children</h2>
        </div>
      </section> <!--End of Breadcrumps-->

      <!--This message before the form-->
      <h2> Purpose</h2>
      <p> Our program accepts children ages 5-15. They can be enrolled in our community-Based Mentoring Program<br>
                <br> We encourage 100% participation from both parents/guardian and child.<br> This is a wonderful opportunity for a
                child to have an additionalsupport system on one-to-ne or group basis
      </p>

      <!--This is for the inside page that contain the form--->
      <section class="inner-page">
        <div class="container1">
          <p>

            <!-- Registration form with javasript validation before php validation
            -->
            <form id="form" class="form" method="POST" enctype="multipart/form-data" action="./functions/register_user_function.php" onsubmit="return validateForm(event);">
              <h2>Register With Us</h2> 
              <?php
                if(isset($_SESSION["errors"])){
                    $errors = $_SESSION["errors"];
                    // loop through errors and display them
                    foreach($errors as $error){
                        ?>
                            <small style="color: red"><?= $error."<br>"; ?></small>
                        <?php
                    }
                }
                // destroy session after displaying errors
                $_SESSION["errors"] = null;
              ?>
              <p>
                Already have an account? <a href="login.php">Sign in</a>
              </p>

              <div class="form-control" style="color:#3498db">
                <label for="Firstname"><b>Firstname</b></label>
                <input type="text" placeholder="Enter firstname" name="fname" id="fname" required>
                <small id='fnameError'></small>
              </div>
              
              <div class="form-control">
                <label for="Lastname"><b>Lastname</b></label>
                <input type="text" placeholder="Enter Lastname" name="lname" id="lname" required>
                <small id='LastnameError'></small>
              </div>
              
              <div class="form-control">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" id="username" name="uname" required>
                <small id='usernameError'></small>
              </div>

              <div  class="form-control">
              <label for="user_type"><b>Select what relevent to you</b></label>
                <select id="user_type" name="user_type">
                  <option value="--select---">--select---</option>
                  <option value="mentor">Mentor</option>
                  <option value="mentee">Mentee</option>
                  <option value="supervisor">supervisor</option>
                  <small id='selectgenderError'></small>
                </select>
              </div>
                 
              <div  class="form-control">
              <label for="gender"><b>Select your gender</b></label>
                <select id="gd" name="gender">
                  <option value="--select---">--select---</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                  <small id='selectgenderError'></small>
                </select>
              </div>

              <div class="form-control">
                <label for="dob"><b>Date Of Birth</b></label>
                <input type="date" placeholder="Enter date of birth" name="dob" id="dob" required>
                <small id='DOBError'></small>
              </div>

              <div class="form-control">
                <label for="Location"><b>Location</b></label>
                <input type="text" placeholder="Enter Location" name="loc" id="loc" required>
              </div>


              <div class="form-control">
                <label for="phonenumber"><b>Phone Number</b></label>
                <input type="text" placeholder="Enter Phone Numer" name="pnum" id="pnum" required>
                <small id='phonenumberError'></small>
              </div>
              
              <div class="form-control">
                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" id="email" name="email">
                <small id='emailError'></small>
            </div>

              <div class="form-control">
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter password" id="password" name="password" required>
                <small id='passwordError'></small>
              </div>

              <div class="form-control">
                <label for="password2"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Your Password" id="password2" name="password2" required>
                <small id='password2Error'></small>
              </div>

              <small id='success'></small>
              <input type="submit" id='submitBtn' name="register" value="Submit">
            </form>
          </p>
        </div>
      </section>
    </main><!-- End #main -->
  </center>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Aim To Shine</h3>
            <p>
              255B Mutema Close <br>
              St Mary's, Chitungwiza<br>
              Zimbabwe <br><br>
              <strong>Phone:</strong> +263 779380450<br>
              <strong>Email:</strong> aimtoshine@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Get Involved</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Donate</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Our mentorship</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Primary students gromming</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>AimToShine</span></strong>. All Rights Reserved
        </div>
        
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- JS File -->
  <script src="AimToShine_Web/assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>