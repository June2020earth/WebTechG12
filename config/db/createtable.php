
<?php
require_once("../setting.php");
require_once("../function.php");
$conn=new mysqli($servername,$username,$password);
if($conn->connect_error)
{
    die("Connection failed:".$conn->connect_error);
}

$sql_createdb="CREATE DATABASE IF NOT EXISTS ".$dbname."";

?>
<?php
if(isset($_GET['refresh']))
{

}
else
{
  if((mysqli_query($conn,$sql_createdb)))
{

}
else
{
    $message="Failed to create Database";
    goto2("../../login.php",$message);
}
  require_once("droptable.php"); 
}

$conn=new mysqli($servername,$username,$password);
//Create Table department
mysqli_select_db($conn,$dbname);
$sql=
"CREATE TABLE `department` 
(
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `MainDescription` varchar(255) DEFAULT '',
  `SecondDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
);";
//create table service
$sql .="CREATE TABLE `service`
(   `serviceID` int(10) NOT NULL auto_increment ,
    `serviceName` varchar(250) NOT NULL,
    `serviceDes` varchar(250) NOT NULL,
    `icon` varchar(250) DEFAULT NULL,
    `display` tinyint(1) NOT NULL DEFAULT '1' CHECK (`display`<=1&&`display`>=0),
    PRIMARY KEY(`serviceID`)
);";
//create table category
$sql .="CREATE TABLE `category` (
  `Type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Interface` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
//create table outlet
$sql .="CREATE TABLE `outlet` (
  `Name` varchar(255) COLLATE utf8_bin NOT NULL,
  `Email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Contact` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Street` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `District` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `State` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Postcode` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Taman` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";
//create table user
$sql .="CREATE TABLE `user` (
  `ID` varchar(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL UNIQUE,
  `Phone` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Type` (`Type`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `category` (`Type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

//create table tblWhy
$sql .="CREATE TABLE `tblwhy` (
  `order` int(1) NOT NULL,
  `header` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

//create table appointment
$sql .="CREATE TABLE `appointment` (
  `appID` varchar(255) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `phone` varchar(255) DEFAULT NULL,
  `appDate` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `appDoc` int(11) DEFAULT NULL,
  `appDept` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  PRIMARY KEY (`appID`),
  KEY `appDept` (`appDept`),
  KEY `Email` (`Email`),
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`appDept`) REFERENCES `department` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

//create table intro
$sql .="CREATE TABLE `tblintro`(
   `introID` int(11) NOT NULL,
   `introTitle` varchar(255) DEFAULT NULL,
   `introDesc` varchar(255) DEFAULT NULL,
   `introIcon` varchar(255) DEFAULT NULL,
   PRIMARY KEY(`introID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

//insert table category
$sql .="INSERT INTO `category` VALUES ('A', 'Admin', 'config/admin/admin.php');
INSERT INTO `category` VALUES ('U', 'User', 'index.php');";

//insert table user
$sql .="INSERT INTO `user` VALUES ('A001', 'Ali', '123', 'ali@gmail.com', '011-3646577', 'A');
INSERT INTO `user` VALUES ('U001', 'Abu', '123', 'abu@gmail.com', '012-3333333', 'U');
INSERT INTO `user` VALUES ('U002', 'Siti', '123', 'siti@gmail.com', '012-3456789', 'U');";

//insert table outlet
$sql .="INSERT INTO `outlet` VALUES ('Medilab Butterworth', 'medilab_b@hotmail.com', '+604-6352427', 'Jalan Murni','Butterworth','Pulau Pinang','13800','Taman Desa Murni');
INSERT INTO `outlet` VALUES ('Medilab Tawau', 'medilab_t@hotmail.com', '+6089-6372819', 'Jalan Belian','Tawau','Sabah','91000',null);
INSERT INTO `outlet` VALUES ('Medilab Kuantan', 'medilab_kt@hotmail.com', '+603-8647588', 'Lorong Tok Sira 49','Kuantan','Pahang','25050','Taman Tengku Mahmud');
INSERT INTO `outlet` VALUES ('Medilab Kuching', 'medilab_kc@hotmail.com', '+6082-7364523', 'Jalan Tun Abang Haji Openg','Kuching','Sarawak','93000',null);";

//insert table department
$sql .="INSERT INTO `department` VALUES ('1', 'Optic', 'Study about the eye', 'Specialist in eye surgery');
INSERT INTO `department` VALUES ('2', 'Gastroenterology', 'Gastroenterology is the medical specialty that seeks to prevent, diagnose and treat conditions relating to the digestive tract involving organs such as gallbladder, pancreas, liver, oesophagus, stomach, small intestine, colon, and the liver.', 'Specialist in  surgery');";

//insert table service
$sql .="INSERT INTO `service` (`serviceName`,`serviceDes`,`icon`,`display`) VALUES ('Heart Beat Measuring','Provide professional doctor and device to monitor your heart beat rate','heartbeat','1');
INSERT INTO `service` (`serviceName`,`serviceDes`,`icon`,`display`) VALUES ('Pills Suggestion and Sales','We provide veryfied pills sales and suggestion to you','pills','1');
INSERT INTO `service` (`serviceName`,`serviceDes`,`icon`,`display`) VALUES ('Online Interview','Interview with doctor without going out from home','laptop-medical','1');
INSERT INTO `service` (`serviceName`,`serviceDes`,`icon`,`display`) VALUES ('Appointment','Make appointment with doctor online!','calendar-check','1');";

//insert table tblWhy
$sql .="INSERT INTO `tblwhy` VALUES ('1', 'Why Choose Medilab?', 'Because we are the best! Subarashi~', 'bx-cube-alt');
INSERT INTO `tblwhy` VALUES ('2', 'The BEST Service', 'We attend to you whenever you need, and it is free of charge!', 'bx-receipt');
INSERT INTO `tblwhy` VALUES ('3', 'The BEST Equipment', 'We use the latest professional equipment.', 'bx-images');
INSERT INTO `tblwhy` VALUES ('4', 'The BEST Price', 'Our vission is to let everyone able to get the medical help', 'bx-cube-alt');";

//insert table appointment
$sql .="INSERT INTO `appointment` VALUES ('P01', 'Abu', 'abu@gmail.com', '012-3333333', '2021-06-20 21:38:00', '2', '1', '...');
INSERT INTO `appointment` VALUES ('P02', 'Siti', 'siti@gmail.com', '012-3456789', '2021-06-20 20:34:00', '1', '1', 'I cirit birit 3 times a day.');
INSERT INTO `appointment` VALUES ('P03', 'Abu', 'abu@gmail.com', '012-3333333', '2021-06-20 20:46:00', '2', '1', '-');";

//insert table tblintro
$sql .="INSERT INTO `tblintro` VALUES('1','Good Service','We make sure you get ultimate care at your home, office or wherever you want, with our reliable services.','bx-fingerprint');
INSERT INTO `tblIntro` VALUES('2','Patient-Centered Understanding','We seek to bring creativity to patient care by providing the ease of quality healthcare.','bx-gift');
INSERT INTO `tblIntro` VALUES('3','24/7 Availabilitity','Regardless of the time, we make sure that we are available for your assistance around the clock.','bx-atom');";
mysqli_multi_query($conn,$sql);
mysqli_close($conn);

$conn=new mysqli($servername,$username,$password);
mysqli_select_db($conn,$dbname);

if(isset($_GET['refresh']))
{
  $result2=mysqli_query($conn,"Show Tables FROM `medilabdb`");
$numberTable=(mysqli_num_rows($result2));
$result2=mysqli_query($conn,"Show Tables");
$numberTable=(mysqli_num_rows($result2));

$message1="Table Create and Data Inserted.\\nNumber of table created:".$numberTable."/8";
goto2("../../login.php",$message1);
  
}
else
{
  goto3("createtable.php?refresh=1;");
}

?>
