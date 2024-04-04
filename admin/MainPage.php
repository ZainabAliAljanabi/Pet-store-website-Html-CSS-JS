<?php 
session_start();
if(!isset($_SESSION['uname'])){
	header("Location: AdminLogin.php");
    exit();
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Main Page</title>
    <style>

 body{background-color:#f27d2d;} 

 h1{color: black;}
 .welcome{color: white;}

.MainPage{
  background-color: white;
  border-radius: 10px;
  width: 800px;
  padding: 30px;
  margin: 30px;
  height: 300px;
}

.left {text-align: left;}


/* Full-width input fields */
input[type=text], input[type=password] {
  width: 95%;
  border-radius: 10px;
  padding: 12px;
  margin: 3px 0 4px 0;
  display: inline-block;
  border: none;
  background: white;
}

.txt{  text-align: left;}

.registerbtn {
  background-color: #f27d2d;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.8;
  border-radius: 10px;
}

.registerbtn:hover {
  background-color: #5885AF;
}
    .log{
  position: absolute;
  right: 20px;
}
  /* Add a white background color to the top navigation */
  .topnav {
    background-color: White;
    overflow: hidden;
  }

  /* Style the links inside the navigation bar */
  .topnav a {
    float: left;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: grey;
    color: white;
  }

  /* Add a color to the active/current link */
  .topnav .active {
    background-color: grey;
    color: white;
  }
    </style>
</head>

<body>

<div class="topnav">

      <a class="active" href="MainPage.php">MainPage</a>
        <div class="log">
          <a href="logout.php"><img src="logout.png" alt="logout" width=15px ></a>
</div>
 </div>
<br>
<center> <h1 class="welcome"> Welcome, <?php echo $_SESSION['uname']; ?> </h1> </center>
<center><div class ="MainPage"><h1 >Click To Update, Add, Delete</h1><br>
<p><a href="UpdateID.php"><img src="upd.png" alt="update" width=160px ></a>
<img src=" white.jfif" alt="white" width=100px >
<a href="AddPage.php"><img src="ad.png" alt="add" width=160px ></a> 
<img src=" white.jfif" alt="white" width=100px >
<a href="DeletePage.php"><img src="del.jfif" alt="delete" width=160px ></a></p>
<div></center>

</body>
</html>
 