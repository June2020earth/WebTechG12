<?php
require_once('../../../config/db.php');
require_once('../../function.php');

?>

<?php
$i=$_GET['ID'];
$sql="DELETE FROM User WHERE Id='".$i."'";
mysqli_select_db($conn,$dbname);
mysqli_query($conn,$sql);
anotherPlace("viewUser.php");
?>


