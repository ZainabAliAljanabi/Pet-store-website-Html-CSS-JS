<!-- Zainab Aljanabi 2200004089 -->

<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="NavigationBarStyle.css">
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

            <a href="#Home">Home</a>
            <a href="Shop.php">Shop</a>
            <a href="#about">About</a>
            <a href="contactus.php">Contact Us</a>
       
            
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
    
    <section class="home" id="home">

        <div class="hero">
        <h1 style="padding-top:350px;">Pets Care Store</h1>
            <div class="button">
                <a href="Shop.php" class="btn">shop now</a>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            
        </div> 
        
    </section>
	<section class="s2">

<?php
                                       
                                       $cookie_name = "past_purchases";
                                       if(isset($_COOKIE[$cookie_name]))
                                       {
                                        echo "<p style='text-align:center;color:black;font-size:14px;'>Past Purchases</p><br>";
                                        echo "<p>";
                                        //print_r($_COOKIE[$cookie_name]);
                                        echo "</p>";
                                        
                                        $cookie_data = stripslashes($_COOKIE[$cookie_name]);
                                        $cart_data = json_decode($cookie_data, true);
                                        echo "<center><table cellspacing='10' bgcolor='#ffffff' style='font-size:13px; color:black; border:2px solid; text-align:center;'><tr>
                                        <th>product id</th>
                                        <th>product image</th>
                                        <th>product name</th>
                                        <th>price</th>
                                        <th>quantity</th>
                                        </tr>";
                                        
                                        foreach($cart_data as $keys => $values)
                                        {

                                            echo "<tr>";
                                            echo "<td>" . $values['productId'] . "</td>";
                                            echo "<td>" .  "<img src='".$values['productPicture']."' width='150' height='150'>"  . "</td>";
                                            echo "<td>" . $values['productName'] . "</td>";
                                            echo "<td>" . $values['productPrice'] . "</td>";
                                            echo "<td>" . $values['productQuantity'] . "</td>";
                                            echo "</tr>";
                                            

                                        //print_r($keys);
                                        //echo $values[$cookie_name]['pid'];
                                        //echo $values["pname"];
                                        //echo $values["pquantity"];
                                        }
                                        echo "</table></center>";

                                    }

                                    ?>
    
	
	</section>

</body>
<footer id="contact">
<?php include 'footer.html' ; ?>

</footer>
</html>