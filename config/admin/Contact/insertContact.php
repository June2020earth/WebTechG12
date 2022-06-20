
<?php require_once('../../setting.php'); 
require_once('../../db.php');
require_once('../../function.php');
require_once('../../session.php');

if (!(isset($_SESSION['Type']))) {
  goto2("../../../login.php","Please log in first");
}
//if user type not found then go login page.
elseif (strcmp($_SESSION['Type'],"A")){//if user type not equal A then return false
   
  goto2("../../../index.php","Only admin is allowed to enter the page.");}

else{


if (isset($_POST['Name'])){
        $n=$_POST['Name'];
        $e=$_POST['Email'];
        $c=$_POST['Contact'];
        $street=$_POST['Street'];
        $taman=$_POST['Taman'];
        $postcode=$_POST['Postcode'];
        $district=$_POST['District'];
        $state=$_POST['State'];
        $sql ="INSERT INTO `outlet` (`Name`,`Email`,`Contact`,`Street`,`Taman`,`Postcode`,`District`,`State`) 
        VALUES ('".$n."', '".$e."', '".$c."','".$street."','".$taman."','".$postcode."','".$district."','".$state."')"; // sql command
        mysqli_select_db($conn,"medilabdb"); ///select database as default
        $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
       // mysqli_fetch_assoc($result); 
       goto2("viewContact.php"," Contact is successfully inserted");
} else {
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
  background-color:		#8FD400;
  border:lightgrey;
  border-radius:0.2em;
  width:80px;
  padding:5px;
  color:white;
}
label{
  color:		#2E5894;
  font-size:medium;
  font-weight:bold;
}
 
  </style>

  <script language="JavaScript">
    function fieldvalidation(){
      var error=false;
      if(document.forms['insert_form']['Name'].value.length==0){
        alert("Please Enter a Value for the name of Outlet");
        error=true;
      }
      if(document.forms['insert_form']['Email'].value.length==0){
        alert("Please Enter a Value for the email");
        error=true;
      }
      if(document.forms['insert_form']['Contact'].value.length==0){
        alert("Please Enter a Value for the contact");
        error=true;
      }
      if(document.forms['insert_form']['Street'].value.length==0){
        alert("Please Enter a Value for the street");
        error=true;
      }
      if(document.forms['insert_form']['Postcode'].value.length==0){
        alert("Please Enter a Value for the postcode");
        error=true;
      }
      if(document.forms['insert_form']['District'].value.length==0){
        alert("Please Enter a Value for the district");
        error=true;
      }
      if(document.forms['insert_form']['State'].value.length==0){
        alert("Please Enter a Value for the state");
        error=true;
      }
      if(document.forms['insert_form']['Email'].value.length!=0){
        var format=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var inputtxt=document.forms['insert_form']['Email'];
        if(inputtxt.value.match(format)){
        }else{
          alert("Not a valid email");
          error=true;
          
        }
      }
      if(document.forms['insert_form']['Contact'].value.length!=0){
        
        var format=/^(\+(\d{3}|\d{4})+\-\d{7})$/;
        var inputtxt=document.forms['insert_form']['Contact'];
        if(inputtxt.value.match(format)){
        }else{
          alert("Please enter contact number in the international format of +60XX-XXXXXXX or +60X-XXXXXXX.");
          error=true;
          
        }
      }
      if(document.forms['insert_form']['Postcode'].value.length!=0){
        
        var format=/^[0-9]+$/;
        var inputtxt=document.forms['insert_form']['Postcode'];
        if(inputtxt.value.match(format)){
        }else{
          alert("Not a valid postcode");
          error=true;
          
        }
      }
      
      if(error==true){
        return false;
        
      }else{
        return true;
      }
    }
      
  </script>
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
                <h1>Add Outlets</h1>
               
              </div>
            </div>
          </div>
        </div>
        <div class="insert_content" >
            <form action="insertContact.php" method="POST" class="insert_form" name="insert_form" onSubmit="return fieldvalidation();">
                <table >
                    <tr>
                    <th><label for="Name">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp</label></th>
                    <td><input type="text" id="Name" name="Name" size="40"></td>
                    </tr>
                    <tr>
                    <th><label for="Email">Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp</label></th>
                    <td><input type="text" id="Email" name="Email" size="40"></td>
                    </tr>
                    <tr>
                    <th><label for="Contact"> Contact&nbsp&nbsp&nbsp&nbsp: &nbsp</label></th>
                    <td><input type="text" id="Contact" name="Contact" size="40"></td>
                    </tr>
                    <tr>
                    <th><label for="Street"> Street&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp</label></th>
                    <td><input type="text" id="Street" name="Street" size="40" ></td>
                    </tr>
                    <tr>
                    <th><label for="Taman"> Zone&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp</label></th>
                    <td><input type="text" id="Taman" name="Taman" size="40" ></td>
                    </tr>
                    <tr>
                    <th><label for="Postcode"> Postcode&nbsp: &nbsp</label></th>
                    <td><input type="text" id="Postcode" name="Postcode" size="40" ></td>
                    </tr>
                    <tr>
                    <th><label for="District"> District&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp</label></th>
                    <td><input type="text" id="District" name="District" size="40" ></td>
                    </tr>
                    <tr>
                    <th><label for="State"> State&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp</label></th>
                    <td><input type="text" id="State" name="State" size="40" ></td>
                    </tr>
                    
                </table>
                <br>
            <div class="save">
            <input type="submit" value="Save">
            </div>
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

<?php }}?>
