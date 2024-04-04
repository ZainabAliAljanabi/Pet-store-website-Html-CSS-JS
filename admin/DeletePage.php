<?php
session_start();
if(!isset($_SESSION['uname'])){
header("Location: AdminLogin.php");
    exit();
}
?>
<?php
extract($_POST);
$searchInput="";
if(isset($SearchButton))
    {
      $type="Select";
      $searchInput = $_POST['searchInput'];
      $query ="SELECT * FROM `product` WHERE pid='$searchInput'";
      $search_result= filtertable($query , $type);
    }
else if(isset($Refresh))
    {
      $searchInput="";
      $type="Select";
      $query = "SELECT * FROM product";
      $search_result = filtertable($query , $type);
    }
else if(isset($DeleteButton)){
  $searchInput = $_POST['searchInput'];
  $type="Delete";
  $query ="DELETE FROM `product` WHERE pid='$searchInput'";
  $search_result = filtertable($query , $type);
  $searchInput="";
    }
else
{
  $type="Select";
  $query = "SELECT * FROM product";
  $search_result = filtertable($query , $type);
}
function filtertable($query, $type)
    {
      $con= mysqli_connect("localhost","root","");
             mysqli_select_db($con,"petcare2");
     if(!$con){
             die("connection error"); }

     if($type=="Delete"){
       mysqli_query($con, $query);
       $query = "SELECT * FROM product";
       $result = mysqli_query($con, $query);
       return $result;
     }
else if($type=="Select"){
        $result = mysqli_query($con, $query);
        return $result;
    }
   }
   ?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Delete Page</title>
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
      <a class="active" href="DeletePage.php">Delete Page</a>
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
         <h6>DELETE PAGE</h6>
      </div>
      <div class="image">
        <img src="admin.png" alt="Admin">
      </div>
</div>

<div class="main-block">
  <form  method="post" action="DeletePage.php">
    <br>
				<label id="productLabel">Search: </label>
				<input type="number" name="searchInput" placeholder="Enter ID to Search OR to delete" min="1" value="<?php echo $searchInput?>" >

        <div class="btn-block">
          <Button type="submit" name="SearchButton" >Search</button>
          <Button type="submit" name="DeleteButton">Delete</button>
          <Button type="submit" name="Refresh">Refresh</button>
        </div>


</div>
</form>
<div class="tablebox">
    <div class="t1">
    <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Product name</th>
          <th>Product Price</th>
          <th>Product Stock</th>
          <th>Product Image</th>
          <th>Product Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
          while ($row=mysqli_fetch_array($search_result)) {
          ?>
          <td><?php echo $row['pid']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['stock']; ?></td>
          <td><?php echo $row['pic']; ?></td>
          <td ><?php echo $row['description']; ?></td>
        </tr> <?php } ?>
      </tbody>
    </table>
    </div>
        <br>
</div>
  </body>
</html>
