<?php

//insert.php
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

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event, created_by) 
 VALUES (:title, :start_event, :end_event, $usID)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
  )
 );
}


?>
