<?php
//Author: Noor Alnasser 2200004494
session_start();
include 'connection.php';
//print_r($_SESSION);exit;
$no_stock_error = false;
$no_stock_error_msg = '';

 //Empty all cart 
if(isset($_GET['action'])){
            if(isset($_GET['action']) == "clearall"){
                //unset($_SESSION['cart']);
                $_SESSION['cart']=array();
                // remove cart icon counter
                unset( $_SESSION['num']);
            }

 }


// update item
if (isset($_POST['update'])){
    $pid = $_POST['productId'];
    $stock = $_POST['quantity'];
    $product_Name = $_POST['PName'];
    $product_price = $_POST['PPrice'];
    $product_picture = $_POST['productPicture'];
   
    unset($_SESSION['cart'][$pid]); //remove the item from the cart TO UPDATE
    
    //update
    $_SESSION['cart'][$pid] = array('productId' => $pid,'productName' => $product_Name,
    'productPrice' => $product_price,
    'productQuantity' => $stock,
     'productPicture' => $product_picture 
  );
}

    //Remove a product from shopping cart
    if(isset($_POST['remove'])){
         $pid = $_POST['productId'];
        unset($_SESSION['cart'][$pid]); //remove the item from the cart      
                
    }

    // buy cart
    if(isset($_POST['buy'])){
        // use cookies for purchases
        $cookie_name = "past_purchases";
        $cookie_value = '';
        //print_r($_COOKIE);
    

        foreach ($_SESSION['cart'] as $key => $value){ //fetching quantities of cart session

            $result="SELECT * FROM product WHERE pid=" . $value['productId'];
            $productName = $value['productName'];
            $result= mysqli_query($conn,$result);
                while ($row = mysqli_fetch_array($result)){
                    //print_r($row); 
                    //echo $row["stock"]." ";
                    if((int) $row["stock"] >= (int) $_SESSION['cart'][$key]['productQuantity']){ 
                        $newStock = (int) $row["stock"] - (int) $_SESSION['cart'][$key]['productQuantity'];
                        $updatesql = "UPDATE product SET stock = ". $newStock . " WHERE pid =". $value['productId'];
                            if(mysqli_query($conn,$updatesql)){
                                echo "buy success";

                            }else{
                                echo "Error! no buy";
                                
                            }
                        // no enough stock
                        }else{
                                $no_stock_error = true;
                                $no_stock_error_msg = $no_stock_error_msg . "No enough stock of ".$value['productName']."<br>";
                                echo "not enough stock for the product ".$productName."<br>";
                                //remove the item from the cart because no stock
                                unset($_SESSION['cart'][$value['productId']]); 

                        }
                    }
                      
        }
        //exit;
        if(isset($_COOKIE[$cookie_name])){
            $cookie_value = json_decode($_COOKIE[$cookie_name], true);
        } else {
            $cookie_value = array();
        }

        $new_cookie = array_merge($cookie_value, $_SESSION['cart']);
        // set cookies for one day
        setcookie($cookie_name, json_encode($new_cookie), time() + (86400 * 30));

        
        //empty cart after buying
        $_SESSION['cart']=array();
        // remove cart icon counter
        unset( $_SESSION['num']);
    } 
             
                 



if(!(isset($_SESSION['cart']))){
    $_SESSION['cart'];
}
//if there is no session, create one
if(!(isset($_SESSION['cart']))){
    $_SESSION['cart']=array();
}


//checking if user clicked add to cart button
if (isset($_POST['pid'], $_POST['stock'])){
	//identifying post variables, and making sure they are integers
	$pid = (int)$_POST['pid'];
	$stock = (int)$_POST['stock'];
	//prepare and check if the product exists in our db
	$result= $sql->mysqli_prepare('SELECT * FROM product WHERE pid=?');
	$result->execute([$_POST['pid']]);
	//Fetch the product from db and return result as an array
	$row=$result->mysqli_fetch_assoc($result);
	//Check if the array is not empty
	if($row && $stock > 0){
		//product exists, so we can create and update our session for cart
		if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
			if (array_key_exists($pid, $_SESSION['cart'])){
				//update quantity
				$_SESSION['cart'][$pid] += $stock;
			}
			else{
				//product is not in cart, add it
				$_SESSION['cart'][$pid] = $stock;
			}
		}
		/* else{
			//There are no products in 
			$_SESSION ['cart'] = array($pid =› $stock);
		} */
	}
	//exit;
}



?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="NavigationBarStyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
</head>

    
<body>
    <div class="banner-area">
    <header>

      
        <div class="logo">
            <img src="cat_dog_logo.png">
        </div>
        <a href="#" class="textlogo">Pets<span>.</span></a>
        
       
    
        <nav class="navbar">
            <a href="#Home" ></a><a href="homepage.php">Home</a>
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
    </header> </div>

   
    <!-- Header Section Begin -->
  
    <div style="border: 1px solid; background-color:  #f77b29; width:100%; position: relative;"><br>
        <br><br>  <section><br><br> 

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="homepage.php">Home</a>
                            <a href="Shop.php">Shop</a>
                            <span style="color:white">Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Breadcrumb Section End -->



    <!-- Shopping Cart Section Begin -->
	
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        
            
     <?php 
            

            //Checking if product is already in cart or not
            if(isset($_GET['pid']))
            {
                $pid =$_GET['pid'];
                $quan=$_GET['stock'];
                if($quan>0){
                    if(isset($_SESSION['cart'][$pid])){
                        $_SESSION['cart'][$pid]+=$quan;
                    }
                    else{
                        $_SESSION['cart'][$pid]=$quan;
                    }
                }
            }
            
            
            echo "<br>";
            echo "<hr>";
            // test
            // foreach($_SESSION['cart'] as $wishlist){
            //     echo '<tr>';
            //     foreach($wishlist as $item){
            //         echo '<td>'.$item .'</td>';
            //         echo "<br>";
            //     }
            //     echo '</tr>';
        
            // }
            // test


            if(isset($_SESSION['cart']))
            {
                $i = 0;
                $total=0;
                foreach($_SESSION['cart'] as $key => $value)
                {
                   

                    //print_r($_SESSION);
                    //echo($_SESSION['stock']);
                    //$q = $_SESSION['stock'];
                    ++$i;
                    $sql="SELECT * FROM product WHERE pid='$key'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    $NumOfProduct=$key+1;
                    if(isset($value['productPrice']) && isset($value['productQuantity'])){
                        $subtotal=$value['productPrice']*$value['productQuantity']; 
                        
                        $total=$total+(int)$subtotal;
                        echo "
                        <form action='shopping-cart.php' method='post'>
                            <table>
                            <tr>
                            <th>Product</th>
                            <th>product image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Update</th>
                            <th>Subtotal</th>
                            <th>Remove</th>
                            </tr>
                            
                            <tr>
                                <td>  $NumOfProduct </td>
                                <input type='hidden' name='productId' value='".$value['productId']."'>
                                <input type='hidden' name='productPicture' value='".$value['productPicture']."'>
                                <td><img src='".$value['productPicture']."' width='150' height='150'>"  ." </td>
                                <td> <input type='hidden' name='PName' value='".$value['productName']."' > ".$value['productName']."  </td>
                                <td> <input type='hidden' name='PPrice' value='".$value['productPrice']."' > ".$value['productPrice']." $ </td>
                                <td> <form action='shopping-cart.php' method='GET'><input type='number' name='quantity' value='".$value['productQuantity']."' min='1' max='100'>
                                    <input type='hidden' name='item' value='".$value['productQuantity']."'></td>
                                <td><button type='submit' name='update'> Update </button></form> </td>
                                <td> $subtotal  </td>
                                <td> <form action='shopping-cart.php' method='POST'><button type='submit' class='btn-outline-danger' name='remove'><i class='fa fa-trash' aria-hidden='true'></i> Delete</button>
                                    <input type='hidden' name='productId' value='".$value['productId']."'>
                                    <input type='hidden' name='name' value='".$value['productName']."'></td>
                                    </form> </td>
                                
                                </tr>
                                </table>

                               
                        
                        </form>
                        
                        ";
                    }
                    

             

            
            }}
            

            //updating quantity (not working)
            if (isset($_GET['quantity'])){
                $quan =$_GET['quantity'];
                if($quan>0){
                    $_SESSION['cart'][$quan]=$quan;
                }
            }
        
			?>
                 
					
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="Shop.php">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="shopping-cart.php?action=clearall">
                                    <button class="continue__btn">Empty Cart</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
               
                    <div class="cart__total">
                        <h5>Cart total</h5>
                        <br>
                        <?php

                        //if cart is empty it displays cart is empty, otherwise it calculates total and subtotal
                        //works
                        if(empty($_SESSION['cart'])){
                            $total=0;
                            $subtotal=0;
                           echo"<h4>Your cart is empty!</h4>";
                        }else{ //echo"<h6>Subtotal: $$subtotal</h6>
                        echo "<h6>Total: $$total</h6>";}
                        ?>
                        <form action='shopping-cart.php' name="buyForm" method='post'>   
                        <button type="sumbit" name="buy" onclick="thx()" class="primary-btn">Buy</button></a>
                        <script>function thx(){alert("Thank you for Purchasing")}        
                        </script>
                        </form>
                        
                            <?php echo "<br><b style='color:red;font-size:12px;'>".$no_stock_error_msg."</b>" ?>
        
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php

		


            ?>
            
            
            

            <?php


     ?>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                
                        <p>The customer is at the heart of our unique Store.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Cats</a></li>
                            <li><a href="#">Dogs</a></li>
                            <li><a href="#">Cats & Dogs Food></a></li>
                            <li><a href="#">Cats & Dogs Grooming</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2023
                            All rights reserved 
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
		<section class="s2">
	<h2 id="about">About us: We are a group of people who Love & Care About Animals and decided to open this website</h2>
	</section>
</body>
<footer id="contact">
PetsCare All Rights Reserved &copy;
You can contact us on <a href= "mailto:petscare.help1@gmail.com"</a>This email.
</footer>
</html>