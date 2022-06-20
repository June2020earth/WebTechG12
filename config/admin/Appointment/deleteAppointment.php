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

if (isset($_GET['appID'])){
 //echo " you have try to save ";
        $id=$_GET['appID'];
      
        $sql ="DELETE FROM `appointment` 
        WHERE (`appID`='".$id."') ";  // sql command
//echo $sql;
        mysqli_select_db($conn,"medilabdb"); ///select database as default
        $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
       // mysqli_fetch_assoc($result); 
        goto2("viewAppointment.php","Appointment is successfully Deleted");
} }}
