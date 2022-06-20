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
<link href="../../../assets/css/style.css" rel="stylesheet">
    <style>
.roww 
{
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
  justify-content:center;
}
.barcontainer
{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    margin:60px 20px 20px 20px;
    background-color:grey;
    padding:20px 20px 20px 20px;
}
.searchbar>input
{
    border:2px solid green;
    border-radius:15px;
    width:200px;
    height:30px;
    margin-bottom:20px;
}
.searchbar
{
    width:200px;
    height:30px;
}
.button
{
    display:flex;
    margin-top:10px;
}




    </style>
</head>
<?php
require_once("../../setting.php");
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbname);
if(isset($_POST['icn']))
{$ic=$_POST['icn'];
?>      
        <div class="barcontainer">
        
            <div style="margin-bottom=0px;">
            <form method="POST" action="previewService.php">
                <div class="searchbar">
                    <input type="text" name='icn' placeholder="Enter icon name here e.g pills" width="20px">
                </div>
                <div class="button">
                <input type="submit" value="Preview" style="height:22.6px;width=30px;">
                </form>
                <form action="viewService.php"><input type="submit" value="Back" style="margin-left:20px;height:22.6px;width=30px;"></form>
                </div>
            
            </div>
            <div style="color:white;font-style:italic;">
            <p sytle="color:red;"> get icon  name from <a href="https://fontawesome.com/" title="Click to find icon class name" style="color:yellow;">here</a></p>
            </div>
        </div>
       
        
        <section id="services" class="services">
      <div class="container">
        
        <div class="roww">
                
                <div style="width:33.3333%;max-height:50%;">
                <div class="icon-box" style="height:100%;">
                <div class="icon"><i class="<?php echo "fas fa-".$ic;?>"></i></div>
                <h4><?php echo "Service Name";?></h4>
                            <p><?php echo "Service Description" ?></p>
                            </div>
                            </div>
                       <?php 
                        
                    
            
            ?>
                </div>
                </div>
                </section>
                <?php
            }        
            else
            { ?>
            <div class="barcontainer">
        <div>
        <form method="POST" action="previewService.php">
        <div class="searchbar">
        <input type="text" name='icn' placeholder="Enter icon name here e.g pills" width="20px">
        </div>
        <div class="button">
        <input type="submit" value="Preview" style="height:22.6px;width=30px;">
        </form>
        <form action="viewService.php"><input type="submit" value="Back" style="margin-left:20px;height:22.6px;width=30px;"></form>
        </div>
    
        </div>
        <div style="color:white;font-style:italic;">
            <p sytle="color:red;"> get icon name from <a href="https://fontawesome.com/" title="Click to find icon class name" style="color:yellow;">here</a></p>
            </div>
        </div>
        <section id="services" class="services">
      <div class="container">
        
        <div class="roww">
                
                <div style="width:33.3333%;max-height:50%;">
                <div class="icon-box" style="height:100%;">
                <div class="icon"><i class="<?php echo "fas fa-".$ic;?>"></i></div>
                <h4><a href=""><?php echo "Service Name";?></a></h4>
                            <p><?php echo "Service Description";?></p>
                            </div>
                            </div>
                       <?php 
                        
                    
            
            ?>
                </div>
                </div>
                </section>
                <?php
            } } ?>
          
          

          

          
 
