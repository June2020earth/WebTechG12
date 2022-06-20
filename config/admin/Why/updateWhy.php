<?php require_once('../../setting.php'); 
require_once('../../db.php');
require_once('../../function.php');
require_once('../../session.php');

if (!(isset($_SESSION['Type']))) {
  goto2("../../../login.php","Only admin is allowed to enter the page");
}
//if user type not found then go login page.
else
{
  if ($_SESSION['Type']!="A"){//if user type not equal A then return false
   
  goto2("../../../index.php","Only admin is allowed to enter the page.");}

else{


if(isset($_GET['order']))
{
    $oUPDATE=$_GET['order'];
    mysqli_select_db($conn, "medilabdb");
    $sql= "SELECT * FROM tblwhy";  
    $result=mysqli_query($conn,$sql);  
    $no_row=mysqli_num_rows ($result);

    $_SESSION['order']=$oUPDATE;
}

if(isset($_POST['header']))
{
    $o=$_POST['order'];
    $h=$_POST['header'];
    $c=$_POST['content'];
    $i=$_POST['icon'];

    $oUPDATE=$_SESSION['order'];
    mysqli_select_db($conn, "medilabdb");
    $sql= "SELECT * FROM tblwhy";  
    $result=mysqli_query($conn,$sql);  
    $no_row=mysqli_num_rows ($result);

    mysqli_select_db($conn, "medilabdb");
    $sqlU ="UPDATE `tblWhy` SET `order`='".($no_row+1)."' WHERE (`order`='".$oUPDATE."')";
    $resultU=mysqli_query($conn,$sqlU); 

    if($o>$oUPDATE)
    {
        $sql= "SELECT * FROM tblwhy ORDER BY tblwhy.`order` ASC";  
        $result=mysqli_query($conn,$sql);    

        while( $row=mysqli_fetch_assoc($result))
        {
            if($row['order']>$oUPDATE&&$row['order']<=$o)
            {
                $sql1 ="UPDATE `tblWhy` SET `order`='".($row['order']-1)."' WHERE (`order`='".$row['order']."')";
                $result1=mysqli_query($conn,$sql1);
            }
        }
    }
    else if($o<$oUPDATE)
    {
        $sql= "SELECT * FROM tblwhy ORDER BY tblwhy.`order` DESC";  
        $result=mysqli_query($conn,$sql); 

        while( $row=mysqli_fetch_assoc($result))
        {
            if($row['order']<$oUPDATE&&$row['order']>=$o)
            {
                $sql1 ="UPDATE `tblWhy` SET `order`='".($row['order']+1)."' WHERE (`order`='".$row['order']."')";
                $result1=mysqli_query($conn,$sql1);
            }
        } 
    }
    $sqlU ="UPDATE `tblWhy` SET `order`='".$o."' WHERE (`order`='".($no_row+1)."')";
    $resultU=mysqli_query($conn,$sqlU); 
    

    $sql2="UPDATE `tblWhy` SET `header`='".$h."', `content`='".$c."',`icon`='".$i."' WHERE (`order`='".$o." ')";
    $result2=mysqli_query($conn,$sql2);
    goto2("viewWhy.php","Card is successfully updated");
}

?>

<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medilab Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<link rel="stylesheet" href="..\..\..\assets\css\style.css">

<!-- Favicons -->
<link href="../../../assets/img/favicon.png" rel="icon">
<link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


 <!-- Vendor CSS Files -->
 <link href="../../../vassets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>
<body>
<main id="main">
<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
   <div class="navbar-translate">
        <a class="navbar-brand" href="../admin.php" style="font-size:x-large;">
          Admin Site </a>
      </div>
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
                <?php 
                    $sql= "SELECT * FROM tblwhy ORDER BY tblwhy.`order` ASC";
                    mysqli_select_db($conn, "medilabdb");
                    $result=mysqli_query($conn,$sql);                   
                ?>
                <h6><u>Card 1</u></h6>
              <h3><?php //first box
                $row=mysqli_fetch_assoc($result); 
                if($oUPDATE!=$row['order']){
                echo $row['header']; 
                ?></h3>
                <p><?php echo $row['content']; }

                else
                {?>
                <form action="updateWhy.php" method="POST" style="font-size: smaller;">
                        Card Position: 
                         <select name="order">
                        <?php 
                            $i=1;
                            while($i<=$no_row){ ?>
                            <option value="<?php echo $i; ?>" <?php if($i==$oUPDATE){ echo "selected"; }?>><?php echo $i; $i++; ?></option> 
                        <?php } ?>
                         </select><br><br>
                        Icon:
                          <select name="icon">
                              <option value="bx-question-mark" <?php if($row['icon']=="bx-question-mark"){ echo "selected"; }?>>Question Mark</option>
                              <option value="bx-receipt" <?php if($row['icon']=="bx-receipt"){ echo "selected"; }?>>List</option>
                              <option value="bx-cube-alt" <?php if($row['icon']=="bx-question-mark"){ echo "selected"; }?>>Cube</option>
                              <option value="bx-images" <?php if($row['icon']=="bx-cube-alt"){ echo "selected"; }?>>Images</option>
                              <option value="bx-bar-chart" <?php if($row['icon']=="bx-bar-chart"){ echo "selected"; }?>>Bar Chart</option>
                              <option value="bx-book" <?php if($row['icon']=="bx-book"){ echo "selected"; }?>>Book</option>
                              <option value="bx-brain" <?php if($row['icon']=="bx-brain"){ echo "selected"; }?>>Brain</option>
                              <option value="bx-calculator" <?php if($row['icon']=="bx-calculator"){ echo "selected"; }?>>Calculator</option>
                              <option value="bx-certification" <?php if($row['icon']=="bx-certification"){ echo "selected"; }?>>Certification</option>
                              <option value="bx-lock-alt" <?php if($row['icon']=="bx-lock-alt"){ echo "selected"; }?>>Lock</option>
                              <option value="bx-timer" <?php if($row['icon']=="bx-time"){ echo "selected"; }?>>Timer</option>
                          </select><br><br>
                          <input type="text" name="header" value="<?php echo $row['header'] ?>"><br><br>
                          <textarea name="content" rows="4" cols="25"><?php echo $row['content'] ?></textarea><br><br>

                            <button type="submit" class="more-btn">Update Card</button>
                        
                      </form>
                <?php } ?>

            </div>
          </div>
          
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                 <?php 
                   while($row=mysqli_fetch_assoc($result)) {
                    if($oUPDATE!=$row['order']){
                ?>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <h6><u>Card <?php echo $row['order'] ?></u></h6>
                    <i class="bx <?php echo $row['icon']; ?>" ></i>
                    <h4><?php
                        echo $row['header']; 
                    ?></h4>
                    <p><?php echo $row['content']; ?></p>
                  </div>
                </div> 
                <?php  }
                else{ ?>
                  <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                            <form action="updateWhy.php" method="POST">
                                Card Position: 
                                <select name="order">
                                <?php 
                                    $i=1;
                                    while($i<=$no_row){ ?>
                                    <option value="<?php echo $i; ?>" <?php if($i==$oUPDATE){ echo "selected"; }?> ><?php echo $i; $i++; ?></option> 
                                <?php } ?>
                                </select><br><br>
                                Icon:
                                <select name="icon">
                                    <option value="bx-question-mark" <?php if($row['icon']=="bx-question-mark"){ echo "selected"; }?>>Question Mark</option>
                                    <option value="bx-receipt" <?php if($row['icon']=="bx-receipt"){ echo "selected"; }?>>List</option>
                                    <option value="bx-cube-alt" <?php if($row['icon']=="bx-cube-alt"){ echo "selected"; }?>>Cube</option>
                                    <option value="bx-images" <?php if($row['icon']=="bx-imagest"){ echo "selected"; }?>>Images</option>
                                    <option value="bx-bar-chart" <?php if($row['icon']=="bx-bar-chart"){ echo "selected"; }?>>Bar Chart</option>
                                    <option value="bx-book" <?php if($row['icon']=="bx-book"){ echo "selected"; }?>>Book</option>
                                    <option value="bx-brain" <?php if($row['icon']=="bx-brain"){ echo "selected"; }?>>Brain</option>
                                    <option value="bx-calculator" <?php if($row['icon']=="bx-calculator"){ echo "selected"; }?>>Calculator</option>
                                    <option value="bx-certification" <?php if($row['icon']=="bx-certification"){ echo "selected"; }?>>Certification</option>
                                    <option value="bx-lock-alt" <?php if($row['icon']=="bx-lock-alt"){ echo "selected"; }?>>Lock</option>
                                    <option value="bx-timer" <?php if($row['icon']=="bx-time"){ echo "selected"; }?>>Timer</option>
                                </select><br><br>
                                <input type="text" name="header" value="<?php echo $row['header'] ?>"><br><br>
                                <textarea name="content" rows="4" cols="25"><?php echo $row['content'] ?></textarea><br><br>

                                    <button type="submit" class="more-btn">Update Card</button>
                                
                            </form>
                         </div>
                        </div> 
                      <?php }} ?>
                    
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
</main>
</body>
<?php } } ?>
