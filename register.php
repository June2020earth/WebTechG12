<?php 
    include('config/db.php');
    include('config/function.php');
    include('config/setting.php');

    if (!empty(isset($_POST['username']))){
        $UserID=getUserID();
        $UserName=$_POST['username'];
        $UserPassword=$_POST['password'];
        $UserEmail=$_POST['email'];
        $UserPhone=$_POST['phone'];
        
        //sql command
        $sql ="INSERT INTO `User` (`ID`, `Name`, `Password`,`Email`,`Phone`,`Type`) VALUES ('".$UserID."','".$UserName."','".$UserPassword."','".$UserEmail."','".$UserPhone."','U')"; 
        
        ///select medilabdb database 
        mysqli_select_db($conn,"medilabdb"); 
        
        //command allow sql cmd to be sent to mysql
        $result=mysqli_query($conn,$sql);  
   
        if(!$result){
            echo "Error: ".$conn->error;
        }
        else{
            goto2("login.php", "User is successfully registered");
        }

    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>User Registration Page</title>

    <!-- Icons font CSS-->
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
   

    <!-- Main CSS-->
    <link href="assets/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form action="register.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="username">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="EMAIL" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="tel" placeholder="PHONE(XXX-XXXXXXX)" name="phone" pattern="[0-9]{3}-[0-9]{7}">
                        </div>
                        <div class="p-t-20">
                            <button type="submit" value="submit" class="btn btn--radius btn--blue">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/datepicker/moment.min.js"></script>
    <script src="assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="assets/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
