<?php
function alert($message)
{
    echo "<script>alert('$message');</script>";
}
function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}

function goto3($to){
	echo "<script language=\"JavaScript\">
    \n window.location.href = \"".$to."\"
    </script>";
}

function checkUType($u,$type=1){
    $servername="localhost";
    $user="root";
    $passw="";
    $portno="3306";
    $database='medilabdb';
        require_once('setting.php');
        require_once('db.php');
        $conn=new mysqli($servername,$user,$passw);
        mysqli_select_db($conn,"medilabdb");
        $sql=" SELECT
        Category.Interface,Category.Type,User.Name
        FROM
        Category
        INNER JOIN User ON User.Type = Category.Type
         where Email='".$u."' ";
         $result=mysqli_query($conn,$sql);
        $rowtype=mysqli_fetch_assoc($result);
        //echo $sql;
        if ($type==1){
            return $rowtype['Type'];
        }else if ($type==2)
        {
            return $rowtype['Interface'];
         }
         else      if ($type==3){
        return $rowtype['Name'];
        }
}

function logincheck($u,$p){
    $servername="localhost";
    $user="root";
    $passw="";
    $portno="3306";
    $database='medilabdb';
    require_once('setting.php');
    require_once('db.php');
    $conn=new mysqli($servername,$user,$passw);
    mysqli_select_db($conn,"medilabdb");
    $sql=" SELECT count(Type) as L FROM `user`  where Email='".$u."'  and Password='".$p."'";
    //echo $sql;
    $stmt = mysqli_query($conn,$sql);
    if ($stmt===false){
       // return 0;
    }
    $row=mysqli_fetch_assoc($stmt); //i can call L or i can call using mysqli_fetch_row ,
    // when call $row[0]x 
    //echo $row[0];
    if ($row['L']==1){
        return 1;
    } 
    else {
        return 0;
    }
    
}

function anotherPlace ($to){
	echo "<script language=\"JavaScript\"> window.location = \"".$to."\"</script>";
}
	
function getUserID(){
    $servername="localhost";
    $user="root";
    $passw="";
    $portno="3306";
    $database='medilabdb';
    $found=false;
    require_once('setting.php');
    require_once('db.php');
    $conn=new mysqli($servername,$user,$passw);
    mysqli_select_db($conn,"medilabdb");
    $sql="SELECT ID from USER ORDER BY ID DESC";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        if(!strcmp(substr($row['ID'],0,1),"U")){
            $id=intval(substr($row['ID'],3,1));
            $id=++$id;
            $found=true;
            break;
        }
    }
    if(!$found){
        $id=1;
    }
    $identifier="U".str_pad(strval($id),3,"0",STR_PAD_LEFT);
    return $identifier;
}

?>
