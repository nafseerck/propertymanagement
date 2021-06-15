<?php

//delete.php

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=propertymanagement', 'root', '');

 // $connect = new PDO('mysql:host=localhost;dbname=ireproperty_pro_mana', 'ireproperty_nafseer', '6[deHUr%l2~x');

 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>