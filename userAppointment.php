<?php
require_once('config/setting.php');
require_once('config/db.php');
require_once('config/function.php');
require_once("config/session.php");

  $email=$_SESSION['Name'];

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

  <!-- =======================================================
  * Template Name: Medilab - v4.3.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  table, th, tr, td{
    border:1px solid white; 
    border-collapse:collapse;
    text-align:center;
    margin:auto;
    
  }
  table{
    border-radius:15px;
  }
  th{
      background-color:#1977cc;
      color:white;
  }
  tr:nth-child(odd){
    background-color:#E0FFFF;
  }
  tr:nth-child(even){
    background-color:#B0E0E6;
  }
  .view_content{
    text-align:center;
  }
  </style>
</head>
<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Appointment List</h2>
          
        </div>
        <div class="view_content">
        <?php
        $query = "select * from `appointment` WHERE `Email`='".$email."'";
        mysqli_select_db($conn, "medilabdb");
        $result1=mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result1);
        
        if(!isset($row)) {
            echo "<p>No appointments available</p>";
        } else {
          echo "<p>These are the appointments that you have made.</p>";
        ?>
        <table >
            <tr>
                <th width="10%">No.</th>
                <th width="15%">Appointment Date Time</th>
                <th width="15%">Appointment Doctor</th>
                <th width="15%">Department</th>
                <th width="20%">Message</th>
            </tr>
            <?php 
            $sql="select * from `appointment` WHERE `Email`='".$email."'";
            mysqli_select_db($conn, "medilabdb");
            $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
            $num=1;
            while($rowcat=mysqli_fetch_assoc($result))
            {?>
            <tr>
                <td><?php echo $num++; ?></td>
                <td><?php echo $rowcat['appDate']?></td>
                <td><?php echo $rowcat['appDoc']?></td>
                <td><?php 
                $deptAPP=$rowcat['appDept'];
                $deptSQL="SELECT * FROM  `department` WHERE $deptAPP=`ID`";
                mysqli_select_db($conn, "medilabdb");
                $result2=mysqli_query($conn,$deptSQL);
                $row=mysqli_fetch_assoc($result2);
                echo $row['name'];
                ?></td>
                <td><?php echo $rowcat['message']?></td>
            </tr>
            <?php }} ?>
        </table>
        </div>
      </div>
    </section><!-- End Appointment Section -->