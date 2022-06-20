<?php

session_start();
if (isset($_SESSION['interface'])&&(isset($_SESSION['UserID']))){
    //echo  $_SESSION['interface'];
    goto2($_SESSION['interface'],"Welcome back to the Portal");

}



?>