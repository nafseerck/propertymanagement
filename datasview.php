<?php
session_start();
$server = mysqli_connect('localhost', 'root', '', 'propertymanagement');

if($server === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM generalenquiry";



?>