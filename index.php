<!DOCTYPE html>
<html lang="en">
<?php include("config/function.php"); 
require_once("config/session.php");

if(!isset($_SESSION['Name'])){ //if login in session is not set
  header("Location: login.php");
}
else{

}
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
  .container d-flex align-items-center{
    display:flex;
    justify-content:space-between;
    align-content:center;
  }
  #navii{
    margin-top:-20px;
  }
  #app{
    margin-top:-20px;
  
  }
  #logout{
    margin-top:-20px; 
    margin-left:30px;

  }
  #up{
     margin-top:-3px;
    }
  
  
  
  @media (max-width: 767px){
    #search{
      width:100px;
    }
    ::placeholder{
      font-size:small;
    }
    .appointment-btn{
      font-size:small;
      width:80px;
    }
    #app{
      width:105px;
      margin-left:-12px;
    }
    #logout{
      width:20px;
      margin-left:-10px;
    }
  }
  </style>

  <!-- =======================================================
  * Template Name: Medilab - v4.3.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        Contact us at &nbsp;
        <i class="bi bi-envelope"></i> <a href="mailto:medilab@gmail.com">medilab@gmail.com</a>
        <i class="bi bi-phone"></i> +603-3245646
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>
  <?php
    if (isset($_POST['submitSearch'])){
      $searchq = "#".$_POST['search'];
      goto3($searchq);
    }
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Medilab</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0" >
      <form name="searchForm" method=post id="navii">
        <input type="text" name="search" placeholder="Search for a section" id="search" ></input>
        <input type="submit" name="submitSearch" value="Search" class="appointment-btn" style="border: none; "></input>
        </form>
        <a href="#appointment" class="appointment-btn scrollto" id="app" style="color:white; padding:5px; "><span class="d-none d-md-inline">Make an</span> &nbsp;Appointment</a>
        <a href="logout.php"><img src="assets/img/logout.png" id="logout" width="30px" ></a>
      </nav><!-- .navbar -->
      
      

    </div>
    
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" id="Team">
      <h1>Welcome to Medilab</h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
    
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
        <?php include("Why.php");?>
     <!-- End Why Us Section -->

    <!-- ======= Intro Section ======= -->
    <section id="about" class="about">
    <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://youtu.be/eXisi5NLTYA" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Introduction to Medilab</h3>
            <p>Honesty, safety, protection, and innovation are the top drivers of our customer-oriented services. We aim to make healthy living a reality. With continued education regarding health issues, testing and development, we are always contributing towards a better healthcare system.</p>

          <?php
            $sql="SELECT * FROM tblintro ORDER BY introID";
            mysqli_select_db($conn,"medilabdb");
            $result=mysqli_query($conn,$sql);
            $i=0;
            while($rows=mysqli_fetch_assoc($result))
            {
            $i++;
          ?>
            <div class="icon-box">
              <div class="icon"><i class="bx <?php echo $rows['introIcon'];?>"></i></div>
              <h4 class="title" id="up"><a href=""><?php echo $rows['introTitle']?></a></h4>
              <p class="description" id="up"><?php echo $rows['introDesc']?></p>
            </div>
          <?php } ?>
          </div>
        </div>
     </div>
    </section><!-- End Intro Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" >

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1" class="purecounter"></span>
              <p>Doctors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1" class="purecounter"></span>
              <p>Departments</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
              <p>Research Labs</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p>Awards</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <?php include("service.php");?>
    </section><!-- End Services Section -->

    <!-- ======= Appointment Section ======= -->
   <?php include("appointment.php");?>
   <?php include("userAppointment.php");?>
    <!-- End Appointment Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Departments</h2>
        </div>


        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <?php
              $sql="SELECT * FROM department";
              mysqli_select_db($conn,$dbname);
              $result=mysqli_query($conn,$sql);
              $i=0;
              while($rowcat=mysqli_fetch_assoc($result))
              {
              $i++;
              ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?tab=<?php echo $i?>"><?php echo $rowcat['name']?></a>
              </li>
              <?php } ?>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <?php
              $sql="SELECT * FROM department";
              mysqli_select_db($conn,$dbname);
              $result=mysqli_query($conn,$sql);
              $i=0;
              while($rowcat=mysqli_fetch_assoc($result)){?>
              <?php $i++;?>
              <?php
              if(isset($_GET['tab'])&&$_GET['tab']!=1)
              { 
                if($_GET['tab']==$i)
                { ?>
                <div class="tab-pane active" id="tab-<?php echo $i;?>">
                <?php } else { ?>
                  <div class="tab-pane" id="tab-<?php echo $i;?>">
                  <?php } ?>
              <?php } else {
                if($i==1)
                { ?>
                <div class="tab-pane active" id="tab-<?php echo $i;?>">
                <?php } else { ?>
                  <div class="tab-pane" id="tab-<?php echo $i;?>">
                  <?php } ?>
              <?php } ?>




                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3><?php echo $rowcat['name']?></h3>
                    <p class="fst-italic"><?php echo $rowcat['MainDescription']?></p>
                    <p><?php echo $rowcat['SecondDescription']?></p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

  <section id="contact" class="contact">
  <?php include('contact.php');?>
  </section>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
