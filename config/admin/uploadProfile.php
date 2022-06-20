<?php 
require_once("../function.php");
if(isset($_FILES['myfile']))
{
    $targetDir =getcwd()."\Profile";
    $ID=$_GET['ID'];
    $name="profile".$ID.".png";
    
    if(is_array($_FILES)) 
    {
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) 
    {
    if(move_uploaded_file($_FILES['myfile']['tmp_name'],"$targetDir/".$name)) 
    {
    goto3("admin.php");
    }
    }
    }
}
else
{
    $ID=$_GET['ID'];

?>

<html>
<head>
    <style>
        #container
        {
            display:flex;
            justify-content:center;
            border:1px solid;
            margin:200px auto 0 auto;
            padding: 10px 10px 10px 10px;
            max-width:50%;
        }
        
    </style>
<div id="container">
    <div>
<form action="uploadProfile.php?ID=<?php echo $ID; ?> " enctype="multipart/form-data" method="POST" name="frm_user_file">
<input type="file" name="myfile" value=""> 
<input type="submit" name="submit" value="Upload" >
</form>
    </div>
    </div>
</html>
<?php } ?>