<?php
include("database.php");
$name=$_POST["nom"];
$gmail=$_POST["Email"];
$num=$_POST["num"];
$pass=$_POST["pass"];
if(empty($name)||empty($gmail)|| empty($pass)||empty($num)){
    echo " check your information";
}
else{

$sql="INSERT INTO user (nom,gmail,password,num) VALUES('$name','$gmail','$pass','$num')";
mysqli_query($conn,$sql);
echo "Registration success";
}



mysqli_close($conn);
?>