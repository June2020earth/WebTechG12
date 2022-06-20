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
    if (strcmp($_SESSION['Type'],"A")){//if user type not equal A then return false
      goto2("../../../login.php","Only admin is allowed to enter the page.");
    }
    else{

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
  <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Medilab Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../../assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <style>
  table, th, tr, td{
    border:1px solid black; 
    border-collapse:collapse;
    text-align:center;
  }
  th{
      background-color: #ff1493;
      color:white;
  }
  tr:nth-child(odd){
   background-color: #ffbcd9;    
  }
  tr:nth-child(even){
    background-color: #ff69b4;
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
  .create a{
    display:flex;
    justify-content:center;
  }
  td a{
    color: white;
  }
  a:hover{
    font-size:large;
    color: #665233;
  }
  a:visited{
    color:black;
  }
  a:active{
    font-weight:bold;
  }   
  </style>
</head>

<body class="profile-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../admin.php" style="font-size:x-large;">
          Admin Site </a>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('../../../assets/img/city-profile.jpg');"></div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="heading">
                <h1>View Intro</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="view_content">
        <table >
            <tr>
                <th width="20%">Intro ID</th>
                <th width="20%">Introduction Title</th>
                <th width="20%">Introduction Description</th>
                <th width="20%">Icon</th>
                <th width="10%"></th>
                <th width="10%"></th>
            </tr>
            <?php 
            $sql="select * from `tblintro` order by introID";
            mysqli_select_db($conn, "medilabdb");
            $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
            while($rowcat=mysqli_fetch_assoc($result))
            {?>
            <tr>
                <td><?php echo $rowcat['introID']?></td>
                <td><?php echo $rowcat['introTitle']?></td>
                <td><?php echo $rowcat['introDesc']?></td>
                <td><?php echo $rowcat['introIcon']?></td>
                <td><a href="updateIntro.php?introID=<?php echo $rowcat['introID'] ?>">Update</a></td>
                <td><a href="deleteIntro.php?introID=<?php echo $rowcat['introID'] ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <div class="create">
          <a href="insertIntro.php" style="font-size:large;">Create Intro</a>
        </div>
        <br><br>
        </div>
      </div>
      </div>
    </div>
  </div>
  
  <footer class="footer footer-default">
  </footer>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>
</html>
<?php } }?>

