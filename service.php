<head>
    <style>
.roww 
{
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
  justify-content:center;
}
    </style>
</head>
<?php
require_once("config/setting.php");
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbname);
?>

<section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>Services Provider Medilab</p>
        </div>

        <div class="roww">
            <?php
            $no=0;
            $sql = "select * from service";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) != 0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    if($row['display']==1){?> 
                
                <div style="width:33.3333%;max-height:50%;">
                <div class="icon-box" style="height:100%;">
                <div class="icon"><i class="<?php echo "fas fa-".$row['icon'];?>"></i></div>
                <h4><a href=""><?php echo $row['serviceName'];?></a></h4>
                            <p><?php echo $row['serviceDes'];?></p>
                            </div>
                            </div>
                       <?php }}
                        
                    
            
            ?>
                </div>
                </div>
                </section>
                <?php
            }        
            else
            {?>
                <div style="width:33.3333%;margin-bottom:30px;">
                        <div class="icon-box">
                        <h4> <?php  echo "No Service Available Now";?>
                        </div>
                        </div>
        <?php } ?>
          

          

          
          

          

          
 
