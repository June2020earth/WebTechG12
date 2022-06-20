<?php 
require_once('../../setting.php');
require_once('../../db.php');
require_once('../../function.php');
require_once('../../session.php');

if (!(isset($_SESSION['Type']))) {
  goto2("../../../login.php","Please login first");
}
//if user type not found then go login page.
elseif (strcmp($_SESSION['Type'],"A")){//if user type not equal A then return false
   
  goto2("../../../index.php","Only admin is allowed to enter the page.");}

else{



if (isset($_GET['Name'])){
 //echo " you have try to save ";
        $n=$_GET['Name'];
      
        $sql ="DELETE FROM `outlet` 
        WHERE (`Name`='".$n."') ";  // sql command
//echo $sql;
        mysqli_select_db($conn,"medilabdb"); ///select database as default
        $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
       // mysqli_fetch_assoc($result); 
      goto2("viewContact.php","Contact is successfully Deleted");
} 
}
?>

