<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css">
  <title>SOTAR</title>
</head>

<body>
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">Sotar</a>
    <span class="navbar-text">Sotar Online Service Management System</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>


        <li class="nav-item"><a href="Admin/login.php" class="btn btn-primary ml-5 nav-link">Admin Login</a></li>
      </ul>
    </div>
  </nav>
  <!-- End Navigation -->


  <!-- Start Header Jumbotron-->
  <header class="jumbotron mt-5" style="background-image:url(images/excavator.jpg); width:100%; height:90vh; background-position:center; background-size:cover;">
    <div class="myclass mainHeading">
      <h1 class="text-uppercase font-weight-bold">Welcome to Sotar</h1>
      <p class="font-italic">Customer's Happiness is our Aim</p>
      <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
      <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
  </header> <!--End Header Jumbotron

  <div class="container">
    <!--Introduction Section-->
    <div class="jumbotron">
      <h3 class="text-center">Sotar Services</h3>
      <p>
        Customers will find sotar to be an invaluable partner in their projects due to its unique blend of offerings. Not only does sotar provide heavy machinery rentals, but it also specializesin the rentals of caterpillar engines,ensuring a powerful and reliable energy source for various applications. What sets sotar apart is its holistic approach- not only can customers access top-notch machinery. but the company also goes thhe extra mile by offering comprehensive maintenance services. This means that customers can focus on their tasks with peace of mind, knowing that the equipment they rely on will be in prime condition through their rental period. Sotar's commitmment to quality, performance, and customer satisfaction makes it the go-to choice for those seeking a seamless and efficient heavy machinery rental experience                                                                                                                      
      </p>

    </div>
  </div>
  <!--Introduction Section End-->
  <!-- Start Services -->
  <div class="container text-center border-bottom" id="Services">
    <h2>Our services</h2>
    <div class="row mt-4">
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
        <h4 class="mt-4">Fault repair</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-truck fa-8x text-info"></i></a>
        <h4 class="mt-4">Truck maintenance</h4>
      </div>
      <div class="col-sm-4 mb-4">
        <a href="#"><i class="fas fa-hard-hat fa-8x text-info"></i></a>
        <h4 class="mt-4">Btp construction</h4>
      </div>
    </div>
  </div>
  </div> <!-- End Services -->

  <!-- Start Registration  -->
  <?php include('UserRegistration.php'); ?>
  <!-- End Registration  -->

  <!-- Start Happy Customer  -->
  <div class="jumbotron bg-danger" id="Customer">
    <!-- Start Happy Customer Jumbotron -->
    <div class="container">
      <!-- Start Customer Container -->
      <h2 class="text-center text-white"> Companies we worked with</h2>
      <div class="row mt-5">
        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 1st Column-->
          <div class="card shadow-lg mb-2" style="min-height:380px;">
            <div class="card-body text-center">
              <img src="images/CIMENCAM.PNG" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">CIMENCAM</h4>
              <p class="card-text">CIMENCAM S.A. is a building materials company based out of Douala, Littoral, Cameroon.</p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6" >
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2" style="min-height:380px;">
            <div class="card-body text-center">
              <img src="images/SOGEA SATOM.PNG" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">SOGEA SATOM</h4>
              <p class="card-text">SOGEA SATOM is a company with more than 12000 COllaborators and more than 100 work order in the process.</p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2" style="min-height:300px;">
            <div class="card-body text-center">
              <img src="images/ALUCAM.jpg" class="img-fluid" style="border-radius: 100px; width:200px;">
              <h4 class="card-title">ALUCAM</h4>
              <p class="card-text">ALUCAM is an industrial establishement that works in the production and transformation of aluminium.</p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2" style="min-height:300px;">
            <div class="card-body text-center">
              <img src="images/RAZEL.png" class="img-fluid" style="border-radius: 100px;">
              <h4 class="card-title">RAZEL</h4>
              <p class="card-text">RAZEL is a French company founded by Emile Razel in 1880 specialized in civil engineering.</p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->
      </div> <!-- End Customer Row-->
    </div> <!-- End Customer Container -->
  </div> <!-- End Customer Jumbotron -->

  <!--Start Contact Us-->
  <div class="container" id="Contact">
    <!--Start Contact Us Container-->
    <h2 class="text-center mb-4">Contact US</h2> <!-- Contact Us Heading -->
    <div class="row">

      <!--Start Contact Us Row-->
      <?php include('contactform.php'); ?>
      <!-- End Contact Us 1st Column -->

      <div class="col-md-6 text-center">
        <!-- Start Contact Us 2nd Column-->
        <strong>Headquarter:</stong><br>
       SOTAR pvt SARL,<br>
       Bonaberi,Douala<br>
       BP- 1194<br>
       Phone number: +237 678644060<br>
       <a href="#" target="_blank">info@sotarsarl.com</a><br>

        
      </div> <!-- End Contact Us 2nd Column-->
    </div> <!-- End Contact Us Row-->
  </div> <!-- End Contact Us Container-->
  <!-- End Contact Us -->

  <!-- Start Footer-->
  <footer class="container-fluid bg-dark text-white mt-5" style="border-top: 3px solid #DC3545;">
    <div class="container">
      <!-- Start Footer Container -->
      <div class="row py-3">
        <!-- Start Footer Row -->
        <div class="col-md-6">
          <!-- Start Footer 1st Column -->
          <span class="pr-2">Follow Us: </span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        </div> <!-- End Footer 1st Column -->

        <div class="col-md-6 text-right">
          <!-- Start Footer 2nd Column -->
          <small> Ndongo_kris &copy; 2024.
          </small>
        </div> <!-- End Footer 2nd Column -->
      </div> <!-- End Footer Row -->
    </div> <!-- End Footer Container -->
  </footer> <!-- End Footer -->

  <!-- Boostrap JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>

</html>
