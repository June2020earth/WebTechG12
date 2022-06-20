
<?php require_once('../setting.php'); 
require_once('../db.php');
require_once('../function.php');
require_once('../session.php');

if (!(isset($_SESSION['Type']))) {
  goto2("../../login.php","Please login first");
}
//if user type not found then go login page.
elseif (strcmp($_SESSION['Type'],"A")){//if user type not equal A then return false
   
  goto2("../../index.php","Only admin is allowed to enter the page.");}

else{
 
  

$user=$_SESSION['Name'];
$sql ="SELECT * FROM `user` WHERE `Email`='".$user."'";  // sql command
mysqli_select_db($conn,"medilabdb"); ///select database as default
$result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
$row=mysqli_fetch_assoc($result); 
?>

<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Medilab Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
 
  <style>
    table{
      margin:auto;
    }
    th{
      text-align:center;
      padding-top:10px;
      padding-bottom:10px;  
    }
    button{
      
      background-color:#01786F;
      color:white;
      border-color:white;
      border-radius:1em;
      width:100%;
      padding:5px;
      margin-top:10px;
    }
    
    
    a:hover{
      font-size:large;
      color:#FFF700;
    }
    button:hover{
      font-size:large;
      background-color:	#0095B7;
    }
    .navbar .navbar-translate {
    width: 100%;
    
    display: flex;
    -ms-flex-pack: justify !important;
    justify-content: flex-start !important;
    -ms-flex-align: center;
    align-items: center;
    -webkit-transition: transform 0.5s cubic-bezier(0.685, 0.0473, 0.346, 1);
    -moz-transition: transform 0.5s cubic-bezier(0.685, 0.0473, 0.346, 1);
    -o-transition: transform 0.5s cubic-bezier(0.685, 0.0473, 0.346, 1);
    -ms-transition: transform 0.5s cubic-bezier(0.685, 0.0473, 0.346, 1);
    transition: transform 0.5s cubic-bezier(0.685, 0.0473, 0.346, 1);
  }
    

  </style>
  
</head>

<body class="profile-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate" style="display: flex; justify-content:flex-start;">
        <p style="font-size:x-large;" class="navbar-brand" >Admin Site </p>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../../assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="Profile/profile<?php echo $row['ID']; ?>.png" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title"><?php echo $row['Name']?></h3>
                <h6><?php echo $row['ID']?></h6>
                <a href="uploadProfile.php?ID=<?php echo $row['ID']; ?>">Edit Profile </a>
                <hr>
                
              </div>
            </div>
          </div>
        </div>
        
        <div class="admin-menu">
        <table>
        <tr><th><a href="intro/viewintro.php">View Intro </a></th> </tr>
        <tr><th><a href="user/viewuser.php">View Users </a></th></tr>
        <tr><th><a href="department/viewdepartment.php">View Department </a></th> </tr>
        <tr><th><a href="contact/viewcontact.php">View Contact </a></th> </tr>
        <tr><th><a href="appointment/viewappointment.php">View Appointment </a></th> </tr>
        <tr><th><a href="why/viewwhy.php">View Why Medilab </a></th> </tr>
        <tr><th><a href="Service/viewService.php">View Service </a></th> </tr>
        <tr><th><button onclick="document.location='../../logout.php'">Log Out</button></th></tr>
        </table>
        
        
        <br>
      </div>  
      </div>

      </div>
    </div>
  </div>
  <footer class="footer footer-default">
  
  </footer>
  <!--   Core JS Files   -->
  <script src="../../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../../assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>
<?php } ?>
