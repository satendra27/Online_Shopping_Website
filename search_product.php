<?php
include("./comman_function.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Website</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="script.js">
    <link rel="stylesheet" href="product.php">
    <script>
      function add_item(){
        btn=document.getElementById("add_item");
        color=btn.style.color;
        if(color == "gray"){
          btn.style.color="red";
        }
          else {
            btn.style.color="gray";
          }
        }
    
    </script>

</head>
<style>
   .footer{
        background-color: #FF6103;
      }
      .noproduct{
        color: #FF6103;
        text-align: center;
        font-size: 30px;
        margin-top: 20px;
      }
.product-img{
  object-fit: contain;
}
</style>
<body>

  <div class="width-100 search-panel">
    <div class="container">
      <div class="width-20">
        <img src="./click-to-buy-high-resolution-logo.png" class="logo">
      </div>
      <div class="width-50" method="get">
        <form action="" method="get">
        <input class="search-textbox" type="text" placeholder="Search for products, brand and more" name="search_data">
        <input type="submit" class="search-button" value="Search" name="search_data_product">
        </form>
      </div>
      <div class="width-30">
        <ul class="cart-sect">
          <li>
            <a href="#" style="font-size: 17px;">Welcome Guest</a>
          </li>
          <li>
            <a href="./account.html" style="font-size: 17px;">Login <i class="fa-solid fa-right-to-bracket"></i></a>
          </li>
          <li>
          <a id="cart-icon"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
          </li>
        </ul>
        
      </div>

      

    </div>
    <div class="cart">
      <h2 class="cart-title">Your Cart</h2>

      <div class="cart-content">


      </div>

      <div class="total">
          <div class="total-title">Total</div>
          <div class="total-price">$0</div>
      </div>
      <button type="button" class="btn-buy">Buy Now</button>
      <i class="fa-solid fa-xmark" id="cart-close"></i>
  </div>
  </div>

  
<div class="width-100">
  <div class="container navbar">
    <ul class="main-menu">
      <li class="home">
        <a href="./index.php"><img src="./house-solid.svg" style="height: 15px;" alt=""> Home</a>
      </li>
      <li>
        <a href="./mobile.php"><img src="./mobile-screen-button-solid.svg" alt="" style="height: 15px;"> Mobile</a>
      </li>
      <li>
        <a href="./accessories.php"><img src="./headphones-simple-solid.svg" alt="" style="height: 15px;"> Accessories</a>
      </li>
      <li>
        <a href="./fashion.php"><img src="./shirt-solid.svg" alt="" style="height: 15px;"> Fashion</a>
      </li>
      <li>
        <a href="./electronics.php"><img src="./bolt-solid.svg" alt="" style="height: 15px;"> Electronics</a>
      </li>
      <li>
        <a href="./appliances.php"><img src="./lightbulb-solid.svg" alt="" style="height: 15px;"> Appliances</a>
      </li>
      <li>
        <a href="#"><img src="./gift-solid.svg" alt="" style="height: 15px;"> Top Offers</a>
      </li>
    </ul>
  </div>

  <!-- Slider start -->
  <div class="w3-content w3-section" style="max-width: 1350px;">
    <img class="mySlides" src="./slide4.png" style="width: 100%;">
    <img class="mySlides" src="./slide5.jpg" style="width: 100%;">
    <img class="mySlides" src="./slider3.jpg" style="width: 100%;">
    
  </div>
  <script>
    var myIndex = 0;
    carousel();
    function carousel(){
      var i;
      var x = document.getElementsByClassName("mySlides");
      for(i=0;i<x.length;i++){
        x[i].style.display="none";
      }
       myIndex++;
      if(myIndex>x.length) {myIndex=i}
      x[myIndex-1].style.display="block";
      setTimeout(carousel,3000);
    }
  </script>
  <!-- Slider End -->

  <div class="row">
    
    <select name="" id="">
      <option value="">Dafault Sorting</option>
      <option value="">Sort by Price</option>
      <option value="">Sort by Rating</option>
      <option value="">Sort by Popularity</option>
      <option value="">Sort by Sale</option>
    </select>
    <h2 class="product">All Products</h2>
  </div>

  <!-- Product-Section HTML Code STARTS -->
<div class="width-100 margin-top-50">
  <div class="container">
    
    
    <?php 
    

    search_product();
    ?>
    
       
    
  </div>
</div>

<div class="page-btn">
  <span>1</span>
  <span>2</span>
  <span>3</span>
  <span>4</span>
  <span>&#8594;</span>
</div>

<footer class="footer">
  <div class="follow">
    <h2>----------Follow us on----------</h2><br><br>
    <a href="#" class="flogo"><img src="./fb.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./instagram.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./linkedin.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./twitter.svg" alt="facebook"></a>
    <a href="#" class="flogo"><img src="./youtube.svg" alt="facebook"></a>
    
  </div><br><br>
  <div class="sub-footer">
  <div class="content content1">
    <h2><u>Contact</u></h2>
    <p class="footer-data"><br>Contact:1234678812 <br><br>E-mail:baghelsatendra27@gmail.com</p>
  </div>
  <div class="content content2">
    <h2><u>Company</u></h2>
    <p class="footer-data"><br>Customer support link <br>
      FAQ page link <br><br>
      Return and exchange policy <br> <br>
      Terms and conditions <br><br>
      Privacy policy</p>
  </div>
  <div class="content content2">
    <h2><u>Support</u></h2>
    <p><br>Product categories <br> <br>
      Popular products <br><br>
      New arrivals <br><br>
      Sale items <br><br>
      Gift cards</p>
  </div>
  <div class="content content2">
    <h2><u>About</u></h2>
    <p><br>Leadership <br><br>Customers <br><br>Shipping information
      <br><br>Returns and exchanges information
      <br><br>Estimated delivery times</p>
  </div>
  </div>
  
</footer>
<div class="copyright">
  <h2>
    Copyright © 2027 - All rights reserved</h2>
</div>

<script src="script.js"></script>

</body>
</html>