<?php 
$host = "localhost";
$uid = "root";
$pwd = "";
$dbname="propertymanagement";

// $host = "localhost"; 
// $uid ="ireproperty_nafseer"; 
// $pwd ="6[deHUr%l2~x"; 
// $dbname="ireproperty_pro_mana";

$con = mysqli_connect($host,$uid,$pwd,$dbname);



// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}




?>