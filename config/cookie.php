<?php 
$useridcookieu="loginuser";
$useridcookiep="loginpass";
$userid="";
$pass="";

if (isset($_GET['userid']))
   { $userid=$_GET['userid'];}
if (isset($_GET['pass']))  
   { $userpass=$_GET['pass'];}
if ((isset($_GET['userid']))&&(isset($_GET['pass'])))  
    {
        setcookie($useridcookieu,$userid,time()+(30*86400),"/");
        setcookie($useridcookiep,$userpass,time()+(30*86400),"/");
    }

if (!isset($_COOKIE[$useridcookieu])){
    echo "Cookie name " .$userid. " is not set";
}
else{
    echo "Cookie name " .$useridcookieu." is ". $_COOKIE[$useridcookieu];
    echo "<br>Cookie Pass " .$useridcookiep." is ". $_COOKIE[$useridcookiep];
}


?>