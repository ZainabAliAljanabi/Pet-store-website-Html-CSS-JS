<?php
session_start();
include 'db_connection.php';

 if(isset($_POST['uname'])&& isset($_POST['upassword'])){
	$uname = $_POST['uname'];
	$upassword = $_POST['upassword']; 
	
	if(empty($uname)){
		header("Location: AdminLogin.php?error = Username Is Required");
    	exit();	
	}else if (empty($upassword)){
		header("Location: AdminLogin.php?error = Password Is Required");
    	exit();		
	}else{
		$query = "SELECT * FROM admin WHERE uname='$uname' AND upassword='$upassword'";
		$result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result)===1){
			$row = mysqli_fetch_assoc($result);
			if($row['uname']=== $uname && $row['upassword']=== $upassword){
				$_SESSION['uname']=$row['uname'];
				header("Location: MainPage.php");
				
			}else{
			     header("Location: AdminLogin.php?error = Incorrect Username Or Password");
    	         exit();	
			}
		}else {
				header("Location: AdminLogin.php?error = Incorrect Username Or Password");
    	        exit();
		}	
	}
}else{
	header("Location: AdminLogin.php");
	exit();
}
    
?>