<!-- Zainab Aljanabi 2200004089 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>

    div {
        padding: 100 px;
    }


     .split {
  height: 90%;
  width: 50%;
  position: fixed;
  z-index: 1;
  bottom: 2;
  overflow-x: hidden;
  padding-top: 20px;
       }
       .left {
  left: 0;
  background-image: url('grass_stems_autumn-t2.jpg');
  background-repeat: no-repeat;
  padding: 20px;
       }
       .right {
  right: 0;
  background-image: url('grass_stems_autumn-t2.jpg');
  background-repeat: no-repeat;
  padding: 20px;
       }
          .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
       }
    .centered1 {
  position: absolute;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
     </style>
</head>
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- custom css file link  -->
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
<?php
        echo'<a href="homepage.php">Home</a>';
        echo '<a href="Shop.php">Shop</a>';
        echo'<a href="#About">About</a>';
        echo ' <a href="#Contactus">contact Us</a>';

        ?>

    </nav>

    <div class="icons">

        <a href="shopping-cart.php" class="fas fa-shopping-cart"></a>
        <a href="Admin/AdminLogin.php" class="fas fa-user"></a>
    </div>

</header> </div>

<section>
    <div class="split left">
    <div class="centered">
		<h1>Contact Us</h1> <br>
            <p style="font-size:15px; color:black  ">Zahra's Email:
             <a style="font-size:15px; color: white;" href="mailto:ZahraAli22@gmail.com.com">ZahraAli22@gmail.com</a></p>
             <p style="font-size:15px; color:black">Zaianb's Email:
             <a style="font-size:15px; color: white;" href="mailto:ZainabAljanabir119@gmail.com">ZainabAljanabi119@gmail.com</a></p>
             <p style="font-size:15px; color:black">Noor's Email:
             <a style="font-size:15px; color: white;" href="mailto:NoorAlnasser766@gmail.com.com">Noor Alnasser766@gmail.com</a></p>
             <p style="font-size:15px; color:black">Fatimah's Email:
             <a style="font-size:15px; color: white;" href="mailto:FatimahAlmutiri98@gmail.com.com">FatimaAlmutiri98@gmail.com</a></p>


        <br><p style="font-size:38px; color:white;">Our Shop's Location:</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7147.8180684429535!2d50.1974152762268!3d26.394126347456915!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49ef811304efab%3A0xe664343a49ebbf2b!2sCollege%20of%20Computer%20Science%20and%20Information%20Technology!5e0!3m2!1sen!2ssa!4v1587233800587!5m2!1sen!2ssa" width="400" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
             </div>
            </div>

    <div class="split right">
    <div class="centered1">
        <h1>Support</h>
<form action="thanks.html" method="post">
 <label for="sup" style="font-size:25px;">Type of Message:</label>
  <select id="sup" name="sup">
  <option>Suggestion</option>
    <option>Problem</option>
  </select>

<p  style="font-size:55px;">Message:</p><br>
 <textarea name="message" rows="15" cols="40" required>
</textarea>

  <input type="submit" value="Submit" style="font-size:25px;">
   <input type="reset" value="Clear"  style="font-size:25px;">
    </form>
    </div>
    </div>
            </section>
</body>



</html>
