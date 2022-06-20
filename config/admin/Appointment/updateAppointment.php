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
$id=$_GET['appID'];
$n=$_GET['userName'];
if (isset($_POST['phone'])){
  $id=$_GET['appID'];
  $n=$_GET['userName'];
        $p=$_POST['phone'];
        $email=$_POST['email'];
        $date=$_POST['date'];
        $doctor=$_POST['doctor'];
        if($doctor=="Doctor 1"){
            $doctor=1;
        }else if($doctor=="Doctor 2"){
             $doctor=2;
        }else if($doctor=="Doctor 3"){
             $doctor=3;
        }
        
        $dept=$_POST['department'];
        
        $message=$_POST['message'];

        $sql ="UPDATE `appointment` SET `Email`='".$email."',`phone`='".$p."',`appDate`='".$date."',
        `appDoc`='".$doctor."', `appDept`='".$dept."',`message`='".$message."' 
        WHERE (`appID`='".$id."') LIMIT 1";  // sql command
        mysqli_select_db($conn,"medilabdb"); ///select database as default
        $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
       // mysqli_fetch_assoc($result); 
       goto2("viewAppointment.php","Appointment is successfully updated");
} else {
   
    $sql ="select * from appointment where appID='".$id."'";  // sql command
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
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../../assets/demo/demo.css" rel="stylesheet" />
  <style>
    .update_content{
      text-align:center;

    }
    table{
      margin:auto;
      font-family: "Times New Roman", Times, serif;
      
    }
    th,td{
      padding:10px;
      color:black;
    }
    .submit-btn {
  margin-left: 25px;
  background: #1977cc;
  color: #fff;
  border-radius: 50px;
  padding: 8px 25px;
  white-space: nowrap;
  transition: 0.3s;
  font-size: 14px;
  display: inline-block;
}

.submit-btn:hover {
  background: #166ab5;
  color: #fff;
}

@media (max-width: 768px) {
  .submit-btn {
    margin: 0 15px 0 0;
    padding: 6px 18px;
  }
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
      <div class="navbar-translate">
        <a class="navbar-brand" href="../admin.php" style="font-size:x-large;">
          <b>Admin Site</b> </a>
        
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
                <h2><b>Update Appointments</b></h2>
              </div>
            </div>
          </div>
        </div>
        <div class="update_content" >
            <form action="updateAppointment.php?appID=<?php echo $id;?>&userName=<?php echo $n;?>" method="POST">
            <table>
                <tr>
                <th><label for="ID">Appointment ID &nbsp &nbsp:&nbsp</label></th>
                <td><input type="text" disabled id="id" name="id" value="<?php echo $id; ?>  "></td>
                </tr>

                <tr>
                <th><label for="Name">Name &nbsp &nbsp:&nbsp</label></th>
                <td><input type="text" disabled id="name" name="name" value="<?php echo $n; ?>  "></td>
                </tr>
            
                <tr>
                <th><label for="Email">Email &nbsp &nbsp:&nbsp</label></th>
                <td><input type="text" id="email" name="email" value="<?php echo $row['Email'];?>"></td>
                </tr>
           
                <tr>
                <th><label for="Phone">Phone:&nbsp</label></th>
                <td><input type="text" id="phone" name="phone" value="<?php echo $row['phone'];?>"></td>
                </tr>
            
                <tr>
                <th><label for="Date">Date:&nbsp</label></th>
                <td><input type="datetime-local" id="date" name="date" value="<?php echo $row['appDate'];?>"></td>
                </tr>

                <tr>
                <th><label for="Doctor">Doctor:&nbsp</label></th>
                <td><select name="doctor" id="doctor">
                <option value="">Select Doctor</option>
                <option value="Doctor 1">Doctor 1</option>
                <option value="Doctor 2">Doctor 2</option>
                <option value="Doctor 3">Doctor 3</option>
                </select>
                </td>
                </tr>

                <tr>
                <th><label for="Department">Department:&nbsp</label></th>
                <td><select name="department" id="department">
                  <option value="0"> Select the Department</option>
<!-- repeat value taken from db -->
                  <?php
                  $sql ="select * from department";  // sql command
                  mysqli_select_db($conn,"medilabdb"); ///select database as default
                  $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql

                  while( $rowcat=mysqli_fetch_assoc($result)) {   ?> 
   
                  <option <?php if($row["appDept"]==$rowcat["ID"]){echo "Selected";}?>
    
                  value="<?php echo $rowcat['ID'];?>"><?php echo $rowcat['name'];?></option>
   
                  <?php }  
                  ?>
                  </select>
                </td>
                </tr>

                <tr>
                <th><label for="Message">Message:&nbsp</label></th>
                <td><input type="text" id="message" name="message" value="<?php echo $row['message'];?>"></td>
                </tr>

            </table>
            <p><p><input type="submit" value="Save" class="submit-btn"></p></p>
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
  <script src="../../../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../../../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../../../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../../../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../../../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../../../assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>

<?php }}}?>
