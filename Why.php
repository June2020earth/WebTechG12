<?php 
require_once('config/setting.php');
require_once('config/db.php');
require_once('config/function.php');

//$type=$_SESSION['Type'];

?>

<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<link rel="stylesheet" href="assets\css\style.css">
<link rel="stylesheet" href="assets\css\demo.css">

<!-- Favicons -->
<link href="../../assets/img/favicon.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<style>
  .content1 .more-btn 
  {
    padding: 6px 30px 8px 30px;
    border-radius: 50px;
    transition: all ease-in-out 0.4s;
    font-size: medium;
    background: lightblue;
    color: #1977cc;
  }
  .content1 i
  {
    padding: 0px;
    font-size: 14px;
  }
  .content1 .more-btn:hover {
    color: #1977cc;
  background: whitesmoke;
}
</style>
</head>
<body>
<!--<main id="main">-->
<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
      <div class="container">      
        
        <div class="row">          
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
                <?php
                    $sql= "SELECT * FROM tblwhy ORDER BY tblwhy.`order` ASC";
                    mysqli_select_db($conn, "medilabdb");
                    $result=mysqli_query($conn,$sql);                   
                ?>
                
              <h3><?php //first box
                $row=mysqli_fetch_assoc($result); 
                if (mysqli_num_rows($result) != 0)
                {
                echo $row['header']; 
                ?></h3>
                <p><?php echo $row['content']; ?></p> 
            
            </div>
          </div>
          <?php if (mysqli_num_rows($result) > 1) { ?>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                 <?php 
                   while($row=mysqli_fetch_assoc($result)) {
                     if(mysqli_num_rows($result) >2){
                ?>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <?php }
                  else { ?>
                  <div class="icon-box mt-4 mt-xl-0">
                  <?php } ?>
                    <i class="bx <?php echo $row['icon']; ?>" ></i>
                    <h4><?php
                        echo $row['header']; 
                    ?></h4>
                    <p><?php echo $row['content']; ?></p>                
                  </div>
                </div> 
                <?php   } } ?> 
              </div>
            </div><!-- End .content-->
            
          </div>

          <?php }
          else{ 
          echo "Why Choose Us?"; 
                ?></h3>
                <p><?php echo "We are trusted organization."; ?></p> 

            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt" ></i>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-bar-chart" ></i>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-certification" ></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
        </div>

      </div>
    </section><!-- End Why Us Section -->
<!--</main>-->
</body>
