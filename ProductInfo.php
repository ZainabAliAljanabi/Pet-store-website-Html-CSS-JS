<?php 

session_start();
include 'connection.php';
$max_stock = 0;


if(isset($_POST['submit'])){
  $pid = $_POST['id'];
  $stock = $_POST['stock'];
  $product_Name = $_POST['productName'];
  $product_price = $_POST['price'];
  $product_picture = $_POST['productPicture'];

  if(isset($_SESSION['num'])){
      $_SESSION['num'] += 1;
  }else{
      $_SESSION['num'] = 1;
  }
  
  //$_SESSION['pid'] = $pid;
  //$_SESSION['stock'] = $stock;


    // if product already in the chart add quantity to old quantity
  if(isset($_SESSION['cart'][$pid])){
    $new_quantity =  (int) $_SESSION['cart'][$pid]['productQuantity'] + (int) $stock;
    $_SESSION['cart'][$pid] = array('productId' => $pid,'productName' => $product_Name,
    'productPrice' => $product_price,
    'productQuantity' => $new_quantity,
    'productPicture' => $product_picture 
    );
  }else{
      $_SESSION['cart'][$pid] = array('productId' => $pid,'productName' => $product_Name,
    'productPrice' => $product_price,
    'productQuantity' => $stock,
    'productPicture' => $product_picture 
    );
  }



if(!(isset($_SESSION['cart']))){
  $_SESSION['cart'];
}


  header("Location: ProductInfo.php?id=".$pid);


}



if(isset($_POST['checkout'])){
//echo "checkout";exit;
  $pid = $_POST['id'];
  $stock = $_POST['stock'];
  $product_Name = $_POST['productName'];
  $product_price = $_POST['price'];
  $product_picture = $_POST['productPicture'];
  

  if(isset($_SESSION['num'])){
     $_SESSION['num'] += 1;
  }else{
      $_SESSION['num'] = 1;
  }
  
  $_SESSION['pid'] = $pid;
  $_SESSION['stock'] = $stock;
  
  // if product already in the chart add quantity to old quantity
  if(isset($_SESSION['cart'][$pid])){
    $new_quantity =  (int) $_SESSION['cart'][$pid]['productQuantity'] + (int) $stock;
    $_SESSION['cart'][$pid] = array('productId' => $pid,'productName' => $product_Name,
    'productPrice' => $product_price,
    'productQuantity' => $new_quantity,
    'productPicture' => $product_picture 
    );
  }else{
      $_SESSION['cart'][$pid] = array('productId' => $pid,'productName' => $product_Name,
    'productPrice' => $product_price,
    'productQuantity' => $stock,
    'productPicture' => $product_picture 
    );
  }


//print_r($_SESSION['cart'][$pid]);exit;
// move to cart
header("Location: shopping-cart.php");

if(!(isset($_SESSION['cart']))){
  $_SESSION['cart'];
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
<title> Product Details-Supplies</title>
<link rel="stylesheet" href="NavigationBarStyle.css">
<link rel="stylesheet" href="css/style.css" type="text/css">
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

 <!-- custom css file link  -->
 <link rel="stylesheet" href="cstyle.css">
 <link rel="stylesheet" href="navigationBarStyle.css">

 

 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
 
<style> 
.card {
  box-shadow: 0 19px 8px 0 rgba(0, 0, 0, 0.5);
  max-width: 500px;
 
  margin: auto;

  margin-bottom: 500px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 30px;
}

.button1 {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #f77b29;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.button2 {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #e59866;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.card button:hover {
  opacity: 0.7;
}

.cekbtn {
  border: none;
    outline: 0;
    padding: 12px;
    color: white;
    display: inline-flex;
    background-color: #f77b29;
    text-align: center;
    cursor: pointer;
     
    width: 100%;
    font-size: 18px;
}
</style>
</head>

<head>
<script>
  function redirect()
  {
    window.location = "Help.html"
  }

</script>
</head>

<body>
  <!-- header section starts  -->

 <div class="banner-area">
  <header>

    
      <div class="logo">
          <img src="cat_dog_logo.png">
      </div>
    
      <a href="#" class="textlogo">Pets<span>.</span></a>
 
     
  
      <nav class="navbar">
            <a href="homepage.php">Home</a>
            <a href="Shop.php">Shop</a>
            <a href="#about">About</a>
            <a href="Contactus.php">Contact Us</a>
         
          
      </nav>
  
      <div class="icons">
          <a href="shopping-cart.php" class="fas fa-shopping-cart">
            <?php 
                  if(isset($_SESSION['num'])){
                  
                     echo  '<span style="color:red">'.$_SESSION['num'].'</span>';
                   
                  }

            ?>
           
          </a>
          <a href="Admin/AdminLogin.php" class="fas fa-user"></a>
      </div>
  
  </header> 
</div> 

<pre>





  <h1>
 
</h1>


</pre>
<?php   

                  if(isset($_GET['id'])){
                    $id = $_GET['id'];
                  }else{
                    $id = $_SESSION['pid'] ;
                  }
                  
                     //     $result="SELECT * FROM product WHERE pid='$id'";
                                //  if(isset($_SESSION['pid'])){
                                  //   echo '<p  style="text-align: center;>The product has already been added</p>';
                                   //}
                     
                        $sql = "SELECT * FROM product WHERE pid='$id'";
                        if($result = mysqli_query($conn, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                  $product_Name=$row['name'];
                                  $product_price=$row['price'];
                                  $product_quantity=$row['stock'];
                                  $product_picture = $row['pic']
                                  


                               
                                    ?>
                                 
                              
                                          <div class="card">
                                            <form method="post" action="ProductInfo.php?id=<?php echo $row['pid'];?>">
                                            <img src="img/<?= $row['pic'] ?>" width="200" height="200">
                                            <h1 style='text-align:center; font-size: 50px; color: #e4630d '><?= $row['name'];?></h1>
                                            <p style=' margin:1px; font-size: 20px;' ><?= $row['description'];?></em></p>
                                            <p class="price">$<?=number_format($row['price'],2); ?></p>
                                            <input type="submit"
                                            style='
  width: 50px;
  height: 50px;
  background: linear-gradient( #e59866,  #e4630d );
  border-radius: 25px;
  border: 2px solid white;
  color: white;
  font-size: 30px;
  font-weight: bold;
  padding: 3px 14px;
  position:absloute;
  margin-left: 20px;
  top: 0; left: 0;'  onclick="redirect();" value="?">
                                            <p style="font-size: 25px;"><label> <Strong>Quantity:</Strong>
                                            <input type="hidden" name="id" value="<?php echo $row['pid'];?>">
                                            <input type="hidden" name="price" value="<?php echo $product_price;?>">
                                            <input type="hidden" name="productName" value="<?php echo $product_Name;?>">
                                            <input type="hidden" name="productPicture" value="<?php echo $product_picture;?>">
                                            <input type="number" name="stock"
                                            min="1"
                                            max="<?php echo $row['stock']?>"
                                            step="1"
                                            VALUE="0" style='font-size: 25px; '  /> <?php echo "\n"; ?>
                                            <input type="submit" class="button1" name="submit" value="Add To Cart">
                                           <br>
                                
                                            <button type="submit" name="checkout" value="checkout" class="button1" > Checkout </button>
                                            </form>


                                            </div>
                                            
                                          </div>
                                    <?php 
                                }
                        
                                mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                        }
                                            






        ?>

 
                          



<section class="s2">
	<h2 id="about">About us: We are a group of people who Love & Care About Animals and decided to open this website</h2>
	</section>
 
<footer id="contact">
PetsCare All Rights Reserved &copy;
You can contact us on <a href= "mailto:petscare.help1@gmail.com"</a>This email.
</footer>


</body>
</html>
