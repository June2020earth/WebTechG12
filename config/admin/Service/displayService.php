<?php 
require_once("../../setting.php");
require_once("../../function.php");
require_once('../../session.php');
if (!(isset($_SESSION['Type']))) {
  goto2("../../../login.php","Please login first");
}
//if user type not found then go login page.
elseif (strcmp($_SESSION['Type'],"A")){//if user type not equal A then return false
   
  goto2("../../../index.php","Only admin is allowed to enter the page.");}

else{
?>
<head>
    <style>
        table{
            width:1000px;
            margin-left:-200px;
        }
         th, td {
                max-width:300px;
                word-wrap:break-word;
                text-align:left;
                padding:5px 20px 5px 20px;
                
            }
           
        </style>
</head>
<?php
require_once("../../setting.php");
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbname);



?>


    <?php
        $no=1;
        $sql = "select * from service";
        $result = mysqli_query($conn,$sql);  //cammand allow sql cmd to be sent to mysql
        if (mysqli_num_rows($result) != 0)
         {?>
            <table >
            <tr>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Service Description</th>
                <th>Icon Name <a href="previewService.php" style="font-size=3px;">preview</a></th>
                <th>Display</th>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                
                <td><?php echo $row["serviceID"];?></td>
                <td><?php echo $row["serviceName"];?></td>
                <td ><?php echo $row["serviceDes"];?></td>
                <td><?php echo $row["icon"];?></td>

                <td><?php if($row["display"]==1) {echo "Display";} else{
                    echo "None";}?></td>
                <td>
                <a href="viewService.php?serviceID=<?php echo $row["serviceID"];?>&Mode=<?php echo "update";?>">Edit service</a></p> </td>
               <td>
                <a href="deleteService.php?serviceID=<?php echo $row["serviceID"];?>">Delete service</a></p> </td>
              </tr>
                <?php $no++;
                }
                ?>
                    <tr>
                        <td colspan="3"><a href="viewService.php?Mode=<?php echo "insert";?> ">Insert new service</a></td>
                </tr>
</table>
<?php 
}
else {
  // results not found 
  echo "No Service in Database";
  ?>
  <p style="font-size:30px; color:red; margin-top:20px;"><a href="viewService.php?Mode=<?php echo "insert";?>">Insert new service</a></p>
  <?php }
  
  ?>
<?php } ?>
