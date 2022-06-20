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
        if (isset($_POST['introTitle'])){
                $id=$_POST['introID'];
                $title=$_POST['introTitle'];
                $desc=$_POST['introDesc'];
                $icon=$_POST['introIcon'];
                $sql ="INSERT INTO `tblintro` (`introID`,`introTitle`,`introDesc`,`introIcon`) 
                VALUES ('".$id."', '".$title."', '".$desc."','".$icon."')"; // sql command
                mysqli_select_db($conn,"medilabdb"); ///select database as default
                $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
                goto2("viewIntro.php","Intro is successfully inserted");
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
  .insert_content{
    display:flex;
    justify-content:center;
  }
  table,tr, th, td{
    padding:10px;
  }
  th{
    color:	#652DC1;
  }
  table{
    min-width:450px;
  }
  @media (min-width: 1200px) {
    .container {
      max-width: 2140px;
    } 
  }
  .save{
    margin-left:200px;
  }
  input[type=submit]{
    background-color:	#8FD400;
    border:lightgrey;
    border-radius:0.2em;
    width:80px;
    padding:5px;
    color:white;
    cursor: pointer;
  }
  label{
    color:		#2E5894;
    font-size:medium;
    font-weight:bold;
  }
  </style>
</head>
    
<body class="profile-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="../admin.php" style="font-size:large;">
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
                <h1>Insert Intro</h1>    
              </div>
            </div>
          </div>
        </div>
        <div class="insert_content" >
            <form action="insertIntro.php" method="POST" class="insert_form">
            <table>
                <tr>
                    <td width="70"><label for="introID" width="50">Intoduction ID: </label></td>
                    <td><input type="text" name="introID" id="introID" size="41"></td>
                </tr>
                <tr>
                    <td width="70"><label for="introTitle">Introduction Title: </label></td>
                    <td><input type="text" name="introTitle" id="introTitle" size="41"></td>
                </tr>
                <tr>
                    <td width="70"><label for="introDesc">Introduction Description: </label></td>
                    <td><textarea name="introDesc" id="introDesc" cols="42" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td><label for="introIcon">Introduction Icon: </label></td>
                    <td>
                    <select name="introIcon" style="width:100px">
                        <option value="bx-fingerprint">Fingerprint</option>
                        <option value="bx-gift">Gift</option>
                        <option value="bx-atom">Atom</option>
                        <option value="bx-atom">Book</option>
                        <option value="bx-calculator">Calculator</option>
                        <option value="bx-certification">Certification</option>
                        <option value="bx-lock-alt">Lock</option>
                        <option value="bx-timer">Timer</option>
                    </select>
                    </td>
            </table>
            <input class="save" type="submit" value="Save">
        </form>          
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
<?php } } }?>
