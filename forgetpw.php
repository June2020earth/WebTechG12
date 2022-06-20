
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Login to Medilab
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/login.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<!-- START HERE ................................................ -->
<?php
if(isset($_POST['email']))
{
  require_once("config/setting.php");
  require_once("config/function.php");
  $e=$_POST['email'];
$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbname);
$sql = "select * from `user`";
        $result = mysqli_query($conn,$sql);  //cammand allow sql cmd to be sent to mysql
        if (mysqli_num_rows($result) != 0)
         {
          while($row=mysqli_fetch_assoc($result))
          {
            if($row['Email']==$e)
            {
              $message=$row['Password'];
              $name=$row['Name'];
              /*mail(".$e.","Medilab Forget Password",$message);*/
             goto2("login.php","Your password is send to your email");
            }
          }
          goto2("login.php","This account is not registered yet!");
         }
         else
         {
           goto2("login.php","This account is not registered yet!");
         }
         
}
?>

<!-- END HERE ................................................ -->
<!-- END HERE ................................................ -->
<body class="login-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="login.php">
          Home </a>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('img/bg7.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div style="background-color:white;color:black;padding:10px 10px 10px 10px;">
          <h4 style="text-align:center;"> Enter your email to get your password</h4>
            <form class="form" method="POST" action="forgetpw.php">
             
              
              <div class="card-body" style="width=50%;margin-left=30px;">
                <div class="input-group ">
                  <div class="input-group-prepend" style="margin:20px 0px 20px 0px;">
                    <span class="input-group-text" >
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email..." name="email" 
                  value="<?php if (isset($cu)){ echo  $cu;} ?> " required>
                </div>
              </div>

              <div class="footer text-center">
                <br>
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by Subarashi Sensei <img src="assets/img/Subarashi.png" alt="Subarashi" width="20px" height="20px"> for perfect fantasy.
        </div>
      </div>
    </footer>
  </div>

</body>
