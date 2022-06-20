<?php

  require_once('function.php');

session_start();
if (isset($_SESSION['Name'])){
    //echo  $_SESSION['mylogin'];
  //  goto2("index.php","You have login");

}else{
  /*
   // echo " no value defined";
   if (file_exists('../../login.php')==1){ 
     
      goto2("../../login.php","Please log on before using");
  }
  elseif(file_exists('../login.php')==1){
      goto2("../login.php","Please log on before using");
  }else{
      goto2("login.php","Please log on before using");
  }
   */

}


?>
