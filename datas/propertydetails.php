<?php
session_start();
include('../../connection.php');



    // General Enquiry 

    $query_id = '';

 

    $propertydata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM propertydata where id=$qqID"), MYSQLI_BOTH);

?>