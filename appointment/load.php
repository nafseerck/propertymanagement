<?php

//load.php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

$connect = new PDO('mysql:host=localhost;dbname=propertymanagement', 'root', '');

// $connect = new PDO('mysql:host=localhost;dbname=ireproperty_pro_mana', 'ireproperty_nafseer', '6[deHUr%l2~x');
$usID='';
if (isset($_SESSION['username'])) {
   $usID = $_SESSION['id'];
}



$data = array();

$query = "SELECT * FROM events WHERE `created_by`='$usID' ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>