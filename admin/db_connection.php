<?php
$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "petcare2";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
       if(!$conn){
		echo "CONNECTION FAILED!";
    }
?>
