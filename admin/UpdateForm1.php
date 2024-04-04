<?php
session_start();
if(!isset($_SESSION['uname'])){
header("Location: AdminLogin.php");
    exit();
}
?>
<?php
    extract($_POST);
    $con= mysqli_connect("localhost","root","");
           mysqli_select_db($con,"petcare2");
   if(!$con){
           die("connection error"); }
           $query = "SELECT * FROM product WHERE `pid`='$id'";
           $result = mysqli_query($con, $query);

          if(isset($UpdateButton)){
           	       $query = "UPDATE product SET `pid`='$id', `stock`='$stock',`pic`='$pic',`price`='$price',`name`='$name',`description`='$description' WHERE `pid`='$id'";
                   mysqli_query($con, $query);
                   header('Location: UpdateID.php');
                   exit;
                   }

?>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Update Form</title>

    <script src = "validation.js"></script>

<style>
.welcome{ margin-left: 130px;
        margin-top: -52px;
        color: #f27d2d;
        font-family: monospace;
}
</style>
	</head>

	<body style="Background-color:#f27d2d">
    <div class="topnav">
      <a class="active" href="UpdateID.php">Update Page</a>
      <a  href="MainPage.php">MainPage</a>
        <div class="log">
          <a href="AdminLogin.php"><img src="logout.png" alt="logout" width=15px ></a>
        </div>
    </div>

    <div class="line">
      <hr size="2" color="grey">
    </div>

    <div class="box1">
      <div class="text">
        <h2>Admin |</h2>
   <h4 class="welcome"> Welcome, <?php echo $_SESSION['uname']; ?></h4>
        <h6>UPDATE FORM</h6>
      </div>
      <div class="image">
        <img src="admin.png" alt="Admin">
      </div>
</div>


<div class="main-block">

  <form name="updatePage" id="myForm" action="UpdateForm1.php" method="post" >

    <?php
    // Show Products in Home Page through while statement
      while ($row=mysqli_fetch_assoc($result)) {
    ?>
    <label id="productLabel">Product ID:</label>
    <input type="text" id="id" name="id" value="<?php echo $row['pid']; ?>" readonly/>
    <label id="productLabel">Product Stock:</label>
    <input type="number" id="stock" name="stock" min="1" max="50" value="<?php echo $row['stock']; ?>" />
	 <label id="productLabel">Product Image:</label>
    <input type="file" id="image" name="pic" accept="image/png, image/jpeg" value="<?php echo $row['pic']; ?>"/>
    <label id="productLabel">Product Price:</label>
    <input type="text" id="price" name="price"  value="<?php echo $row['price']; ?>" />
    <label id="productLabel">Product name:</label>
    <input type="text" id="pname" name="name"  value="<?php echo $row['name']; ?>" />
	<label id="productLabel">Product Description:</label>
    <textarea id="des" name="description" rows="2" cols="33"><?php echo $row['description']; ?> </textarea>
<?php } ?>
    <div class="btn-block">
      <hr>
      <br>
      <button name="UpdateButton" type="submit">Update</button>
      <button name="Back" type="button" onclick="history.back()">Back</button>
    </div>
	</form>
</body>
</html>
