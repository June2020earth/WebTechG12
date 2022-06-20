<?php
require_once('../../../config/db.php');
require_once('../../function.php');

?>

<?php
$i=$_GET['ID'];
$sql="DELETE FROM Department WHERE Id='".$i."'";
mysqli_select_db($conn,$dbname);
mysqli_query($conn,$sql);
$sql="SELECT FROM Department WHERE Id='".$i."'";
$result=mysqli_query($conn,$sql);
$rowcat=(mysqli_fetch_assoc($result));
$n=$rowcat['name'];
anotherPlace("viewDepartment.php");
?>


