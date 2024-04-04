<?php 


	if(isset($_SESSION['uname'])){
		unset($_SESSION['uname']);
		header("Location: AdminLogin.php");
	}else{
		header("Location: AdminLogin.php");
	}