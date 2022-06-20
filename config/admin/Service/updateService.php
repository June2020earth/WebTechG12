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
<tite>
    <style>
        table{
            width:1000px;
            margin-left:-200px;
        }
         th, td {
                max-width:300px;
                word-wrap:break-word;
                text-align:center;
                padding:5px 20px 5px 20px;
                text-align:justify;
         }
           
        </style>
</title>
<?php
require_once("../../setting.php");
require_once("../../function.php");
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbname);
if(isset($_POST['sname'])&&isset($_GET['serviceID']))
{
    $sid=$_GET['serviceID'];
    $sn=$_POST['sname'];
    $sd=$_POST['sdes'];
    $sp=$_POST['dis'];
    $sic=$_POST['icn'];
    $sql1=" UPDATE `service` SET  `serviceName`='".$sn."',`serviceDes`='".$sd."',`display`='".$sp."',`icon`='".$sic."'  WHERE (`serviceID`='".$sid."') ";
    if(mysqli_query($conn,$sql1))
    {
        goto2("viewService.php","Data Updated!");
    }
    else
    {
        goto2("viewService.php","Fail to update data");   
    }
}
else
{
if(isset($_GET['serviceID']))
{
    $sid=$_GET['serviceID'];

$no=1;
$sql = "select * from service";
$result = mysqli_query($conn,$sql);  //cammand allow sql cmd to be sent to mysql
if (mysqli_num_rows($result) != 0)
         {?>
            <table>
            <tr>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Service Description</th>
                <th>Icon Name<a href="previewService.php" style="font-size=3px;"> Preview</a></th>
                <th>Display</th>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($result)){
                
                if($row["serviceID"]==$sid)
            {?>
            <form method="POST" action="updateService.php?serviceID=<?php echo $row['serviceID'];?>">
            <tr>
                <td><?php echo $row["serviceID"];?></td>
                <td><input type="text" name="sname" id="sname" value="<?php echo $row['serviceName'];?>"></td>
                <td><textarea name="sdes" id="sdec" rows="3" cols="30" value="<?php echo $row['serviceDes'];?>"><?php echo $row['serviceDes'];?></textarea></td>
                <td><input type="text" name="icn" id="icn" value="<?php echo $row['icon'];?>"></td>
                <td><select id="dis" name="dis">
                    <option value="1">Display</option>
                    <option value="0">Hide</option>
                    </select>
                <td><input type='submit' value="save"></td>
            </form>
            <form action="viewService.php">
                <td><input type='submit' value="Cancel"></td>
            </form>
            </tr>
            <?php }
            else
            {?>
            <tr>

                <td><?php echo $row["serviceID"];?></td>
                <td><?php echo $row["serviceName"];?></td>
                <td class="hello"><?php echo $row["serviceDes"];?></td>
                <td><?php echo $row["icon"];?></td>

                <td><?php if($row["display"]==1) {echo "Display";} else{
                    echo "None";}?></td>
              </tr>
                <?php $no++;
                }
            }?>
</table>
<?php 
}
else {
  // results not found 
  echo "No Service in Database";
  ?>
  <p style="font-size:30px; color:red; margin-top:20px;"><a href="viewService.php?Mode=<?php echo "insert";?>">Insert new service</a></p>
  <?php }
}
else
{
    goto2("viewService.php","Failed to retrieve serviceID");
}
  
 } ?>
<?php } ?>
