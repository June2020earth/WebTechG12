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


if(isset($_POST['header']))
{
    $o=$_POST['order'];
    $h=$_POST['header'];
    $c=$_POST['content'];
    $i=$_POST['icon'];

    $sql= "SELECT * FROM tblwhy ORDER BY tblwhy.`order` DESC";
    mysqli_select_db($conn, "medilabdb");
    $result=mysqli_query($conn,$sql); 
    while( $row=mysqli_fetch_assoc($result))
    {
        if($row['order']>=$o)
        {
            $sql1 ="UPDATE `tblWhy` SET `order`='".($row['order']+1)."' WHERE (`order`='".$row['order']."')";
            $result1=mysqli_query($conn,$sql1);
        }
    }

    $sql2="INSERT INTO `tblWhy` (`order`, `header`, `content`,`icon`) VALUES ('".$o."' ,'".$h."' ,'".$c."' ,'".$i."' )";
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
<link rel="stylesheet" href="..\..\..\assets\css\demo.css">

<!-- Favicons -->
<link href="../../../assets/img/favicon.png" rel="icon">
<link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


 <!-- Vendor CSS Files -->
 <link href="../../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
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
                if (mysqli_num_rows($result) != 0){
                echo $row['header']; 
                ?></h3>
                <p><?php echo $row['content']; 
                $position=1; ?></p>

            </div>
          </div>
          
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                 <?php 
                   while($row=mysqli_fetch_assoc($result)) {
                    $position++;
                ?>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <h6><u>Card <?php echo $position ?></u></h6>
                    <i class="bx <?php echo $row['icon']; ?>" ></i>
                    <h4><?php
                        echo $row['header']; 
                    ?></h4>
                    <p><?php echo $row['content']; ?></p>
                  </div>
                </div> 
                <?php  } ?>
                <?php 
                     if(mysqli_num_rows($result) >=2){
                ?>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                  <?php }
                  else { ?>
                  <div class="icon-box mt-4 mt-xl-0">
                  <?php } ?>
                    <form action="insertWhy.php" method="POST">
                        Card Position: 
                         <select name="order">
                        <?php 
                            $i=1;
                            while($i<=$position){ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; $i++; ?></option> 
                        <?php } ?>
                        <option value="<?php echo $i; ?>" selected><?php echo $i; $i++; ?></option> 
                         </select><br><br>
                        Icon:
                          <select name="icon">
                              <option value="bx-question-mark" selected>Question Mark</option>
                              <option value="bx-receipt">List</option>
                              <option value="bx-cube-alt">Cube</option>
                              <option value="bx-images">Images</option>
                              <option value="bx-bar-chart">Bar Chart</option>
                              <option value="bx-book">Book</option>
                              <option value="bx-brain">Brain</option>
                              <option value="bx-calculator">Calculator</option>
                              <option value="bx-certification">Certification</option>
                              <option value="bx-lock-alt">Lock</option>
                              <option value="bx-timer">Timer</option>
                          </select><br><br>
                          <input type="text" name="header" placeholder="Header..."><br><br>
                          <textarea name="content" rows="4" cols="25" placeholder="Content..."></textarea><br><br>

                            <button type="submit" class="more-btn">Add Card</button>
                        
                      </form>
                    
                  </div>
                </div> 
              </div>
            </div><!-- End .content-->
            <?php }
            else{ ?>
            <form action="insertWhy.php" method="POST">
                        Card Position: 
                         <select name="order">
                        <?php 
                            $i=1;
                            while($i<=$position){ ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; $i++; ?></option> 
                        <?php } ?>
                        <option value="<?php echo $i; ?>" selected><?php echo $i; $i++; ?></option> 
                         </select><br><br>
                        Icon:
                          <select name="icon">
                              <option value="bx-question-mark" selected>Question Mark</option>
                              <option value="bx-receipt">List</option>
                              <option value="bx-cube-alt">Cube</option>
                              <option value="bx-images">Images</option>
                              <option value="bx-bar-chart">Bar Chart</option>
                              <option value="bx-book">Book</option>
                              <option value="bx-brain">Brain</option>
                              <option value="bx-calculator">Calculator</option>
                              <option value="bx-certification">Certification</option>
                              <option value="bx-lock-alt">Lock</option>
                              <option value="bx-timer">Timer</option>
                          </select><br><br>
                          <input type="text" name="header" placeholder="Header..."><br><br>
                          <textarea name="content" rows="4" cols="25" placeholder="Content..."></textarea><br><br>

                            <button type="submit" class="more-btn">Add Card</button>
                        
                      </form>
            </div>
          </div>
            <?php } ?>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
</main>
</body>
<?php } } ?>
