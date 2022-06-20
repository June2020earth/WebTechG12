<?php 
session_start();
unset($_SESSION['UserID']);
unset($_SESSION['interface']);
unset($_SESSION['UsetType']);
session_destroy();
?>