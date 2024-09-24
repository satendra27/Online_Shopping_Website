
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Website</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="script.js">
    <link rel="stylesheet" href="product.php">
    <link rel="stylesheet" href="view_products.css">
  
    <style>
      .product-image{
    height: 40px;
    width: 50px;
    object-fit: contain;
}
      .footer{
        background-color: #FF6103;
      }
      .noproduct{
        color: #FF6103;
        text-align: center;
        font-size: 30px;
        margin-top: 20px;
      }

      .order_head{
        text-align: center;
        color: #FF6103;
        margin-top: 20px;
      }
      .welcome_head{
        text-align: center;
        margin-top: 10px;
      }
      .user-name{
        color: #FF6103;
      }
      
      .logout-btn{
        background-color: #FF6103;
        padding: 7px;
        margin: 20px;
        
      }
    </style>

</head>
<body>

  <div class="width-100 search-panel">
    <div class="container">
      <div class="width-20">
        <img src="./click-to-buy-high-resolution-logo.png" class="logo">
      </div>
      <div class="width-50">
        <form action="search_product.php" method="get">
        <input class="search-textbox" type="text" placeholder="Search for products, brand and more" name="search_data">
        <input type="submit" class="search-button" value="Search" name="search_data_product">
        </form>
        
       
      </div>
      <div class="width-30">
        <ul class="cart-sect">
          <!-- <li>
            <a href="#" style="font-size: 17px;">Welcome Guest</a>
          </li>
          <li>
            <a href="./account.php" style="font-size: 17px;">Login <i class="fa-solid fa-right-to-bracket"></i></a>
          </li> -->
          <?php 
          // echo $_SESSION['user_email'];
          include('login.php');
          

          if(!isset($_SESSION['user_email'])){
            echo "<li>
            <a href='#' style='font-size: 17px;'>Welcome Guest</a>
          </li>";
          }else{
    $user_email=$_SESSION['user_email'];
  $get_details="select *from user_info where user_email='$user_email'";
  $result_query=mysqli_query($conn,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_name=$row_query['user_name'];}
            echo "<li>
            <a href='profile.php' style='font-size: 16px;'>Welcome ".$user_name."</a>
          </li>";
          }

          if(!isset($_SESSION['user_email'])){
            echo "<li>
            <a href='./account.php' style='font-size: 16px;'>Login <i class='fa-solid fa-right-to-bracket'></i></a>
          </li>";
          }else{
            echo "<li>
            <a href='./logout.php' style='font-size: 16px;'>Logout <i class='fa-solid fa-right-to-bracket'></i></a>
          </li>";
          }


          function confirm_order(){
            global $conn;
            global $con;
  $user_email=$_SESSION['user_email'];
  $get_details="select * from user_info where user_email='$user_email'";
  $result_query=mysqli_query($conn,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    $user_email=$row_query['user_email'];
    if(!isset($_GET['my_orders'])){
        $get_orders="Select * from user_orders where user_id=$user_id and order_status='pending'";
        $result_order_query=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result_order_query);
        if($row_count>0){
            echo "<h3 style='margin:20px'>You have <span style='color: green'> $row_count</span> pending orders</h3>
            <a href='profile.php?order_details' style='margin:20px'>Order Details</a><br>";
        }
        else{
            echo "<h3 style='margin:20px'>You have Zero pending orders</h3>
            <a href='index.php' style='margin:20px'>Explore Products</a>";
            

            
        }
    }
  }

  if(isset($_GET['order_details'])){
    include('user_orders.php');
  }

          }
          ?>
          <li>
          <a id="cart-icon" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php ;
           cart_item();?></sup></a>
           
          </li>
          <li>
            
          </li>
        </ul>
        
      </div>

      

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
  <h1 class="welcome_head">Welcome <span class="user-name"><?php echo $user_name ?></span></h1>
  <h2 class="order_head">My Orders</h2>
  <h3 style="margin: 20px;">Customer Name: <span style="color:#FF6103;"><?php echo $user_name ?></span></h3>
  <h3 class="user-email" style="margin: 20px;">E-Mail Address: <span style="color:#FF6103;"><?php echo $user_email ?></span></h3>
  <!-- Slider End -->
  <?php
  confirm_order();

if(!isset($_SESSION['user_email'])){
  echo "<li>
  <a href='#' style='font-size: 17px;'>Welcome Guest</a>
</li>";
}else{
$user_email=$_SESSION['user_email'];
$get_details="select *from user_info where user_email='$user_email'";
$result_query=mysqli_query($conn,$get_details);
while($row_query=mysqli_fetch_array($result_query)){
$user_name=$row_query['user_name'];}
}

if(!isset($_SESSION['user_email'])){
  echo "<li>
  <a href='./account.php' style='font-size: 16px;'>Login <i class='fa-solid fa-right-to-bracket'></i></a>
</li>";
}else{
  echo "
<button class='logout-btn'><a href='./logout.php' style='font-size: 16px; color:white;' class='link'>Logout <i class='fa-solid fa-right-to-bracket'></i></a></button>";
}
// include('login.php');
?>
  

  
   
  
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