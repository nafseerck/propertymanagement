<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=propertymanagement', 'root', '');

// $connect = new PDO('mysql:host=localhost;dbname=ireproperty_pro_mana', 'ireproperty_nafseer', '6[deHUr%l2~x');



if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events 
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>
