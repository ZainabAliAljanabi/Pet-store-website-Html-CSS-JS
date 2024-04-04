<?php
session_start();
if(!isset($_SESSION['uname'])){
header("Location: AdminLogin.php");
    exit();
}
?>
<?php
    $con= mysqli_connect("localhost","root","");
           mysqli_select_db($con,"petcare2");
   if(!$con){
           die("connection error"); }
           $query = "SELECT * FROM product";
           $result = mysqli_query($con, $query);
?>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Update Form</title>
<style>
  .t1{
  margin-left: 20px;
  border-collapse: collapse;
  border-width: 1px;
  border-color: #000000;
  border-style: solid;
  width: 95.5%;
  color: #ffffff;
  }
  td{
    border-style: none;
    background-color: #BFD7ED;
    font-weight: bold;
  }
  thead, th{
    font-size: 15px;
    font-weight: bold;
    font-family:monospace;
    padding-left: 10px;
    padding-right: 10px;
    color: white;
    border-color: #000000;
    border-width: 2px;
    border-style: solid;
    background-color: #05445E;
  }
  td:hover{
    background-color: #D4F1F4;
  }
  .tablebox {
    max-width: 1000px;
    min-height: 40px;
    padding-top:20px;
    margin: auto;
    border-radius: 7px;
    border: solid 1px #ccc;
    box-shadow: 1px 2px 5px rgba(0,0,0,.31);
    background: #EDF1F2;
  }

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
          <a href="logout.php"><img src="logout.png" alt="logout" width=15px ></a>
        </div>
    </div>

    <div class="line">
      <hr size="2" color="grey">
    </div>

    <div class="box1">
      <div class="text">
         <h2>Admin |</h2>
		 <h4 class="welcome"> Welcome, <?php echo $_SESSION['uname']; ?></h4>
         <h6>UPDATE PAGE</h6>
      </div>
      <div class="image">
        <img src="admin.png" alt="Admin">
      </div>
</div>


<div class="main-block">

  <form name="updatePage" action="UpdateForm1.php" method="post" >

    <label id="productLabel">Product ID:</label>
    <input type="text" id="id" name="id" placeholder="Enter ID to Update" required/>
    <div class="btn-block">
    <button name="SelectButton" type="submit" value="id">Select</button>
    </div>
    <br>

	</form>


  <br>
  <div class="tablebox">
      <div class="t1">
      <table>
        <thead>
         <tr>
          <th>Product ID</th>
		  <th>Product Stock</th>
		  <th>Product Image</th>
		  <th>Product Price</th>
          <th>Product name</th>
          <th>Product Description</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            // Show Products in Home Page through while statement
              while ($row=mysqli_fetch_assoc($result)) {
            ?>
            <td><?php echo $row['pid']; ?></td>
			<td><?php echo $row['stock']; ?></td>
           <td><?php echo $row['pic']; ?></td>
          <td><?php echo $row['price']; ?></td>
		  <td><?php echo $row['name']; ?></td>
          <td ><?php echo $row['description']; ?></td>
        </tr> <?php } ?>
        </tbody>
      </table>
      </div>
          <br>
  </div>

</body>
</html>
