<?php

$host= "localhost";
$dbusername= "root";
$dbpassword= "";
$dbname= "petcare2";

// Make the connection:
$con = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
	die('Connect Error ('.mysqli_connect_errno().')'
	.mysqli_connect_error());
}


  extract($_POST);
  $query =" insert into product(`pid`, `stock`, `pic`, `price`, `name`, `description`) values('$id' , '$stock', '$image' ,  '$price' , '$name' ,'$description')";

  mysqli_query($con, $query);

  mysqli_close($con);
  header('Location: AddPage.php');
  exit;
 ?>
