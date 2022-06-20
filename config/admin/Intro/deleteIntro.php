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
      if (strcmp($_SESSION['Type'],"A")){//if user type not equal A then return false
        goto2("../../../login.php","Only admin is allowed to enter the page.");
      }
      else{
        $i=$_GET['introID'];
        $sql ="DELETE FROM `tblintro` WHERE introID='".$i."'";  // sql command
        mysqli_select_db($conn,"medilabdb"); ///select database as default
        $result=mysqli_query($conn,$sql);  // command allow sql cmd to be sent to mysql
        goto2("viewIntro.php","Intro is successfully deleted");
      }
    }
?>

