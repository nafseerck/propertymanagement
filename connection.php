<?php 
$host = "localhost";
$uid = "root";
$pwd = "";
$dbname="propertymanagement";



$con = mysqli_connect($host,$uid,$pwd,$dbname);



// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}




?>
