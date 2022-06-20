<?php
require_once("../setting.php");
require_once("../function.php");
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbname);
$result=mysqli_query($conn,"Show Tables");
$numberTable=(mysqli_num_rows($result));
$limit=0;
while((mysqli_num_rows($result)!=0))
{
  $sql="DROP TABLE IF EXISTS `outlet`;";
  mysqli_query($conn,$sql);
  $sql="DROP TABLE IF EXISTS `service`;";
  mysqli_query($conn,$sql);
  $sql="DROP TABLE IF EXISTS `department`;";
  mysqli_query($conn,$sql);
  $sql="DROP TABLE IF EXISTS `user`;";
  mysqli_query($conn,$sql);
  $sql="DROP TABLE IF EXISTS `appointment`;";
  mysqli_query($conn,$sql);
  $sql="DROP TABLE IF EXISTS `tblintro`";
  mysqli_query($conn,$sql);
  $sql="DROP TABLE IF EXISTS `category`";
  mysqli_query($conn,$sql);
  $sql="DROP TABLE IF EXISTS `tblWhy`";
  mysqli_query($conn,$sql);
  $result=mysqli_query($conn,"Show Tables");
 
 
  $limit++;
  if($limit>5)
  {
      $message="Opss, infinity loop may exist";
    echo "<script>alert('$message');</script>";
      break;
  }
}
$message=$numberTable." tables have been dropped";
echo "<script>alert('$message');</script>";
mysqli_close($conn);
?>