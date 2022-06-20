<?php
require_once('../../setting.php'); 
require_once('../../db.php');
require_once('../../function.php');
require_once('../../session.php');

if (!(isset($_SESSION['Type']))) {
  goto2("../../../login.php","Only admin is allowed to enter the page");
}
//if user type not found then go login page.
else
{
  //$_SESSION['Type']=="A"
  if (strcmp($_SESSION['Type'],"A")){//if user type not equal A then return false

  goto2("../../../index.php","Only admin is allowed to enter the page.");}

else{
if (!empty(isset($_POST['app-submit']))) {
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $date=$_POST['date'];
    $department=$_POST['department'];
    if($department=="Department 1"){
        $department=1;
    }else if($department=="Department 2"){
      $department=2;
    }else if($department=="Department 3"){
      $department=3;
    }else{
      $department=substr($department,-1);
    }
    $doctor=$_POST['doctor'];
    if($doctor=="Doctor 1"){
      $doctor=1;
    }else if($doctor=="Doctor 2"){
      $doctor=2;
    }else if($doctor=="Doctor 3"){
      $doctor=3;
    }
    $message=$_POST['message'];
    
    $appDBquery = "SELECT appID FROM appointment ORDER BY appID DESC LIMIT 1" ;
    mysqli_select_db($conn,"medilabdb"); 
    $result=mysqli_query($conn,$appDBquery); 
    $row=mysqli_fetch_array($result);
    $id=$row['appID'];
    $lastChar = substr($id, -1);
    $last2Char = substr($id, -2);
    $lastIDint=(int)$lastChar;
    $idInt=(int)$last2Char;
    if($idInt<10){
      $lastIDint++;
      $newID="P0".$lastIDint;
    }else{
      $idInt++;
      $newID="P".$idInt;
    }


    $sql ="INSERT INTO `appointment` (`appID`, `userName`, `Email`, `phone`, `appDate`, `appDoc`, `appDept`, `message`) 
    VALUES ('".$newID."','".$name."','".$email."','".$phone."','".$date."', '".$doctor."', '".$department."', '".$message."')";  // sql command
    mysqli_select_db($conn,"medilabdb"); ///select database as default
    $result1=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
    
    if(!$result1){
      echo $department;
      echo "Error: $conn->error";
    }else{
      goto2("viewAppointment.php", "Appointment is successfully made");
    }
  //APPOINTMENT END
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../../assets/img/favicon.png" rel="icon">
  <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.3.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg">
      <div class="container">
          <a class="navbar-brand " href="../admin.php">
          Admin Site </a>
        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Complete the following details in order to create a new appointment.</p>
        </div>
<!--action="forms/appointment.php" role="form" -->
        <form  method="post" class="php-email-form">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
          <?php


          ?>
            <div class="col-md-4 form-group mt-3">
              <input type="datetime-local" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select">
                <option value="">Select Department</option>
              <?php 
                  $sql= "SELECT * FROM department ";
                  mysqli_select_db($conn, "medilabdb");
                  $result=mysqli_query($conn,$sql); 
                  while($row=mysqli_fetch_assoc($result)) { 
              ?>
                <option value="<?php echo "Department ".$row['ID'] ?>"><?php echo $row['name'] ?></option>
                
              <?php
                  }
              ?>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select">
                <option value="">Select Doctor</option>
                <option value="Doctor 1">Doctor 1</option>
                <option value="Doctor 2">Doctor 2</option>
                <option value="Doctor 3">Doctor 3</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit" name="app-submit">Make an Appointment</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->
    
    <?php }} ?>
