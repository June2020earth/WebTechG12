<?php 
require_once('../../setting.php');
require_once('../../db.php');
require_once('../../function.php');
require_once('../../session.php');
?>

<?php
if (!(isset($_SESSION['Type']))) {
    goto2("../../../login.php","Only admin is allowed to enter the page");
  }
  //if user type not found then go login page.
  else
  {
    if ($_SESSION['Type']!="A"){//if user type not equal A then return false
     
    goto2("../../../index.php","Only admin is allowed to enter the page.");}
  
  else{
    if (isset($_GET['order']))
    {
        $oDEL=$_GET['order'];
        $sql="DELETE FROM `tblWhy` WHERE (`order`='".$oDEL."')";
        mysqli_select_db($conn,"medilabdb"); 
        $result=mysqli_query($conn,$sql); 

        $sql= "SELECT * FROM tblwhy ORDER BY tblwhy.`order` ASC";
        mysqli_select_db($conn, "medilabdb");
        $result=mysqli_query($conn,$sql); 
        while( $row=mysqli_fetch_assoc($result))
        {
            if($row['order']>=$oDEL)
            {
                $sql1 ="UPDATE `tblWhy` SET `order`='".($row['order']-1)."' WHERE (`order`='".$row['order']."')";
                $result1=mysqli_query($conn,$sql1);
            }
        }

        goto2("viewWhy.php","The card is successfully deleted.");
    } } }
?>